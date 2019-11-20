-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema HSTW
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema HSTW
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `HSTW` DEFAULT CHARACTER SET utf8 ;
USE `HSTW` ;

-- -----------------------------------------------------
-- Table `HSTW`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HSTW`.`personas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL,
  `Apellido_p` VARCHAR(45) NULL,
  `Apellido_m` VARCHAR(45) NULL,
  `Fecha_nacimiento` DATE NULL,
  `Curp` VARCHAR(45) NULL,
  `Rfc` VARCHAR(45) NULL,
  `calle` VARCHAR(45) NULL,
  `Numero` INT NULL,
  `Calles` VARCHAR(45) NULL,
  `Cp` VARCHAR(45) NULL,
  `Colonia` VARCHAR(45) NULL,
  `ciudad` VARCHAR(45) NULL,
  `Estado` VARCHAR(45) NULL,
  `Pais` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `HSTW`.`tipo_usiarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HSTW`.`tipo_usiarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `HSTW`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HSTW`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_personas` INT NULL,
  `id_tipousu` INT NULL,
  `correo` VARCHAR(45) NULL,
  `contraseña` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_idx` (`id_personas` ASC),
  INDEX `fk_tipousu_idx` (`id_tipousu` ASC),
  CONSTRAINT `fk_persona`
    FOREIGN KEY (`id_personas`)
    REFERENCES `HSTW`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipousu`
    FOREIGN KEY (`id_tipousu`)
    REFERENCES `HSTW`.`tipo_usiarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `HSTW`.`buros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `HSTW`.`buros` (
  `id` INT NOT NULL,
  `id_persona` INT NULL,
  `prestamo` INT NULL,
  `años` INT NULL,
  `interes` INT NULL,
  `tipo_pago` VARCHAR(45) NULL,
  `pago` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personas_idx` (`id_persona` ASC),
  CONSTRAINT `fk_personas`
    FOREIGN KEY (`id_persona`)
    REFERENCES `HSTW`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
