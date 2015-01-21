-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Jan-2015 às 02:39
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
  `tipo_atleta` enum('egresso','funcionario','ativo') NOT NULL,
  `id_curso` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `atleta`
--

INSERT INTO `atleta` (`matricula`, `cpf`, `rg`, `nome`, `data_nasc`, `genero`, `tipo_atleta`, `id_curso`) VALUES
('21101409', '01719550212', '19923880', 'Guilherme Kodama', '03/11/1992', 'masculino', 'ativo', 'IE015');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chapa`
--

CREATE TABLE IF NOT EXISTS `chapa` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `chapa`
--

INSERT INTO `chapa` (`id`, `nome`, `id_evento`, `id_unidade`) VALUES
(1, 'Sistema de Informacao', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`id`, `nome`, `data_ini_event`, `data_end_event`, `data_ini_insc`, `data_end_insc`, `cert_conc_path`) VALUES
(1, 'Evento 2015', '2014-12-31', '2014-12-31', '2014-12-31', '2014-12-31', NULL),
(2, 'JUUFAM 2015', '2015-01-28', '2015-02-03', '2015-01-10', '2015-01-15', NULL);

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
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituto`
--

CREATE TABLE IF NOT EXISTS `instituto` (
`id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `id_uni` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `instituto`
--

INSERT INTO `instituto` (`id`, `nome`, `id_uni`) VALUES
(1, 'ICOMP', 1);

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
  `genero` enum('masculino','feminino') NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `modalidade`
--

INSERT INTO `modalidade` (`id`, `nome`, `tipo_modalidade`, `min_inscr`, `max_inscr`, `genero`) VALUES
(1, 'Futsal', 'coletivo', 5, 10, 'masculino');

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
(2015, 'http://localhost/juufam/regulamento/regulamento_2015.pdf');

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
  `id_curso` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `time_atletas`
--

CREATE TABLE IF NOT EXISTS `time_atletas` (
`id` int(11) NOT NULL,
  `id_atleta` varchar(11) NOT NULL,
  `id_time` int(11) NOT NULL,
  `tipo_atleta` enum('atleta','tecnico') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE IF NOT EXISTS `unidade` (
`id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `nome`) VALUES
(1, 'Manaus');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(45) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `id_tipo_usuario` enum('representante','admin') NOT NULL,
  `id_chapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `login`, `senha`, `id_tipo_usuario`, `id_chapa`) VALUES
('Guilherme Kodama', 'admin', 'admin', 'admin', 1),
('Larissa Ayres', 'repre', 'repre', 'representante', 1);

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
 ADD PRIMARY KEY (`ano`);

--
-- Indexes for table `repr_atleta`
--
ALTER TABLE `repr_atleta`
 ADD KEY `fk_id_representante_idx` (`id_repr`), ADD KEY `fk_id_atleta_idx` (`id_atleta`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_atletas`
--
ALTER TABLE `time_atletas`
 ADD PRIMARY KEY (`id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `instituto`
--
ALTER TABLE `instituto`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `modalidade`
--
ALTER TABLE `modalidade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `time_atletas`
--
ALTER TABLE `time_atletas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `atleta`
--
ALTER TABLE `atleta`
ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `chapa`
--
ALTER TABLE `chapa`
ADD CONSTRAINT `id_evento` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `id_unidade` FOREIGN KEY (`id_unidade`) REFERENCES `unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `id_chapa` FOREIGN KEY (`id_chapa`) REFERENCES `chapa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
