--
-- テーブルの構造 `form_mail_elements`
--

CREATE TABLE `form_mail_elements` (
  `id` int(11) NOT NULL auto_increment,
  `form_mail_form_id` int(11) NOT NULL,
  `label` varchar(255) collate utf8_unicode_ci NOT NULL,
  `type` varchar(255) collate utf8_unicode_ci NOT NULL,
  `options` varchar(255) collate utf8_unicode_ci NOT NULL,
  `rule` varchar(255) collate utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `form_mail_form_id` (`form_mail_form_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `form_mail_forms`
--

CREATE TABLE `form_mail_forms` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
