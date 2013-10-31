SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `uniEvents` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `uniEvents` ;

-- -----------------------------------------------------
-- Table `uniEvents`.`conectar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`conectar` (
  `idconectar` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(17) NOT NULL,
  `senha` VARCHAR(17) NOT NULL,
  PRIMARY KEY (`idconectar`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`estado` (
  `idestado` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`idestado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`cidade` (
  `idcidade` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cidadecol` VARCHAR(45) NOT NULL,
  `estado_idestado` INT UNSIGNED NOT NULL,
  `estado_idestado1` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idcidade`, `estado_idestado`),
  INDEX `fk_cidade_estado1_idx` (`estado_idestado1` ASC),
  CONSTRAINT `fk_cidade_estado1`
    FOREIGN KEY (`estado_idestado1`)
    REFERENCES `uniEvents`.`estado` (`idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`imagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`imagem` (
  `idimagem` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `caminho` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`idimagem`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`usuario` (
  `idusuario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(110) NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `rg` VARCHAR(10) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `sexo` CHAR NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `instituicao` VARCHAR(45) NULL,
  `tipo_user` VARCHAR(45) NOT NULL,
  `end_rede_soc` VARCHAR(120) NULL,
  `outro_contato_url` VARCHAR(120) NULL,
  `pessoa_idpessoa` INT UNSIGNED NOT NULL,
  `imagem_idimagem` INT UNSIGNED NOT NULL,
  `cidade_idcidade` INT UNSIGNED NOT NULL,
  `cidade_estado_idestado` INT UNSIGNED NOT NULL,
  `cidade_idcidade1` INT UNSIGNED NOT NULL,
  `cidade_estado_idestado1` INT UNSIGNED NOT NULL,
  `imagem_idimagem1` INT UNSIGNED NOT NULL,
  `pessoa_idpessoa1` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idusuario`, `pessoa_idpessoa`, `imagem_idimagem`, `cidade_idcidade`, `cidade_estado_idestado`),
  INDEX `fk_usuario_cidade1_idx` (`cidade_idcidade1` ASC, `cidade_estado_idestado1` ASC),
  INDEX `fk_usuario_imagem1_idx` (`imagem_idimagem1` ASC),
  INDEX `fk_usuario_pessoa1_idx` (`pessoa_idpessoa1` ASC),
  CONSTRAINT `fk_usuario_cidade1`
    FOREIGN KEY (`cidade_idcidade1` , `cidade_estado_idestado1`)
    REFERENCES `uniEvents`.`cidade` (`idcidade` , `estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_imagem1`
    FOREIGN KEY (`imagem_idimagem1`)
    REFERENCES `uniEvents`.`imagem` (`idimagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_pessoa1`
    FOREIGN KEY (`pessoa_idpessoa1`)
    REFERENCES `uniEvents`.`conectar` (`idconectar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`endereco` (
  `idendereco` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(90) NOT NULL,
  `numero` INT NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `complemento` VARCHAR(90) NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `cidade_idcidade` INT UNSIGNED NOT NULL,
  `cidade_estado_idestado` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idendereco`),
  INDEX `fk_endereco_cidade1_idx` (`cidade_idcidade` ASC, `cidade_estado_idestado` ASC),
  CONSTRAINT `fk_endereco_cidade1`
    FOREIGN KEY (`cidade_idcidade` , `cidade_estado_idestado`)
    REFERENCES `uniEvents`.`cidade` (`idcidade` , `estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`patrocinador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`patrocinador` (
  `idpatrocinador` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `endereco_idendereco` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idpatrocinador`),
  INDEX `fk_patrocinador_endereco1_idx` (`endereco_idendereco` ASC),
  CONSTRAINT `fk_patrocinador_endereco1`
    FOREIGN KEY (`endereco_idendereco`)
    REFERENCES `uniEvents`.`endereco` (`idendereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`telefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`telefone` (
  `idtelefone` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(13) NULL,
  `patrocinador_idpatrocinador` INT UNSIGNED NOT NULL,
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  `usuario_pessoa_idpessoa` INT UNSIGNED NOT NULL,
  `usuario_imagem_idimagem` INT UNSIGNED NOT NULL,
  `usuario_cidade_idcidade` INT UNSIGNED NOT NULL,
  `usuario_cidade_estado_idestado` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idtelefone`),
  INDEX `fk_telefone_patrocinador1_idx` (`patrocinador_idpatrocinador` ASC),
  INDEX `fk_telefone_usuario1_idx` (`usuario_idusuario` ASC, `usuario_pessoa_idpessoa` ASC, `usuario_imagem_idimagem` ASC, `usuario_cidade_idcidade` ASC, `usuario_cidade_estado_idestado` ASC),
  CONSTRAINT `fk_telefone_patrocinador1`
    FOREIGN KEY (`patrocinador_idpatrocinador`)
    REFERENCES `uniEvents`.`patrocinador` (`idpatrocinador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefone_usuario1`
    FOREIGN KEY (`usuario_idusuario` , `usuario_pessoa_idpessoa` , `usuario_imagem_idimagem` , `usuario_cidade_idcidade` , `usuario_cidade_estado_idestado`)
    REFERENCES `uniEvents`.`usuario` (`idusuario` , `pessoa_idpessoa` , `imagem_idimagem` , `cidade_idcidade` , `cidade_estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`mensagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`mensagem` (
  `idmensagem` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `recado` VARCHAR(190) NULL,
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  `usuario_pessoa_idpessoa` INT UNSIGNED NOT NULL,
  `usuario_imagem_idimagem` INT UNSIGNED NOT NULL,
  `usuario_cidade_idcidade` INT UNSIGNED NOT NULL,
  `usuario_cidade_estado_idestado` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idmensagem`),
  INDEX `fk_mensagem_usuario1_idx` (`usuario_idusuario` ASC, `usuario_pessoa_idpessoa` ASC, `usuario_imagem_idimagem` ASC, `usuario_cidade_idcidade` ASC, `usuario_cidade_estado_idestado` ASC),
  CONSTRAINT `fk_mensagem_usuario1`
    FOREIGN KEY (`usuario_idusuario` , `usuario_pessoa_idpessoa` , `usuario_imagem_idimagem` , `usuario_cidade_idcidade` , `usuario_cidade_estado_idestado`)
    REFERENCES `uniEvents`.`usuario` (`idusuario` , `pessoa_idpessoa` , `imagem_idimagem` , `cidade_idcidade` , `cidade_estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`evento` (
  `idevento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NOT NULL,
  `descricao` VARCHAR(120) NOT NULL,
  `data_ini` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `tipo_evento` VARCHAR(45) NOT NULL,
  `tema` VARCHAR(45) NOT NULL,
  `vagas` INT NOT NULL,
  `duracao_horas` DOUBLE NOT NULL,
  `aprovacao` TINYINT(1) NOT NULL,
  `url` VARCHAR(120) NULL,
  `endereco_idendereco` INT UNSIGNED NOT NULL,
  `imagem_idimagem` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idevento`),
  INDEX `fk_evento_endereco1_idx` (`endereco_idendereco` ASC),
  INDEX `fk_evento_imagem1_idx` (`imagem_idimagem` ASC),
  CONSTRAINT `fk_evento_endereco1`
    FOREIGN KEY (`endereco_idendereco`)
    REFERENCES `uniEvents`.`endereco` (`idendereco`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_imagem1`
    FOREIGN KEY (`imagem_idimagem`)
    REFERENCES `uniEvents`.`imagem` (`idimagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`pagamento` (
  `idpagamento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `valor` DOUBLE NOT NULL,
  `forma` VARCHAR(45) NOT NULL,
  `vencimento` DATE NOT NULL,
  `num_cartao` INT NULL,
  `cod_seg` INT(3) NULL,
  PRIMARY KEY (`idpagamento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`tipo_inscricao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`tipo_inscricao` (
  `idtipo_inscricao` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pago` TINYINT(1) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `pagamento_idpagamento` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idtipo_inscricao`),
  INDEX `fk_tipo_inscricao_pagamento1_idx` (`pagamento_idpagamento` ASC),
  CONSTRAINT `fk_tipo_inscricao_pagamento1`
    FOREIGN KEY (`pagamento_idpagamento`)
    REFERENCES `uniEvents`.`pagamento` (`idpagamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`inscricao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`inscricao` (
  `idinscricao` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_ini` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `evento_idevento` INT UNSIGNED NOT NULL,
  `tipo_inscricao_idtipo_inscricao` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idinscricao`),
  INDEX `fk_inscricao_evento1_idx` (`evento_idevento` ASC),
  INDEX `fk_inscricao_tipo_inscricao1_idx` (`tipo_inscricao_idtipo_inscricao` ASC),
  CONSTRAINT `fk_inscricao_evento1`
    FOREIGN KEY (`evento_idevento`)
    REFERENCES `uniEvents`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscricao_tipo_inscricao1`
    FOREIGN KEY (`tipo_inscricao_idtipo_inscricao`)
    REFERENCES `uniEvents`.`tipo_inscricao` (`idtipo_inscricao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`programacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`programacao` (
  `idprogramacao` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `evento_idevento` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(120) NOT NULL,
  `palestrante` VARCHAR(45) NULL,
  PRIMARY KEY (`idprogramacao`),
  INDEX `fk_programacao_evento1_idx` (`evento_idevento` ASC),
  CONSTRAINT `fk_programacao_evento1`
    FOREIGN KEY (`evento_idevento`)
    REFERENCES `uniEvents`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`evento_has_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`evento_has_usuario` (
  `evento_idevento` INT UNSIGNED NOT NULL,
  `usuario_idusuario` INT UNSIGNED NOT NULL,
  `usuario_pessoa_idpessoa` INT UNSIGNED NOT NULL,
  `usuario_imagem_idimagem` INT UNSIGNED NOT NULL,
  `usuario_cidade_idcidade` INT UNSIGNED NOT NULL,
  `usuario_cidade_estado_idestado` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`evento_idevento`, `usuario_idusuario`, `usuario_pessoa_idpessoa`, `usuario_imagem_idimagem`, `usuario_cidade_idcidade`, `usuario_cidade_estado_idestado`),
  INDEX `fk_evento_has_usuario_usuario1_idx` (`usuario_idusuario` ASC, `usuario_pessoa_idpessoa` ASC, `usuario_imagem_idimagem` ASC, `usuario_cidade_idcidade` ASC, `usuario_cidade_estado_idestado` ASC),
  INDEX `fk_evento_has_usuario_evento1_idx` (`evento_idevento` ASC),
  CONSTRAINT `fk_evento_has_usuario_evento1`
    FOREIGN KEY (`evento_idevento`)
    REFERENCES `uniEvents`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_usuario_usuario1`
    FOREIGN KEY (`usuario_idusuario` , `usuario_pessoa_idpessoa` , `usuario_imagem_idimagem` , `usuario_cidade_idcidade` , `usuario_cidade_estado_idestado`)
    REFERENCES `uniEvents`.`usuario` (`idusuario` , `pessoa_idpessoa` , `imagem_idimagem` , `cidade_idcidade` , `cidade_estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`noticia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`noticia` (
  `idnoticia` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(120) NOT NULL,
  `data` DATE NOT NULL,
  `evento_idevento` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idnoticia`),
  INDEX `fk_noticia_evento1_idx` (`evento_idevento` ASC),
  CONSTRAINT `fk_noticia_evento1`
    FOREIGN KEY (`evento_idevento`)
    REFERENCES `uniEvents`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`horario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`horario` (
  `idhorario` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hora_ini` VARCHAR(5) NOT NULL,
  `hora_fim` VARCHAR(5) NOT NULL,
  `programacao_idprogramacao` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idhorario`),
  INDEX `fk_horario_programacao1_idx` (`programacao_idprogramacao` ASC),
  CONSTRAINT `fk_horario_programacao1`
    FOREIGN KEY (`programacao_idprogramacao`)
    REFERENCES `uniEvents`.`programacao` (`idprogramacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`dia_semana`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`dia_semana` (
  `iddia_semana` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(7) NOT NULL,
  `horario_idhorario` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`iddia_semana`),
  INDEX `fk_dia_semana_horario1_idx` (`horario_idhorario` ASC),
  CONSTRAINT `fk_dia_semana_horario1`
    FOREIGN KEY (`horario_idhorario`)
    REFERENCES `uniEvents`.`horario` (`idhorario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`dia_mes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`dia_mes` (
  `iddia_mes` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `dia` INT NOT NULL,
  `dia_semana_iddia_semana` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`iddia_mes`),
  INDEX `fk_dia_mes_dia_semana1_idx` (`dia_semana_iddia_semana` ASC),
  CONSTRAINT `fk_dia_mes_dia_semana1`
    FOREIGN KEY (`dia_semana_iddia_semana`)
    REFERENCES `uniEvents`.`dia_semana` (`iddia_semana`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`patrocinador_has_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`patrocinador_has_evento` (
  `patrocinador_idpatrocinador` INT UNSIGNED NOT NULL,
  `evento_idevento` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`patrocinador_idpatrocinador`, `evento_idevento`),
  INDEX `fk_patrocinador_has_evento_evento1_idx` (`evento_idevento` ASC),
  INDEX `fk_patrocinador_has_evento_patrocinador1_idx` (`patrocinador_idpatrocinador` ASC),
  CONSTRAINT `fk_patrocinador_has_evento_patrocinador1`
    FOREIGN KEY (`patrocinador_idpatrocinador`)
    REFERENCES `uniEvents`.`patrocinador` (`idpatrocinador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_patrocinador_has_evento_evento1`
    FOREIGN KEY (`evento_idevento`)
    REFERENCES `uniEvents`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
