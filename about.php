<?php
/**
 * About the Presentation & Author Page
 * Sunil Kosariya & PsychFiTech®
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

$page_title = "सत्र परिचय और लेखक (About The Keynote)";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Header Banner -->
<div class="relative py-12 lg:py-16 bg-[#0c1322] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
                <i class="fa-solid fa-circle-info mr-1"></i> सत्र एवं लेखक परिचय
            </span>
            <h1 class="text-3xl sm:text-5xl font-black text-white font-['Poppins']">
                जागरूकता सत्र: <span class="gradient-text-gold">मिशन और विजन</span>
            </h1>
            <p class="text-slate-300 text-base sm:text-lg leading-relaxed mt-4">
                "डिजिटल दुनिया में सही निर्णय, बेहतर करियर और पैसे की समझ" — 45 मिनट का एक ऐसा विचारोत्तेजक सत्र जो युवाओं की सोच और प्राथमिकताओं को एक नई दिशा देता है।
            </p>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Author Profile Card -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-16">
            <div class="lg:col-span-5">
                <div class="rounded-3xl overflow-hidden border border-amber-500/30 p-2 bg-gradient-to-br from-amber-500/10 to-slate-900 shadow-2xl">
                    <picture>
                        <source srcset="<?= BASE_URL ?>/assets/images/hero-presentation.webp" type="image/webp">
                        <img src="<?= BASE_URL ?>/assets/images/hero-presentation.jpg" alt="Sunil Kosariya Presentation" class="w-full h-auto rounded-2xl">
                    </picture>
                </div>
            </div>

            <div class="lg:col-span-7 space-y-5">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-800 text-amber-400 text-xs font-bold uppercase">
                    <i class="fa-solid fa-feather-pointed"></i> मुख्य वक्ता एवं लेखक
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                    सुनील कोसारिया (Sunil Kosariya)
                </h2>
                <div class="text-base text-amber-400 font-semibold font-serif">
                    लेखक: THE GREAT ECONOMIC DIVIDE
                </div>
                <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                    सुनील कोसारिया एक प्रख्यात लेखक, शोधकर्ता और डिजिटल एजुकेशन विशेषज्ञ हैं। उनकी चर्चित पुस्तक <em>"THE GREAT ECONOMIC DIVIDE (नीली रोशनी का मरुस्थल: डिजिटल भ्रम और खाली जेब का मनोवैज्ञानिक सच!)"</em> ने हजारों युवाओं और अभिभावकों को डिजिटल युग के छिपे मनोवैज्ञानिक जाल और आर्थिक वास्तविकताओं से अवगत कराया है।
                </p>
                <p class="text-slate-300 text-sm leading-relaxed">
                    उनका स्पष्ट मानना है कि <strong>"शिक्षा के साथ, भविष्य आपके हाथ में है।"</strong> अगर युवा समय पर आर्टिफिशियल इंटेलिजेंस (AI) का सही इस्तेमाल, करियर चयन का वैज्ञानिक 5-Point फॉर्मूला और पैसे का मनोवैज्ञानिक प्रबंधन सीख लें, तो वे किसी भी आर्थिक व तकनीकी चुनौती को अवसर में बदल सकते हैं।
                </p>

                <div class="pt-2 flex flex-wrap gap-4">
                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 text-xs">
                        <span class="text-amber-400 font-bold block mb-0.5">सत्र अवधि (Duration)</span>
                        <span class="text-white">45 मिनट का इंटरैक्टिव सत्र</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 text-xs">
                        <span class="text-cyan-400 font-bold block mb-0.5">लक्षित समूह (Audience)</span>
                        <span class="text-white">10वीं, 12वीं, कॉलेज छात्र व युवा</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 text-xs">
                        <span class="text-emerald-400 font-bold block mb-0.5">मिशन (Mission)</span>
                        <span class="text-white">Building a Smarter India</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Book Details -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-10 border border-slate-800 mb-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-8 space-y-4">
                    <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block">प्रकाशित पुस्तक</span>
                    <h3 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                        THE GREAT ECONOMIC DIVIDE
                    </h3>
                    <p class="text-amber-300 text-sm font-medium">
                        नीली रोशनी का मरुस्थल: डिजिटल भ्रम और खाली जेब का मनोवैज्ञानिक सच!
                    </p>
                    <p class="text-slate-300 text-sm leading-relaxed">
                        यह पुस्तक आज के स्मार्टफोन युग की उस कड़वी हकीकत को उजागर करती है जहाँ युवा घंटों रील और सोशल मीडिया पर समय गंवा रहे हैं, जबकि पीछे से डिजिटल कंपनियाँ उनके ध्यान को मुद्रीकृत (monetize) कर रही हैं। पुस्तक बताती है कि कैसे इस भटकाव को तोड़कर AI, वित्तीय कौशल और वास्तविक करियर का निर्माण किया जाए।
                    </p>
                    <div class="pt-2">
                        <a href="<?= BASE_URL ?>/services.php" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl btn-gold text-slate-950 font-bold text-xs shadow-md">
                            <span>₹999 बंडल में पुस्तक प्राप्त करें</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="md:col-span-4 text-center">
                    <div class="p-6 rounded-2xl bg-slate-900/90 border border-amber-500/30 text-amber-400">
                        <i class="fa-solid fa-book-bookmark text-5xl mb-3 text-amber-400"></i>
                        <div class="font-bold text-white text-base">Printed + Digital PDF</div>
                        <div class="text-xs text-slate-400 mt-1">सदस्यों के लिए डैशबोर्ड में उपलब्ध</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PsychFiTech® Organization Pillars -->
        <div class="text-center max-w-3xl mx-auto mb-10">
            <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block mb-1">संस्थागत दर्शन</span>
            <h3 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                PsychFiTech® के 4 स्तम्भ
            </h3>
            <p class="text-slate-400 text-sm mt-1">
                Mind, Money, Technology और Growth के समन्वय से युवाओं का सशक्तिकरण:
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 text-center">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl mx-auto mb-4">
                    <i class="fa-solid fa-brain"></i>
                </div>
                <h4 class="text-lg font-bold text-white mb-2">MIND</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    मनोवैज्ञानिक स्थिरता, ध्यान प्रबंधन और सोशल मीडिया के डोपामाइन ट्रैप से मुक्ति।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 text-center">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl mx-auto mb-4">
                    <i class="fa-solid fa-coins"></i>
                </div>
                <h4 class="text-lg font-bold text-white mb-2">MONEY</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    वित्तीय साक्षरता, बचत के सिद्धांत, बजटिंग और फर्जी ऑनलाइन कमाई से सुरक्षा।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 text-center">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl mx-auto mb-4">
                    <i class="fa-solid fa-microchip"></i>
                </div>
                <h4 class="text-lg font-bold text-white mb-2">TECHNOLOGY</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    आर्टिफिशियल इंटेलिजेंस (AI), मशीन लर्निंग, चैटबॉट्स और ऑटोमेशन टूल्स का हुनर।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 text-center">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl mx-auto mb-4">
                    <i class="fa-solid fa-arrow-trend-up"></i>
                </div>
                <h4 class="text-lg font-bold text-white mb-2">GROWTH</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    करियर में तीव्र वृद्धि, व्यावहारिक प्रोजेक्ट्स और राष्ट्र निर्माण में सक्रिय भागीदारी।
                </p>
            </div>
        </div>

    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
