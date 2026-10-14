<?php
/**
 * User Registration Page
 * Stores user into MySQL / MariaDB database
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/helpers.php';

// If already logged in, redirect to dashboard
if (is_logged_in()) {
    redirect(BASE_URL . '/dashboard/index.php');
}

$page_title = "छात्र व सदस्य रजिस्ट्रेशन";
$errors = [];
$success = false;

// Form pre-fill data
$name = '';
$email = '';
$phone = '';
$qualification = '';
$career_interest = 'AI & Automation';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $name = clean_input($_POST['name'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $qualification = clean_input($_POST['qualification'] ?? '');
    $career_interest = clean_input($_POST['career_interest'] ?? 'AI & Automation');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($name)) {
        $errors[] = "कृपया अपना पूरा नाम दर्ज करें। (Full name is required)";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "कृपया एक मान्य ईमेल पता दर्ज करें। (Valid email is required)";
    }
    
    // WhatsApp Number Validation (Mandatory for Community Access)
    if (empty($phone)) {
        $errors[] = "कृपया अपना 10 अंकों का व्हाट्सऐप नंबर दर्ज करें। (WhatsApp number is mandatory)";
    } else {
        $clean_phone = preg_replace('/[^0-9]/', '', $phone);
        if (strlen($clean_phone) < 10 || strlen($clean_phone) > 13) {
            $errors[] = "कृपया एक मान्य 10-अंकीय व्हाट्सऐप मोबाइल नंबर दर्ज करें। (Please enter a valid 10-digit WhatsApp number)";
        }
    }

    if (empty($password)) {
        $errors[] = "कृपया पासवर्ड दर्ज करें। (Password is required)";
    } elseif (strlen($password) < 6) {
        $errors[] = "पासवर्ड कम से कम 6 अक्षरों का होना चाहिए। (Password must be at least 6 characters)";
    }
    if ($password !== $confirm_password) {
        $errors[] = "पासवर्ड और पुष्टि पासवर्ड मेल नहीं खाते। (Passwords do not match)";
    }

    // Check if email already exists in MySQL/MariaDB
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? LIMIT 1");
            $stmt->execute([$email]);
            if ($stmt->fetch()) {
                $errors[] = "यह ईमेल पहले से पंजीकृत है। कृपया लॉगिन करें या दूसरा ईमेल उपयोग करें। (Email already registered)";
            }
        } catch (PDOException $e) {
            $errors[] = "डेटाबेस त्रुटि: " . $e->getMessage();
        }
    }

    // Insert user into MySQL / MariaDB
    if (empty($errors)) {
        try {
            $password_hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("
                INSERT INTO users (name, email, phone, password_hash, qualification, career_interest, role)
                VALUES (?, ?, ?, ?, ?, ?, 'student')
            ");
            $stmt->execute([$name, $email, $phone, $password_hash, $qualification, $career_interest]);
            $user_id = $pdo->lastInsertId();

            // Create initial Action Plan entry
            try {
                $plan_stmt = $pdo->prepare("
                    INSERT INTO user_action_plans (user_id, target_career, key_skill_to_learn, day_30_goal)
                    VALUES (?, ?, ?, ?)
                ");
                $plan_stmt->execute([
                    $user_id,
                    $career_interest,
                    'AI Basics & Practical Tools',
                    'अगले 30 दिनों में 1 नई स्किल सीखकर अपने करियर की दिशा तय करना।'
                ]);
            } catch (Exception $e) {
                // Ignore action plan failure if any, user registration still succeeded
            }

            // Auto-login newly registered user
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_name'] = $name;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_role'] = 'student';
            $_SESSION['user_qualification'] = $qualification;
            $_SESSION['user_interest'] = $career_interest;
            $_SESSION['new_registration_whatsapp'] = true;

            set_flash('success', 'आपका रजिस्ट्रेशन सफलतापूर्वक पूरा हुआ! कृपया आधिकारिक व्हाट्सऐप कम्युनिटी में अवश्य शामिल हों।');
            redirect(BASE_URL . '/dashboard/index.php?welcome_wa=1');

        } catch (PDOException $e) {
            $errors[] = "रजिस्ट्रेशन असफल रहा: " . $e->getMessage();
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<div class="py-12 sm:py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Info Column -->
            <div class="lg:col-span-5 space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-semibold uppercase tracking-wider">
                    <i class="fa-solid fa-graduation-cap"></i> छात्र एवं युवा पोर्टल
                </div>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight font-['Poppins']">
                    आज ही रजिस्टर करें, <br>
                    <span class="gradient-text-gold">अपने भविष्य को नई दिशा दें!</span>
                </h1>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                    प्रस्तुति में बताए गए सभी ई-लर्निंग मॉड्यूल्स, AI टूल्स, वित्तीय निर्णय सिम्युलेटर और करियर रिसर्च गाइड्स का पूरा एक्सेस लॉगिन के बाद सीधे आपके पैनल में मिलेगा।
                </p>

                <!-- Presentation Highlights Included in Panel -->
                <div class="space-y-4 pt-2">
                    <div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="w-9 h-9 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-robot"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">7-Day AI Practical Course &amp; Prompts</h4>
                            <p class="text-slate-400 text-xs">ChatGPT, Gemini, Canva AI और ऑटोमेशन वर्कफ्लो का हैंड्स-ऑन एक्सेस।</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="w-9 h-9 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-compass"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">5-Point Career Assessment Tool</h4>
                            <p class="text-slate-400 text-xs">रुचि, योग्यता, अवसर और भविष्य के 5-बिंदु फॉर्मूले से करियर निर्णय लें।</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-900/60 border border-slate-800">
                        <div class="w-9 h-9 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">वित्तीय शिक्षा &amp; फ्रॉड चेकर</h4>
                            <p class="text-slate-400 text-xs">ऑनलाइन कमाई के फर्जी दावों की पड़ताल और मनी साइकोलॉजी टूल्स।</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3.5 p-3.5 rounded-xl bg-emerald-950/40 border border-emerald-500/30">
                        <div class="w-9 h-9 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                            <i class="fa-brands fa-whatsapp text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-semibold text-sm">आधिकारिक WhatsApp कम्युनिटी एक्सेस</h4>
                            <p class="text-slate-400 text-xs">रजिस्टर करते ही लाइव क्लास लिंक, दैनिक AI प्रॉम्प्ट्स व मेंटर ग्रुप में प्रवेश।</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-amber-500/5 border border-amber-500/20 text-xs text-amber-300">
                    <i class="fa-solid fa-circle-info mr-1"></i>
                    <strong>नोट:</strong> आपका डेटा हमारे सुरक्षित MySQL/MariaDB डेटाबेस में संरक्षित रहता है।
                </div>
            </div>

            <!-- Right Registration Form Column -->
            <div class="lg:col-span-7">
                <div class="glass-card-static rounded-2xl p-6 sm:p-10 border border-slate-800 shadow-2xl relative">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-white font-['Poppins']">नया खाता बनाएँ (Free Registration)</h2>
                        <p class="text-slate-400 text-xs sm:text-sm mt-1">
                            सभी फ़ील्ड्स भरें और सीधे सदस्य पैनल व WhatsApp कम्युनिटी में प्रवेश पाएं।
                        </p>
                    </div>

                    <!-- Error Alert -->
                    <?php if (!empty($errors)): ?>
                        <div class="mb-6 p-4 rounded-xl bg-rose-950/80 border border-rose-500/40 text-rose-200 text-sm space-y-1">
                            <div class="font-bold flex items-center gap-2">
                                <i class="fa-solid fa-circle-exclamation text-rose-400"></i> कृपया निम्नलिखित त्रुटियों को सुधारें:
                            </div>
                            <ul class="list-disc list-inside text-xs pl-2 space-y-1">
                                <?php foreach ($errors as $err): ?>
                                    <li><?= e($err) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form action="<?= BASE_URL ?>/register.php" method="POST" class="space-y-4">
                        <?= csrf_field() ?>

                        <!-- Full Name -->
                        <div>
                            <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                                पूरा नाम (Full Name) <span class="text-amber-400">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                                    <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" id="name" name="name" value="<?= e($name) ?>" required
                                    placeholder="उदा. राहुल शर्मा"
                                    class="w-full pl-10 pr-4 py-2.5 rounded-xl form-input text-sm">
                            </div>
                        </div>

                        <!-- Email & Phone Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                                    ईमेल पता (Email) <span class="text-amber-400">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <input type="email" id="email" name="email" value="<?= e($email) ?>" required
                                        placeholder="name@example.com"
                                        class="w-full pl-10 pr-4 py-2.5 rounded-xl form-input text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="phone" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5 flex items-center justify-between">
                                    <span>व्हाट्सऐप नंबर <span class="text-emerald-400 font-bold">*</span></span>
                                    <span class="text-[10px] text-emerald-400 lowercase font-normal flex items-center gap-1"><i class="fa-brands fa-whatsapp"></i> अनिवार्य</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-emerald-400 text-sm">
                                        <i class="fa-brands fa-whatsapp text-base"></i>
                                    </span>
                                    <input type="tel" id="phone" name="phone" value="<?= e($phone) ?>" required
                                        placeholder="98765 43210"
                                        class="w-full pl-10 pr-4 py-2.5 rounded-xl form-input text-sm border-slate-700 focus:border-emerald-500">
                                </div>
                                <span class="text-[10px] text-slate-400 block mt-1">आधिकारिक WhatsApp कम्युनिटी में जोड़ने हेतु</span>
                            </div>
                        </div>

                        <!-- Education & Interest Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="qualification" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                                    वर्तमान शिक्षा स्तर
                                </label>
                                <select id="qualification" name="qualification" class="w-full px-3.5 py-2.5 rounded-xl form-input text-sm">
                                    <option value="10th / 12th Student" <?= $qualification == '10th / 12th Student' ? 'selected' : '' ?>>10वीं / 12वीं के छात्र (School)</option>
                                    <option value="College Undergraduate" <?= $qualification == 'College Undergraduate' ? 'selected' : '' ?>>कॉलेज छात्र (Undergraduate)</option>
                                    <option value="Postgraduate" <?= $qualification == 'Postgraduate' ? 'selected' : '' ?>>स्नातकोत्तर (Postgraduate)</option>
                                    <option value="Job Seeker" <?= $qualification == 'Job Seeker' ? 'selected' : '' ?>>रोजगार की तलाश में (Job Seeker)</option>
                                    <option value="Professional / Entrepreneur" <?= $qualification == 'Professional / Entrepreneur' ? 'selected' : '' ?>>व्यापारी / वर्किंग प्रोफेशनल</option>
                                </select>
                            </div>
                            <div>
                                <label for="career_interest" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                                    प्राथमिक रुचि का क्षेत्र
                                </label>
                                <select id="career_interest" name="career_interest" class="w-full px-3.5 py-2.5 rounded-xl form-input text-sm">
                                    <option value="AI & Automation" <?= $career_interest == 'AI & Automation' ? 'selected' : '' ?>>AI &amp; ऑटोमेशन (ChatGPT/Canva)</option>
                                    <option value="Finance & Money Management" <?= $career_interest == 'Finance & Money Management' ? 'selected' : '' ?>>वित्त, बचत व निवेश (Finance)</option>
                                    <option value="Tech & Programming" <?= $career_interest == 'Tech & Programming' ? 'selected' : '' ?>>तकनीक व सॉफ्टवेयर (Tech)</option>
                                    <option value="Business & Entrepreneurship" <?= $career_interest == 'Business & Entrepreneurship' ? 'selected' : '' ?>>व्यवसाय व स्टार्टअप (Business)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Passwords Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                                    पासवर्ड (कम से कम 6 अक्षर) <span class="text-amber-400">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <input type="password" id="password" name="password" required minlength="6"
                                        placeholder="••••••••"
                                        class="w-full pl-10 pr-4 py-2.5 rounded-xl form-input text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="confirm_password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                                    पासवर्ड की पुष्टि करें <span class="text-amber-400">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                                        <i class="fa-solid fa-check-double"></i>
                                    </span>
                                    <input type="password" id="confirm_password" name="confirm_password" required minlength="6"
                                        placeholder="••••••••"
                                        class="w-full pl-10 pr-4 py-2.5 rounded-xl form-input text-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Terms Agreement -->
                        <div class="pt-2">
                            <label class="flex items-start gap-2.5 cursor-pointer text-xs text-slate-400">
                                <input type="checkbox" required checked class="mt-0.5 rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-400">
                                <span>मैं डिजिटल स्कूल और PsychFiTech® की शैक्षणिक आचार संहिता और गोपनीयता नीति को स्वीकार करता हूँ।</span>
                            </label>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-3">
                            <button type="submit" class="w-full py-3.5 px-4 rounded-xl btn-gold text-slate-950 font-bold text-sm sm:text-base flex items-center justify-center gap-2 shadow-lg">
                                <i class="fa-solid fa-user-check"></i>
                                <span>खाता बनाएँ और डैशबोर्ड में प्रवेश करें</span>
                            </button>
                        </div>
                    </form>

                    <!-- Login Link -->
                    <div class="mt-6 pt-6 border-t border-slate-800 text-center text-xs text-slate-400">
                        पहले से खाता मौजूद है?
                        <a href="<?= BASE_URL ?>/login.php" class="text-amber-400 font-bold hover:underline ml-1">
                            यहाँ लॉगिन करें &rarr;
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
