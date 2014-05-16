ALTER TABLE `guest`
ADD COLUMN `dinner_count` int(10) UNSIGNED AFTER `actual_count`,
ADD COLUMN `rsvp_dinner_enabled` tinyint(1) UNSIGNED AFTER `dinner_count`,
CHANGE COLUMN `rsvp_through_site` `rsvp_through_site` tinyint(1) UNSIGNED DEFAULT NULL AFTER `rsvp_dinner_enabled`;

ALTER TABLE `wedding` ADD COLUMN `rsvp_dinner_enabled` tinyint(1) DEFAULT 0 AFTER `shuttle_enabled`