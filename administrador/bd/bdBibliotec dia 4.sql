-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 04/10/2023 às 11:47
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
  `dataCadastro` date DEFAULT NULL,
  `recuperar_senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id`, `nome`, `email`, `senha`, `dataCadastro`, `recuperar_senha`) VALUES
(1, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', NULL, ''),
(2, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', NULL, ''),
(3, '1', 'sas', '2', NULL, ''),
(4, 'mateus', 'ferian', '123', NULL, ''),
(5, 'test', 'mane@gmail.com', '12', NULL, ''),
(6, 'pedro', 'pedro@gmail.com', '12345', NULL, ''),
(7, 'ze', 'ze@gmail.com', '123', NULL, ''),
(8, '12341', 'joseeeeeeeeee', '123', NULL, ''),
(9, 'testeeeeeeeeeeeeeeeee', 'testeeeeeeeeeeeeeeeee', '123', NULL, ''),
(10, 'maneeeeeeeee', 'maneeeeeeeee', 'maneeeeeeeee', NULL, ''),
(11, 'crip', 'crip', '$2y$10$JoHyw5u0Q5OyfBpIY5jt.ecy0gYXiuMmVu.84.T7vUyJ9MCm/ZykC', NULL, ''),
(12, 'data', 'data', '$2y$10$F2VcHIAUZ7ZFaQv5DiSynu/XdoszqldqSYPBnEkQdtW3vZOSmW4IS', '2023-09-03', ''),
(13, 'as', 'as', '$2y$10$58hx7O9z9RV2pB6Yy6F8nOagak0xVUnnP.kFD5oSPcfC8qvTvWeeq', '2023-09-03', ''),
(14, 'sad', 'as', '$2y$10$7R1292uM1BdU/Mba0QtA6O4CdRN6lbpLLGbMCVPf6IFE7BUfVkGv6', '2023-09-03', ''),
(15, 'asd', 'sd', '$2y$10$lfilVSBo0LX6CcQHZ9r7Z.LqRM7TwUlE87.SfLz879zXtUtJ/PDTe', '2023-09-03', ''),
(16, 'asd', 'asd', '$2y$10$hGJAdDCnIkD1E31LbTA/Hej.h/fhvVKv31pWojTjyx/ky/hkpQ0eq', '2023-09-03', ''),
(17, 'asd', 'asd', '$2y$10$4iqeSE6bCDueSgD08mN1CepcM/4gYb/5MMCi9Ip482ReYGKG9R8qm', '2023-09-03', ''),
(18, 'zxcz', 'zxcxc', '$2y$10$EXeEcmpT9iEvqBjvyM7a6e61f80PPxIMb868ybBOGlDO7Dvva09sC', '2023-09-03', ''),
(19, 'qwe', 'asdad', '$2y$10$3mpDohUxvlytXtD6AprWN.f01TeJfaioiaIo2ATykB8gFAzB04gPy', '2023-09-03', ''),
(20, 'qwe', 'asdad', '$2y$10$RlAD7qaLAxLTwhDDtohbruOx5ZYDOGlq9pUAwHz3Gye93/AsW4Rgu', '2023-09-03', ''),
(21, 'mateus', 'carlosantoniocleiton@gmail.com', '$2y$10$iR2Yk2H47ZGs8Rb9bWaAeOdh.z1WujBG4E4dmzoa84KeCPEtf3xe.', '2023-09-20', 'NULL');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_aluno`
--

CREATE TABLE `tbl_aluno` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `periodo` varchar(30) NOT NULL,
  `sala` varchar(30) NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `recuperar_senha` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_aluno`
--

INSERT INTO `tbl_aluno` (`id`, `nome`, `email`, `senha`, `periodo`, `sala`, `dataCadastro`, `recuperar_senha`) VALUES
(1, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', '', '', NULL, ''),
(2, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', '', '', NULL, ''),
(3, '1', 'sas', '2', '', '', NULL, ''),
(4, 'mateus', 'ferian', '123', '', '', NULL, ''),
(5, 'test', 'mane@gmail.com', '12', '', '', NULL, ''),
(6, 'pedro', 'pedro@gmail.com', '12345', '', '', NULL, ''),
(7, 'ze', 'ze@gmail.com', '123', '', '', NULL, ''),
(8, '12341', 'joseeeeeeeeee', '123', '', '', NULL, ''),
(9, 'testeeeeeeeeeeeeeeeee', 'testeeeeeeeeeeeeeeeee', '123', '', '', NULL, ''),
(10, 'maneeeeeeeee', 'maneeeeeeeee', 'maneeeeeeeee', '', '', NULL, ''),
(11, 'crip', 'crip', '$2y$10$JoHyw5u0Q5OyfBpIY5jt.ecy0gYXiuMmVu.84.T7vUyJ9MCm/ZykC', '', '', NULL, ''),
(12, 'data', 'data', '$2y$10$F2VcHIAUZ7ZFaQv5DiSynu/XdoszqldqSYPBnEkQdtW3vZOSmW4IS', '', '', '2023-09-03', ''),
(13, 'as', 'as', '$2y$10$58hx7O9z9RV2pB6Yy6F8nOagak0xVUnnP.kFD5oSPcfC8qvTvWeeq', '', '', '2023-09-03', ''),
(14, 'sad', 'as', '$2y$10$7R1292uM1BdU/Mba0QtA6O4CdRN6lbpLLGbMCVPf6IFE7BUfVkGv6', '', '', '2023-09-03', ''),
(15, 'asd', 'sd', '$2y$10$lfilVSBo0LX6CcQHZ9r7Z.LqRM7TwUlE87.SfLz879zXtUtJ/PDTe', '', '', '2023-09-03', ''),
(16, 'asd', 'asd', '$2y$10$hGJAdDCnIkD1E31LbTA/Hej.h/fhvVKv31pWojTjyx/ky/hkpQ0eq', '', '', '2023-09-03', ''),
(17, 'asd', 'asd', '$2y$10$4iqeSE6bCDueSgD08mN1CepcM/4gYb/5MMCi9Ip482ReYGKG9R8qm', '', '', '2023-09-03', ''),
(18, 'zxcz', 'zxcxc', '$2y$10$EXeEcmpT9iEvqBjvyM7a6e61f80PPxIMb868ybBOGlDO7Dvva09sC', '', '', '2023-09-03', ''),
(19, 'qwe', 'asdad', '$2y$10$3mpDohUxvlytXtD6AprWN.f01TeJfaioiaIo2ATykB8gFAzB04gPy', '', '', '2023-09-03', ''),
(20, 'qwe', 'mateusferian10@gmail.com', '$2y$10$s9H7I2TG3FveuQSlZyzZEePDC7pPsO2CFm3Yt5Ge0GlWvq5IM7vQe', '', 'asasasas', '2023-09-03', 'NULL'),
(21, 'mateus', 'usuario@gmail.com', '$2y$10$lIjEbZuYopINGs3Rf9By8.d6/8MyMAKQaaPZvh9/UDB7tT4fLk5tq', '', '', '2023-09-20', 'NULL');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_alunos`
--

CREATE TABLE `tbl_alunos` (
  `id` int NOT NULL,
  `nome` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `periodo` varchar(20) NOT NULL,
  `sala` varchar(20) NOT NULL,
  `livro` varchar(20) NOT NULL,
  `dataEntrega` date NOT NULL,
  `dataRetirada` date NOT NULL,
  `situacao` varchar(20) NOT NULL,
  `recuperar_senha` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_alunos`
--

INSERT INTO `tbl_alunos` (`id`, `nome`, `email`, `senha`, `periodo`, `sala`, `livro`, `dataEntrega`, `dataRetirada`, `situacao`, `recuperar_senha`) VALUES
(11, 'mane', 'mane', '', '', 'mane', 'mane', '2023-08-14', '0000-00-00', '', ''),
(12, 'mane', 'mane', '', '', 'mane', 'mane', '2023-08-14', '0000-00-00', '', ''),
(13, 'mane', 'mane', '', '', 'mane', 'mane', '2023-08-06', '0000-00-00', '', ''),
(14, 'mane', 'mane', '', '', 'mane', 'mane', '2023-08-20', '0000-00-00', '', ''),
(15, 'mane', 'mane', '', '', 'mane', 'mane', '2023-08-14', '0000-00-00', '', ''),
(16, 'mane', 'mane', '', '', 'mane', 'mane', '2023-08-20', '0000-00-00', '', ''),
(18, 'mane', 'mane', '', '', 'mane', 'mane', '2023-09-05', '0000-00-00', '', ''),
(19, 'joseeeeeee', 'mane', '', '', 'mane', 'mane', '2023-09-01', '0000-00-00', '', ''),
(20, 'carlos', 'mane', '', '', 'mane', 'mane', '2023-09-05', '0000-00-00', '', ''),
(21, 'carlos', 'mane', '$2y$10$IUTGGhoxD1ZXwFnY7hQ5IOzwCTxhvXcetlvNJVa0npbw2pKvGFTd.', '', 'mane', 'mane', '2023-09-04', '0000-00-00', '', '');

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
  `dia` varchar(20) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `horario` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_horario`
--

INSERT INTO `tbl_horario` (`id_horario`, `dia`, `periodo`, `horario`) VALUES
(8, 'sexta', 'Noite ', '16:00  '),
(2, '', 'manhã', '12:00'),
(4, '', 'Noite', '19:00'),
(9, '', 'manhã', '12:00'),
(6, '', 'manhã', '09:00'),
(7, 'sexta', 'manhã', '7;00'),
(10, 'Segunda-Feira', 'Tarde', '13:00'),
(11, 'quarta', 'Tarde ', '15:00 '),
(12, 'Quarta-Feira', 'Tarde', '15:00'),
(13, 'Terça-Feira', 'manhã', '08:15'),
(14, 'Quinta-Feira', 'Noite', '19:00'),
(15, 'Segunda', 'Tarde ', '16:00 '),
(16, 'Quinta-Feira', 'Tarde', '13:00'),
(17, 'sexta', 'Noite ', '17:00'),
(18, 'terca', 'Tarde ', '15:00 '),
(19, 'quarta', 'Tarde', '13:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_livro`
--

CREATE TABLE `tbl_livro` (
  `id_liv` int NOT NULL,
  `isbn` int NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano` int NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `arquivo2` varchar(255) NOT NULL,
  `destaque` varchar(1) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `editora` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_livro`
--

INSERT INTO `tbl_livro` (`id_liv`, `isbn`, `categoria`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `descricao`, `editora`) VALUES
(19, 4566262, 'Drama', 'Vento Molhado', 'Broksli', 2012, 'img/img_19-09-2023_22-04-51_7259818503.png', 'pdf/arquivo_19-09-2023_22-04-51_2556057897.pdf', 'S', '', ''),
(61, 34223556, 'Liter.brasileira', 'Reformados', 'Orlando boyer', 1967, 'img/img_26-09-2023_20-54-42_5468209519.png', 'pdf/arquivo_26-09-2023_20-54-42_9866097576.pdf', 'N', '', 'Reaut'),
(22, 4567754, 'Drama', 'A menina do lago', 'Hosus', 2071, 'img/img_19-09-2023_23-51-28_5702309260.png', 'pdf/arquivo_19-09-2023_23-51-28_2919347860.pdf', 'N', '', 'Aunt'),
(25, 4545345, 'Liter.brasileira', 'Se eu ficar', 'Juninhos Rossi', 2004, 'img/img_20-09-2023_16-12-47_2188690487.png', 'pdf/arquivo_20-09-2023_16-12-47_3154070143.pdf', 'N', '', 'Aunt'),
(35, 14566525, 'Romance', 'Teste na aula II', 'C.S Lewis', 1023, 'img/img_20-09-2023_17-40-14_4126293284.png', 'pdf/arquivo_20-09-2023_17-40-14_2601045965.pdf', 'S', '', 'Pelau'),
(50, 2147483647, 'Drama', 'banana de pijama', 'daniel souza', 2013, 'img/img_23-09-2023_12-10-31_1830759961.png', 'pdf/arquivo_23-09-2023_12-10-31_38865403.pdf', 'S', '', 'fernanda bacalhalhaos'),
(55, 0, 'Selecione o gênero', 'testandooool', '', 0, 'img/img_26-09-2023_20-19-34_1722097220.', '', 'I', '', ''),
(52, 909867886, 'Ficção', 'Crepúsculo ', 'stheph hoppy', 2014, 'img/img_26-09-2023_19-42-03_2905429658.png', 'pdf/arquivo_26-09-2023_19-42-03_6622167072.pdf', 'S', '', 'Arquueiro'),
(62, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-49-34_9139810640.', '', 'I', 'dcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', ''),
(63, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-51-22_9433016946.', '', 'I', 'dcjbskkkkkkkkkkkdcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaeeeeeeeedcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaeeeeeeeekkkkkkkkkkkkkkkkkkkkkkkkaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaeeeeeeeeeeeeeeeeekkkkk', ''),
(64, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-52-59_7734591557.', '', 'I', 'dcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', ''),
(65, 343454354, 'Ficção', 'A menina que roubava livros', 'C.S Lewis', 2005, 'img/img_27-09-2023_16-54-13_2187126215.png', '', 'N', 'dcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'Contemporany'),
(66, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-59-06_4085081984.', '', 'I', '', ''),
(67, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_17-00-13_2111433251.', '', 'I', '', ''),
(69, 123, 'Romance', 'livro pdf', '', 2020, 'img/img_04-10-2023_08-42-47_1025910526.', '', 'S', '', ''),
(70, 12345, 'Terror', 'testando com O', '2020', 2020, 'img/img_04-10-2023_08-55-05_2317685040.', '0', 'S', '', ''),
(71, 123445, 'Romance', 'livros com capa', '213', 234, 'img/img_26-09-2023_19-42-03_2905429658.png', '0', 'S', '', '23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_livro_retirado`
--

CREATE TABLE `tbl_livro_retirado` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL,
  `dataEntrega` date NOT NULL,
  `dataRetirada` date NOT NULL,
  `situacao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
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
-- Índices de tabela `tbl_livro_retirado`
--
ALTER TABLE `tbl_livro_retirado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id_horario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tbl_livro`
--
ALTER TABLE `tbl_livro`
  MODIFY `id_liv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `tbl_livro_retirado`
--
ALTER TABLE `tbl_livro_retirado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
