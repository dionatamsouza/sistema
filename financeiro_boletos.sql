-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Mar-2020 às 05:19
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
-- Estrutura da tabela `financeiro_boletos`
--

DROP TABLE IF EXISTS `financeiro_boletos`;
CREATE TABLE IF NOT EXISTS `financeiro_boletos` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `imobiliaria_creci` int(20) NOT NULL,
  `locador` int(20) NOT NULL,
  `locatario` int(20) NOT NULL,
  `pagador` int(20) NOT NULL,
  `id_boleto_pulsarpay` int(40) NOT NULL,
  `imovel` int(20) NOT NULL,
  `valor` double(10,2) NOT NULL,
  `vencimento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `financeiro_boletos`
--

INSERT INTO `financeiro_boletos` (`id`, `imobiliaria_creci`, `locador`, `locatario`, `pagador`, `id_boleto_pulsarpay`, `imovel`, `valor`, `vencimento`, `descricao`, `status`) VALUES
(1, 25469, 0, 0, 1, 0, 0, 55.00, '2020/03/25', '', 'Aguardando'),
(2, 25469, 0, 0, 1, 0, 0, 55.00, '2020/03/25', 'teste', 'Aguardando'),
(3, 25469, 0, 0, 1, 0, 0, 55.00, '2020/03/25', 'teste', 'Aguardando'),
(4, 25469, 0, 0, 1, 0, 0, 55.00, '2020/03/25', 'teste', 'Aguardando'),
(5, 25469, 0, 0, 1, 0, 0, 55.00, '2020/03/25', 'teste', 'Aguardando'),
(6, 25469, 0, 0, 1, 0, 0, 42.00, '2020/03/17', 'teste descrição', 'Aguardando'),
(7, 25469, 0, 0, 1, 0, 0, 42.00, '2020/03/17', 'teste descrição', 'Aguardando'),
(8, 25469, 0, 0, 1, 0, 0, 42.00, '2020/03/17', 'teste descrição', 'Aguardando'),
(9, 25469, 0, 0, 1, 0, 0, 56.00, '2020/03/18', 'Descrição teste', 'Aguardando'),
(10, 25469, 0, 0, 1, 0, 0, 32.00, '2020/03/19', 'descriçãoo ', 'Aguardando'),
(11, 25469, 0, 0, 1, 0, 0, 45.00, '2020/03/18', 'teste', 'Aguardando'),
(12, 25469, 0, 0, 1, 0, 0, 45.00, '2020/03/18', 'teste', 'Aguardando'),
(13, 25469, 0, 0, 1, 0, 0, 45.00, '2020/03/18', 'teste', 'Aguardando'),
(14, 25469, 0, 0, 1, 0, 0, 42.00, '2020/03/25', 'tttt', 'Aguardando'),
(15, 25469, 0, 0, 1, 0, 0, 42.00, '2020/03/25', 'tttt', 'Aguardando'),
(16, 25469, 0, 0, 1, 0, 0, 42.00, '2020/03/25', 'tttt', 'Aguardando'),
(17, 25469, 0, 0, 1, 0, 0, 42.00, '2020/03/25', 'tttt', 'Aguardando'),
(18, 25469, 0, 0, 1, 338097, 0, 42.00, '2020/03/25', 'tttt', 'Pendente'),
(19, 25469, 0, 1, 1, 0, 21, 800.00, '2020-03-26', 'Aluguel', 'Aguardando'),
(20, 25469, 0, 1, 1, 338098, 21, 800.00, '2020-03-26', 'Aluguel', 'Aguardando');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
