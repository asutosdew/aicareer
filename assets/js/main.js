/**
 * Main JavaScript for PsychFiTech & Digital School
 */

document.addEventListener('DOMContentLoaded', function () {
    // Mobile navigation toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', function () {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Auto-dismiss alerts after 5 seconds
    const flashAlerts = document.querySelectorAll('.flash-alert');
    flashAlerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s ease';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    });

    // Activity 3: ₹999 Decision Tool Simulator
    const activity999Options = document.querySelectorAll('.decision-999-option');
    const activity999Result = document.getElementById('decision-999-result');
    const activity999Analysis = document.getElementById('decision-999-analysis');

    if (activity999Options.length > 0 && activity999Result) {
        activity999Options.forEach(option => {
            option.addEventListener('click', function () {
                activity999Options.forEach(o => {
                    o.classList.remove('border-amber-500', 'bg-amber-500/10');
                    o.classList.add('border-slate-700', 'bg-slate-800/50');
                });
                this.classList.remove('border-slate-700', 'bg-slate-800/50');
                this.classList.add('border-amber-500', 'bg-amber-500/10');

                const choice = this.dataset.choice;
                activity999Result.classList.remove('hidden');

                let title = '';
                let analysis = '';

                switch (choice) {
                    case '1':
                        title = 'विकल्प 1: किसी ज़रूरी चीज़ पर खर्च करना (Essential Need)';
                        analysis = '<strong>मनोवैज्ञानिक विश्लेषण:</strong> यह एक व्यावहारिक और विवेकपूर्ण निर्णय है। ज़रूरतों (Needs) को प्राथमिक देना वित्तीय सुरक्षा का पहला नियम है। लेकिन ध्यान रखें कि हर "इच्छा" को "ज़रूरत" न समझ लें!';
                        break;
                    case '2':
                        title = 'विकल्प 2: उपयोगी कौशल या किताब के लिए बचाना (Self-Investment)';
                        analysis = '<strong>मनोवैज्ञानिक विश्लेषण:</strong> <em>सर्वोत्तम रिटर्न देने वाला निवेश!</em> जैसा कि प्रस्तुति में बताया गया है, "शिक्षा और AI कौशल पर किया गया खर्च भविष्य में 10 गुना होकर वापस आता है।" यह दीर्घकालिक सफलता की सोच है।';
                        break;
                    case '3':
                        title = 'विकल्प 3: भविष्य के लिए बचाकर रखना (Emergency Fund / Savings)';
                        analysis = '<strong>मनोवैज्ञानिक विश्लेषण:</strong> वित्तीय अनुशासन का प्रतीक! आज की बचत ही कल की आज़ादी और आपातकालीन सुरक्षा है। यह दर्शाता है कि आप भविष्य के अनिश्चित जोखिमों के प्रति सतर्क हैं।';
                        break;
                    case '4':
                        title = 'विकल्प 4: अपनी पसंद की चीज़ पर खर्च करना (Instant Gratification / Want)';
                        analysis = '<strong>मनोवैज्ञानिक विश्लेषण:</strong> तुरंत खुशी (Instant Gratification)! अपने शौक पूरे करना गलत नहीं है, लेकिन यदि बजट सीमित हो तो दिखावे और सोशल मीडिया के दबाव में गैर-जरूरी खर्च करने से खाली जेब का संकट पैदा होता है।';
                        break;
                }

                activity999Analysis.innerHTML = `<h4 class="text-amber-400 font-bold mb-2 text-lg">${title}</h4><p class="text-slate-300 leading-relaxed">${analysis}</p>`;
            });
        });
    }

    // Activity 2: 30-Minute Challenge Selector
    const challengeButtons = document.querySelectorAll('.challenge-choice-btn');
    const challengeFeedback = document.getElementById('challenge-feedback');

    if (challengeButtons.length > 0 && challengeFeedback) {
        challengeButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                challengeButtons.forEach(b => b.classList.remove('ring-2', 'ring-cyan-400', 'bg-cyan-500/20'));
                this.classList.add('ring-2', 'ring-cyan-400', 'bg-cyan-500/20');
                const outcome = this.dataset.outcome;
                challengeFeedback.classList.remove('hidden');
                challengeFeedback.innerHTML = `
                    <div class="p-4 rounded-xl bg-cyan-950/60 border border-cyan-500/40 text-cyan-200">
                        <i class="fa-solid fa-circle-check text-cyan-400 mr-2"></i>
                        <strong>शानदार चुनाव!</strong> ${outcome}
                    </div>
                `;
            });
        });
    }

    // Career 5-Point Formula Interactive Quiz
    const careerQuizForm = document.getElementById('career-quiz-form');
    const careerQuizOutput = document.getElementById('career-quiz-output');

    if (careerQuizForm && careerQuizOutput) {
        careerQuizForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const interest = document.getElementById('quiz-interest').value;
            const ability = document.getElementById('quiz-ability').value;
            const targetField = document.getElementById('quiz-field').value;

            careerQuizOutput.classList.remove('hidden');
            document.getElementById('quiz-result-title').innerText = `आपकी करियर सिफारिश: ${targetField}`;
            document.getElementById('quiz-result-body').innerHTML = `
                <p class="text-slate-300 mb-3">आपकी रुचि (<strong>${interest}</strong>) और योग्यता (<strong>${ability}</strong>) के विश्लेषण के अनुसार:</p>
                <ul class="list-disc list-inside space-y-2 text-slate-300 text-sm">
                    <li><strong>अवसर (Opportunity):</strong> इस क्षेत्र में AI और डिजिटल टूल्स के ज्ञान के साथ 5-10 गुना अधिक माँग है।</li>
                    <li><strong>अगला कदम (Action):</strong> अगले 30 दिन में 1 बेसिक टूल (उदा. ChatGPT / Python / Canva / Financial Modeling) पर रोज़ 30 मिनट का अभ्यास शुरू करें।</li>
                    <li><strong>भविष्य (Future 2026-2035):</strong> पारंपरिक कार्यप्रणाली की जगह AI-सक्षम प्रोफेशनल्स की सर्वोच्च वैल्यू होगी।</li>
                </ul>
            `;
            careerQuizOutput.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    }
});
