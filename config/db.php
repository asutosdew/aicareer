<?php
/**
 * Database Connection Configuration
 * Optimized for cPanel MySQL / MariaDB Hosting
 *
 * IMPORTANT FOR CPANEL:
 * In cPanel, your database name and username ALWAYS include your cPanel username as a prefix!
 * Example: If your cPanel username is 'techuser',
 *          then DB_NAME is 'techuser_aicareer' (NOT just 'aicareer')
 *          and DB_USER is 'techuser_dbuser' (NOT just 'dbuser')
 */

// ====================================================================
// 1. UPDATE YOUR CPANEL MYSQL CREDENTIALS HERE
// ====================================================================
define('DB_HOST', 'localhost');            // Usually 'localhost' on cPanel
define('DB_NAME', 'psychfi_aicareer');       // Enter your full cPanel DB name (with prefix, e.g., 'yourprefix_aicareer')
define('DB_USER', 'psychfi_user');          // Enter your full cPanel DB user (with prefix, e.g., 'yourprefix_user')
define('DB_PASS', 'YourSecurePassword123!');// Enter your cPanel MySQL user password
define('DB_CHARSET', 'utf8mb4');

// Set to true ONLY if you are testing offline locally without any MySQL server
// Keep FALSE for cPanel so MySQL connection errors are clearly reported!
define('ENABLE_SQLITE_FALLBACK', false);

// Fallback SQLite file path (only used if ENABLE_SQLITE_FALLBACK is true)
define('SQLITE_FALLBACK_FILE', __DIR__ . '/local_database.sqlite');

$pdo = null;
$db_error = null;
$active_db_driver = 'none';

try {
    // 1. Attempt MySQL connection (Default for cPanel hosting)
    if (in_array('mysql', PDO::getAvailableDrivers())) {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
        ];
        $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
        $active_db_driver = 'mysql';
    } elseif (ENABLE_SQLITE_FALLBACK && in_array('sqlite', PDO::getAvailableDrivers())) {
        // Only if pdo_mysql is absent and fallback is explicitly enabled
        $pdo = new PDO("sqlite:" . SQLITE_FALLBACK_FILE);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        initialize_sqlite_schema($pdo);
        $active_db_driver = 'sqlite';
    } else {
        throw new PDOException("PHP PDO MySQL Extension ('pdo_mysql') is not enabled on this server. Please enable it in cPanel -> Select PHP Version -> Extensions.");
    }

} catch (PDOException $e) {
    // If MySQL failed, check if fallback is allowed
    if (ENABLE_SQLITE_FALLBACK && in_array('sqlite', PDO::getAvailableDrivers())) {
        try {
            $pdo = new PDO("sqlite:" . SQLITE_FALLBACK_FILE);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            initialize_sqlite_schema($pdo);
            $active_db_driver = 'sqlite';
        } catch (PDOException $e2) {
            $db_error = $e->getMessage();
        }
    } else {
        $db_error = $e->getMessage();
    }
}

// If MySQL failed and fallback is disabled, halt with clear diagnostics so user knows exactly what to fix
if (!$pdo && !defined('BYPASS_DB_ERROR_HALT')) {
    ?>
    <!DOCTYPE html>
    <html lang="hi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>डेटाबेस कनेक्शन त्रुटि (Database Connection Error)</title>
        <style>
            body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #090d16; color: #f1f5f9; padding: 30px; line-height: 1.6; }
            .box { max-width: 650px; margin: 40px auto; background: #0f172a; border: 1px solid #ef4444; border-radius: 16px; padding: 30px; box-shadow: 0 20px 40px rgba(0,0,0,0.5); }
            h2 { color: #f87171; margin-top: 0; font-size: 22px; }
            .err { background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.4); padding: 12px 16px; border-radius: 8px; color: #fca5a5; font-family: monospace; font-size: 13px; word-break: break-all; margin-bottom: 20px; }
            .config { background: #1e293b; padding: 15px; border-radius: 10px; font-size: 13px; margin-bottom: 20px; }
            .config span { color: #f59e0b; font-weight: bold; }
            ul { padding-left: 20px; font-size: 14px; color: #cbd5e1; }
            li { margin-bottom: 8px; }
            .btn { display: inline-block; background: #f59e0b; color: #090d16; padding: 10px 20px; font-weight: bold; border-radius: 8px; text-decoration: none; font-size: 14px; margin-top: 10px; }
        </style>
    </head>
    <body>
        <div class="box">
            <h2>⚠️ MySQL डेटाबेस से कनेक्शन नहीं हो सका!</h2>
            <p style="font-size: 14px; color: #94a3b8;">
                वेबसाइट आपके cPanel MySQL/MariaDB डेटाबेस से कनेक्ट नहीं हो पा रही है। इसी कारण डेटाबेस में नए यूजर सेव नहीं हो रहे हैं:
            </p>
            <div class="err"><?= htmlspecialchars($db_error ?? 'Unknown Database Error') ?></div>

            <div class="config">
                <strong>वर्तमान कॉन्फ़िगरेशन (config/db.php):</strong><br>
                Host: <span><?= htmlspecialchars(DB_HOST) ?></span><br>
                Database Name: <span><?= htmlspecialchars(DB_NAME) ?></span><br>
                User: <span><?= htmlspecialchars(DB_USER) ?></span><br>
            </div>

            <h3 style="color: #fbbf24; font-size: 16px; margin-bottom: 10px;">cPanel में इसे कैसे ठीक करें?</h3>
            <ul>
                <li><strong>1. cPanel Prefix चेक करें:</strong> cPanel में डेटाबेस और यूजर के नाम के आगे आपका cPanel यूजरनेम जुड़ा होता है (उदा. <code>cpaneluser_psychfi_aicareer</code>)। पूरा नाम डालें।</li>
                <li><strong>2. यूजर को डेटाबेस से जोड़ें:</strong> cPanel -> <em>MySQL Databases</em> में जाकर "Add User to Database" सेक्शन में यूजर और डेटाबेस को चुनकर <strong>ALL PRIVILEGES</strong> देकर Save करें।</li>
                <li><strong>3. पासवर्ड सत्यापित करें:</strong> यूजर का पासवर्ड ठीक वही होना चाहिए जो आपने <code>config/db.php</code> में <code>DB_PASS</code> में लिखा है।</li>
                <li><strong>4. SQL फाइल इंपोर्ट करें:</strong> phpMyAdmin में जाकर <code>database.sql</code> को इंपोर्ट किया है या नहीं, यह सुनिश्चित करें।</li>
            </ul>

            <div style="text-align: center; margin-top: 25px;">
                <a href="db_check.php" class="btn">🔍 डायग्नोस्टिक टूल चलाएं (db_check.php)</a>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit;
}

/**
 * Initialize SQLite tables if using offline / local fallback mode
 */
function initialize_sqlite_schema($pdo) {
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            phone TEXT,
            password_hash TEXT NOT NULL,
            qualification TEXT,
            career_interest TEXT,
            role TEXT DEFAULT 'student',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS user_action_plans (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            target_career TEXT,
            key_skill_to_learn TEXT,
            day_30_goal TEXT,
            week1_progress INTEGER DEFAULT 0,
            week2_progress INTEGER DEFAULT 0,
            week3_progress INTEGER DEFAULT 0,
            week4_progress INTEGER DEFAULT 0,
            notes TEXT,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY(user_id) REFERENCES users(id) ON DELETE CASCADE
        );

        CREATE TABLE IF NOT EXISTS activity_responses (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER,
            activity_type TEXT NOT NULL,
            response_data TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS contact_inquiries (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL,
            phone TEXT,
            subject TEXT,
            message TEXT NOT NULL,
            status TEXT DEFAULT 'new',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );

        CREATE TABLE IF NOT EXISTS services (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            title_hi TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            short_desc TEXT NOT NULL,
            short_desc_hi TEXT NOT NULL,
            icon TEXT NOT NULL,
            category TEXT NOT NULL,
            badge TEXT DEFAULT 'Included',
            access_type TEXT DEFAULT 'free_member',
            order_num INTEGER DEFAULT 0,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ");

    // Check if services table is empty, then seed
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM services");
    $row = $stmt->fetch();
    if ($row && $row['count'] == 0) {
        seed_services($pdo);
    }
}

/**
 * Seed initial services from the presentation
 */
function seed_services($pdo) {
    $services = [
        [
            '7-Day AI Practical Course',
            '7-दिवसीय AI प्रैक्टिकल कोर्स',
            'ai-course',
            'Hands-on prompt engineering, ChatGPT, Claude, Gemini, Canva AI, and daily business automation workflows.',
            'प्रैक्टिकल AI टूल्स (ChatGPT, Gemini, Canva AI) से ऑटोमेशन, कंटेंट और रियल-वर्ल्ड प्रोजेक्ट्स सीखें।',
            'fa-robot',
            'AI & Tech',
            'Featured (₹999 Bundle)',
            'free_member',
            1
        ],
        [
            'PsychFiTech AI Business Partner Program',
            'AI बिजनेस ग्रोथ पार्टनर प्रोग्राम',
            'business-partner',
            'AI-driven client acquisition, marketing workflows, smart decision tools, and tech business scaling.',
            'AI टूल्स से अपने बिजनेस, फ्रीलांसिंग और क्लाइंट डिलीवरी को 10x तेज और प्रॉफिटेबल बनाएं।',
            'fa-chart-line',
            'Business',
            'Available in Panel',
            'free_member',
            2
        ],
        [
            'The Great Economic Divide (Digital Book & Notes)',
            'द ग्रेट इकोनॉमिक डिवाइड (डिजिटल बुक और नोट्स)',
            'economic-divide-book',
            'Authored by Sunil Kosariya. Insights on digital psychology, distraction economy, and financial realities.',
            'सुनील कोसारिया द्वारा लिखित: डिजिटल भ्रम, खाली जेब का सच और आर्थिक सशक्तिकरण की पूरी गाइड।',
            'fa-book-open',
            'Finance',
            'Included FREE',
            'free_member',
            3
        ],
        [
            'Financial Literacy & Money Psychology Studio',
            'वित्तीय शिक्षा और मनी साइकोलॉजी स्टूडियो',
            'financial-literacy',
            'Learn budgeting principles, instant gratification control, safe digital banking, and ₹999 decision formula.',
            'बचत, निवेश, डिजिटल सेफ्टी, फ्रॉड से बचाव और व्यवहारिक फाइनेंस के सिद्ध नियम।',
            'fa-wallet',
            'Finance',
            'Available in Panel',
            'free_member',
            4
        ],
        [
            '4-Step Career Guidance & Research Center',
            '4-चरणीय करियर गाइडेंस और रिसर्च सेंटर',
            'career-guidance',
            'Self-discovery assessment, 5-point career formula, and 7-step career validation methodology.',
            'खुद को पहचानें, विकल्प जानें, तैयारी करें और 5-Point फॉर्मूले से सही करियर का चयन करें।',
            'fa-compass',
            'Career',
            'Available in Panel',
            'free_member',
            5
        ],
        [
            'Digital School Interactive E-Learning & Quizzes',
            'डिजिटल स्कूल ई-लर्निंग और लाइव वर्कशॉप',
            'digital-school',
            'Live doubt-solving, project-based tasks, progress tracking, and peer community access.',
            'प्रोजेक्ट आधारित शिक्षा, कभी भी कहीं भी सीखने की सुविधा और व्यक्तिगत मेंटरशिप फीडबैक।',
            'fa-graduation-cap',
            'Digital School',
            'Available in Panel',
            'free_member',
            6
        ]
    ];

    $stmt = $pdo->prepare("
        INSERT INTO services (title, title_hi, slug, short_desc, short_desc_hi, icon, category, badge, access_type, order_num)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    foreach ($services as $srv) {
        $stmt->execute($srv);
    }
}
