--
-- MySQL 5.5.47
-- Thu, 03 Mar 2016 15:14:56 +0000
--

CREATE DATABASE `horseFarm` DEFAULT CHARSET utf8;

USE `horseFarm`;

CREATE TABLE `agenda` (
   `id_agenda` int(5) not null auto_increment,
   `date` date not null,
   `time` time not null,
   `description` varchar(300) not null,
   PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `agenda` est vide]

CREATE TABLE `article` (
   `id_article` int(5) not null auto_increment,
   `title` int(24) not null,
   `text` int(255) not null,
   `image` varchar(64) not null,
   PRIMARY KEY (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `article` est vide]

CREATE TABLE `automatic_task` (
   `id_autTask` int(5) not null auto_increment,
   `frequence` int(3) not null,
   PRIMARY KEY (`id_autTask`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `automatic_task` est vide]

CREATE TABLE `bank_account` (
   `id_bank_account` int(5) not null auto_increment,
   PRIMARY KEY (`id_bank_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `bank_account` est vide]

CREATE TABLE `bank_historic` (
   `id_bank_hist` int(5) not null auto_increment,
   `transaction` varchar(255) not null,
   PRIMARY KEY (`id_bank_hist`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `bank_historic` est vide]

CREATE TABLE `categ_items` (
   `id_categ` int(5) not null auto_increment,
   `group` int(3) not null,
   PRIMARY KEY (`id_categ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `categ_items` est vide]

CREATE TABLE `competition` (
   `id_comp` int(5) not null auto_increment,
   `involved_item` varchar(64) not null,
   `start_date` date not null,
   `end_date` date not null,
   PRIMARY KEY (`id_comp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `competition` est vide]

CREATE TABLE `equestrain_center` (
   `id_center` int(5) not null auto_increment,
   `capacity` int(5) not null,
   PRIMARY KEY (`id_center`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `equestrain_center` est vide]

CREATE TABLE `horse` (
   `id_horse` int(5) not null auto_increment,
   `name` varchar(64) not null,
   `general_state` varchar(64) not null,
   `description` varchar(64) not null,
   `race` varchar(64) not null,
   `level` int(5) not null,
   `experience` int(5) not null,
   PRIMARY KEY (`id_horse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `horse` est vide]

CREATE TABLE `horse_attrib` (
   `id_horse_attrib` int(5) not null auto_increment,
   PRIMARY KEY (`id_horse_attrib`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `horse_attrib` est vide]

CREATE TABLE `horse_club` (
   `id_club` int(5) not null auto_increment,
   `capacity` int(5) not null,
   PRIMARY KEY (`id_club`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `horse_club` est vide]

CREATE TABLE `infrastructure` (
   `id_infrastucture` int(5) not null auto_increment,
   `price` int(5) not null,
   `level` int(5) not null,
   `group` int(5) not null,
   `ressource_consumption` int(5) not null,
   `items_capacity` int(5) not null,
   `horses_capacity` int(5) not null,
   `type` varchar(64) not null,
   `description` varchar(64) not null,
   PRIMARY KEY (`id_infrastucture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `infrastructure` est vide]

CREATE TABLE `injury` (
   `id_injury` int(5) not null auto_increment,
   `description` varchar(64) not null,
   PRIMARY KEY (`id_injury`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `injury` est vide]

CREATE TABLE `inventary` (
   `id_inventary` int(5) not null auto_increment,
   PRIMARY KEY (`id_inventary`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `inventary` est vide]

CREATE TABLE `item` (
   `id_item` int(5) not null auto_increment,
   `level` int(5) not null,
   `price` int(5) not null,
   `description` varchar(64) not null,
   `type` varchar(64) not null,
   PRIMARY KEY (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `item` est vide]

CREATE TABLE `manager` (
   `id_manager` int(5) not null auto_increment,
   PRIMARY KEY (`id_manager`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `manager` est vide]

CREATE TABLE `mental_attrib` (
   `id_mental` int(5) not null auto_increment,
   `sociability` int(3) not null,
   `intelligence` int(3) not null,
   `humeur` int(3) not null,
   PRIMARY KEY (`id_mental`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `mental_attrib` est vide]

CREATE TABLE `newspaper` (
   `id_newspaper` int(5) not null auto_increment,
   `date` date not null,
   `news` varchar(300) not null,
   `specific_key_point` varchar(300) not null,
   PRIMARY KEY (`id_newspaper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `newspaper` est vide]

CREATE TABLE `other` (
   `id_other` int(5) not null auto_increment,
   `name` varchar(64) not null,
   `description` varchar(300) not null,
   PRIMARY KEY (`id_other`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `other` est vide]

CREATE TABLE `parasite` (
   `id_parasite` int(5) not null auto_increment,
   `description` varchar(300) not null,
   PRIMARY KEY (`id_parasite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `parasite` est vide]

CREATE TABLE `physical_attrib` (
   `id_physical` int(5) not null auto_increment,
   `resistance` int(3) not null,
   `endurance` int(3) not null,
   `detente` int(3) not null,
   `speed` int(3) not null,
   PRIMARY KEY (`id_physical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `physical_attrib` est vide]

CREATE TABLE `planning` (
   `id_planning` int(5) not null auto_increment,
   PRIMARY KEY (`id_planning`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `planning` est vide]

CREATE TABLE `player` (
   `id_account` int(5) not null auto_increment,
   `email` varchar(64) not null,
   `password` varchar(64) not null,
   `name` varchar(24) not null,
   `lastname` varchar(24) not null,
   `sex` binary(1) not null,
   `birthday` date not null,
   `phone` int(10) not null,
   `mail_address` varchar(100) not null,
   `avatar` varchar(64) not null,
   `description` varchar(300) not null,
   `website` varchar(64) not null,
   `ip_address` varchar(64) not null,
   `inscription_date` date not null,
   `last_login_date` date not null,
   `pseudonym` varchar(24) not null,
   PRIMARY KEY (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `player` est vide]

CREATE TABLE `publicity` (
   `id_pub` int(5) not null auto_increment,
   `name` varchar(64) not null,
   `description` varchar(300) not null,
   PRIMARY KEY (`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `publicity` est vide]

CREATE TABLE `race` (
   `id_race` int(5) not null auto_increment,
   `description` varchar(64) not null,
   PRIMARY KEY (`id_race`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `race` est vide]

CREATE TABLE `shop` (
   `id_shop` int(5) not null auto_increment,
   `element` enum('equestrian_center','horse_club','infrastructure','item') not null,
   PRIMARY KEY (`id_shop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `shop` est vide]

CREATE TABLE `sickness` (
   `id_sickness` int(5) not null auto_increment,
   `description` varchar(64) not null,
   PRIMARY KEY (`id_sickness`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `sickness` est vide]

CREATE TABLE `state` (
   `id_state` int(5) not null auto_increment,
   `health` int(3) not null,
   `moral` int(3) not null,
   `stress` int(3) not null,
   `tiredness` int(3) not null,
   `hunger` int(3) not null,
   `cleanliness` int(3) not null,
   PRIMARY KEY (`id_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `state` est vide]

CREATE TABLE `task` (
   `id_task` int(5) not null auto_increment,
   `action` varchar(64) not null,
   PRIMARY KEY (`id_task`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `task` est vide]

CREATE TABLE `weather` (
   `id_weather` int(5) not null auto_increment,
   `name` varchar(64) not null,
   `description` varchar(64) not null,
   PRIMARY KEY (`id_weather`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- [La table `weather` est vide]