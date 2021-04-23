-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 05:37 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin@site.com',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `image`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin@site.com', '$2y$10$RvVazd9f6Hs8hcy7g0ChPecL5SrdcSZabkfn.moLIX1SGbLJR17b.', NULL, '2020-04-16 18:00:00', '2020-04-22 18:00:00', '2020-04-23 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subj` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcodes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_status` tinyint(4) NOT NULL DEFAULT 1,
  `sms_status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `act`, `name`, `subj`, `email_body`, `shortcodes`, `email_status`, `sms_status`, `created_at`, `updated_at`) VALUES
(1, 'PASS_RESET_CODE', 'Password Reset', 'Password Reset', '<div>We have received a request to reset the password for your account on <b>{{time}} .<br></b></div><div>Requested From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div><div><br></div><br><div><div><div>Your account recovery code is:&nbsp;&nbsp; <font size=\"6\"><b>{{code}}</b></font></div><div><br></div></div></div><div><br></div><div><font size=\"4\" color=\"#CC0000\">If you do not wish to reset your password, please disregard this message. </font><br></div><br>', ' {\"code\":\"Password Reset Code\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-09 06:13:00'),
(2, 'PASS_RESET_DONE', 'Password Reset Confirmation', 'You have Reset your password', '<div><p>\r\n    You have successfully reset your password.</p><p>You changed from&nbsp; IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}}&nbsp;</b> on <b>{{time}}</b></p><p><b><br></b></p><p><font color=\"#FF0000\"><b>If you did not changed that, Please contact with us as soon as possible.</b></font><br></p></div>', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-09 06:13:00'),
(3, 'EVER_CODE', 'Email Verification', 'Please verify your email address', '<div><br></div><div>Thanks For join with us. <br></div><div>Please use below code to verify your email address. <br></div><div><br></div><div>Your email verification code is:<font size=\"6\"><b> {{code}}</b></font></div>', '{\"code\":\"Verification code\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-09 06:11:23'),
(4, 'SVER_CODE', 'SMS Verification ', 'Please verify your phone', 'Your phone verification code is: {{code}}', '{\"code\":\"Verification code\"}', 0, 1, '2019-09-24 23:04:05', '2020-03-08 01:28:52'),
(5, '2FA_ENABLE', 'Google Two Factor - Enable', 'Google Two Factor Authentication is now  Enabled for Your Account', '<div>You just enabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Enabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-09 06:11:23'),
(6, '2FA_DISABLE', 'Google Two Factor Disable', 'Google Two Factor Authentication is now  Disabled for Your Account', '<div>You just Disabled Google Two Factor Authentication for Your Account.</div><div><br></div><div>Disabled at <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.</div>', '{\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Request Time\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-09 06:11:23'),
(14, 'BAL_ADD', 'Balance Add by Admin', 'Your Account has been Credited', '<div>{{amount}} {{currency}} has been added to your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2019-09-24 23:04:05', '2020-03-09 06:13:00'),
(15, 'BAL_SUB', 'Balance Subtracted by Admin', 'Your Account has been Debited', '<div>{{amount}} {{currency}} has been subtracted from your account .</div><div><br></div><div>Transaction Number : {{trx}}</div><div><br></div>Your Current Balance is : <font size=\"3\"><b>{{post_balance}}&nbsp; {{currency}}</b></font>', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By Admin\",\"currency\":\"Site Currency\", \"post_balance\":\"Users Balance After this operation\"}', 1, 1, '2020-03-08 18:00:00', '2020-03-09 06:13:00'),
(16, 'ADMIN_SUPPORT_REPLY', 'Support Ticket Reply ', 'Support Ticket Replied', '<div><p><span style=\"font-size: 11pt;\" data-mce-style=\"font-size: 11pt;\"><strong>A member from our support team has replied to the following ticket:</strong></span></p><p><a href=\"{{ticket_url}}\" title=\"\" target=\"_blank\"><b>[Ticket#{{ticket_id}}] {{ticket_subject}}</b></a></p><p><b><br></b></p><p><b>you can view the ticket using below URL :</b></p><p> {{ticket_url}}</p><p>----------------------------------------------</p><p><b>Here is the reply : </b><br></p><p> {{reply}}<br></p></div><div><br></div>', '{\"ticket_id\":\"Support Ticket ID\", \"ticket_subject\":\"Subject Of Support Ticket\", \"ticket_url\":\"URL for View the Support Ticket\", \"reply\":\"Reply from Staff/Admin\"}', 1, 1, NULL, '2020-03-09 08:18:53'),
(17, 'WELCOME_MESSAGE', 'Welcome Message on Register', 'Welcome To Our Site', '<div>welcome to our site.<br></div><div>You have registered successfully to our portal.<br></div><div><font size=\"4\"><b><br></b></font></div><div><font size=\"4\"><b>Your details: </b></font><br></div><div><br></div><div><b>Username : </b>{{username}}</div><div><b>Full Name:</b> {{name}}</div><div><b>Email:</b> {{email}}</div><div><b>Password:</b> [**********]</div><div><br></div><div><br></div><div><br></div>You Registered&nbsp; on <b>{{time}}&nbsp;</b> From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.<div><br><br></div>', ' {\"username\":\"username of user\",\"name\":\"Name of User\",\"email\":\"Email address of user\",\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Registration Time\"}', 1, 1, NULL, '2020-03-09 06:43:17'),
(18, 'LOGIN_ALERT', 'User Login Alert', 'Login Notification', 'You successfully logged in to the system on <b>{{time}} </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>.&nbsp; <br><div><br></div><div><font color=\"#FF0000\"><b>If you did not login,\r\n please contact with us immediately.</b></font></div>', ' {\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Login Time\"}', 1, 1, NULL, '2020-03-09 06:50:12'),
(19, 'LOGIN_ALERT_ADMIN', 'ADMIN Login Alert', 'ADMIN PANEL LOGIN ALERT', '<div><font size=\"5\">You successfully logged in to the system <b>ADMIN PANEL</b> on&nbsp; <b>{{time}}</b></font></div><div><font size=\"5\"><b><br></b></font></div><div><font size=\"5\"><b> </b>From IP: <b>{{ip}}</b> using <b>{{browser}}</b> on <b>{{operating_system}} </b>. <br></font></div>', ' {\"ip\":\"IP of User\",\"browser\":\"Browser of User\",\"operating_system\":\"Operating System of User\",\"time\":\"Login Time\"}', 1, 1, NULL, '2020-03-09 06:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `sitename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Demo',
  `sitetitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cur_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `cur_sym` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$',
  `efrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin@site.com',
  `etemp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `smsapi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ev` tinyint(1) NOT NULL DEFAULT 0,
  `en` tinyint(1) NOT NULL DEFAULT 0,
  `sv` tinyint(1) NOT NULL DEFAULT 0,
  `sn` tinyint(1) NOT NULL DEFAULT 0,
  `social_login` tinyint(1) NOT NULL DEFAULT 0,
  `reg` tinyint(1) NOT NULL DEFAULT 1,
  `alert` int(11) NOT NULL DEFAULT 1,
  `map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'one',
  `bclr` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000036',
  `sclr` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '000036',
  `sys_version` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_meta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `sitetitle`, `cur_text`, `cur_sym`, `efrom`, `etemp`, `mail_config`, `smsapi`, `ev`, `en`, `sv`, `sn`, `social_login`, `reg`, `alert`, `map`, `theme`, `bclr`, `sclr`, `sys_version`, `seo_keywords`, `seo_meta`, `social_title`, `social_desc`, `created_at`, `updated_at`) VALUES
(1, 'Demo Site1', 'Hello1', 'USD', '$', 'admin@site.com', '<br style=\"font-family: Lato, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif;\"><br style=\"font-family: Lato, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif;\"><div class=\"contents\" style=\"font-family: Lato, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif; max-width: 600px; margin: 0px auto; border: 2px solid rgb(0, 0, 54);\"><div class=\"header\" style=\"background-color: rgb(0, 0, 54); padding: 15px; text-align: center;\"><div class=\"logo\" style=\"width: 260px; margin: 0px auto;\"><img src=\"https://i.imgur.com/4NN55uD.png\" alt=\"THESOFTKING\" style=\"width: 260px;\">&nbsp;</div></div><div class=\"mailtext\" style=\"padding: 30px 15px; background-color: rgb(240, 248, 255); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 16px; line-height: 26px;\">Hi {{name}},&nbsp;<br><br>{{message}}&nbsp;<br><br><br></div><div class=\"footer\" style=\"background-color: rgb(0, 0, 54); padding: 15px; text-align: center;\"><a href=\"https://thesoftking.com/\" style=\"color: rgb(255, 255, 255); background-color: rgb(46, 204, 113); padding: 10px 0px; margin: 10px; display: inline-block; width: 100px; text-transform: uppercase; font-weight: 600; border-radius: 4px;\">WEBSITE</a>&nbsp;<a href=\"https://thesoftking.com/products\" style=\"color: rgb(255, 255, 255); background-color: rgb(46, 204, 113); padding: 10px 0px; margin: 10px; display: inline-block; width: 100px; text-transform: uppercase; font-weight: 600; border-radius: 4px;\">PRODUCTS</a>&nbsp;<a href=\"https://thesoftking.com/contact\" style=\"color: rgb(255, 255, 255); background-color: rgb(46, 204, 113); padding: 10px 0px; margin: 10px; display: inline-block; width: 100px; text-transform: uppercase; font-weight: 600; border-radius: 4px;\">CONTACT</a></div><div class=\"footer\" style=\"background-color: rgb(0, 0, 54); padding: 15px; text-align: center; border-top: 1px solid rgba(255, 255, 255, 0.2);\"><span style=\"font-weight: bolder; color: rgb(255, 255, 255);\">© 2011 - 2018 THESOFTKING. All Rights Reserved.</span><p style=\"color: rgb(221, 221, 221);\">TheSoftKing  is not partnered with any other company or person. We work as a team  and do not have any reseller, distributor or partner!</p><div><br></div></div></div><table class=\"layout layout--no-gutter\" style=\"border-spacing: 0px; color: rgb(52, 73, 94); table-layout: fixed; margin-left: auto; margin-right: auto; overflow-wrap: break-word; word-break: break-word;\" align=\"center\"><tbody><tr></tr></tbody></table>', '{\"name\":\"php\"}', NULL, 0, 1, 0, 0, 0, 1, 1, NULL, 'one', '000036', '000036', '2', '[{\"value\":\"Hi\"},{\"value\":\"Hello\"}]', 'Meta Description Here', '212', '121212', NULL, '2020-04-30 10:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_04_24_135326_create_admins_table', 2),
(4, '2020_04_24_140025_create_admin_password_resets_table', 2),
(5, '2020_04_24_141027_create_user_logins_table', 3),
(7, '2020_04_24_141049_create_general_settings_table', 4),
(8, '2020_04_24_163932_create_email_templates_table', 5),
(9, '2014_10_12_000000_create_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('asdasd@mail.com', '657001', '2020-04-30 12:25:37'),
('jmrashed@gmail.com', '386902', '2020-04-30 13:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(10) UNSIGNED NOT NULL,
  `act` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `script` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shortcode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'object',
  `support` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'help section',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plugins`
--

INSERT INTO `plugins` (`id`, `act`, `name`, `description`, `image`, `script`, `shortcode`, `support`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'google-analytics', 'Google Analytics', 'Key location is shown bellow', 'google-analytics.png', '<script async src=\"https://www.googletagmanager.com/gtag/js?id={{app_key}}\"></script>\n                <script>\n                  window.dataLayer = window.dataLayer || [];\n                  function gtag(){dataLayer.push(arguments);}\n                  gtag(\"js\", new Date());\n                \n                  gtag(\"config\", \"{{app_key}}\");\n                </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"Demo\"}}', 'ganalytics.png', 1, NULL, '2019-10-18 23:16:05', '2020-03-02 06:52:29'),
(2, 'tawk-chat', 'Tawk.to', 'Key location is shown bellow', 'tawky_big.png', '<script>\n                        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();\n                        (function(){\n                        var s1=document.createElement(\"script\"),s0=document.getElementsByTagName(\"script\")[0];\n                        s1.async=true;\n                        s1.src=\"https://embed.tawk.to/{{app_key}}/default\";\n                        s1.charset=\"UTF-8\";\n                        s1.setAttribute(\"crossorigin\",\"*\");\n                        s0.parentNode.insertBefore(s1,s0);\n                        })();\n                    </script>', '{\"app_key\":{\"title\":\"App Key\",\"value\":\"Demo\"}}', 'twak.png', 1, NULL, '2019-10-18 23:16:05', '2019-10-18 23:16:05'),
(3, 'google-recaptcha2', 'Google Recaptcha 2', 'Key location is shown bellow', 'recaptcha3.png', '\r\n<script src=\"https://www.google.com/recaptcha/api.js\"></script>\r\n<div class=\"g-recaptcha\" data-sitekey=\"{{sitekey}}\" data-callback=\"verifyCaptcha\"></div>\r\n<div id=\"g-recaptcha-error\"></div>', '{\"sitekey\":{\"title\":\"Site Key\",\"value\":\"6Lf98t0UAAAAADJBPA0d-uSOFsEtY1uZiDGZzw4p\"}}', 'recaptcha.png', 0, NULL, '2019-10-18 23:16:05', '2020-03-03 07:48:41'),
(4, 'custom-captcha', 'Custom Captcha', 'Just Put Any Random String', 'customcaptcha.png', NULL, '{\"random_key\":{\"title\":\"Random String\",\"value\":\"SecureString\"}}', 'na', 1, NULL, '2019-10-18 23:16:05', '2020-03-02 06:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(11,2) DEFAULT 0.00,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'contains full address',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: banned, 1: active',
  `ev` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: email unverified, 1: email verified',
  `sv` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: sms unverified, 1: sms verified',
  `ver_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores verification code',
  `ver_code_send_at` datetime DEFAULT NULL COMMENT 'verification send time',
  `ts` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: 2fa off, 1: 2fa on',
  `tv` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0: 2fa unverified, 1: 2fa verified',
  `tsc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `mobile`, `balance`, `password`, `image`, `address`, `status`, `ev`, `sv`, `ver_code`, `ver_code_send_at`, `ts`, `tv`, `tsc`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Prianka', 'Dey', 'prianka', 'asdasd@mail.com', NULL, '0.00', '$2y$10$YgU/tWaWJoLLdBsSOYlreO1JfzZ.gsBicwa3/BuzoCbYMq.L0NJca', NULL, NULL, 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-25 14:01:55', '2020-04-25 14:10:50'),
(17, '12121212', '212121212', 'pookat1', 'admi12n@demo.com', '01778777777', '0.00', '$2y$10$hYBwEE1krojQeeSPCvVIVOA3TpyYU5Iiu5iSlmiu0BX/ADIOBGoW.', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 0, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 11:37:48', '2020-04-30 11:37:48'),
(18, 'Pranta', 'Roy', 'pranta', 'jmrashed@gmail.com', '787878787', '0.00', '$2y$10$qGCxeJ70KsIKo1BJ9nafDebB80gMkVpelRLyQ8Me1OHDhj0/YEQd.', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 0, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 11:43:06', '2020-04-30 12:28:56'),
(19, 'Pranta', 'Roy', 'pranta123', 'jmrashed11@gmail.com', '02121212e454545', '0.00', '$2y$10$C0q2HmwdxpuaJjx73J3iyOPb46QtJZJ7mdzIRPKKPc7ADoPEkRlLu', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 1, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 11:44:58', '2020-04-30 12:02:02'),
(20, 'wewewew', 'ewewew', 'poookkk', 'asdasd11@mail.com', '584460052646', '0.00', '$2y$10$OkSyH.I0AkDzSislarS8/.Qq281lx.Y4/3to0APIuwChOyzI.F8Ry', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 0, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:03:47', '2020-04-30 13:03:47'),
(21, 'hello', 'deat', 'ouoooo', 'hello255121@gmail.com', '0125455', '0.00', '$2y$10$YwmbvlsxGiWHmhbvYbch2exxZWpicaFMRI0eUWRX3V.KBglSKXHIa', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:11:28', '2020-04-30 13:11:54'),
(22, 'Reuben', 'Bond', 'tulac', 'wavom@mailinator.com', '+1 (804) 304-3766', '0.00', '$2y$10$IpIlsZ7897cEgKa8.8Nm9OkEoIzQRWRXYT5nm5cFr8xcb30J5G41.', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:14:40', '2020-04-30 13:14:50'),
(23, 'Mason', 'Grimes', 'sosif', 'zatu@mailinator.com', '0177888777777', '0.00', '$2y$10$cIm2DmWYeNhg3uelYQXZ8u1v7BhuvdWLMNl0.Kw/ydinBv2P7wgIi', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:16:29', '2020-04-30 13:16:38'),
(24, 'Kane', 'Ramsey', 'ryzyjevati', 'hytoduhaz@mailinator.net', '+1 (292) 111-7288', '0.00', '$2y$10$yYZ7.paLR0/VB6sjWaqp8./AsD90Gd4MU0/sTlKmn73Lz77q7AUY2', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:17:42', '2020-04-30 13:17:53'),
(25, 'Natalie', 'Espinoza', 'topudyfo', 'madalin@mailinator.net', '+1 (259) 598-6937', '0.00', '$2y$10$HxzPvw4L/JYEWNQHiFrLc.3.cRA3E8oLsQLfmh47wIAUjdkzwR3xK', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:22:06', '2020-04-30 13:22:22'),
(26, 'Kay', 'Lowe', 'vezycyhob', 'ceqowyg@mailinator.com', '+1 (797) 311-1733', '0.00', '$2y$10$1RKETQTWnKg/Iko9NJemEuIBiqIlhafN4fnmY51qkzqajsHnKNXd.', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:22:55', '2020-04-30 13:23:02'),
(27, 'Graham', 'Riley', 'ruhuzinuq', 'pymybol@mailinator.net', '+1 (421) 665-9319', '0.00', '$2y$10$izIGxVF88PDMEptoKZDYUe9H3KHj6eHRT6cZB7e7OgPcxuWdZQJF6', NULL, '{\"address\":\"\",\"state\":\"\",\"zip\":\"\",\"country\":\"\",\"city\":\"\"}', 1, 1, 0, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, '2020-04-30 13:23:56', '2020-04-30 13:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_ip`, `location`, `browser`, `os`, `longitude`, `latitude`, `country`, `country_code`, `created_at`, `updated_at`) VALUES
(32, 5, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-25 13:51:35', '2020-04-25 13:51:35'),
(33, 6, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-25 13:53:16', '2020-04-25 13:53:16'),
(34, 9, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-25 14:01:55', '2020-04-25 14:01:55'),
(35, 9, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-25 14:12:49', '2020-04-25 14:12:49'),
(36, 9, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-25 14:14:12', '2020-04-25 14:14:12'),
(37, 9, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 11:06:50', '2020-04-30 11:06:50'),
(38, 10, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 11:07:43', '2020-04-30 11:07:43'),
(39, 11, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 11:14:03', '2020-04-30 11:14:03'),
(40, 12, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 11:15:54', '2020-04-30 11:15:54'),
(41, 13, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 11:23:10', '2020-04-30 11:23:10'),
(42, 14, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 11:27:51', '2020-04-30 11:27:51'),
(43, 19, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 11:44:59', '2020-04-30 11:44:59'),
(44, 20, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:03:48', '2020-04-30 13:03:48'),
(45, 21, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:11:29', '2020-04-30 13:11:29'),
(46, 22, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:14:40', '2020-04-30 13:14:40'),
(47, 23, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:16:30', '2020-04-30 13:16:30'),
(48, 24, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:17:42', '2020-04-30 13:17:42'),
(49, 25, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:22:07', '2020-04-30 13:22:07'),
(50, 26, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:22:55', '2020-04-30 13:22:55'),
(51, 27, '::1', ' - -  -  ', 'Firefox', 'Windows 10', '', '', '', '', '2020-04-30 13:23:57', '2020-04-30 13:23:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_sms_templates_act_unique` (`act`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plugins_act_unique` (`act`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
