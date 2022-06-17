-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 17-Jun-2022 às 15:00
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
  `data` varchar(50) DEFAULT NULL,
  `valortotal` float DEFAULT NULL,
  `ivatotal` float DEFAULT NULL,
  `estado` enum('Em Lancamento','Emitida') DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `funcionario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  KEY `funcionario_id` (`funcionario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `faturas`
--

INSERT INTO `faturas` (`id`, `data`, `valortotal`, `ivatotal`, `estado`, `cliente_id`, `funcionario_id`) VALUES
(72, '2022-06-17 13:03:48', 2.3, 0.529, 'Emitida', 13, 9),
(73, '2022-06-17 13:48:49', 2.3, 0.529, 'Em Lancamento', 10, 9),
(74, '2022-06-17 14:58:54', 0, 0, 'Em Lancamento', 10, 1);

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
  `valor` float DEFAULT NULL,
  `valoriva` float DEFAULT NULL,
  `produto_id` int(11) NOT NULL,
  `fatura_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_id` (`produto_id`),
  KEY `fatura_id` (`fatura_id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `linhafaturas`
--

INSERT INTO `linhafaturas` (`id`, `quantidade`, `valor`, `valoriva`, `produto_id`, `fatura_id`) VALUES
(138, 1, 1.1, 0.253, 1, 72),
(139, 1, 1.2, 0.276, 2, 72),
(140, 1, 1.1, 0.253, 1, 73),
(141, 1, 1.2, 0.276, 2, 73);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `referencia`, `descricao`, `preco`, `stock`, `iva_id`) VALUES
(1, '1298471', 'Ice Tea', 1.1, 10, 1),
(2, '4363461', 'Cocacola', 1.2, 10, 1),
(3, '4811214', 'Azeite', 2.5, 10, 1),
(4, '5121847', 'AÃ§ucar', 0.79, 10, 1),
(5, '1371102', 'Massa Esparguete', 0.86, 10, 1),
(6, '9879186', 'Bolachas Maria', 1.49, 10, 1),
(7, '6124198', 'Cogumelos', 0.99, 10, 1),
(8, '6879101', 'Ã“leo Alimentar', 9.39, 10, 1),
(9, '1241121', 'CÃ¡psulas de CafÃ©', 17.99, 10, 1),
(10, '1111211', 'Atum Posta em Ã“leo', 1.94, 10, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codigopostal`, `localidade`, `role`) VALUES
(1, 'filipe', '81dc9bdb52d04dc20036dbd8313ed055', 'filipemarques333@gmail.com', 913194666, 1234567891, 'Rua dos Colos', '1234-123', 'Porto de Mï¿½s', 'Administrador'),
(2, 'rodrigo', '81dc9bdb52d04dc20036dbd8313ed055', 'rodrigo@gmail.com', 913194222, 423267591, 'Rua dos Colos', '1224-123', 'Porto de Mï¿½s', 'Funcionario'),
(9, 'ricardo', '81dc9bdb52d04dc20036dbd8313ed055', 'ricardo@gmail.com', 912131941, 123411111, 'Rua fixe', '1234-123', 'Porto', 'Funcionario'),
(10, 'Cliente1', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente1@gmail.com', 913194665, 123421412, 'Rua principal', '4124-123', 'Leiria', 'Cliente'),
(11, 'Cliente2', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente2@gmail.com', 913194665, 123421412, 'Rua principal', '4124-123', 'Leiria', 'Cliente'),
(12, 'Cliente3', '827ccb0eea8a706c4c34a16891f84e7b', 'cliente3@gmail.com', 913194665, 123421412, 'Rua principal', '4124-123', 'Leiria', 'Cliente'),
(13, 'userteste', 'd93591bdf7860e1e4ee2fca799911215', 'ricsantos2003@hotmail.com', 913194661, 123456789, 'Rua da mae do marcio', '8500-001', 'portimao', 'Cliente');

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
