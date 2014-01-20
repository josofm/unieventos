-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 19/01/2014 às 11h47min
-- Versão do Servidor: 5.5.34
-- Versão do PHP: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `unievents`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros`
--

CREATE TABLE IF NOT EXISTS `cadastros` (
  `evento_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `nivel` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`evento_id`,`usuario_id`),
  KEY `fk_evento_has_usuario_evento1_idx` (`evento_id`),
  KEY `fk_evento_has_usuarios_usuarios1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastros`
--

INSERT INTO `cadastros` (`evento_id`, `usuario_id`, `nivel`) VALUES
(15, 2, 1),
(15, 3, 0),
(15, 4, 0),
(15, 5, 0),
(15, 6, 0),
(16, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `estado_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cidades_estados1_idx` (`estado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_enderecos_cidades1_idx` (`cidade_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `uf` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) DEFAULT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `data_ini` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `tipo_evento` varchar(45) DEFAULT NULL,
  `tema` varchar(45) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `duracao_horas` double DEFAULT NULL,
  `aprovacao` tinyint(1) DEFAULT '0',
  `url` varchar(120) DEFAULT NULL,
  `endereco_id` int(10) unsigned DEFAULT NULL,
  `imagem_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evento_endereco1_idx` (`endereco_id`),
  KEY `fk_evento_imagem1_idx` (`imagem_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `nome`, `descricao`, `data_ini`, `data_fim`, `tipo_evento`, `tema`, `vagas`, `duracao_horas`, `aprovacao`, `url`, `endereco_id`, `imagem_id`, `created`, `modified`) VALUES
(15, 'FISL 2014', 'Forum Internacional do software livre', '2014-05-18', '2014-07-18', 'Forum', 'informatica', 100, 40, 1, '', NULL, NULL, '2014-01-18 19:09:19', '2014-01-18 19:09:19'),
(16, 'dfsdfasd', 'dfsadfsdaf', '2014-01-19', '2014-01-19', 'dfadf', 'fasdfdas', 10, 23, 0, '', NULL, NULL, '2014-01-19 02:48:26', '2014-01-19 02:48:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens`
--

CREATE TABLE IF NOT EXISTS `imagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `caminho` varchar(120) DEFAULT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_imagens_usuarios1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscricoes`
--

CREATE TABLE IF NOT EXISTS `inscricoes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `data_ini` date NOT NULL,
  `data_fim` date NOT NULL,
  `paga` tinyint(1) NOT NULL,
  `valor` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `evento_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_inscricoes_eventos1` (`evento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `inscricoes`
--

INSERT INTO `inscricoes` (`id`, `data_ini`, `data_fim`, `paga`, `valor`, `created`, `modified`, `evento_id`) VALUES
(4, '2014-01-19', '2014-01-19', 1, 55, '2014-01-19 02:48:36', '2014-01-19 02:48:36', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `msgs`
--

CREATE TABLE IF NOT EXISTS `msgs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(190) DEFAULT NULL,
  `texto` text,
  `status` int(11) NOT NULL DEFAULT '0',
  `usuario_msg` int(11) NOT NULL,
  `usuarios_id` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mensagens_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) DEFAULT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `evento_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_noticia_evento1_idx` (`evento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
--

CREATE TABLE IF NOT EXISTS `pagamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL,
  `inscricoes_id` int(10) NOT NULL,
  `cadastros_evento_id` int(10) unsigned NOT NULL,
  `cadastros_usuario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_status_pagamentos_inscricoes1` (`inscricoes_id`),
  KEY `fk_pagamentos_cadastros1` (`cadastros_evento_id`,`cadastros_usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `status`, `inscricoes_id`, `cadastros_evento_id`, `cadastros_usuario_id`) VALUES
(1, 1, 4, 15, 2),
(2, 0, 4, 15, 3),
(3, 0, 4, 15, 4),
(4, 0, 4, 15, 5),
(5, 0, 4, 15, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrocinadores`
--

CREATE TABLE IF NOT EXISTS `patrocinadores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco_id` int(10) unsigned NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
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
-- Estrutura da tabela `presencas`
--

CREATE TABLE IF NOT EXISTS `presencas` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `programacoes_id` int(10) unsigned NOT NULL,
  `cadastros_evento_id` int(10) unsigned NOT NULL,
  `cadastros_usuario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_presencas_programacoes1_idx` (`programacoes_id`),
  KEY `fk_presencas_cadastros1_idx` (`cadastros_evento_id`,`cadastros_usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programacoes`
--

CREATE TABLE IF NOT EXISTS `programacoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(120) DEFAULT NULL,
  `palestrante` varchar(45) DEFAULT NULL,
  `local` varchar(50) NOT NULL,
  `sala` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `hora_ini` datetime NOT NULL,
  `hora_fim` datetime NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_programacao_evento1_idx` (`evento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(13) DEFAULT NULL,
  `patrocinador_id` int(10) unsigned NOT NULL,
  `usuario_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_telefone_patrocinador1_idx` (`patrocinador_id`),
  KEY `fk_telefones_usuarios1_idx` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `pasta` varchar(255) NOT NULL,
  `mimetype` varchar(255) NOT NULL,
  `tamanho` int(11) NOT NULL,
  `nivel` tinyint(1) NOT NULL DEFAULT '0',
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `instituicao` varchar(45) DEFAULT NULL,
  `end_rede_soc` varchar(120) DEFAULT NULL,
  `outro_contato_url` varchar(120) DEFAULT NULL,
  `cidade_id` int(10) unsigned DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuarios_cidades1_idx` (`cidade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `foto`, `pasta`, `mimetype`, `tamanho`, `nivel`, `cpf`, `rg`, `data_nasc`, `sexo`, `email`, `senha`, `instituicao`, `end_rede_soc`, `outro_contato_url`, `cidade_id`, `created`, `modified`) VALUES
(1, 'admin', '', '', '', '', 0, 1, NULL, NULL, NULL, NULL, 'admin@localhost.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Dono do sistema', NULL, NULL, NULL, NULL, NULL),
(2, 'josoerlei', 'Furlan', '', '', '', 0, 0, '12345678901', '123456789', '2013-12-17', 1, 'joso@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'UFSM', 'facebook', 'twitter', NULL, '2013-12-17 17:17:21', '2013-12-17 18:02:44'),
(3, 'Joso', 'Machado', '', '', '', 0, 0, '12345678901', '123456789', '2013-12-17', 1, 'joso@email.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'UFSM', 'facebook', 'twitter', NULL, '2013-12-17 17:17:46', '2013-12-17 17:17:46'),
(4, 'adriano', 'canofre ', '', '', '', 0, 0, '83235559007', '7094445975', '2013-12-17', 1, 'asantos@inf.ufsm.br', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ufsm', 'facebook', '', NULL, '2013-12-17 17:59:48', '2013-12-17 17:59:48'),
(5, 'tiago', 'quatrin', '', '', '', 0, 0, '99999999999', '8888888888', '1993-12-18', 1, 'tiago@si.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ufsm', 'twitter', 'outher', NULL, '2013-12-17 18:04:50', '2013-12-17 18:04:50'),
(6, 'usuario', 'novo', '', '', '', 0, 0, '83235559007', '7094445975', '2013-12-17', 1, 'user@localhost.com', 'b02854aab34f0686863d4c9d07f66e36d91fda62', 'ufsm', 'sdas', 'dfs', NULL, '2013-12-17 19:08:37', '2013-12-17 19:08:37');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `cadastros`
--
ALTER TABLE `cadastros`
  ADD CONSTRAINT `fk_evento_has_usuarios_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_has_usuario_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `fk_enderecos_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_evento_endereco1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evento_imagem1` FOREIGN KEY (`imagem_id`) REFERENCES `imagens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `imagens`
--
ALTER TABLE `imagens`
  ADD CONSTRAINT `fk_imagens_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `inscricoes`
--
ALTER TABLE `inscricoes`
  ADD CONSTRAINT `fk_inscricoes_eventos1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `msgs`
--
ALTER TABLE `msgs`
  ADD CONSTRAINT `fk_mensagens_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `fk_noticia_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD CONSTRAINT `fk_pagamentos_cadastros1` FOREIGN KEY (`cadastros_evento_id`, `cadastros_usuario_id`) REFERENCES `cadastros` (`evento_id`, `usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_status_pagamentos_inscricoes1` FOREIGN KEY (`inscricoes_id`) REFERENCES `inscricoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `patrocinadores`
--
ALTER TABLE `patrocinadores`
  ADD CONSTRAINT `fk_patrocinador_endereco1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `patrocinador_has_eventos`
--
ALTER TABLE `patrocinador_has_eventos`
  ADD CONSTRAINT `fk_patrocinador_has_evento_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patrocinador_has_evento_patrocinador1` FOREIGN KEY (`patrocinador_id`) REFERENCES `patrocinadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `presencas`
--
ALTER TABLE `presencas`
  ADD CONSTRAINT `fk_presencas_cadastros1` FOREIGN KEY (`cadastros_evento_id`, `cadastros_usuario_id`) REFERENCES `cadastros` (`evento_id`, `usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_presencas_programacoes1` FOREIGN KEY (`programacoes_id`) REFERENCES `programacoes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `programacoes`
--
ALTER TABLE `programacoes`
  ADD CONSTRAINT `fk_programacao_evento1` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `telefones`
--
ALTER TABLE `telefones`
  ADD CONSTRAINT `fk_telefones_usuarios1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_telefone_patrocinador1` FOREIGN KEY (`patrocinador_id`) REFERENCES `patrocinadores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
