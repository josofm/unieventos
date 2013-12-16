SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `uniEvents` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `uniEvents` ;

-- -----------------------------------------------------
-- Table `uniEvents`.`estados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`estados` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `uf` VARCHAR(3) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`cidades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`cidades` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `estado_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_cidades_estados1_idx` (`estado_id` ASC) ,
  CONSTRAINT `fk_cidades_estados1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `uniEvents`.`estados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(110) NOT NULL ,
  `sobrenome` VARCHAR(100) NULL ,
  `nivel` TINYINT NULL ,
  `cpf` VARCHAR(11) NOT NULL ,
  `rg` VARCHAR(10) NOT NULL ,
  `data_nasc` DATE NOT NULL ,
  `sexo` INT NOT NULL ,
  `email` VARCHAR(90) NOT NULL ,
  `senha` VARCHAR(255) NOT NULL ,
  `instituicao` VARCHAR(45) NULL ,
  `end_rede_soc` VARCHAR(120) NULL ,
  `outro_contato_url` VARCHAR(120) NULL ,
  `cidade_id` INT UNSIGNED NOT NULL ,
  `estado_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_usuarios_cidades1_idx` (`cidade_id` ASC, `estado_id` ASC) ,
  CONSTRAINT `fk_usuarios_cidades1`
    FOREIGN KEY (`cidade_id` , `estado_id` )
    REFERENCES `uniEvents`.`cidades` (`id` , `estado_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`enderecos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`enderecos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `rua` VARCHAR(90) NOT NULL ,
  `numero` INT NOT NULL ,
  `bairro` VARCHAR(45) NOT NULL ,
  `complemento` VARCHAR(90) NOT NULL ,
  `cep` VARCHAR(9) NOT NULL ,
  `cidade_id` INT UNSIGNED NOT NULL ,
  `estado_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_enderecos_cidades1_idx` (`cidade_id` ASC, `estado_id` ASC) ,
  CONSTRAINT `fk_enderecos_cidades1`
    FOREIGN KEY (`cidade_id` , `estado_id` )
    REFERENCES `uniEvents`.`cidades` (`id` , `estado_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`patrocinadores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`patrocinadores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(100) NOT NULL ,
  `endereco_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_patrocinador_endereco1_idx` (`endereco_id` ASC) ,
  CONSTRAINT `fk_patrocinador_endereco1`
    FOREIGN KEY (`endereco_id` )
    REFERENCES `uniEvents`.`enderecos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`telefones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`telefones` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `numero` VARCHAR(13) NULL ,
  `patrocinador_id` INT UNSIGNED NOT NULL ,
  `usuario_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_telefone_patrocinador1_idx` (`patrocinador_id` ASC) ,
  INDEX `fk_telefones_usuarios1_idx` (`usuario_id` ASC) ,
  CONSTRAINT `fk_telefone_patrocinador1`
    FOREIGN KEY (`patrocinador_id` )
    REFERENCES `uniEvents`.`patrocinadores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefones_usuarios1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `uniEvents`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`mensagens`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`mensagens` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(190) NULL ,
  `texto` TEXT NOT NULL ,
  `usuarios_msg` INT UNSIGNED NOT NULL ,
  `usuarios_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_mensagens_usuarios1_idx` (`usuarios_id` ASC) ,
  INDEX `fk_mensagens_usuarios2_idx` (`usuarios_msg` ASC) ,
  CONSTRAINT `fk_mensagens_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `uniEvents`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensagens_usuarios2`
    FOREIGN KEY (`usuarios_msg` )
    REFERENCES `uniEvents`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`eventos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`eventos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(90) NOT NULL ,
  `descricao` VARCHAR(120) NOT NULL ,
  `data_ini` DATE NOT NULL ,
  `data_fim` DATE NOT NULL ,
  `tipo_evento` VARCHAR(45) NOT NULL ,
  `tema` VARCHAR(45) NOT NULL ,
  `vagas` INT NOT NULL ,
  `duracao_horas` DOUBLE NOT NULL ,
  `aprovacao` TINYINT NOT NULL ,
  `url` VARCHAR(120) NULL ,
  `endereco_id` INT UNSIGNED NOT NULL ,
  `imagem_id` INT UNSIGNED NOT NULL ,
  `created`  NULL ,
  `modified`  NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_evento_endereco1_idx` (`endereco_id` ASC) ,
  CONSTRAINT `fk_evento_endereco1`
    FOREIGN KEY (`endereco_id` )
    REFERENCES `uniEvents`.`enderecos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`inscricoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`inscricoes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `data_ini` DATE NOT NULL ,
  `data_fim` DATE NOT NULL ,
  `paga` TINYINT NULL ,
  `created`  NULL ,
  `modified`  NULL ,
  `eventos_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_inscricoes_eventos1` (`eventos_id` ASC) ,
  CONSTRAINT `fk_inscricoes_eventos1`
    FOREIGN KEY (`eventos_id` )
    REFERENCES `uniEvents`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`pagamentos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`pagamentos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `valor` DOUBLE NOT NULL ,
  `forma` VARCHAR(45) NOT NULL ,
  `vencimento` DATE NOT NULL ,
  `num_cartao` INT NULL ,
  `cod_seg` INT(3) NULL ,
  `usuarios_id` INT UNSIGNED NOT NULL ,
  `eventos_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_pagamentos_usuarios1_idx` (`usuarios_id` ASC) ,
  INDEX `fk_pagamentos_eventos1_idx` (`eventos_id` ASC) ,
  CONSTRAINT `fk_pagamentos_usuarios1`
    FOREIGN KEY (`usuarios_id` )
    REFERENCES `uniEvents`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamentos_eventos1`
    FOREIGN KEY (`eventos_id` )
    REFERENCES `uniEvents`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`programacoes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`programacoes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `evento_id` INT UNSIGNED NOT NULL ,
  `titulo` VARCHAR(45) NOT NULL ,
  `descricao` VARCHAR(120) NULL ,
  `palestrante` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_programacao_evento1_idx` (`evento_id` ASC) ,
  CONSTRAINT `fk_programacao_evento1`
    FOREIGN KEY (`evento_id` )
    REFERENCES `uniEvents`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`cadastros`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`cadastros` (
  `evento_id` INT UNSIGNED NOT NULL ,
  `usuario_id` INT UNSIGNED NOT NULL ,
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `nivel` TINYINT(1) NULL DEFAULT 0 ,
  INDEX `fk_evento_has_usuario_evento1_idx` (`evento_id` ASC) ,
  INDEX `fk_evento_has_usuarios_usuarios1_idx` (`usuario_id` ASC) ,
  PRIMARY KEY (`id`, `evento_id`, `usuario_id`) ,
  CONSTRAINT `fk_evento_has_usuario_evento1`
    FOREIGN KEY (`evento_id` )
    REFERENCES `uniEvents`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_usuarios_usuarios1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `uniEvents`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`status_pagamento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`status_pagamento` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `status` TINYINT(1) NOT NULL ,
  `pagamento_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tipo_inscricao_pagamento1_idx` (`pagamento_id` ASC) ,
  CONSTRAINT `fk_tipo_inscricao_pagamento1`
    FOREIGN KEY (`pagamento_id` )
    REFERENCES `uniEvents`.`pagamentos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`noticias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`noticias` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NULL ,
  `descricao` VARCHAR(120) NULL ,
  `data` DATE NULL ,
  `evento_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_noticia_evento1_idx` (`evento_id` ASC) ,
  CONSTRAINT `fk_noticia_evento1`
    FOREIGN KEY (`evento_id` )
    REFERENCES `uniEvents`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`patrocinador_has_eventos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`patrocinador_has_eventos` (
  `patrocinador_id` INT UNSIGNED NOT NULL ,
  `evento_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`patrocinador_id`, `evento_id`) ,
  INDEX `fk_patrocinador_has_evento_evento1_idx` (`evento_id` ASC) ,
  INDEX `fk_patrocinador_has_evento_patrocinador1_idx` (`patrocinador_id` ASC) ,
  CONSTRAINT `fk_patrocinador_has_evento_patrocinador1`
    FOREIGN KEY (`patrocinador_id` )
    REFERENCES `uniEvents`.`patrocinadores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_patrocinador_has_evento_evento1`
    FOREIGN KEY (`evento_id` )
    REFERENCES `uniEvents`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`presencas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uniEvents`.`presencas` (
  `id` INT NOT NULL ,
  `status` TINYINT(1) NULL ,
  `data` DATE NULL ,
  `usuario_id` INT UNSIGNED NOT NULL ,
  `evento_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_presenca_usuarios1_idx` (`usuario_id` ASC) ,
  INDEX `fk_presenca_eventos1_idx` (`evento_id` ASC) ,
  CONSTRAINT `fk_presenca_usuarios1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `uniEvents`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_presenca_eventos1`
    FOREIGN KEY (`evento_id` )
    REFERENCES `uniEvents`.`eventos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
