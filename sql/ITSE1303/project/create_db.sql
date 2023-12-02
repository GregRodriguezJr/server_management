SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
	
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------c
-- Table `mydb`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`clients` (
`client_id` INT(11) NOT NULL,
`client_ssn` VARCHAR(11) NOT NULL,
`client_first_name` VARCHAR(45) NOT NULL,
`client_last_name` VARCHAR(45) NOT NULL,
`client_date_of_birth` DATE NOT NULL,
`client_address` VARCHAR(255) NOT NULL,
`client_contact_number` VARCHAR(12) NOT NULL,
`client_email` VARCHAR(45) NOT NULL,
`client_city` VARCHAR(45) NOT NULL,
`client_state` VARCHAR(45) NOT NULL,
`client_zipcode` VARCHAR(11) NOT NULL,
`client_company_name` VARCHAR(255) NULL DEFAULT NULL,
PRIMARY KEY (`client_id`),
UNIQUE INDEX `ssn_UNIQUE` (`client_ssn` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Table `mydb`.`account`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`accounts` (
`account_id` INT(11) NOT NULL,
`client_id` INT(11) NOT NULL,
`account_type` VARCHAR(45) NOT NULL,
`account_balance` DECIMAL(15,2) NOT NULL,
`account_date_opened` DATE NOT NULL,
PRIMARY KEY (`account_id`),
INDEX `client_id_idx` (`client_id` ASC) VISIBLE,
CONSTRAINT `client_id`
FOREIGN KEY (`client_id`)
REFERENCES `mydb`.`clients` (`client_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`card_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`card_details` (
`card_id` INT(11) NOT NULL,
`account_id` INT(11) NOT NULL,
`card_number` VARCHAR(16) NOT NULL,
`card_type` VARCHAR(12) NOT NULL,
PRIMARY KEY (`card_id`),
INDEX `account_id` (`account_id` ASC) VISIBLE,
CONSTRAINT `card_details_ibfk_1`
FOREIGN KEY (`account_id`)
REFERENCES `mydb`.`accounts` (`account_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`employees`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`employees` (
`employee_id` INT(11) NOT NULL,
`employee_first_name` VARCHAR(45) NOT NULL,
`employee_last_name` VARCHAR(45) NOT NULL,
`employee_position` VARCHAR(45) NOT NULL,
`employee_date_of_birth` VARCHAR(45) NOT NULL,
`employee_address` VARCHAR(45) NOT NULL,
`employee_contact_number` VARCHAR(12) NOT NULL,
`employee_email` VARCHAR(45) NOT NULL,
PRIMARY KEY (`employee_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`transactions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`transactions` (
`transaction_id` INT(11) NOT NULL AUTO_INCREMENT,
`account_id` INT(11) NOT NULL,
`transaction_amount` DECIMAL(15,2),
`transaction_type` VARCHAR(12),
PRIMARY KEY (`transaction_id`),
INDEX `account_id` (`account_id` ASC) VISIBLE,
CONSTRAINT `transactions_ibfk_1`
FOREIGN KEY (`account_id`)
REFERENCES `mydb`.`accounts` (`account_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mydb`.`loans`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`loans` (
`loan_id` INT NOT NULL,
`account_id` INT NOT NULL,
`loan_type` VARCHAR(45) NOT NULL,
`loan_amount` DECIMAL(15,2) NOT NULL,
`interest_rate` DECIMAL(15,2) NOT NULL,
`loan_term` VARCHAR(45) NOT NULL,
`date_issued` DATE NOT NULL,
PRIMARY KEY (`loan_id`),
INDEX `account_id_idx` (`account_id` ASC) VISIBLE,
CONSTRAINT `loans_ibfk_1`
FOREIGN KEY (`account_id`)
REFERENCES `mydb`.`accounts` (`account_id`)
ON DELETE NO ACTION
ON UPDATE NO ACTION
)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;