-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/11/2023 às 09:43
-- Versão do servidor: 8.0.35-0ubuntu0.22.04.1
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
  `recuperar_senha` varchar(300) NOT NULL,
  `situacao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id`, `nome`, `email`, `senha`, `dataCadastro`, `recuperar_senha`, `situacao`) VALUES
(34, 'situacao@gmail.com', 'situacao@gmail.com', '$2y$10$7/gvnJR24J3y8iV8fFi.TOPMKYOJUWjUltCdMqyZ.VtMwyoKw4qZq', '2023-10-26', '0', 0),
(35, 'a@gmail.com', 'a@gmail.com', '$2y$10$7/gvnJR24J3y8iV8fFi.TOPMKYOJUWjUltCdMqyZ.VtMwyoKw4qZq', '2023-10-26', '0', 1),
(36, 'casa@gmail.com', 'abc@gmail.com', '$2y$10$LCiEXEhanfNqsfSzxKykb.2rb5BcjkirUNeQozlW2Qw.RHzBrEv4.', '2023-10-27', '0', 0),
(37, 'admin@gmail.com', 'admin@gmail.com', '$2y$10$FEWNLhissWQegHKMmakSM.SnZJ1zSQasPisnlQ7aFGvvC09dePFgi', '2023-11-02', '0', 1);

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
  `recuperar_senha` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `situacao` int NOT NULL,
  `condicao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_aluno`
--

INSERT INTO `tbl_aluno` (`id`, `nome`, `email`, `senha`, `periodo`, `sala`, `dataCadastro`, `recuperar_senha`, `situacao`, `condicao`) VALUES
(2, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', '', '', NULL, '', 0, ''),
(3, '1', 'sas', '2', '', '', NULL, '', 0, ''),
(4, 'mateus', 'ferian', '123', '', '', NULL, '', 0, ''),
(5, 'test', 'mane@gmail.com', '12', '', '', NULL, '', 0, ''),
(6, 'pedro', 'pedro@gmail.com', '12345', '', '', NULL, '', 0, ''),
(7, 'ze', 'ze@gmail.com', '123', '', '', NULL, '', 0, ''),
(8, '12341', 'joseeeeeeeeee', '123', '', '', NULL, '', 0, ''),
(9, 'testeeeeeeeeeeeeeeeee', 'testeeeeeeeeeeeeeeeee', '123', '', '', NULL, '', 1, ''),
(10, 'maneeeeeeeee', 'maneeeeeeeee', 'maneeeeeeeee', '', '', NULL, '', 1, ''),
(11, 'crip', 'crip', '$2y$10$JoHyw5u0Q5OyfBpIY5jt.ecy0gYXiuMmVu.84.T7vUyJ9MCm/ZykC', '', '', NULL, '', 0, ''),
(12, 'data', 'data', '$2y$10$F2VcHIAUZ7ZFaQv5DiSynu/XdoszqldqSYPBnEkQdtW3vZOSmW4IS', '', '', '2023-09-03', '', 0, ''),
(13, 'as', 'as', '$2y$10$58hx7O9z9RV2pB6Yy6F8nOagak0xVUnnP.kFD5oSPcfC8qvTvWeeq', '', '', '2023-09-03', '', 0, ''),
(14, 'sad', 'as', '$2y$10$7R1292uM1BdU/Mba0QtA6O4CdRN6lbpLLGbMCVPf6IFE7BUfVkGv6', '', '', '2023-09-03', '', 0, ''),
(15, 'asd', 'sd', '$2y$10$lfilVSBo0LX6CcQHZ9r7Z.LqRM7TwUlE87.SfLz879zXtUtJ/PDTe', '', '', '2023-09-03', '', 0, ''),
(16, 'asd', 'asd', '$2y$10$hGJAdDCnIkD1E31LbTA/Hej.h/fhvVKv31pWojTjyx/ky/hkpQ0eq', '', '', '2023-09-03', '', 0, ''),
(17, 'asd', 'asd', '$2y$10$4iqeSE6bCDueSgD08mN1CepcM/4gYb/5MMCi9Ip482ReYGKG9R8qm', '', '', '2023-09-03', '', 0, ''),
(18, 'zxcz', 'zxcxc', '$2y$10$EXeEcmpT9iEvqBjvyM7a6e61f80PPxIMb868ybBOGlDO7Dvva09sC', '', '', '2023-09-03', '', 0, ''),
(19, 'qwe', 's@gmail.com', '$2y$10$3mpDohUxvlytXtD6AprWN.f01TeJfaioiaIo2ATykB8gFAzB04gPy', '', '', '2023-09-03', '', 0, ''),
(20, 'qwe', 'mateusferian10@gmail.com', '$2y$10$s9H7I2TG3FveuQSlZyzZEePDC7pPsO2CFm3Yt5Ge0GlWvq5IM7vQe', '', 'asasasas', '2023-09-03', 'NULL', 0, 'bloqueado'),
(21, 'mateus', 'bopsorurtu@gufum.com', '$2y$10$LCiEXEhanfNqsfSzxKykb.2rb5BcjkirUNeQozlW2Qw.RHzBrEv4.', '', '', '2023-09-20', 'NULL', 1, 'desbloqueado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_comentario`
--

CREATE TABLE `tbl_comentario` (
  `id` int NOT NULL,
  `nome` varchar(60) NOT NULL,
  `comentario` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `estrela` int NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_comentario`
--

INSERT INTO `tbl_comentario` (`id`, `nome`, `comentario`, `cargo`, `estrela`, `avatar`) VALUES
(2, 'ALTERANDO ESTRELA', 'ytnveroiuhtcbiouweygtv', 'cargo', 1, '../assets/imagemAvatar/1'),
(3, 'TESTE 5', 'alterado', 'alterado', 1, '../assets/imagemAvatar/1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_evento`
--

CREATE TABLE `tbl_evento` (
  `id` int NOT NULL,
  `nome` varchar(20) NOT NULL,
  `descricao` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dataEvento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_evento`
--

INSERT INTO `tbl_evento` (`id`, `nome`, `descricao`, `dataEvento`) VALUES
(1, 'teste', 'aaaaaaaaaaaaaaaaaadiuqwhv97rywe987vywe9bu 5yvnw87c65b8e76bg98n6tgn9rytgn976t9r7n0er7gr9dnhdryt9', '2023-10-27'),
(2, '2gbsse', 'bbbbbbbbbbbbbbbb', '2023-10-27'),
(3, '3hbdrbdnd', 'ccccccccc ', '2023-10-27'),
(4, '3hbdrbdnd', 'dddddddddddddddddd ', '2030-10-16'),
(5, 'CINCOOOOOOOOO', 'dddddddddddddddddd ', '2030-10-16'),
(6, 'CINCOO OOOOOOO', 'dddddddddddddddddd ', '2030-10-16'),
(7, 'casaaaaaaaaaa', 'i67lrtrt', '2030-10-16'),
(8, 'uyn', 'ui', '2023-11-04'),
(9, 'ESCOLA', 'ASDASAS', '2023-11-03'),
(10, 'ESCOLA 3', 'ASDASD', '2023-11-03');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_eventos`
--

CREATE TABLE `tbl_eventos` (
  `id_eventos` int NOT NULL,
  `nome_eventos` varchar(60) NOT NULL,
  `inf_eventos` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `id` int NOT NULL,
  `dia` varchar(20) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `horario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_horario`
--

INSERT INTO `tbl_horario` (`id`, `dia`, `periodo`, `horario`) VALUES
(23, 'Quinta-feira', 'Tarde', 'ALTEREIII');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_livro`
--

CREATE TABLE `tbl_livro` (
  `id_liv` int NOT NULL,
  `isbn` int NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano` int NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `arquivo2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `destaque` varchar(1) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `situacao` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `disponibilidade` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_livro`
--

INSERT INTO `tbl_livro` (`id_liv`, `isbn`, `categoria`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `descricao`, `editora`, `situacao`, `disponibilidade`) VALUES
(92, 1341, 'Séries da Literatura Estrangeira', 'DISPONIBILIDADE', '34', 34, '../img/img_03-11-2023_07-02-36_2798012950.png', '0', 'S', '', '34', '1', 'retirado'),
(93, 123, 'Séries da Literatura Estrangeira', 'DISPONIVEL', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(94, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO', '23', 23, '../img/img_04-11-2023_13-50-46_2947098437.png', '0', 'N', '', '23', '1', 'retirado'),
(95, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(96, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(97, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(98, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(99, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(100, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(101, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(102, 123, 'Séries da Literatura Estrangeira', 'TERCEIRO\r\n', '23', 23, '../img/img_03-11-2023_08-07-40_2737359086.png', '0', 'N', '', '23', '1', 'retirado'),
(103, 2344, 'Séries da Literatura Estrangeira', 'aulaa', '3434', 3434, '../img/img_08-11-2023_14-16-20_6645937670.jpg', '0', 'S', '', '343', '0', 'retirado'),
(104, 6757575, 'Séries da Literatura Estrangeira', 'teste 3', '7878', 7878, '', '0', 'S', '', '7878', '1', 'retirado'),
(105, 234324, 'Diversos da Literatura Estrangeira', 'TESTE 3', '3434', 343, '', '0', 'S', '', '343', '1', 'naoRetirado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_reservado`
--

CREATE TABLE `tbl_reservado` (
  `id` int NOT NULL,
  `idAluno` int NOT NULL,
  `idLivro` int NOT NULL,
  `dataDeReserva` date NOT NULL,
  `dataDeEntrega` date NOT NULL
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
-- Índices de tabela `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_evento`
--
ALTER TABLE `tbl_evento`
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
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbl_livro`
--
ALTER TABLE `tbl_livro`
  ADD PRIMARY KEY (`id_liv`);

--
-- Índices de tabela `tbl_reservado`
--
ALTER TABLE `tbl_reservado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PK01` (`idAluno`),
  ADD KEY `PK02` (`idLivro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_administrador`
--
ALTER TABLE `tbl_administrador`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbl_eventos`
--
ALTER TABLE `tbl_eventos`
  MODIFY `id_eventos` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `tbl_livro`
--
ALTER TABLE `tbl_livro`
  MODIFY `id_liv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de tabela `tbl_reservado`
--
ALTER TABLE `tbl_reservado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_reservado`
--
ALTER TABLE `tbl_reservado`
  ADD CONSTRAINT `PK01` FOREIGN KEY (`idAluno`) REFERENCES `tbl_aluno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK02` FOREIGN KEY (`idLivro`) REFERENCES `tbl_livro` (`id_liv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
