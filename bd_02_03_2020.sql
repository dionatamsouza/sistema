-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02/03/2020 às 20:11
-- Versão do servidor: 10.2.30-MariaDB
-- Versão do PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u831509106_gnr`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `caixa`
--

CREATE TABLE `caixa` (
  `id` int(20) NOT NULL,
  `data` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imobiliaria` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `caixa`
--

INSERT INTO `caixa` (`id`, `data`, `valor`, `tipo`, `imobiliaria`, `descricao`) VALUES
(1, '27/02/2020', '4365.00', 'Entrada', '25469', ''),
(2, '27/02/2020', '4365.00', 'Entrada', '25469', 'Teste entrada'),
(3, '28/02/2020', '125.05', 'Saída', '25469', 'Saída de teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(20) NOT NULL,
  `nome` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` int(30) NOT NULL,
  `data_nascimento` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_bairro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco_numero` int(10) NOT NULL,
  `endereco_complemento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ibge` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `iddoimovel` varchar(250) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `imobiliaria_creci` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `files`
--

INSERT INTO `files` (`id`, `iddoimovel`, `tipo`, `file`, `imobiliaria_creci`) VALUES
(10, '455', '4', '/files/4206d791c4e6860bac813847ef138ab3.png', 25469);

-- --------------------------------------------------------

--
-- Estrutura para tabela `financeiro_boletos`
--

CREATE TABLE `financeiro_boletos` (
  `id` int(20) NOT NULL,
  `imobiliaria` int(20) NOT NULL,
  `locador` int(20) NOT NULL,
  `locatario` int(20) NOT NULL,
  `imovel` int(20) NOT NULL,
  `valor` double(10,2) NOT NULL,
  `vencimento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `financeiro_contas`
--

CREATE TABLE `financeiro_contas` (
  `id` int(20) NOT NULL,
  `tipo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` double(10,2) NOT NULL,
  `quem` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imobiliaria_creci` int(11) NOT NULL,
  `data` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `financeiro_contas`
--

INSERT INTO `financeiro_contas` (`id`, `tipo`, `valor`, `quem`, `imobiliaria_creci`, `data`, `status`) VALUES
(1, 'receber', 0.00, '', 0, '', ''),
(2, 'receber', 0.00, '', 0, '', ''),
(3, 'receber', 0.00, '', 0, '', ''),
(4, 'receber', 0.00, '', 0, '', ''),
(5, '\'1\'', 0.00, '', 0, '', ''),
(6, '1', 0.00, 'Mundial 1,99', 25469, '20/02/2020', 'Concluído'),
(7, '2', 536.00, 'Mundial 1,99', 25469, '05/03/2020', 'Concluído'),
(8, '2', 536.00, 'Mundial 1,99', 25469, '05/03/2020', 'Concluído'),
(9, '2', 536.00, 'Mundial 1,99', 25469, '05/03/2020', 'Concluído'),
(10, '2', 536.00, 'Mundial 1,99', 25469, '05/03/2020', 'Concluído'),
(11, '2', 536.00, 'Mundial 1,99', 25469, '05/03/2020', 'Concluído'),
(12, '2', 5.00, 'Mundial 1,99', 25469, '05/03/2020', 'Concluído'),
(13, '2', 5.36, 'Mundial 1,99', 25469, '05/03/2020', 'Concluído'),
(14, '2', 4.12, 'Mecânica Schum', 25469, '16/04/2020', 'Concluído'),
(15, '2', 4123.32, 'Mecânica Schum', 25469, '16/04/2020', 'Concluído'),
(16, '1', 5658.00, 'João Schneider', 25469, '05/03/2020', 'Aberto'),
(17, '1', 5658.00, 'João Schneider', 25469, '05/03/2020', 'Aberto'),
(18, '2', 900.00, 'Marleusa', 25469, '05/03/2020', 'Concluído'),
(19, '2', 236.00, 'Copel', 25469, '11/03/2020', 'Aberto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(11) NOT NULL,
  `tipo_do_imovel` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_de_propriedade` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_de_dormitorios` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_de_andar` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_construida` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visao_para` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_que_esta_proximo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_terreno_total` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imobiliaria_creci` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `locadores`
--

CREATE TABLE `locadores` (
  `id` int(20) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imobiliaria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `locatarios`
--

CREATE TABLE `locatarios` (
  `id` int(20) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `modelos_contratos`
--

CREATE TABLE `modelos_contratos` (
  `id` int(11) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `file` varchar(250) NOT NULL,
  `imobiliaria_creci` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `sobrenome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `telefone` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `cargo` varchar(250) NOT NULL,
  `imobiliaria_nome` varchar(250) NOT NULL,
  `imobiliaria_creci` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `staff`
--

INSERT INTO `staff` (`id`, `nome`, `sobrenome`, `email`, `senha`, `telefone`, `avatar`, `cargo`, `imobiliaria_nome`, `imobiliaria_creci`) VALUES
(3, 'Ryan', 'Viana', 'contato.ryanviana@gmail.com', '123', '45988003607', '/imgs/staff/60946517_504953523373882_2918748191111249920_o.jpg', '1', 'Imobiliária Ryan', '25469'),
(4, 'Teste', 'testando', 'contato@teste.com.br', '123', '45988003607', '/imgs/staff/de5350a24a9d490b2f4e45ce3d820968.jpg', '2', '', '25469');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `caixa`
--
ALTER TABLE `caixa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `financeiro_boletos`
--
ALTER TABLE `financeiro_boletos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `financeiro_contas`
--
ALTER TABLE `financeiro_contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `locadores`
--
ALTER TABLE `locadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `locatarios`
--
ALTER TABLE `locatarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `modelos_contratos`
--
ALTER TABLE `modelos_contratos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `caixa`
--
ALTER TABLE `caixa`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `financeiro_boletos`
--
ALTER TABLE `financeiro_boletos`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `financeiro_contas`
--
ALTER TABLE `financeiro_contas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `locadores`
--
ALTER TABLE `locadores`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `locatarios`
--
ALTER TABLE `locatarios`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modelos_contratos`
--
ALTER TABLE `modelos_contratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
