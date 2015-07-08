CREATE TABLE `profile` (
  `profile_id`  INT          NOT NULL AUTO_INCREMENT,
  `first_name`  VARCHAR(50)  NOT NULL,
  `middle_name` VARCHAR(50)  NOT NULL,
  `last_name`   VARCHAR(50)  NOT NULL,
  `birth_date`  VARCHAR(2)   NOT NULL,
  `birth_month` VARCHAR(2)   NOT NULL,
  `birth_year`  VARCHAR(5)   NOT NULL,
  `address`     VARCHAR(100) NOT NULL,
  `contact_no`  VARCHAR(20)  NOT NULL,
  `email_id`    VARCHAR(50)  NOT NULL,
  `gender`      VARCHAR(1)   NOT NULL,
  `password`    VARCHAR(20)  NOT NULL,
  `logged_in`   INT(1)       NOT NULL,
  PRIMARY KEY (`profile_id`)
);

CREATE TABLE `friends` (
  `firend_id`          INT         NOT NULL AUTO_INCREMENT,
  `profile_id`         INT         NOT NULL,
  `friend_with`        INT         NOT NULL,
  `date_of_friendship` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`firend_id`)
);

CREATE TABLE `chat` (
  `chat_id`      INT           NOT NULL AUTO_INCREMENT,
  `chat_with`    INT           NOT NULL,
  `chat_message` VARCHAR(5000) NOT NULL,
  `chat_date`    VARCHAR(11)   NOT NULL,
  `chat_time`    TIME          NOT NULL,
  PRIMARY KEY (`chat_id`)
);

CREATE TABLE updates (
  `update_id`      INT           NOT NULL AUTO_INCREMENT,
  `prifile_id`     INT           NOT NULL,
  `update_message` VARCHAR(5000) NOT NULL,
  PRIMARY KEY (`update_id`)
);