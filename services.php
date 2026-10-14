<?php
/**
 * Services and Programs Catalog Page
 * PsychFiTech® | Digital Life, Career & Money
 * Shows all services from presentation and connects them to member panel
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/helpers.php';

$page_title = "सर्विसेज और शैक्षणिक प्रोग्राम्स";
$logged_user = current_user();

// Fetch services from database
$services = [];
try {
    $stmt = $pdo->query("SELECT * FROM services ORDER BY order_num ASC");
    $services = $stmt->fetchAll();
} catch (Exception $e) {
    // If DB read fails, keep empty array
}

require_once __DIR__ . '/includes/header.php';
?>

<!-- Header Banner -->
<div class="relative py-12 lg:py-16 bg-[#0c1322] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            <i class="fa-solid fa-cubes mr-1"></i> प्रेजेंटेशन आधारित सर्विसेज
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white font-['Poppins']">
            हमारी मुख्य <span class="gradient-text-gold">सर्विसेज और प्रोग्राम्स</span>
        </h1>
        <p class="text-slate-300 text-base sm:text-lg leading-relaxed mt-4">
            प्रस्तुति में प्रदर्शित सभी प्रमुख शैक्षणिक, AI टूल्स, वित्तीय गाइडेंस और करियर संसाधन। 
            <span class="text-amber-400 block mt-1">सभी सर्विसेज लॉगिन के बाद सीधे आपके सदस्य पैनल (Dashboard) में उपलब्ध हैं!</span>
        </p>

        <!-- Access Notice Pill -->
        <div class="mt-6 inline-flex items-center gap-2 p-2 px-4 rounded-xl bg-slate-900 border border-slate-800 text-xs text-slate-300">
            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
            <span>निःशुल्क सदस्य रजिस्ट्रेशन के साथ डैशबोर्ड में तुरंत एक्सेस सक्रिय हो जाता है।</span>
        </div>
    </div>
</div>

<!-- Services Grid -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($services as $srv): ?>
                <div class="glass-card rounded-2xl p-6 sm:p-7 border border-slate-800 flex flex-col justify-between relative group">
                    <!-- Category & Badge -->
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[11px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-md bg-slate-800 text-slate-300 border border-slate-700">
                            <?= e($srv['category']) ?>
                        </span>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full badge-gold">
                            <?= e($srv['badge']) ?>
                        </span>
                    </div>

                    <!-- Icon & Titles -->
                    <div>
                        <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl mb-4 group-hover:scale-110 transition-transform">
                            <i class="fa-solid <?= e($srv['icon']) ?>"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-1 font-['Poppins']">
                            <?= e($srv['title_hi']) ?>
                        </h3>
                        <div class="text-xs text-amber-400 font-semibold mb-3">
                            <?= e($srv['title']) ?>
                        </div>
                        <p class="text-slate-300 text-sm leading-relaxed mb-4">
                            <?= e($srv['short_desc_hi']) ?>
                        </p>
                    </div>

                    <!-- Member Panel Access Button -->
                    <div class="pt-4 border-t border-slate-800/80 mt-auto">
                        <?php if ($logged_user): ?>
                            <a href="<?= BASE_URL ?>/dashboard/service-detail.php?slug=<?= e($srv['slug']) ?>" class="w-full py-2.5 px-4 rounded-xl btn-gold text-slate-950 font-bold text-xs flex items-center justify-center gap-2">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                <span>पैनल में सर्विस खोलें</span>
                            </a>
                        <?php else: ?>
                            <a href="<?= BASE_URL ?>/login.php?redirect=service-<?= e($srv['slug']) ?>" class="w-full py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-700 border border-slate-700 text-slate-200 hover:text-white font-semibold text-xs flex items-center justify-center gap-2 transition">
                                <i class="fa-solid fa-lock text-amber-400"></i>
                                <span>लॉगिन कर एक्सेस करें</span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- Featured Special Offer Banner (Slide 21) -->
<section class="py-16 bg-gradient-to-r from-slate-950 via-[#0a1122] to-slate-950 border-b border-slate-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-3xl glass-card-static border border-amber-500/40 p-6 sm:p-10 relative overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-4">
                    <span class="px-3 py-1 rounded-full bg-amber-500/20 text-amber-400 text-xs font-bold uppercase tracking-wider">
                        विशेष छात्र पैकेज (Slide 21)
                    </span>
                    <h2 class="text-2xl sm:text-4xl font-black text-white font-['Poppins']">
                        7-Day AI Practical Course + <br>
                        <span class="gradient-text-gold">The Great Economic Divide (Book)</span>
                    </h2>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        7 दिनों के व्यावहारिक AI कोर्स के साथ सुनील कोसारिया जी की चर्चित पुस्तक की प्रिंटेड कॉपी आपके पते पर और डिजिटल PDF तुरंत मुफ्त!
                    </p>
                    <div class="flex items-baseline gap-4 pt-2">
                        <span class="text-3xl font-black text-amber-400">मात्र ₹ 999/-</span>
                        <span class="line-through text-slate-500 text-sm">कुल मूल्य: ₹1,398</span>
                        <span class="text-xs text-emerald-400 font-bold bg-emerald-500/10 px-2.5 py-1 rounded border border-emerald-500/30">बचत: ₹399</span>
                    </div>
                </div>
                <div class="lg:col-span-4 flex flex-col gap-3">
                    <a href="<?= BASE_URL ?>/register.php" class="w-full py-3.5 px-4 rounded-xl btn-gold text-slate-950 font-bold text-center text-sm shadow-xl">
                        <i class="fa-solid fa-bolt mr-1"></i> अभी रजिस्ट्रेशन कर बुक करें
                    </a>
                    <a href="<?= BASE_URL ?>/contact.php" class="w-full py-2.5 px-4 rounded-xl bg-slate-800 text-slate-300 font-semibold text-center text-xs hover:text-white border border-slate-700 transition">
                        कोई सवाल है? संपर्क करें
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Callout to Register / Login -->
<section class="py-14 bg-[#090d16] text-center">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">
        <h3 class="text-2xl font-bold text-white mb-3 font-['Poppins']">
            सभी सर्विसेज का कस्टमाइज़्ड एक्सेस आपके पैनल में
        </h3>
        <p class="text-slate-400 text-sm mb-6">
            प्रस्तुति में बताए गए सभी ई-लर्निंग मॉड्यूल्स, डाउनलोड्स और टूल्स का विवरण आपके स्टूडेंट पोर्टल में उपलब्ध कराया जाएगा।
        </p>
        <div class="flex justify-center gap-4">
            <a href="<?= BASE_URL ?>/register.php" class="px-6 py-3 rounded-xl btn-gold text-slate-950 font-bold text-sm">
                रजिस्ट्रेशन करें &rarr;
            </a>
            <a href="<?= BASE_URL ?>/login.php" class="px-6 py-3 rounded-xl bg-slate-800 text-white font-semibold text-sm border border-slate-700">
                सदस्य लॉगिन
            </a>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
