<?php
/**
 * Global Header Component
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/helpers.php';

$current_page = basename($_SERVER['PHP_SELF']);
$logged_user = current_user();
$flash = get_flash();
?>
<!DOCTYPE html>
<html lang="hi" class="dark scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? e($page_title) . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_TAGLINE ?></title>
    <meta name="description" content="डिजिटल दुनिया में सही निर्णय, बेहतर करियर और पैसे की समझ। विद्यार्थियों और युवाओं के लिए AI, करियर और वित्तीय जागरूकता मंच।">

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
                            goldLight: '#fbbf24',
                            cyan: '#38bdf8',
                            cyanDark: '#0284c7'
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
<body class="bg-[#090d16] text-slate-100 min-h-screen flex flex-col antialiased selection:bg-amber-500 selection:text-slate-900">

    <!-- Top Awareness Bar -->
    <div class="bg-gradient-to-r from-amber-600 via-amber-500 to-amber-700 text-slate-950 text-xs sm:text-sm font-semibold py-2 px-4 shadow-md">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-2">
                <span class="inline-block px-2 py-0.5 bg-slate-900 text-amber-400 rounded text-xs uppercase tracking-wide">विशेष सत्र</span>
                <span>DIGITAL LIFE, CAREER & MONEY — <strong>सुनील कोसारिया</strong> (लेखक: The Great Economic Divide)</span>
            </div>
            <div class="flex items-center gap-4 text-xs sm:text-sm">
                <a href="<?= BASE_URL ?>/services.php" class="underline hover:text-white transition">₹999 विशेष बंडल ऑफर देखें &rarr;</a>
                <span class="hidden md:inline">|</span>
                <span class="hidden md:inline"><i class="fa-solid fa-clock mr-1"></i> 45 मिनट जागरूकता सत्र</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-50 bg-[#090d16]/90 backdrop-blur-md border-b border-slate-800 transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Brand Logo & Title -->
                <div class="flex items-center gap-3">
                    <a href="<?= BASE_URL ?>/index.php" class="flex items-center gap-3 group">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-amber-500 to-amber-700 flex items-center justify-center text-slate-950 font-black text-xl shadow-lg shadow-amber-500/20 group-hover:scale-105 transition-transform">
                            <i class="fa-solid fa-brain"></i>
                        </div>
                        <div>
                            <span class="text-xl font-bold tracking-tight text-white flex items-center gap-1 font-['Poppins']">
                                PsychFiTech<span class="text-amber-400 text-xs align-super">®</span>
                            </span>
                            <span class="text-[11px] block font-medium text-amber-400 tracking-wider">डिजिटल स्कूल &amp; करियर</span>
                        </div>
                    </a>
                </div>

                <!-- Desktop Navigation Menu -->
                <nav class="hidden lg:flex items-center space-x-1 xl:space-x-2 text-sm font-medium">
                    <a href="<?= BASE_URL ?>/index.php" class="px-3 py-2 rounded-lg <?= $current_page == 'index.php' ? 'text-amber-400 bg-slate-800/80 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/40' ?> transition">होम</a>
                    <a href="<?= BASE_URL ?>/career-guide.php" class="px-3 py-2 rounded-lg <?= $current_page == 'career-guide.php' ? 'text-amber-400 bg-slate-800/80 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/40' ?> transition">करियर गाइडेंस</a>
                    <a href="<?= BASE_URL ?>/financial-literacy.php" class="px-3 py-2 rounded-lg <?= $current_page == 'financial-literacy.php' ? 'text-amber-400 bg-slate-800/80 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/40' ?> transition">वित्तीय शिक्षा</a>
                    <a href="<?= BASE_URL ?>/ai-digital.php" class="px-3 py-2 rounded-lg <?= $current_page == 'ai-digital.php' ? 'text-amber-400 bg-slate-800/80 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/40' ?> transition">AI &amp; डिजिटल</a>
                    <a href="<?= BASE_URL ?>/services.php" class="px-3 py-2 rounded-lg <?= $current_page == 'services.php' ? 'text-amber-400 bg-slate-800/80 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/40' ?> transition">सर्विसेज</a>
                    <a href="<?= BASE_URL ?>/about.php" class="px-3 py-2 rounded-lg <?= $current_page == 'about.php' ? 'text-amber-400 bg-slate-800/80 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/40' ?> transition">सत्र परिचय</a>
                    <a href="<?= BASE_URL ?>/contact.php" class="px-3 py-2 rounded-lg <?= $current_page == 'contact.php' ? 'text-amber-400 bg-slate-800/80 font-semibold' : 'text-slate-300 hover:text-white hover:bg-slate-800/40' ?> transition">सवाल-जवाब</a>
                </nav>

                <!-- Auth / Action Buttons -->
                <div class="hidden md:flex items-center space-x-3">
                    <?php if ($logged_user): ?>
                        <a href="<?= BASE_URL ?>/dashboard/index.php" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-slate-800 border border-slate-700 text-amber-400 text-sm font-semibold hover:border-amber-400 transition shadow-sm">
                            <i class="fa-solid fa-gauge-high"></i>
                            <span><?= e($logged_user['name']) ?></span>
                        </a>
                        <a href="<?= BASE_URL ?>/logout.php" class="px-3 py-2 rounded-xl text-slate-400 hover:text-rose-400 text-sm transition" title="लॉगआउट">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/login.php" class="px-4 py-2 text-sm font-semibold text-slate-300 hover:text-white hover:bg-slate-800/60 rounded-xl transition">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-1"></i> लॉगिन
                        </a>
                        <a href="<?= BASE_URL ?>/register.php" class="px-4 py-2 text-sm font-bold bg-gradient-to-r from-amber-500 to-amber-600 text-slate-950 rounded-xl shadow-lg shadow-amber-500/20 hover:from-amber-400 hover:to-amber-500 hover:scale-105 transition duration-200">
                            <i class="fa-solid fa-user-plus mr-1"></i> रजिस्ट्रेशन करें
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Mobile menu toggle button -->
                <div class="flex lg:hidden items-center">
                    <button type="button" id="mobile-menu-btn" class="p-2.5 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 focus:outline-none">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile dropdown drawer -->
        <div id="mobile-menu" class="hidden lg:hidden bg-slate-900 border-b border-slate-800 px-4 pt-3 pb-6 space-y-2">
            <a href="<?= BASE_URL ?>/index.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">होम</a>
            <a href="<?= BASE_URL ?>/career-guide.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">करियर गाइडेंस</a>
            <a href="<?= BASE_URL ?>/financial-literacy.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">वित्तीय शिक्षा</a>
            <a href="<?= BASE_URL ?>/ai-digital.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">AI &amp; डिजिटल</a>
            <a href="<?= BASE_URL ?>/services.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">सर्विसेज</a>
            <a href="<?= BASE_URL ?>/about.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">सत्र परिचय</a>
            <a href="<?= BASE_URL ?>/contact.php" class="block px-3 py-2 rounded-lg text-base font-medium text-slate-200 hover:bg-slate-800 hover:text-amber-400">सवाल-जवाब</a>

            <div class="pt-4 border-t border-slate-800 flex flex-col gap-2">
                <?php if ($logged_user): ?>
                    <a href="<?= BASE_URL ?>/dashboard/index.php" class="w-full text-center py-2.5 rounded-xl bg-amber-500 text-slate-950 font-bold">
                        <i class="fa-solid fa-gauge-high mr-1"></i> <?= e($logged_user['name']) ?> (पैनल में जाएं)
                    </a>
                    <a href="<?= BASE_URL ?>/logout.php" class="w-full text-center py-2 rounded-xl text-rose-400 hover:bg-slate-800">
                        लॉगआउट करें
                    </a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/login.php" class="w-full text-center py-2.5 rounded-xl bg-slate-800 text-white font-semibold">
                        लॉगिन
                    </a>
                    <a href="<?= BASE_URL ?>/register.php" class="w-full text-center py-2.5 rounded-xl bg-amber-500 text-slate-950 font-bold">
                        रजिस्ट्रेशन करें
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Flash message notification banner -->
    <?php if ($flash): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 w-full flash-alert">
            <div class="p-4 rounded-xl flex items-center justify-between <?= $flash['type'] === 'success' ? 'bg-emerald-950/80 border border-emerald-500/40 text-emerald-200' : ($flash['type'] === 'error' ? 'bg-rose-950/80 border border-rose-500/40 text-rose-200' : 'bg-amber-950/80 border border-amber-500/40 text-amber-200') ?>">
                <div class="flex items-center gap-3">
                    <i class="fa-solid <?= $flash['type'] === 'success' ? 'fa-circle-check text-emerald-400' : ($flash['type'] === 'error' ? 'fa-circle-exclamation text-rose-400' : 'fa-circle-info text-amber-400') ?> text-lg"></i>
                    <span class="text-sm font-medium"><?= e($flash['message']) ?></span>
                </div>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-slate-400 hover:text-white">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <!-- Main Content Wrapper -->
    <main class="flex-grow">
