SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `unievents` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `unievents` ;

-- -----------------------------------------------------
-- Table `unievents`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`estados` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`cidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`cidades` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `estado_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cidades_estados1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_cidades_estados1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `unievents`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9715
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`usuarios` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NULL DEFAULT NULL,
  `sobrenome` VARCHAR(100) NOT NULL,
  `foto` VARCHAR(255) NOT NULL,
  `pasta` VARCHAR(255) NOT NULL,
  `mimetype` VARCHAR(255) NOT NULL,
  `tamanho` INT(11) NOT NULL,
  `nivel` TINYINT(1) NOT NULL DEFAULT '0',
  `cpf` VARCHAR(11) NULL DEFAULT NULL,
  `rg` VARCHAR(10) NULL DEFAULT NULL,
  `data_nasc` DATE NULL DEFAULT NULL,
  `sexo` INT(11) NULL DEFAULT NULL,
  `email` VARCHAR(90) NULL DEFAULT NULL,
  `senha` VARCHAR(255) NULL DEFAULT NULL,
  `instituicao` VARCHAR(45) NULL DEFAULT NULL,
  `end_rede_soc` VARCHAR(120) NULL DEFAULT NULL,
  `outro_contato_url` VARCHAR(120) NULL DEFAULT NULL,
  `cidade_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuarios_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_usuarios_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `unievents`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`enderecos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(90) NOT NULL,
  `numero` INT(11) NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `complemento` VARCHAR(90) NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `cidade_id` INT(10) UNSIGNED NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_enderecos_cidades1_idx` (`cidade_id` ASC),
  CONSTRAINT `fk_enderecos_cidades1`
    FOREIGN KEY (`cidade_id`)
    REFERENCES `unievents`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`imagens` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `caminho` VARCHAR(120) NULL DEFAULT NULL,
  `usuario_id` INT(10) UNSIGNED NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_imagens_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_imagens_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `unievents`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`eventos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NULL DEFAULT NULL,
  `descricao` VARCHAR(120) NULL DEFAULT NULL,
  `data_ini` DATE NULL DEFAULT NULL,
  `data_fim` DATE NULL DEFAULT NULL,
  `tipo_evento` VARCHAR(45) NULL DEFAULT NULL,
  `tema` VARCHAR(45) NULL DEFAULT NULL,
  `vagas` INT(11) NULL DEFAULT NULL,
  `duracao_horas` DOUBLE NULL DEFAULT NULL,
  `aprovacao` TINYINT(1) NULL DEFAULT '0',
  `url` VARCHAR(120) NULL DEFAULT NULL,
  `endereco_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `imagem_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_evento_endereco1_idx` (`endereco_id` ASC),
  INDEX `fk_evento_imagem1_idx` (`imagem_id` ASC),
  CONSTRAINT `fk_evento_endereco1`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `unievents`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_imagem1`
    FOREIGN KEY (`imagem_id`)
    REFERENCES `unievents`.`imagens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`cadastros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`cadastros` (
  `evento_id` INT(10) UNSIGNED NOT NULL,
  `usuario_id` INT(10) UNSIGNED NOT NULL,
  `nivel` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`evento_id`, `usuario_id`),
  INDEX `fk_evento_has_usuario_evento1_idx` (`evento_id` ASC),
  INDEX `fk_evento_has_usuarios_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_evento_has_usuarios_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `unievents`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_usuario_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `unievents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`inscricoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`inscricoes` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `data_ini` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `paga` TINYINT(1) NOT NULL,
  `valor` DOUBLE NOT NULL,
  `evento_id` INT(10) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `eventos_id` (`evento_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `unievents`.`msgs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`msgs` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(190) NULL DEFAULT NULL,
  `texto` TEXT NULL DEFAULT NULL,
  `status` INT(11) NOT NULL DEFAULT '0',
  `usuario_msg` INT(11) NOT NULL,
  `usuarios_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_mensagens_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_mensagens_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `unievents`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`noticias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`noticias` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` VARCHAR(120) NULL DEFAULT NULL,
  `data` DATE NULL DEFAULT NULL,
  `evento_id` INT(10) UNSIGNED NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_noticia_evento1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_noticia_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `unievents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`pagamentos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `valor` DOUBLE NOT NULL,
  `forma` VARCHAR(45) NOT NULL,
  `vencimento` DATE NOT NULL,
  `num_cartao` INT(11) NULL DEFAULT NULL,
  `cod_seg` INT(3) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  `usuarios_id` INT(10) NOT NULL,
  `eventos_id` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `usuarios_id` (`usuarios_id` ASC),
  INDEX `eventos_id` (`eventos_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`patrocinadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`patrocinadores` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `endereco_id` INT(10) UNSIGNED NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_patrocinador_endereco1_idx` (`endereco_id` ASC),
  CONSTRAINT `fk_patrocinador_endereco1`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `unievents`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`patrocinador_has_eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`patrocinador_has_eventos` (
  `patrocinador_id` INT(10) UNSIGNED NOT NULL,
  `evento_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`patrocinador_id`, `evento_id`),
  INDEX `fk_patrocinador_has_evento_evento1_idx` (`evento_id` ASC),
  INDEX `fk_patrocinador_has_evento_patrocinador1_idx` (`patrocinador_id` ASC),
  CONSTRAINT `fk_patrocinador_has_evento_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `unievents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_patrocinador_has_evento_patrocinador1`
    FOREIGN KEY (`patrocinador_id`)
    REFERENCES `unievents`.`patrocinadores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`programacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`programacoes` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `evento_id` INT(10) UNSIGNED NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(120) NULL DEFAULT NULL,
  `palestrante` VARCHAR(45) NULL DEFAULT NULL,
  `local` VARCHAR(50) NOT NULL,
  `sala` VARCHAR(10) NOT NULL,
  `data` DATE NOT NULL,
  `hora_ini` TIME NOT NULL,
  `hora_fim` TIME NOT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_programacao_evento1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_programacao_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `unievents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`presencas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`presencas` (
  `id` INT(11) NOT NULL,
  `status` TINYINT(1) NULL DEFAULT NULL,
  `created` DATETIME NULL DEFAULT NULL,
  `modified` DATETIME NULL,
  `programacoes_id` INT(10) UNSIGNED NOT NULL,
  `cadastros_evento_id` INT(10) UNSIGNED NOT NULL,
  `cadastros_usuario_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_presencas_programacoes1_idx` (`programacoes_id` ASC),
  INDEX `fk_presencas_cadastros1_idx` (`cadastros_evento_id` ASC, `cadastros_usuario_id` ASC),
  CONSTRAINT `fk_presencas_programacoes1`
    FOREIGN KEY (`programacoes_id`)
    REFERENCES `unievents`.`programacoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_presencas_cadastros1`
    FOREIGN KEY (`cadastros_evento_id` , `cadastros_usuario_id`)
    REFERENCES `unievents`.`cadastros` (`evento_id` , `usuario_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `unievents`.`status_pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`status_pagamentos` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` TINYINT(1) NOT NULL,
  `pagamento_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tipo_inscricao_pagamento1_idx` (`pagamento_id` ASC),
  CONSTRAINT `fk_tipo_inscricao_pagamento1`
    FOREIGN KEY (`pagamento_id`)
    REFERENCES `unievents`.`pagamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `unievents`.`telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `unievents`.`telefones` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(13) NULL DEFAULT NULL,
  `patrocinador_id` INT(10) UNSIGNED NOT NULL,
  `usuario_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_telefone_patrocinador1_idx` (`patrocinador_id` ASC),
  INDEX `fk_telefones_usuarios1_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_telefones_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `unievents`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefone_patrocinador1`
    FOREIGN KEY (`patrocinador_id`)
    REFERENCES `unievents`.`patrocinadores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
