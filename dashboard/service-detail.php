<?php
/**
 * Detailed Service & Learning Module View
 * PsychFiTech® | Digital Life, Career & Money
 * Ready for detailed content & customized assets
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/../includes/auth_check.php';

$slug = clean_input($_GET['slug'] ?? 'ai-course');

// Fetch service details
$service = null;
try {
    $stmt = $pdo->prepare("SELECT * FROM services WHERE slug = ? LIMIT 1");
    $stmt->execute([$slug]);
    $service = $stmt->fetch();
} catch (Exception $e) {
    // fallback
}

if (!$service) {
    set_flash('error', 'चयनित सर्विस नहीं मिली। (Service not found)');
    redirect(BASE_URL . '/dashboard/services.php');
}

$page_title = $service['title_hi'] . " - मॉड्यूल विवरण";
$logged_user = current_user();

require_once __DIR__ . '/../includes/member_header.php';
?>

<div class="py-8 sm:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Breadcrumbs & Back -->
        <div class="flex items-center justify-between text-xs text-slate-400">
            <a href="<?= BASE_URL ?>/dashboard/services.php" class="hover:text-amber-400 flex items-center gap-1.5 transition">
                <i class="fa-solid fa-arrow-left"></i>
                <span>सभी सर्विसेज पर वापस जाएँ</span>
            </a>
            <span class="text-slate-400">सर्विस कोड: <code class="text-amber-400"><?= e($service['slug']) ?></code></span>
        </div>

        <!-- Service Hero Banner -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-10 border border-slate-800 bg-gradient-to-r from-slate-900 via-[#0d162a] to-slate-900">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-8 space-y-3">
                    <div class="flex items-center gap-2">
                        <span class="px-2.5 py-0.5 rounded-md bg-slate-800 text-[11px] font-bold uppercase text-slate-300 border border-slate-700">
                            <?= e($service['category']) ?>
                        </span>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold badge-gold">
                            <?= e($service['badge']) ?>
                        </span>
                    </div>

                    <h1 class="text-2xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                        <?= e($service['title_hi']) ?>
                    </h1>
                    <div class="text-sm font-semibold text-amber-400">
                        <?= e($service['title']) ?>
                    </div>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        <?= e($service['short_desc_hi']) ?>
                    </p>

                    <div class="pt-2 flex flex-wrap items-center gap-3 text-xs text-slate-400">
                        <span><i class="fa-solid fa-chalkboard-user text-amber-400 mr-1"></i> प्रस्तुतकर्ता: सुनील कोसारिया</span>
                        <span>•</span>
                        <span><i class="fa-solid fa-shield-check text-emerald-400 mr-1"></i> पूर्ण एक्सेस सक्रिय</span>
                    </div>
                </div>

                <div class="lg:col-span-4 flex justify-center">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl bg-amber-500/10 border-2 border-amber-500/30 flex items-center justify-center text-4xl sm:text-5xl text-amber-400 shadow-xl shadow-amber-500/10">
                        <i class="fa-solid <?= e($service['icon']) ?>"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detailed Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left Main Column: Syllabus / Video / Modules -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- Notice Box -->
                <div class="p-4 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-xs sm:text-sm text-amber-200 flex items-start gap-3">
                    <i class="fa-solid fa-circle-info text-amber-400 mt-1 text-base shrink-0"></i>
                    <div>
                        <strong>एडमिनिस्ट्रेटर सूचना:</strong> इस सर्विस के विशिष्ट वीडियो लेक्चर्स, लाइव वर्कशॉप शेड्यूल और कस्टमाइज्ड टूल्स का विवरण एडमिन द्वारा शीघ्र शेयर किया जाएगा। प्रारंभिक रूपरेखा नीचे उपलब्ध करा दी गई है।
                    </div>
                </div>

                <!-- Video Player Container / Live Workshop Area -->
                <div class="glass-card-static rounded-3xl p-6 border border-slate-800 space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-bold text-white font-['Poppins'] flex items-center gap-2">
                            <i class="fa-solid fa-play-circle text-amber-400"></i>
                            <span>ऑनलाइन क्लास व वीडियो सेशन</span>
                        </h3>
                        <span class="text-xs text-slate-400 bg-slate-800 px-2.5 py-1 rounded-md">डिजिटल स्कूल पोर्टल</span>
                    </div>

                    <!-- Video Placeholder -->
                    <div class="aspect-video w-full rounded-2xl bg-slate-950 border border-slate-800 flex flex-col items-center justify-center text-center p-6 relative group overflow-hidden">
                        <div class="w-16 h-16 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center text-2xl mb-3 group-hover:scale-110 transition-transform cursor-pointer border border-amber-500/40">
                            <i class="fa-solid fa-play ml-1"></i>
                        </div>
                        <h4 class="text-white font-bold text-sm sm:text-base">
                            सत्र: <?= e($service['title_hi']) ?>
                        </h4>
                        <p class="text-slate-400 text-xs mt-1 max-w-md">
                            इस क्लास का एचडी वीडियो लेक्चर और इंटरैक्टिव स्क्रीन रिकॉर्डिंग यहाँ सीधे प्ले होगी।
                        </p>
                    </div>
                </div>

                <!-- Syllabus / Module Breakdown -->
                <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800 space-y-6">
                    <h3 class="text-lg font-bold text-white font-['Poppins'] flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-cyan-400"></i>
                        <span>पाठ्यक्रम रूपरेखा (Module Structure)</span>
                    </h3>

                    <?php if ($service['slug'] === 'ai-course'): ?>
                        <!-- 7-Day AI Course Syllabus -->
                        <div class="space-y-3">
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-amber-400 font-bold text-xs uppercase block">Day 1</span>
                                <h5 class="text-white font-bold text-sm">आर्टिफिशियल इंटेलिजेंस (AI) का आधारभूत ज्ञान</h5>
                                <p class="text-xs text-slate-400 mt-1">Chatbots, LLM, Machine Learning और Neural Networks की कार्यप्रणाली।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-amber-400 font-bold text-xs uppercase block">Day 2</span>
                                <h5 class="text-white font-bold text-sm">प्रॉम्प्ट इंजीनियरिंग (Prompt Engineering) मास्टरी</h5>
                                <p class="text-xs text-slate-400 mt-1">ChatGPT, Claude और Gemini से सटीक उत्तर और असाइनमेंट तैयार करवाना।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-amber-400 font-bold text-xs uppercase block">Day 3</span>
                                <h5 class="text-white font-bold text-sm">कैनवा AI (Canva AI) और विजुअल डिजाइनिंग</h5>
                                <p class="text-xs text-slate-400 mt-1">Magic Design, Text-to-Image और सोशल मीडिया प्रेजेंटेशन क्रिएशन।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-amber-400 font-bold text-xs uppercase block">Day 4</span>
                                <h5 class="text-white font-bold text-sm">पढ़ाई व रिसर्च में AI का उपयोग</h5>
                                <p class="text-xs text-slate-400 mt-1">कठिन कॉन्सेप्ट्स को आसान बनाना, नोट्स समरी और मॉक क्विज जेनरेशन।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-amber-400 font-bold text-xs uppercase block">Day 5</span>
                                <h5 class="text-white font-bold text-sm">बिजनेस और फ्रीलांसिंग ऑटोमेशन</h5>
                                <p class="text-xs text-slate-400 mt-1">ईमेल ड्राफ्टिंग, कस्टमर सपोर्ट बॉट्स और दैनिक रूटीन ऑटोमेशन।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-amber-400 font-bold text-xs uppercase block">Day 6</span>
                                <h5 class="text-white font-bold text-sm">जिम्मेदार AI उपयोग और फैक्ट चेकिंग</h5>
                                <p class="text-xs text-slate-400 mt-1">Academic Integrity, प्राइवेसी सुरक्षा और फेक आउटपुट की पहचान।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-amber-400 font-bold text-xs uppercase block">Day 7</span>
                                <h5 class="text-white font-bold text-sm">फाइनल हैंड्स-ऑन प्रोजेक्ट और सर्टिफिकेट</h5>
                                <p class="text-xs text-slate-400 mt-1">एक रियल-वर्ल्ड AI समाधान तैयार करना और मेंटर द्वारा मूल्यांकन।</p>
                            </div>
                        </div>

                    <?php elseif ($service['slug'] === 'economic-divide-book'): ?>
                        <!-- The Great Economic Divide Syllabus -->
                        <div class="space-y-3">
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-cyan-400 font-bold text-xs uppercase block">अध्याय 1</span>
                                <h5 class="text-white font-bold text-sm">नीली रोशनी का मरुस्थल (The Blue Light Desert)</h5>
                                <p class="text-xs text-slate-400 mt-1">स्मार्टफोन का मनोवैज्ञानिक आकर्षण और समय की अदृश्य चोरी।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-cyan-400 font-bold text-xs uppercase block">अध्याय 2</span>
                                <h5 class="text-white font-bold text-sm">डिजिटल भ्रम और खाली जेब (The Illusion of Wealth)</h5>
                                <p class="text-xs text-slate-400 mt-1">सोशल मीडिया की चमक-दमक के पीछे युवाओं के खाली बैंक खातों का कड़वा सच।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-cyan-400 font-bold text-xs uppercase block">अध्याय 3</span>
                                <h5 class="text-white font-bold text-sm">आर्थिक विभाजन और नया वर्ग (The Economic Divide)</h5>
                                <p class="text-xs text-slate-400 mt-1">तकनीक उपभोक्ता (Consumer) बनाम तकनीक निर्माता (Creator)।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-cyan-400 font-bold text-xs uppercase block">अध्याय 4</span>
                                <h5 class="text-white font-bold text-sm">मनोवैज्ञानिक मुक्ति और वित्तीय आत्मनिर्भरता</h5>
                                <p class="text-xs text-slate-400 mt-1">ठोस बचत, AI हुनर और अगले 10 वर्षों के लिए टिकाऊ करियर मॉडल।</p>
                            </div>
                        </div>

                    <?php else: ?>
                        <!-- Generic Structured Modules for other presentation services -->
                        <div class="space-y-3">
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-emerald-400 font-bold text-xs uppercase block">भाग 1</span>
                                <h5 class="text-white font-bold text-sm">प्रस्तुति के मुख्य सिद्धांत एवं अवधारणाएं</h5>
                                <p class="text-xs text-slate-400 mt-1">प्रेजेंटेशन में वर्णित प्रमुख बिंदुओं और वास्तविक जीवन के उदाहरणों का सार।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-emerald-400 font-bold text-xs uppercase block">भाग 2</span>
                                <h5 class="text-white font-bold text-sm">व्यावहारिक अभ्यास और एक्टिविटी टूल्स</h5>
                                <p class="text-xs text-slate-400 mt-1">निर्णय सिमुलेशन, चेकलिस्ट और स्व-मूल्यांकन शीट्स।</p>
                            </div>
                            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800">
                                <span class="text-emerald-400 font-bold text-xs uppercase block">भाग 3</span>
                                <h5 class="text-white font-bold text-sm">व्यक्तिगत कार्ययोजना व मेंटर समीक्षा</h5>
                                <p class="text-xs text-slate-400 mt-1">30-दिवसीय लक्ष्य निर्धारण और साप्ताहिक प्रगति का मूल्यांकन।</p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

            <!-- Right Sidebar: Downloads & Support -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Downloads Card -->
                <div class="glass-card-static rounded-3xl p-6 border border-slate-800 space-y-4">
                    <h3 class="text-base font-bold text-white font-['Poppins'] flex items-center gap-2">
                        <i class="fa-solid fa-download text-amber-400"></i>
                        <span>डाउनलोड संसाधन</span>
                    </h3>

                    <div class="space-y-2.5">
                        <a href="<?= BASE_URL ?>/dashboard/ai-tools.php" class="block p-3 rounded-xl bg-slate-900 border border-slate-800 hover:border-amber-400 transition text-xs">
                            <div class="font-bold text-white flex items-center justify-between">
                                <span>AI प्रॉम्प्ट्स चीटशीट (Cheat Sheet)</span>
                                <i class="fa-solid fa-file-lines text-amber-400"></i>
                            </div>
                            <div class="text-[11px] text-slate-400 mt-0.5">ChatGPT, Gemini, Canva AI प्रॉम्ट्स</div>
                        </a>

                        <a href="<?= BASE_URL ?>/career-guide.php#formula" class="block p-3 rounded-xl bg-slate-900 border border-slate-800 hover:border-amber-400 transition text-xs">
                            <div class="font-bold text-white flex items-center justify-between">
                                <span>5-Point करियर फॉर्मूला गाइड</span>
                                <i class="fa-solid fa-compass text-cyan-400"></i>
                            </div>
                            <div class="text-[11px] text-slate-400 mt-0.5">करियर चयन का 5-चरणीय ढांचा</div>
                        </a>

                        <a href="<?= BASE_URL ?>/financial-literacy.php#safety" class="block p-3 rounded-xl bg-slate-900 border border-slate-800 hover:border-amber-400 transition text-xs">
                            <div class="font-bold text-white flex items-center justify-between">
                                <span>डिजिटल सेफ्टी &amp; फ्रॉड चेकर</span>
                                <i class="fa-solid fa-shield-halved text-rose-400"></i>
                            </div>
                            <div class="text-[11px] text-slate-400 mt-0.5">6 सुरक्षा नियम व फ्रॉड पहचान गाइड</div>
                        </a>
                    </div>
                </div>

                <!-- Ask Mentor Card -->
                <div class="glass-card-static rounded-3xl p-6 border border-slate-800 space-y-3">
                    <h3 class="text-base font-bold text-white font-['Poppins'] flex items-center gap-2">
                        <i class="fa-solid fa-headset text-cyan-400"></i>
                        <span>मेंटर से सहायता</span>
                    </h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        क्या इस सर्विस या मॉड्यूल से संबंधित आपका कोई प्रश्न है? आप सीधे मेंटर टीम से परामर्श ले सकते हैं:
                    </p>
                    <a href="<?= BASE_URL ?>/contact.php" class="block w-full py-2.5 px-4 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-semibold text-xs text-center border border-slate-700 transition">
                        <i class="fa-solid fa-envelope mr-1"></i> प्रश्न पूछें &rarr;
                    </a>
                </div>

            </div>

        </div>

    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
