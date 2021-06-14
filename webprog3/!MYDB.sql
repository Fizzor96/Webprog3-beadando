CREATE TABLE IF NOT EXISTS `user_data` ( 
	`id`                   INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`userid`               INT UNSIGNED NOT NULL,
	`wishlistid`           INT UNSIGNED NOT NULL,
	`money`                INT UNSIGNED  DEFAULT 0,
	PRIMARY KEY (`id`) USING BTREE
	-- CONSTRAINT unq_user_data_wishlistid UNIQUE ( wishlistid ),
	-- CONSTRAINT unq_user_data_userid UNIQUE ( userid )
 );

 CREATE TABLE IF NOT EXISTS `wishlist` ( 
	`id`                   INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`userid`               INT UNSIGNED NOT NULL,
	`gameid`               INT UNSIGNED NOT NULL,
	PRIMARY KEY (`id`) USING BTREE
	-- CONSTRAINT unq_wishlist_gameid UNIQUE ( gameid ),
	-- CONSTRAINT unq_wishlist_userid UNIQUE ( userid )
 );
 
CREATE TABLE IF NOT EXISTS `library` ( 
	`id`                   INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`userid`               INT UNSIGNED NOT NULL,
	`gameid`               INT UNSIGNED NOT NULL,
	`hoursplayed`          INT UNSIGNED  DEFAULT 0,
	`acquired`             TIMESTAMP  NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`id`) USING BTREE
	-- CONSTRAINT unq_library_userid UNIQUE ( userid ),
	-- CONSTRAINT unq_library_gameid UNIQUE ( gameid ) 
 );

CREATE TABLE IF NOT EXISTS `reviews` ( 
	`id`                   INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`userid`               INT UNSIGNED NOT NULL,
	`gameid`               INT UNSIGNED NOT NULL,
	`description`          varchar(255)  NOT NULL,
	`created`             TIMESTAMP  NOT NULL DEFAULT current_timestamp(),
	PRIMARY KEY (`id`) USING BTREE
	-- CONSTRAINT unq_reviews_userid UNIQUE ( userid ),
	-- CONSTRAINT unq_reviews_gameid UNIQUE ( gameid )
 );

CREATE TABLE IF NOT EXISTS `games` ( 
	`id`                   INT UNSIGNED NOT NULL AUTO_INCREMENT,
	`title`                varchar(255)  NOT NULL,
	`publisher`            varchar(255)  NOT NULL,
	`cost`                 INT UNSIGNED NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`) USING BTREE
 );

 INSERT INTO games(title, publisher, cost) values('League of Legends', 'Riot Games', '0');
 INSERT INTO games(title, publisher, cost) values('Doom (2016)', 'Bethesda', '20');
 INSERT INTO games(title, publisher, cost) values('World of Warcraft', 'Activision Blizzard', '39');
 INSERT INTO games(title, publisher, cost) values('Overwatch', 'Activision Blizzard', '19');

-- CREATE TABLE IF NOT EXISTS usr ( 
-- 	id                   INT UNSIGNED NOT NULL  AUTO_INCREMENT,
-- 	name                 varchar(100)  NOT NULL
--  );

-- ALTER TABLE games ADD CONSTRAINT fk_games_wishlist FOREIGN KEY ( id ) REFERENCES wishlist( gameid ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ALTER TABLE games ADD CONSTRAINT fk_games_reviews FOREIGN KEY ( id ) REFERENCES reviews( gameid ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ALTER TABLE games ADD CONSTRAINT fk_games_library FOREIGN KEY ( id ) REFERENCES library( gameid ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ALTER TABLE user_data ADD CONSTRAINT fk_user_data_wishlist FOREIGN KEY ( userid ) REFERENCES wishlist( userid ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ALTER TABLE user_data ADD CONSTRAINT fk_user_data_reviews FOREIGN KEY ( userid ) REFERENCES reviews( userid ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ALTER TABLE user_data ADD CONSTRAINT fk_user_data_library FOREIGN KEY ( userid ) REFERENCES library( userid ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ALTER TABLE usr ADD CONSTRAINT fk_usr_user_data FOREIGN KEY ( id ) REFERENCES user_data( userid ) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- ALTER TABLE wishlist ADD CONSTRAINT fk_wishlist_user_data FOREIGN KEY ( id ) REFERENCES user_data( wishlistid ) ON DELETE NO ACTION ON UPDATE NO ACTION;
