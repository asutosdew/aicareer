# PsychFiTech® | डिजिटल स्कूल & करियर (AI, Finance & Career Platform)

यह बहुपृष्ठीय (Multipage) आधुनिक वेब ऐप्लिकेशन **"DIGITAL LIFE, CAREER & MONEY"** प्रस्तुति (प्रस्तुतकर्ता: **सुनील कोसारिया**, लेखक: *THE GREAT ECONOMIC DIVIDE*) के आधार पर तैयार किया गया है।

इसमें विद्यार्थियों और युवाओं के लिए AI, करियर मार्गदर्शन (5-Point Formula), वित्तीय शिक्षा (Money Psychology, Fraud Protection) और डिजिटल स्कूल ई-लर्निंग के सभी 26 स्लाइड्स की संपूर्ण सामग्री, इंटरैक्टिव एक्टिविटीज़, **MySQL/MariaDB रजिस्ट्रेशन सिस्टम**, **सुरक्षित लॉगिन**, और **सदस्य पैनल (Dashboard)** शामिल है।

---

## 📁 प्रोजेक्ट संरचना (Directory Structure)

```
aicareer/
├── config/
│   ├── config.php               # साइट कॉन्फ़िगरेशन व सेशन सेटिंग्स
│   ├── db.php                   # cPanel MySQL / MariaDB PDO कनेक्शन (ऑटो-फ़ॉलबैक सपोर्ट)
│   └── helpers.php              # XSS सैनिटाइजेशन, CSRF सुरक्षा, ऑथेंटिकेशन गार्ड्स
├── includes/
│   ├── header.php               # मुख्य वेबसाइट का रेस्पॉन्सिव हेडर व नेविगेशन
│   ├── footer.php               # फुटर, प्रेजेंटेशन क्रेडिट्स और लिंक्स
│   ├── auth_check.php           # प्रोटेक्टेड डैशबोर्ड के लिए ऑथ गार्ड
│   └── member_header.php        # सदस्य पोर्टल का डेडिकेटेड हेडर
├── assets/
│   ├── css/style.css            # आधुनिक डार्क थीम और देवनागरी टाइपोग्राफी
│   ├── js/main.js               # इंटरैक्टिव कैलकुलेटर, एक्टिविटी 3 सिम्युलेटर, मेन्यू
│   └── images/                  # प्रस्तुति से ऑप्टिमाइज़ किए गए इमेजेस (WebP & JPG)
│
├── database.sql                 # cPanel phpMyAdmin के लिए पूर्ण MySQL स्कीमा + सीड डेटा
├── .htaccess                    # cPanel Apache/LiteSpeed सुरक्षा, GZIP और कैशिंग
│
├── index.php                    # होम पेज (प्रेजेंटेशन ओवरव्यू, सुनील कोसारिया कीनोट, पिलर्स, ₹999 ऑफर)
├── about.php                    # सत्र व लेखक परिचय (सुनील कोसारिया, The Great Economic Divide)
├── career-guide.php             # करियर गाइडेंस (4 कदम, 5-Point फॉर्मूला, 7-स्टेप रिसर्च चेकलिस्ट)
├── financial-literacy.php       # वित्तीय शिक्षा (मनी साइकोलॉजी, 6 डिजिटल सुरक्षा नियम, ऑनलाइन फ्रॉड अलर्ट)
├── ai-digital.php               # AI & डिजिटल लाइफ (चैटबॉट, ML, 6 डिजिटल आदतें, 30-मिनट चैलेंज)
├── services.php                 # सभी 6 मुख्य सर्विसेज की सूची (पैनल एक्सेस कॉलआउट)
├── contact.php                  # सवाल-जवाब (Slide 19 के 5 मुख्य प्रश्न) व संपर्क फॉर्म (MySQL में स्टोर)
├── register.php                 # छात्र रजिस्ट्रेशन फॉर्म (MySQL/MariaDB में डेटा स्टोर)
├── login.php                    # सदस्य लॉगिन फॉर्म (Bcrypt पासवर्ड प्रमाणीकरण)
├── logout.php                   # सुरक्षित सत्र समापन
│
└── dashboard/                   # लॉगिन के बाद का सदस्य पैनल (Member Portal)
    ├── index.php                # डैशबोर्ड ओवरव्यू, 6 सक्रिय सर्विसेज कार्ड्स, 30-दिन एक्शन विजेट
    ├── services.php             # सभी सर्विसेज हब
    ├── service-detail.php       # किसी भी सर्विस का विस्तृत मॉड्यूल, वीडियो व नोट्स व्यू
    ├── action-plan.php          # 30-दिवसीय पर्सनल एक्शन प्लान ट्रैकर (Slide 9 व 18, MySQL में सेव)
    ├── ai-tools.php             # व्यावहारिक AI प्रॉम्प्ट्स लैब (ChatGPT, Gemini, Canva AI)
    └── profile.php              # प्रोफाइल व पासवर्ड बदलने की सेटिंग्स
```

---

## 🚀 cPanel पर पब्लिश करने की आसान विधि (Step-by-Step cPanel Deployment Guide)

### चरण 1: फाइलें cPanel में अपलोड करें
1. अपने cPanel में लॉगिन करें और **File Manager** खोलें।
2. जिस डोमेन या सबडोमेन पर साइट चलानी है, उस डायरेक्टरी (जैसे `public_html` या `public_html/aicareer`) में जाएं।
3. इस पूरे प्रोजेक्ट के सभी फाइलों व फोल्डर्स को वहाँ अपलोड और एक्सट्रैक्ट करें।

### चरण 2: MySQL डेटाबेस और यूजर बनाएं
1. cPanel में **MySQL Database Wizard** या **MySQL Databases** पर जाएं।
2. एक नया डेटाबेस बनाएं (उदा. `cpaneluser_aicareer`)।
3. एक नया डेटाबेस यूजर बनाएं और मजबूत पासवर्ड सेट करें।
4. यूजर को डेटाबेस में जोड़ें और **ALL PRIVILEGES** पर टिक करके Save करें।

### चरण 3: phpMyAdmin में डेटाबेस इंपोर्ट करें
1. cPanel में **phpMyAdmin** खोलें।
2. बाईं तरफ से अभी-अभी बनाए गए डेटाबेस पर क्लिक करें।
3. ऊपर दिए गए **Import** टैब पर क्लिक करें।
4. इस प्रोजेक्ट में मौजूद `database.sql` फाइल को चुनें और नीचे **Go / Import** बटन दबाएं।
5. सभी टेबल्स (`users`, `user_action_plans`, `services`, `contact_inquiries`, `activity_responses`) सफलतापूर्वक बन जाएंगी और प्रारंभिक डेटा भर जाएगा।

### चरण 4: `config/db.php` में क्रेडेंशियल्स अपडेट करें
cPanel File Manager में जाकर `config/db.php` फाइल को Edit करें और अपने डेटाबेस का नाम, यूजर और पासवर्ड डालें:

```php
define('DB_HOST', 'localhost');            // cPanel पर प्रायः 'localhost' ही रहता है
define('DB_NAME', 'आपका_cpanel_db_name');    // जैसे cpaneluser_aicareer
define('DB_USER', 'आपका_cpanel_db_user');    // जैसे cpaneluser_dbuser
define('DB_PASS', 'आपका_मजबूत_पासवर्ड');      // cPanel में यूजर बनाते समय रखा गया पासवर्ड
define('DB_CHARSET', 'utf8mb4');
```

### चरण 5: `config/config.php` में WhatsApp कम्युनिटी लिंक सेट करें
जब भी कोई नया छात्र रजिस्टर करेगा, तो उसे सीधे आपके आधिकारिक व्हाट्सऐप कम्युनिटी/ग्रुप से जुड़ने का पॉपअप व डैशबोर्ड में स्थायी कार्ड दिखेगा:

```php
define('WHATSAPP_COMMUNITY_URL', 'https://chat.whatsapp.com/invite/YOUR_GROUP_CODE');
define('WHATSAPP_COMMUNITY_NAME', 'PsychFiTech® AI & Career Official Community');
```

### चरण 6: डेटाबेस कनेक्शन चेक करें
ब्राउज़र में `https://yourdomain.com/db_check.php` खोलकर जांचें कि MySQL डेटाबेस सही तरीके से कनेक्ट हो गया है। टेस्टिंग पूर्ण होने के बाद सुरक्षा हेतु इस फाइल को हटा दें या इसका नाम बदल दें।

---

## 📱 व्हाट्सऐप कम्युनिटी इंटीग्रेशन (WhatsApp Community Flow)

1. **अनिवार्य व्हाट्सऐप नंबर:** `register.php` पर छात्र का नाम, ईमेल, पासवर्ड के साथ 10-अंकीय व्हाट्सऐप मोबाइल नंबर अनिवार्य किया गया है।
2. **कम्युनिटी इनविटेशन:** रजिस्ट्रेशन पूर्ण होते ही छात्र का डेटा MySQL में सेव होता है और तुरंत एक सुंदर वेलकम मोडल खुलता है जिसमें WhatsApp कम्युनिटी जॉइन करने का डायरेक्ट बटन होता है।
3. **स्थायी डैशबोर्ड कार्ड:** लॉगिन के बाद सदस्य पैनल (`dashboard/index.php`) में भी हमेशा व्हाट्सऐप कम्युनिटी कार्ड उपलब्ध रहता है जिससे छात्र कभी भी ग्रुप से जुड़ सकते हैं।

---

## 💡 सर्विसेज के विस्तृत विवरण को कस्टमाइज़ करना (Future Expansion)

यूजर द्वारा सर्विसेज का अतिरिक्त विवरण साझा करने पर:
1. `dashboard/service-detail.php` में संबंधित सर्विस स्लग (`ai-course`, `business-partner`, `economic-divide-book`, `financial-literacy`, `career-guidance`, `digital-school`) के लिए वीडियो लिंक्स, यूट्यूब एम्बेड, ज़ूम लिंक्स या डाउनलोड पीडीएफ आसानी से जोड़े जा सकते हैं।
2. डेटाबेस में `services` टेबल में नए कोर्सेज और लिंक्स phpMyAdmin से भी सीधे जोड़े जा सकते हैं।

---

**PsychFiTech® — Building a Smarter India**  
*शिक्षा के साथ, भविष्य आपके हाथ में है।*
