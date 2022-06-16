-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Jun-2022 às 14:56
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pws_fatura`
--
CREATE DATABASE IF NOT EXISTS `pws_fatura` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pws_fatura`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designacaosocial` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` int(9) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `codigopostal` varchar(255) DEFAULT NULL,
  `localidade` varchar(255) DEFAULT NULL,
  `capitalsocial` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `designacaosocial`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `capitalsocial`) VALUES
(1, 'XPTO', 'xpto@gmail.com', 244123321, 123456789, 'Rua Central', '1234-123', 'Leiria', 10000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturas`
--

DROP TABLE IF EXISTS `faturas`;
CREATE TABLE IF NOT EXISTS `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date DEFAULT NULL,
  `valoratotal` int(11) DEFAULT NULL,
  `ivatotal` int(11) DEFAULT NULL,
  `estado` enum('Em Lançamento','Emitida') DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `funcionario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ivas`
--

DROP TABLE IF EXISTS `ivas`;
CREATE TABLE IF NOT EXISTS `ivas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentagem` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `vigor` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ivas`
--

INSERT INTO `ivas` (`id`, `percentagem`, `descricao`, `vigor`) VALUES
(1, 23, 'Taxa Normal', 1),
(2, 13, 'Taxa Intermédia', 1),
(3, 6, 'Taxa Reduzida', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhafaturas`
--

DROP TABLE IF EXISTS `linhafaturas`;
CREATE TABLE IF NOT EXISTS `linhafaturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `valoriva` int(11) DEFAULT NULL,
  `produto_id` int(11) NOT NULL,
  `fatura_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`),
  KEY `fatura_id` (`fatura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `iva_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `iva_id` (`iva_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` int(9) DEFAULT NULL,
  `nif` int(11) DEFAULT NULL,
  `morada` varchar(255) DEFAULT NULL,
  `codigopostal` varchar(255) DEFAULT NULL,
  `localidade` varchar(255) DEFAULT NULL,
  `role` enum('Cliente','Funcionario','Administrador') DEFAULT 'Cliente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`) VALUES
(1, 'filipe', '81dc9bdb52d04dc20036dbd8313ed055', 'filipemarques333@gmail.com', 913194666, 1234567891, 'Rua dos Colos', '1234-123', 'Porto de Mós', 'Administrador'),
(2, 'rodrigo', '81dc9bdb52d04dc20036dbd8313ed055', 'rodrigo@gmail.com', 913194222, 423267591, 'Rua dos Colos', '1224-123', 'Porto de Mï¿½s', 'Funcionario'),
(9, 'ricardo', '81dc9bdb52d04dc20036dbd8313ed055', 'ricardo@gmail.com', 912131941, 123411111, 'Rua fixe', '1234-123', 'Porto', 'Funcionario'),
(10, 'Cliente1', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente1@gmail.com', 913194665, 123421412, 'Rua principal', '4124-123', 'Leiria', 'Cliente'),
(11, 'Cliente2', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente2@gmail.com', 913194665, 123421412, 'Rua principal', '4124-123', 'Leiria', 'Cliente'),
(12, 'Cliente3', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente3@gmail.com', 913194665, 123421412, 'Rua principal', '4124-123', 'Leiria', 'Cliente');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `faturas`
--
ALTER TABLE `faturas`
  ADD CONSTRAINT `faturas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `faturas_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `linhafaturas`
--
ALTER TABLE `linhafaturas`
  ADD CONSTRAINT `linhafaturas_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `linhafaturas_ibfk_2` FOREIGN KEY (`fatura_id`) REFERENCES `faturas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `ivas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
