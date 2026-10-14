<?php
/**
 * Member Portal Header & Navigation Component
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/../includes/auth_check.php';

$current_page = basename($_SERVER['PHP_SELF']);
$logged_user = current_user();
$flash = get_flash();
?>
<!DOCTYPE html>
<html lang="hi" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? e($page_title) . ' | सदस्य पोर्टल' : 'छात्र व सदस्य डैशबोर्ड | ' . SITE_NAME ?></title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            dark: '#090d16',
                            card: '#0f172a',
                            border: '#1e293b',
                            gold: '#f59e0b',
                            cyan: '#38bdf8'
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
</head>
<body class="bg-[#090d16] text-slate-100 min-h-screen flex flex-col antialiased">

    <!-- Top Bar -->
    <header class="sticky top-0 z-50 bg-[#0c1220]/95 backdrop-blur-md border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Brand / Portal Name -->
                <div class="flex items-center gap-3">
                    <a href="<?= BASE_URL ?>/dashboard/index.php" class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center text-slate-950 font-black text-lg shadow-md">
                            <i class="fa-solid fa-gauge-high"></i>
                        </div>
                        <div>
                            <span class="text-base sm:text-lg font-bold text-white font-['Poppins']">
                                सदस्य पोर्टल <span class="text-amber-400 text-xs">| PsychFiTech®</span>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Navigation Links for Dashboard -->
                <nav class="hidden md:flex items-center space-x-1 text-xs font-semibold">
                    <a href="<?= BASE_URL ?>/dashboard/index.php" class="px-3 py-2 rounded-lg <?= $current_page == 'index.php' ? 'text-amber-400 bg-slate-800' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' ?>">
                        <i class="fa-solid fa-house mr-1"></i> डैशबोर्ड
                    </a>
                    <a href="<?= BASE_URL ?>/dashboard/services.php" class="px-3 py-2 rounded-lg <?= $current_page == 'services.php' || $current_page == 'service-detail.php' ? 'text-amber-400 bg-slate-800' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' ?>">
                        <i class="fa-solid fa-cubes mr-1"></i> सभी सर्विसेज
                    </a>
                    <a href="<?= BASE_URL ?>/dashboard/action-plan.php" class="px-3 py-2 rounded-lg <?= $current_page == 'action-plan.php' ? 'text-amber-400 bg-slate-800' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' ?>">
                        <i class="fa-solid fa-calendar-check mr-1"></i> 30-दिन एक्शन प्लान
                    </a>
                    <a href="<?= BASE_URL ?>/dashboard/ai-tools.php" class="px-3 py-2 rounded-lg <?= $current_page == 'ai-tools.php' ? 'text-amber-400 bg-slate-800' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' ?>">
                        <i class="fa-solid fa-robot mr-1"></i> AI टूल्स लैब
                    </a>
                    <a href="<?= BASE_URL ?>/dashboard/profile.php" class="px-3 py-2 rounded-lg <?= $current_page == 'profile.php' ? 'text-amber-400 bg-slate-800' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' ?>">
                        <i class="fa-solid fa-user-gear mr-1"></i> प्रोफाइल
                    </a>
                </nav>

                <!-- Right Quick Actions -->
                <div class="flex items-center gap-3">
                    <a href="<?= BASE_URL ?>/index.php" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-slate-800/80 hover:bg-slate-800 text-xs text-slate-300 hover:text-white border border-slate-700 transition" title="मुख्य वेबसाइट देखें">
                        <i class="fa-solid fa-globe"></i>
                        <span>मुख्य वेबसाइट</span>
                    </a>
                    <div class="flex items-center gap-2 pl-2 border-l border-slate-800">
                        <div class="w-8 h-8 rounded-full bg-amber-500/20 text-amber-400 border border-amber-500/40 flex items-center justify-center font-bold text-xs">
                            <?= mb_strtoupper(mb_substr($logged_user['name'], 0, 1, 'UTF-8'), 'UTF-8') ?>
                        </div>
                        <a href="<?= BASE_URL ?>/logout.php" class="px-2.5 py-1.5 rounded-lg text-xs text-slate-400 hover:text-rose-400 transition" title="लॉगआउट">
                            <i class="fa-solid fa-power-off text-sm"></i>
                        </a>
                    </div>

                    <!-- Mobile Drawer Toggle -->
                    <button type="button" id="mobile-menu-btn" class="md:hidden p-2 text-slate-400 hover:text-white">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer -->
        <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-b border-slate-800 px-4 py-3 space-y-1 text-sm">
            <a href="<?= BASE_URL ?>/dashboard/index.php" class="block px-3 py-2 rounded-lg text-slate-200 hover:bg-slate-800">डैशबोर्ड ओवरव्यू</a>
            <a href="<?= BASE_URL ?>/dashboard/services.php" class="block px-3 py-2 rounded-lg text-slate-200 hover:bg-slate-800">सभी सर्विसेज (All Services)</a>
            <a href="<?= BASE_URL ?>/dashboard/action-plan.php" class="block px-3 py-2 rounded-lg text-slate-200 hover:bg-slate-800">30-दिन एक्शन प्लान</a>
            <a href="<?= BASE_URL ?>/dashboard/ai-tools.php" class="block px-3 py-2 rounded-lg text-slate-200 hover:bg-slate-800">AI टूल्स लैब</a>
            <a href="<?= BASE_URL ?>/dashboard/profile.php" class="block px-3 py-2 rounded-lg text-slate-200 hover:bg-slate-800">प्रोफाइल व सेटिंग्स</a>
            <a href="<?= BASE_URL ?>/index.php" target="_blank" class="block px-3 py-2 rounded-lg text-amber-400 hover:bg-slate-800">मुख्य वेबसाइट देखें &rarr;</a>
            <a href="<?= BASE_URL ?>/logout.php" class="block px-3 py-2 rounded-lg text-rose-400 hover:bg-slate-800">लॉगआउट करें</a>
        </div>
    </header>

    <!-- Flash message -->
    <?php if ($flash): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full flash-alert">
            <div class="p-3.5 rounded-xl flex items-center justify-between <?= $flash['type'] === 'success' ? 'bg-emerald-950/80 border border-emerald-500/40 text-emerald-200' : 'bg-rose-950/80 border border-rose-500/40 text-rose-200' ?>">
                <div class="flex items-center gap-2.5 text-xs sm:text-sm font-medium">
                    <i class="fa-solid <?= $flash['type'] === 'success' ? 'fa-circle-check text-emerald-400' : 'fa-circle-exclamation text-rose-400' ?>"></i>
                    <span><?= e($flash['message']) ?></span>
                </div>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-slate-400 hover:text-white">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <main class="flex-grow">
