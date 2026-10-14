<?php
/**
 * Financial Literacy & Money Psychology Page
 * Based on Presentation Slides: 12, 15, 16, 17, 22
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/helpers.php';

$page_title = "वित्तीय शिक्षा, मनी साइकोलॉजी और डिजिटल फ्रॉड से सुरक्षा";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Header Banner -->
<div class="relative py-12 lg:py-16 bg-[#0c1322] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            <div class="lg:col-span-8 space-y-4">
                <span class="inline-block px-3 py-1 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-wallet mr-1"></i> वित्तीय समझदारी और मानसिक व्यवहार
                </span>
                <h1 class="text-3xl sm:text-5xl font-black text-white font-['Poppins']">
                    वित्तीय शिक्षा: <span class="text-emerald-400">सुरक्षित व मजबूत भविष्य</span>
                </h1>
                <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-2xl">
                    पैसा कमाना जितना जरूरी है, उससे कहीं ज्यादा जरूरी है पैसे के मनोवैज्ञानिक व्यवहार को समझना, बचत-निवेश के सिद्धांत अपनाना और डिजिटल धोखाधड़ी से अपनी मेहनत की कमाई को बचाना।
                </p>
                <div class="flex flex-wrap gap-3 pt-2 text-xs font-semibold">
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-emerald-400 border border-slate-700">वित्तीय योजना (Financial Planning)</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-amber-400 border border-slate-700">मनी साइकोलॉजी (Behavioral Finance)</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-cyan-400 border border-slate-700">साइबर सुरक्षा (Digital Safety)</span>
                    <span class="px-3 py-1.5 rounded-lg bg-slate-800 text-rose-400 border border-slate-700">ऑनलाइन फ्रॉड की सच्चाई (Scam Alert)</span>
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="rounded-2xl overflow-hidden border border-slate-800 shadow-xl">
                    <picture>
                        <source srcset="<?= BASE_URL ?>/assets/images/financial-literacy.webp" type="image/webp">
                        <img src="<?= BASE_URL ?>/assets/images/financial-literacy.jpg" alt="Financial Literacy" class="w-full h-auto">
                    </picture>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Slide 22: वित्तीय शिक्षा की मूल बातें -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-emerald-400 text-xs font-bold uppercase tracking-widest block mb-2">बुनियादी सिद्धांत</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                वित्तीय शिक्षा की मूल बातें
            </h2>
            <p class="text-slate-400 text-sm mt-2">
                हर छात्र और युवा के लिए आवश्यक चार मुख्य वित्तीय स्तंभ:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card rounded-2xl p-6 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-chart-pie"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">वित्तीय योजना बनाना</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    यह तय करना कि आपकी आय कहाँ से आएगी और वह किन प्राथमिकताओं में खर्च व संचित होगी। बिना योजना का पैसा पानी की तरह बह जाता है।
                </p>
            </div>

            <div class="glass-card rounded-2xl p-6 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-piggy-bank"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">बचत और बजटिंग</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    आय में से पहले बचत अलग करने का नियम (Pay Yourself First) सीखें। 50-30-20 नियम के अनुसार आवश्यकताओं, इच्छाओं और भविष्य में संतुलन रखें।
                </p>
            </div>

            <div class="glass-card rounded-2xl p-6 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-mobile-screen"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">डिजिटल भुगतान व बैंकिंग</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    UPI, नेट बैंकिंग और मोबाइल वॉलेट का स्मार्ट और सुरक्षित उपयोग। बैंक स्टेटमेंट की नियमित जांच और अनधिकृत कटौतियों की निगरानी।
                </p>
            </div>

            <div class="glass-card rounded-2xl p-6 border border-slate-800">
                <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-400 flex items-center justify-center text-xl mb-4">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-2">सुरक्षित वित्तीय भविष्य</h3>
                <p class="text-xs text-slate-400 leading-relaxed">
                    आपातकालीन फंड (Emergency Fund) बनाना, गैर-जरूरी कर्जों से बचना और कम उम्र से ही कंपाउंडिंग की शक्ति से निवेश शुरू करना।
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Slide 16: MONEY PSYCHOLOGY -->
<section class="py-16 bg-[#0c121e] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-6 space-y-6">
                <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block">व्यवहारिक वित्त (Behavioral Finance)</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white font-['Poppins']">
                    MONEY PSYCHOLOGY: <br>
                    <span class="gradient-text-gold">हम पैसे के फैसले कैसे लेते हैं?</span>
                </h2>
                <div class="p-4 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-300 font-semibold text-sm">
                    <i class="fa-solid fa-quote-left mr-2"></i> पैसे के पीछे केवल गणित नहीं, हमारा व्यवहार और मनोविज्ञान भी होता है!
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">
                    ज्यादातर लोग गणित की कमी से नहीं, बल्कि भावना, दिखावे और तुरंत संतुष्टि (Instant Gratification) की आदत के कारण वित्तीय संकट में फंसते हैं।
                </p>

                <div class="space-y-3 pt-2">
                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 flex items-start gap-3">
                        <i class="fa-solid fa-scale-balanced text-amber-400 mt-1"></i>
                        <div>
                            <strong class="text-white text-sm block">1. ज़रूरत और इच्छा में अंतर</strong>
                            <span class="text-xs text-slate-400">Needs (रोटी, शिक्षा, स्वास्थ्य) और Wants (महंगा फोन, ब्रांडेड दिखावा) को अलग पहचानना।</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 flex items-start gap-3">
                        <i class="fa-solid fa-share-nodes text-cyan-400 mt-1"></i>
                        <div>
                            <strong class="text-white text-sm block">2. दोस्तों और सोशल मीडिया का दबाव</strong>
                            <span class="text-xs text-slate-400">दूसरों की लाइफस्टाइल देखकर खुद को कमतर महसूस करने और फिजूलखर्ची से बचना।</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 flex items-start gap-3">
                        <i class="fa-solid fa-bolt text-rose-400 mt-1"></i>
                        <div>
                            <strong class="text-white text-sm block">3. तुरंत खरीदने की इच्छा (Instant Gratification)</strong>
                            <span class="text-xs text-slate-400">खरीदने से पहले 24 घंटे का नियम अपनाना: "क्या मुझे सचमुच इसकी ज़रूरत है?"</span>
                        </div>
                    </div>

                    <div class="p-3.5 rounded-xl bg-slate-900 border border-slate-800 flex items-start gap-3">
                        <i class="fa-solid fa-pause text-emerald-400 mt-1"></i>
                        <div>
                            <strong class="text-white text-sm block">4. खर्च करने से पहले रुककर सोचना</strong>
                            <span class="text-xs text-slate-400">हर आर्थिक निर्णय का दूरगामी परिणाम समझना और बजट की आदत डालना।</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-6">
                <div class="rounded-3xl overflow-hidden border border-slate-800 shadow-2xl">
                    <picture>
                        <source srcset="<?= BASE_URL ?>/assets/images/money-psychology.webp" type="image/webp">
                        <img src="<?= BASE_URL ?>/assets/images/money-psychology.jpg" alt="Money Psychology" class="w-full h-auto">
                    </picture>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Slide 15: ONLINE EARNING: दावा और वास्तविकता -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-rose-400 text-xs font-bold uppercase tracking-widest block mb-2">सावधानी एवं जागरूकता</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                ONLINE EARNING: दावा और वास्तविकता
            </h2>
            <div class="mt-3 inline-block px-4 py-1.5 rounded-full bg-rose-500/10 border border-rose-500/30 text-rose-300 font-bold text-sm">
                <i class="fa-solid fa-triangle-exclamation mr-1"></i> हर Online Income Claim सच नहीं होता!
            </div>
            <p class="text-slate-400 text-sm mt-3">
                इंटरनेट पर रोज़ाना युवाओं को आसान कमाई का लालच देकर ठगने वाले विज्ञापनों से बचने के 7 गोल्डन रूल्स:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm mb-3">1</div>
                <h4 class="text-white font-bold text-sm mb-1">“गारंटीड कमाई” जैसे दावों की जाँच करें</h4>
                <p class="text-xs text-slate-400">दुनिया में बिना किसी काम या वास्तविक कौशल के कोई भी गारंटीड रिटर्न नहीं दे सकता।</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm mb-3">2</div>
                <h4 class="text-white font-bold text-sm mb-1">बिना समझे पैसे कभी जमा न करें</h4>
                <p class="text-xs text-slate-400">यदि कोई कहे "पहले ₹2000 भेजो फिर रोज ₹500 मिलेगा", तो 100% वह पोंजी फ्रॉड है।</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm mb-3">3</div>
                <h4 class="text-white font-bold text-sm mb-1">कंपनी व सेवा की वास्तविक पहचान जाँचें</h4>
                <p class="text-xs text-slate-400">MCA रजिस्ट्रेशन, कॉर्पोरेट एड्रेस, GST नंबर और असली फाउंडर्स का पता लगाएं।</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm mb-3">4</div>
                <h4 class="text-white font-bold text-sm mb-1">कमाई का वास्तविक स्रोत समझें</h4>
                <p class="text-xs text-slate-400">कंपनी पैसे कहाँ से बना रही है? अगर उत्पाद कोई नहीं है और सिर्फ लोगों को जोड़ना है तो वह फ्रॉड है।</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm mb-3">5</div>
                <h4 class="text-white font-bold text-sm mb-1">खर्च, जोखिम और नियम व शर्तें पढ़ें</h4>
                <p class="text-xs text-slate-400">बारीक अक्षरों में लिखी हिडन फीस और विड्रॉल प्रतिबंधों को ध्यानपूर्वक पढ़ें।</p>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                <div class="w-9 h-9 rounded-lg bg-rose-500/20 text-rose-400 flex items-center justify-center font-bold text-sm mb-3">6</div>
                <h4 class="text-white font-bold text-sm mb-1">स्क्रीनशॉट्स या टेस्टिमोनियल्स पर अंधा भरोसा न करें</h4>
                <p class="text-xs text-slate-400">टेलीग्राम और व्हाट्सएप पर दिखाए जाने वाले बैंक बैलेंस के फर्जी स्क्रीनशॉट्स बहुत आसानी से बन जाते हैं।</p>
            </div>
        </div>

        <div class="mt-8 p-4 rounded-2xl bg-slate-900/90 border border-amber-500/30 text-center max-w-2xl mx-auto text-xs text-slate-300">
            <span class="text-amber-400 font-bold block text-sm mb-1">7. स्वतंत्र पुष्टि (Independent Verification)</span>
            किसी भी निवेश, पार्ट-टाइम टास्क जॉब या नौकरी के प्रस्ताव को स्वीकार करने से पहले अपने माता-पिता या अनुभवी विशेषज्ञ से सलाह लें।
        </div>
    </div>
</section>

<!-- Slide 12: DIGITAL SAFETY: 6 Digital Safety Rules -->
<section id="safety" class="py-16 bg-[#0c121e] border-b border-slate-800">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="text-cyan-400 text-xs font-bold uppercase tracking-widest block mb-1">साइबर सुरक्षा</span>
            <h2 class="text-3xl font-extrabold text-white font-['Poppins']">
                DIGITAL SAFETY: ऑनलाइन सुरक्षित कैसे रहें?
            </h2>
            <p class="text-slate-400 text-sm mt-1">
                स्मार्टफोन और डिजिटल युग में अपनी पहचान और बैंक खाते को सुरक्षित रखने के 6 अनिवार्य नियम:
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-key"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">1. OTP, PIN और Password किसी से साझा न करें</h4>
                    <p class="text-xs text-slate-400">बैंक या कोई भी आधिकारिक संस्था कभी भी फोन या मैसेज पर आपका OTP या पासवर्ड नहीं मांगती।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-qrcode"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">2. अनजान लिंक और संदिग्ध QR कोड से सावधान रहें</h4>
                    <p class="text-xs text-slate-400">पैसे प्राप्त करने के लिए कभी भी QR कोड स्कैन करने या UPI पिन डालने की आवश्यकता नहीं होती।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-shield-virus"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">3. मजबूत और अलग-अलग पासवर्ड इस्तेमाल करें</h4>
                    <p class="text-xs text-slate-400">सभी सोशल मीडिया, ईमेल और बैंकिंग ऐप्स के लिए अलग-अलग जटिल पासवर्ड रखें।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">4. सोशल मीडिया पर निजी जानकारी सीमित रखें</h4>
                    <p class="text-xs text-slate-400">घर का पता, फोन नंबर, यात्रा का लाइव स्टेटस और आधार विवरण सोशल प्लेटफॉर्म पर न डालें।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-phone-volume"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">5. संदिग्ध भुगतान तुरंत रिपोर्ट करें</h4>
                    <p class="text-xs text-slate-400">किसी भी अनधिकृत ट्रांजैक्शन की सूचना तुरंत अपने बैंक और राष्ट्रीय साइबर हेल्पलाइन 1930 पर दें।</p>
                </div>
            </div>

            <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800 flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-lg shrink-0">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm mb-1">6. दो-स्तरीय सुरक्षा (2FA) हमेशा चालू रखें</h4>
                    <p class="text-xs text-slate-400">Google, WhatsApp और इंस्टाग्राम पर Two-Factor Authentication सक्रिय कर अतिरिक्त सुरक्षा परत बनाएं।</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ₹999 का निर्णय Simulator Section (Slide 17) -->
<section id="activity999" class="py-16 bg-[#090d16]">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="glass-card-static rounded-3xl p-6 sm:p-10 border border-amber-500/40">
            <div class="text-center mb-8">
                <span class="text-amber-400 text-xs font-bold uppercase tracking-widest block mb-1">प्रस्तुति एक्टिविटी</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                    ACTIVITY 3: ₹ 999 का निर्णय सिम्युलेटर
                </h2>
                <p class="text-slate-400 text-xs sm:text-sm mt-1">
                    यदि आपको अभी ₹ 999 दिए जाएं, तो आप इनमें से क्या चुनेंगे? अपना विकल्प चुनकर तुरंत देखें कि यह आपके वित्तीय भविष्य पर क्या प्रभाव डालता है:
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div data-choice="1" class="decision-999-option cursor-pointer p-4 rounded-xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                    <span class="font-bold text-white text-sm block">विकल्प 1: किसी ज़रूरी चीज़ पर खर्च करना</span>
                    <span class="text-xs text-slate-400">दवा, अनिवार्य पढ़ाई सामग्री आदि।</span>
                </div>
                <div data-choice="2" class="decision-999-option cursor-pointer p-4 rounded-xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                    <span class="font-bold text-white text-sm block">विकल्प 2: उपयोगी कौशल या किताब के लिए बचाना</span>
                    <span class="text-xs text-slate-400">AI कोर्स, उपयोगी हुनर या 'The Great Economic Divide' पुस्तक।</span>
                </div>
                <div data-choice="3" class="decision-999-option cursor-pointer p-4 rounded-xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                    <span class="font-bold text-white text-sm block">विकल्प 3: कुछ रकम भविष्य के लिए बचाकर रखना</span>
                    <span class="text-xs text-slate-400">इमरजेंसी सेविंग्स अकाउंट में जमा करना।</span>
                </div>
                <div data-choice="4" class="decision-999-option cursor-pointer p-4 rounded-xl border border-slate-700 bg-slate-800/50 hover:border-amber-400 transition">
                    <span class="font-bold text-white text-sm block">विकल्प 4: अपनी पसंद की चीज़ पर खर्च करना</span>
                    <span class="text-xs text-slate-400">रेस्टोरेंट खाना, पार्टी, कपड़े या सिनेमा।</span>
                </div>
            </div>

            <div id="decision-999-result" class="hidden p-6 rounded-2xl bg-slate-900 border border-amber-500/50 shadow-xl">
                <div id="decision-999-analysis"></div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
