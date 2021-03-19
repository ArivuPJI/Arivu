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

-- -----------------------------------------------------
-- Table `mydb`.`Docente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente` (
  `Codigo_Docente` INT NOT NULL,
  `CPF` VARCHAR(11) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Data_nasc` DATE NOT NULL,
  `Disciplina` VARCHAR(45) NOT NULL,
  `Telefone` VARCHAR(11) NOT NULL,
  `Colaborador` ENUM('Sim', 'Não') NOT NULL,
  `Login` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`Codigo_Docente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Instituicao` (
  `Codigo_Instituicao` INT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Endereço` VARCHAR(100) NOT NULL,
  `Telefone` VARCHAR(11) NOT NULL,
  `Email` VARCHAR(256) NOT NULL,
  `Login` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`Codigo_Instituicao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estudante` (
  `Codigo_Estudante` INT NOT NULL,
  `CPF` VARCHAR(11) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Data_nasc` DATE NOT NULL,
  `Nome_responsavel` VARCHAR(45) NOT NULL,
  `Telefone` VARCHAR(11) NOT NULL,
  `Email` VARCHAR(256) NOT NULL,
  `Login` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`Codigo_Estudante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente_Instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente_Instituicao` (
  `Docente_Codigo_Docente` INT NOT NULL,
  `Instituicao_Codigo_Instituicao` INT NOT NULL,
  INDEX `fk_Docente_Instituicao_Docente_idx` (`Docente_Codigo_Docente` ASC) VISIBLE,
  INDEX `fk_Docente_Instituicao_Instituicao1_idx` (`Instituicao_Codigo_Instituicao` ASC) VISIBLE,
  CONSTRAINT `fk_Docente_Instituicao_Docente`
    FOREIGN KEY (`Docente_Codigo_Docente`)
    REFERENCES `mydb`.`Docente` (`Codigo_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docente_Instituicao_Instituicao1`
    FOREIGN KEY (`Instituicao_Codigo_Instituicao`)
    REFERENCES `mydb`.`Instituicao` (`Codigo_Instituicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Aluno_Instituicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Aluno_Instituicao` (
  `Instituicao_Codigo_Instituicao` INT NOT NULL,
  `Estudante_Codigo_Estudante` INT NOT NULL,
  INDEX `fk_Aluno_Instituicao_Instituicao1_idx` (`Instituicao_Codigo_Instituicao` ASC) VISIBLE,
  INDEX `fk_Aluno_Instituicao_Estudante1_idx` (`Estudante_Codigo_Estudante` ASC) VISIBLE,
  CONSTRAINT `fk_Aluno_Instituicao_Instituicao1`
    FOREIGN KEY (`Instituicao_Codigo_Instituicao`)
    REFERENCES `mydb`.`Instituicao` (`Codigo_Instituicao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_Instituicao_Estudante1`
    FOREIGN KEY (`Estudante_Codigo_Estudante`)
    REFERENCES `mydb`.`Estudante` (`Codigo_Estudante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Feed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Feed` (
  `Codigo_post` INT NOT NULL,
  `Titulo` VARCHAR(45) NOT NULL,
  `Conteudo` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`Codigo_post`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Evento` (
  `Id_Evento` INT NOT NULL,
  `Data_inicio` DATETIME NOT NULL,
  `Data_termino` DATETIME NOT NULL,
  `Descricao` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`Id_Evento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Redacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Redacao` (
  `Id_redacao` INT NOT NULL,
  `Titulo` VARCHAR(45) NOT NULL,
  `Descricao` MEDIUMTEXT NOT NULL,
  `Correcao` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`Id_redacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente_Feed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente_Feed` (
  `Docente_Codigo_Docente` INT NULL,
  `Feed_Codigo_post` INT NOT NULL,
  INDEX `fk_Docente_Feed_Docente1_idx` (`Docente_Codigo_Docente` ASC) VISIBLE,
  INDEX `fk_Docente_Feed_Feed1_idx` (`Feed_Codigo_post` ASC) VISIBLE,
  CONSTRAINT `fk_Docente_Feed_Docente1`
    FOREIGN KEY (`Docente_Codigo_Docente`)
    REFERENCES `mydb`.`Docente` (`Codigo_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docente_Feed_Feed1`
    FOREIGN KEY (`Feed_Codigo_post`)
    REFERENCES `mydb`.`Feed` (`Codigo_post`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente_Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente_Evento` (
  `Docente_Codigo_Docente` INT NULL,
  `Evento_Id_Evento` INT NOT NULL,
  INDEX `fk_Docente_Evento_Docente1_idx` (`Docente_Codigo_Docente` ASC) VISIBLE,
  INDEX `fk_Docente_Evento_Evento1_idx` (`Evento_Id_Evento` ASC) VISIBLE,
  CONSTRAINT `fk_Docente_Evento_Docente1`
    FOREIGN KEY (`Docente_Codigo_Docente`)
    REFERENCES `mydb`.`Docente` (`Codigo_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docente_Evento_Evento1`
    FOREIGN KEY (`Evento_Id_Evento`)
    REFERENCES `mydb`.`Evento` (`Id_Evento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente_Corrige_Redacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente_Corrige_Redacao` (
  `Docente_Codigo_Docente` INT NULL,
  `Redacao_Id_redacao` INT NOT NULL,
  INDEX `fk_Docente_Redacao_Docente1_idx` (`Docente_Codigo_Docente` ASC) VISIBLE,
  INDEX `fk_Docente_Redacao_Redacao1_idx` (`Redacao_Id_redacao` ASC) VISIBLE,
  CONSTRAINT `fk_Docente_Redacao_Docente1`
    FOREIGN KEY (`Docente_Codigo_Docente`)
    REFERENCES `mydb`.`Docente` (`Codigo_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docente_Redacao_Redacao1`
    FOREIGN KEY (`Redacao_Id_redacao`)
    REFERENCES `mydb`.`Redacao` (`Id_redacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudante_Feed`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estudante_Feed` (
  `Estudante_Codigo_Estudante` INT NULL,
  `Feed_Codigo_post` INT NOT NULL,
  INDEX `fk_Estudante_Feed_Estudante1_idx` (`Estudante_Codigo_Estudante` ASC) VISIBLE,
  INDEX `fk_Estudante_Feed_Feed1_idx` (`Feed_Codigo_post` ASC) VISIBLE,
  CONSTRAINT `fk_Estudante_Feed_Estudante1`
    FOREIGN KEY (`Estudante_Codigo_Estudante`)
    REFERENCES `mydb`.`Estudante` (`Codigo_Estudante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudante_Feed_Feed1`
    FOREIGN KEY (`Feed_Codigo_post`)
    REFERENCES `mydb`.`Feed` (`Codigo_post`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudante_Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estudante_Evento` (
  `Estudante_Codigo_Estudante` INT NULL,
  `Evento_Id_Evento` INT NOT NULL,
  INDEX `fk_Estudante_Evento_Estudante1_idx` (`Estudante_Codigo_Estudante` ASC) VISIBLE,
  INDEX `fk_Estudante_Evento_Evento1_idx` (`Evento_Id_Evento` ASC) VISIBLE,
  CONSTRAINT `fk_Estudante_Evento_Estudante1`
    FOREIGN KEY (`Estudante_Codigo_Estudante`)
    REFERENCES `mydb`.`Estudante` (`Codigo_Estudante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudante_Evento_Evento1`
    FOREIGN KEY (`Evento_Id_Evento`)
    REFERENCES `mydb`.`Evento` (`Id_Evento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudante_Produz_Redacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estudante_Produz_Redacao` (
  `Estudante_Codigo_Estudante` INT NULL,
  `Redacao_Id_redacao` INT NOT NULL,
  INDEX `fk_Estudante_Redacao_Estudante1_idx` (`Estudante_Codigo_Estudante` ASC) VISIBLE,
  INDEX `fk_Estudante_Redacao_Redacao1_idx` (`Redacao_Id_redacao` ASC) VISIBLE,
  CONSTRAINT `fk_Estudante_Redacao_Estudante1`
    FOREIGN KEY (`Estudante_Codigo_Estudante`)
    REFERENCES `mydb`.`Estudante` (`Codigo_Estudante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudante_Redacao_Redacao1`
    FOREIGN KEY (`Redacao_Id_redacao`)
    REFERENCES `mydb`.`Redacao` (`Id_redacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Simulado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Simulado` (
  `Id_Simulado` INT NOT NULL,
  PRIMARY KEY (`Id_Simulado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente_Cria_Simulado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente_Cria_Simulado` (
  `Docente_Codigo_Docente` INT NULL,
  `Simulado_Id_Simulado` INT NULL,
  INDEX `fk_Docente_Cria_Simulado_Docente1_idx` (`Docente_Codigo_Docente` ASC) VISIBLE,
  INDEX `fk_Docente_Cria_Simulado_Simulado1_idx` (`Simulado_Id_Simulado` ASC) VISIBLE,
  CONSTRAINT `fk_Docente_Cria_Simulado_Docente1`
    FOREIGN KEY (`Docente_Codigo_Docente`)
    REFERENCES `mydb`.`Docente` (`Codigo_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docente_Cria_Simulado_Simulado1`
    FOREIGN KEY (`Simulado_Id_Simulado`)
    REFERENCES `mydb`.`Simulado` (`Id_Simulado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Estudante_Realiza_Simulado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Estudante_Realiza_Simulado` (
  `Estudante_Codigo_Estudante` INT NULL,
  `Simulado_Id_Simulado` INT NULL,
  INDEX `fk_Estudante_Realiza_Simulado_Estudante1_idx` (`Estudante_Codigo_Estudante` ASC) VISIBLE,
  INDEX `fk_Estudante_Realiza_Simulado_Simulado1_idx` (`Simulado_Id_Simulado` ASC) VISIBLE,
  CONSTRAINT `fk_Estudante_Realiza_Simulado_Estudante1`
    FOREIGN KEY (`Estudante_Codigo_Estudante`)
    REFERENCES `mydb`.`Estudante` (`Codigo_Estudante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Estudante_Realiza_Simulado_Simulado1`
    FOREIGN KEY (`Simulado_Id_Simulado`)
    REFERENCES `mydb`.`Simulado` (`Id_Simulado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Prova`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Prova` (
  `Id_Prova` INT NOT NULL,
  `Titulo` VARCHAR(45) NOT NULL,
  `Descricao` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`Id_Prova`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente_Prova`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente_Prova` (
  `Docente_Codigo_Docente` INT NOT NULL,
  `Prova_Id_Prova` INT NOT NULL,
  INDEX `fk_Docente_Prova_Docente1_idx` (`Docente_Codigo_Docente` ASC) VISIBLE,
  INDEX `fk_Docente_Prova_Prova1_idx` (`Prova_Id_Prova` ASC) VISIBLE,
  CONSTRAINT `fk_Docente_Prova_Docente1`
    FOREIGN KEY (`Docente_Codigo_Docente`)
    REFERENCES `mydb`.`Docente` (`Codigo_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docente_Prova_Prova1`
    FOREIGN KEY (`Prova_Id_Prova`)
    REFERENCES `mydb`.`Prova` (`Id_Prova`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Questao` (
  `Id_Questao` INT NOT NULL,
  `Descricao` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`Id_Questao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Docente_Questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Docente_Questao` (
  `Docente_Codigo_Docente` INT NULL,
  `Questao_Id_Questao` INT NOT NULL,
  INDEX `fk_Docente_Questao_Docente1_idx` (`Docente_Codigo_Docente` ASC) VISIBLE,
  INDEX `fk_Docente_Questao_Questao1_idx` (`Questao_Id_Questao` ASC) VISIBLE,
  CONSTRAINT `fk_Docente_Questao_Docente1`
    FOREIGN KEY (`Docente_Codigo_Docente`)
    REFERENCES `mydb`.`Docente` (`Codigo_Docente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Docente_Questao_Questao1`
    FOREIGN KEY (`Questao_Id_Questao`)
    REFERENCES `mydb`.`Questao` (`Id_Questao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Simulado_Questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Simulado_Questao` (
  `Simulado_Id_Simulado` INT NOT NULL,
  `Questao_Id_Questao` INT NULL,
  INDEX `fk_Simulado_Questao_Simulado1_idx` (`Simulado_Id_Simulado` ASC) VISIBLE,
  INDEX `fk_Simulado_Questao_Questao1_idx` (`Questao_Id_Questao` ASC) VISIBLE,
  CONSTRAINT `fk_Simulado_Questao_Simulado1`
    FOREIGN KEY (`Simulado_Id_Simulado`)
    REFERENCES `mydb`.`Simulado` (`Id_Simulado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Simulado_Questao_Questao1`
    FOREIGN KEY (`Questao_Id_Questao`)
    REFERENCES `mydb`.`Questao` (`Id_Questao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Prova_Questao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Prova_Questao` (
  `Prova_Id_Prova` INT NULL,
  `Questao_Id_Questao` INT NOT NULL,
  INDEX `fk_Prova_Questao_Prova1_idx` (`Prova_Id_Prova` ASC) VISIBLE,
  INDEX `fk_Prova_Questao_Questao1_idx` (`Questao_Id_Questao` ASC) VISIBLE,
  CONSTRAINT `fk_Prova_Questao_Prova1`
    FOREIGN KEY (`Prova_Id_Prova`)
    REFERENCES `mydb`.`Prova` (`Id_Prova`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Prova_Questao_Questao1`
    FOREIGN KEY (`Questao_Id_Questao`)
    REFERENCES `mydb`.`Questao` (`Id_Questao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Alternativa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Alternativa` (
  `Id_Alternativa` INT NOT NULL,
  `Descricao` VARCHAR(45) NOT NULL,
  `Correta` TINYINT NOT NULL,
  PRIMARY KEY (`Id_Alternativa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tema` (
  `Id_Tema` INT NOT NULL,
  `Descricao` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`Id_Tema`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Questao_Alternativa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Questao_Alternativa` (
  `Questao_Id_Questao` INT NULL,
  `Alternativa_Id_Alternativa` INT NOT NULL,
  INDEX `fk_Questao_Alternativa_Questao1_idx` (`Questao_Id_Questao` ASC) VISIBLE,
  INDEX `fk_Questao_Alternativa_Alternativa1_idx` (`Alternativa_Id_Alternativa` ASC) VISIBLE,
  CONSTRAINT `fk_Questao_Alternativa_Questao1`
    FOREIGN KEY (`Questao_Id_Questao`)
    REFERENCES `mydb`.`Questao` (`Id_Questao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Questao_Alternativa_Alternativa1`
    FOREIGN KEY (`Alternativa_Id_Alternativa`)
    REFERENCES `mydb`.`Alternativa` (`Id_Alternativa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Questao_Tema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Questao_Tema` (
  `Questao_Id_Questao` INT NOT NULL,
  `Tema_Id_Tema` INT NULL,
  INDEX `fk_Questao_Tema_Questao1_idx` (`Questao_Id_Questao` ASC) VISIBLE,
  INDEX `fk_Questao_Tema_Tema1_idx` (`Tema_Id_Tema` ASC) VISIBLE,
  CONSTRAINT `fk_Questao_Tema_Questao1`
    FOREIGN KEY (`Questao_Id_Questao`)
    REFERENCES `mydb`.`Questao` (`Id_Questao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Questao_Tema_Tema1`
    FOREIGN KEY (`Tema_Id_Tema`)
    REFERENCES `mydb`.`Tema` (`Id_Tema`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Disciplina` (
  `Id_Disciplina` INT NOT NULL,
  `Descricao` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`Id_Disciplina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Tema_Disciplina`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Tema_Disciplina` (
  `Tema_Id_Tema` INT NOT NULL,
  `Disciplina_Id_Disciplina` INT NULL,
  INDEX `fk_Tema_Disciplina_Tema1_idx` (`Tema_Id_Tema` ASC) VISIBLE,
  INDEX `fk_Tema_Disciplina_Disciplina1_idx` (`Disciplina_Id_Disciplina` ASC) VISIBLE,
  CONSTRAINT `fk_Tema_Disciplina_Tema1`
    FOREIGN KEY (`Tema_Id_Tema`)
    REFERENCES `mydb`.`Tema` (`Id_Tema`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tema_Disciplina_Disciplina1`
    FOREIGN KEY (`Disciplina_Id_Disciplina`)
    REFERENCES `mydb`.`Disciplina` (`Id_Disciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
