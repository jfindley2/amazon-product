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
