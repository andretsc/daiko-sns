-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 19/11/2021 às 20:47
-- Versão do servidor: 5.6.41-84.1
-- Versão do PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `faust537_psicoh`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id_pess` int(11) NOT NULL,
  `pess_nome` varchar(300) NOT NULL,
  `pess_login` varchar(200) NOT NULL,
  `pess_senha` varchar(300) NOT NULL,
  `pess_email` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id_pess`, `pess_nome`, `pess_login`, `pess_senha`, `pess_email`) VALUES
(1, 'Rodrigo', '03913728406', 'cDgxbXorM0F0bEZpbG5EbWZ2WGdidz09', ''),
(2, 'rodrigo', 'rodrigofaustino@gmail.com', 'cDgxbXorM0F0bEZpbG5EbWZ2WGdidz09', 'rodrigofaustino@gmail.com'),
(3, 'rodrigo', 'rodrigohipnose@gmail.com', 'Zmhncm1wSE9LMEtkVTNLdG1LYmFoZz09', 'rodrigohipnose@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `v_id` int(11) NOT NULL,
  `v_url` varchar(250) NOT NULL,
  `v_date` datetime NOT NULL,
  `v_uni_no` bigint(20) DEFAULT NULL,
  `v_idpess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `videos`
--

INSERT INTO `videos` (`v_id`, `v_url`, `v_date`, `v_uni_no`, `v_idpess`) VALUES
(11, 'kCHpaOfAwk4', '2021-11-19 12:47:44', NULL, 1),
(27, '_cjjqerEuTc', '2021-11-19 01:45:41', NULL, 1),
(29, 'iKNlnwz1Czg', '2021-11-19 02:52:20', NULL, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id_pess`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`v_id`),
  ADD UNIQUE KEY `v_uni_no` (`v_uni_no`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id_pess` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
