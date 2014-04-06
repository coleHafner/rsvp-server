ALTER TABLE `guest` ADD COLUMN `shuttle_count` int(10) AFTER `activation_code`;
ALTER TABLE `wedding` ADD COLUMN `shuttle_enabled` tinyint(1) DEFAULT 0 AFTER `name`;