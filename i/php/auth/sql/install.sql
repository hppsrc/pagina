DROP TABLE IF EXISTS users;

CREATE TABLE `users`(
    `ID` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    `student_id` INT NOT NULL,
    `mail` VARCHAR(100) DEAFULT NULL,
    `password` VARCHAR(255) DEAFULT NULL,
    `code_verification` INT NOT NULL,
    `verification_status` INT NOT NULL,
    `role` INT NOT NULL,
    `roles_info` VARCHAR(20) NOT NULL,
    `msg` JSON NULL DEFAULT NULL,
    `banned` BOOLEAN NOT NULL,
    PRIMARY KEY(`ID`)

) ENGINE = InnoDB;

DROP TABLE IF EXISTS video;

CREATE TABLE `video` (
    `user_id` INT NOT NULL,
    `title` VARCHAR(100) NOT NULL,
    `yt_id` VARCHAR(11) NOT NULL,
    `update_status` BOOLEAN NOT NULL,
    `views` INT NOT NULL,
    `description` VARCHAR(500) NOT NULL,
    `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `presentation` VARCHAR(200) NOT NULL,
    `reports` INT NOT NULL,

) ENGINE = InnoDB;

ALTER TABLE `video` ADD CONSTRAINT `RK_video`
FOREIGN KEY (`user_id`) REFERENCES `users`(`ID`)
ON DELETE RESTRICT ON UPDATE RESTRICT;

DROP TABLE IF EXISTS users_votes;

CREATE TABLE `users_votes`. (
    `user_id` INT NOT NULL,
    `type_vote` INT NOT NULL,
    `vote_context` VARCHAR(500) NULL DEFAULT NULL,
    `date` TIMESTAMP NOT NULL,
    `feature` BOOLEAN NOT NULL

) ENGINE = InnoDB;

ALTER TABLE `users_votes` ADD CONSTRAINT `RK_users_votes`
FOREIGN KEY (`user_id`) REFERENCES `users`(`ID`)
ON DELETE RESTRICT ON UPDATE RESTRICT;