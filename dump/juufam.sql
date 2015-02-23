-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Fev-2015 às 19:45
-- Versão do servidor: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `juufam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `atleta`
--

CREATE TABLE IF NOT EXISTS `atleta` (
  `matricula` varchar(8) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(255) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `data_nasc` varchar(45) NOT NULL,
  `genero` enum('feminino','masculino') NOT NULL,
  `tipo_atleta` enum('egresso','funcionario','corrente') NOT NULL,
  `id_curso` varchar(12) NOT NULL,
  `status` enum('aprovado','em analise','reprovado') NOT NULL DEFAULT 'aprovado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atleta`
--


LOCK TABLES `atleta` WRITE;
/*!40000 ALTER TABLE `atleta` DISABLE KEYS */;
INSERT INTO `atleta` VALUES ('','12321312314','','Guilherme Egresso','13/13/1312','masculino','egresso','ICC015','em analise'),('','66612313123','','Guilherme Ciencia','12/31/3123','masculino','corrente','ICC015','aprovado'),('','91230130031','','Guilherme Sistema','03/11/1992','masculino','corrente','IE015','aprovado');
/*!40000 ALTER TABLE `atleta` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Estrutura da tabela `chapa`
--

CREATE TABLE IF NOT EXISTS `chapa` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `chapa`
--

INSERT INTO `chapa` (`id`, `nome`, `id_evento`, `id_unidade`) VALUES
(1, 'Sistema de Informacao', 1, 1),
(2, 'Ciencia da Computacao', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chapa_curso`
--

CREATE TABLE IF NOT EXISTS `chapa_curso` (
`id` bigint(20) NOT NULL,
  `id_chapa` int(11) DEFAULT NULL,
  `id_curso` varchar(12) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `chapa_curso`
--

INSERT INTO `chapa_curso` (`id`, `id_chapa`, `id_curso`) VALUES
(1, 1, 'IE015'),
(2, 2, 'ICC015');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` varchar(12) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `id_instituto` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `id_instituto`, `id_unidade`) VALUES
('ICC015', 'Ciencia da Computacao', 1, 1),
('IE015', 'Sistemas de Informacão', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `data_ini_event` date NOT NULL,
  `data_end_event` date NOT NULL,
  `data_ini_insc` date NOT NULL,
  `data_end_insc` date NOT NULL,
  `cert_conc_path` text
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `data_ini_event`, `data_end_event`, `data_ini_insc`, `data_end_insc`, `cert_conc_path`) VALUES
(1, 'Evento 2015', '2014-12-31', '2014-12-31', '2014-12-31', '2014-12-31', NULL),
(2, 'Evento 2015', '2015-01-01', '2015-01-01', '2015-01-01', '2015-01-01', NULL),
(3, 'Evento 2017', '2017-11-03', '2017-11-03', '2017-11-03', '2017-11-03', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento_modalidade`
--

CREATE TABLE IF NOT EXISTS `evento_modalidade` (
  `id_evento` int(11) NOT NULL,
  `id_modalidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `evento_modalidade`
--

INSERT INTO `evento_modalidade` (`id_evento`, `id_modalidade`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituto`
--

CREATE TABLE IF NOT EXISTS `instituto` (
`id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `id_uni` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `instituto`
--

INSERT INTO `instituto` (`id`, `nome`, `id_uni`) VALUES
(1, 'ICOMP', 1),
(2, 'FD', 1),
(3, 'Instituto de Computação', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modalidade`
--

CREATE TABLE IF NOT EXISTS `modalidade` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tipo_modalidade` enum('coletivo','individual') NOT NULL,
  `min_inscr` int(11) NOT NULL,
  `max_inscr` int(11) NOT NULL,
  `genero` enum('masculino','feminino') NOT NULL,
  `max_time` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id`, `nome`, `tipo_modalidade`, `min_inscr`, `max_inscr`, `genero`, `max_time`) VALUES
(1, 'Futsal', 'coletivo', 5, 10, 'masculino', 5),
(2, 'Natação', 'individual', 3, 10, 'masculino', 0),
(3, 'Volley', 'coletivo', 5, 10, 'masculino', 0),
(4, 'Futsal', 'coletivo', 5, 10, 'feminino', 0),
(5, 'Xadrez', 'individual', 5, 10, 'masculino', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regulamento`
--

CREATE TABLE IF NOT EXISTS `regulamento` (
  `ano` int(4) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `regulamento`
--

INSERT INTO `regulamento` (`ano`, `link`) VALUES
(2014, '/juufam/juufam/regulamento/regulamento_2015.pdf'),
(2015, '/juufam/juufam/regulamento/regulamento_2015.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `repr_atleta`
--

CREATE TABLE IF NOT EXISTS `repr_atleta` (
  `id_repr` varchar(45) NOT NULL,
  `id_atleta` varchar(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `time`
--

CREATE TABLE IF NOT EXISTS `time` (
`id` int(11) NOT NULL,
  `id_modalidade` int(11) NOT NULL,
  `id_curso` varchar(12) NOT NULL,
  `tecnico` varchar(11) DEFAULT NULL,
  `auxiliar` varchar(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `time`
--

INSERT INTO `time` (`id`, `id_modalidade`, `id_curso`, `tecnico`, `auxiliar`) VALUES
(5, 1, 'IE015', '91230130031', '91230130031');

-- --------------------------------------------------------

--
-- Estrutura da tabela `time_atletas`
--

CREATE TABLE IF NOT EXISTS `time_atletas` (
`id` int(11) NOT NULL,
  `id_atleta` varchar(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `id_repr` varchar(45) NOT NULL,
  `status` enum('aprovado','em analise','reprovado') NOT NULL DEFAULT 'aprovado'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `time_atletas`
--

INSERT INTO `time_atletas` (`id`, `id_atleta`, `id_time`, `id_repr`, `status`) VALUES
(6, '91230130031', 5, 'representante', 'aprovado'),
(8, '66612313123', 5, 'representante', 'em analise');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `nome`) VALUES
(1, 'Manaus'),
(2, 'Parintins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `email` char(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `id_tipo_usuario` enum('representante','admin') NOT NULL,
  `id_chapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `login`, `email`, `senha`, `id_tipo_usuario`, `id_chapa`) VALUES
('Guilherme Kodama', 'admin', '', 'admin', 'admin', 1),
('Larissa Ayres', 'ayreslarissa', 'larimayres@gmail.com', 'oitudobomquerido', 'representante', 1),
('Guilherme Kodama', 'representante', '', 'representante', 'representante', 1),
('repr_ciencia', 'repr_ciencia', '', '123', 'representante', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atleta`
--
ALTER TABLE `atleta`
 ADD PRIMARY KEY (`cpf`), ADD KEY `id_curso_idx` (`id_curso`);

--
-- Indexes for table `chapa`
--
ALTER TABLE `chapa`
 ADD PRIMARY KEY (`id`), ADD KEY `id_evento_idx` (`id_evento`), ADD KEY `id_unidade_idx` (`id_unidade`);

--
-- Indexes for table `chapa_curso`
--
ALTER TABLE `chapa_curso`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_chapa_curso_chapa_idx` (`id_chapa`), ADD KEY `fk_chapa_curso_curso_idx` (`id_curso`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
 ADD PRIMARY KEY (`id`), ADD KEY `id_instituto_idx` (`id_instituto`), ADD KEY `id_unidade_idx` (`id_unidade`);

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evento_modalidade`
--
ALTER TABLE `evento_modalidade`
 ADD KEY `id_evento_idx` (`id_evento`), ADD KEY `id_modalidade_idx` (`id_modalidade`);

--
-- Indexes for table `instituto`
--
ALTER TABLE `instituto`
 ADD PRIMARY KEY (`id`), ADD KEY `id_uni_idx` (`id_uni`);

--
-- Indexes for table `modalidade`
--
ALTER TABLE `modalidade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regulamento`
--
ALTER TABLE `regulamento`
 ADD UNIQUE KEY `ano` (`ano`);

--
-- Indexes for table `repr_atleta`
--
ALTER TABLE `repr_atleta`
 ADD KEY `fk_id_representante_idx` (`id_repr`), ADD KEY `fk_id_atleta_idx` (`id_atleta`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
 ADD PRIMARY KEY (`id`), ADD KEY `id_modalidade_time` (`id_modalidade`), ADD KEY `id_curso_time` (`id_curso`);

--
-- Indexes for table `time_atletas`
--
ALTER TABLE `time_atletas`
 ADD PRIMARY KEY (`id`), ADD KEY `id_time_time` (`id_time`), ADD KEY `fk_id_atleta_time_idx` (`id_atleta`), ADD KEY `id_repr_time` (`id_repr`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`login`), ADD KEY `id_chapa_idx` (`id_chapa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapa`
--
ALTER TABLE `chapa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `chapa_curso`
--
ALTER TABLE `chapa_curso`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instituto`
--
ALTER TABLE `instituto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `modalidade`
--
ALTER TABLE `modalidade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `time_atletas`
--
ALTER TABLE `time_atletas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atleta`
--
ALTER TABLE `atleta`
ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `chapa`
--
ALTER TABLE `chapa`
ADD CONSTRAINT `id_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `id_unidade` FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `chapa_curso`
--
ALTER TABLE `chapa_curso`
ADD CONSTRAINT `fk_chapa_curso_chapa` FOREIGN KEY (`id_chapa`) REFERENCES `chapa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_chapa_curso_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `curso`
--
ALTER TABLE `curso`
ADD CONSTRAINT `id_instituto` FOREIGN KEY (`id_instituto`) REFERENCES `instituto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `id_unidade_curso` FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `evento_modalidade`
--
ALTER TABLE `evento_modalidade`
ADD CONSTRAINT `id_evento_modalidade` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `id_modalidade_evento` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `instituto`
--
ALTER TABLE `instituto`
ADD CONSTRAINT `id_uni` FOREIGN KEY (`id_uni`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `repr_atleta`
--
ALTER TABLE `repr_atleta`
ADD CONSTRAINT `fk_id_atleta` FOREIGN KEY (`id_atleta`) REFERENCES `atleta` (`cpf`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_id_representante` FOREIGN KEY (`id_repr`) REFERENCES `usuario` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `time`
--
ALTER TABLE `time`
ADD CONSTRAINT `id_curso_time` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_modalidade_time` FOREIGN KEY (`id_modalidade`) REFERENCES `modalidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `time_atletas`
--
ALTER TABLE `time_atletas`
ADD CONSTRAINT `fk_id_atleta_time` FOREIGN KEY (`id_atleta`) REFERENCES `atleta` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_repr_time` FOREIGN KEY (`id_repr`) REFERENCES `usuario` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `id_time_time` FOREIGN KEY (`id_time`) REFERENCES `time` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `id_chapa` FOREIGN KEY (`id_chapa`) REFERENCES `chapa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
