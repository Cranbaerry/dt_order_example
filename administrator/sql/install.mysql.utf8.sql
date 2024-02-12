CREATE TABLE IF NOT EXISTS `#__dt_whatsapp_integration_phone_numbers` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`state` TINYINT(1)  NOT NULL  DEFAULT 1,
`ordering` INT(11)  NOT NULL  DEFAULT 0,
`checked_out` INT(11)  NOT NULL  DEFAULT 0,
`checked_out_time` DATETIME NOT NULL  DEFAULT "0000-00-00 00:00:00",
`created_by` INT(11)  NOT NULL  DEFAULT 0,
`modified_by` INT(11)  NOT NULL  DEFAULT 0,
`user_id` INT(11)  NOT NULL ,
`phone_number` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
,KEY `idx_modified_by` (`modified_by`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `#__dt_whatsapp_integration_blast_messages` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`state` TINYINT(1)  NOT NULL  DEFAULT 1,
`ordering` INT(11)  NOT NULL  DEFAULT 0,
`checked_out` INT(11)  NOT NULL  DEFAULT 0,
`checked_out_time` DATETIME NOT NULL  DEFAULT "0000-00-00 00:00:00",
`created_by` INT(11)  NOT NULL  DEFAULT 0,
`modified_by` INT(11)  NOT NULL  DEFAULT 0,
`message` TEXT NOT NULL ,
`title` VARCHAR(255)  NOT NULL ,
PRIMARY KEY (`id`)
,KEY `idx_state` (`state`)
,KEY `idx_checked_out` (`checked_out`)
,KEY `idx_created_by` (`created_by`)
,KEY `idx_modified_by` (`modified_by`)
) DEFAULT COLLATE=utf8mb4_unicode_ci;

