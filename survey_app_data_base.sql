-- MySQL Script generated by MySQL Workbench
-- jue 14 may 2020 15:28:33 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema survey.app
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema survey.app
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `survey.app` DEFAULT CHARACTER SET utf8 ;
USE `survey.app` ;

-- -----------------------------------------------------
-- Table `survey.app`.`survey`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`survey` (
  `survey_id` INT NOT NULL AUTO_INCREMENT,
  `survey_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`survey_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey.app`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`category` (
  `category_id` INT NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`category_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey.app`.`question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`question` (
  `question_id` INT NOT NULL AUTO_INCREMENT,
  `question_content` VARCHAR(255) NOT NULL,
  `question_description` VARCHAR(255) NULL,
  `category_id` INT NOT NULL,
  `survey_id` INT NOT NULL,
  PRIMARY KEY (`question_id`, `category_id`, `survey_id`),
  INDEX `fk_pregunta_category1_idx` (`category_id` ASC),
  INDEX `fk_pregunta_survey1_idx` (`survey_id` ASC),
  CONSTRAINT `fk_pregunta_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `survey.app`.`category` (`category_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pregunta_survey1`
    FOREIGN KEY (`survey_id`)
    REFERENCES `survey.app`.`survey` (`survey_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey.app`.`answer_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`answer_type` (
  `answer_type_id` INT NOT NULL AUTO_INCREMENT,
  `answer_type_content` VARCHAR(255) NULL,
  PRIMARY KEY (`answer_type_id`))
ENGINE = InnoDB;

INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (1,'Checkbox');
INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (2,'File'); 
INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (3,'Image'); 
INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (4,'Multiple select');
INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (5,'Radio');
INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (6,'Single select');
INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (7,'Text');
INSERT INTO `answer_type` (`answer_type_id`,`answer_type_content`) VALUES (8,'Text area');

-- -----------------------------------------------------
-- Table `survey.app`.`answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`answer` (
  `answer_id` INT NOT NULL AUTO_INCREMENT,
  `answer_content` VARCHAR(255) NULL,
  `answer_image` VARCHAR(255) NULL,
  `exclusive_answer` TINYINT NOT NULL,
  `answer_type_id` INT NOT NULL,
  `question_id` INT NOT NULL,
  `nested_question_id` INT NULL DEFAULT NULL,
  PRIMARY KEY (`answer_id`, `answer_type_id`, `question_id`),
  INDEX `fk_answer_question1_idx` (`question_id` ASC),
  INDEX `fk_answer_answer_type1_idx` (`answer_type_id` ASC),
  INDEX `fk_answer_question2_idx` (`nested_question_id` ASC),
  CONSTRAINT `fk_answer_question1`
    FOREIGN KEY (`question_id`)
    REFERENCES `survey.app`.`question` (`question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_answer_type1`
    FOREIGN KEY (`answer_type_id`)
    REFERENCES `survey.app`.`answer_type` (`answer_type_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_answer_question2`
    FOREIGN KEY (`nested_question_id`)
    REFERENCES `survey.app`.`question` (`question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey.app`.`marital_status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`marital_status` (
  `marital_status_id` INT NOT NULL AUTO_INCREMENT,
  `marital_status_desc` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`marital_status_id`))
ENGINE = InnoDB;

INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (1,'Soltero/a');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (2,'Comprometido/a');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (3,'En Relación ( más de 1 Año de noviazgo)');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (4,'Casado/a');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (5,'Unión libre o unión de hecho');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (6,'Separado/a');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (7,'Divorciado/a');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (8,'Viudo/a');
INSERT INTO `marital_status` (`marital_status_id`,`marital_status_desc`) VALUES (9,'Noviazgo(período inferior a 1 año de relación amorosa)');
-- -----------------------------------------------------
-- Table `survey.app`.`education_level`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`education_level` (
  `education_level_id` INT NOT NULL AUTO_INCREMENT,
  `education_level_desc` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`education_level_id`))
ENGINE = InnoDB;

INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (1,'Sabe leer, pero no escribir');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (2,'No esudió, pero sabe leer y escribir');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (3,'Primaria incompleta');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (4,'Primaria completa');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (5,'Secundaria_incompleta');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (6,'Secundaria_completa');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (7,'Técnico profesional incompleto');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (8,'Técnico profesional completo');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (9,'Universitario incompleto');
INSERT INTO `education_level` (`education_level_id`,`education_level_desc`) VALUES (10,'Universitario completo');

-- -----------------------------------------------------
-- Table `survey.app`.`surveyed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`surveyed` (
  `surveyed_id` INT NOT NULL AUTO_INCREMENT,
  `surveyed_name` VARCHAR(80) NOT NULL,
  `surveyed_lastname` VARCHAR(800) NOT NULL,
  `surveyed_birthday` DATE NOT NULL,
  `surveyed_sex` INT(1) NOT NULL,
  `surveyed_email` VARCHAR(255) NULL,
  `surveyed_phone` BIGINT NULL,
  `marital_status_id` INT NOT NULL,
  `education_level_id` INT NOT NULL,
  PRIMARY KEY (`surveyed_id`, `marital_status_id`, `education_level_id`),
  INDEX `fk_surveyed_marital_status1_idx` (`marital_status_id` ASC),
  INDEX `fk_surveyed_education_level1_idx` (`education_level_id` ASC),
  CONSTRAINT `fk_surveyed_marital_status1`
    FOREIGN KEY (`marital_status_id`)
    REFERENCES `survey.app`.`marital_status` (`marital_status_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_surveyed_education_level1`
    FOREIGN KEY (`education_level_id`)
    REFERENCES `survey.app`.`education_level` (`education_level_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `survey.app`.`surveyr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`surveyr` (
  `surveyr_document` INT NOT NULL,
  `surveyr_name` VARCHAR(80) NULL,
  `surveyr_lastname` VARCHAR(80) NULL,
  `surveyr_email` VARCHAR(255) NULL,
  `surveyr_password` VARCHAR(80) NULL,
  PRIMARY KEY (`surveyr_document`))
ENGINE = InnoDB;

INSERT INTO `surveyr` (`surveyr_document`, `surveyr_name`, `surveyr_lastname`, `surveyr_email`, `surveyr_password`) VALUES ('111111', 'admin', 'admin', 'admin@mail.com', '$2y$12$gpbq1XKDZ7ukeTU4DR1Ode18Cl2TkTIcjNcu6kTIGK0ae5a0IY206');
-- -----------------------------------------------------
-- Table `survey.app`.`completed_survey`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `survey.app`.`completed_survey` (
  `completed_survey_id` INT NOT NULL AUTO_INCREMENT,
  `surveyr_document` INT NOT NULL,
  `surveyed_id` INT NOT NULL,
  `survey_id` INT NOT NULL,
  `question_id` INT NOT NULL,
  `answer_id` INT NOT NULL,
  PRIMARY KEY (`completed_survey_id`),
  INDEX `fk_completed_survey_surveyr1_idx` (`surveyr_document` ASC),
  INDEX `fk_completed_survey_surveyed1_idx` (`surveyed_id` ASC),
  INDEX `fk_completed_survey_survey1_idx` (`survey_id` ASC),
  INDEX `fk_completed_survey_question1_idx` (`question_id` ASC),
  INDEX `fk_completed_survey_answer1_idx` (`answer_id` ASC),
  CONSTRAINT `fk_completed_survey_surveyr1`
    FOREIGN KEY (`surveyr_document`)
    REFERENCES `survey.app`.`surveyr` (`surveyr_document`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_completed_survey_surveyed1`
    FOREIGN KEY (`surveyed_id`)
    REFERENCES `survey.app`.`surveyed` (`surveyed_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_completed_survey_survey1`
    FOREIGN KEY (`survey_id`)
    REFERENCES `survey.app`.`survey` (`survey_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_completed_survey_question1`
    FOREIGN KEY (`question_id`)
    REFERENCES `survey.app`.`question` (`question_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_completed_survey_answer1`
    FOREIGN KEY (`answer_id`)
    REFERENCES `survey.app`.`answer` (`answer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
