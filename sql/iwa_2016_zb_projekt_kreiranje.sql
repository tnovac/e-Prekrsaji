-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema iwa_2016_zb_projekt
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema iwa_2016_zb_projekt
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `iwa_2016_zb_projekt` DEFAULT CHARACTER SET utf8 ;
USE `iwa_2016_zb_projekt` ;

-- -----------------------------------------------------
-- Table `iwa_2016_zb_projekt`.`tip_korisnika`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2016_zb_projekt`.`tip_korisnika` (
  `tip_id` INT(10) NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`tip_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2016_zb_projekt`.`korisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2016_zb_projekt`.`korisnik` (
  `korisnik_id` INT(10) NOT NULL AUTO_INCREMENT,
  `tip_id` INT(10) NOT NULL,
  `korisnicko_ime` VARCHAR(50) NOT NULL,
  `lozinka` VARCHAR(50) NOT NULL,
  `ime` VARCHAR(50) NOT NULL,
  `prezime` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) NULL,
  `slika` VARCHAR(200) NULL,
  PRIMARY KEY (`korisnik_id`),
  INDEX `fk_korisnik_tip_korisnika_idx` (`tip_id` ASC),
  CONSTRAINT `fk_korisnik_tip_korisnika`
    FOREIGN KEY (`tip_id`)
    REFERENCES `iwa_2016_zb_projekt`.`tip_korisnika` (`tip_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2016_zb_projekt`.`kategorija`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2016_zb_projekt`.`kategorija` (
  `kategorija_id` INT(10) NOT NULL AUTO_INCREMENT,
  `moderator_id` INT(10) NOT NULL,
  `naziv` VARCHAR(50) NOT NULL,
  `opis` TEXT NULL,
  PRIMARY KEY (`kategorija_id`),
  INDEX `fk_kategorija_moderator_idx` (`moderator_id` ASC),
  CONSTRAINT `fk_kategorija_moderator`
    FOREIGN KEY (`moderator_id`)
    REFERENCES `iwa_2016_zb_projekt`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2016_zb_projekt`.`vozilo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2016_zb_projekt`.`vozilo` (
  `vozilo_id` INT(10) NOT NULL AUTO_INCREMENT,
  `korisnik_id` INT(10) NOT NULL,
  `registracija` VARCHAR(50) NOT NULL,
  `marka_vozila` VARCHAR(50) NOT NULL,
  `tip_vozila` VARCHAR(50) NOT NULL,
  INDEX `fk_vozilo_korisnik_idx` (`korisnik_id` ASC),
  PRIMARY KEY (`vozilo_id`),
  CONSTRAINT `fk_vozilo_korisnik`
    FOREIGN KEY (`korisnik_id`)
    REFERENCES `iwa_2016_zb_projekt`.`korisnik` (`korisnik_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `iwa_2016_zb_projekt`.`prekrsaj`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `iwa_2016_zb_projekt`.`prekrsaj` (
  `prekrsaj_id` INT(10) NOT NULL AUTO_INCREMENT,
  `kategorija_id` INT(10) NOT NULL,
  `vozilo_id` INT(10) NOT NULL,
  `naziv` VARCHAR(50) NOT NULL,
  `opis` TEXT NOT NULL,
  `status` CHAR(1) NOT NULL,
  `novcana_kazna` INT(5) NOT NULL,
  `datum_prekrsaja` DATE NOT NULL,
  `vrijeme_prekrsaja` TIME NOT NULL,
  `datum_placanja` DATE NULL,
  `vrijeme_placanja` TIME NULL,
  `slika` VARCHAR(200) NOT NULL,
  `video` VARCHAR(200) NULL,
  PRIMARY KEY (`prekrsaj_id`),
  INDEX `fk_prekrsaj_kategorija_idx` (`kategorija_id` ASC),
  INDEX `fk_prekrsaj_vozilo1_idx` (`vozilo_id` ASC),
  CONSTRAINT `fk_prekrsaj_kategorija`
    FOREIGN KEY (`kategorija_id`)
    REFERENCES `iwa_2016_zb_projekt`.`kategorija` (`kategorija_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_prekrsaj_vozilo1`
    FOREIGN KEY (`vozilo_id`)
    REFERENCES `iwa_2016_zb_projekt`.`vozilo` (`vozilo_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE USER 'iwa_2016'@'localhost' IDENTIFIED BY 'foi2016';

GRANT SELECT, INSERT, TRIGGER, UPDATE, DELETE ON TABLE `iwa_2016_zb_projekt`.* TO 'iwa_2016'@'localhost';

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
