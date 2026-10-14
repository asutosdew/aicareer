<?php
/**
 * 30-Day Personal Action Plan Tracker
 * Based on Presentation Slides: 9 & 18
 * PsychFiTech® | Digital Life, Career & Money
 */

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../config/helpers.php';
require_once __DIR__ . '/../includes/auth_check.php';

$page_title = "30-दिवसीय पर्सनल एक्शन प्लान";
$logged_user = current_user();

// Fetch current action plan
$plan = null;
try {
    $stmt = $pdo->prepare("SELECT * FROM user_action_plans WHERE user_id = ? ORDER BY id DESC LIMIT 1");
    $stmt->execute([$logged_user['id']]);
    $plan = $stmt->fetch();
} catch (Exception $e) {
    //
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf();

    $target_career = clean_input($_POST['target_career'] ?? '');
    $key_skill = clean_input($_POST['key_skill'] ?? '');
    $day_30_goal = clean_input($_POST['day_30_goal'] ?? '');
    $week1 = isset($_POST['week1_progress']) ? 1 : 0;
    $week2 = isset($_POST['week2_progress']) ? 1 : 0;
    $week3 = isset($_POST['week3_progress']) ? 1 : 0;
    $week4 = isset($_POST['week4_progress']) ? 1 : 0;
    $notes = clean_input($_POST['notes'] ?? '');

    try {
        if ($plan) {
            $update = $pdo->prepare("
                UPDATE user_action_plans 
                SET target_career = ?, key_skill_to_learn = ?, day_30_goal = ?, 
                    week1_progress = ?, week2_progress = ?, week3_progress = ?, week4_progress = ?, notes = ?
                WHERE id = ? AND user_id = ?
            ");
            $update->execute([$target_career, $key_skill, $day_30_goal, $week1, $week2, $week3, $week4, $notes, $plan['id'], $logged_user['id']]);
        } else {
            $insert = $pdo->prepare("
                INSERT INTO user_action_plans (user_id, target_career, key_skill_to_learn, day_30_goal, week1_progress, week2_progress, week3_progress, week4_progress, notes)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $insert->execute([$logged_user['id'], $target_career, $key_skill, $day_30_goal, $week1, $week2, $week3, $week4, $notes]);
        }

        set_flash('success', 'आपका 30-दिवसीय एक्शन प्लान सफलतापूर्वक अपडेट हो गया है! (Action Plan Saved)');
        redirect(BASE_URL . '/dashboard/action-plan.php');
    } catch (PDOException $e) {
        set_flash('error', 'प्लान सेव करने में त्रुटि: ' . $e->getMessage());
    }
}

// Calculate progress percentage
$completed_weeks = ($plan['week1_progress'] ?? 0) + ($plan['week2_progress'] ?? 0) + ($plan['week3_progress'] ?? 0) + ($plan['week4_progress'] ?? 0);
$progress_pct = $completed_weeks * 25;

require_once __DIR__ . '/../includes/member_header.php';
?>

<div class="py-8 sm:py-10">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header Banner -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800 bg-gradient-to-r from-slate-900 via-[#0d1627] to-slate-900">
            <span class="text-xs text-amber-400 font-bold uppercase tracking-widest block mb-1">
                <i class="fa-solid fa-flag-checkered mr-1"></i> Slide 9 &amp; 18 Framework
            </span>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white font-['Poppins']">
                आपका PERSONAL ACTION PLAN: <br class="sm:hidden">
                <span class="gradient-text-gold">अगले 30 दिन में मैं क्या करूँगा?</span>
            </h1>
            <p class="text-slate-300 text-xs sm:text-sm mt-2 leading-relaxed">
                प्रेजेंटेशन का अंतिम और सबसे महत्वपूर्ण हिस्सा है कि आप अपने लिए स्पष्ट लक्ष्य तय करें। केवल सोचने से नहीं, हर सप्ताह छोटे कदम उठाने से सफलता मिलती है।
            </p>

            <!-- Progress Bar -->
            <div class="mt-6 pt-4 border-t border-slate-800">
                <div class="flex items-center justify-between text-xs font-bold mb-2">
                    <span class="text-slate-300">30-दिन की कुल प्रगति (Total Completion):</span>
                    <span class="text-amber-400"><?= $progress_pct ?>%</span>
                </div>
                <div class="w-full bg-slate-950 rounded-full h-3 p-0.5 border border-slate-800">
                    <div class="bg-gradient-to-r from-amber-500 to-amber-400 h-2 rounded-full transition-all duration-500" style="width: <?= $progress_pct ?>%"></div>
                </div>
            </div>
        </div>

        <!-- Action Plan Form -->
        <div class="glass-card-static rounded-3xl p-6 sm:p-8 border border-slate-800">
            <form action="<?= BASE_URL ?>/dashboard/action-plan.php" method="POST" class="space-y-6">
                <?= csrf_field() ?>

                <div class="border-b border-slate-800 pb-4">
                    <h2 class="text-lg font-bold text-white font-['Poppins']">
                        3 मुख्य प्रश्नों के उत्तर (Slide 9 - Activity 1)
                    </h2>
                    <p class="text-slate-400 text-xs mt-0.5">
                        हर विद्यार्थी इन 3 प्रश्नों के स्पष्ट और ईमानदार उत्तर लिखे:
                    </p>
                </div>

                <!-- Q1 -->
                <div>
                    <label for="target_career" class="block text-xs font-semibold uppercase text-slate-300 mb-1.5">
                        1. मेरी रुचि किस क्षेत्र / करियर में है?
                    </label>
                    <input type="text" id="target_career" name="target_career" 
                        value="<?= e($plan['target_career'] ?? $logged_user['career_interest']) ?>" required
                        placeholder="उदा. AI & Data Analytics, Financial Planning, Web Development, Digital Business"
                        class="w-full px-4 py-3 rounded-xl form-input text-sm">
                </div>

                <!-- Q2 -->
                <div>
                    <label for="key_skill" class="block text-xs font-semibold uppercase text-slate-300 mb-1.5">
                        2. कौन-सी एक प्रमुख स्किल मुझे सीखनी है?
                    </label>
                    <input type="text" id="key_skill" name="key_skill" 
                        value="<?= e($plan['key_skill_to_learn'] ?? '') ?>" required
                        placeholder="उदा. ChatGPT प्रॉम्प्टिंग, कैनवा AI डिजाइन, बेसिक पायथन, पर्सनल बजटिंग"
                        class="w-full px-4 py-3 rounded-xl form-input text-sm">
                </div>

                <!-- Q3 -->
                <div>
                    <label for="day_30_goal" class="block text-xs font-semibold uppercase text-slate-300 mb-1.5">
                        3. अगले 30 दिन में मैं कौन-सा ठोस छोटा कदम उठाऊँगा?
                    </label>
                    <textarea id="day_30_goal" name="day_30_goal" rows="3" required
                        placeholder="उदा. रोज़ 30 मिनट बिना किसी डिस्ट्रेक्शन के AI टूल पर अभ्यास करूँगा और 1 प्रैक्टिकल प्रोजेक्ट बनाऊँगा..."
                        class="w-full px-4 py-2.5 rounded-xl form-input text-sm"><?= e($plan['day_30_goal'] ?? '') ?></textarea>
                </div>

                <!-- Weekly Tracker (Slide 18) -->
                <div class="pt-4 border-t border-slate-800 space-y-4">
                    <div>
                        <h2 class="text-lg font-bold text-white font-['Poppins']">
                            साप्ताहिक प्रगति चेकलिस्ट (Slide 18)
                        </h2>
                        <p class="text-slate-400 text-xs mt-0.5">
                            जैसे-जैसे सप्ताह बीतें, इन बॉक्सों पर टिक करें:
                        </p>
                    </div>

                    <div class="space-y-3">
                        <label class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-900 border border-slate-800 cursor-pointer hover:border-slate-700 transition">
                            <input type="checkbox" name="week1_progress" value="1" <?= !empty($plan['week1_progress']) ? 'checked' : '' ?>
                                class="mt-1 rounded border-slate-700 bg-slate-950 text-amber-500 focus:ring-amber-400">
                            <div>
                                <strong class="text-white text-sm block">सप्ताह 1: एक करियर विकल्प पर रिसर्च करूँगा</strong>
                                <span class="text-xs text-slate-400">7-Point करियर रिसर्च चेकलिस्ट के अनुसार जानकारी सत्यापित की।</span>
                            </div>
                        </label>

                        <label class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-900 border border-slate-800 cursor-pointer hover:border-slate-700 transition">
                            <input type="checkbox" name="week2_progress" value="1" <?= !empty($plan['week2_progress']) ? 'checked' : '' ?>
                                class="mt-1 rounded border-slate-700 bg-slate-950 text-amber-500 focus:ring-amber-400">
                            <div>
                                <strong class="text-white text-sm block">सप्ताह 2: एक उपयोगी स्किल की शुरुआत करूँगा</strong>
                                <span class="text-xs text-slate-400">रोज 30 मिनट का डिजिटल चैलेंज शुरू कर बेसिक्स सीखे।</span>
                            </div>
                        </label>

                        <label class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-900 border border-slate-800 cursor-pointer hover:border-slate-700 transition">
                            <input type="checkbox" name="week3_progress" value="1" <?= !empty($plan['week3_progress']) ? 'checked' : '' ?>
                                class="mt-1 rounded border-slate-700 bg-slate-950 text-amber-500 focus:ring-amber-400">
                            <div>
                                <strong class="text-white text-sm block">सप्ताह 3: डिजिटल आदतों की समीक्षा और तथ्य सत्यापन</strong>
                                <span class="text-xs text-slate-400">स्क्रीन टाइम कम किया, फालतू नोटिफिकेशन्स बंद किए और ऑनलाइन कमाई के फर्जी दावों से बचे।</span>
                            </div>
                        </label>

                        <label class="flex items-start gap-3.5 p-3.5 rounded-xl bg-slate-900 border border-slate-800 cursor-pointer hover:border-slate-700 transition">
                            <input type="checkbox" name="week4_progress" value="1" <?= !empty($plan['week4_progress']) ? 'checked' : '' ?>
                                class="mt-1 rounded border-slate-700 bg-slate-950 text-amber-500 focus:ring-amber-400">
                            <div>
                                <strong class="text-white text-sm block">सप्ताह 4: खर्च व बचत के निर्णय पर विचार और प्रगति समीक्षा</strong>
                                <span class="text-xs text-slate-400">ज़रूरत और इच्छा का अंतर समझा और अपने पूरे महीने के एक्शन प्लान की समीक्षा की।</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Notes -->
                <div class="pt-4 border-t border-slate-800">
                    <label for="notes" class="block text-xs font-semibold uppercase text-slate-300 mb-1.5">
                        व्यक्तिगत नोट्स / मेंटर फीडबैक
                    </label>
                    <textarea id="notes" name="notes" rows="3"
                        placeholder="अपनी पढ़ाई या करियर संबंधी कोई अन्य विचार या सवाल यहाँ दर्ज करें..."
                        class="w-full px-4 py-2.5 rounded-xl form-input text-sm"><?= e($plan['notes'] ?? '') ?></textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="w-full py-3.5 rounded-xl btn-gold text-slate-950 font-bold text-sm sm:text-base flex items-center justify-center gap-2 shadow-lg">
                        <i class="fa-solid fa-floppy-disk"></i>
                        <span>एक्शन प्लान सेव करें (Save to Database)</span>
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
