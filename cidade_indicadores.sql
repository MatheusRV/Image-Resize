-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 03-Fev-2023 às 09:58
-- Versão do servidor: 5.5.68-MariaDB
-- versão do PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `canalicara_bdportal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade_indicadores`
--

CREATE TABLE `cidade_indicadores` (
  `id` int(10) UNSIGNED NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `titulo` varchar(240) NOT NULL DEFAULT '',
  `categoria` varchar(240) NOT NULL,
  `texto` varchar(240) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cidade_indicadores`
--

INSERT INTO `cidade_indicadores` (`id`, `pdate`, `titulo`, `categoria`, `texto`) VALUES
(1, '2023-02-02 20:24:49', '20574', 'Empregos', '12/2022'),
(2, '2023-02-02 21:23:05', '7033', 'Empresas', '12/2022'),
(3, '2022-12-31 21:32:46', '40.318.092', 'Balança Comercial', '12/2022'),
(4, '2022-12-31 22:01:55', '64.456', 'População', '2022'),
(5, '2020-12-31 22:02:49', '48.482,56', 'PIB', '2020'),
(6, '2010-12-31 02:04:52', '0,741', 'IDHM', '2010'),
(7, '2022-12-31 22:05:49', '42.211', 'Eleitores', '12/2022'),
(8, '2022-11-30 22:06:20', '9.670 pessoas', 'CAD Único', '11/2022'),
(9, '2021-12-31 22:07:23', '5,3', 'IDEB - 9º ano', '2021'),
(10, '2021-12-31 22:09:01', '6,5', 'IDEB - 5º ano', '2021'),
(11, '2021-12-31 22:09:51', '3,8', 'IDEB - Ensino Médio', '2021');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidade_indicadores`
--
ALTER TABLE `cidade_indicadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdate` (`pdate`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade_indicadores`
--
ALTER TABLE `cidade_indicadores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
