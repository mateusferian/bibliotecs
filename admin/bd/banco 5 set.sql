-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/09/2023 às 22:37
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
-- Estrutura para tabela `tbl_alunos`
--

CREATE TABLE `tbl_alunos` (
  `id` int NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `sala` varchar(20) NOT NULL,
  `livro` varchar(20) NOT NULL,
  `dataEntrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_alunos`
--

INSERT INTO `tbl_alunos` (`id`, `nome`, `email`, `sala`, `livro`, `dataEntrega`) VALUES
(10, 'mane', 'mane', 'mane', 'mane', '2023-08-10'),
(11, 'mane', 'mane', 'mane', 'mane', '2023-08-14'),
(12, 'mane', 'mane', 'mane', 'mane', '2023-08-14'),
(13, 'mane', 'mane', 'mane', 'mane', '2023-08-06'),
(14, 'mane', 'mane', 'mane', 'mane', '2023-08-20'),
(15, 'mane', 'mane', 'mane', 'mane', '2023-08-14'),
(16, 'mane', 'mane', 'mane', 'mane', '2023-08-20'),
(18, 'mane', 'mane', 'mane', 'mane', '2023-09-05'),
(19, 'joseeeeeee', 'mane', 'mane', 'mane', '2023-09-01'),
(20, 'carlos', 'mane', 'mane', 'mane', '2023-09-05'),
(21, 'carlos', 'mane', 'mane', 'mane', '2023-09-04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_cadastro_usuario`
--

CREATE TABLE `tbl_cadastro_usuario` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` int NOT NULL,
  `dataCadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_cadastro_usuario`
--

INSERT INTO `tbl_cadastro_usuario` (`id`, `nome`, `email`, `senha`, `tipo`, `dataCadastro`) VALUES
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
-- Estrutura para tabela `tbl_livros`
--

CREATE TABLE `tbl_livros` (
  `id_liv` int NOT NULL,
  `isbn` int NOT NULL,
  `nome` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano` int NOT NULL,
  `arquivo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `arquivo2` varchar(800) NOT NULL,
  `destaque` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `editora` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_livros`
--

INSERT INTO `tbl_livros` (`id_liv`, `isbn`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `editora`) VALUES
(23, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao'),
(19, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao'),
(20, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao'),
(18, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao'),
(6, 2147483647, 'João', 'Juninhos Rossi', 2004, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 'N', 'Contemporany'),
(7, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(8, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(9, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(10, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(11, 14566525, 'controle de livros', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(12, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(13, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(14, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(15, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(16, 14566525, 'TESEEEEEESSSS', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', '', 's', 'editora mamao'),
(22, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao'),
(24, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao'),
(25, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao'),
(26, 14566525, 'diaaaaa terçaaaaaa', 'autor livro', 1234, 'img/imagem_01-11-2022_10-18-20_6310155749.jpg', 'saasssssssssssss', 's', 'editora mamao');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_alunos`
--
ALTER TABLE `tbl_alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_cadastro_usuario`
--
ALTER TABLE `tbl_cadastro_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_livros`
--
ALTER TABLE `tbl_livros`
  ADD PRIMARY KEY (`id_liv`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_alunos`
--
ALTER TABLE `tbl_alunos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbl_cadastro_usuario`
--
ALTER TABLE `tbl_cadastro_usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tbl_livros`
--
ALTER TABLE `tbl_livros`
  MODIFY `id_liv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
