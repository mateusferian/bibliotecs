-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/09/2023 às 20:44
-- Versão do servidor: 8.0.34-0ubuntu0.22.04.1
-- Versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_bibliotecs`
--
DROP DATABASE IF EXISTS `bd_bibliotecs`;
CREATE DATABASE IF NOT EXISTS `bd_bibliotecs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bd_bibliotecs`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_administrador`
--

CREATE TABLE `tbl_administrador` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` int NOT NULL,
  `dataCadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id`, `nome`, `email`, `senha`, `tipo`, `dataCadastro`) VALUES
(1, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', 0, NULL),
(2, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', 0, NULL),
(3, '1', 'sas', '2', 0, NULL),
(4, 'mateus', 'ferian', '123', 0, NULL),
(5, 'test', 'mane@gmail.com', '12', 0, NULL),
(6, 'pedro', 'pedro@gmail.com', '12345', 1, NULL),
(7, 'ze', 'ze@gmail.com', '123', 2, NULL),
(8, '12341', 'joseeeeeeeeee', '123', 2, NULL),
(9, 'testeeeeeeeeeeeeeeeee', 'testeeeeeeeeeeeeeeeee', '123', 2, NULL),
(10, 'maneeeeeeeee', 'maneeeeeeeee', 'maneeeeeeeee', 2, NULL),
(11, 'crip', 'crip', '$2y$10$JoHyw5u0Q5OyfBpIY5jt.ecy0gYXiuMmVu.84.T7vUyJ9MCm/ZykC', 2, NULL),
(12, 'data', 'data', '$2y$10$F2VcHIAUZ7ZFaQv5DiSynu/XdoszqldqSYPBnEkQdtW3vZOSmW4IS', 2, '2023-09-03'),
(13, 'as', 'as', '$2y$10$58hx7O9z9RV2pB6Yy6F8nOagak0xVUnnP.kFD5oSPcfC8qvTvWeeq', 2, '2023-09-03'),
(14, 'sad', 'as', '$2y$10$7R1292uM1BdU/Mba0QtA6O4CdRN6lbpLLGbMCVPf6IFE7BUfVkGv6', 2, '2023-09-03'),
(15, 'asd', 'sd', '$2y$10$lfilVSBo0LX6CcQHZ9r7Z.LqRM7TwUlE87.SfLz879zXtUtJ/PDTe', 2, '2023-09-03'),
(16, 'asd', 'asd', '$2y$10$hGJAdDCnIkD1E31LbTA/Hej.h/fhvVKv31pWojTjyx/ky/hkpQ0eq', 2, '2023-09-03'),
(17, 'asd', 'asd', '$2y$10$4iqeSE6bCDueSgD08mN1CepcM/4gYb/5MMCi9Ip482ReYGKG9R8qm', 2, '2023-09-03'),
(18, 'zxcz', 'zxcxc', '$2y$10$EXeEcmpT9iEvqBjvyM7a6e61f80PPxIMb868ybBOGlDO7Dvva09sC', 2, '2023-09-03'),
(19, 'qwe', 'asdad', '$2y$10$3mpDohUxvlytXtD6AprWN.f01TeJfaioiaIo2ATykB8gFAzB04gPy', 2, '2023-09-03'),
(20, 'qwe', 'asdad', '$2y$10$RlAD7qaLAxLTwhDDtohbruOx5ZYDOGlq9pUAwHz3Gye93/AsW4Rgu', 2, '2023-09-03');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_alunos`
--

CREATE TABLE `tbl_alunos` (
  `id` int NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` int NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `sala` varchar(20) NOT NULL,
  `livro` varchar(20) NOT NULL,
  `dataEntrega` date NOT NULL,
  `dataRetirada` date NOT NULL,
  `situacao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_alunos`
--

INSERT INTO `tbl_alunos` (`id`, `nome`, `email`, `senha`, `periodo`, `sala`, `livro`, `dataEntrega`, `dataRetirada`, `situacao`) VALUES
(11, 'mane', 'mane', 0, '', 'mane', 'mane', '2023-08-14', '0000-00-00', ''),
(12, 'mane', 'mane', 0, '', 'mane', 'mane', '2023-08-14', '0000-00-00', ''),
(13, 'mane', 'mane', 0, '', 'mane', 'mane', '2023-08-06', '0000-00-00', ''),
(14, 'mane', 'mane', 0, '', 'mane', 'mane', '2023-08-20', '0000-00-00', ''),
(15, 'mane', 'mane', 0, '', 'mane', 'mane', '2023-08-14', '0000-00-00', ''),
(16, 'mane', 'mane', 0, '', 'mane', 'mane', '2023-08-20', '0000-00-00', ''),
(18, 'mane', 'mane', 0, '', 'mane', 'mane', '2023-09-05', '0000-00-00', ''),
(19, 'joseeeeeee', 'mane', 0, '', 'mane', 'mane', '2023-09-01', '0000-00-00', ''),
(20, 'carlos', 'mane', 0, '', 'mane', 'mane', '2023-09-05', '0000-00-00', ''),
(21, 'carlos', 'mane', 0, '', 'mane', 'mane', '2023-09-04', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_eventos`
--

CREATE TABLE `tbl_eventos` (
  `id_eventos` int NOT NULL,
  `nome_eventos` varchar(60) NOT NULL,
  `inf_eventos` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `id_horario` int NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `dia` varchar(30) NOT NULL,
  `horario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_livro`
--

CREATE TABLE `tbl_livro` (
  `id_liv` int NOT NULL,
  `isbn` int NOT NULL,
  `nome` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano` int NOT NULL,
  `arquivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `arquivo2` varchar(800) NOT NULL,
  `destaque` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `editora` varchar(50) NOT NULL,
  `media_avaliacoes` double(8,3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_livro`
--

INSERT INTO `tbl_livro` (`id_liv`, `isbn`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `editora`, `media_avaliacoes`) VALUES
(23, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000),
(19, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000),
(20, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000),
(18, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000),
(7, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(9, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(10, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(11, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(12, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(13, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(14, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(15, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(16, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao', 0.000),
(22, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000),
(24, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000),
(25, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000),
(26, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao', 0.000);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_alunos`
--
ALTER TABLE `tbl_alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  ADD PRIMARY KEY (`id_eventos`);

--
-- Índices de tabela `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Índices de tabela `tbl_livro`
--
ALTER TABLE `tbl_livro`
  ADD PRIMARY KEY (`id_liv`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tbl_alunos`
--
ALTER TABLE `tbl_alunos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  MODIFY `id_eventos` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `id_horario` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_livro`
--
ALTER TABLE `tbl_livro`
  MODIFY `id_liv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
