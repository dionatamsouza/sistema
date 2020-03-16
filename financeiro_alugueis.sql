-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Mar-2020 às 05:18
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `igerenciador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro_alugueis`
--

DROP TABLE IF EXISTS `financeiro_alugueis`;
CREATE TABLE IF NOT EXISTS `financeiro_alugueis` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `cliente` int(50) NOT NULL,
  `imovel` int(50) NOT NULL,
  `vencimento` varchar(20) NOT NULL,
  `imobiliaria_creci` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `financeiro_alugueis`
--

INSERT INTO `financeiro_alugueis` (`id`, `cliente`, `imovel`, `vencimento`, `imobiliaria_creci`) VALUES
(1, 1, 21, '2020/03/26', 25469),
(2, 1, 29, '2020/03/19', 25469);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
