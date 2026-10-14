<?php
/**
 * Contact & Q&A Discussion Page
 * Based on Presentation Slides: 19 & 26
 * THINK • ASK • DISCUSS
 */

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/config/helpers.php';

$page_title = "सवाल-जवाब व संपर्क (Q&A & Discussion)";
$success = false;
$errors = [];

$name = '';
$email = '';
$phone = '';
$subject = 'करियर व AI संबंधित प्रश्न';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $name = clean_input($_POST['name'] ?? '');
    $email = clean_input($_POST['email'] ?? '');
    $phone = clean_input($_POST['phone'] ?? '');
    $subject = clean_input($_POST['subject'] ?? 'सामान्य पूछताछ');
    $message = clean_input($_POST['message'] ?? '');

    if (empty($name)) {
        $errors[] = "कृपया अपना नाम दर्ज करें।";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "कृपया मान्य ईमेल दर्ज करें।";
    }
    if (empty($message)) {
        $errors[] = "कृपया अपना संदेश या प्रश्न दर्ज करें।";
    }

    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO contact_inquiries (name, email, phone, subject, message)
                VALUES (?, ?, ?, ?, ?)
            ");
            $stmt->execute([$name, $email, $phone, $subject, $message]);
            $success = true;
            set_flash('success', 'आपका प्रश्न सफलतापूर्वक प्राप्त हो गया है! हमारी टीम शीघ्र आपसे संपर्क करेगी। (Message Sent!)');
            
            // Clear inputs
            $name = '';
            $email = '';
            $phone = '';
            $message = '';
        } catch (PDOException $e) {
            $errors[] = "संदेश भेजने में त्रुटि: " . $e->getMessage();
        }
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<!-- Header Banner -->
<div class="relative py-12 lg:py-16 bg-[#0c1322] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center max-w-3xl">
        <span class="inline-block px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-bold uppercase tracking-wider mb-3">
            <i class="fa-solid fa-comments mr-1"></i> THINK • ASK • DISCUSS (Slide 19)
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-white font-['Poppins']">
            सवाल-जवाब: <span class="gradient-text-gold">अब आपकी बारी!</span>
        </h1>
        <p class="text-slate-300 text-base sm:text-lg leading-relaxed mt-4">
            क्या आपके मन में करियर, AI, वित्तीय निर्णयों या डिजिटल आदतों को लेकर कोई उलझन है? 
            <br>हमसे पूछें और प्रेजेंटेशन आधारित विस्तृत समाधान प्राप्त करें।
        </p>
    </div>
</div>

<!-- Main Q&A Content -->
<section class="py-16 bg-[#090d16] border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left Column: The 5 Core Presentation Questions (Slide 19) -->
            <div class="lg:col-span-7 space-y-6">
                <div class="mb-4">
                    <span class="text-xs text-amber-400 font-bold uppercase tracking-widest block">प्रस्तुति के 5 मुख्य विचारणीय प्रश्न</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins'] mt-1">
                        छात्रों की 5 प्रमुख उलझनें और उनके समाधान
                    </h2>
                </div>

                <div class="space-y-4">
                    <!-- Q1 -->
                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                        <h3 class="text-base font-bold text-white mb-2 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-amber-500/20 text-amber-400 flex items-center justify-center text-xs font-bold">1</span>
                            करियर चुनते समय सबसे बड़ी उलझन क्या है?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed pl-8">
                            <strong>समाधान:</strong> सबसे बड़ी उलझन होती है "दूसरों की नकल करना" और "अपनी असली रुचि व योग्यता को न जानना"। इसे सुलझाने के लिए हमारे <strong>5-Point Formula</strong> (Interest, Ability, Opportunity, Action, Future) का उपयोग करें।
                        </p>
                    </div>

                    <!-- Q2 -->
                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                        <h3 class="text-base font-bold text-white mb-2 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-cyan-500/20 text-cyan-400 flex items-center justify-center text-xs font-bold">2</span>
                            AI का सही उपयोग कैसे करें?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed pl-8">
                            <strong>समाधान:</strong> AI को अपनी पढ़ाई का <em>सहायक (Assistant)</em> बनाएं, न कि सोचने का मालिक। कठिन विषयों को सरल भाषा में समझना, अभ्यास के लिए क्विज बनाना और ड्राफ्ट तैयार करने में AI की मदद लें, लेकिन अंतिम निर्णय हमेशा अपने विवेक से लें।
                        </p>
                    </div>

                    <!-- Q3 -->
                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                        <h3 class="text-base font-bold text-white mb-2 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-rose-500/20 text-rose-400 flex items-center justify-center text-xs font-bold">3</span>
                            ऑनलाइन कमाई के दावों की जाँच कैसे करें?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed pl-8">
                            <strong>समाधान:</strong> किसी भी "गारंटीड कमाई" या "पार्ट-टाइम टास्क" के लालच में कभी पैसे जमा न करें। कंपनी की कॉर्पोरेट पहचान, कमाई का वास्तविक स्रोत और जोखिम की स्वतंत्र पुष्टि करें।
                        </p>
                    </div>

                    <!-- Q4 -->
                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                        <h3 class="text-base font-bold text-white mb-2 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-purple-500/20 text-purple-400 flex items-center justify-center text-xs font-bold">4</span>
                            समय और डिजिटल आदतों को कैसे सुधारें?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed pl-8">
                            <strong>समाधान:</strong> पढ़ाई के समय फोन के नोटिफिकेशन्स बंद रखें। सोने से 45 मिनट पहले स्क्रीन बंद करें। बिना उद्देश्य रील स्क्रॉल करने के बजाय रोज 30 मिनट का एक उपयोगी स्किल चैलेंज लें।
                        </p>
                    </div>

                    <!-- Q5 -->
                    <div class="p-5 rounded-2xl bg-slate-900 border border-slate-800">
                        <h3 class="text-base font-bold text-white mb-2 flex items-center gap-2">
                            <span class="w-6 h-6 rounded-full bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xs font-bold">5</span>
                            पैसे से जुड़े फैसलों में क्या ध्यान रखें?
                        </h3>
                        <p class="text-xs sm:text-sm text-slate-300 leading-relaxed pl-8">
                            <strong>समाधान:</strong> हमेशा "ज़रूरत" (Needs) और "इच्छा" (Wants) में अंतर समझें। तुरंत खरीदने के आवेग (Instant Gratification) से बचें और हर महीने अपनी आमदनी में से कुछ हिस्सा बचत व कौशल सीखने में निवेश करें।
                        </p>
                    </div>
                </div>

                <!-- Slide 26 Quote Card -->
                <div class="p-6 rounded-2xl bg-gradient-to-r from-amber-500/10 via-slate-900 to-amber-500/10 border border-amber-500/30 text-center">
                    <div class="text-amber-400 text-base font-bold mb-1">
                        "शिक्षा के साथ, भविष्य आपके हाथ में है।"
                    </div>
                    <div class="text-xs text-slate-400">
                        डिजिटल स्कूल के संसाधन और अध्ययन सामग्री के लिए हमारे प्लेटफॉर्म पर उपलब्ध रहें।
                    </div>
                </div>
            </div>

            <!-- Right Column: Contact Inquiry Form (Stores in MySQL/MariaDB) -->
            <div class="lg:col-span-5">
                <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800 shadow-2xl">
                    <h3 class="text-xl font-bold text-white mb-2 font-['Poppins']">
                        अपना प्रश्न या संदेश भेजें
                    </h3>
                    <p class="text-slate-400 text-xs sm:text-sm mb-6">
                        हमारी मेंटरशिप टीम आपके प्रश्न का 24 घंटे के भीतर उत्तर देगी।
                    </p>

                    <?php if (!empty($errors)): ?>
                        <div class="mb-5 p-3.5 rounded-xl bg-rose-950/80 border border-rose-500/40 text-rose-200 text-xs space-y-1">
                            <?php foreach ($errors as $err): ?>
                                <div>• <?= e($err) ?></div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= BASE_URL ?>/contact.php" method="POST" class="space-y-4">
                        <?= csrf_field() ?>

                        <div>
                            <label for="name" class="block text-xs font-semibold uppercase text-slate-300 mb-1">आपका नाम *</label>
                            <input type="text" id="name" name="name" value="<?= e($name) ?>" required
                                placeholder="उदा. अमित वर्मा"
                                class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-semibold uppercase text-slate-300 mb-1">ईमेल पता *</label>
                            <input type="email" id="email" name="email" value="<?= e($email) ?>" required
                                placeholder="name@example.com"
                                class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                        </div>

                        <div>
                            <label for="phone" class="block text-xs font-semibold uppercase text-slate-300 mb-1">मोबाइल नंबर</label>
                            <input type="tel" id="phone" name="phone" value="<?= e($phone) ?>"
                                placeholder="98765 43210"
                                class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                        </div>

                        <div>
                            <label for="subject" class="block text-xs font-semibold uppercase text-slate-300 mb-1">विषय</label>
                            <select id="subject" name="subject" class="w-full px-4 py-2.5 rounded-xl form-input text-sm">
                                <option value="करियर मार्गदर्शन">करियर मार्गदर्शन (Career Guidance)</option>
                                <option value="AI कोर्स व बंडल पूछताछ">AI कोर्स व बंडल पूछताछ (₹999 Offer)</option>
                                <option value="डिजिटल स्कूल मेंटरशिप">डिजिटल स्कूल मेंटरशिप (Mentorship)</option>
                                <option value="अन्य प्रश्न">अन्य प्रश्न (General Inquiry)</option>
                            </select>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-semibold uppercase text-slate-300 mb-1">आपका प्रश्न / संदेश *</label>
                            <textarea id="message" name="message" rows="4" required
                                placeholder="अपने सवाल या उलझन का विस्तार से विवरण यहाँ लिखें..."
                                class="w-full px-4 py-2.5 rounded-xl form-input text-sm"><?= e($message) ?></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full py-3.5 rounded-xl btn-gold text-slate-950 font-bold text-sm flex items-center justify-center gap-2 shadow-lg">
                                <i class="fa-solid fa-paper-plane"></i>
                                <span>प्रश्न भेजें (Submit Question)</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
