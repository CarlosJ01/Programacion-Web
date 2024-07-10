-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema SACC
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SACC
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SACC` DEFAULT CHARACTER SET utf8 ;
USE `SACC` ;

-- -----------------------------------------------------
-- Table `SACC`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Usuario` (
  `numControl` VARCHAR(9) NOT NULL COMMENT 'Numero de control del usuario',
  `nombre` VARCHAR(45) NOT NULL COMMENT 'Nombre del usuario',
  `apePaterno` VARCHAR(45) NOT NULL COMMENT 'Apellido paterno del usuario',
  `apeMaterno` VARCHAR(45) NULL COMMENT 'Apellido materno del usuario',
  `e-mail` VARCHAR(50) NULL DEFAULT 'NoRegistro@SACC.com' COMMENT 'Correo electronico del usuario',
  `telefono` VARCHAR(10) NULL DEFAULT '0000000000' COMMENT 'Numero telefonico (Celular) del usuario',
  `password` VARCHAR(30) NOT NULL COMMENT 'Contraseña del Usuario',
  `estilo` VARCHAR(45) NULL DEFAULT 'claro' COMMENT 'Estilo para el formulario',
  PRIMARY KEY (`numControl`))
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Administrador` (
  `numControl` VARCHAR(9) NOT NULL COMMENT 'Numero de control del usuario',
  `tipo` CHAR NOT NULL DEFAULT 'S' COMMENT 'Tipo de administrador:\nP -> Principal\nS ->Secundario',
  PRIMARY KEY (`numControl`),
  CONSTRAINT `fk_Administrador_Usuario`
    FOREIGN KEY (`numControl`)
    REFERENCES `SACC`.`Usuario` (`numControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Carrera` (
  `idCarrera` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador de carrera',
  `carrera` VARCHAR(50) NOT NULL COMMENT 'Nombre de la carrera',
  PRIMARY KEY (`idCarrera`))
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Estatus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Estatus` (
  `idEstatus` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador del Estatus',
  `estatus` VARCHAR(45) NOT NULL COMMENT 'Que estatus es',
  PRIMARY KEY (`idEstatus`))
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Alumno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Alumno` (
  `numControl` VARCHAR(9) NOT NULL,
  `idCarrera` INT NOT NULL COMMENT 'Carrera que pertenece el alumno',
  `cargaEscolar` TEXT NOT NULL COMMENT 'Ruta del documento del kardex',
  `fchCargaEscolar` DATE NOT NULL,
  `idEstatus` INT NOT NULL COMMENT 'Estatus del alumno\n Nuevo\n Sin Actividad\n Subio credito\n Modifico credito\n Termino creditos\n Entrego Constancia',
  PRIMARY KEY (`numControl`),
  INDEX `fk_Alumno_Carrera1_idx` (`idCarrera` ASC),
  INDEX `fk_Alumno_Estatus1_idx` (`idEstatus` ASC),
  CONSTRAINT `fk_Alumno_Usuario1`
    FOREIGN KEY (`numControl`)
    REFERENCES `SACC`.`Usuario` (`numControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Alumno_Carrera1`
    FOREIGN KEY (`idCarrera`)
    REFERENCES `SACC`.`Carrera` (`idCarrera`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Alumno_Estatus1`
    FOREIGN KEY (`idEstatus`)
    REFERENCES `SACC`.`Estatus` (`idEstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Rubrica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Rubrica` (
  `idRubrica` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la vercion de la rubrica',
  `rubrica` TEXT NOT NULL COMMENT 'Ruta del archivo de la rubrica',
  `descripcion` TEXT NOT NULL COMMENT 'Descripcion del uso de la rubrica',
  PRIMARY KEY (`idRubrica`))
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Expediente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Expediente` (
  `numControl` VARCHAR(9) NOT NULL COMMENT 'Numero de control del alumno al que pertenece el expediente',
  `idEstatus` INT NOT NULL COMMENT 'Estatus del expediente\n Abierto\n Cerrado',
  `fchRegisto` DATE NOT NULL COMMENT 'Fecha en el que el usuario se registro y abrio expediente',
  `fchCompleto` DATE NULL,
  `fchCierre` DATE NULL COMMENT 'Fecha en la que se cierra el expediente',
  PRIMARY KEY (`numControl`),
  INDEX `fk_Expediente_Estatus1_idx` (`idEstatus` ASC),
  CONSTRAINT `fk_Expediente_Alumno1`
    FOREIGN KEY (`numControl`)
    REFERENCES `SACC`.`Alumno` (`numControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Expediente_Estatus1`
    FOREIGN KEY (`idEstatus`)
    REFERENCES `SACC`.`Estatus` (`idEstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Creditos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Creditos` (
  `idCredito` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador del credito',
  `actividad` TEXT NOT NULL COMMENT 'Descripcion de la actividad',
  `valor` INT NOT NULL DEFAULT '1' COMMENT 'Valor de la actividad',
  `numero` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`idCredito`))
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Registros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Registros` (
  `idRegistro` INT NOT NULL AUTO_INCREMENT COMMENT 'Identificador del registro',
  `idCredito` INT NOT NULL COMMENT 'Credito asociado a este registro para obtener la actividad y su valor',
  `fchInicio` DATE NOT NULL COMMENT 'Fecha de inicio de la activadad',
  `fchFin` DATE NOT NULL COMMENT 'Fecha de finalizacion de la activadad',
  `idEstatus` INT NOT NULL COMMENT 'Estatus del registro del credito\n En espera\n Valido\n No valido',
  `evidencia` TEXT NOT NULL COMMENT 'Ruta del documento con la evidencia',
  `rubrica` TEXT NOT NULL COMMENT 'Ruta del documento con la rubrica',
  `comentario` TEXT NOT NULL COMMENT 'Comentario, si el credito no es valido y se necesita comentar',
  PRIMARY KEY (`idRegistro`),
  INDEX `fk_Registros_Creditos1_idx` (`idCredito` ASC),
  INDEX `fk_Registros_Estatus1_idx` (`idEstatus` ASC),
  CONSTRAINT `fk_Registros_Creditos1`
    FOREIGN KEY (`idCredito`)
    REFERENCES `SACC`.`Creditos` (`idCredito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registros_Estatus1`
    FOREIGN KEY (`idEstatus`)
    REFERENCES `SACC`.`Estatus` (`idEstatus`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`Expediente-Registros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`Expediente-Registros` (
  `numControl` VARCHAR(9) NOT NULL COMMENT 'Numero de control del alumno al que pertenece el expediente',
  `idRegistro` INT NOT NULL COMMENT 'Identificador del registro del expediente',
  `fchRegistro` DATE NOT NULL COMMENT 'Fecha cuando se registro el nuevo registro',
  PRIMARY KEY (`numControl`, `idRegistro`),
  INDEX `fk_Expediente_has_Registros_Registros1_idx` (`idRegistro` ASC),
  INDEX `fk_Expediente_has_Registros_Expediente1_idx` (`numControl` ASC),
  CONSTRAINT `fk_Expediente_has_Registros_Expediente1`
    FOREIGN KEY (`numControl`)
    REFERENCES `SACC`.`Expediente` (`numControl`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Expediente_has_Registros_Registros1`
    FOREIGN KEY (`idRegistro`)
    REFERENCES `SACC`.`Registros` (`idRegistro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = INNODB;


-- -----------------------------------------------------
-- Table `SACC`.`CreditosInformacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SACC`.`CreditosInformacion` (
  `numero` VARCHAR(3) NOT NULL,
  `actividad` TEXT NOT NULL,
  `creditos` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`numero`))
ENGINE = INNODB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
