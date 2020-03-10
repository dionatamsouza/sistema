-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Mar-2020 às 17:38
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
-- Estrutura da tabela `financeiro_clientes`
--

DROP TABLE IF EXISTS `financeiro_clientes`;
CREATE TABLE IF NOT EXISTS `financeiro_clientes` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_rua` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_numero` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_complemento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ibge` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsapp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imobiliaria_creci` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `financeiro_clientes`
--

INSERT INTO `financeiro_clientes` (`id`, `nome`, `documento`, `data_nascimento`, `endereco_bairro`, `endereco_rua`, `endereco_numero`, `endereco_complemento`, `telefone`, `cep`, `codigo_ibge`, `email`, `whatsapp`, `imobiliaria_creci`) VALUES
(1, 'Lauro Glassmann', '07235751932', '21/03/2019', 'Alvorada', 'Vitória', '660', 'Nada', '(45) 99933-5708', '85960-000', '4114609', 'netsitesmcr@gmail.com', '(45)999335708', 25469);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
