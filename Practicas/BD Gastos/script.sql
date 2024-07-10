-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema finanzas
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema finanzas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `finanzas` DEFAULT CHARACTER SET utf8 ;
USE `finanzas` ;

-- -----------------------------------------------------
-- Table `finanzas`.`ocupacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finanzas`.`ocupacion` (
  `clave` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`clave`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `finanzas`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finanzas`.`usuario` (
  `correo` VARCHAR(60) NOT NULL,
  `paterno` VARCHAR(45) NOT NULL,
  `materno` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `telefono` CHAR(10) NULL,
  `codigo_postal` CHAR(5) NULL,
  `password` VARCHAR(45) NOT NULL,
  `ocupacion_clave` INT NOT NULL,
  PRIMARY KEY (`correo`),
  INDEX `fk_usuario_ocupacion_idx` (`ocupacion_clave` ASC),
  CONSTRAINT `fk_usuario_ocupacion`
    FOREIGN KEY (`ocupacion_clave`)
    REFERENCES `finanzas`.`ocupacion` (`clave`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `finanzas`.`tipo_gasto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finanzas`.`tipo_gasto` (
  `descripcion` VARCHAR(45) NOT NULL,
  `usuario_correo` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`descripcion`, `usuario_correo`),
  INDEX `fk_tipo_gasto_usuario1_idx` (`usuario_correo` ASC),
  CONSTRAINT `fk_tipo_gasto_usuario1`
    FOREIGN KEY (`usuario_correo`)
    REFERENCES `finanzas`.`usuario` (`correo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `finanzas`.`gasto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `finanzas`.`gasto` (
  `id_gasto` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(255) NOT NULL,
  `monto` VARCHAR(45) NOT NULL,
  `fecha` DATE NOT NULL,
  `lugar` VARCHAR(100) NULL,
  `tipo_gasto_id_tipo` INT NOT NULL,
  `tipo_gasto_descripcion` VARCHAR(45) NOT NULL,
  `tipo_gasto_usuario_correo` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id_gasto`),
  INDEX `fk_gasto_tipo_gasto1_idx` (`tipo_gasto_descripcion` ASC, `tipo_gasto_usuario_correo` ASC),
  CONSTRAINT `fk_gasto_tipo_gasto1`
    FOREIGN KEY (`tipo_gasto_descripcion` , `tipo_gasto_usuario_correo`)
    REFERENCES `finanzas`.`tipo_gasto` (`descripcion` , `usuario_correo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
