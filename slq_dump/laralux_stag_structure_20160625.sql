-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2016 at 07:16 AM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laralux_stag`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `business_details` text CHARACTER SET utf8,
  `reference_1` text CHARACTER SET utf8,
  `reference_2` text CHARACTER SET utf8,
  `country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT 'mongodb',
  `source_id` varchar(24) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `mainImageUrl` varchar(2083) DEFAULT NULL,
  `desktopMenu` tinyint(1) DEFAULT NULL,
  `mobileMenu` tinyint(1) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `displayOrder` int(11) DEFAULT NULL,
  `translations` text,
  `fontImage` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `ParentId` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `source_id` (`source_id`),
  UNIQUE KEY `categories_source_id_unique` (`source_id`),
  KEY `ParentId` (`ParentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=174 ;

-- --------------------------------------------------------

--
-- Table structure for table `categoryOrganisations`
--

CREATE TABLE IF NOT EXISTS `categoryOrganisations` (
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `categoryId` int(11) NOT NULL,
  `SubCategoryId` int(11) NOT NULL,
  PRIMARY KEY (`categoryId`,`SubCategoryId`),
  KEY `SubCategoryId` (`SubCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE IF NOT EXISTS `conversations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) DEFAULT NULL,
  `body` text,
  `deleted` tinyint(1) DEFAULT NULL,
  `readAt` datetime DEFAULT NULL,
  `sentAt` datetime NOT NULL,
  `listingId` int(11) DEFAULT NULL,
  `fromUserId` int(11) DEFAULT NULL,
  `toUserId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listingId` (`listingId`),
  KEY `fromUserId` (`fromUserId`),
  KEY `toUserId` (`toUserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT 'mongodb',
  `source_id` varchar(24) DEFAULT NULL,
  `code2` varchar(2) DEFAULT NULL,
  `code3` varchar(3) DEFAULT NULL,
  `flagIconName` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `defaultCurrencyId` int(11) DEFAULT NULL,
  `defaultLanguageId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `source_id` (`source_id`),
  UNIQUE KEY `countries_source_id_unique` (`source_id`),
  KEY `defaultCurrencyId` (`defaultCurrencyId`),
  KEY `defaultLanguageId` (`defaultLanguageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=241 ;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT 'mongodb',
  `source_id` varchar(24) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `displayCode` varchar(255) DEFAULT NULL,
  `symbol` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  UNIQUE KEY `currencies_code_unique` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `extrainfos`
--

CREATE TABLE IF NOT EXISTS `extrainfos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hidden` tinyint(1) DEFAULT '0',
  `value` text,
  `listingId` int(11) DEFAULT NULL,
  `formgroupId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `listingId` (`listingId`),
  KEY `formgroupId` (`formgroupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32384 ;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE IF NOT EXISTS `favourites` (
  `deleted` int(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `listing_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formfields`
--

CREATE TABLE IF NOT EXISTS `formfields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inputId` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `placeholder` varchar(255) DEFAULT NULL,
  `optionValues` text,
  `required` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=196 ;

-- --------------------------------------------------------

--
-- Table structure for table `formGroups`
--

CREATE TABLE IF NOT EXISTS `formGroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `formId` int(11) DEFAULT NULL,
  `formfieldId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formId` (`formId`),
  KEY `formfieldId` (`formfieldId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2139 ;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `languageId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `languageId` (`languageId`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=329 ;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT 'mongodb',
  `source_id` varchar(24) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE IF NOT EXISTS `listings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT 'mongodb',
  `source_id` varchar(24) DEFAULT NULL,
  `baseCurrencyPrice` float DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `images` text,
  `status` enum('APPROVED','PENDING','SOLD','EXPIRED','REJECTED') DEFAULT NULL,
  `price` float DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `mainImageUrl` varchar(2083) DEFAULT NULL,
  `privateSale` tinyint(1) DEFAULT NULL,
  `condition` enum('NEW','PRE-OWNED') DEFAULT NULL,
  `buyNowUrl` varchar(2083) DEFAULT NULL,
  `aerialLook3DUrl` varchar(2083) DEFAULT NULL,
  `aerialLookUrl` varchar(2083) DEFAULT NULL,
  `translations` text,
  `expired_at` datetime DEFAULT NULL,
  `ended_at` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `availableToId` int(11) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  `currencyId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `availableToId` (`availableToId`),
  KEY `countryId` (`countryId`),
  KEY `currencyId` (`currencyId`),
  KEY `categoryId` (`categoryId`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20092 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(255) DEFAULT 'mongodb',
  `source_id` varchar(24) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hashedPassword` text,
  `salt` varchar(255) DEFAULT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` enum('admin','seller','user','guest') DEFAULT NULL,
  `phoneNumber` text,
  `contactDetails` text,
  `companyAddress` text,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `mapZoomLevel` int(10) unsigned DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `companyRegNumber` varchar(255) DEFAULT NULL,
  `companyLogoUrl` varchar(2083) DEFAULT NULL,
  `coverImageUrl` varchar(2083) DEFAULT NULL,
  `companySummary` text,
  `website` varchar(255) DEFAULT NULL,
  `socialFacebook` varchar(2083) DEFAULT NULL,
  `socialTwitter` varchar(2083) DEFAULT NULL,
  `socialInstagram` varchar(2083) DEFAULT NULL,
  `socialPinterest` varchar(2083) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `isSuspended` tinyint(1) NOT NULL DEFAULT '0',
  `languageId` int(11) DEFAULT NULL,
  `countryId` int(11) DEFAULT NULL,
  `currencyId` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `source_id` (`source_id`),
  UNIQUE KEY `users_source_id_unique` (`source_id`),
  KEY `languageId` (`languageId`),
  KEY `countryId` (`countryId`),
  KEY `currencyId` (`currencyId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1965 ;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `deleted` tinyint(1) DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `listingId` int(11) NOT NULL,
  PRIMARY KEY (`userId`,`listingId`),
  KEY `listingId` (`listingId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`ParentId`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `categoryOrganisations`
--
ALTER TABLE `categoryOrganisations`
  ADD CONSTRAINT `categoryOrganisations_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryOrganisations_ibfk_2` FOREIGN KEY (`SubCategoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversations_ibfk_1` FOREIGN KEY (`listingId`) REFERENCES `listings` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `conversations_ibfk_2` FOREIGN KEY (`fromUserId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `conversations_ibfk_3` FOREIGN KEY (`toUserId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_ibfk_1` FOREIGN KEY (`defaultCurrencyId`) REFERENCES `currencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `countries_ibfk_2` FOREIGN KEY (`defaultLanguageId`) REFERENCES `languages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `extrainfos`
--
ALTER TABLE `extrainfos`
  ADD CONSTRAINT `extrainfos_ibfk_1` FOREIGN KEY (`listingId`) REFERENCES `listings` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `extrainfos_ibfk_2` FOREIGN KEY (`formgroupId`) REFERENCES `formGroups` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `formGroups`
--
ALTER TABLE `formGroups`
  ADD CONSTRAINT `formGroups_ibfk_1` FOREIGN KEY (`formId`) REFERENCES `forms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `formGroups_ibfk_2` FOREIGN KEY (`formfieldId`) REFERENCES `formfields` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`languageId`) REFERENCES `languages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `forms_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`availableToId`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `listings_ibfk_2` FOREIGN KEY (`countryId`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `listings_ibfk_3` FOREIGN KEY (`currencyId`) REFERENCES `currencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `listings_ibfk_4` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `listings_ibfk_5` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`languageId`) REFERENCES `languages` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`countryId`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`currencyId`) REFERENCES `currencies` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`listingId`) REFERENCES `listings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
