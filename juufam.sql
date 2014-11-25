SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `juufam` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `juufam` ;

-- -----------------------------------------------------
-- Table `juufam`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`evento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `data_ini_event` DATE NOT NULL,
  `data_end_event` DATE NOT NULL,
  `data_ini_insc` DATE NOT NULL,
  `data_end_insc` DATE NOT NULL,
  `cert_conc_path` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`unidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`unidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`chapa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`chapa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `id_evento` INT NOT NULL,
  `id_unidade` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_evento_idx` (`id_evento` ASC),
  INDEX `id_unidade_idx` (`id_unidade` ASC),
  CONSTRAINT `id_evento`
    FOREIGN KEY (`id_evento`)
    REFERENCES `juufam`.`evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_unidade`
    FOREIGN KEY (`id_unidade`)
    REFERENCES `juufam`.`unidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `id_tipo_usuario` ENUM('representante', 'admin') NOT NULL,
  `id_chapa` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_chapa_idx` (`id_chapa` ASC),
  CONSTRAINT `id_chapa`
    FOREIGN KEY (`id_chapa`)
    REFERENCES `juufam`.`chapa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`instituto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`instituto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` TEXT(100) NOT NULL,
  `id_uni` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_uni_idx` (`id_uni` ASC),
  CONSTRAINT `id_uni`
    FOREIGN KEY (`id_uni`)
    REFERENCES `juufam`.`unidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`curso` (
  `id` VARCHAR(12) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `id_instituto` INT NOT NULL,
  `id_unidade` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_instituto_idx` (`id_instituto` ASC),
  INDEX `id_unidade_idx` (`id_unidade` ASC),
  CONSTRAINT `id_instituto`
    FOREIGN KEY (`id_instituto`)
    REFERENCES `juufam`.`instituto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_unidade_curso`
    FOREIGN KEY (`id_unidade`)
    REFERENCES `juufam`.`unidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`atleta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`atleta` (
  `matricula` VARCHAR(8) NULL,
  `cpf` VARCHAR(11) NULL,
  `rg` VARCHAR(255) NULL,
  `nome` VARCHAR(45) NOT NULL,
  `data_nasc` VARCHAR(45) NOT NULL,
  `genero` ENUM('feminino','masculino') NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `tipo_atleta` ENUM('egresso','funcionario', 'ativo') NOT NULL,
  `id_curso` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_curso_idx` (`id_curso` ASC),
  CONSTRAINT `id_curso`
    FOREIGN KEY (`id_curso`)
    REFERENCES `juufam`.`curso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`modalidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`modalidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `tipo_modalidade` ENUM('coletivo','individual') NOT NULL,
  `min_inscr` INT NOT NULL,
  `max_inscr` INT NOT NULL,
  `genero` ENUM('masculino','feminino') NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`repr_atleta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`repr_atleta` (
  `id_repr` INT NOT NULL,
  `id_atleta` INT NOT NULL,
  `data` DATE NOT NULL,
  INDEX `id_repr_idx` (`id_repr` ASC),
  INDEX `id_atleta_idx` (`id_atleta` ASC),
  CONSTRAINT `id_atleta`
    FOREIGN KEY (`id_atleta`)
    REFERENCES `juufam`.`atleta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_repr`
    FOREIGN KEY (`id_repr`)
    REFERENCES `juufam`.`usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`atleta_modalidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`atleta_modalidade` (
  `id_atleta` INT NOT NULL,
  `id_modalidade` INT NOT NULL,
  `tipo_funcao` ENUM('atleta', 'tecnico') NOT NULL,
  INDEX `id_modalidade_idx` (`id_modalidade` ASC),
  INDEX `id_atleta_idx` (`id_atleta` ASC),
  CONSTRAINT `id_modalidade`
    FOREIGN KEY (`id_modalidade`)
    REFERENCES `juufam`.`modalidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_atleta_modalidade`
    FOREIGN KEY (`id_atleta`)
    REFERENCES `juufam`.`atleta` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `juufam`.`evento_modalidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `juufam`.`evento_modalidade` (
  `id_evento` INT NOT NULL,
  `id_modalidade` INT NOT NULL,
  INDEX `id_evento_idx` (`id_evento` ASC),
  INDEX `id_modalidade_idx` (`id_modalidade` ASC),
  CONSTRAINT `id_evento_modalidade`
    FOREIGN KEY (`id_evento`)
    REFERENCES `juufam`.`evento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_modalidade_evento`
    FOREIGN KEY (`id_modalidade`)
    REFERENCES `juufam`.`modalidade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
