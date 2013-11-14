-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- MÃ¡quina: 127.0.0.1
-- Data de CriaÃ§Ã£o: 14-Nov-2013 Ã s 21:42
-- VersÃ£o do servidor: 5.5.32
-- versÃ£o do PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `unievents`
--
CREATE DATABASE IF NOT EXISTS `unievents` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `unievents`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cidadecol` varchar(45) NOT NULL,
  `estado_idestado` int(10) unsigned NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`estado_idestado`),
  KEY `fk_cidade_estado1_idx` (`estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `cidadecol`, `estado_idestado`, `estado_id`) VALUES
(1, 'Santa Maria', 0, 1),
(4, 'Porto Alegre', 1, 1),
(6, 'Pelotas', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conexoes`
--

CREATE TABLE IF NOT EXISTS `conexoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(17) NOT NULL,
  `senha` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `conexoes`
--

INSERT INTO `conexoes` (`id`, `login`, `senha`) VALUES
(1, 'usuario', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_meses`
--

CREATE TABLE IF NOT EXISTS `dia_meses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dia` int(11) NOT NULL,
  `dia_semana_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dia_mes_dia_semana1_idx` (`dia_semana_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dia_semanas`
--

CREATE TABLE IF NOT EXISTS `dia_semanas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(7) NOT NULL,
  `horario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dia_semana_horario1_idx` (`horario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rua` varchar(90) NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `complemento` varchar(90) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `cidade_id` int(10) unsigned NOT NULL,
  `cidade_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_endereco_cidade1_idx` (`cidade_id`,`cidade_estado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `uf` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`, `uf`) VALUES
(1, 'Rio Grande do Sul', 'RS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `data_ini` date NOT NULL,
  `data_fim` date NOT NULL,
  `tipo_evento` varchar(45) NOT NULL,
  `tema` varchar(45) NOT NULL,
  `vagas` int(11) NOT NULL,
  `duracao_horas` double NOT NULL,
  `aprovacao` tinyint(1) NOT NULL,
  `url` varchar(120) DEFAULT NULL,
  `endereco_id` int(10) unsigned NOT NULL,
  `imagem_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evento_endereco1_idx` (`endereco_id`),
  KEY `fk_evento_imagem1_idx` (`imagem_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento_has_usuarios`
--

CREATE TABLE IF NOT EXISTS `evento_has_usuarios` (
  `evento_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `usuario_pessoa_id` int(10) unsigned NOT NULL,
  `usuario_imagem_id` int(10) unsigned NOT NULL,
  `usuario_cidade_id` int(10) unsigned NOT NULL,
  `usuario_cidade_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`evento_id`,`usuario_id`,`usuario_pessoa_id`,`usuario_imagem_id`,`usuario_cidade_id`,`usuario_cidade_estado_id`),
  KEY `fk_evento_has_usuario_usuario1_idx` (`usuario_id`,`usuario_pessoa_id`,`usuario_imagem_id`,`usuario_cidade_id`,`usuario_cidade_estado_id`),
  KEY `fk_evento_has_usuario_evento1_idx` (`evento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hora_ini` varchar(5) NOT NULL,
  `hora_fim` varchar(5) NOT NULL,
  `programacao_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_horario_programacao1_idx` (`programacao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `caminho` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricoes`
--

CREATE TABLE IF NOT EXISTS `inscricoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_ini` date NOT NULL,
  `data_fim` date NOT NULL,
  `evento_id` int(10) unsigned NOT NULL,
  `tipo_inscricao_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inscricao_evento1_idx` (`evento_id`),
  KEY `fk_inscricao_tipo_inscricao1_idx` (`tipo_inscricao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `recado` varchar(190) DEFAULT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `usuario_pessoa_id` int(10) unsigned NOT NULL,
  `usuario_imagem_id` int(10) unsigned NOT NULL,
  `usuario_cidade_id` int(10) unsigned NOT NULL,
  `usuario_cidade_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mensagem_usuario1_idx` (`usuario_id`,`usuario_pessoa_id`,`usuario_imagem_id`,`usuario_cidade_id`,`usuario_cidade_estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `data` date NOT NULL,
  `evento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_noticia_evento1_idx` (`evento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  `forma` varchar(45) NOT NULL,
  `vencimento` date NOT NULL,
  `num_cartao` int(11) DEFAULT NULL,
  `cod_seg` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinadores`
--

CREATE TABLE IF NOT EXISTS `patrocinadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_patrocinador_endereco1_idx` (`endereco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinador_has_eventos`
--

CREATE TABLE IF NOT EXISTS `patrocinador_has_eventos` (
  `patrocinador_id` int(10) unsigned NOT NULL,
  `evento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`patrocinador_id`,`evento_id`),
  KEY `fk_patrocinador_has_evento_evento1_idx` (`evento_id`),
  KEY `fk_patrocinador_has_evento_patrocinador1_idx` (`patrocinador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programacoes`
--

CREATE TABLE IF NOT EXISTS `programacoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `palestrante` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_programacao_evento1_idx` (`evento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(13) DEFAULT NULL,
  `patrocinador_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `usuario_pessoa_id` int(10) unsigned NOT NULL,
  `usuario_imagem_id` int(10) unsigned NOT NULL,
  `usuario_cidade_id` int(10) unsigned NOT NULL,
  `usuario_cidade_estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_telefone_patrocinador1_idx` (`patrocinador_id`),
  KEY `fk_telefone_usuario1_idx` (`usuario_id`,`usuario_pessoa_id`,`usuario_imagem_id`,`usuario_cidade_id`,`usuario_cidade_estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_inscricoes`
--

CREATE TABLE IF NOT EXISTS `tipo_inscricoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pago` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `pagamento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_inscricao_pagamento1_idx` (`pagamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(110) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `data_nasc` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `email` varchar(90) NOT NULL,
  `instituicao` varchar(45) DEFAULT NULL,
  `tipo_user` varchar(45) NOT NULL,
  `end_rede_soc` varchar(120) DEFAULT NULL,
  `outro_contato_url` varchar(120) DEFAULT NULL,
  `pessoa_idpessoa` int(10) unsigned NOT NULL,
  `imagem_idimagem` int(10) unsigned NOT NULL,
  `cidade_idcidade` int(10) unsigned NOT NULL,
  `cidade_estado_idestado` int(10) unsigned NOT NULL,
  `cidade_id` int(10) unsigned NOT NULL,
  `cidade_estado_id` int(10) unsigned NOT NULL,
  `imagem_id` int(10) unsigned NOT NULL,
  `pessoa_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`pessoa_idpessoa`,`imagem_idimagem`,`cidade_idcidade`,`cidade_estado_idestado`),
  KEY `fk_usuario_cidade1_idx` (`cidade_id`,`cidade_estado_id`),
  KEY `fk_usuario_imagem1_idx` (`imagem_id`),
  KEY `fk_usuario_pessoa1_idx` (`pessoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_cidade_estado1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dia_meses`
--
ALTER TABLE `dia_meses`
  ADD CONSTRAINT `fk_dia_mes_dia_semana1` FOREIGN KEY (`dia_semana_id`) REFERENCES `dia_semanas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `dia_semanas`
--
ALTER TABLE `dia_semanas`
  ADD CONSTRAINT `fk_dia_semana_horario1` FOREIGN KEY (`horario_id`) REFERENCES `horarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `fk_endereco_cidade1` FOREIGN KEY (`cidade_id`, `cidade_estado_id`) REFERENCES `cidades` (`id`, `estado_idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_evento_endereco1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_imagem1` FOREIGN KEY (`imagem_id`) REFERENCES `imagens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `evento_has_usuarios`
--
ALTER TABLE `evento_has_usuarios`
  ADD CONSTRAINT `fk_evento_has_usuario_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_has_usuario_usuario1` FOREIGN KEY (`usuario_id`, `usuario_pessoa_id`, `usuario_imagem_id`, `usuario_cidade_id`, `usuario_cidade_estado_id`) REFERENCES `usuarios` (`id`, `pessoa_idpessoa`, `imagem_idimagem`, `cidade_idcidade`, `cidade_estado_idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `fk_horario_programacao1` FOREIGN KEY (`programacao_id`) REFERENCES `programacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD CONSTRAINT `fk_inscricao_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inscricao_tipo_inscricao1` FOREIGN KEY (`tipo_inscricao_id`) REFERENCES `tipo_inscricoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `fk_mensagem_usuario1` FOREIGN KEY (`usuario_id`, `usuario_pessoa_id`, `usuario_imagem_id`, `usuario_cidade_id`, `usuario_cidade_estado_id`) REFERENCES `usuarios` (`id`, `pessoa_idpessoa`, `imagem_idimagem`, `cidade_idcidade`, `cidade_estado_idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticia_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `patrocinadores`
--
ALTER TABLE `patrocinadores`
  ADD CONSTRAINT `fk_patrocinador_endereco1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `patrocinador_has_eventos`
--
ALTER TABLE `patrocinador_has_eventos`
  ADD CONSTRAINT `fk_patrocinador_has_evento_patrocinador1` FOREIGN KEY (`patrocinador_id`) REFERENCES `patrocinadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patrocinador_has_evento_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `programacoes`
--
ALTER TABLE `programacoes`
  ADD CONSTRAINT `fk_programacao_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_telefone_patrocinador1` FOREIGN KEY (`patrocinador_id`) REFERENCES `patrocinadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_telefone_usuario1` FOREIGN KEY (`usuario_id`, `usuario_pessoa_id`, `usuario_imagem_id`, `usuario_cidade_id`, `usuario_cidade_estado_id`) REFERENCES `usuarios` (`id`, `pessoa_idpessoa`, `imagem_idimagem`, `cidade_idcidade`, `cidade_estado_idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tipo_inscricoes`
--
ALTER TABLE `tipo_inscricoes`
  ADD CONSTRAINT `fk_tipo_inscricao_pagamento1` FOREIGN KEY (`pagamento_id`) REFERENCES `pagamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_cidade1` FOREIGN KEY (`cidade_id`, `cidade_estado_id`) REFERENCES `cidades` (`id`, `estado_idestado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_imagem1` FOREIGN KEY (`imagem_id`) REFERENCES `imagens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_pessoa1` FOREIGN KEY (`pessoa_id`) REFERENCES `conexoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
