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
  CONSTRAINT `fk_personas_4`
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
  `password` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_persona_idx` (`id_personas` ASC),
  CONSTRAINT `fk_persona_1`
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
  CONSTRAINT `fk_persona_2`
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
-- Table `hstw`.`tipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`instituciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`instituciones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `codigo` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `tipo` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fo_instituciom_tipo_idx` (`tipo` ASC),
  CONSTRAINT `fo_instituciom_tipo`
    FOREIGN KEY (`tipo`)
    REFERENCES `hstw`.`tipos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`tarjetas_personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`tarjetas_personas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `tipo` VARCHAR(45) NULL,
  `id_personas` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personas_idx` (`id_personas` ASC),
  CONSTRAINT `fk_personas_3`
    FOREIGN KEY (`id_personas`)
    REFERENCES `hstw`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`credito_copy1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`credito_copy1` (
  `id` INT(11) NOT NULL,
  `id_persona` INT(11) NULL DEFAULT NULL,
  `prestamo` INT(11) NULL DEFAULT NULL,
  `años` INT(11) NULL DEFAULT NULL,
  `interes` INT(11) NULL DEFAULT NULL,
  `tipo_pago` VARCHAR(45) NULL DEFAULT NULL,
  `pago` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personas_idx` (`id_persona` ASC),
  CONSTRAINT `fk_personas0`
    FOREIGN KEY (`id_persona`)
    REFERENCES `hstw`.`personas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `hstw`.`direcciones_buro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`direcciones_buro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `calle` VARCHAR(45) NULL,
  `numero` INT NULL,
  `calles` VARCHAR(45) NULL,
  `cp` INT NULL,
  `colonia` VARCHAR(45) NULL,
  `ciudad` VARCHAR(45) NULL,
  `estado` VARCHAR(45) NULL,
  `pais` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `hstw`.`buro_credito`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `hstw`.`buro_credito` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `folio_consulta` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_p` VARCHAR(45) NULL DEFAULT NULL,
  `apellido_m` VARCHAR(45) NULL DEFAULT NULL,
  `fecha_nacimiento` DATE NULL DEFAULT NULL,
  `rfc` VARCHAR(45) NULL DEFAULT NULL,
  `id_direcciones` INT NULL,
  `adeudo` INT NULL,
  `id_instutuion` INT NULL,
  `estado` VARCHAR(45) NULL,
  `comportamiento` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_direcciones_buro_idx` (`id_direcciones` ASC),
  INDEX `fk_institucion_buro_idx` (`id_instutuion` ASC),
  CONSTRAINT `fk_direcciones_buro`
    FOREIGN KEY (`id_direcciones`)
    REFERENCES `hstw`.`direcciones_buro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_institucion_buro`
    FOREIGN KEY (`id_instutuion`)
    REFERENCES `hstw`.`instituciones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
administradores