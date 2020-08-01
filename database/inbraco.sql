-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `inbraco` ;

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inbraco` DEFAULT CHARACTER SET utf8 ;
USE `inbraco` ;

-- -----------------------------------------------------
-- Table `inbraco`.`produtos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inbraco`.`produtos` ;

CREATE TABLE IF NOT EXISTS `inbraco`.`produtos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inbraco`.`atributos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inbraco`.`atributos` ;

CREATE TABLE IF NOT EXISTS `inbraco`.`atributos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inbraco`.`valores_de_atributos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inbraco`.`valores_de_atributos` ;

CREATE TABLE IF NOT EXISTS `inbraco`.`valores_de_atributos` (
  `id` INT NOT NULL,
  `valor` VARCHAR(45) NULL,
  `id_produto` INT NOT NULL,
  `id_atributo` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_valores_de_atributos_produtos_idx` (`id_produto` ASC),
  INDEX `fk_valores_de_atributos_atributos1_idx` (`id_atributo` ASC),
  CONSTRAINT `fk_valores_de_atributos_produtos`
    FOREIGN KEY (`id_produto`)
    REFERENCES `inbraco`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_valores_de_atributos_atributos1`
    FOREIGN KEY (`id_atributo`)
    REFERENCES `inbraco`.`atributos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inbraco`.`imagens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inbraco`.`imagens` ;

CREATE TABLE IF NOT EXISTS `inbraco`.`imagens` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `caminho` VARCHAR(200) NULL,
  `id_produto` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_imagens_produtos1_idx` (`id_produto` ASC),
  CONSTRAINT `fk_imagens_produtos1`
    FOREIGN KEY (`id_produto`)
    REFERENCES `inbraco`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inbraco`.`rellacionados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `inbraco`.`rellacionados` ;

CREATE TABLE IF NOT EXISTS `inbraco`.`rellacionados` (
  `idrellacionados` INT NOT NULL,
  `id_produto1` INT NOT NULL,
  `id_produto2` INT NOT NULL,
  PRIMARY KEY (`idrellacionados`),
  INDEX `fk_rellacionados_produtos1_idx` (`id_produto1` ASC),
  INDEX `fk_rellacionados_produtos2_idx` (`id_produto2` ASC),
  CONSTRAINT `fk_rellacionados_produtos1`
    FOREIGN KEY (`id_produto1`)
    REFERENCES `inbraco`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_rellacionados_produtos2`
    FOREIGN KEY (`id_produto2`)
    REFERENCES `inbraco`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
