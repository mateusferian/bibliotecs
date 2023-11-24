-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 24/11/2023 às 09:30
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
  `senha` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dataCadastro` date DEFAULT NULL,
  `recuperar_senha` varchar(300) NOT NULL,
  `situacao` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`id`, `nome`, `email`, `senha`, `dataCadastro`, `recuperar_senha`, `situacao`) VALUES
(37, 'mily', 'milyrochhier@gmail.com', '$2y$10$FEWNLhissWQegHKMmakSM.SnZJ1zSQasPisnlQ7aFGvvC09dePFgi', '2023-11-02', '0', 1),
(38, 'Ana Silva', 'na.silva@email.com', '$2y$10$K4aEmYwP9UWCIah7CR5Bj.KRmnDrLOwRoQ8iTD9Csq5NZmee8128a', '2023-11-22', '0', 1),
(39, 'Carlos Oliveira', 'carlos.oliveira@email.com', '$2y$10$kGdklP90DOpH8Y8YAG0N2uNjaI5YQhjSBKedrDl051runRqTUo6C.', '2023-11-22', '0', 1),
(40, 'Sofia Pereira', 'sofia.pereira@email.com', '$2y$10$MDq8ui2sBMtI9q6d3JUaa.5x9LtVgez0fQNbWR5hjczRtKrn8zcKi', '2023-11-22', '0', 1),
(41, 'Pedro Santos', 'pedro.santos@email.com', '$2y$10$chr2cS0VncKSgD.H15GKt.wzT3mngGNk7JVtYbrvLigCDxogZEodG', '2023-11-22', '0', 1),
(42, 'Mariana Costa', 'mariana.costa@email.com', '$2y$10$iHLewZKydKzd8NPjDZ8FduOJGMIN4T8AER48g2.DGBhtbZNCfPuSG', '2023-11-22', '0', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_aluno`
--

CREATE TABLE `tbl_aluno` (
  `id` int NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `senha` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
(21, 'camily', 'camisyvitoria1000@gmail.com', '$2y$10$elfQjOHMKn67BJXnrjPYrOQpnulrj48iBjOJsA9ayOrP5cBQmnDAC', 'tarde', '3ds', '2023-09-20', 'NULL', 1, 'desbloqueado'),
(22, 'carlos', 'carlos@gmail.com', '$2y$10$elfQjOHMKn67BJXnrjPYrOQpnulrj48iBjOJsA9ayOrP5cBQmnDAC', 'tarde', '3ds', '2023-09-20', 'NULL', 1, 'bloqueado'),
(23, 'kauan', 'kauan@gmail.com', '$2y$10$elfQjOHMKn67BJXnrjPYrOQpnulrj48iBjOJsA9ayOrP5cBQmnDAC', 'tarde', '3ds', '2023-09-20', 'NULL', 0, 'desbloqueado'),
(24, 'Camily', 'camilisilva472@gmail.com', '$2y$10$dSf1AXC8EurPtSBFFN4SB.x1jTBOmqQeb/qLiq.eaovcFOfhWfkFm', 'tarde', '3º DS', '2023-11-22', NULL, 1, 'desbloqueado'),
(25, 'Maysa', 'maysa472@gmail.com', '$2y$10$dSf1AXC8EurPtSBFFN4SB.x1jTBOmqQeb/qLiq.eaovcFOfhWfkFm', 'manhã', '3º DS', '2023-11-22', NULL, 1, 'desbloqueado'),
(26, 'Gabrielly Flauzyno', 'gabrielly.silva189@etec.sp.gov.br', '$2y$10$OtJyFleoh2CZ5ewGdNoNtuVnEptXz9CPiCbIqlU6hWMU4zHZ7qQ6S', 'tarde', '3º DS', '2023-11-22', NULL, 1, 'desbloqueado'),
(27, 'Maria Eduarda Victor', 'marida_victor189@etec.sp.gov.br', '$2y$10$OtJyFleoh2CZ5ewGdNoNtuVnEptXz9CPiCbIqlU6hWMU4zHZ7qQ6S', 'manhã', '3º DS', '2023-11-22', NULL, 1, 'desbloqueado'),
(28, 'Mateus Ferian', 'Mateusferian@etec.sp.gov.br', '$2y$10$Xx4bZK1giFBgfRLHHs4Eoetbw/JdQLMvwpK7DJTWT.La5hUHyH5/K', 'manhã', '3º DS', '2023-11-22', NULL, 1, 'desbloqueado'),
(29, 'Raquel Menoce', 'raquel_menoce@etec.sp.gov.br', '$2y$10$Xx4bZK1giFBgfRLHHs4Eoetbw/JdQLMvwpK7DJTWT.La5hUHyH5/K', 'manhã', '3º DS', '2023-11-22', NULL, 1, 'desbloqueado');

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
(6, 'Paola Silva', 'Achei o site da biblioteca extremamente conveniente. Ele oferece a opção de fazer\r\n reservas online para retirada de livros, o que economiza muito tempo.\r\nAlém disso, a seção de recomendações de leitura me ajudou a descobrir novos títulos interessantes.\r\n', 'Aluna', 5, '../assets/imagemAvatar/5.png'),
(7, 'Michele Bird', 'Estou realmente satisfeita com o site da biblioteca! A variedade de livros disponíveis é incrível, com opções para todos os gostos e gêneros. A interface é intuitiva e fácil de usar, permitindo uma busca rápida e precisa. Nunca mais vou ficar sem leitura com essa biblioteca online!', 'Professora', 4, '../assets/imagemAvatar/4.png'),
(8, 'Carlos Antonio', 'Muito decepcionado com a experiência no seu site. Encontrei muitos problemas de usabilidade e informações desatualizadas. Não recomendaria', 'Aluno', 1, '../assets/img/imagemAvatar/1.png'),
(9, 'Maria Eduarda', 'A experiência no seu site foi abaixo das minhas expectativas. Encontrei dificuldades para navegar e as informações não eram tão úteis quanto esperava. Há espaço para melhoria', 'Professor', 2, '../assets/img/imagemAvatar/2.png'),
(10, 'Antonio Pereira', 'Meu tempo no seu site foi razoável. Encontrei algumas informações úteis, mas a usabilidade poderia ser aprimorada. Um pouco mais de organização e atualização seria bem-vindo', 'Professor', 3, '../assets/img/imagemAvatar/3.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_evento`
--

CREATE TABLE `tbl_evento` (
  `id` int NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descricao` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dataEvento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_evento`
--

INSERT INTO `tbl_evento` (`id`, `nome`, `descricao`, `dataEvento`) VALUES
(11, 'Feira das Profissões', 'Este evento é uma feira educacional que tem como objetivo ajudar estudantes a explorar diferentes carreiras e profissões. Nele, diversas instituições ', '2023-12-07'),
(12, 'Competição de Ciências', 'A Competição de Ciências é um evento que promove o interesse e a paixão pelas ciências. Neste dia, estudantes de todas as idades podem competir em des', '2023-12-13'),
(13, 'Dia da Leitura', 'O Dia da Leitura é um evento dedicado à promoção da leitura e da literatura. Pode incluir atividades como contação de histórias, sessões de leitura, d', '2024-02-13'),
(14, 'Workshops de Arte', 'Este evento é voltado para amantes da arte e da criatividade. Nele, os participantes têm a chance de participar de workshops ministrados por artistas ', '2023-11-14'),
(15, 'Festival de Culturas', 'O Festival de Culturas é uma celebração da diversidade cultural e da interconexão global. Durante o evento, você pode esperar apresentações culturais,', '2023-12-08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_horario`
--

CREATE TABLE `tbl_horario` (
  `id` int NOT NULL,
  `dia` varchar(20) NOT NULL,
  `periodo` varchar(15) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `termino` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_horario`
--

INSERT INTO `tbl_horario` (`id`, `dia`, `periodo`, `horario`, `termino`) VALUES
(24, 'segunda-feira', 'Manha', '07:00', '11:40'),
(25, 'segunda-feira', 'Tarde', '13:00', '16:30'),
(26, 'segunda-feira', 'Manha', '07:00 ', '08:20'),
(27, 'terca-feira', 'Manha', '8:50', '11:40'),
(28, 'terca-feira', 'Tarde', '12:40', '16:30'),
(29, 'terca-feira', 'Noite', '18:00', '20:00'),
(30, 'quarta-feira', 'Tarde', '14:00', '17:00'),
(31, 'quarta-feira', 'Manha', '07:00', '08:00'),
(32, 'quarta-feira', 'Tarde', '13:00', '16:30'),
(33, 'quarta-feira', 'Noite', '18:00', '20:00'),
(34, 'quinta-feira', 'Manha', '07:00', '11:40'),
(35, 'quinta-feira', 'Tarde', '13:00', '16:30'),
(36, 'segunda-feira', 'Noite', '18:00', '20:00'),
(37, 'sexta-feira', 'Manha', '07:00', '12:30'),
(38, 'sexta-feira', 'Tarde', '13:00', '16:30'),
(39, 'quinta-feira', 'Noite', '18:00', '20:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_livro`
--

CREATE TABLE `tbl_livro` (
  `id_liv` int NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nome` varchar(500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `ano` int NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `arquivo2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `destaque` varchar(1) NOT NULL,
  `descricao` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `editora` varchar(50) NOT NULL,
  `situacao` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `disponibilidade` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tbl_livro`
--

INSERT INTO `tbl_livro` (`id_liv`, `isbn`, `categoria`, `nome`, `autor`, `ano`, `arquivo`, `arquivo2`, `destaque`, `descricao`, `editora`, `situacao`, `disponibilidade`) VALUES
(110, '9788535914845', 'Séries da Literatura Estrangeira', 'Dom Casmurro', 'Machado de Assis', 1899, '../img/img_13-11-2023_06-57-31_8543294373.jpg', '0', 'S', '        Bento de Albuquerque Santiago, advogado carioca, aos 54 anos, relembra sua juventude no romance \"Dom Casmurro\". Apelidado ironicamente por um \"poeta do trem\", ele narra a história desde o seminário até o casamento com Capitu. Desconfianças de traição e questionamentos sobre a paternidade culminam em um final irônico, sugerindo que Capitu e seu amigo Escobar podem tê-lo enganado. O livro abrange 1857 a 1875, marcando a infância, o seminário, o casamento e a ruptura de Bento.    ', 'Livraria Garnier.', '1', 'naoRetirado'),
(112, '978857164-8823', 'Clássico da Literatura Brasileira e Português', 'Memórias Póstumas de Brás Cubas', 'Machado de Assis ', 1881, '../img/img_13-11-2023_07-22-39_853574968.jpg', '0', 'N', 'Brás Cubas, defunto-autor, narra suas memórias póstumas, desde a infância rebelde até a morte por pneumonia. Relata amores, desilusões, política e a obsessão pelo \"emplastro Brás Cubas\". Virgília, amante, morre. O enredo, marcado por ironias, revela a busca por glória e o vazio existencial.', 'Tipografia Nacional', '1', 'naoRetirado'),
(113, '97885325-4289', 'Contos', 'O Livro dos Seres Imaginários', 'Jorge Luis Borges', 1957, '../img/img_13-11-2023_07-34-33_49384864.png', '0', 'N', 'Borges cataloga 116 seres imaginários, explorando origens e descrições de diversas fontes. Conecta autores como Lewis, Kafka e Poe, destacando criaturas como o catóblepa e anfibesna. Além de uma lista, o livro mergulha na etimologia, revelando significados de entidades como valquírias e fadas. Destaque para o peculiar Odradek, descrito por Kafka como um fuso estrelado feito de pedaços de linha, uma criatura intrigante.', 'Globo', '1', 'naoRetirado'),
(114, '9788581630327', 'Poemas e Poesias', 'A Mensagem', 'Fernando Pessoa', 1934, '../img/img_13-11-2023_07-44-28_3827597228.png', '../pdf/arquivo_13-11-2023_07-44-28_2054076804.pdf', 'N', '\"A Mensagem\", de Fernando Pessoa, é uma obra poética que explora a identidade portuguesa. Dividida em três partes, apresenta profundos insights filosóficos e místicos, refletindo sobre o destino de Portugal. A poesia do autor atravessa tempos históricos, oferecendo uma visão única da alma lusitana.', ' L&PM', '1', 'naoRetirado'),
(115, '97885390-00791', 'Auto-Ajuda e Religião', 'O Poder do Agora', 'Eckhart Tolle', 1997, '../img/img_13-11-2023_08-07-47_1750919022.png', '0', 'N', '                            Em \'O Poder do Agora\', Eckhart Tolle guia os leitores a transcender o tempo, viver no presente e encontrar paz interior. Uma jornada espiritual que oferece ensinamentos transformadores para uma vida plena e consciente.        ', 'Sextante', '1', 'naoRetirado'),
(116, '97885325-00011', 'Contos', 'As Crônicas de Nárnia', 'C.S. Lewis', 1950, '../img/img_13-11-2023_08-23-37_4246250373.png', '0', 'S', 'Em \'As Crônicas de Nárnia\', C.S. Lewis transporta os leitores para um mundo mágico e encantador, onde crianças comuns se tornam heróis em aventuras extraordinárias. Uma obra repleta de magia, amizade e descobertas que cativa leitores de todas as idades', 'Martins Fontes', '1', 'naoRetirado'),
(118, '9788501049940', 'Séries da Literatura Estrangeira', 'Cem Anos de Solidão', 'Gabriel García Márquez', 1967, '../img/img_13-11-2023_11-21-05_3478345804.png', '../pdf/arquivo_13-11-2023_11-21-05_5508084917.pdf', 'N', '                        Em \"Cem Anos de Solidão\", Gabriel García Márquez tece uma saga mágica que atravessa gerações da família Buendía. Através de realismo mágico, a obra explora amor, poder, política e mistério em Macondo, uma cidade fictícia que se torna um microcosmo da condição humana. Uma narrativa fascinante e única que transcende fronteiras literárias.            ', 'Record', '0', 'retirado'),
(119, '9788579801114', 'Séries da Literatura Estrangeira', 'Percy Jackson  - O Ladrão de Raios', 'Rick Riordan', 2005, '../img/img_13-11-2023_12-08-52_6207410197.png', '0', 'S', '        No primeiro livro da série, \'O Ladrão de Raios\', Rick Riordan apresenta Percy Jackson, um adolescente que descobre ser um semideus e é lançado em um mundo de deuses gregos, monstros e mitologia. Uma aventura eletrizante que combina humor, ação e elementos da mitologia antiga.    ', 'Intrínseca', '1', 'retirado'),
(120, '9788535902735', 'Contos', '1984', 'George Orwell', 1949, '../img/img_13-11-2023_22-10-12_3504734284.png', '0', 'S', 'Em um regime totalitário, Winston luta contra a opressão e a manipulação do Estado, enfrentando um mundo sombrio de vigilância e resistência.', 'Companhia das Letras', '1', 'naoRetirado'),
(121, '9788535902742', 'Séries da Literatura Estrangeira', 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', 1943, '', NULL, 'N', '                Aventuras do Pequeno Príncipe explorando planetas e descobrindo a essência da vida, revelando lições atemporais sobre amor e amizade.        ', 'Agir', '1', 'naoRetirado'),
(122, ' 978-85-5534-027-7', 'Séries da Literatura Estrangeira', 'A Prisão do Rei', 'Victoria Aveyard', 2018, '../img/img_21-11-2023_21-54-55_8264540423.png', '0', 'N', 'Mare Barrow foi capturada e passa os dias presa no palácio, impotente sem seu poder, atormentada por seus erros. Ela está à mercê do garoto por quem um dia se apaixonou, um jovem dissimulado que a enganou e traiu. Agora rei, Maven continua com os planos de sua mãe, fazendo de tudo para manter o controle de Norta — e de sua prisioneira. Enquanto Mare tenta aguentar o peso sufocante das Pedras Silenciosas, o resto da Guarda Escarlate se organiza, treinando e expandindo. Com a rebelião cada    ', 'Editora Schwarcz', '1', 'naoRetirado'),
(123, '978-85-7799-062-7', 'Diversos da Literatura Estrangeira', 'O silêncio dos inocentes', 'Thomas Harris', 2015, '../img/img_21-11-2023_22-33-16_6702804064.png', '0', 'N', '                 The Silence of the Lambs (bra/prt: O Silêncio dos Inocentes)[2][4] é um filme norte-americano de 1991 dos gêneros suspense, drama e terror, dirigido por Jonathan Demme e estrelado por Jodie Foster, Anthony Hopkins, Ted Levine e Scott Glenn. Escrito por Ted Tally baseado no livro homônimo publicado em 1988 por Thomas Harris, o filme é o segundo a apresentar o Dr. Hannibal Lecter, um brilhante psiquiatra e assassino canibal em série, antecedido por Caçador de Assassinos de 1986, d', 'Bestbolso', '1', 'naoRetirado'),
(124, '978-85-7665-526-8', 'Diversos da Literatura Estrangeira', 'A princesa de gelo', 'Camila Lackberg', 2010, '../img/img_21-11-2023_22-46-08_2782948047.png', '0', 'S', 'De regresso à cidadezinha onde nasceu depois da morte dos pais, a escritora Erica Falk encontra uma comunidade à beira da tragédia. A morte da sua amiga de infância, Alex, é só o princípio do que está para vir.\r\nCom os pulsos cortados e o corpo mergulhado na água congelada da banheira, tudo leva a crer que Alex se suicidou. evocação da carismática Alex, Erica, que não a via\r\nQuando começa a escrever uma desde a infância, vê-se de repente no centro dos acontecimentos. Ao mesmo tempo, Patrik Hedst', 'Planeta', '1', 'naoRetirado'),
(125, '978-85-8057-380-0', 'Diversos da Literatura Estrangeira', 'A culpa é das estrelas ', 'John Green', 2013, '../img/img_21-11-2023_22-52-20_1416680262.png', '0', 'S', 'A Culpa é das Estrelas gira em torno de Hazel e Gus, dois adolescentes que se conhecem em um grupo de apoio a pacientes com câncer, e compartilham, além do humor ácido e do desdém por tudo o que é convencional, uma história de amor que os faz embarcar em uma jornada inesquecível.\r\n\r\n', 'Intrínseca', '1', 'naoRetirado'),
(126, '978-85-8163-739-5', 'Diversos da Literatura Estrangeira', 'Desafio', 'C. J Redwine', 2014, '../img/img_21-11-2023_22-55-11_3685056332.png', '0', 'S', ' No interior das muralhas de Baalboden, à sombra do brutal Comandante da cidade, Rachel Adams guarda um segredo. Enquanto as outras garotas fazem vestidos e obedecem a seus Protetores, Rachel é capaz de sobreviver nas florestas e de manejar uma espada com destreza. Quando seu pai, Jared, é declarado morto em uma missão, o Comandante designa para Rachel um novo Protetor: Logan, o aprendiz de seu pai, o mesmo rapaz a quem Rachel declarou o seu amor há dois anos, e o mesmo que a rejeitou.\r\nCom nada', 'Novo Conceito', '1', 'naoRetirado'),
(127, '978-85-510-0363-3', 'Diversos da Literatura Estrangeira', 'O desaparecimento de Stephane Mailer', 'Joel Dicker', 2018, '../img/img_21-11-2023_23-02-35_2498407576.png', '0', 'N', 'Uma grande expectativa toma conta da badalada cidade de Orphea, nos Hamptons. A população aguarda ansiosamente a estreia de seu primeiro festival de teatro. Mas o prefeito está atrasado para a cerimônia.A poucos metros dali, Samuel Padalin percorre as ruas desertas em busca da esposa. Diante da casa do prefeito, um corpo é encontrado. E, no interior da residência, a cena é ainda pior: uma família inteira foi assassinada com extrema violência. Vinte anos após a resolução do homicídio, novos fatos', 'Intrínseca', '1', 'naoRetirado'),
(128, '978-85-7232-360-4', 'Clássico da Literatura Brasileira e Português', 'O Cortiço', 'Aluísio Azevedo ', 1890, '../img/img_22-11-2023_07-53-31_5806653549.png', '../pdf/arquivo_22-11-2023_07-53-31_8809216833.pdf', 'S', 'Nascido em uma família rica, Brás Cubas conta que na infância era um garoto endiabrado que maltratava os escravos, era mimado pelo pai, amigo de Quincas Borba e tinha um criado chamado Prudêncio. Por fazer parte da elite, ele nunca precisou conquistar o pão de cada dia com o suor do seu rosto, ou seja, trabalhar.\r\nDurante sua adolescência, envolveu-se com uma mulher chamada Marcela, que era prostituta e o explorava, mas Brás apenas cita que ela o amou por quinze meses e onze contos de réis. Por ', 'Martin Claret', '1', 'naoRetirado'),
(129, '978-8582852378', 'Séries da Literatura Estrangeira', 'Memorial de Aires', 'Machado de Assis', 2007, '../img/img_22-11-2023_08-02-08_225656745.png', '../pdf/arquivo_22-11-2023_13-17-17_8434500519.pdf', 'N', '        Por ser o último romance de Machado de Assis, Memorial de Aires tem muitas características particulares e interessantes. A obra é a única do autor que tem um formato de memórias registradas em um diário. Os relatos do Conselheiro Aires percorrem os anos de 1888 e 1889, ou seja, anos em que ocorreram dois fatos importantes na história do país: a abolição da escravatura e a proclamação da República. No enredo há temas substanciais como a morte, a solidão na velhice, e, como característica ', 'Editora Ática', '1', 'retirado'),
(130, '857232531-X', 'Séries da Literatura Estrangeira', 'O Crime do Padre Amaro', 'Eça de Queiroz', 1875, '../img/img_22-11-2023_08-04-29_4151176042.png', '../pdf/arquivo_22-11-2023_13-18-59_3333472552.pdf', 'N', '         O jovem padre Amaro (Gael García Bernal) acaba de ser ordenado e em breve irá para Roma continuar seus estudos, graças à boa relação que mantém com o bispo. Antes, contudo, deve trabalhar em uma paróquia. Ele é enviado para Los Reyes para atuar sob as ordens do padre Benito (Sancho Gracia), o vigário que aparentemente vive uma existência corrupta e contraditória. Lá Amaro conhece a linda e devota Amelia (Ana Claudia Talancón), filha de Sanjuanera (Angélica Aragón), dona do restaurante m', 'Martin Claret', '1', 'naoRetirado'),
(131, '978-65-5565-295-6', 'Séries da Literatura Estrangeira', 'Morte no Internato', 'Lucinda RIley', 2022, '../img/img_22-11-2023_08-09-15_3109653702.png', '../pdf/arquivo_22-11-2023_13-18-18_1960874853.pdf', 'N', '        A morte repentina de um estudante na Escola St. Stephen – um internato na região mais remota de Norfolk – é um acontecimento chocante que seu diretor faz questão de encarar apenas como um acidente infeliz.Porém, a polícia local não descarta a possibilidade de um crime, e o caso traz de volta à ativa a inspetora Jazmine Hunter. Jazz se afastou da carreira policial em Londres, mas, relutante, concorda em participar da investigação como um favor a seu antigo chefe.\r\nAo analisar os detalhes ', 'Arqueiro', '1', 'naoRetirado'),
(132, '978-85-325-3078-3', 'Séries da Literatura Estrangeira', 'Harry Potter e a Pedra Filosofal', 'J. K Rowling', 1997, '../img/img_22-11-2023_08-11-33_3660194615.png', '0', 'N', 'Harry Potter (Daniel Radcliffe) é um garoto órfão de 10 anos que vive infeliz com seus tios, os Dursley. Até que, repentinamente, ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos. Inicialmente Harry é impedido de ler a carta por seu tio Válter (Richard Griffiths), mas logo ele recebe a visita de Hagrid (Robbie Coltrane), o guarda-caça de Hogwarts, que chega em sua casa para levá-lo até a escola. A partir de então Harry p', 'Rocco', '1', 'naoRetirado'),
(133, '978-85-209-2355-9', 'Séries da Literatura Estrangeira', 'Drácula', 'Bram Stoker', 1867, '../img/img_22-11-2023_08-13-23_3771973098.png', '0', 'N', ' Drácula (Bela Lugosi) é um conde vindo dos Cárpatos que aterroriza Londres por carregar uma maldição que o obriga a beber sangue humano para sobreviver. Após transformar uma jovem em vampira ele concentra suas atenções em uma amiga dela, mas o pai da próxima vítima se chama Van Helsing (Edward Van Sloan), um cientista holandês especialista em vampiros que pode acabar com seu reinado de terror.', 'Nova Fronteira', '1', 'naoRetirado'),
(134, '978-85-8057-543-9', 'Séries da Literatura Estrangeira', 'Percy Jackson e os Olimpianos', 'Rick Riordan', 2009, '../img/img_22-11-2023_08-15-18_6346518306.png', '0', 'N', 'Percy Jackson é um jovem que enfrenta problemas na escola, devido ao que acredita ser dislexia e déficit de atenção. Ele foi criado por sua mãe, Sally, e vive com Gabe Ugliano, seu padrasto, que odeia. Após ser atacado em plena excursão escolar, é revelado a Percy que ele é um semideus, ou seja, filho do deus Poseidon com uma humana, e possui poderes. Protegido por Grover Underwood, é levado ao acampamento dos Meio-sangue, onde está em segurança.', 'Intrínseca', '1', 'naoRetirado'),
(135, '978-85-7542-905-1', 'Séries da Literatura Estrangeira', 'A Linguagem Corporal no Trabalho', 'Allan & Bárbara Pease', 2011, '../img/img_22-11-2023_08-20-09_5871095249.png', '../pdf/arquivo_22-11-2023_13-14-45_1700487635.pdf', 'S', '        As pessoas costumam ir para o trabalho todos os dias sem se dar conta da importância de sua linguagem corporal. No entanto, a capacidade de ler as mensagens não verbais dos seus colegas, chefes e parceiros de negócios – e usá-las a seu favor – é uma peça-chave para o sucesso. Em A linguagem corporal no trabalho, Allan e Barbara Pease, especialistas em relacionamentos, ensinam alguns dos maiores segredos do mundo corporativo. Você será capaz de se comunicar de maneira mais eficaz para con', 'Sextante', '1', 'naoRetirado'),
(136, '978-85-352-3119-9', 'Séries da Literatura Estrangeira', 'Desenvolva sua Inteligência Financeira', 'Robert T.Kiyosaki', 2008, '../img/img_22-11-2023_08-22-56_8489668501.png', '../pdf/arquivo_22-11-2023_13-20-00_6757709107.pdf', 'S', '        Kiyosaki demonstra que, diferente do que o senso comum prega, não existe apenas uma inteligência. Além disso, a inteligência mais convencional, aquela que se desenvolve na escola, não é nada útil quando se trata de finanças; com sua linguagem e suas estruturas específicas, este universo requer também uma inteligência particular.Desenvolva Sua Inteligência Financeira fala justamente desta inteligência, a que lhe permitirá ficar rico e atingir a independência financeira. Para desenvolvê-la', 'Elsevier', '1', 'naoRetirado'),
(137, '85-01-00199-6', 'Auto-Ajuda e Religião', 'A Mágica de Pensar Grande', 'David J.Schwartz', 1959, '../img/img_22-11-2023_08-25-50_1431597272.png', '0', 'S', ' Neste livro criativo, best seller internacional, o Dr. David J. Schwartz prova que o tamanho da conta bancária, da felicidade e da satisfação de qualquer pessoa depende unicamente da extensão do seu pensamento. Em A mágica de pensar grande, o leitor encontra um conjunto de métodos e técnicas originais que vão ajudá-lo a adquirir confiança, estabilidade e desembaraço para ir ao encontro daquilo que sempre sonhou.', 'Editora Record', '1', 'naoRetirado'),
(138, '978-85-63680-16-7', 'Séries da Literatura Estrangeira', 'Terapia Financeira', 'Reinaldo Domingos', 2007, '../img/img_22-11-2023_08-28-02_8321536534.png', '../pdf/arquivo_22-11-2023_13-25-21_1438335739.pdf', 'N', '        Este livro está estruturado de acordo com a Metodologia DiSOP. A sigla contém os quatro pilares fundamentais para se alcançar a independência financeira Diagnosticar, Sonhar, Orçar e Poupar.    ', 'Elevação', '1', 'naoRetirado'),
(139, '978-85-352-2180-0', 'Séries da Literatura Estrangeira', 'O Poder da Persuasão', 'Robert B. Cialdini', 2006, '../img/img_22-11-2023_08-30-09_2698063156.png', '../pdf/arquivo_22-11-2023_13-24-36_7773488864.pdf', 'N', '        Em O Poder da Persuasão, Robert B. Cialdini explica por que algumas pessoas são persuasivas e como você pode vencê-las em seu próprio jogo.Você irá aprender os seis segredos psicológicos por trás do nosso poderoso impulso de ceder, como persuasores habilidosos usam esses segredos sem serem notados, como se defender deles e como fazer esses segredos trabalharem a seu favor.Este livro indispensável garante duas coisas: você nunca mais irá dizer \'sim\' quando, na verdade, queria dizer \'não\',', 'Elsevier', '1', 'naoRetirado'),
(141, '978-85-504-0221-5', 'Diversos da Literatura Brasileira', 'Alek Ciaran e os Guardiões da Escuridão', 'Shirley Souza', 2016, '../img/img_22-11-2023_08-40-08_7106889670.png', '0', 'S', ' Alek Ciaran e os guardiões da escuridão é um livro que nos convida a acreditar no fantástico e a enxergar o mundo de maneira mais complexa, onde o bem e o mal coexistem de um jeito profundamente mesclado.', 'Sesi-SP', '1', 'naoRetirado'),
(142, '978-8550402734', 'Diversos da Literatura Brasileira', 'Os Guardiões do Pentagrama', 'Rosana Rios e Helena Gomes', 2017, '../img/img_22-11-2023_08-42-45_7462361153.png', '0', 'S', ' Natasha tem 16 anos e mora com dona Dadá, a avó autoritária. Uma das poucas alegrias da adolescente é trabalhar como voluntária em um abrigo de animais, além de pegar emprestado livros de literatura fantástica da biblioteca do colégio. Essa rotina se mantém até o dia em que, após resgatar dois gatos feridos, ela assiste a uma impressionante luta de magia entre dois jovens bruxos: o sombrio Kallaf e o charmoso Leoh. Depois disso, a vida de Natasha sofre uma tremenda reviravolta, ao mesmo tempo e', 'Sesi-SP', '1', 'naoRetirado'),
(143, '978-8573026177', 'Contos', 'Comédias da Vida Privada', 'Luís Fernando Veríssimo', 2004, '../img/img_22-11-2023_08-58-55_7589074687.png', '0', 'N', 'Generoso, irônico, cúmplice - Verissimo sabe como ninguém transformar em riso as sutis tiranias, as infidelidades, as paixões fulminantes, os ódios mortais. Em O melhor das comédias da vida privada, o escritor gaúcho escolheu suas histórias preferidas do livro que se tornou um clássico do humor brasileiro nos anos 90, numa seleção imperdível que inclui 35 novas crônicas, inéditas em livro. Da crítica política, passando pela comédia de costumes, até a radiografia dos relacionamentos amorosos, est', 'Objetiva', '1', 'naoRetirado'),
(144, '978-8581090535', 'Contos', 'Casa Aberta', 'Fernando Brant', 2012, '../img/img_22-11-2023_09-01-08_3469376195.png', '0', 'N', 'Partindo do próprio ambiente familiar, rememorando o passado e projetando o futuro, é toda uma visão de mundo extremamente consistente que nos é oferecida, desde o momento em que o autor descobre a sua vocação quase por acaso até as longas viagens pela memória, pelo Brasil e pelo mundo. Acima de tudo, este livro é uma longa travessia através da vida e do tempo, do espaço e dos acontecimentos que marcaram o Brasil na segunda metade do século XX e na primeira década deste século.', 'Dubolsinho', '1', 'naoRetirado'),
(145, '978-6555527407', 'Contos', 'Contos Novos', 'Mário de Andrade', 2022, '../img/img_22-11-2023_09-27-27_933900090.png', '0', 'N', 'Um jovem operário decide celebrar o Dia do Trabalhador, policiais e solícitos vizinhos quebram o silêncio da madrugada em uma perseguição, uma família se reúne ao redor da mesa de jantar no primeiro Natal sem o patriarca... Os personagens e situações podem parecer apenas retratos do cotidiano, mas, ao serem narrados por um dos expoentes do movimento modernista no Brasil, conquistaram seu espaço na história da literatura nacional. Agora, oito dos nove contos de Mário de Andrade foram adaptados pa', 'Principis', '1', 'naoRetirado'),
(146, '978-8539000289', 'Séries da Literatura Estrangeira', 'Contos e Crônicas para ler na Escola', 'João Ubaldo Ribeiro', 2010, '../img/img_22-11-2023_09-30-21_6524926667.png', '../pdf/arquivo_22-11-2023_13-22-13_3201144999.pdf', 'S', '        livros premiados, João Cabral de Melo Neto, João Ubaldo Ribeiro, Carlos Heitor Cony e Ignácio de Loyola Brandão integram o primeiro time da literatura nacional. Referência para diversas gerações de leitores, esses autores agora possuem outro ponto em comum: eles fazem parte da recém-lançada coleção Para Ler na Escola, desenvolvida pela Editora Objetiva e que tem como meta aproximar alunos do ensino médio das obras de nomes fundamentais das letras brasileiras. Ruy Castro, José Roberto Tor', 'Objetiva', '1', 'naoRetirado'),
(147, '978-8556520647', 'Contos', 'Memórias Inventadas', 'Manoel de Barros', 2018, '../img/img_22-11-2023_09-32-09_7195751020.png', '0', 'S', ' Nos bem medidos poemas em prosa deste livro, pequenas historietas recuperam, como pérolas buriladas, a poética e a ética de uma vida inteira: as infâncias de Manoel de Barros. Memórias inventadas reúne três livros de Manoel de Barros de poesia em prosa. A ideia inicial proposta a Manoel era a de escrever as várias fases de sua vida, cada uma em um volume. Em 2003, ele publicou Memórias inventadas: a infância. Depois do primeiro livro da série projetada, o poeta percebeu, contudo, que a escrita ', 'Alfaguara', '1', 'naoRetirado'),
(148, '978-8525418920', 'Poemas e Poesias', 'Poesia da Bicicleta', 'Sérgio Capparelli', 2009, '../img/img_22-11-2023_09-34-24_1220728400.png', '../pdf/arquivo_22-11-2023_09-34-24_712541457.pdf', 'S', 'Um raio de sol, uma fruta, uma brincadeira, um ditado popular. Para Sérgio Capparelli, o cotidiano é um poema em si, que se desdobra por entre as páginas de \'Poesia de bicicleta\'.', 'L&PM', '1', 'naoRetirado'),
(149, '978-8574921518', 'Séries da Literatura Estrangeira', 'Poemas Antológicos', 'Solano Trindade', 2009, '../img/img_22-11-2023_09-36-31_1295547615.png', '../pdf/arquivo_22-11-2023_13-21-19_5026186576.pdf', 'N', '        O canto poético de Solano Trindade é, sobretudo, uma arte de resistência. Participante ativo da cultura negra do Brasil, Solano deixou marcas na história cultural do país. Sua luta aparece sob diferentes formas - nos poemas que denunciam a escravidão; na exaltação da cultura enraizada na África e por aqui, às vezes, ignorada; a insistência em declamar o amor com o princípio de liberdade... Considerado nosso poeta negro, foi exemplo de força. Esta coletânea apresenta esse poeta e celebra ', 'Nova Alexandria', '1', 'naoRetirado'),
(150, '978-8525045423', 'Poemas e Poesias', '80 anos de Poesia', ' Mário Quintana', 2008, '../img/img_22-11-2023_09-38-11_97886333.png', '0', 'S', '80 anos de poesia, de Mario Quintana, é um livro póstumo e de celebração. Nele há, provavelmente, o melhor de toda a safra do poeta natural de Alegrete. É visível todo o bom trabalho de curadoria empregado nele. Quem o ler, verá e se encantará com a vida simples que o poeta canta. Quintana é poeta das coisas simples, poeta que vê, da janela, a vida quotidiana da própria rua e a vida evasiva das nuvens; Quintana é poeta viajante de mares e estratosferas. Há muita metalinguagem também (Quintana dá', 'Editora Globo', '1', 'naoRetirado'),
(151, '978-8575031612', 'Poemas e Poesias', 'O Assassinato e outras Histórias', 'Anton Tchekhov', 2011, '../img/img_22-11-2023_09-40-03_1662955566.png', '0', 'N', 'Traduzido e organizado pelo romancista Rubens Figueiredo, este livro traz seis contos longos escritos por Anton Tchekhov (1860-1904) na última fase de sua obra. Neles, o tema é o cotidiano da amesquinhada vida russa no final do século XIX. Tchekhov revela-se um profundo conhecedor da vida rural e urbana, dos costumes de mujiques, de comerciantes, de proprietários de terra e de jovens intelectuais. Suas narrativas captam um universo amplo, contraditório, tenso, em que o leitor não pode nunca perm', 'Cosac & Naify', '1', 'naoRetirado'),
(152, ' 978-8503010733', 'Séries da Literatura Estrangeira', 'Neruda para Jovens', ' Pablo Neruda', 2010, '../img/img_22-11-2023_09-42-18_1179032529.png', '../pdf/arquivo_22-11-2023_13-23-20_7225722439.pdf', 'N', '        Em edição bilíngue, a coletânea do grande poeta chileno, Pablo Neruda (1904-1973), é destinada ao público infantojuvenil. Sobre Neruda, escreveu Ferreira Gullar: “Neruda é uma voz inconfundível na poesia – e não apenas na poesia de língua espanhola. Não há exagero em afirmar que Neruda inventou um novo idioma poético que supera e subverte a ordem natural do discurso sem, no entanto, torná-lo hermético e incomunicável. Pelo contrário, graças à sua magia vocabular, consegue tocar um número', 'José Olympio', '1', 'naoRetirado');

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
-- Despejando dados para a tabela `tbl_reservado`
--

INSERT INTO `tbl_reservado` (`id`, `idAluno`, `idLivro`, `dataDeReserva`, `dataDeEntrega`) VALUES
(36, 21, 119, '2023-11-13', '2023-11-13');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `tbl_aluno`
--
ALTER TABLE `tbl_aluno`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tbl_comentario`
--
ALTER TABLE `tbl_comentario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tbl_horario`
--
ALTER TABLE `tbl_horario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `tbl_livro`
--
ALTER TABLE `tbl_livro`
  MODIFY `id_liv` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT de tabela `tbl_reservado`
--
ALTER TABLE `tbl_reservado`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
