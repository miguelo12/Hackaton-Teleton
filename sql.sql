-- MySQL Script generated by MySQL Workbench
-- 08/18/16 23:36:39
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ideaton
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ideaton` ;

-- -----------------------------------------------------
-- Schema ideaton
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ideaton` DEFAULT CHARACTER SET utf8 ;
USE `ideaton` ;

-- -----------------------------------------------------
-- Table `ideaton`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ideaton`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `ideaton`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(15) NOT NULL,
  `Password` VARCHAR(50) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `IDfacebook` INT NULL,
  `IDtwitter` INT NULL,
  `Telefono` INT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ideaton`.`IDEA`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ideaton`.`IDEA` ;

CREATE TABLE IF NOT EXISTS `ideaton`.`IDEA` (
  `idIDEA` INT NOT NULL AUTO_INCREMENT,
  `Titulo` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(500) NOT NULL,
  `Problema` VARCHAR(200) NOT NULL,
  `Imagenes` VARCHAR(3000) NULL,
  `Video` VARCHAR(1000) NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idIDEA`),
  INDEX `fk_IDEA_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_IDEA_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `ideaton`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ideaton`.`Votos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ideaton`.`Votos` ;

CREATE TABLE IF NOT EXISTS `ideaton`.`Votos` (
  `Usuario_idUsuario` INT NOT NULL,
  `IDEA_idIDEA` INT NOT NULL,
  INDEX `fk_Votos_Usuario_idx` (`Usuario_idUsuario` ASC),
  INDEX `fk_Votos_IDEA1_idx` (`IDEA_idIDEA` ASC),
  CONSTRAINT `fk_Votos_Usuario`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `ideaton`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Votos_IDEA1`
    FOREIGN KEY (`IDEA_idIDEA`)
    REFERENCES `ideaton`.`IDEA` (`idIDEA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ideaton`.`Comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ideaton`.`Comentario` ;

CREATE TABLE IF NOT EXISTS `ideaton`.`Comentario` (
  `idComentario` INT NOT NULL AUTO_INCREMENT,
  `texto` VARCHAR(2500) NOT NULL,
  `IDEA_idIDEA` INT NOT NULL,
  `Usuario_idUsuario` INT NOT NULL,
  PRIMARY KEY (`idComentario`),
  INDEX `fk_Comentario_IDEA1_idx` (`IDEA_idIDEA` ASC),
  INDEX `fk_Comentario_Usuario1_idx` (`Usuario_idUsuario` ASC),
  CONSTRAINT `fk_Comentario_IDEA1`
    FOREIGN KEY (`IDEA_idIDEA`)
    REFERENCES `ideaton`.`IDEA` (`idIDEA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comentario_Usuario1`
    FOREIGN KEY (`Usuario_idUsuario`)
    REFERENCES `ideaton`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ideaton`.`Imagen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ideaton`.`Imagen` ;

CREATE TABLE IF NOT EXISTS `ideaton`.`Imagen` (
  `Ididea` INT NOT NULL,
  `imagen` VARCHAR(3000) NOT NULL,
  `IDEA_idIDEA` INT NOT NULL,
  INDEX `fk_Imagen_IDEA1_idx` (`IDEA_idIDEA` ASC),
  CONSTRAINT `fk_Imagen_IDEA1`
    FOREIGN KEY (`IDEA_idIDEA`)
    REFERENCES `ideaton`.`IDEA` (`idIDEA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
