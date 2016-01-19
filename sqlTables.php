<!DOCTYPE html>
	<html>
	<!--
	 DROP TABLE IF EXISTS product;
	 DROP TABLE IF EXISTS profile;
	 DROP TABLE IF EXISTS review;
	 DROP TABLE IF EXISTS comment;
	 DROP TABLE IF EXISTS helpfulVote;
	 DROP TABLE IF EXISTS question;
	 DROP TABLE IF EXISTS answer;


	CREATE TABLE product{
	productId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	productImage
	productPrice INT UNSIGNED NOT NULL,
	additionalInfo VARCHAR(256) NOT NULL,
	description VARCHAR(256) NOT NULL,
	technicalDetails VARCHAR(256) NOT NULL,
	productName VARCHAR(256) NOT NULL,
	PRIMARY KEY(productId)
	};
	CREATE TABLE profile{
	profileID INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(20) NOT NULL,
	location VARCHAR(20),
	blurb VARCHAR(20),
	UNIQUE(name),
	PRIMARY KEY(profileId)
	};
	CREATE TABLE review{
	reviewId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	productId INT UNSIGNED NOT NULL,
	reviewText VARCHAR(256) NOT NULL,
	reviewDate DATETIME NOT NULL,
	starVote TINYINT UNSIGNED NOT NULL,
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(productId) REFERENCES product(productId),
	PRIMARY KEY(reviewId)

	};
	CREATE TABLE comment{
	commentId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	reviewId INT UNSIGNED NOT NULL,
	commentText VARCHAR(256) NOT NULL,
	commentDate DATETIME NOT NULL,
	INDEX(profileId),
	INDEX(reviewId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(reviewId) REFERENCES review(reviewId),

	PRIMARY KEY(commentId)

	};
	CREATE TABLE helpfulVote{
	profileId INT UNSIGNED NOT NULL,
	reviewId INT UNSIGNED NOT NULL,
	INDEX(profileId),
	INDEX(reviewId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(reviewId) REFERENCES review(reviewId),
	PRIMARY KEY(profileId, reviewId)

	};


	CREATE TABLE question{
	questionID INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	productId INT UNSIGNED NOT NULL,
	questionDate DATETIME NOT NULL,
	questionText VARCHAR(256) NOT NULL,
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(productId) REFERENCES product(productId),
	PRIMARY KEY(questionId)

	};
	CREATE TABLE answer{
	answerId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	questionId INT UNSIGNED NOT NULL,
	answerDate DATETIME NOT NULL,
	answerText VARCHAR(256) NOT NULL,
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(questionId) REFERENCES question(questionId),
	PRIMARY KEY(answerId)

	};








	-- this is a comment in SQL (yes, the space is needed!)
-- these statements will drop the tables and re-add them
-- this is akin to reformatting and reinstalling Windows (OS X never needs a reinstall...) ;)
-- never ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever ever
-- do this on live data!!!!
DROP TABLE IF EXISTS favorite;
DROP TABLE IF EXISTS tweet;
DROP TABLE IF EXISTS profile;

-- the CREATE TABLE function is a function that takes tons of arguments to layout the table's schema
CREATE TABLE profile (
-- this creates the attribute for the primary key
-- auto_increment tells mySQL to number them {1, 2, 3, ...}
-- not null means the attribute is required!
	profileId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	email VARCHAR(128) NOT NULL,
-- to make something optional, exclude the not null
	phone VARCHAR(32),
	atHandle VARCHAR(32) NOT NULL,
-- to make sure duplicate data cannot exist, create a unique index
	UNIQUE(email),
	UNIQUE(atHandle),
-- this officiates the primary key for the entity
	PRIMARY KEY(profileId)
);

-- create the tweet entity
CREATE TABLE tweet (
	-- this is for yet another primary key...
	tweetId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	-- this is for a foreign key; auto_incremented is omitted by design
	profileId INT UNSIGNED NOT NULL,
	tweetContent VARCHAR(140) NOT NULL,
	-- notice dates don't need a size parameter
	tweetDate DATETIME NOT NULL,
	-- this creates an index before making a foreign key
	INDEX(profileId),
	-- this creates the actual foreign key relation
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	-- and finally create the primary key
	PRIMARY KEY(tweetId)
);

	CREATE TABLE favorite (
	-- these are not auto_increment because they're still foreign keys
	profileId INT UNSIGNED NOT NULL,
	tweetId INT UNSIGNED NOT NULL,
	favoriteDate DATETIME NOT NULL,
	-- index the foreign keys
	INDEX(profileId),
	INDEX(tweetId),
	-- create the foreign key relations
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(tweetId) REFERENCES tweet(tweetId),
	-- finally, create a composite foreign key with the two foreign keys
	PRIMARY KEY(profileId, tweetId)
	);



	 -->
</html>