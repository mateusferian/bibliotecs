-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Nov-2022 às 14:54
-- Versão do servidor: 5.5.41
-- versão do PHP: 8.1.6

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `games`
--

CREATE TABLE `games` (
  `codgame` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `preco` double NOT NULL,
  `arquivo` varchar(300) NOT NULL,
  `novidade` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `games`
--

INSERT INTO `games` (`codgame`, `nome`, `plataforma`, `preco`, `arquivo`, `novidade`) VALUES
(1, 'FIFA 23 - PlayStation 4', 'PlayStation 4', 260, 'img/imagem_01-11-2022_10-17-28_9411368461.jpg', 'S'),
(2, 'God of War Ragnarök', 'PlayStation 4', 270.5, 'img/imagem_01-11-2022_10-17-58_5265008324.jpg', 'S'),
(3, 'FIFA 23 - PlayStation 5', 'PlayStation 5', 332.2, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'S'),
(4, 'Gears 5 - Xbox One', 'Xbox One', 333.18, 'img/imagem_01-11-2022_10-18-42_8856654516.jpg', 'S'),
(5, 'Resident Evil 2', 'Xbox One', 199.9, 'img/imagem_01-11-2022_10-19-06_3867543159.jpg', 'N'),
(6, 'Lego Star Wars', 'Xbox One', 99.9, 'img/imagem_01-11-2022_10-19-28_2950219951.jpg', 'N'),
(7, 'FIFA 22', 'Xbox One', 115.8, 'img/imagem_01-11-2022_10-19-54_9356940982.jpg', 'N'),
(8, 'Battlefield 2042 - PS5', 'PlayStation 5', 55.9, 'img/imagem_01-11-2022_10-20-14_8591433356.jpg', 'N'),
(9, 'Sonic Frontiers', 'PlayStation 4', 299.9, 'img/imagem_01-11-2022_10-20-35_3942598748.jpg', 'N'),
(10, 'Marvel\'s Spider-Man', 'PlayStation 4', 163.9, 'img/imagem_01-11-2022_10-21-03_1657389192.jpg', 'N');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`codgame`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `games`
--
ALTER TABLE `games`
  MODIFY `codgame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
