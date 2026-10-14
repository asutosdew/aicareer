<?php
/**
 * Home Page
 * Based on Presentation: DIGITAL LIFE, CAREER & MONEY
 * Author & Keynote: Sunil Kosariya (The Great Economic Divide)
 * Platform: PsychFiTech® & Digital School
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

$page_title = "डिजिटल दुनिया में सही निर्णय, बेहतर करियर और पैसे की समझ";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="relative overflow-hidden pt-12 pb-20 lg:pt-16 lg:pb-28 border-b border-slate-800/80 bg-gradient-to-b from-[#090d16] via-[#0d1424] to-[#090d16]">
    <!-- Ambient Background Glows -->
    <div class="absolute -top-32 left-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-amber-500/10 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute top-1/2 right-0 w-[400px] h-[400px] bg-cyan-500/10 blur-[140px] rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Left Hero Content -->
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-slate-800/90 border border-amber-500/30 text-amber-400 text-xs font-semibold tracking-wide shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    विद्यार्थियों एवं युवाओं के लिए विशेष जागरूकता सत्र
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white tracking-tight leading-[1.15] font-['Poppins']">
                    DIGITAL LIFE, <br>
                    <span class="gradient-text-gold">CAREER &amp; MONEY</span>
                </h1>

                <p class="text-lg sm:text-xl text-slate-300 font-medium leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    डिजिटल दुनिया में सही निर्णय, बेहतर करियर और पैसे की समझ। 
                    <span class="text-amber-400/90 block mt-1 text-base sm:text-lg">स्मार्ट शिक्षा, मजबूत भविष्य — AI से नई कौशल, अनंत अवसर!</span>
                </p>

                <!-- Keynote Presenter Badge -->
                <div class="inline-flex flex-col sm:flex-row items-center sm:items-start gap-4 p-4 rounded-2xl bg-slate-900/80 border border-slate-800/80 text-left">
                    <div class="w-12 h-12 rounded-xl bg-gradient-to-tr from-amber-500 to-amber-600 flex items-center justify-center text-slate-950 text-xl font-black shrink-0">
                        <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <div>
                        <div class="text-xs text-amber-400 font-bold uppercase tracking-wider">प्रस्तुतकर्ता (Presenter)</div>
                        <div class="text-base font-bold text-white">सुनील कोसारिया (Sunil Kosariya)</div>
                        <div class="text-xs text-slate-400">लेखक: <em class="text-slate-300 font-serif">THE GREAT ECONOMIC DIVIDE</em> | सत्र अवधि: 45 मिनट</div>
                    </div>
                </div>

                <!-- Call to Action Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 pt-4">
                    <a href="<?= BASE_URL ?>/register.php" class="w-full sm:w-auto px-8 py-4 rounded-xl btn-gold text-slate-950 font-extrabold text-base flex items-center justify-center gap-2 shadow-xl shadow-amber-500/20">
                        <i class="fa-solid fa-rocket"></i>
                        <span>अभी रजिस्टर करें (Free Access)</span>
                    </a>
                    <a href="<?= BASE_URL ?>/services.php" class="w-full sm:w-auto px-6 py-4 rounded-xl bg-slate-800/80 hover:bg-slate-700/80 border border-slate-700 text-white font-semibold text-base flex items-center justify-center gap-2 transition">
                        <i class="fa-solid fa-tags text-amber-400"></i>
                        <span>₹999 विशेष बंडल देखें</span>
                    </a>
                </div>

                <!-- 4 Core Pillars -->
                <div class="pt-4 border-t border-slate-800/80">
                    <div class="text-xs font-semibold text-slate-400 uppercase tracking-widest mb-3">4 मूल स्तंभ (Core Pillars)</div>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <div class="p-2.5 rounded-xl bg-slate-900/60 border border-slate-800 text-center">
                            <i class="fa-solid fa-brain text-amber-400 mb-1 block"></i>
                            <span class="text-xs font-bold text-white block">MIND</span>
                            <span class="text-[10px] text-slate-400">सोच &amp; मनोविज्ञान</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-900/60 border border-slate-800 text-center">
                            <i class="fa-solid fa-coins text-amber-400 mb-1 block"></i>
                            <span class="text-xs font-bold text-white block">MONEY</span>
                            <span class="text-[10px] text-slate-400">वित्त &amp; बजटिंग</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-900/60 border border-slate-800 text-center">
                            <i class="fa-solid fa-microchip text-cyan-400 mb-1 block"></i>
                            <span class="text-xs font-bold text-white block">TECHNOLOGY</span>
                            <span class="text-[10px] text-slate-400">AI &amp; ऑटोमेशन</span>
                        </div>
                        <div class="p-2.5 rounded-xl bg-slate-900/60 border border-slate-800 text-center">
                            <i class="fa-solid fa-arrow-trend-up text-emerald-400 mb-1 block"></i>
                            <span class="text-xs font-bold text-white block">GROWTH</span>
                            <span class="text-[10px] text-slate-400">करियर &amp; प्रगति</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Right Hero Visual / Presentation Graphic -->
            <div class="lg:col-span-5 relative">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <!-- Presentation Graphic Container -->
                    <div class="relative rounded-2xl overflow-hidden border border-amber-500/30 shadow-2xl shadow-amber-500/10 group">
                        <picture>
                            <source srcset="<?= BASE_URL ?>/assets/images/hero-presentation.webp" type="image/webp">
                            <img src="<?= BASE_URL ?>/assets/images/hero-presentation.jpg" alt="Digital Life Career & Money Presentation" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500">
                        </picture>
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 p-4 rounded-xl bg-slate-900/90 backdrop-blur-md border border-slate-800 text-xs">
                            <span class="text-amber-400 font-bold block mb-1">
                                <i class="fa-solid fa-bullseye mr-1"></i> उद्देश्य (Objective):
                            </span>
                            <p class="text-slate-300">
                                छात्रों को डिजिटल भटकाव से निकालकर AI कौशल, सही करियर विकल्प और सुरक्षित वित्तीय समझ प्रदान करना।
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Today's 5 Learning Outcomes Section (Slide 4) -->
<section class="py-16 bg-slate-950/50 border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block mb-2">मुख्य सीख</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                आज के 5 Learning Outcomes
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                इस जागरूकता सत्र से हर विद्यार्थी को निम्नलिखित 5 मुख्य क्षमताओं की स्पष्ट समझ प्राप्त होती है:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <!-- Outcome 1 -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-base mb-4">
                        1
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">करियर विकल्प पहचानना</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        अपनी रुचि और वास्तविक योग्यता के अनुसार सटीक और भविष्योन्मुख करियर की पहचान करना।
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80 text-[11px] text-amber-400 font-medium">
                    <i class="fa-solid fa-check mr-1"></i> रुचि व योग्यता
                </div>
            </div>

            <!-- Outcome 2 -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold text-base mb-4">
                        2
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">समय और ध्यान का प्रबंधन</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        स्मार्टफोन और डिजिटल आदतों को व्यवस्थित कर समय और मानसिक एकाग्रता को बेहतर बनाना।
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80 text-[11px] text-cyan-400 font-medium">
                    <i class="fa-solid fa-clock mr-1"></i> स्क्रीन टाइम सुधार
                </div>
            </div>

            <!-- Outcome 3 -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-base mb-4">
                        3
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">AI का ज़िम्मेदार उपयोग</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        AI को पढ़ाई का सहायक बनाना, न कि अपने मस्तिष्क का मालिक या अंधा निर्णय लेने वाला।
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80 text-[11px] text-purple-400 font-medium">
                    <i class="fa-solid fa-robot mr-1"></i> स्मार्ट स्टडी टूल
                </div>
            </div>

            <!-- Outcome 4 -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-base mb-4">
                        4
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">ऑनलाइन फ्रॉड से सुरक्षा</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        ऑनलाइन धोखाधड़ी और अवास्तविक 'गारंटीड कमाई' के भ्रामक दावों को पहचानकर सुरक्षित रहना।
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80 text-[11px] text-rose-400 font-medium">
                    <i class="fa-solid fa-shield-halved mr-1"></i> डिजिटल सेफ्टी
                </div>
            </div>

            <!-- Outcome 5 -->
            <div class="glass-card rounded-2xl p-5 border border-slate-800 relative flex flex-col justify-between">
                <div>
                    <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-base mb-4">
                        5
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">30-दिन व्यक्तिगत लक्ष्य</h3>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        अगले 30 दिनों के लिए एक स्पष्ट, मापने योग्य व्यक्तिगत एक्शन प्लान तय कर उस पर काम करना।
                    </p>
                </div>
                <div class="mt-4 pt-3 border-t border-slate-800/80 text-[11px] text-emerald-400 font-medium">
                    <i class="fa-solid fa-calendar-check mr-1"></i> पर्सनल एक्शन प्लान
                </div>
            </div>
        </div>
    </div>
</section>

<!-- The Two Students Story & Comparison Table (Slide 25) -->
<section class="py-16 sm:py-20 bg-[#090d16]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-5 space-y-5">
                <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block">तुलनात्मक अध्ययन (Case Study)</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                    AI और वित्तीय कौशल से <br>
                    <span class="gradient-text-gold">करियर में बढ़त</span>
                </h2>
                <p class="text-slate-300 text-sm leading-relaxed">
                    कौशल का संगम ही करियर को नई दिशा देता है। केवल पारंपरिक किताबी ज्ञान पर्याप्त नहीं है — आज के युग में AI और वित्तीय समझदारी ही आपको भीड़ से अलग बनाती है।
                </p>

                <!-- Two Students Story Box (Slide 25) -->
                <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 relative overflow-hidden">
                    <div class="text-amber-400 font-bold text-sm mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-users"></i> दो छात्रों की वास्तविक कहानी:
                    </div>
                    <p class="text-slate-300 text-xs leading-relaxed italic">
                        "एक छात्र ने केवल सामान्य स्कूली/कॉलेजी पढ़ाई की, जबकि दूसरे छात्र ने पढ़ाई के साथ-साथ AI टूल्स और वित्तीय कौशल सीखे — परिणाम: दूसरे छात्र को मिला बेहतर अवसर, तेज करियर वृद्धि और आर्थिक स्वतंत्रता!"
                    </p>
                </div>

                <div class="pt-2">
                    <a href="<?= BASE_URL ?>/career-guide.php" class="inline-flex items-center gap-2 text-amber-400 font-bold text-sm hover:underline">
                        <span>करियर गाइडेंस का 4-चरणीय रास्ता देखें</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Comparison Matrix -->
            <div class="lg:col-span-7">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- Without AI & Finance Knowledge -->
                    <div class="p-6 rounded-2xl bg-rose-950/20 border border-rose-500/30 space-y-4">
                        <div class="flex items-center gap-2 text-rose-400 font-bold text-base">
                            <i class="fa-solid fa-circle-xmark"></i>
                            <span>बिना AI / वित्तीय ज्ञान के</span>
                        </div>
                        <ul class="space-y-3 text-sm text-slate-300">
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-minus text-rose-400 mt-1 text-xs"></i>
                                <span><strong>सीमित अवसर:</strong> पारंपरिक नौकरियों में अत्यधिक प्रतिस्पर्धा और सीमित सैलरी।</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-minus text-rose-400 mt-1 text-xs"></i>
                                <span><strong>कम आत्मविश्वास:</strong> नई तकनीक और डिजिटल दुनिया के बदलावों से डर।</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-minus text-rose-400 mt-1 text-xs"></i>
                                <span><strong>धीमी प्रगति:</strong> करियर में आगे बढ़ने की गति बहुत धीमी और अनिश्चित।</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-minus text-rose-400 mt-1 text-xs"></i>
                                <span><strong>वित्तीय तनाव:</strong> बचत, बजट और निवेश की समझ न होने से खाली जेब का संकट।</span>
                            </li>
                        </ul>
                    </div>

                    <!-- With AI & Finance Knowledge -->
                    <div class="p-6 rounded-2xl bg-emerald-950/20 border border-emerald-500/40 space-y-4 shadow-xl">
                        <div class="flex items-center gap-2 text-emerald-400 font-bold text-base">
                            <i class="fa-solid fa-circle-check"></i>
                            <span>AI और वित्तीय ज्ञान के साथ</span>
                        </div>
                        <ul class="space-y-3 text-sm text-slate-300">
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 text-xs"></i>
                                <span><strong>अधिक और बेहतर अवसर:</strong> उच्च वेतन वाले AI-कुशलता वाले आधुनिक रोजगार।</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 text-xs"></i>
                                <span><strong>स्मार्ट निर्णय &amp; मजबूत आत्मविश्वास:</strong> तकनीक को साथी बनाकर आत्मविश्वास में वृद्धि।</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 text-xs"></i>
                                <span><strong>तेज़ सीख, तेज़ उन्नति:</strong> AI टूल्स के उपयोग से 10x तेज कार्य क्षमता।</span>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <i class="fa-solid fa-check text-emerald-400 mt-1 text-xs"></i>
                                <span><strong>सुरक्षित वित्तीय भविष्य:</strong> सही बचत, समझदारी से निवेश और फ्रॉड से पूर्ण सुरक्षा।</span>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

<!-- PsychFiTech Featured Offer & Services Banner (Slide 21) -->
<section class="py-16 bg-gradient-to-r from-slate-950 via-[#0b1329] to-slate-950 border-y border-amber-500/30 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="rounded-3xl glass-card-static border border-amber-500/40 p-6 sm:p-10 lg:p-12 relative overflow-hidden shadow-2xl">
            <!-- Background Glow -->
            <div class="absolute -right-20 -bottom-20 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left Poster Details -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/15 border border-amber-500/30 text-amber-400 text-xs font-bold uppercase tracking-widest">
                        <i class="fa-solid fa-gift"></i> विशेष बंडल ऑफर
                    </div>
                    
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white font-['Poppins'] leading-tight">
                        AI सीखें | <span class="gradient-text-gold">Business बढ़ाएँ |</span>
                    </h2>
                    
                    <p class="text-base sm:text-lg text-slate-300 font-medium">
                        अपने करियर, स्किल और भविष्य के लिए एक बेहतर मौका। 
                        <br class="hidden sm:inline">PsychFiTech® AI Business Growth Partner Program!
                    </p>

                    <!-- Bundle Breakdown -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800">
                            <div class="text-xs text-amber-400 font-bold mb-1">7-Day AI Practical Course</div>
                            <div class="text-xl font-black text-white">मूल्य: ₹999</div>
                            <div class="text-xs text-slate-400 mt-1">ChatGPT, Gemini, Canva AI, Automation</div>
                        </div>
                        <div class="p-4 rounded-xl bg-slate-900/90 border border-slate-800">
                            <div class="text-xs text-cyan-400 font-bold mb-1">THE GREAT ECONOMIC DIVIDE (Book)</div>
                            <div class="text-xl font-black text-white">मूल्य: ₹399</div>
                            <div class="text-xs text-slate-400 mt-1">सुनील कोसारिया लिखित (Printed + PDF FREE!)</div>
                        </div>
                    </div>

                    <!-- Total Price & Offer -->
                    <div class="flex flex-wrap items-baseline gap-4 pt-2">
                        <div class="text-sm text-slate-400">
                            कुल मूल्य: <span class="line-through text-slate-500 text-base">₹1,398</span>
                        </div>
                        <div class="text-3xl sm:text-4xl font-black text-amber-400">
                            ऑफर मूल्य: ₹999/-
                        </div>
                        <span class="px-2.5 py-1 rounded-md bg-emerald-500/20 text-emerald-400 text-xs font-bold border border-emerald-500/40">
                            Printed Book + Book PDF FREE!
                        </span>
                    </div>

                    <!-- Action buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">
                        <a href="<?= BASE_URL ?>/register.php" class="px-8 py-3.5 rounded-xl btn-gold text-slate-950 font-bold text-base text-center shadow-lg">
                            <i class="fa-solid fa-cart-shopping mr-2"></i> अभी जॉइन करें &rarr;
                        </a>
                        <a href="<?= BASE_URL ?>/login.php" class="px-6 py-3.5 rounded-xl bg-slate-800 text-white font-semibold text-base text-center border border-slate-700 hover:border-slate-500 transition">
                            सदस्य लॉगिन कर एक्सेस करें
                        </a>
                    </div>
                </div>

                <!-- Right Poster Image -->
                <div class="lg:col-span-5">
                    <div class="rounded-2xl overflow-hidden border border-amber-500/30 shadow-2xl relative group">
                        <picture>
                            <source srcset="<?= BASE_URL ?>/assets/images/psychfitech-offer.webp" type="image/webp">
                            <img src="<?= BASE_URL ?>/assets/images/psychfitech-offer.jpg" alt="PsychFiTech AI Offer" class="w-full h-auto object-cover group-hover:scale-102 transition-transform duration-300">
                        </picture>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- Interactive Activity 3 Preview: ₹999 का निर्णय (Slide 17) -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block mb-1">इंटरैक्टिव एक्टिविटी</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                ACTIVITY 3: ₹ 999 का निर्णय
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                मान लीजिए आपके पास <strong>₹ 999</strong> हैं, आप इन विकल्पों में से कौन-सा विकल्प चुनेंगे? किसी भी विकल्प पर क्लिक करके मनोवैज्ञानिक विश्लेषण देखें:
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
            <div data-choice="1" class="decision-999-option cursor-pointer p-5 rounded-2xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center font-bold text-sm">1</span>
                    <h4 class="text-sm sm:text-base font-bold text-white">किसी ज़रूरी चीज़ पर खर्च करना</h4>
                </div>
                <p class="text-xs text-slate-400 mt-2 pl-11">दवा, आवश्यक किताबें या तत्काल पारिवारिक आवश्यकता।</p>
            </div>

            <div data-choice="2" class="decision-999-option cursor-pointer p-5 rounded-2xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-cyan-500/20 text-cyan-400 flex items-center justify-center font-bold text-sm">2</span>
                    <h4 class="text-sm sm:text-base font-bold text-white">उपयोगी कौशल या किताब के लिए बचाना</h4>
                </div>
                <p class="text-xs text-slate-400 mt-2 pl-11">AI कोर्स, व्यावसायिक प्रशिक्षण या आत्म-विकास की पुस्तक।</p>
            </div>

            <div data-choice="3" class="decision-999-option cursor-pointer p-5 rounded-2xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center font-bold text-sm">3</span>
                    <h4 class="text-sm sm:text-base font-bold text-white">कुछ रकम भविष्य के लिए बचाकर रखना</h4>
                </div>
                <p class="text-xs text-slate-400 mt-2 pl-11">आपातकालीन बचत (Emergency Savings) बैंक या गुल्लक में।</p>
            </div>

            <div data-choice="4" class="decision-999-option cursor-pointer p-5 rounded-2xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                <div class="flex items-center gap-3">
                    <span class="w-8 h-8 rounded-lg bg-purple-500/20 text-purple-400 flex items-center justify-center font-bold text-sm">4</span>
                    <h4 class="text-sm sm:text-base font-bold text-white">अपनी पसंद की किसी चीज़ पर खर्च करना</h4>
                </div>
                <p class="text-xs text-slate-400 mt-2 pl-11">मनोरंजन, पार्टी, कपड़े या ऑनलाइन गैजेट्स।</p>
            </div>
        </div>

        <!-- Dynamic Output Box -->
        <div id="decision-999-result" class="hidden p-6 rounded-2xl bg-slate-900 border border-amber-500/50 shadow-xl transition-all">
            <div id="decision-999-analysis"></div>
            <div class="mt-4 pt-3 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                <span>सत्र संदर्भ: <em>Money Psychology - पैसे के पीछे केवल गणित नहीं, व्यवहार भी है।</em></span>
                <a href="<?= BASE_URL ?>/financial-literacy.php" class="text-amber-400 font-bold hover:underline">और विस्तार से समझें &rarr;</a>
            </div>
        </div>
    </div>
</section>

<!-- Core Philosophy Banner (Slide 20) -->
<section class="py-14 bg-gradient-to-r from-amber-600 via-amber-500 to-amber-700 text-slate-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center space-y-4">
            <div class="text-xs uppercase tracking-widest font-black text-slate-900">हमारा मूल संदेश</div>
            <h2 class="text-3xl sm:text-4xl font-black font-['Poppins'] tracking-tight">
                THINK BETTER. CHOOSE BETTER. USE TECHNOLOGY WISELY.
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 max-w-5xl mx-auto pt-4 text-left">
                <div class="p-4 rounded-xl bg-slate-950/10 border border-slate-950/20">
                    <div class="font-black text-slate-900 text-sm mb-1">1. जानकारी के आधार पर निर्णय</div>
                    <div class="text-xs text-slate-900/80">अपने करियर के निर्णय सुनी-सुनाई बातों पर नहीं, तथ्य और जानकारी से लें।</div>
                </div>
                <div class="p-4 rounded-xl bg-slate-950/10 border border-slate-950/20">
                    <div class="font-black text-slate-900 text-sm mb-1">2. तकनीक को विकास का साधन बनाएँ</div>
                    <div class="text-xs text-slate-900/80">स्मार्टफोन और डिजिटल टूल्स को अपनी प्रगति का हथियार बनाएं।</div>
                </div>
                <div class="p-4 rounded-xl bg-slate-950/10 border border-slate-950/20">
                    <div class="font-black text-slate-900 text-sm mb-1">3. सोच-समझकर आर्थिक निर्णय</div>
                    <div class="text-xs text-slate-900/80">पैसे से जुड़े हर फैसले में ज़रूरत और इच्छा का अंतर समझें।</div>
                </div>
                <div class="p-4 rounded-xl bg-slate-950/10 border border-slate-950/20">
                    <div class="font-black text-slate-900 text-sm mb-1">4. छोटे कदमों से शुरुआत</div>
                    <div class="text-xs text-slate-900/80">रोज 30 मिनट का अभ्यास आपके भविष्य को पूरी तरह बदल सकता है।</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
