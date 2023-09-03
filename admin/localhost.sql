-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/08/2023 às 13:08
-- Versão do servidor: 8.0.34-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_games`
--
DROP DATABASE IF EXISTS `bd_games`;
CREATE DATABASE IF NOT EXISTS `bd_games` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bd_games`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `games`
--

CREATE TABLE `games` (
  `codgame` int NOT NULL,
  `nome` varchar(200) NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `arquivo` varchar(300) NOT NULL,
  `novidade` char(1) NOT NULL,
  `media_avaliacoes` double(8,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `games`
--

INSERT INTO `games` (`codgame`, `nome`, `plataforma`, `preco`, `arquivo`, `novidade`, `media_avaliacoes`) VALUES
(1, 'FIFA 23 - PlayStation 4', 'PlayStation 4', 260, 'img/imagem_01-11-2022_10-17-28_9411368461.jpg', 'S', 0.000),
(2, 'God of War Ragnarök', 'PlayStation 4', 270.5, 'img/imagem_01-11-2022_10-17-58_5265008324.jpg', 'S', 0.000),
(3, 'FIFA 23 - PlayStation 5', 'PlayStation 5', 332.2, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'S', 0.000),
(4, 'Gears 5 - Xbox One', 'Xbox One', 333.18, 'img/imagem_01-11-2022_10-18-42_8856654516.jpg', 'S', 0.000),
(5, 'Resident Evil 2', 'Xbox One', 199.9, 'img/imagem_01-11-2022_10-19-06_3867543159.jpg', 'N', 0.000),
(6, 'Lego Star Wars', 'Xbox One', 99.9, 'img/imagem_01-11-2022_10-19-28_2950219951.jpg', 'N', 2.000),
(7, 'FIFA 22', 'Xbox One', 115.8, 'img/imagem_01-11-2022_10-19-54_9356940982.jpg', 'N', 0.000),
(8, 'Battlefield 2042 - PS5', 'PlayStation 5', 55.9, 'img/imagem_01-11-2022_10-20-14_8591433356.jpg', 'N', 0.000),
(9, 'Sonic Frontiers', 'PlayStation 4', 299.9, 'img/imagem_01-11-2022_10-20-35_3942598748.jpg', 'N', 0.000),
(10, 'Marvel\'s Spider-Man', 'PlayStation 4', 163.9, 'img/imagem_01-11-2022_10-21-03_1657389192.jpg', 'N', 0.000),
(11, 'teste', 'PlayStation 4', 163.9, 'img/imagem_01-11-2022_10-21-03_1657389192.jpg', 'N', 0.000),
(12, 'teste novidade pag 2 a', 'PlayStation 4', 260, 'img/imagem_01-11-2022_10-17-28_9411368461.jpg', 'S', 0.000),
(13, 'teste novidade pag 2 b', 'PlayStation 4', 270.5, 'img/imagem_01-11-2022_10-17-58_5265008324.jpg', 'S', 0.000),
(14, 'teste novidade pag 3 a', 'PlayStation 4', 270.5, 'img/imagem_01-11-2022_10-17-58_5265008324.jpg', 'S', 0.000),
(15, 'teste novidade pag 3 b', 'PlayStation 4', 270.5, 'img/imagem_01-11-2022_10-17-58_5265008324.jpg', 'S', 5.000),
(16, 'EEEEEEEEEEEEEEEEEEEEEEE', 'PlayStation 4', 260, 'img/imagem_01-11-2022_10-17-28_9411368461.jpg', 'S', 5.000),
(17, 'AAAAAAAAAAAAAA', 'Xbox One', 199.9, 'img/imagem_01-11-2022_10-19-06_3867543159.jpg', 'N', 2.000),
(18, 'FIFA 23 - PlayStation 4', 'PlayStation 4', 260, 'img/imagem_01-11-2022_10-17-28_9411368461.jpg', 'S', 0.000),
(19, 'FIFA 23 - PlayStation 4', 'PlayStation 4', 260, 'img/imagem_01-11-2022_10-17-28_9411368461.jpg', 'S', 0.000);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`codgame`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `codgame` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
