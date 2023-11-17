-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 16-Nov-2023 às 16:45
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
  `senha` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `recuperar_senha` varchar(300) NOT NULL,
  `situacao` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id`, `nome`, `email`, `senha`, `dataCadastro`, `recuperar_senha`, `situacao`) VALUES
(34, 'situacao', 'situacao@gmail.com', '$2y$10$7/gvnJR24J3y8iV8fFi.TOPMKYOJUWjUltCdMqyZ.VtMwyoKw4qZq', '2023-10-26', '0', 0),
(37, 'admin', 'admin@gmail.com', '$2y$10$FEWNLhissWQegHKMmakSM.SnZJ1zSQasPisnlQ7aFGvvC09dePFgi', '2023-11-02', '0', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_aluno`
--

DROP TABLE IF EXISTS `tbl_aluno`;
CREATE TABLE IF NOT EXISTS `tbl_aluno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `periodo` varchar(30) NOT NULL,
  `sala` varchar(30) NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `recuperar_senha` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `situacao` int NOT NULL,
  `condicao` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_aluno`
--

INSERT INTO `tbl_aluno` (`id`, `nome`, `email`, `senha`, `periodo`, `sala`, `dataCadastro`, `recuperar_senha`, `situacao`, `condicao`) VALUES
(21, 'mateus', 'mateus@gmail.com', '$2y$10$elfQjOHMKn67BJXnrjPYrOQpnulrj48iBjOJsA9ayOrP5cBQmnDAC', 'tarde', '1º DS', '2023-09-20', 'NULL', 1, 'desbloqueado'),
(22, 'carlos', 'carlos@gmail.com', '$2y$10$elfQjOHMKn67BJXnrjPYrOQpnulrj48iBjOJsA9ayOrP5cBQmnDAC', 'tarde', '1º DS', '2023-09-20', 'NULL', 1, 'bloqueado'),
(23, 'kauan', 'kauan@gmail.com', '$2y$10$elfQjOHMKn67BJXnrjPYrOQpnulrj48iBjOJsA9ayOrP5cBQmnDAC', 'tarde', '1º DS', '2023-09-20', 'NULL', 0, 'desbloqueado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_comentario`
--

DROP TABLE IF EXISTS `tbl_comentario`;
CREATE TABLE IF NOT EXISTS `tbl_comentario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `comentario` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cargo` varchar(40) NOT NULL,
  `estrela` int NOT NULL,
  `avatar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_comentario`
--

INSERT INTO `tbl_comentario` (`id`, `nome`, `comentario`, `cargo`, `estrela`, `avatar`) VALUES
(6, 'Paola Silva', 'Achei o site da biblioteca extremamente conveniente. Ele oferece a opção de fazer\r\n reservas online para retirada de livros, o que economiza muito tempo.\r\nAlém disso, a seção de recomendações de leitura me ajudou a descobrir novos títulos interessantes.\r\n', 'Aluna', 5, '../assets/imagemAvatar/5.png'),
(7, 'Michele Bird', 'Estou realmente satisfeita com o site da biblioteca! A variedade de livros disponíveis é incrível, com opções para todos os gostos e gêneros. A interface é intuitiva e fácil de usar, permitindo uma busca rápida e precisa. Nunca mais vou ficar sem leitura com essa biblioteca online!', 'Professora', 4, '../assets/imagemAvatar/4.png'),
(8, 'Carlos Antonio', 'Muito decepcionado com a experiência no seu site. Encontrei muitos problemas de usabilidade e informações desatualizadas. Não recomendaria', 'Aluno', 1, '../assets/img/imagemAvatar/1.png'),
(9, 'Maria Eduarda', 'A experiência no seu site foi abaixo das minhas expectativas. Encontrei dificuldades para navegar e as informações não eram tão úteis quanto esperava. Há espaço para melhoria', 'Professor', 2, '../assets/img/imagemAvatar/2.png'),
(10, 'Antonio Pereira', 'Meu tempo no seu site foi razoável. Encontrei algumas informações úteis, mas a usabilidade poderia ser aprimorada. Um pouco mais de organização e atualização seria bem-vindo', 'Professor', 3, '../assets/img/imagemAvatar/3.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_evento`
--

DROP TABLE IF EXISTS `tbl_evento`;
CREATE TABLE IF NOT EXISTS `tbl_evento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descricao` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dataEvento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_evento`
--

INSERT INTO `tbl_evento` (`id`, `nome`, `descricao`, `dataEvento`) VALUES
(11, 'Feira das Profissões', 'Este evento é uma feira educacional que tem como objetivo ajudar estudantes a explorar diferentes carreiras e profissões. Nele, diversas instituições ', '2023-12-07'),
(12, 'Competição de Ciências', 'A Competição de Ciências é um evento que promove o interesse e a paixão pelas ciências. Neste dia, estudantes de todas as idades podem competir em des', '2023-12-13'),
(13, 'Dia da Leitura', 'O Dia da Leitura é um evento dedicado à promoção da leitura e da literatura. Pode incluir atividades como contação de histórias, sessões de leitura, d', '2024-02-13'),
(14, 'Workshops de Arte', 'Este evento é voltado para amantes da arte e da criatividade. Nele, os participantes têm a chance de participar de workshops ministrados por artistas ', '2023-11-14'),
(15, 'Festival de Culturas', 'O Festival de Culturas é uma celebração da diversidade cultural e da interconexão global. Durante o evento, você pode esperar apresentações culturais,', '2023-12-08');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_horario`
--

DROP TABLE IF EXISTS `tbl_horario`;
CREATE TABLE IF NOT EXISTS `tbl_horario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dia` varchar(20) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `termino` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_horario`
--

INSERT INTO `tbl_horario` (`id`, `dia`, `periodo`, `horario`, `termino`) VALUES
(24, 'segunda-feira', 'Tarde', '13:00', '15:00'),
(25, 'segunda-feira', 'Manha', '10:00', '12:00'),
(28, 'segunda-feira', 'Noite', '19:00', '21:00'),
(31, 'terca-feira', 'Tarde', '14:00', '15:00'),
(32, 'terca-feira', 'Manha', '09:00', '12:00'),
(33, 'terca-feira', 'Noite', '20:00', '22:00'),
(34, 'quarta-feira', 'Tarde', '12:00', '15:00'),
(35, 'quarta-feira', 'Manha', '11:00', '12:00'),
(36, 'quarta-feira', 'Noite', '19:30', '21:00'),
(37, 'quinta-feira', 'Tarde', '15:00', '16:00'),
(38, 'quinta-feira', 'Manha', '10:30', '12:00'),
(39, 'quinta-feira', 'Noite', '19:30', '22:00'),
(40, 'sexta-feira', 'Tarde', '14:30', '15:00'),
(41, 'sexta-feira', 'Manha', '8:00', '12:00'),
(42, 'sexta-feira', 'Noite', '20:00', '21:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_livro`
--

DROP TABLE IF EXISTS `tbl_livro`;
CREATE TABLE IF NOT EXISTS `tbl_livro` (
  `id_liv` int NOT NULL AUTO_INCREMENT,
  `isbn` varchar(100) NOT NULL,
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
  `disponibilidade` varchar(40) NOT NULL,
  PRIMARY KEY (`id_liv`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_livro`
--

INSERT INTO `tbl_livro` (`id_liv`, `isbn`, `categoria`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `descricao`, `editora`, `situacao`, `disponibilidade`) VALUES
(110, '9788535914845', 'Clássico da Literatura Brasileira e Português', 'Dom Casmurro', 'Machado de Assis', 1899, '../img/img_13-11-2023_06-57-31_8543294373.jpg', '0', 'S', 'Bento de Albuquerque Santiago, advogado carioca, aos 54 anos, relembra sua juventude no romance \"Dom Casmurro\". Apelidado ironicamente por um \"poeta do trem\", ele narra a história desde o seminário até o casamento com Capitu. Desconfianças de traição e questionamentos sobre a paternidade culminam em um final irônico, sugerindo que Capitu e seu amigo Escobar podem tê-lo enganado. O livro abrange 1857 a 1875, marcando a infância, o seminário, o casamento e a ruptura de Bento.', 'Livraria Garnier.', '1', 'naoRetirado'),
(112, '978857164-8823', 'Clássico da Literatura Brasileira e Português', 'Memórias Póstumas de Brás Cubas', 'Machado de Assis ', 1881, '../img/img_13-11-2023_07-22-39_853574968.jpg', '0', 'N', 'Brás Cubas, defunto-autor, narra suas memórias póstumas, desde a infância rebelde até a morte por pneumonia. Relata amores, desilusões, política e a obsessão pelo \"emplastro Brás Cubas\". Virgília, amante, morre. O enredo, marcado por ironias, revela a busca por glória e o vazio existencial.', 'Tipografia Nacional', '1', 'naoRetirado'),
(113, '97885325-4289', 'Contos', 'O Livro dos Seres Imaginários', 'Jorge Luis Borges', 1957, '../img/img_13-11-2023_07-34-33_49384864.png', '0', 'N', 'Borges cataloga 116 seres imaginários, explorando origens e descrições de diversas fontes. Conecta autores como Lewis, Kafka e Poe, destacando criaturas como o catóblepa e anfibesna. Além de uma lista, o livro mergulha na etimologia, revelando significados de entidades como valquírias e fadas. Destaque para o peculiar Odradek, descrito por Kafka como um fuso estrelado feito de pedaços de linha, uma criatura intrigante.', 'Globo', '1', 'naoRetirado'),
(114, '9788581630327', 'Poemas e Poesias', 'A Mensagem', 'Fernando Pessoa', 1934, '../img/img_13-11-2023_07-44-28_3827597228.png', '../pdf/arquivo_13-11-2023_07-44-28_2054076804.pdf', 'N', '\"A Mensagem\", de Fernando Pessoa, é uma obra poética que explora a identidade portuguesa. Dividida em três partes, apresenta profundos insights filosóficos e místicos, refletindo sobre o destino de Portugal. A poesia do autor atravessa tempos históricos, oferecendo uma visão única da alma lusitana.', ' L&PM', '1', 'naoRetirado'),
(115, '97885390-00791', 'Auto-Ajuda e Religião', 'O Poder do Agora', 'Eckhart Tolle', 1997, '../img/img_13-11-2023_08-07-47_1750919022.png', '0', 'N', '                            Em \'O Poder do Agora\', Eckhart Tolle guia os leitores a transcender o tempo, viver no presente e encontrar paz interior. Uma jornada espiritual que oferece ensinamentos transformadores para uma vida plena e consciente.        ', 'Sextante', '1', 'naoRetirado'),
(116, '97885325-00011', 'Contos', 'As Crônicas de Nárnia', 'C.S. Lewis', 1950, '../img/img_13-11-2023_08-23-37_4246250373.png', '0', 'S', 'Em \'As Crônicas de Nárnia\', C.S. Lewis transporta os leitores para um mundo mágico e encantador, onde crianças comuns se tornam heróis em aventuras extraordinárias. Uma obra repleta de magia, amizade e descobertas que cativa leitores de todas as idades', 'Martins Fontes', '1', 'naoRetirado'),
(117, '97885254-17720', 'Diversos da Literatura Brasileira', 'O Cortiço', 'Aluísio Azevedo', 1890, '../img/img_13-11-2023_11-10-49_6672399449.png', '../pdf/img/arquivo_13-11-2023_11-10-49_8455144604.pdf', 'N', '        Em \'O Cortiço\', Aluísio Azevedo mergulha nos dramas da vida em um cortiço no Rio de Janeiro do século XIX. A obra escancara a realidade social da época, explorando questões como as relações humanas, o preconceito, e a luta pela sobrevivência. Um retrato impactante da sociedade brasileira no contexto urbano, que permanece relevante e provocativo    ', 'Martin Claret', '1', 'naoRetirado'),
(118, '9788501049940', 'Séries da Literatura Estrangeira', 'Cem Anos de Solidão', 'Gabriel García Márquez', 1967, '../img/img_13-11-2023_11-21-05_3478345804.png', '../pdf/arquivo_13-11-2023_11-21-05_5508084917.pdf', 'N', '                        Em \"Cem Anos de Solidão\", Gabriel García Márquez tece uma saga mágica que atravessa gerações da família Buendía. Através de realismo mágico, a obra explora amor, poder, política e mistério em Macondo, uma cidade fictícia que se torna um microcosmo da condição humana. Uma narrativa fascinante e única que transcende fronteiras literárias.            ', 'Record', '0', 'retirado'),
(119, '9788579801114', 'Séries da Literatura Estrangeira', 'Percy Jackson  - O Ladrão de Raios', 'Rick Riordan', 2005, '../img/img_13-11-2023_12-08-52_6207410197.png', '0', 'S', '        No primeiro livro da série, \'O Ladrão de Raios\', Rick Riordan apresenta Percy Jackson, um adolescente que descobre ser um semideus e é lançado em um mundo de deuses gregos, monstros e mitologia. Uma aventura eletrizante que combina humor, ação e elementos da mitologia antiga.    ', 'Intrínseca', '1', 'retirado'),
(120, '9788535902735', 'Contos', '1984', 'George Orwell', 1949, '../img/img_13-11-2023_22-10-12_3504734284.png', '0', 'S', 'Em um regime totalitário, Winston luta contra a opressão e a manipulação do Estado, enfrentando um mundo sombrio de vigilância e resistência.', 'Companhia das Letras', '1', 'naoRetirado'),
(121, '9788535902742', 'Séries da Literatura Estrangeira', 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 1943, '../img/img_13-11-2023_22-14-29_7282843099.png', '../pdf/arquivo_13-11-2023_11-21-05_550343484917.pdf', 'N', '        Aventuras do Pequeno Príncipe explorando planetas e descobrindo a essência da vida, revelando lições atemporais sobre amor e amizade.    ', 'Agir', '1', 'naoRetirado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_reservado`
--

DROP TABLE IF EXISTS `tbl_reservado`;
CREATE TABLE IF NOT EXISTS `tbl_reservado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idAluno` int NOT NULL,
  `idLivro` int NOT NULL,
  `dataDeReserva` date NOT NULL,
  `dataDeEntrega` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `PK01` (`idAluno`),
  KEY `PK02` (`idLivro`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tbl_reservado`
--

INSERT INTO `tbl_reservado` (`id`, `idAluno`, `idLivro`, `dataDeReserva`, `dataDeEntrega`) VALUES
(36, 21, 119, '2023-11-13', '2023-11-13');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbl_reservado`
--
ALTER TABLE `tbl_reservado`
  ADD CONSTRAINT `PK01` FOREIGN KEY (`idAluno`) REFERENCES `tbl_aluno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PK02` FOREIGN KEY (`idLivro`) REFERENCES `tbl_livro` (`id_liv`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;