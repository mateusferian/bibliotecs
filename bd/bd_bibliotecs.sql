-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Out-2023 às 20:41
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
DROP DATABASE IF EXISTS `bd_bibliotecs`;
CREATE DATABASE IF NOT EXISTS `bd_bibliotecs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `bd_bibliotecs`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_administrador`
--

DROP TABLE IF EXISTS `tbl_administrador`;
CREATE TABLE IF NOT EXISTS `tbl_administrador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `recuperar_senha` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id`, `nome`, `email`, `senha`, `dataCadastro`, `recuperar_senha`) VALUES
(21, 'mateus', 'giyato3203@tutoreve.com', '$2y$10$AI3w7NLko39AOim4fGetR.YYhtMQ0cUP3q7LqEm7WAmE8yopaiULi', '2023-09-20', 'NULL'),
(23, 'gabriely', 'gabriely@gmail.com', '$2y$10$mINh1RSrXNefVwDbUdLWlOSrLia0gDI14POVD9szRVS7vSBGuVzL2', '2023-10-13', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_aluno`
--

DROP TABLE IF EXISTS `tbl_aluno`;
CREATE TABLE IF NOT EXISTS `tbl_aluno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `periodo` varchar(30) NOT NULL,
  `sala` varchar(30) NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `recuperar_senha` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `situacao` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_aluno`
--

INSERT INTO `tbl_aluno` (`id`, `nome`, `email`, `senha`, `periodo`, `sala`, `dataCadastro`, `recuperar_senha`, `situacao`) VALUES
(2, 'as', 'mateusferian10 @gmail.com ', '07/07/2005', '', '', NULL, '', 0),
(3, '1', 'sas', '2', '', '', NULL, '', 0),
(4, 'mateus', 'ferian', '123', '', '', NULL, '', 0),
(5, 'test', 'mane@gmail.com', '12', '', '', NULL, '', 0),
(6, 'pedro', 'pedro@gmail.com', '12345', '', '', NULL, '', 0),
(7, 'ze', 'ze@gmail.com', '123', '', '', NULL, '', 0),
(8, '12341', 'joseeeeeeeeee', '123', '', '', NULL, '', 0),
(9, 'testeeeeeeeeeeeeeeeee', 'testeeeeeeeeeeeeeeeee', '123', '', '', NULL, '', 1),
(10, 'maneeeeeeeee', 'maneeeeeeeee', 'maneeeeeeeee', '', '', NULL, '', 1),
(11, 'crip', 'crip', '$2y$10$JoHyw5u0Q5OyfBpIY5jt.ecy0gYXiuMmVu.84.T7vUyJ9MCm/ZykC', '', '', NULL, '', 0),
(12, 'data', 'data', '$2y$10$F2VcHIAUZ7ZFaQv5DiSynu/XdoszqldqSYPBnEkQdtW3vZOSmW4IS', '', '', '2023-09-03', '', 0),
(13, 'as', 'as', '$2y$10$58hx7O9z9RV2pB6Yy6F8nOagak0xVUnnP.kFD5oSPcfC8qvTvWeeq', '', '', '2023-09-03', '', 0),
(14, 'sad', 'as', '$2y$10$7R1292uM1BdU/Mba0QtA6O4CdRN6lbpLLGbMCVPf6IFE7BUfVkGv6', '', '', '2023-09-03', '', 0),
(15, 'asd', 'sd', '$2y$10$lfilVSBo0LX6CcQHZ9r7Z.LqRM7TwUlE87.SfLz879zXtUtJ/PDTe', '', '', '2023-09-03', '', 0),
(16, 'asd', 'asd', '$2y$10$hGJAdDCnIkD1E31LbTA/Hej.h/fhvVKv31pWojTjyx/ky/hkpQ0eq', '', '', '2023-09-03', '', 0),
(17, 'asd', 'asd', '$2y$10$4iqeSE6bCDueSgD08mN1CepcM/4gYb/5MMCi9Ip482ReYGKG9R8qm', '', '', '2023-09-03', '', 0),
(18, 'zxcz', 'zxcxc', '$2y$10$EXeEcmpT9iEvqBjvyM7a6e61f80PPxIMb868ybBOGlDO7Dvva09sC', '', '', '2023-09-03', '', 0),
(19, 'qwe', 'asdad', '$2y$10$3mpDohUxvlytXtD6AprWN.f01TeJfaioiaIo2ATykB8gFAzB04gPy', '', '', '2023-09-03', '', 0),
(20, 'qwe', 'mateusferian10@gmail.com', '$2y$10$s9H7I2TG3FveuQSlZyzZEePDC7pPsO2CFm3Yt5Ge0GlWvq5IM7vQe', '', 'asasasas', '2023-09-03', 'NULL', 0),
(21, 'mateus', 'bopsorurtu@gufum.com', '$2y$10$LCiEXEhanfNqsfSzxKykb.2rb5BcjkirUNeQozlW2Qw.RHzBrEv4.', '', '', '2023-09-20', 'NULL', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_eventos`
--

DROP TABLE IF EXISTS `tbl_eventos`;
CREATE TABLE IF NOT EXISTS `tbl_eventos` (
  `id_eventos` int NOT NULL AUTO_INCREMENT,
  `nome_eventos` varchar(60) NOT NULL,
  `inf_eventos` varchar(100) NOT NULL,
  PRIMARY KEY (`id_eventos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano` int NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `arquivo2` varchar(255) NOT NULL,
  `destaque` varchar(1) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `editora` varchar(50) NOT NULL,
  `situacao` varchar(30) NOT NULL,
  PRIMARY KEY (`id_liv`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_livro`
--

INSERT INTO `tbl_livro` (`id_liv`, `isbn`, `categoria`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `descricao`, `editora`, `situacao`) VALUES
(73, 234324, 'Séries da Literatura Estrangeira', 'categoria nova', '565', 23, 'img/img_25-10-2023_16-28-23_9784972110.', '0', 'S', '2323232323', '565', '1'),
(74, 0, 'Séries da Literatura Estrangeira', 'uyuit', 'i', 0, 'img/img_25-10-2023_16-52-38_9650139344.jpg', '../pdf/arquivo_25-10-2023_16-52-38_5284186249.pdf', 'S', 'okok', '565', '1'),
(75, 0, 'Séries da Literatura Estrangeira', 'fs', 'fs', 200, 'img/img_25-10-2023_16-54-25_9732870173.jpg', '../pdf/arquivo_25-10-2023_16-54-25_6090897677.pdf', 'N', 'oooooooo', '565', '1'),
(76, 546565, 'Auto-Ajuda e Religião', 'hhh', 'hh', 2000, '../img/img_25-10-2023_16-56-15_69116916.jpg', '../pdf/arquivo_25-10-2023_16-56-15_6557666120.pdf', 'S', 'hfhf', 'hf', '1'),
(77, 214234324, 'Selecione o gênero', 'testando ', '34', 34, '../img/img_25-10-2023_17-06-51_3767841944.jpg', '0', 'S', '4545454', '34', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=414 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_reservar`
--

INSERT INTO `tbl_reservar` (`id`, `nome`, `rm`, `turma`) VALUES
(1, '19', '', ''),
(2, '', '', ''),
(3, '', '', ''),
(4, '', '', ''),
(5, '', '', ''),
(6, '', '', ''),
(7, '', '', ''),
(8, '', '', ''),
(9, '', '', ''),
(10, '', '', ''),
(11, '', '', ''),
(12, '', '', ''),
(13, '', '', ''),
(14, '', '', ''),
(15, '', '', ''),
(16, '', '', ''),
(17, '', '', ''),
(18, '', '', ''),
(19, '', '', ''),
(20, '', '', ''),
(21, '', '', ''),
(22, '', '', ''),
(23, '', '', ''),
(24, '', '', ''),
(25, '', '', ''),
(26, '', '', ''),
(27, '', '', ''),
(28, '', '', ''),
(29, '', '', ''),
(30, '', '', ''),
(31, '', '', ''),
(32, '', '', ''),
(33, '', '', ''),
(34, '', '', ''),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, '', '', ''),
(45, '', '', ''),
(46, '', '', ''),
(47, '', '', ''),
(48, '', '', ''),
(49, '', '', ''),
(50, '', '', ''),
(51, '', '', ''),
(52, '', '', ''),
(53, '', '', ''),
(54, '', '', ''),
(55, '', '', ''),
(56, '', '', ''),
(57, '', '', ''),
(58, '19', '', ''),
(59, '', '', ''),
(60, '', '', ''),
(61, '', '', ''),
(62, '', '', ''),
(63, '', '', ''),
(64, '', '', ''),
(65, '', '', ''),
(66, '', '', ''),
(67, '', '', ''),
(68, '', '', ''),
(69, '', '', ''),
(70, '', '', ''),
(71, '', '', ''),
(72, '', '', ''),
(73, '', '', ''),
(74, '', '', ''),
(75, '', '', ''),
(76, '', '', ''),
(77, '', '', ''),
(78, '', '', ''),
(79, '', '', ''),
(80, '', '', ''),
(81, '', '', ''),
(82, '', '', ''),
(83, '', '', ''),
(84, '', '', ''),
(85, '', '', ''),
(86, '', '', ''),
(87, '', '', ''),
(88, '', '', ''),
(89, '', '', ''),
(90, '', '', ''),
(91, '', '', ''),
(92, '', '', ''),
(93, '', '', ''),
(94, '', '', ''),
(95, '', '', ''),
(96, '', '', ''),
(97, '', '', ''),
(98, '', '', ''),
(99, '', '', ''),
(100, '', '', ''),
(101, '', '', ''),
(102, '', '', ''),
(103, '', '', ''),
(104, '', '', ''),
(105, '', '', ''),
(106, '', '', ''),
(107, '', '', ''),
(108, '', '', ''),
(109, '', '', ''),
(110, '', '', ''),
(111, '', '', ''),
(112, '', '', ''),
(113, '', '', ''),
(114, '', '', ''),
(115, '', '', ''),
(116, '', '', ''),
(117, '', '', ''),
(118, '', '', ''),
(119, '', '', ''),
(120, '', '', ''),
(121, '', '', ''),
(122, '', '', ''),
(123, '', '', ''),
(124, '', '', ''),
(125, '', '', ''),
(126, '', '', ''),
(127, '', '', ''),
(128, '', '', ''),
(129, '', '', ''),
(130, '', '', ''),
(131, '', '', ''),
(132, '', '', ''),
(133, '', '', ''),
(134, '', '', ''),
(135, '', '', ''),
(136, '', '', ''),
(137, '', '', ''),
(138, '', '', ''),
(139, '', '', ''),
(140, '', '', ''),
(141, '', '', ''),
(142, '', '', ''),
(143, '', '', ''),
(144, '', '', ''),
(145, '', '', ''),
(146, '', '', ''),
(147, '', '', ''),
(148, '', '', ''),
(149, '', '', ''),
(150, '', '', ''),
(151, '', '', ''),
(152, '', '', ''),
(153, '', '', ''),
(154, '', '', ''),
(155, '', '', ''),
(156, '', '', ''),
(157, '', '', ''),
(158, '', '', ''),
(159, '', '', ''),
(160, '', '', ''),
(161, '', '', ''),
(162, '', '', ''),
(163, '', '', ''),
(164, '', '', ''),
(165, '', '', ''),
(166, '', '', ''),
(167, '', '', ''),
(168, '', '', ''),
(169, '', '', ''),
(170, '', '', ''),
(171, '', '', ''),
(172, '', '', ''),
(173, '', '', ''),
(174, '', '', ''),
(175, '', '', ''),
(176, '', '', ''),
(177, '', '', ''),
(178, '', '', ''),
(179, '', '', ''),
(180, '', '', ''),
(181, '', '', ''),
(182, '', '', ''),
(183, '', '', ''),
(184, '', '', ''),
(185, '', '', ''),
(186, '', '', ''),
(187, '', '', ''),
(188, '', '', ''),
(189, '', '', ''),
(190, '', '', ''),
(191, '', '', ''),
(192, '', '', ''),
(193, '', '', ''),
(194, '', '', ''),
(195, '', '', ''),
(196, '', '', ''),
(197, '', '', ''),
(198, '', '', ''),
(199, '', '', ''),
(200, '', '', ''),
(201, '', '', ''),
(202, '', '', ''),
(203, '', '', ''),
(204, '', '', ''),
(205, '', '', ''),
(206, '', '', ''),
(207, '', '', ''),
(208, '', '', ''),
(209, '', '', ''),
(210, '', '', ''),
(211, '', '', ''),
(212, '', '', ''),
(213, '', '', ''),
(214, '', '', ''),
(215, '', '', ''),
(216, '', '', ''),
(217, '', '', ''),
(218, '', '', ''),
(219, '', '', ''),
(220, '', '', ''),
(221, '', '', ''),
(222, '', '', ''),
(223, '', '', ''),
(224, '', '', ''),
(225, '', '', ''),
(226, '', '', ''),
(227, '', '', ''),
(228, '', '', ''),
(229, '', '', ''),
(230, '', '', ''),
(231, '', '', ''),
(232, '', '', ''),
(233, '', '', ''),
(234, '', '', ''),
(235, '', '', ''),
(236, '', '', ''),
(237, '', '', ''),
(238, '', '', ''),
(239, '', '', ''),
(240, '', '', ''),
(241, '', '', ''),
(242, '', '', ''),
(243, '', '', ''),
(244, '', '', ''),
(245, '', '', ''),
(246, '', '', ''),
(247, '', '', ''),
(248, '', '', ''),
(249, '', '', ''),
(250, '', '', ''),
(251, '', '', ''),
(252, '', '', ''),
(253, '', '', ''),
(254, '', '', ''),
(255, '', '', ''),
(256, '', '', ''),
(257, '', '', ''),
(258, '', '', ''),
(259, '', '', ''),
(260, '', '', ''),
(261, '', '', ''),
(262, '', '', ''),
(263, '', '', ''),
(264, '', '', ''),
(265, '', '', ''),
(266, '', '', ''),
(267, '', '', ''),
(268, '', '', ''),
(269, '', '', ''),
(270, '', '', ''),
(271, '', '', ''),
(272, '', '', ''),
(273, '', '', ''),
(274, '', '', ''),
(275, '', '', ''),
(276, '', '', ''),
(277, '', '', ''),
(278, '', '', ''),
(279, '', '', ''),
(280, '', '', ''),
(281, '', '', ''),
(282, '', '', ''),
(283, '', '', ''),
(284, '', '', ''),
(285, '', '', ''),
(286, '', '', ''),
(287, '', '', ''),
(288, '', '', ''),
(289, '', '', ''),
(290, '', '', ''),
(291, '', '', ''),
(292, '', '', ''),
(293, '', '', ''),
(294, '', '', ''),
(295, '', '', ''),
(296, '', '', ''),
(297, '', '', ''),
(298, '', '', ''),
(299, '', '', ''),
(300, '', '', ''),
(301, '', '', ''),
(302, '', '', ''),
(303, '', '', ''),
(304, '', '', ''),
(305, '', '', ''),
(306, '', '', ''),
(307, '', '', ''),
(308, '', '', ''),
(309, '', '', ''),
(310, '', '', ''),
(311, '', '', ''),
(312, '', '', ''),
(313, '', '', ''),
(314, '', '', ''),
(315, '', '', ''),
(316, '', '', ''),
(317, '', '', ''),
(318, '', '', ''),
(319, '', '', ''),
(320, '', '', ''),
(321, '', '', ''),
(322, '', '', ''),
(323, '', '', ''),
(324, '', '', ''),
(325, '', '', ''),
(326, '', '', ''),
(327, '', '', ''),
(328, '', '', ''),
(329, '', '', ''),
(330, '', '', ''),
(331, '', '', ''),
(332, '', '', ''),
(333, '', '', ''),
(334, '', '', ''),
(335, '', '', ''),
(336, '', '', ''),
(337, '', '', ''),
(338, '', '', ''),
(339, '', '', ''),
(340, '', '', ''),
(341, '', '', ''),
(342, '', '', ''),
(343, '', '', ''),
(344, '', '', ''),
(345, '', '', ''),
(346, '', '', ''),
(347, '', '', ''),
(348, '', '', ''),
(349, '', '', ''),
(350, '', '', ''),
(351, '', '', ''),
(352, '', '', ''),
(353, '', '', ''),
(354, '', '', ''),
(355, '', '', ''),
(356, '', '', ''),
(357, '', '', ''),
(358, '', '', ''),
(359, '', '', ''),
(360, '', '', ''),
(361, '', '', ''),
(362, '', '', ''),
(363, '', '', ''),
(364, '', '', ''),
(365, '', '', ''),
(366, '', '', ''),
(367, '', '', ''),
(368, '', '', ''),
(369, '', '', ''),
(370, '', '', ''),
(371, '', '', ''),
(372, '', '', ''),
(373, '', '', ''),
(374, '', '', ''),
(375, '', '', ''),
(376, '', '', ''),
(377, '', '', ''),
(378, '', '', ''),
(379, '', '', ''),
(380, '', '', ''),
(381, '', '', ''),
(382, '', '', ''),
(383, '', '', ''),
(384, '', '', ''),
(385, '', '', ''),
(386, '', '', ''),
(387, '', '', ''),
(388, '', '', ''),
(389, '', '', ''),
(390, '', '', ''),
(391, '', '', ''),
(392, '', '', ''),
(393, '', '', ''),
(394, '', '', ''),
(395, '', '', ''),
(396, '', '', ''),
(397, '', '', ''),
(398, '', '', ''),
(399, '', '', ''),
(400, '', '', ''),
(401, '', '', ''),
(402, '', '', ''),
(403, '', '', ''),
(404, '', '', ''),
(405, '', '', ''),
(406, '', '', ''),
(407, '', '', ''),
(408, '', '', ''),
(409, '', '', ''),
(410, '', '', ''),
(411, '', '', ''),
(412, '', '', ''),
(413, '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
