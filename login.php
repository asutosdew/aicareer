<?php
/**
 * User Login Page
 * Authenticates user from MySQL / MariaDB database
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/helpers.php';

// If already logged in, redirect to dashboard
if (is_logged_in()) {
    redirect(BASE_URL . '/dashboard/index.php');
}

$page_title = "सदस्य लॉगिन (Member Login)";
$errors = [];
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $email = clean_input($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email)) {
        $errors[] = "कृपया अपना ईमेल पता दर्ज करें।";
    }
    if (empty($password)) {
        $errors[] = "कृपया अपना पासवर्ड दर्ज करें।";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                // Regenerate session ID for security
                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'] ?? 'student';
                $_SESSION['user_qualification'] = $user['qualification'] ?? '';
                $_SESSION['user_interest'] = $user['career_interest'] ?? '';

                set_flash('success', 'लॉगिन सफल रहा! सदस्य डैशबोर्ड में आपका स्वागत है। (Welcome back!)');
                redirect(BASE_URL . '/dashboard/index.php');
            } else {
                $errors[] = "गलत ईमेल या पासवर्ड। कृपया पुनः प्रयास करें। (Invalid credentials)";
            }
        } catch (PDOException $e) {
            $errors[] = "डेटाबेस प्रमाणीकरण त्रुटि: " . $e->getMessage();
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<div class="py-12 sm:py-20">
    <div class="max-w-md mx-auto px-4 sm:px-6">
        <div class="glass-card-static rounded-2xl p-6 sm:p-10 border border-slate-800 shadow-2xl relative">
            
            <div class="text-center mb-8">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center text-slate-950 font-black text-2xl mx-auto shadow-lg shadow-amber-500/20 mb-4">
                    <i class="fa-solid fa-lock"></i>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">सदस्य लॉगिन</h1>
                <p class="text-slate-400 text-xs sm:text-sm mt-1">
                    अपने स्टूडेंट पैनल और ई-लर्निंग सर्विसेज का उपयोग करने के लिए लॉगिन करें।
                </p>
            </div>

            <!-- Error Alert -->
            <?php if (!empty($errors)): ?>
                <div class="mb-6 p-4 rounded-xl bg-rose-950/80 border border-rose-500/40 text-rose-200 text-sm space-y-1">
                    <div class="font-bold flex items-center gap-2">
                        <i class="fa-solid fa-circle-exclamation text-rose-400"></i> त्रुटि:
                    </div>
                    <ul class="list-disc list-inside text-xs pl-2 space-y-1">
                        <?php foreach ($errors as $err): ?>
                            <li><?= e($err) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>/login.php" method="POST" class="space-y-5">
                <?= csrf_field() ?>

                <div>
                    <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-300 mb-1.5">
                        ईमेल पता (Registered Email)
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                            <i class="fa-solid fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" value="<?= e($email) ?>" required
                            placeholder="name@example.com"
                            class="w-full pl-10 pr-4 py-3 rounded-xl form-input text-sm">
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-300">
                            पासवर्ड (Password)
                        </label>
                        <a href="<?= BASE_URL ?>/contact.php#help" class="text-xs text-amber-400 hover:underline">
                            सहायता चाहिए?
                        </a>
                    </div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500 text-sm">
                            <i class="fa-solid fa-lock"></i>
                        </span>
                        <input type="password" id="password" name="password" required
                            placeholder="••••••••"
                            class="w-full pl-10 pr-4 py-3 rounded-xl form-input text-sm">
                    </div>
                </div>

                <div class="flex items-center justify-between text-xs text-slate-400 pt-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-slate-700 bg-slate-900 text-amber-500 focus:ring-amber-400">
                        <span>लॉगिन याद रखें (Remember me)</span>
                    </label>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 px-4 rounded-xl btn-gold text-slate-950 font-bold text-sm sm:text-base flex items-center justify-center gap-2 shadow-lg">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span>लॉगिन करें (Sign In)</span>
                    </button>
                </div>
            </form>

            <!-- Register Link -->
            <div class="mt-6 pt-6 border-t border-slate-800 text-center text-xs text-slate-400">
                क्या आपने अभी तक रजिस्टर नहीं किया?
                <a href="<?= BASE_URL ?>/register.php" class="text-amber-400 font-bold hover:underline ml-1">
                    नया खाता बनाएँ &rarr;
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
