<?php
/**
 * AI & Digital Life Page
 * Based on Presentation Slides: 3, 10, 11, 13, 14, 18, 24
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

$page_title = "आर्टिफिशियल इंटेलिजेंस (AI) और डिजिटल लाइफ";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Header Banner -->
<div class="relative py-12 lg:py-16 bg-[#0c1322] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-8 space-y-4">
                <span class="inline-block px-3 py-1 rounded-full bg-cyan-500/10 border border-cyan-500/30 text-cyan-400 text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-microchip mr-1"></i> आधुनिक तकनीक और जीवनशैली
                </span>
                <h1 class="text-3xl sm:text-5xl font-black text-white font-['Poppins']">
                    AI &amp; डिजिटल लाइफ: <span class="gradient-text-cyan">मोबाइल टूल है या मालिक?</span>
                </h1>
                <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl">
                    आर्टिफिशियल इंटेलिजेंस आज की सबसे क्रांतिकारी शक्ति है। जानिए कैसे AI को अपनी पढ़ाई और काम का सबसे ताकतवर सहायक बनाएं और सोशल मीडिया के अंतहीन स्क्रॉलिंग से मुक्ति पाएं।
                </p>
                <div class="flex flex-wrap gap-3 pt-2 text-xs font-semibold">
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-cyan-400 border border-slate-700">Chatbot &amp; Machine Learning</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-amber-400 border border-slate-700">स्क्रीन टाइम &amp; ध्यान प्रबंधन</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-emerald-400 border border-slate-700">जिम्मेदार AI उपयोग</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-purple-400 border border-slate-700">डिजिटल स्कूल ई-लर्निंग</span>
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                    <picture>
                        <source srcset="<?= BASE_URL ?>/assets/images/ai-concept.webp" type="image/webp">
                        <img src="<?= BASE_URL ?>/assets/images/ai-concept.jpg" alt="Artificial Intelligence" class="w-full h-auto">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Slide 3: आर्टिफिशियल इंटेलिजेंस क्या है? -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block mb-2">सरल भाषा में समझें</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                आर्टिफिशियल इंटेलिजेंस (AI) क्या है?
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                कंप्यूटर सिस्टम को इंसानों की तरह सोचने, सीखने, विश्लेषण करने और समस्याओं का समाधान करने की क्षमता देना।
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Chatbots (चैटबॉट)</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    प्राकृतिक भाषा (Natural Language) में संवाद कर जटिल सवालों के तुरंत और सटीक उत्तर देने वाले टूल्स (जैसे ChatGPT, Gemini, Claude)।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-brain"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Machine Learning</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    विशाल डेटा से पैटर्न्स और ट्रेंड्स सीखकर भविष्य के रुझानों और परिणामों का सटीक पूर्वानुमान लगाने की तकनीक।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-network-wired"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Deep Learning</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    मानव मस्तिष्क की कोशिकाओं की तरह बहुस्तरीय नेटवर्क द्वारा छवि (Image), ध्वनि (Voice) और वीडियो को प्रोसेस करना।
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-circle-nodes"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">Neural Networks</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    कंप्यूटर को स्वायत्त और जटिल निर्णय लेने में सक्षम बनाने वाला गहन कम्प्यूटेशनल ढांचा।
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Slide 10: DIGITAL LIFE: टूल या मालिक? -->
<section class="py-16 bg-[#0c121e] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block">आत्म-परीक्षण</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                    DIGITAL LIFE: <br>
                    <span class="text-amber-400">आपका मोबाइल आपका टूल है या मालिक?</span>
                </h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    तकनीक केवल एक औजार है। यह इस बात पर निर्भर करता है कि आप इसका उपयोग किस उद्देश्य से कर रहे हैं:
                </p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 rounded-xl bg-emerald-950/20 border border-emerald-500/30">
                        <div class="text-emerald-400 font-bold text-xs uppercase mb-1 flex items-center gap-1.5">
                            <i class="fa-solid fa-check-circle"></i> प्रोडक्टिव उपयोग (टूल):
                        </div>
                        <ul class="text-xs text-slate-300 space-y-1.5">
                            <li><strong>1. Learning:</strong> नई स्किल और ज्ञान सीखना</li>
                            <li><strong>2. Creating:</strong> प्रोजेक्ट्स, कोडिंग व कंटेंट बनाना</li>
                            <li><strong>3. Connecting:</strong> मेंटर्स व सही लोगों से जुड़ना</li>
                        </ul>
                    </div>

                    <div class="p-4 rounded-xl bg-rose-950/20 border border-rose-500/30">
                        <div class="text-rose-400 font-bold text-xs uppercase mb-1 flex items-center gap-1.5">
                            <i class="fa-solid fa-xmark-circle"></i> नुकसानदेह लत (मालिक):
                        </div>
                        <ul class="text-xs text-slate-300 space-y-1.5">
                            <li><strong>4. Scrolling Without Purpose:</strong> रील्स में समय बर्बाद</li>
                            <li><strong>5. Digital Distraction:</strong> जरूरी काम से ध्यान हटना</li>
                            <li><strong>6. Sleep Disruption:</strong> देर रात स्क्रीन देखने से अनिद्रा</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
                    <picture>
                        <source srcset="<?= BASE_URL ?>/assets/images/digital-habits.webp" type="image/webp">
                        <img src="<?= BASE_URL ?>/assets/images/digital-habits.jpg" alt="Digital Habits" class="w-full h-auto">
                    </picture>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Slide 11: TIME, ATTENTION & DIGITAL HABITS (6 Rules) -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block mb-1">आदतें सुधारें</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                TIME, ATTENTION &amp; DIGITAL HABITS
            </h2>
            <p class="text-slate-400 text-sm mt-1">
                अपने समय और ध्यान को प्रभावी रूप से मैनेज करने के 6 नियम:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-sm shrink-0">1</span>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">पढ़ाई के समय अनावश्यक Notifications बंद करें</h4>
                    <p class="text-xs text-slate-400">सोशल मीडिया की बार-बार बजने वाली घंटी आपके फोकस को पूरी तरह नष्ट कर देती है।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-sm shrink-0">2</span>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">मनोरंजन और पढ़ाई के लिए अलग समय तय करें</h4>
                    <p class="text-xs text-slate-400">दोनों को कभी न मिलाएं। पढ़ाई के वक्त सिर्फ पढ़ाई और मनोरंजन के लिए एक सीमित समय स्लॉट रखें।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-sm shrink-0">3</span>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">ज़रूरी काम शुरू करने से पहले लक्ष्य लिखें</h4>
                    <p class="text-xs text-slate-400">कागज़ पर लिखा हुआ स्पष्ट लक्ष्य आपके दिमाग को भटकाव से बचाकर सीधा दिशा देता है।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-sm shrink-0">4</span>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">सोने से पहले स्क्रीन का इस्तेमाल सीमित करें</h4>
                    <p class="text-xs text-slate-400">सोने से कम से कम 45 मिनट पहले स्मार्टफोन अलग रख दें ताकि गहरी और शांत नींद मिल सके।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-sm shrink-0">5</span>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">हर सप्ताह अपने Screen Time की समीक्षा करें</h4>
                    <p class="text-xs text-slate-400">अपने फोन की डिजिटल वेलबीइंग सेटिंग देखकर हर हफ्ते स्क्रीन टाइम 15-20% घटाने का प्रयास करें।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-sm shrink-0">6</span>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">खाली समय में एक उपयोगी कौशल पर काम करें</h4>
                    <p class="text-xs text-slate-400">बोरियत मिटाने के लिए रील देखने के बजाय AI प्रॉम्प्टिंग या अंग्रेजी बोलने का अभ्यास करें।</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Slide 13: AI का ज़िम्मेदार उपयोग -->
<section class="py-16 bg-[#0c121e] border-b border-slate-800">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-purple-400 text-xs font-bold uppercase tracking-widest block mb-1">सही तकनीक</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                AI: पढ़ाई का सहायक, निर्णय लेने वाला मालिक नहीं
            </h2>
            <p class="text-slate-400 text-sm mt-1">
                AI का ज़िम्मेदार और प्रभावी उपयोग कैसे करें:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex items-center gap-3">
                <i class="fa-solid fa-check text-purple-400"></i>
                <span class="text-sm text-slate-300">1. कठिन और जटिल विषयों को सरल उदाहरणों से समझना</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex items-center gap-3">
                <i class="fa-solid fa-check text-purple-400"></i>
                <span class="text-sm text-slate-300">2. अभ्यास के लिए मॉक टेस्ट, प्रश्न और Quiz तैयार करवाना</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex items-center gap-3">
                <i class="fa-solid fa-check text-purple-400"></i>
                <span class="text-sm text-slate-300">3. निबंध या प्रोजेक्ट की रूपरेखा (Outline) और विचार बनाना</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex items-center gap-3">
                <i class="fa-solid fa-check text-purple-400"></i>
                <span class="text-sm text-slate-300">4. अपनी भाषा, व्याकरण और व्यावसायिक लेखन को सुधारना</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex items-center gap-3">
                <i class="fa-solid fa-check text-purple-400"></i>
                <span class="text-sm text-slate-300">5. AI द्वारा दिए गए तथ्यों को विश्वसनीय स्रोतों से जाँचना</span>
            </div>
            <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 flex items-center gap-3">
                <i class="fa-solid fa-check text-purple-400"></i>
                <span class="text-sm text-slate-300">6. शैक्षणिक ईमानदारी (Academic Integrity) का पालन करना</span>
            </div>
        </div>

        <div class="mt-6 p-4 rounded-2xl bg-purple-950/30 border border-purple-500/30 text-xs text-purple-200 text-center">
            <i class="fa-solid fa-triangle-exclamation mr-1"></i>
            <strong>सावधानी:</strong> AI चैटबॉट्स पर कभी भी अपने निजी दस्तावेज, बैंक विवरण या संवेदनशील जानकारी अपलोड न करें।
        </div>
    </div>
</section>

<!-- Slide 14: ACTIVITY 2: 30 मिनट का DIGITAL CHALLENGE -->
<section id="challenge" class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card-static rounded-3xl p-6 sm:p-10 border border-cyan-500/40">
            <div class="text-center mb-8">
                <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block mb-1">इंटरैक्टिव एक्टिविटी 2</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                    30 मिनट का DIGITAL CHALLENGE
                </h2>
                <p class="text-slate-400 text-xs sm:text-sm mt-1">
                    अगर आपको रोज़ बिना किसी रुकावट के <strong>30 मिनट</strong> का समय मिले, तो आप इनमें से क्या चुनेंगे?
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <button type="button" class="challenge-choice-btn p-4 rounded-xl border border-slate-700 bg-slate-800 text-left hover:border-cyan-400 transition"
                    data-outcome="रोज़ 30 मिनट में 1 नई स्किल सीखने से 1 साल में आप 365 घंटे यानी 3-4 नई तकनीकों में माहिर हो जाएंगे!">
                    <span class="font-bold text-white text-sm block">1. 30 मिनट: एक नई स्किल सीखना</span>
                    <span class="text-xs text-slate-400">जैसे प्रॉम्प्ट इंजीनियरिंग, कैनवा डिजाइन या कोडिंग।</span>
                </button>

                <button type="button" class="challenge-choice-btn p-4 rounded-xl border border-slate-700 bg-slate-800 text-left hover:border-cyan-400 transition"
                    data-outcome="रोज़ 30 मिनट कठिन विषय के अभ्यास से आपके परीक्षा परिणाम और आत्मविश्वास में अभूतपूर्व उछाल आएगा!">
                    <span class="font-bold text-white text-sm block">2. 30 मिनट: किसी विषय की प्रैक्टिस करना</span>
                    <span class="text-xs text-slate-400">गणित, एकाउंट्स, विज्ञान या अंग्रेजी का अभ्यास।</span>
                </button>

                <button type="button" class="challenge-choice-btn p-4 rounded-xl border border-slate-700 bg-slate-800 text-left hover:border-cyan-400 transition"
                    data-outcome="रोज़ 30 मिनट करियर रिसर्च आपको सही कॉलेज, स्कॉलरशिप और मार्केट ट्रेंड्स से हमेशा एक कदम आगे रखेगी!">
                    <span class="font-bold text-white text-sm block">3. 30 मिनट: करियर संबंधी रिसर्च करना</span>
                    <span class="text-xs text-slate-400">उद्योग के प्रोफेशनल्स, कोर्सेज और अवसरों का विश्लेषण।</span>
                </button>

                <button type="button" class="challenge-choice-btn p-4 rounded-xl border border-slate-700 bg-slate-800 text-left hover:border-cyan-400 transition"
                    data-outcome="रोज़ 30 मिनट में तैयार किया गया प्रोजेक्ट और पोर्टफोलियो आपको इंटरव्यू में तुरंत सिलेक्ट करवाएगा!">
                    <span class="font-bold text-white text-sm block">4. 30 मिनट: अपने प्रोजेक्ट या पोर्टफोलियो पर काम</span>
                    <span class="text-xs text-slate-400">वेबसाइट, प्रेजेंटेशन या AI ऑटोमेशन प्रोजेक्ट बनाना।</span>
                </button>
            </div>

            <div id="challenge-feedback" class="hidden mb-6"></div>

            <div class="text-center">
                <a href="<?= BASE_URL ?>/register.php" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl btn-gold text-slate-950 font-bold text-sm shadow-md">
                    <i class="fa-solid fa-flag-checkered"></i>
                    <span>इस 30-दिन चैलेंज को अपने सदस्य डैशबोर्ड में एक्टिवेट करें</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Slide 24: डिजिटल स्कूल शिक्षा का अवलोकन -->
<section class="py-16 bg-[#0c121e]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-6 space-y-5">
                <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block">आधुनिक ई-लर्निंग</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                    डिजिटल स्कूल: <span class="gradient-text-gold">शिक्षा का अवलोकन</span>
                </h2>
                <div class="text-base text-slate-300 font-medium italic">
                    "सीखने को बनाए आसान, रोचक और प्रभावी!"
                </div>

                <div class="space-y-3.5 pt-2">
                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-video"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">इंटरैक्टिव ऑनलाइन क्लासेस से बेहतर समझ</h4>
                            <p class="text-xs text-slate-400">लाइव प्रश्नोत्तर और व्यवहारिक प्रयोगों से जटिल विषयों की स्पष्ट समझ।</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">ई-लर्निंग टूल्स से कभी भी, कहीं भी सीखने की सुविधा</h4>
                            <p class="text-xs text-slate-400">अपने मोबाइल या लैपटॉप से अपनी सुविधा अनुसार अध्ययन सामग्री उपलब्ध।</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-diagram-project"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">प्रोजेक्ट आधारित शिक्षा से व्यावहारिक सीख</h4>
                            <p class="text-xs text-slate-400">केवल रटना नहीं, बल्कि असली दुनिया की समस्याओं को हल करने वाले प्रोजेक्ट्स।</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-3">
                        <div class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-comment-dots"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">व्यक्तिगत फीडबैक से निरंतर सुधार</h4>
                            <p class="text-xs text-slate-400">शिक्षकों और मेंटर्स द्वारा प्रत्येक विद्यार्थी की प्रगति का व्यक्तिगत मार्गदर्शन।</p>
                        </div>
                    </div>
                </div>

                <div class="p-4 rounded-2xl bg-slate-900 border-l-4 border-amber-400 text-xs text-slate-300">
                    <p class="font-semibold text-amber-300">"डिजिटल शिक्षा आज की तैयारी, कल की सफलता की कुंजी है।"</p>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
                    <picture>
                        <source srcset="<?= BASE_URL ?>/assets/images/digital-school.webp" type="image/webp">
                        <img src="<?= BASE_URL ?>/assets/images/digital-school.jpg" alt="Digital School" class="w-full h-auto">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
