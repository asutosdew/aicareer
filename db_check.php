<?php
/**
 * Database Diagnostic & Health Check Tool
 * PsychFiTech® | Digital Life, Career & Money
 *
 * Open this file in your browser: https://yourdomain.com/db_check.php
 * It helps you diagnose MySQL connectivity and fix any cPanel issues in 1 minute.
 */

define('BYPASS_DB_ERROR_HALT', true);
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';

// Diagnostics variables
$pdo_mysql_installed = in_array('mysql', PDO::getAvailableDrivers());
$mysql_connected = false;
$mysql_error = null;
$mysql_pdo = null;
$tables_found = [];
$users_in_mysql = [];

if ($pdo_mysql_installed) {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
        ];
        $mysql_pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        $mysql_connected = true;

        // Check tables
        $stmt = $mysql_pdo->query("SHOW TABLES");
        $tables_found = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Fetch users if users table exists
        if (in_array('users', $tables_found)) {
            $u_stmt = $mysql_pdo->query("SELECT id, name, email, phone, role, created_at FROM users ORDER BY id DESC LIMIT 10");
            $users_in_mysql = $u_stmt->fetchAll();
        }

    } catch (PDOException $e) {
        $mysql_error = $e->getMessage();
    }
}

// Check SQLite status
$sqlite_file = __DIR__ . '/config/local_database.sqlite';
$sqlite_exists = file_exists($sqlite_file);
$sqlite_users = [];

if ($sqlite_exists && in_array('sqlite', PDO::getAvailableDrivers())) {
    try {
        $sq_pdo = new PDO("sqlite:" . $sqlite_file);
        $sq_pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $s_stmt = $sq_pdo->query("SELECT id, name, email, phone, password_hash, qualification, career_interest, role, created_at FROM users");
        $sqlite_users = $s_stmt->fetchAll();
    } catch (Exception $e) {
        //
    }
}

// Handle Migration from SQLite to MySQL
$migration_msg = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'migrate_users' && $mysql_connected) {
    $migrated_count = 0;
    foreach ($sqlite_users as $u) {
        try {
            $chk = $mysql_pdo->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
            $chk->execute([$u['email']]);
            if (!$chk->fetch()) {
                $ins = $mysql_pdo->prepare("
                    INSERT INTO users (name, email, phone, password_hash, qualification, career_interest, role, created_at)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)
                ");
                $ins->execute([$u['name'], $u['email'], $u['phone'], $u['password_hash'], $u['qualification'], $u['career_interest'], $u['role'], $u['created_at']]);
                $migrated_count++;
            }
        } catch (Exception $e) {
            //
        }
    }
    $migration_msg = "{$migrated_count} यूजर्स को SQLite से आपके MySQL डेटाबेस में सफलतापूर्वक स्थानांतरित (Migrate) कर दिया गया है!";
    // Refresh user list
    $u_stmt = $mysql_pdo->query("SELECT id, name, email, phone, role, created_at FROM users ORDER BY id DESC LIMIT 10");
    $users_in_mysql = $u_stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="hi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>डेटाबेस डायग्नोस्टिक टूल | PsychFiTech</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #090d16; color: #f8fafc; font-family: -apple-system, BlinkMacSystemFont, sans-serif; }
    </style>
</head>
<body class="py-10 px-4">
    <div class="max-w-4xl mx-auto space-y-6">
        
        <!-- Header -->
        <div class="flex items-center justify-between border-b border-slate-800 pb-4">
            <div>
                <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                    <i class="fa-solid fa-stethoscope text-amber-400"></i>
                    <span>MySQL / cPanel डेटाबेस डायग्नोस्टिक टूल</span>
                </h1>
                <p class="text-xs text-slate-400 mt-1">यह टूल cPanel MySQL डेटाबेस कनेक्टिविटी और यूजर्स की लाइव स्थिति की जाँच करता है।</p>
            </div>
            <a href="index.php" class="px-3 py-1.5 rounded-lg bg-slate-800 text-xs font-semibold text-slate-300 hover:text-white border border-slate-700">
                वेबसाइट पर जाएं &rarr;
            </a>
        </div>

        <?php if ($migration_msg): ?>
            <div class="p-4 rounded-xl bg-emerald-950 border border-emerald-500 text-emerald-200 text-sm flex items-center gap-2">
                <i class="fa-solid fa-check-circle text-emerald-400 text-lg"></i>
                <span><?= htmlspecialchars($migration_msg) ?></span>
            </div>
        <?php endif; ?>

        <!-- Diagnostic Checklist -->
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6 space-y-4">
            <h2 class="text-lg font-bold text-white mb-2">सिस्टम व ड्राइवर स्थिति</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                
                <!-- Driver Check -->
                <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 flex items-start gap-3">
                    <i class="fa-solid <?= $pdo_mysql_installed ? 'fa-circle-check text-emerald-400' : 'fa-circle-xmark text-rose-500' ?> text-xl mt-0.5"></i>
                    <div>
                        <div class="font-bold text-white">PHP PDO MySQL Driver</div>
                        <div class="text-xs text-slate-400 mt-0.5">
                            <?= $pdo_mysql_installed ? 'सक्रिय है (pdo_mysql is enabled)' : '<span class="text-rose-400 font-bold">अनुपलब्ध! cPanel -> Select PHP Version -> Extensions में pdo_mysql चालू करें।</span>' ?>
                        </div>
                    </div>
                </div>

                <!-- MySQL Connection Check -->
                <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 flex items-start gap-3">
                    <i class="fa-solid <?= $mysql_connected ? 'fa-circle-check text-emerald-400' : 'fa-circle-xmark text-rose-500' ?> text-xl mt-0.5"></i>
                    <div>
                        <div class="font-bold text-white">MySQL डेटाबेस कनेक्शन</div>
                        <div class="text-xs text-slate-400 mt-0.5">
                            <?= $mysql_connected ? '<span class="text-emerald-400 font-bold">सफलतापूर्वक कनेक्टेड! (Connected to ' . htmlspecialchars(DB_NAME) . ')</span>' : '<span class="text-rose-400 font-bold">कनेक्शन विफल! (नीचे त्रुटि देखें)</span>' ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Connection Details or Error Box -->
        <?php if (!$mysql_connected): ?>
            <div class="bg-rose-950/40 border border-rose-500/50 rounded-2xl p-6 space-y-4">
                <div class="flex items-center gap-2 text-rose-400 font-bold text-lg">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <span>MySQL कनेक्शन त्रुटि (यही कारण है कि phpMyAdmin में डेटा नहीं दिख रहा):</span>
                </div>
                
                <div class="p-4 rounded-xl bg-slate-950 border border-rose-900 font-mono text-xs text-rose-300 break-all">
                    <?= htmlspecialchars($mysql_error) ?>
                </div>

                <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 text-xs text-slate-300 space-y-2">
                    <strong class="text-amber-400 block text-sm">cPanel में इसे 1 मिनट में ठीक करने के 3 कदम:</strong>
                    <ol class="list-decimal list-inside space-y-1.5 pl-1">
                        <li>
                            <strong>cPanel Prefix चेक करें:</strong> cPanel में डेटाबेस का नाम सिर्फ <code>psychfi_aicareer</code> नहीं होता, बल्कि <code>cpanelusername_psychfi_aicareer</code> होता है। 
                            कृपया <code>config/db.php</code> में <code>DB_NAME</code> और <code>DB_USER</code> को अपने cPanel के पूरे नाम से बदलें।
                        </li>
                        <li>
                            <strong>Add User to Database:</strong> cPanel -> <em>MySQL Databases</em> में नीचे "Add User To Database" पर जाएं, अपने यूजर और डेटाबेस को चुनें, और <strong>ALL PRIVILEGES</strong> पर टिक करके <strong>Make Changes</strong> दबाएं।
                        </li>
                        <li>
                            <strong>पासवर्ड जांचें:</strong> यूजर का पासवर्ड ठीक वही होना चाहिए जो आपने <code>config/db.php</code> में लिखा है।
                        </li>
                    </ol>
                </div>
            </div>
        <?php else: ?>
            <!-- Success Status & Live Table Data -->
            <div class="bg-slate-900 border border-emerald-500/40 rounded-2xl p-6 space-y-6">
                <div class="flex items-center justify-between border-b border-slate-800 pb-3">
                    <div class="flex items-center gap-2 text-emerald-400 font-bold text-base">
                        <i class="fa-solid fa-circle-check"></i>
                        <span>MySQL डेटाबेस सक्रिय है और ठीक से काम कर रहा है!</span>
                    </div>
                    <span class="text-xs text-slate-400">टेबल्स: <?= count($tables_found) ?> मिलीं</span>
                </div>

                <!-- Tables List -->
                <div>
                    <h3 class="text-sm font-bold text-slate-300 mb-2">डेटाबेस में मौजूद टेबल्स:</h3>
                    <div class="flex flex-wrap gap-2 text-xs">
                        <?php foreach (['users', 'user_action_plans', 'services', 'contact_inquiries', 'activity_responses'] as $tbl): ?>
                            <span class="px-3 py-1 rounded-lg <?= in_array($tbl, $tables_found) ? 'bg-emerald-950 text-emerald-300 border border-emerald-500/40' : 'bg-rose-950 text-rose-300 border border-rose-500/40' ?>">
                                <?= $tbl ?> <?= in_array($tbl, $tables_found) ? '✓' : '✗ (Import database.sql)' ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Live Users Table in MySQL -->
                <div>
                    <h3 class="text-sm font-bold text-slate-300 mb-2">MySQL 'users' टेबल में हालिया पंजीकृत यूजर्स (phpMyAdmin वाला डेटा):</h3>
                    <?php if (empty($users_in_mysql)): ?>
                        <div class="p-4 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-400 text-center">
                            MySQL में अभी कोई यूजर नहीं है। कृपया <a href="register.php" class="text-amber-400 underline">register.php</a> पर जाकर एक नया यूजर रजिस्टर करें।
                        </div>
                    <?php else: ?>
                        <div class="overflow-x-auto rounded-xl border border-slate-800">
                            <table class="w-full text-left text-xs text-slate-300">
                                <thead class="bg-slate-950 text-slate-400 uppercase font-semibold">
                                    <tr>
                                        <th class="p-3">ID</th>
                                        <th class="p-3">नाम</th>
                                        <th class="p-3">ईमेल</th>
                                        <th class="p-3">फोन</th>
                                        <th class="p-3">रोल</th>
                                        <th class="p-3">तारीख</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-800 bg-slate-900/60">
                                    <?php foreach ($users_in_mysql as $u): ?>
                                        <tr>
                                            <td class="p-3 font-mono text-amber-400"><?= $u['id'] ?></td>
                                            <td class="p-3 font-bold text-white"><?= htmlspecialchars($u['name']) ?></td>
                                            <td class="p-3"><?= htmlspecialchars($u['email']) ?></td>
                                            <td class="p-3"><?= htmlspecialchars($u['phone'] ?: '-') ?></td>
                                            <td class="p-3"><span class="px-2 py-0.5 rounded bg-slate-800 text-amber-300"><?= htmlspecialchars($u['role']) ?></span></td>
                                            <td class="p-3 text-slate-400"><?= htmlspecialchars($u['created_at']) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- SQLite Fallback Notice & Migration -->
        <?php if ($sqlite_exists && count($sqlite_users) > 0): ?>
            <div class="bg-amber-950/30 border border-amber-500/40 rounded-2xl p-6 space-y-3">
                <div class="flex items-center gap-2 text-amber-400 font-bold text-base">
                    <i class="fa-solid fa-file-shield"></i>
                    <span>लोकल SQLite फ़ाइल में <?= count($sqlite_users) ?> यूजर(्स) मिले हैं!</span>
                </div>
                <p class="text-xs text-slate-300 leading-relaxed">
                    पहले जब MySQL से कनेक्शन नहीं हो पाया था, तब बैकअप SQLite फाइल (<code>config/local_database.sqlite</code>) में ये यूजर्स रजिस्टर हो गए थे।
                    <?php if ($mysql_connected): ?>
                        आप नीचे दिए गए बटन पर क्लिक करके इन सभी यूजर्स को अपने असली cPanel MySQL डेटाबेस में ट्रांसफर (Migrate) कर सकते हैं:
                    <?php else: ?>
                        पहले ऊपर दिए गए MySQL कनेक्शन को ठीक करें, फिर आप इन्हें एक क्लिक में MySQL में ट्रांसफर कर सकेंगे।
                    <?php endif; ?>
                </p>

                <?php if ($mysql_connected): ?>
                    <form method="POST" class="pt-2">
                        <input type="hidden" name="action" value="migrate_users">
                        <button type="submit" class="px-5 py-2.5 rounded-xl bg-amber-500 text-slate-950 font-bold text-xs hover:bg-amber-400 transition flex items-center gap-2">
                            <i class="fa-solid fa-arrow-right-arrow-left"></i>
                            <span>इन यूजर्स को MySQL डेटाबेस में ट्रांसफर करें (1-Click Migration)</span>
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Footer Help -->
        <div class="text-center text-xs text-slate-400 pt-4">
            कॉन्फ़िगरेशन फाइल: <code class="text-slate-300 bg-slate-800 px-1.5 py-0.5 rounded">config/db.php</code> | 
            SQL स्कीमा: <code class="text-slate-300 bg-slate-800 px-1.5 py-0.5 rounded">database.sql</code>
        </div>

    </div>
</body>
</html>
