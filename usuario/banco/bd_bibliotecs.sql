-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Out-2023 às 18:02
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.2.0

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_horario`
--

DROP TABLE IF EXISTS `tbl_horario`;
CREATE TABLE IF NOT EXISTS `tbl_horario` (
  `id_horario` int NOT NULL AUTO_INCREMENT,
  `dia` varchar(20) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `horario` varchar(20) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_horario`
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
-- Estrutura da tabela `tbl_livro`
--

DROP TABLE IF EXISTS `tbl_livro`;
CREATE TABLE IF NOT EXISTS `tbl_livro` (
  `id_liv` int NOT NULL AUTO_INCREMENT,
  `isbn` int NOT NULL,
  `categoria` varchar(40) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano` int NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `arquivo2` varchar(255) NOT NULL,
  `destaque` varchar(1) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `editora` varchar(50) NOT NULL,
  PRIMARY KEY (`id_liv`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_livro`
--

INSERT INTO `tbl_livro` (`id_liv`, `isbn`, `categoria`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `descricao`, `editora`) VALUES
(19, 4566262, 'Drama', 'Vento Molhado', 'Broksli', 2012, 'img/img_19-09-2023_22-04-51_7259818503.png', 'pdf/arquivo_19-09-2023_22-04-51_2556057897.pdf', 'S', 'teste', ''),
(61, 34223556, 'Liter.brasileira', 'Reformados', 'Orlando boyer', 1967, 'img/img_26-09-2023_20-54-42_5468209519.png', 'pdf/arquivo_26-09-2023_20-54-42_9866097576.pdf', 'N', '', 'Reaut'),
(22, 4567754, 'Drama', 'A menina do lago', 'Hosus', 2071, 'img/img_19-09-2023_23-51-28_5702309260.png', 'pdf/arquivo_19-09-2023_23-51-28_2919347860.pdf', 'N', '', 'Aunt'),
(25, 4545345, 'Liter.brasileira', 'Se eu ficar', 'Juninhos Rossi', 2004, 'img/img_20-09-2023_16-12-47_2188690487.png', 'pdf/arquivo_20-09-2023_16-12-47_3154070143.pdf', 'N', '', 'Aunt'),
(35, 14566525, 'Romance', 'Teste na aula II', 'C.S Lewis', 1023, 'img/img_20-09-2023_17-40-14_4126293284.png', 'pdf/arquivo_20-09-2023_17-40-14_2601045965.pdf', 'S', '', 'Pelau'),
(50, 2147483647, 'Drama', 'Como eu era antes de você', 'Jojo Moyes', 2013, 'img/img_23-09-2023_12-10-31_1830759961.png', 'pdf/arquivo_23-09-2023_12-10-31_38865403.pdf', 'S', 'Will (Sam Claflin) é um jovem rico e bem-sucedido, até sofrer um grave acidente que o deixa preso a uma cadeira de rodas. Profundamente depressivo, sua família contrata Louisa (Emilia Clarke) para fazer companhia a ele. Ela sempre levou uma vida modesta, com dificuldades financeiras e problemas no trabalho, mas está disposta a provar para Will que ainda existem razões para viver.', 'Intrínsecaaos'),
(55, 0, 'Selecione o gênero', '', '', 0, 'img/img_26-09-2023_20-19-34_1722097220.', '', 'I', '', ''),
(52, 909867886, 'Ficção', 'Crepúsculo ', 'stheph hoppy', 2014, 'img/img_26-09-2023_19-42-03_2905429658.png', 'pdf/arquivo_26-09-2023_19-42-03_6622167072.pdf', 'S', '', 'Arquueiro'),
(62, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-49-34_9139810640.', '', 'I', 'dcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', ''),
(63, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-51-22_9433016946.', '', 'I', 'dcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', ''),
(64, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-52-59_7734591557.', '', 'I', 'dcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', ''),
(65, 343454354, 'Ficção', 'A menina que roubava livros', 'C.S Lewis', 2005, 'img/img_27-09-2023_16-54-13_2187126215.png', '', 'N', 'dcjbskkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', 'Contemporany'),
(66, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_16-59-06_4085081984.', '', 'I', '', ''),
(67, 0, 'Selecione o gênero', '', '', 0, 'img/img_27-09-2023_17-00-13_2111433251.', '', 'I', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_reservar`
--

DROP TABLE IF EXISTS `tbl_reservar`;
CREATE TABLE IF NOT EXISTS `tbl_reservar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `rm` varchar(50) NOT NULL,
  `turma` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
