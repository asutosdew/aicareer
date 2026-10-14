<?php
/**
 * Career Guidance Page
 * Based on Presentation Slides: 5, 6, 7, 8, 9, 23
 * 5-Point Formula & 4-Step Career Roadmap
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

$page_title = "करियर गाइडेंस - 4 कदम और 5-Point फॉर्मूला";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Header Banner -->
<div class="relative py-12 lg:py-16 bg-[#0c1322] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-8 space-y-4">
                <span class="inline-block px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-compass mr-1"></i> सफल भविष्य के लिए रास्ते
                </span>
                <h1 class="text-3xl sm:text-5xl font-black text-white font-['Poppins']">
                    करियर गाइडेंस: <span class="gradient-text-gold">छात्रों के विकल्प और तैयारी</span>
                </h1>
                <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl">
                    सही करियर चुनने के लिए खुद को समझना सबसे पहली और अनिवार्य शर्त है। जानिए 4 मुख्य कदम और 5-Point फॉर्मूला जो आपके जीवन की दिशा बदल सकते हैं।
                </p>
                <div class="flex flex-wrap gap-3 pt-2 text-xs font-semibold">
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-cyan-400 border border-slate-700">तकनीक (Technology)</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-amber-400 border border-slate-700">वित्त (Finance)</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-emerald-400 border border-slate-700">शिक्षा (Education)</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-purple-400 border border-slate-700">व्यवसाय (Business)</span>
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                    <picture>
                        <source srcset="<?= BASE_URL ?>/assets/images/career-guidance.webp" type="image/webp">
                        <img src="<?= BASE_URL ?>/assets/images/career-guidance.jpg" alt="Career Guidance" class="w-full h-auto">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Slide 5: आत्म-चिंतन (Who is Deciding Your Future?) -->
<section class="py-14 bg-[#090d16] border-b border-slate-800/80">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card-static rounded-3xl p-6 sm:p-10 border border-amber-500/30 relative">
            <div class="text-amber-400 text-xs font-bold uppercase tracking-widest mb-2">आत्म-चिंतन (Self-Reflection)</div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins'] mb-4">
                एक सवाल: आपका भविष्य कौन तय कर रहा है?
            </h2>
            <p class="text-slate-300 text-sm leading-relaxed mb-6">
                जीवन में कोई भी बड़ा करियर निर्णय लेने से पहले खुद से यह पूछना बेहद आवश्यक है कि आपके वर्तमान निर्णय पर असल में किसका प्रभाव है:
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 flex items-start gap-3">
                    <i class="fa-solid fa-heart text-amber-400 mt-1"></i>
                    <div>
                        <div class="text-white font-bold text-sm">आपकी रुचि और योग्यता?</div>
                        <div class="text-xs text-slate-400 mt-0.5">क्या आप अपनी क्षमता जानते हैं?</div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 flex items-start gap-3">
                    <i class="fa-solid fa-people-roof text-cyan-400 mt-1"></i>
                    <div>
                        <div class="text-white font-bold text-sm">परिवार और दोस्तों की अपेक्षाएँ?</div>
                        <div class="text-xs text-slate-400 mt-0.5">क्या आप दूसरों के सपने पूरे कर रहे हैं?</div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 flex items-start gap-3">
                    <i class="fa-solid fa-photo-film text-purple-400 mt-1"></i>
                    <div>
                        <div class="text-white font-bold text-sm">सोशल मीडिया की चमक-दमक?</div>
                        <div class="text-xs text-slate-400 mt-0.5">रील्स पर दिखने वाली दिखावटी सफलता?</div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 flex items-start gap-3">
                    <i class="fa-solid fa-users text-rose-400 mt-1"></i>
                    <div>
                        <div class="text-white font-bold text-sm">समाज और रिश्तेदारों का दबाव?</div>
                        <div class="text-xs text-slate-400 mt-0.5">"लोग क्या कहेंगे" का डर?</div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800 flex items-start gap-3">
                    <i class="fa-solid fa-lightbulb text-emerald-400 mt-1"></i>
                    <div>
                        <div class="text-white font-bold text-sm">आपकी अपनी ठोस जानकारी?</div>
                        <div class="text-xs text-slate-400 mt-0.5">रिसर्च आधारित सटीक समझ?</div>
                    </div>
                </div>

                <div class="p-4 rounded-xl bg-slate-900/90 border border-amber-500/40 bg-amber-500/10 flex items-start gap-3">
                    <i class="fa-solid fa-bullseye text-amber-400 mt-1"></i>
                    <div>
                        <div class="text-amber-300 font-bold text-sm">आपका वास्तविक लक्ष्य!</div>
                        <div class="text-xs text-slate-300 mt-0.5">जहाँ आपकी प्रतिभा और अवसर मिलते हैं।</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Slide 6: CAREER का असली मतलब -->
<section class="py-16 bg-[#0c121e] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block mb-2">दृष्टिकोण में बदलाव</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                CAREER का असली मतलब: <br class="sm:hidden">
                <span class="text-amber-400">सिर्फ एक JOB नहीं है!</span>
            </h2>
            <div class="mt-6 p-4 rounded-2xl bg-slate-900 border border-amber-500/30 text-lg sm:text-xl font-black text-amber-300 tracking-wide font-['Poppins']">
                CAREER = SKILLS + LEARNING + EXPERIENCE + OPPORTUNITIES
            </div>
            <p class="text-slate-400 text-sm mt-4">
                करियर कोई एक स्थिर गंतव्य नहीं है, बल्कि समय के साथ सीखने, विकसित होने और नए अवसरों को अपनाने की एक सतत यात्रा है।
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-amber-500/40 transition">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">नौकरी (Job)</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    करियर का एक माध्यम है जहाँ आप अपनी सेवाएँ देकर अनुभव और आजीविका प्राप्त करते हैं।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-cyan-500/40 transition">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">उच्च शिक्षा (Higher Edu)</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    गहन विषय ज्ञान, अनुसंधान और विशिष्ट क्षेत्रों में विशेषज्ञता हासिल करने का रास्ता।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-purple-500/40 transition">
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">कौशल प्रशिक्षण (Skill Training)</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    व्यावहारिक AI टूल्स, कोडिंग, डिजाइनिंग और उद्योग की वर्तमान आवश्यकता के अनुरूप हुनर।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900/80 border border-slate-800 hover:border-emerald-500/40 transition">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">उद्यमिता (Entrepreneurship)</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    खुद का व्यवसाय, फ्रीलांसिंग या स्टार्टअप खड़ा कर दूसरों के लिए रोजगार के नए अवसर बनाना।
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Slide 23: करियर योजना के 4 मुख्य कदम -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block mb-2">रोडमैप</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                करियर योजना के 4 मुख्य कदम
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                सफल भविष्य के लिए इन चार सोपानों को क्रमबद्ध तरीके से पूरा करें:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 relative">
            <!-- Step 1 -->
            <div class="p-6 rounded-2xl bg-slate-900 border-2 border-amber-500/50 relative shadow-lg">
                <div class="w-12 h-12 rounded-xl bg-amber-500 text-slate-950 font-black text-2xl flex items-center justify-center mb-4">
                    1
                </div>
                <h3 class="text-lg font-bold text-white mb-2">खुद को पहचानें</h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    अपनी स्वाभाविक रुचि (Interest), ताकत (Strength) और कमजोरियों का निष्पक्ष मूल्यांकन करें।
                </p>
            </div>

            <!-- Step 2 -->
            <div class="p-6 rounded-2xl bg-slate-900 border-2 border-cyan-500/50 relative shadow-lg">
                <div class="w-12 h-12 rounded-xl bg-cyan-500 text-slate-950 font-black text-2xl flex items-center justify-center mb-4">
                    2
                </div>
                <h3 class="text-lg font-bold text-white mb-2">विकल्प जानें</h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    तकनीक, वित्त, व्यवसाय और अन्य उभरते आधुनिक क्षेत्रों में उपलब्ध अवसरों की पूरी जानकारी जुटाएँ।
                </p>
            </div>

            <!-- Step 3 -->
            <div class="p-6 rounded-2xl bg-slate-900 border-2 border-purple-500/50 relative shadow-lg">
                <div class="w-12 h-12 rounded-xl bg-purple-500 text-slate-950 font-black text-2xl flex items-center justify-center mb-4">
                    3
                </div>
                <h3 class="text-lg font-bold text-white mb-2">तैयारी करें</h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    आवश्यक डिग्री, AI टूल्स, ऑनलाइन सर्टिफिकेशन्स और व्यावहारिक प्रोजेक्ट्स के जरिए हुनर निखारें।
                </p>
            </div>

            <!-- Step 4 -->
            <div class="p-6 rounded-2xl bg-slate-900 border-2 border-emerald-500/50 relative shadow-lg">
                <div class="w-12 h-12 rounded-xl bg-emerald-500 text-slate-950 font-black text-2xl flex items-center justify-center mb-4">
                    4
                </div>
                <h3 class="text-lg font-bold text-white mb-2">योजना बनाएँ</h3>
                <p class="text-xs text-slate-300 leading-relaxed">
                    अगले 30 दिन, 6 महीने और 1 वर्ष का व्यक्तिगत एक्शन प्लान बनाकर निरंतर उस पर अमल करें।
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Slide 7: सही करियर कैसे चुनें? 5-POINT FORMULA -->
<section id="formula" class="py-16 bg-[#0c121e] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-14">
            <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block mb-2">प्रस्तुति का मूल फॉर्मूला</span>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                सही करियर कैसे चुनें? <span class="gradient-text-gold">5-POINT FORMULA</span>
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                सुनील कोसारिया द्वारा प्रतिपादित 5 बिंदुओं का वैज्ञानिक पैमाना:
            </p>
        </div>

        <div class="space-y-4 max-w-4xl mx-auto">
            <!-- Point 1 -->
            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center gap-5 hover:border-amber-500/40 transition">
                <div class="px-4 py-2 rounded-xl bg-amber-500/20 text-amber-400 font-black text-sm shrink-0">
                    1. INTEREST
                </div>
                <div class="flex-grow">
                    <h4 class="text-white font-bold text-base mb-1">रुचि (Interest)</h4>
                    <p class="text-xs text-slate-400">कौन-से विषय या गतिविधियाँ आपको आकर्षित करती हैं? बिना थके आप किस काम में मन लगा सकते हैं?</p>
                </div>
            </div>

            <!-- Point 2 -->
            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center gap-5 hover:border-cyan-500/40 transition">
                <div class="px-4 py-2 rounded-xl bg-cyan-500/20 text-cyan-400 font-black text-sm shrink-0">
                    2. ABILITY
                </div>
                <div class="flex-grow">
                    <h4 class="text-white font-bold text-base mb-1">योग्यता (Ability)</h4>
                    <p class="text-xs text-slate-400">आपकी वर्तमान ताकतें और नई तकनीक को सीखने की गति क्या है? आपके प्राकृतिक मजबूत पहलू कौन-से हैं?</p>
                </div>
            </div>

            <!-- Point 3 -->
            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center gap-5 hover:border-purple-500/40 transition">
                <div class="px-4 py-2 rounded-xl bg-purple-500/20 text-purple-400 font-black text-sm shrink-0">
                    3. OPPORTUNITY
                </div>
                <div class="flex-grow">
                    <h4 class="text-white font-bold text-base mb-1">अवसर (Opportunity)</h4>
                    <p class="text-xs text-slate-400">उस क्षेत्र में कोर्स, प्रशिक्षण संस्थान, कुल खर्च, प्रवेश प्रक्रिया और रोजगार की वास्तविक स्थिति क्या है?</p>
                </div>
            </div>

            <!-- Point 4 -->
            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center gap-5 hover:border-emerald-500/40 transition">
                <div class="px-4 py-2 rounded-xl bg-emerald-500/20 text-emerald-400 font-black text-sm shrink-0">
                    4. ACTION
                </div>
                <div class="flex-grow">
                    <h4 class="text-white font-bold text-base mb-1">अगला कदम (Action)</h4>
                    <p class="text-xs text-slate-400">सिर्फ सोचना काफी नहीं! इस सप्ताह आप किस जानकारी या कौशल पर ठोस काम शुरू करने वाले हैं?</p>
                </div>
            </div>

            <!-- Point 5 -->
            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800 flex flex-col sm:flex-row items-start sm:items-center gap-5 hover:border-rose-500/40 transition">
                <div class="px-4 py-2 rounded-xl bg-rose-500/20 text-rose-400 font-black text-sm shrink-0">
                    5. FUTURE
                </div>
                <div class="flex-grow">
                    <h4 class="text-white font-bold text-base mb-1">भविष्य (Future 5-10 Years)</h4>
                    <p class="text-xs text-slate-400">आने वाले 5 से 10 वर्षों में AI और ऑटोमेशन के दौर में उस क्षेत्र की माँग कैसी रहेगी? क्या वह सुरक्षित है?</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Slide 8: CAREER RESEARCH कैसे करें? 7-STEP CHECKLIST -->
<section id="research" class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block mb-1">चेकलिस्ट</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                CAREER RESEARCH कैसे करें?
            </h2>
            <p class="text-slate-400 text-sm mt-1">
                किसी भी करियर को अंतिम रूप देने से पहले इन 7 सवालों की निष्पक्ष जाँच अनिवार्य रूप से करें:
            </p>
        </div>

        <div class="p-6 sm:p-8 rounded-3xl bg-slate-900/90 border border-slate-800 space-y-4">
            <div class="flex items-start gap-3.5 text-sm text-slate-300 pb-3 border-b border-slate-800">
                <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">1</span>
                <span>उस क्षेत्र में रोज़ाना कौन-से वास्तविक काम और ज़िम्मेदारियाँ निभाई जाती हैं?</span>
            </div>

            <div class="flex items-start gap-3.5 text-sm text-slate-300 pb-3 border-b border-slate-800">
                <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">2</span>
                <span>उस करियर के लिए कौन-सी औपचारिक डिग्री अथवा व्यावहारिक स्किल्स जरूरी हैं?</span>
            </div>

            <div class="flex items-start gap-3.5 text-sm text-slate-300 pb-3 border-b border-slate-800">
                <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">3</span>
                <span>कॉलेज या संस्थान में प्रवेश और योग्यता की वास्तविक शर्तें क्या हैं?</span>
            </div>

            <div class="flex items-start gap-3.5 text-sm text-slate-300 pb-3 border-b border-slate-800">
                <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">4</span>
                <span>कोर्स की कुल फीस कितनी है और इसमें कितना समय खर्च होगा?</span>
            </div>

            <div class="flex items-start gap-3.5 text-sm text-slate-300 pb-3 border-b border-slate-800">
                <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">5</span>
                <span>कोर्स पूरा होने के बाद रोजगार और शुरुआती इंटर्नशिप/सैलरी के अवसर क्या हैं?</span>
            </div>

            <div class="flex items-start gap-3.5 text-sm text-slate-300 pb-3 border-b border-slate-800">
                <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">6</span>
                <span>उस क्षेत्र में काम कर रहे कम से कम 2–3 अनुभवी लोगों से बात कर उनका प्रत्यक्ष अनुभव जानें।</span>
            </div>

            <div class="flex items-start gap-3.5 text-sm text-slate-300">
                <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold shrink-0 mt-0.5">7</span>
                <span>केवल विज्ञापनों पर विश्वास न करें — आधिकारिक स्रोतों और सरकारी पोर्टल्स से जानकारी सत्यापित करें।</span>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Career Self-Assessment Form -->
<section class="py-16 bg-[#0c121e]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card-static rounded-3xl p-6 sm:p-10 border border-amber-500/30">
            <div class="text-center mb-8">
                <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block mb-1">त्वरित मूल्यांकन</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                    5-Point करियर सिफारिश टूल
                </h2>
                <p class="text-slate-400 text-xs sm:text-sm mt-1">
                    अपनी रुचि व प्राथमिकताएं चुनें और देखें कि AI के दौर में आपके लिए क्या कदम बेहतर रहेगा:
                </p>
            </div>

            <form id="career-quiz-form" class="space-y-5">
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-300 mb-1.5">1. आपकी प्राथमिक रुचि किस विषय में है?</label>
                    <select id="quiz-interest" class="w-full px-4 py-3 rounded-xl form-input text-sm">
                        <option value="तकनीक और कंप्यूटर टूल्स">तकनीक और कंप्यूटर टूल्स (Tech, AI, Software)</option>
                        <option value="बिजनेस, मार्केटिंग और सेल्स">बिजनेस, मार्केटिंग और सेल्स (Business & Entrepreneurship)</option>
                        <option value="मनी मैनेजमेंट और फाइनेंस">मनी मैनेजमेंट और फाइनेंस (Finance, Investing, Banking)</option>
                        <option value="क्रिएटिव राइटिंग व डिजाइन">क्रिएटिव राइटिंग व डिजाइन (Graphics, Video, Content)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-300 mb-1.5">2. आपकी वर्तमान मुख्य योग्यता या ताकत क्या है?</label>
                    <select id="quiz-ability" class="w-full px-4 py-3 rounded-xl form-input text-sm">
                        <option value="समस्या समाधान और तार्किक सोच">समस्या समाधान और तार्किक सोच (Problem Solving)</option>
                        <option value="लोगों से संवाद और लीडरशिप">लोगों से संवाद और लीडरशिप (Communication & Leadership)</option>
                        <option value="डेटा विश्लेषण और गणितीय समझ">डेटा विश्लेषण और गणितीय समझ (Analytics & Math)</option>
                        <option value="नई तकनीक तेजी से सीखना">नई तकनीक तेजी से सीखना (Fast Tech Learner)</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-300 mb-1.5">3. आप किस क्षेत्र में करियर बनाने के इच्छुक हैं?</label>
                    <select id="quiz-field" class="w-full px-4 py-3 rounded-xl form-input text-sm">
                        <option value="AI & Automation Specialist">AI & Automation Specialist (आधुनिक AI विशेषज्ञ)</option>
                        <option value="Digital Financial Planner">Digital Financial Planner (वित्तीय विश्लेषक)</option>
                        <option value="Tech Entrepreneur / Freelancer">Tech Entrepreneur / Freelancer (उद्यमी / फ्रीलांसर)</option>
                        <option value="Modern Corporate Professional">Modern Corporate Professional (स्मार्ट प्रोफेशनल)</option>
                    </select>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 rounded-xl btn-gold text-slate-950 font-bold text-sm sm:text-base flex items-center justify-center gap-2 shadow-lg">
                        <i class="fa-solid fa-calculator"></i>
                        <span>विश्लेषण और सिफारिश देखें</span>
                    </button>
                </div>
            </form>

            <div id="career-quiz-output" class="hidden mt-8 p-6 rounded-2xl bg-slate-900 border border-amber-500/50 shadow-xl">
                <h3 id="quiz-result-title" class="text-xl font-bold text-amber-400 mb-3 font-['Poppins']"></h3>
                <div id="quiz-result-body"></div>
                <div class="mt-6 pt-4 border-t border-slate-800 flex flex-col sm:flex-row gap-3 items-center justify-between">
                    <span class="text-xs text-slate-400">इस रोडमैप के आधार पर अपनी 30-दिन की कार्ययोजना बनाएं:</span>
                    <a href="<?= BASE_URL ?>/register.php" class="px-4 py-2 rounded-xl bg-amber-500 text-slate-950 font-bold text-xs hover:bg-amber-400 transition">
                        डैशबोर्ड में सेव करें &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
