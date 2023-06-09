-- 2019-11-20
ALTER TABLE `products`
ADD COLUMN `presentation` VARCHAR(255) NULL DEFAULT NULL AFTER `title`;

UPDATE `categories` SET `title` = 'Conservas de Vegetales' WHERE (`id` = '3');
INSERT INTO `categories` (`id`, `title`) VALUES ('7', 'Hierbas y Especias');

ALTER TABLE `product_families`
ADD COLUMN `mobile_header_video` VARCHAR(255) NULL DEFAULT NULL AFTER `desktop_header_video`,
CHANGE COLUMN `header_video` `desktop_header_video` VARCHAR(255) NULL DEFAULT NULL ;

ALTER TABLE `product_families`
ADD COLUMN `mobile_header_image` VARCHAR(255) NULL DEFAULT NULL AFTER `desktop_header_image`,
CHANGE COLUMN `header_image` `desktop_header_image` VARCHAR(255) NULL DEFAULT NULL ;

-- 2019-11-21
ALTER TABLE `recipes`
ADD COLUMN `meta_title` VARCHAR(255) NULL DEFAULT NULL AFTER `position`,
ADD COLUMN `meta_description` TEXT NULL DEFAULT NULL AFTER `meta_title`,
ADD COLUMN `meta_keywords` TEXT NULL DEFAULT NULL AFTER `meta_description`;

ALTER TABLE `product_families`
ADD COLUMN `meta_title` VARCHAR(255) NULL DEFAULT NULL AFTER `position`,
ADD COLUMN `meta_description` TEXT NULL DEFAULT NULL AFTER `meta_title`,
ADD COLUMN `meta_keywords` TEXT NULL DEFAULT NULL AFTER `meta_description`;

-- 2019-11-22
CREATE TABLE `product_subfamily_benefit` (
  `product_subfamily_id` int(11) NOT NULL,
  `benefit_id` int(11) NOT NULL,
  PRIMARY KEY (`product_subfamily_id`,`benefit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `product_subfamilies`
ADD COLUMN `meta_title` VARCHAR(255) NULL DEFAULT NULL AFTER `header_image`,
ADD COLUMN `meta_description` TEXT NULL DEFAULT NULL AFTER `meta_title`,
ADD COLUMN `meta_keywords` TEXT NULL DEFAULT NULL AFTER `meta_description`;

ALTER TABLE `product_subfamilies`
ADD COLUMN `mobile_header_image` VARCHAR(255) NULL DEFAULT NULL AFTER `desktop_header_image`,
CHANGE COLUMN `header_image` `desktop_header_image` VARCHAR(255) NULL DEFAULT NULL ;

ALTER TABLE `product_subfamilies`
ADD COLUMN `desktop_header_video` VARCHAR(255) NULL DEFAULT NULL AFTER `mobile_header_image`,
ADD COLUMN `mobile_header_video` VARCHAR(255) NULL DEFAULT NULL AFTER `desktop_header_video`;


