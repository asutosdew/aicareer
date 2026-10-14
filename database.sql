-- =====================================================================
-- PsychFiTech® | Digital Life, Career & Money
-- MySQL / MariaDB Database Schema
-- Ready for cPanel / phpMyAdmin Import
-- =====================================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `phone` VARCHAR(30) DEFAULT NULL,
  `password_hash` VARCHAR(255) NOT NULL,
  `qualification` VARCHAR(100) DEFAULT NULL,
  `career_interest` VARCHAR(100) DEFAULT NULL,
  `role` ENUM('student', 'member', 'admin') DEFAULT 'student',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `user_action_plans`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `user_action_plans` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `target_career` VARCHAR(255) DEFAULT NULL,
  `key_skill_to_learn` VARCHAR(255) DEFAULT NULL,
  `day_30_goal` TEXT DEFAULT NULL,
  `week1_progress` TINYINT(1) DEFAULT 0,
  `week2_progress` TINYINT(1) DEFAULT 0,
  `week3_progress` TINYINT(1) DEFAULT 0,
  `week4_progress` TINYINT(1) DEFAULT 0,
  `notes` TEXT DEFAULT NULL,
  `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_action_plans_user` (`user_id`),
  CONSTRAINT `fk_action_plans_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `activity_responses`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `activity_responses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED DEFAULT NULL,
  `activity_type` VARCHAR(50) NOT NULL,
  `response_data` TEXT NOT NULL,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_activity_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `contact_inquiries`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `contact_inquiries` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `email` VARCHAR(191) NOT NULL,
  `phone` VARCHAR(30) DEFAULT NULL,
  `subject` VARCHAR(255) DEFAULT NULL,
  `message` TEXT NOT NULL,
  `status` ENUM('new', 'read', 'replied') DEFAULT 'new',
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Table structure for table `services`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `services` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `title_hi` VARCHAR(200) NOT NULL,
  `slug` VARCHAR(100) NOT NULL,
  `short_desc` TEXT NOT NULL,
  `short_desc_hi` TEXT NOT NULL,
  `icon` VARCHAR(50) NOT NULL,
  `category` VARCHAR(50) NOT NULL,
  `badge` VARCHAR(50) DEFAULT 'Included',
  `access_type` ENUM('free_member', 'premium', 'upcoming') DEFAULT 'free_member',
  `order_num` INT DEFAULT 0,
  `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_services_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Dumping seed data for table `services`
-- --------------------------------------------------------
INSERT INTO `services` (`title`, `title_hi`, `slug`, `short_desc`, `short_desc_hi`, `icon`, `category`, `badge`, `access_type`, `order_num`) VALUES
('7-Day AI Practical Course', '7-दिवसीय AI प्रैक्टिकल कोर्स', 'ai-course', 'Hands-on prompt engineering, ChatGPT, Claude, Gemini, Canva AI, and daily business automation workflows.', 'प्रैक्टिकल AI टूल्स (ChatGPT, Gemini, Canva AI) से ऑटोमेशन, कंटेंट और रियल-वर्ल्ड प्रोजेक्ट्स सीखें।', 'fa-robot', 'AI & Tech', 'Featured (₹999 Bundle)', 'free_member', 1),
('PsychFiTech AI Business Partner Program', 'AI बिजनेस ग्रोथ पार्टनर प्रोग्राम', 'business-partner', 'AI-driven client acquisition, marketing workflows, smart decision tools, and tech business scaling.', 'AI टूल्स से अपने बिजनेस, फ्रीलांसिंग और क्लाइंट डिलीवरी को 10x तेज और प्रॉफिटेबल बनाएं।', 'fa-chart-line', 'Business', 'Available in Panel', 'free_member', 2),
('The Great Economic Divide (Digital Book & Notes)', 'द ग्रेट इकोनॉमिक डिवाइड (डिजिटल बुक और नोट्स)', 'economic-divide-book', 'Authored by Sunil Kosariya. Insights on digital psychology, distraction economy, and financial realities.', 'सुनील कोसारिया द्वारा लिखित: डिजिटल भ्रम, खाली जेब का सच और आर्थिक सशक्तिकरण की पूरी गाइड।', 'fa-book-open', 'Finance', 'Included FREE', 'free_member', 3),
('Financial Literacy & Money Psychology Studio', 'वित्तीय शिक्षा और मनी साइकोलॉजी स्टूडियो', 'financial-literacy', 'Learn budgeting principles, instant gratification control, safe digital banking, and ₹999 decision formula.', 'बचत, निवेश, डिजिटल सेफ्टी, फ्रॉड से बचाव और व्यवहारिक फाइनेंस के सिद्ध नियम।', 'fa-wallet', 'Finance', 'Available in Panel', 'free_member', 4),
('4-Step Career Guidance & Research Center', '4-चरणीय करियर गाइडेंस और रिसर्च सेंटर', 'career-guidance', 'Self-discovery assessment, 5-point career formula, and 7-step career validation methodology.', 'खुद को पहचानें, विकल्प जानें, तैयारी करें और 5-Point फॉर्मूले से सही करियर का चयन करें।', 'fa-compass', 'Career', 'Available in Panel', 'free_member', 5),
('Digital School Interactive E-Learning & Quizzes', 'डिजिटल स्कूल ई-लर्निंग और लाइव वर्कशॉप', 'digital-school', 'Live doubt-solving, project-based tasks, progress tracking, and peer community access.', 'प्रोजेक्ट आधारित शिक्षा, कभी भी कहीं भी सीखने की सुविधा और व्यक्तिगत मेंटरशिप फीडबैक।', 'fa-graduation-cap', 'Digital School', 'Available in Panel', 'free_member', 6);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
