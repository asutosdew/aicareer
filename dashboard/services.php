<?php
/**
 * Member Portal Services Hub
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/../includes/auth_check.php';

$page_title = "सभी सर्विसेज व कोर्सेज (Services Hub)";
$logged_user = current_user();

// Fetch services
$services = [];
try {
    $stmt = $pdo->query("SELECT * FROM services ORDER BY order_num ASC");
    $services = $stmt->fetchAll();
} catch (Exception $e) {
    // fallback
}

require_once __DIR__ . '/../includes/member_header.php';
?>

<div class="py-8 sm:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 border-b border-slate-800 pb-6">
            <div>
                <span class="text-xs text-amber-400 font-bold uppercase tracking-wider block mb-1">
                    <i class="fa-solid fa-cubes mr-1"></i> प्रेजेंटेशन सर्विसेज हब
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                    आपके नामांकित ई-लर्निंग प्रोग्राम्स व सर्विसेज
                </h1>
                <p class="text-slate-400 text-xs sm:text-sm mt-1">
                    प्रस्तुति में दिखाए गए सभी शैक्षणिक कोर्सेज, टूल्स और मेंटरशिप मॉड्यूल्स का विस्तृत विवरण।
                </p>
            </div>
            <div class="p-3 rounded-xl bg-amber-500/10 border border-amber-500/20 text-xs text-amber-300 max-w-sm">
                <i class="fa-solid fa-circle-info mr-1"></i>
                <strong>सूचना:</strong> सर्विसेज का विस्तृत पाठ्यक्रम (Syllabus) और विशिष्ट लिंक्स आपके लिए तैयार किए गए हैं।
            </div>
        </div>

        <!-- Services Detailed Cards -->
        <div class="space-y-6">
            <?php foreach ($services as $srv): ?>
                <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800 hover:border-slate-700 transition relative">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-center">
                        
                        <!-- Left Info -->
                        <div class="lg:col-span-8 space-y-3">
                            <div class="flex items-center gap-2.5">
                                <span class="px-2.5 py-0.5 rounded-md bg-slate-800 text-[11px] font-bold uppercase text-slate-300 border border-slate-700">
                                    <?= e($srv['category']) ?>
                                </span>
                                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold badge-gold">
                                    <?= e($srv['badge']) ?>
                                </span>
                                <span class="text-xs text-emerald-400 flex items-center gap-1 font-medium">
                                    <i class="fa-solid fa-circle-check text-[10px]"></i> सक्रिय (Active)
                                </span>
                            </div>

                            <div class="flex items-start gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl shrink-0 mt-1">
                                    <i class="fa-solid <?= e($srv['icon']) ?>"></i>
                                </div>
                                <div>
                                    <h3 class="text-xl sm:text-2xl font-bold text-white font-['Poppins']">
                                        <?= e($srv['title_hi']) ?>
                                    </h3>
                                    <div class="text-xs text-amber-400 font-semibold mb-2">
                                        <?= e($srv['title']) ?>
                                    </div>
                                    <p class="text-slate-300 text-sm leading-relaxed">
                                        <?= e($srv['short_desc_hi']) ?>
                                    </p>
                                    <p class="text-slate-400 text-xs mt-1">
                                        <?= e($srv['short_desc']) ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Right Actions -->
                        <div class="lg:col-span-4 flex flex-col sm:flex-row lg:flex-col gap-3 justify-center">
                            <a href="<?= BASE_URL ?>/dashboard/service-detail.php?slug=<?= e($srv['slug']) ?>" class="w-full py-3 px-5 rounded-xl btn-gold text-slate-950 font-bold text-xs sm:text-sm text-center flex items-center justify-center gap-2 shadow-md">
                                <i class="fa-solid fa-play"></i>
                                <span>सर्विस विवरण व मॉड्यूल खोलें</span>
                            </a>
                            <a href="<?= BASE_URL ?>/dashboard/ai-tools.php" class="w-full py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white font-semibold text-xs text-center border border-slate-700 transition">
                                <i class="fa-solid fa-file-arrow-down mr-1"></i> स्टडी मैटेरियल / टूल्स
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
