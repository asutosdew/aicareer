<?php
/**
 * Member Portal Dashboard Overview
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/../includes/auth_check.php';

$page_title = "सदस्य डैशबोर्ड ओवरव्यू";
$logged_user = current_user();

// Fetch services
$services = [];
try {
    $stmt = $pdo->query("SELECT * FROM services ORDER BY order_num ASC");
    $services = $stmt->fetchAll();
} catch (Exception $e) {
    // fallback
}

// Fetch user action plan
$action_plan = null;
try {
    $plan_stmt = $pdo->prepare("SELECT * FROM user_action_plans WHERE user_id = ? ORDER BY id DESC LIMIT 1");
    $plan_stmt->execute([$logged_user['id']]);
    $action_plan = $plan_stmt->fetch();
} catch (Exception $e) {
    // ignore
}

// Check for new registration WhatsApp community prompt
$show_whatsapp_modal = false;
if (isset($_GET['welcome_wa']) || !empty($_SESSION['new_registration_whatsapp'])) {
    $show_whatsapp_modal = true;
    unset($_SESSION['new_registration_whatsapp']);
}

require_once __DIR__ . '/../includes/member_header.php';
?>

<!-- WhatsApp Community Onboarding Modal (Triggered on Registration) -->
<?php if ($show_whatsapp_modal): ?>
<div id="whatsapp-welcome-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm animate-fade-in">
    <div class="relative w-full max-w-lg rounded-3xl bg-[#0f172a] border-2 border-emerald-500/50 p-6 sm:p-8 shadow-2xl text-center space-y-5">
        <!-- Close button -->
        <button type="button" onclick="document.getElementById('whatsapp-welcome-modal').remove()" class="absolute top-4 right-4 text-slate-400 hover:text-white p-2 rounded-xl bg-slate-800/80">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>

        <!-- WhatsApp Icon Badge -->
        <div class="w-20 h-20 rounded-3xl bg-emerald-500/20 text-emerald-400 border border-emerald-500/40 flex items-center justify-center text-4xl mx-auto shadow-xl shadow-emerald-500/10">
            <i class="fa-brands fa-whatsapp"></i>
        </div>

        <div>
            <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold uppercase tracking-wider mb-2">
                🎉 रजिस्ट्रेशन सफल! अंतिम कदम:
            </span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                आधिकारिक WhatsApp कम्युनिटी से जुड़ें
            </h2>
            <p class="text-slate-300 text-xs sm:text-sm mt-2 leading-relaxed">
                नमस्ते <strong><?= e($logged_user['name']) ?></strong>! आपकी सीट आरक्षित हो गई है। सभी लाइव क्लास लिंक्स, दैनिक AI प्रॉम्प्ट्स और मेंटर अपडेट्स पाने के लिए कृपया हमारे मुख्य व्हाट्सऐप ग्रुप से अभी जुड़ें:
            </p>
        </div>

        <!-- Community Benefits -->
        <div class="p-3.5 rounded-2xl bg-slate-900/80 border border-slate-800 text-left text-xs text-slate-300 space-y-2">
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-400"></i>
                <span>दैनिक AI प्रॉम्प्ट्स और हैंड्स-ऑन असाइनमेंट्स</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-400"></i>
                <span>लाइव ज़ूम/गूगल मीट क्लास लिंक्स और रिकॉर्डिंग्स</span>
            </div>
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-circle-check text-emerald-400"></i>
                <span>सुनील कोसारिया जी व मेंटर्स से सीधे सवाल-जवाब</span>
            </div>
        </div>

        <!-- Join WhatsApp Community Button -->
        <div class="pt-2 space-y-3">
            <a href="<?= e(WHATSAPP_COMMUNITY_URL) ?>" target="_blank" onclick="document.getElementById('whatsapp-welcome-modal').remove()"
                class="w-full py-4 px-6 rounded-2xl bg-gradient-to-r from-emerald-500 to-green-600 hover:from-emerald-400 hover:to-green-500 text-slate-950 font-black text-base flex items-center justify-center gap-2.5 shadow-xl shadow-emerald-500/30 transition transform hover:scale-[1.02]">
                <i class="fa-brands fa-whatsapp text-2xl"></i>
                <span>व्हाट्सऐप कम्युनिटी में अभी जुड़ें &rarr;</span>
            </a>
            
            <button type="button" onclick="document.getElementById('whatsapp-welcome-modal').remove()" class="text-xs text-slate-400 hover:text-slate-200">
                मैं जुड़ चुका हूँ / डैशबोर्ड जारी रखें
            </button>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="py-8 sm:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Welcome Hero Banner -->
        <div class="rounded-3xl glass-card-static border border-amber-500/30 p-6 sm:p-8 relative overflow-hidden bg-gradient-to-r from-slate-900 via-[#0d1527] to-slate-900">
            <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div class="space-y-2">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-400 text-xs font-bold uppercase">
                        <i class="fa-solid fa-graduation-cap"></i> छात्र एवं युवा सदस्य पैनल
                    </div>
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                        नमस्ते, <span class="gradient-text-gold"><?= e($logged_user['name']) ?></span>!
                    </h1>
                    <p class="text-slate-300 text-sm max-w-2xl leading-relaxed">
                        प्रेजेंटेशन <em>"DIGITAL LIFE, CAREER &amp; MONEY"</em> के सभी सर्विसेज और ई-लर्निंग टूल्स आपके इस पैनल में सक्रिय हैं। अपनी पसंद की सर्विस चुनें और सीखना शुरू करें।
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2 text-xs">
                        <span class="px-2.5 py-1 rounded-md bg-slate-800 text-slate-300 border border-slate-700">
                            <strong>शिक्षा स्तर:</strong> <?= e($logged_user['qualification'] ?: 'छात्र') ?>
                        </span>
                        <span class="px-2.5 py-1 rounded-md bg-slate-800 text-amber-400 border border-slate-700">
                            <strong>रुचि:</strong> <?= e($logged_user['career_interest'] ?: 'AI & Automation') ?>
                        </span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row md:flex-col gap-3 shrink-0">
                    <a href="<?= e(WHATSAPP_COMMUNITY_URL) ?>" target="_blank" class="px-5 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs sm:text-sm text-center shadow-lg flex items-center justify-center gap-2 transition">
                        <i class="fa-brands fa-whatsapp text-lg"></i>
                        <span>WhatsApp कम्युनिटी</span>
                    </a>
                    <a href="<?= BASE_URL ?>/dashboard/action-plan.php" class="px-5 py-2.5 rounded-xl btn-gold text-slate-950 font-bold text-xs sm:text-sm text-center shadow-lg">
                        <i class="fa-solid fa-calendar-check mr-1.5"></i> मेरा 30-दिन प्लान
                    </a>
                </div>
            </div>
        </div>

        <!-- Permanent WhatsApp Community Card -->
        <div class="rounded-2xl p-5 sm:p-6 bg-gradient-to-r from-emerald-950/70 via-slate-900 to-slate-900 border border-emerald-500/40 flex flex-col md:flex-row items-center justify-between gap-5 shadow-lg">
            <div class="flex items-center gap-4 text-center md:text-left">
                <div class="w-14 h-14 rounded-2xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-3xl shrink-0 border border-emerald-500/30">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div>
                    <div class="text-xs text-emerald-400 font-bold uppercase tracking-wider flex items-center justify-center md:justify-start gap-1.5">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <?= e(WHATSAPP_COMMUNITY_NAME) ?>
                    </div>
                    <h3 class="text-lg font-bold text-white mt-0.5">
                        छात्र एवं मेंटर कम्युनिटी ग्रुप
                    </h3>
                    <p class="text-xs text-slate-300 mt-1">
                        दैनिक AI प्रॉम्प्ट्स, क्लास शेड्यूल्स, स्टडी मैटेरियल और साथी छात्रों के साथ नेटवर्किंग के लिए ग्रुप से जुड़े रहें।
                    </p>
                </div>
            </div>
            <a href="<?= e(WHATSAPP_COMMUNITY_URL) ?>" target="_blank" class="shrink-0 px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs sm:text-sm flex items-center gap-2 shadow-lg transition">
                <i class="fa-brands fa-whatsapp text-lg"></i>
                <span>कम्युनिटी में शामिल हों</span>
                <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
            </a>
        </div>

        <!-- Quick Stats Grid -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="glass-card rounded-2xl p-5 border border-slate-800 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-cubes"></i>
                </div>
                <div>
                    <div class="text-2xl font-black text-white"><?= count($services) ?></div>
                    <div class="text-xs text-slate-400">कुल सर्विसेज सक्रिय</div>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-5 border border-slate-800 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div>
                    <div class="text-2xl font-black text-white">30 Days</div>
                    <div class="text-xs text-slate-400">एक्शन प्लान अवधि</div>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-5 border border-slate-800 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div>
                    <div class="text-2xl font-black text-white">FREE</div>
                    <div class="text-xs text-slate-400">बुक नोट्स &amp; गाइड्स</div>
                </div>
            </div>

            <div class="glass-card rounded-2xl p-5 border border-slate-800 flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-award"></i>
                </div>
                <div>
                    <div class="text-2xl font-black text-white">सक्रिय</div>
                    <div class="text-xs text-slate-400">मेंबरशिप स्टेटस</div>
                </div>
            </div>
        </div>

        <!-- Section: Available Services (All services shown in presentation) -->
        <div class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-white font-['Poppins']">
                        उपलब्ध सर्विसेज एवं ई-लर्निंग मॉड्यूल्स
                    </h2>
                    <p class="text-slate-400 text-xs sm:text-sm mt-0.5">
                        प्रस्तुति में दिखाई गई सभी 6 मुख्य सर्विसेज आपके लिए उपलब्ध हैं:
                    </p>
                </div>
                <a href="<?= BASE_URL ?>/dashboard/services.php" class="text-amber-400 text-xs font-bold hover:underline">
                    विस्तार से देखें &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($services as $srv): ?>
                    <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 rounded bg-slate-800 text-slate-300">
                                    <?= e($srv['category']) ?>
                                </span>
                                <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full badge-cyan">
                                    <?= e($srv['badge']) ?>
                                </span>
                            </div>

                            <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-lg mb-3">
                                <i class="fa-solid <?= e($srv['icon']) ?>"></i>
                            </div>

                            <h3 class="text-lg font-bold text-white mb-1 font-['Poppins']">
                                <?= e($srv['title_hi']) ?>
                            </h3>
                            <div class="text-xs text-amber-400 font-medium mb-3">
                                <?= e($srv['title']) ?>
                            </div>
                            <p class="text-xs text-slate-300 leading-relaxed mb-4">
                                <?= e($srv['short_desc_hi']) ?>
                            </p>
                        </div>

                        <div class="pt-3 border-t border-slate-800">
                            <a href="<?= BASE_URL ?>/dashboard/service-detail.php?slug=<?= e($srv['slug']) ?>" class="w-full py-2.5 rounded-xl btn-gold text-slate-950 font-bold text-xs flex items-center justify-center gap-1.5 shadow-sm">
                                <span>मॉड्यूल खोलें &amp; विवरण देखें</span>
                                <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 30-Day Personal Action Plan Quick Widget (Slide 18) -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                <div>
                    <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block">Slide 18 Action Plan</span>
                    <h3 class="text-xl font-bold text-white font-['Poppins']">
                        आपका 30-दिवसीय पर्सनल एक्शन प्लान
                    </h3>
                    <p class="text-slate-400 text-xs mt-1">
                        "अगले 30 दिन में मैं क्या करूँगा?" — अपनी प्रगति को ट्रैक करें:
                    </p>
                </div>
                <a href="<?= BASE_URL ?>/dashboard/action-plan.php" class="px-4 py-2 rounded-xl bg-slate-800 hover:bg-slate-700 text-amber-400 font-bold text-xs border border-slate-700 transition self-start md:self-auto">
                    <i class="fa-solid fa-pen-to-square mr-1"></i> प्लान अपडेट करें
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-300">सप्ताह 1 (Week 1)</span>
                        <span class="text-xs <?= !empty($action_plan['week1_progress']) ? 'text-emerald-400' : 'text-slate-400' ?>">
                            <i class="fa-solid <?= !empty($action_plan['week1_progress']) ? 'fa-check-circle' : 'fa-circle' ?>"></i>
                        </span>
                    </div>
                    <p class="text-xs text-slate-400">एक करियर विकल्प पर गहन रिसर्च करना।</p>
                </div>

                <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-300">सप्ताह 2 (Week 2)</span>
                        <span class="text-xs <?= !empty($action_plan['week2_progress']) ? 'text-emerald-400' : 'text-slate-400' ?>">
                            <i class="fa-solid <?= !empty($action_plan['week2_progress']) ? 'fa-check-circle' : 'fa-circle' ?>"></i>
                        </span>
                    </div>
                    <p class="text-xs text-slate-400">एक नई AI या तकनीकी स्किल सीखना शुरू करना।</p>
                </div>

                <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-300">सप्ताह 3 (Week 3)</span>
                        <span class="text-xs <?= !empty($action_plan['week3_progress']) ? 'text-emerald-400' : 'text-slate-400' ?>">
                            <i class="fa-solid <?= !empty($action_plan['week3_progress']) ? 'fa-check-circle' : 'fa-circle' ?>"></i>
                        </span>
                    </div>
                    <p class="text-xs text-slate-400">स्क्रीन टाइम समीक्षा और ऑनलाइन तथ्य सत्यापन।</p>
                </div>

                <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-xs font-bold text-slate-300">सप्ताह 4 (Week 4)</span>
                        <span class="text-xs <?= !empty($action_plan['week4_progress']) ? 'text-emerald-400' : 'text-slate-400' ?>">
                            <i class="fa-solid <?= !empty($action_plan['week4_progress']) ? 'fa-check-circle' : 'fa-circle' ?>"></i>
                        </span>
                    </div>
                    <p class="text-xs text-slate-400">बचत व खर्च के फैसले और महीने की कुल प्रगति।</p>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
