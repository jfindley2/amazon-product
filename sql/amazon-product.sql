
 -- If I were to add more, I would include the fact that the product itself has an average
 -- Of the star votes given in reviews, the fact that a single product page can have multiple
 -- Products each with their own prices, images, descriptions, and questions.

	DROP TABLE IF EXISTS answer;
	DROP TABLE IF EXISTS question;
	DROP TABLE IF EXISTS helpfulVote;
	DROP TABLE IF EXISTS comment;
	DROP TABLE IF EXISTS review;
	DROP TABLE IF EXISTS profile;
	DROP TABLE IF EXISTS product;


	CREATE TABLE product(
	productId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	productImage VARCHAR(255) NOT NULL,
	productPrice INT UNSIGNED NOT NULL,
	additionalInfo VARCHAR(255) NOT NULL,
	description VARCHAR(255) NOT NULL,
	technicalDetails VARCHAR(255) NOT NULL,
	productName VARCHAR(255) NOT NULL,
	PRIMARY KEY(productId)
	);

	CREATE TABLE profile(
	profileID INT UNSIGNED AUTO_INCREMENT NOT NULL,
	name VARCHAR(32) NOT NULL,
	location VARCHAR(20),
	blurb VARCHAR(20),
	PRIMARY KEY(profileId)
	);

	CREATE TABLE review(
	reviewId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	productId INT UNSIGNED NOT NULL,
	reviewText VARCHAR(255) NOT NULL,
	reviewDate TIMESTAMP NOT NULL,
	-- The Star Vote will be from 1 to 5, with half increments.
	starVote TINYINT UNSIGNED NOT NULL,
	INDEX(profileId),
	INDEX(productId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(productId) REFERENCES product(productId),
	PRIMARY KEY(reviewId)
	);

 -- In comment, as in answer, a user can actually respond multiple times. Ipso Facto,
 -- profileId is not unique in the following.
	CREATE TABLE comment(
	commentId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	reviewId INT UNSIGNED NOT NULL,
	commentText VARCHAR(255) NOT NULL,
	commentDate TIMESTAMP NOT NULL,
	INDEX(profileId),
	INDEX(reviewId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(reviewId) REFERENCES review(reviewId),
	PRIMARY KEY(commentId)
	);

 -- I need to add a value to helpful vote--boolean? Binary? Tinyint?
 -- By the way, "Helpful Vote," refers to how the reviews can be reviewed as either,
 -- "Helpful," or, "Not Helpful" on amazon. Each user can only vote on a review once.
	CREATE TABLE helpfulVote(
	profileId INT UNSIGNED NOT NULL,
	reviewId INT UNSIGNED NOT NULL,
	INDEX(profileId),
	INDEX(reviewId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(reviewId) REFERENCES review(reviewId),
	PRIMARY KEY(profileId, reviewId)
	);


	CREATE TABLE question(
	questionID INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	productId INT UNSIGNED NOT NULL,
	questionDate TIMESTAMP NOT NULL,
	questionText VARCHAR(255) NOT NULL,
	INDEX(profileId),
	INDEX(productId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(productId) REFERENCES product(productId),
	PRIMARY KEY(questionId)
	);

	CREATE TABLE answer(
	answerId INT UNSIGNED AUTO_INCREMENT NOT NULL,
	profileId INT UNSIGNED NOT NULL,
	questionId INT UNSIGNED NOT NULL,
	answerDate TIMESTAMP NOT NULL,
	answerText VARCHAR(255) NOT NULL,
	INDEX(profileId),
	INDEX(questionId),
	FOREIGN KEY(profileId) REFERENCES profile(profileId),
	FOREIGN KEY(questionId) REFERENCES question(questionId),
	PRIMARY KEY(answerId)
	);

