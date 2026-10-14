<?php
/**
 * AI Tools & Prompts Studio
 * PsychFiTech® | Digital Life, Career & Money
 * Practical prompt templates for students & creators
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/../includes/auth_check.php';

$page_title = "AI प्रॉम्प्ट्स व टूल्स लैब";
$logged_user = current_user();

require_once __DIR__ . '/../includes/member_header.php';
?>

<div class="py-8 sm:py-10">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header Banner -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800 bg-gradient-to-r from-slate-900 via-[#0b162a] to-slate-900">
            <span class="text-xs text-cyan-400 font-bold uppercase tracking-widest block mb-1">
                <i class="fa-solid fa-wand-magic-sparkles mr-1"></i> हैंड्स-ऑन AI लैब
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                AI प्रॉम्प्ट्स &amp; टूल्स स्टूडियो
            </h1>
            <p class="text-slate-300 text-xs sm:text-sm mt-2 leading-relaxed max-w-2xl">
                जैसा कि प्रेजेंटेशन में बताया गया है — <em>"AI पढ़ाई का सहायक है, निर्णय लेने वाला मालिक नहीं।"</em> यहाँ छात्रों और युवाओं के लिए तैयार किए गए उपयोगी रेडी-टू-यूज़ प्रॉम्प्ट्स दिए गए हैं जिन्हें आप ChatGPT, Gemini या Claude में सीधे कॉपी-पेस्ट कर सकते हैं।
            </p>
        </div>

        <!-- Prompts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Prompt 1: Concept Explainer -->
            <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-cyan-400 bg-cyan-950/60 border border-cyan-800 px-2.5 py-1 rounded-md">
                            अध्ययन सहायक (Study)
                        </span>
                        <span class="text-xs text-slate-400">ChatGPT / Gemini</span>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">1. कठिन विषय को सरल भाषा में समझना</h3>
                    <p class="text-xs text-slate-400 mb-3">किसी भी जटिल वैज्ञानिक, वित्तीय या तकनीकी टॉपिक को आसान कहानियों में समझने हेतु:</p>
                    
                    <div class="p-3.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 font-mono leading-relaxed mb-4" id="prompt-1">
"कृपया मुझे [विषय का नाम, उदा. Compound Interest / Blockchain] इस तरह समझाएँ जैसे मैं 15 साल का छात्र हूँ। सरल हिंदी-अंग्रेजी (हिंग्लिश) में 3 दैनिक जीवन के उदाहरण दें और अंत में 3 मुख्य बातें सारांश में बताएं।"
                    </div>
                </div>

                <button onclick="copyPrompt('prompt-1', this)" class="w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold flex items-center justify-center gap-1.5 border border-slate-700 transition">
                    <i class="fa-solid fa-copy text-amber-400"></i>
                    <span>प्रॉम्प्ट कॉपी करें (Copy Prompt)</span>
                </button>
            </div>

            <!-- Prompt 2: Practice Quiz Generator -->
            <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-amber-400 bg-amber-950/60 border border-amber-800 px-2.5 py-1 rounded-md">
                            परीक्षा अभ्यास (Exam Prep)
                        </span>
                        <span class="text-xs text-slate-400">Claude / ChatGPT</span>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">2. अभ्यास हेतु मॉक टेस्ट व Quiz तैयार करना</h3>
                    <p class="text-xs text-slate-400 mb-3">अपनी तैयारी की जांच करने के लिए इंटरैक्टिव सवाल पूछने हेतु:</p>
                    
                    <div class="p-3.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 font-mono leading-relaxed mb-4" id="prompt-2">
"मैं [कक्षा / विषय] की तैयारी कर रहा हूँ। मेरे लिए [चैप्टर का नाम] से 5 बहुविकल्पीय (MCQ) प्रश्न तैयार करें। उत्तर तुरंत न दें। पहले केवल प्रश्न पूछें, जब मैं उत्तर दूँ तब मेरा स्कोर और सही उत्तर की व्याख्या दें।"
                    </div>
                </div>

                <button onclick="copyPrompt('prompt-2', this)" class="w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold flex items-center justify-center gap-1.5 border border-slate-700 transition">
                    <i class="fa-solid fa-copy text-amber-400"></i>
                    <span>प्रॉम्प्ट कॉपी करें (Copy Prompt)</span>
                </button>
            </div>

            <!-- Prompt 3: Career Research -->
            <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-purple-400 bg-purple-950/60 border border-purple-800 px-2.5 py-1 rounded-md">
                            करियर रिसर्च (Career)
                        </span>
                        <span class="text-xs text-slate-400">Gemini / Perplexity</span>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">3. 5-Point करियर अनुसंधान प्रॉम्प्ट</h3>
                    <p class="text-xs text-slate-400 mb-3">किसी भी करियर में 5 से 10 साल की भविष्य संभावनाओं की जांच हेतु:</p>
                    
                    <div class="p-3.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 font-mono leading-relaxed mb-4" id="prompt-3">
"मैं [करियर का नाम, उदा. AI Prompt Engineer / Data Analyst] में करियर बनाने पर विचार कर रहा हूँ। मुझे भारत में इसके लिए: 1. आवश्यक शुरुआती स्किल्स, 2. शीर्ष 3 सर्टिफिकेशन्स, 3. औसत शुरुआती सैलरी, और 4. AI से होने वाले अगले 5 वर्षों के बदलाव का वस्तुनिष्ठ विश्लेषण दें।"
                    </div>
                </div>

                <button onclick="copyPrompt('prompt-3', this)" class="w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold flex items-center justify-center gap-1.5 border border-slate-700 transition">
                    <i class="fa-solid fa-copy text-amber-400"></i>
                    <span>प्रॉम्प्ट कॉपी करें (Copy Prompt)</span>
                </button>
            </div>

            <!-- Prompt 4: Canva AI & Visual Design -->
            <div class="glass-card rounded-2xl p-6 border border-slate-800 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs font-bold text-emerald-400 bg-emerald-950/60 border border-emerald-800 px-2.5 py-1 rounded-md">
                            क्रिएटिव व बिजनेस (Design)
                        </span>
                        <span class="text-xs text-slate-400">Canva AI / Midjourney</span>
                    </div>
                    <h3 class="text-base font-bold text-white mb-2">4. कैनवा AI प्रेजेंटेशन और डिजाइन प्रॉम्प्ट</h3>
                    <p class="text-xs text-slate-400 mb-3">आधुनिक बिजनेस और स्कूल प्रोजेक्ट स्लाइड्स तैयार करने हेतु:</p>
                    
                    <div class="p-3.5 rounded-xl bg-slate-950 border border-slate-800 text-xs text-slate-300 font-mono leading-relaxed mb-4" id="prompt-4">
"Create a modern 5-slide presentation outline on 'Artificial Intelligence and Career Opportunities for Indian Youth'. Include slide title, 3 key bullet points per slide, and recommended image prompt for Canva Magic Design."
                    </div>
                </div>

                <button onclick="copyPrompt('prompt-4', this)" class="w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold flex items-center justify-center gap-1.5 border border-slate-700 transition">
                    <i class="fa-solid fa-copy text-amber-400"></i>
                    <span>प्रॉम्प्ट कॉपी करें (Copy Prompt)</span>
                </button>
            </div>

        </div>

    </div>
</div>

<script>
function copyPrompt(id, btn) {
    const text = document.getElementById(id).innerText;
    navigator.clipboard.writeText(text).then(() => {
        const originalHtml = btn.innerHTML;
        btn.innerHTML = '<i class="fa-solid fa-check text-emerald-400"></i> <span class="text-emerald-400 font-bold">कॉपी हो गया! (Copied)</span>';
        btn.classList.add('border-emerald-500');
        setTimeout(() => {
            btn.innerHTML = originalHtml;
            btn.classList.remove('border-emerald-500');
        }, 2000);
    });
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
