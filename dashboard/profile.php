<?php
/**
 * Member Profile & Account Settings
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/../includes/auth_check.php';

$page_title = "मेरी प्रोफाइल और खाता सेटिंग्स";
$logged_user = current_user();

// Fetch latest user data from MySQL/MariaDB
$user = null;
try {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ? LIMIT 1");
    $stmt->execute([$logged_user['id']]);
    $user = $stmt->fetch();
} catch (Exception $e) {
    //
}

$errors = [];

// Handle Profile Information Update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_type']) && $_POST['action_type'] === 'update_profile') {
    verify_csrf();

    $name = clean_input($_POST['name'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $qualification = clean_input($_POST['qualification'] ?? '');
    $career_interest = clean_input($_POST['career_interest'] ?? '');

    if (empty($name)) {
        $errors[] = "पूरा नाम आवश्यक है।";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
                UPDATE users 
                SET name = ?, phone = ?, qualification = ?, career_interest = ?
                WHERE id = ?
            ");
            $stmt->execute([$name, $phone, $qualification, $career_interest, $logged_user['id']]);

            // Update session
            $_SESSION['user_name'] = $name;
            $_SESSION['user_qualification'] = $qualification;
            $_SESSION['user_interest'] = $career_interest;

            set_flash('success', 'प्रोफाइल विवरण सफलतापूर्वक अपडेट कर दिया गया है! (Profile Updated)');
            redirect(BASE_URL . '/dashboard/profile.php');
        } catch (PDOException $e) {
            $errors[] = "अपडेट विफल: " . $e->getMessage();
        }
    }
}

// Handle Password Change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_type']) && $_POST['action_type'] === 'change_password') {
    verify_csrf();

    $current_pass = $_POST['current_password'] ?? '';
    $new_pass = $_POST['new_password'] ?? '';
    $confirm_pass = $_POST['confirm_password'] ?? '';

    if (!password_verify($current_pass, $user['password_hash'])) {
        $errors[] = "वर्तमान पासवर्ड गलत है। (Current password is incorrect)";
    }
    if (strlen($new_pass) < 6) {
        $errors[] = "नया पासवर्ड कम से कम 6 अक्षरों का होना चाहिए।";
    }
    if ($new_pass !== $confirm_pass) {
        $errors[] = "नया पासवर्ड और पुष्टि पासवर्ड मेल नहीं खाते।";
    }

    if (empty($errors)) {
        try {
            $new_hash = password_hash($new_pass, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("UPDATE users SET password_hash = ? WHERE id = ?");
            $stmt->execute([$new_hash, $logged_user['id']]);

            set_flash('success', 'आपका पासवर्ड सफलतापूर्वक बदल दिया गया है! (Password Changed)');
            redirect(BASE_URL . '/dashboard/profile.php');
        } catch (PDOException $e) {
            $errors[] = "पासवर्ड अपडेट विफल: " . $e->getMessage();
        }
    }
}

require_once __DIR__ . '/../includes/member_header.php';
?>

<div class="py-8 sm:py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header -->
        <div class="border-b border-slate-800 pb-4">
            <span class="text-xs text-amber-400 font-bold uppercase tracking-wider block mb-1">
                <i class="fa-solid fa-user-gear mr-1"></i> खाता प्रबंधन
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                प्रोफाइल एवं सुरक्षा सेटिंग्स
            </h1>
        </div>

        <?php if (!empty($errors)): ?>
            <div class="p-4 rounded-xl bg-rose-950/80 border border-rose-500/40 text-rose-200 text-xs sm:text-sm space-y-1">
                <div class="font-bold flex items-center gap-1.5">
                    <i class="fa-solid fa-circle-exclamation"></i> कृपया ध्यान दें:
                </div>
                <ul class="list-disc list-inside pl-2 space-y-1">
                    <?php foreach ($errors as $err): ?>
                        <li><?= e($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Edit Profile Form -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800">
            <h2 class="text-lg font-bold text-white mb-4 font-['Poppins'] flex items-center gap-2">
                <i class="fa-solid fa-id-card text-amber-400"></i>
                <span>व्यक्तिगत विवरण (Personal Info)</span>
            </h2>

            <form action="<?= BASE_URL ?>/dashboard/profile.php" method="POST" class="space-y-4">
                <?= csrf_field() ?>
                <input type="hidden" name="action_type" value="update_profile">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase text-slate-300 mb-1">पूरा नाम *</label>
                        <input type="text" name="name" value="<?= e($user['name'] ?? '') ?>" required
                            class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase text-slate-300 mb-1">पंजीकृत ईमेल (अपरिवर्तनीय)</label>
                        <input type="email" value="<?= e($user['email'] ?? '') ?>" disabled
                            class="w-full px-4 py-2.5 rounded-xl bg-slate-900 border border-slate-800 text-slate-500 text-sm cursor-not-allowed">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold uppercase text-slate-300 mb-1 flex items-center gap-1.5">
                            <i class="fa-brands fa-whatsapp text-emerald-400"></i>
                            <span>व्हाट्सऐप नंबर *</span>
                        </label>
                        <input type="tel" name="phone" value="<?= e($user['phone'] ?? '') ?>" required
                            placeholder="98765 43210"
                            class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold uppercase text-slate-300 mb-1">शिक्षा स्तर</label>
                        <select name="qualification" class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                            <option value="10th / 12th Student" <?= ($user['qualification'] ?? '') == '10th / 12th Student' ? 'selected' : '' ?>>10वीं / 12वीं के छात्र (School)</option>
                            <option value="College Undergraduate" <?= ($user['qualification'] ?? '') == 'College Undergraduate' ? 'selected' : '' ?>>कॉलेज छात्र (Undergraduate)</option>
                            <option value="Postgraduate" <?= ($user['qualification'] ?? '') == 'Postgraduate' ? 'selected' : '' ?>>स्नातकोत्तर (Postgraduate)</option>
                            <option value="Job Seeker" <?= ($user['qualification'] ?? '') == 'Job Seeker' ? 'selected' : '' ?>>रोजगार की तलाश में</option>
                            <option value="Professional / Entrepreneur" <?= ($user['qualification'] ?? '') == 'Professional / Entrepreneur' ? 'selected' : '' ?>>व्यापारी / वर्किंग प्रोफेशनल</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-300 mb-1">प्राथमिक रुचि का क्षेत्र</label>
                    <select name="career_interest" class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                        <option value="AI & Automation" <?= ($user['career_interest'] ?? '') == 'AI & Automation' ? 'selected' : '' ?>>AI &amp; ऑटोमेशन (ChatGPT/Canva)</option>
                        <option value="Finance & Money Management" <?= ($user['career_interest'] ?? '') == 'Finance & Money Management' ? 'selected' : '' ?>>वित्त, बचत व निवेश (Finance)</option>
                        <option value="Tech & Programming" <?= ($user['career_interest'] ?? '') == 'Tech & Programming' ? 'selected' : '' ?>>तकनीक व सॉफ्टवेयर (Tech)</option>
                        <option value="Business & Entrepreneurship" <?= ($user['career_interest'] ?? '') == 'Business & Entrepreneurship' ? 'selected' : '' ?>>व्यवसाय व स्टार्टअप (Business)</option>
                    </select>
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-6 py-2.5 rounded-xl btn-gold text-slate-950 font-bold text-xs sm:text-sm">
                        प्रोफाइल अपडेट करें
                    </button>
                </div>
            </form>
        </div>

        <!-- Change Password Form -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800">
            <h2 class="text-lg font-bold text-white mb-4 font-['Poppins'] flex items-center gap-2">
                <i class="fa-solid fa-lock text-cyan-400"></i>
                <span>पासवर्ड बदलें (Security)</span>
            </h2>

            <form action="<?= BASE_URL ?>/dashboard/profile.php" method="POST" class="space-y-4 max-w-lg">
                <?= csrf_field() ?>
                <input type="hidden" name="action_type" value="change_password">

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-300 mb-1">वर्तमान पासवर्ड *</label>
                    <input type="password" name="current_password" required
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-300 mb-1">नया पासवर्ड (कम से कम 6 अक्षर) *</label>
                    <input type="password" name="new_password" required minlength="6"
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-300 mb-1">नए पासवर्ड की पुष्टि करें *</label>
                    <input type="password" name="confirm_password" required minlength="6"
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                </div>

                <div class="pt-2">
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-xs sm:text-sm border border-slate-700 transition">
                        पासवर्ड अपडेट करें
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
