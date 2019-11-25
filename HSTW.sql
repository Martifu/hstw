-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema hstw
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema hstw
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `hstw` DEFAULT CHARACTER SET utf8 ;
USE `hstw` ;

-- -----------------------------------------------------
-- Table `hstw`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`personas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_p` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_m` VARCHAR(45) NULL DEFAULT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL,
  `curp` VARCHAR(45) NULL DEFAULT NULL,
  `rfc` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hstw`.`credito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`credito` (
  `id` INT(11) NOT NULL,
  `id_persona` INT(11) NULL DEFAULT NULL,
  `prestamo` INT(11) NULL DEFAULT NULL,
  `años` INT(11) NULL DEFAULT NULL,
  `interes` INT(11) NULL DEFAULT NULL,
  `tipo_pago` VARCHAR(45) NULL DEFAULT NULL,
  `pago` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personas_idx` (`id_persona` ASC),
  CONSTRAINT `fk_personas`
    FOREIGN KEY (`id_persona`)
    REFERENCES `hstw`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hstw`.`administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`administradores` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `id_personas` INT(11) NULL DEFAULT NULL,
  `correo` VARCHAR(45) NULL DEFAULT NULL,
  `contraseña` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_idx` (`id_personas` ASC),
  CONSTRAINT `fk_persona`
    FOREIGN KEY (`id_personas`)
    REFERENCES `hstw`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hstw`.`direcciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`direcciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_persona` INT NULL,
  `calle` VARCHAR(45) NULL,
  `numero` INT NULL,
  `calles` VARCHAR(45) NULL,
  `cp` INT NULL,
  `colonia` VARCHAR(45) NULL,
  `ciudad` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_idx` (`id_persona` ASC),
  CONSTRAINT `fk_persona1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `hstw`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`fechas_de_pago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`fechas_de_pago` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_credito` INT NULL,
  `fechas` DATE NULL,
  `monto` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_credito_idx` (`id_credito` ASC),
  CONSTRAINT `fk_credito`
    FOREIGN KEY (`id_credito`)
    REFERENCES `hstw`.`credito` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`instituciones_bancarias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`instituciones_bancarias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `codigo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`credito_bancario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`credito_bancario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_credito` INT NULL,
  `id_institucion` INT NULL,
  `estado` VARCHAR(45) NULL,
  `comportamiento` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_credito_idx` (`id_credito` ASC),
  INDEX `fk_institucion_idx` (`id_institucion` ASC),
  CONSTRAINT `fk_credito1`
    FOREIGN KEY (`id_credito`)
    REFERENCES `hstw`.`credito` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_institucion`
    FOREIGN KEY (`id_institucion`)
    REFERENCES `hstw`.`instituciones_bancarias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`tarjetas_personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`tarjetas_personas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NULL,
  `nip` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `id_personas` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personas_idx` (`id_personas` ASC),
  CONSTRAINT `fk_personas1personas`
    FOREIGN KEY (`id_personas`)
    REFERENCES `hstw`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`instituciones_no_bancarias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`instituciones_no_bancarias` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `codigo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`creditos_no_bancario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`creditos_no_bancario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_credito` INT NULL,
  `id_instituciones` INT NULL,
  `estado` VARCHAR(45) NULL,
  `comportamiento` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_credito_idx` (`id_credito` ASC),
  INDEX `fk_institucion_idx` (`id_instituciones` ASC),
  CONSTRAINT `fk_credito0`
    FOREIGN KEY (`id_credito`)
    REFERENCES `hstw`.`credito` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_institucion0`
    FOREIGN KEY (`id_instituciones`)
    REFERENCES `hstw`.`instituciones_no_bancarias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
