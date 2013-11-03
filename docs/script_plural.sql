SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `uniEvents` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `uniEvents` ;

-- -----------------------------------------------------
-- Table `uniEvents`.`conexoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`conexoes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(17) NOT NULL,
  `senha` VARCHAR(17) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`estados` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `uf` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`cidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`cidades` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `cidadecol` VARCHAR(45) NOT NULL,
  `estado_idestado` INT UNSIGNED NOT NULL,
  `estado_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `estado_idestado`),
  INDEX `fk_cidade_estado1_idx` (`estado_id` ASC),
  CONSTRAINT `fk_cidade_estado1`
    FOREIGN KEY (`estado_id`)
    REFERENCES `uniEvents`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`imagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`imagens` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `caminho` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `cidade_id` INT UNSIGNED NOT NULL,
  `cidade_estado_id` INT UNSIGNED NOT NULL,
  `imagem_id` INT UNSIGNED NOT NULL,
  `pessoa_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `pessoa_idpessoa`, `imagem_idimagem`, `cidade_idcidade`, `cidade_estado_idestado`),
  INDEX `fk_usuario_cidade1_idx` (`cidade_id` ASC, `cidade_estado_id` ASC),
  INDEX `fk_usuario_imagem1_idx` (`imagem_id` ASC),
  INDEX `fk_usuario_pessoa1_idx` (`pessoa_id` ASC),
  CONSTRAINT `fk_usuario_cidade1`
    FOREIGN KEY (`cidade_id` , `cidade_estado_id`)
    REFERENCES `uniEvents`.`cidades` (`id` , `estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_imagem1`
    FOREIGN KEY (`imagem_id`)
    REFERENCES `uniEvents`.`imagens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_pessoa1`
    FOREIGN KEY (`pessoa_id`)
    REFERENCES `uniEvents`.`conexoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`enderecos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rua` VARCHAR(90) NOT NULL,
  `numero` INT NOT NULL,
  `bairro` VARCHAR(45) NOT NULL,
  `complemento` VARCHAR(90) NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `cidade_id` INT UNSIGNED NOT NULL,
  `cidade_estado_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_endereco_cidade1_idx` (`cidade_id` ASC, `cidade_estado_id` ASC),
  CONSTRAINT `fk_endereco_cidade1`
    FOREIGN KEY (`cidade_id` , `cidade_estado_id`)
    REFERENCES `uniEvents`.`cidades` (`id` , `estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`patrocinadores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`patrocinadores` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `endereco_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_patrocinador_endereco1_idx` (`endereco_id` ASC),
  CONSTRAINT `fk_patrocinador_endereco1`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `uniEvents`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`telefones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`telefones` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(13) NULL,
  `patrocinador_id` INT UNSIGNED NOT NULL,
  `usuario_id` INT UNSIGNED NOT NULL,
  `usuario_pessoa_id` INT UNSIGNED NOT NULL,
  `usuario_imagem_id` INT UNSIGNED NOT NULL,
  `usuario_cidade_id` INT UNSIGNED NOT NULL,
  `usuario_cidade_estado_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_telefone_patrocinador1_idx` (`patrocinador_id` ASC),
  INDEX `fk_telefone_usuario1_idx` (`usuario_id` ASC, `usuario_pessoa_id` ASC, `usuario_imagem_id` ASC, `usuario_cidade_id` ASC, `usuario_cidade_estado_id` ASC),
  CONSTRAINT `fk_telefone_patrocinador1`
    FOREIGN KEY (`patrocinador_id`)
    REFERENCES `uniEvents`.`patrocinadores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_telefone_usuario1`
    FOREIGN KEY (`usuario_id` , `usuario_pessoa_id` , `usuario_imagem_id` , `usuario_cidade_id` , `usuario_cidade_estado_id`)
    REFERENCES `uniEvents`.`usuarios` (`id` , `pessoa_idpessoa` , `imagem_idimagem` , `cidade_idcidade` , `cidade_estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`mensagens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`mensagens` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `recado` VARCHAR(190) NULL,
  `usuario_id` INT UNSIGNED NOT NULL,
  `usuario_pessoa_id` INT UNSIGNED NOT NULL,
  `usuario_imagem_id` INT UNSIGNED NOT NULL,
  `usuario_cidade_id` INT UNSIGNED NOT NULL,
  `usuario_cidade_estado_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_mensagem_usuario1_idx` (`usuario_id` ASC, `usuario_pessoa_id` ASC, `usuario_imagem_id` ASC, `usuario_cidade_id` ASC, `usuario_cidade_estado_id` ASC),
  CONSTRAINT `fk_mensagem_usuario1`
    FOREIGN KEY (`usuario_id` , `usuario_pessoa_id` , `usuario_imagem_id` , `usuario_cidade_id` , `usuario_cidade_estado_id`)
    REFERENCES `uniEvents`.`usuarios` (`id` , `pessoa_idpessoa` , `imagem_idimagem` , `cidade_idcidade` , `cidade_estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`eventos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
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
  `endereco_id` INT UNSIGNED NOT NULL,
  `imagem_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_evento_endereco1_idx` (`endereco_id` ASC),
  INDEX `fk_evento_imagem1_idx` (`imagem_id` ASC),
  CONSTRAINT `fk_evento_endereco1`
    FOREIGN KEY (`endereco_id`)
    REFERENCES `uniEvents`.`enderecos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_imagem1`
    FOREIGN KEY (`imagem_id`)
    REFERENCES `uniEvents`.`imagens` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`pagamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`pagamentos` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `valor` DOUBLE NOT NULL,
  `forma` VARCHAR(45) NOT NULL,
  `vencimento` DATE NOT NULL,
  `num_cartao` INT NULL,
  `cod_seg` INT(3) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`tipo_inscricoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`tipo_inscricoes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `pago` TINYINT(1) NOT NULL,
  `status` TINYINT(1) NOT NULL,
  `pagamento_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tipo_inscricao_pagamento1_idx` (`pagamento_id` ASC),
  CONSTRAINT `fk_tipo_inscricao_pagamento1`
    FOREIGN KEY (`pagamento_id`)
    REFERENCES `uniEvents`.`pagamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`inscricoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`inscricoes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_ini` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `evento_id` INT UNSIGNED NOT NULL,
  `tipo_inscricao_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_inscricao_evento1_idx` (`evento_id` ASC),
  INDEX `fk_inscricao_tipo_inscricao1_idx` (`tipo_inscricao_id` ASC),
  CONSTRAINT `fk_inscricao_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `uniEvents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscricao_tipo_inscricao1`
    FOREIGN KEY (`tipo_inscricao_id`)
    REFERENCES `uniEvents`.`tipo_inscricoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`programacoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`programacoes` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `evento_id` INT UNSIGNED NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(120) NOT NULL,
  `palestrante` VARCHAR(45) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_programacao_evento1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_programacao_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `uniEvents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`evento_has_usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`evento_has_usuarios` (
  `evento_id` INT UNSIGNED NOT NULL,
  `usuario_id` INT UNSIGNED NOT NULL,
  `usuario_pessoa_id` INT UNSIGNED NOT NULL,
  `usuario_imagem_id` INT UNSIGNED NOT NULL,
  `usuario_cidade_id` INT UNSIGNED NOT NULL,
  `usuario_cidade_estado_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`evento_id`, `usuario_id`, `usuario_pessoa_id`, `usuario_imagem_id`, `usuario_cidade_id`, `usuario_cidade_estado_id`),
  INDEX `fk_evento_has_usuario_usuario1_idx` (`usuario_id` ASC, `usuario_pessoa_id` ASC, `usuario_imagem_id` ASC, `usuario_cidade_id` ASC, `usuario_cidade_estado_id` ASC),
  INDEX `fk_evento_has_usuario_evento1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_evento_has_usuario_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `uniEvents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_evento_has_usuario_usuario1`
    FOREIGN KEY (`usuario_id` , `usuario_pessoa_id` , `usuario_imagem_id` , `usuario_cidade_id` , `usuario_cidade_estado_id`)
    REFERENCES `uniEvents`.`usuarios` (`id` , `pessoa_idpessoa` , `imagem_idimagem` , `cidade_idcidade` , `cidade_estado_idestado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`noticias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`noticias` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(120) NOT NULL,
  `data` DATE NOT NULL,
  `evento_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_noticia_evento1_idx` (`evento_id` ASC),
  CONSTRAINT `fk_noticia_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `uniEvents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`horarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`horarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `hora_ini` VARCHAR(5) NOT NULL,
  `hora_fim` VARCHAR(5) NOT NULL,
  `programacao_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_horario_programacao1_idx` (`programacao_id` ASC),
  CONSTRAINT `fk_horario_programacao1`
    FOREIGN KEY (`programacao_id`)
    REFERENCES `uniEvents`.`programacoes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`dia_semanas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`dia_semanas` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(7) NOT NULL,
  `horario_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dia_semana_horario1_idx` (`horario_id` ASC),
  CONSTRAINT `fk_dia_semana_horario1`
    FOREIGN KEY (`horario_id`)
    REFERENCES `uniEvents`.`horarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`dia_meses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`dia_meses` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `dia` INT NOT NULL,
  `dia_semana_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_dia_mes_dia_semana1_idx` (`dia_semana_id` ASC),
  CONSTRAINT `fk_dia_mes_dia_semana1`
    FOREIGN KEY (`dia_semana_id`)
    REFERENCES `uniEvents`.`dia_semanas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `uniEvents`.`patrocinador_has_eventos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `uniEvents`.`patrocinador_has_eventos` (
  `patrocinador_id` INT UNSIGNED NOT NULL,
  `evento_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`patrocinador_id`, `evento_id`),
  INDEX `fk_patrocinador_has_evento_evento1_idx` (`evento_id` ASC),
  INDEX `fk_patrocinador_has_evento_patrocinador1_idx` (`patrocinador_id` ASC),
  CONSTRAINT `fk_patrocinador_has_evento_patrocinador1`
    FOREIGN KEY (`patrocinador_id`)
    REFERENCES `uniEvents`.`patrocinadores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_patrocinador_has_evento_evento1`
    FOREIGN KEY (`evento_id`)
    REFERENCES `uniEvents`.`eventos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
