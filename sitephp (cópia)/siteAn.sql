-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07-Fev-2023 às 19:28
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `siteAn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `admin` varchar(1) NOT NULL,
  `idade` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `nome`, `senha`, `email`, `nickname`, `admin`, `idade`) VALUES
(5, 'João Vitor', '$2y$10$a6nD6Og1eYvmEZGx3YO/Fu4rJ9XEK0U6Kq/3fzsFlNnpauSnQq4gW', 'joao@vitor', 'GamesJamesBr', 's', 17),
(6, 'Roger', '$2y$10$NKFJvdZxX7GS9Fze960Zye1Ae1cBuZaxQvGcqoZ7HfzAEraLX7p06', 'roger@gmail', 'Rogerzinho', 's', 32),
(7, 'joao', '$2y$10$KyeXc1XeImpRVl9gx6MVH.TFtMk1WKW0SpabkMmOezs1gNAhhkyyK', 'dwqf@vdf', 'dweqadfe', 's', 43),
(8, 'joaozinho', '$2y$10$/8yBZ4J0ud/iwC.JFPoaz.brdppDfdaun9FPPOBjsy8RKMQHkt04u', 'vitor@joao', 'james22', 's', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `animes`
--

CREATE TABLE `animes` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `episodios` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `assistir` varchar(355) NOT NULL,
  `manga` varchar(5) DEFAULT NULL,
  `ler` varchar(355) DEFAULT NULL,
  `feitoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `animesOf`
--

CREATE TABLE `animesOf` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `episodios` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `assistir` varchar(355) NOT NULL,
  `manga` varchar(5) DEFAULT NULL,
  `ler` varchar(355) DEFAULT NULL,
  `feitoPor` varchar(100) NOT NULL,
  `aprovadoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `animesOf`
--

INSERT INTO `animesOf` (`id`, `nome`, `apelido`, `ano`, `genero`, `episodios`, `status`, `imagem`, `descricao`, `assistir`, `manga`, `ler`, `feitoPor`, `aprovadoPor`) VALUES
(10, 'goblin slayer', '', '2018', 'aventura', '12', 'completo', 'a93248f5e1cb5cdeb889ed3a68a74c86.jpg', 'Em um mundo de fantasia, aventureiros vêm de longe para se juntar a Guilda, a fim de concluir contratos para os postos de trabalho que estão disponíveis. Uma sacerdotisa inexperiente, ingressa em sua primeira aventura, mas se veem em perigo depois que seu primeiro contrato de aventureiros que envolve goblins da errado e quase todo seu grupo é dizimado pelos goblins. Depois que o resto do seu grupo é abatido ela é salva por um homem conhecido como Goblin Slayer, um aventureiro, cujo único propósito é a erradicação dos goblins.', 'https://animesonline.cc/anime/goblin-slayer/', 'sim', 'https://mangayabu.top/manga/goblin-slayer/', 'GamesJamesBr', 'GamesJamesBr'),
(11, 'Death Note', '', '2006', 'misterio', '37', 'completo', 'e04d70bffc385b1df1bcaa525eb49ef4.jpg', 'Um estudante encontra um caderno misterioso que permite matar qualquer pessoa cujo nome ele escreva nele.', 'https://xpanimes.com/death-note-online-2/', 'sim', 'https://mangayabu.top/manga/death-note/', 'GamesJamesBr', 'GamesJamesBr'),
(12, 'Attack on Titan', '', '2013', 'acao', '59', 'andamento', 'a4c9928502d53a2380d5aaee12fa0094.jpeg', 'Em um mundo onde titãs devoradores de humanos ameaçam a sobrevivência da raça humana, uma jovem recruta junta-se aos soldados para proteger a civilização e descobrir a verdade por trás da existência dos titãs.', 'https://xpanimes.com/assistir-shingeki-no-kyojin-1/', 'sim', 'https://mangayabu.top/manga/shingeki-no-kyojin-attack-on-titan/', 'GamesJamesBr', 'GamesJamesBr'),
(13, 'Fullmetal Alchemist: Brotherhood', '', '2009', 'acao', '64', 'completo', 'd26677d7c463886d1d2048c726748dc3.jpeg', 'Dois irmãos alquimistas viajam pelo mundo em busca de uma pedra filosofal que pode restaurar seus corpos.', 'https://xpanimes.com/assistir-fullmetal-alchemist-brotherhood-1/', 'sim', 'https://mangayabu.top/manga/fullmetal-alchemist/', 'GamesJamesBr', 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `assistir` varchar(355) NOT NULL,
  `feitoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `assistir`, `feitoPor`) VALUES
(2, 'Interestelar', '', '2014', 'ficCien', 'ad1926ba12c2065a211a77f452d19836.jpeg', 'Em um futuro próximo, a Terra é ameaçada pela escassez de alimentos e a humanidade busca uma nova casa em outro planeta. Um grupo de astronautas viaja pelo espaço em busca de uma solução, enfrentando desafios e descobrindo segredos surpreendentes.', 'https://superfilmes.cx/filmes/assistir-online-interestelar/', 'GamesJamesBr'),
(4, 'Forrest Gump', '', '1994', 'comedia', 'c140208fedd8fa60379e5a5fc10955eb.jpeg', 'Forrest Gump, um homem com limitações mentais, conta sua história de vida e as aventuras que viveu, incluindo momentos históricos como a Guerra do Vietnã e a Era do Amor Livre. Ao longo do caminho, ele encontra amigos e amores, mudando a vida das pessoas ao seu redor.', 'https://supertela.la/filmes/forrest-gump-o-contador-de-historias/', 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmesOf`
--

CREATE TABLE `filmesOf` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `assistir` varchar(355) NOT NULL,
  `feitoPor` varchar(100) NOT NULL,
  `aprovadoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmesOf`
--

INSERT INTO `filmesOf` (`id`, `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `assistir`, `feitoPor`, `aprovadoPor`) VALUES
(1, 'Matrix', '', '1999', 'acao', 'a69ed37567f1dfc0193678099430ada8.jpeg', 'Neo, um programador de computador, descobre que a realidade que conhece é na verdade uma ilusão criada por máquinas inteligentes para escravizar a humanidade. Ele é recrutado por Morpheus para lutar contra as máquinas e descobrir a verdade por trás da Matrix.', 'https://monoflix.net/filmes/matrix/', 'GamesJamesBr', 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogos`
--

CREATE TABLE `jogos` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `feitoPor` varchar(100) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogos`
--

INSERT INTO `jogos` (`id`, `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `feitoPor`, `preco`) VALUES
(1, 'The Legend of Zelda: Breath of the Wild', 'BotW', '2017', 'acao', '4b64707b7629c66aedc4bdc495316bf6.jpeg', 'The Legend of Zelda: Breath of the Wild é um jogo de aventura em mundo aberto desenvolvido e publicado pela Nintendo. O jogador assume o papel de Link em sua jornada para salvar o Reino de Hyrule e derrotar o vilão Calamidade Ganon.', 'GamesJamesBr', 60),
(2, 'Grand Theft Auto V', 'GTA 5', '2013', 'acao', 'd5f6c9524421d8c4e6962f888727a75a.jpeg', 'Grand Theft Auto V é um jogo de ação-aventura em mundo aberto desenvolvido pela Rockstar North e publicado pela Rockstar Games. O jogador pode controlar três personagens diferentes em Los Santos, uma cidade fictícia baseada em Los Angeles. O jogo inclui uma combinação de missões lineares e eventos aleatórios.', 'GamesJamesBr', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogosOf`
--

CREATE TABLE `jogosOf` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `feitoPor` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `aprovadoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogosOf`
--

INSERT INTO `jogosOf` (`id`, `nome`, `apelido`, `ano`, `genero`, `imagem`, `descricao`, `feitoPor`, `preco`, `aprovadoPor`) VALUES
(1, 'Super Mario Odyssey', '', '2017', 'aventura', '1e6aa82e22d011b673c18ddbde228692.jpeg', 'Super Mario Odyssey é um jogo de plataforma e aventura desenvolvido pela Nintendo EPD e publicado pela Nintendo. O jogador controla Mario em sua jornada para salvar a Princesa Peach da mão do vilão Bowser e recuperar as pedras poderosas conhecidas como os Lunáticos. O jogo apresenta vários mundos diferentes para explorar e inclui a capacidade de controlar diferentes personagens.', 'GamesJamesBr', 60, 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mangas`
--

CREATE TABLE `mangas` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `capitulos` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `ler` varchar(355) NOT NULL,
  `feitoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mangas`
--

INSERT INTO `mangas` (`id`, `nome`, `apelido`, `ano`, `genero`, `capitulos`, `status`, `imagem`, `descricao`, `ler`, `feitoPor`) VALUES
(3, '&#34;That Time I Got Reincarnated as a Slime&#34; (Tensei Shitara Slime Datta Ken)', 'isekai slime', '2016', 'aventura', '104', 'andamento', '3d108ef4bf085417f7438ecc8aad5794.jpg', '\"Tensei Shitara Slime Datta Ken\" acompanha a história de um homem comum que é reincarnado como um slime em um mundo de fantasia. Com sua nova forma, ele adquire habilidades únicas e começa a se envolver em aventuras enquanto explora o mundo ao seu redor e faz novos amigos. Ao longo de sua jornada, ele aprende sobre o poder da amizade e da lealdade, além de enfrentar desafios para proteger o que é importante para ele.', 'https://leitor.net/manga/tensei-shitara-slime-datta-ken-online/2692', 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mangasOf`
--

CREATE TABLE `mangasOf` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `capitulos` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `imagem` longblob NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `ler` varchar(355) NOT NULL,
  `feitoPor` varchar(100) NOT NULL,
  `aprovadoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mangasOf`
--

INSERT INTO `mangasOf` (`id`, `nome`, `apelido`, `ano`, `genero`, `capitulos`, `status`, `imagem`, `descricao`, `ler`, `feitoPor`, `aprovadoPor`) VALUES
(1, 'One Piece', '', '1997', 'aventura', '1073', 'andamento', 0x30333362393139613532616239386432313136396334303137343531626662332e706e67, 'One Piece é um mangá de Eiichiro Oda que segue a jornada do pirata Monkey D. Luffy em sua busca pelo tesouro lendário \"One Piece\" para se tornar o rei dos piratas.', 'https://firemangas.com/manga/one-piece/857', 'GamesJamesBr', 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `episodios` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `assistir` varchar(355) NOT NULL,
  `feitoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`id`, `nome`, `apelido`, `ano`, `genero`, `episodios`, `status`, `imagem`, `descricao`, `assistir`, `feitoPor`) VALUES
(1, 'Breaking Bad', '', '2008', 'drama', '62', 'completo', '99f7348c06107706b40ae362dcc432a1.png', 'Breaking Bad é uma série de televisão americana sobre um químico escolar que, depois de descobrir que tem um câncer terminal, se junta a um antigo aluno para produzir e vender metanfetaminas para garantir o futuro financeiro de sua família após sua morte.', 'https://supertela.la/series/breaking-bad-a-quimica-do-mal/', 'GamesJamesBr'),
(3, 'Stranger Things', '', '2016', 'drama', '28', 'andamento', 'c919b2235049dc9720556da70132ff43.jpeg', '\"Stranger Things\" é uma série de ficção científica e terror que se passa na cidade fictícia de Hawkins, Indiana, durante os anos 80. A história acompanha o desaparecimento de um menino e a busca dos amigos e da família para encontrá-lo, enquanto descobrem misteriosos acontecimentos e uma conspiração governamental envolvendo experimentos com seres extraterrestres. A série é conhecida por sua atmosfera nostálgica, seu elenco jovem talentoso e suas referências a filmes, jogos e músicas dos anos 80. Seus fãs adoram a química entre os personagens e a construção de suspense ao longo de cada temporada.', 'https://www.justwatch.com/br/serie/stranger-things', 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `seriesOf`
--

CREATE TABLE `seriesOf` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) DEFAULT NULL,
  `ano` varchar(4) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `episodios` varchar(4) NOT NULL,
  `status` varchar(15) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(2000) NOT NULL,
  `assistir` varchar(355) NOT NULL,
  `feitoPor` varchar(100) NOT NULL,
  `aprovadoPor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `seriesOf`
--

INSERT INTO `seriesOf` (`id`, `nome`, `apelido`, `ano`, `genero`, `episodios`, `status`, `imagem`, `descricao`, `assistir`, `feitoPor`, `aprovadoPor`) VALUES
(1, 'The Office', '', '2005', 'comedia', '201', 'completo', '693466ec3168d9f4a7ae105812df1b60.jpeg', 'The Office é uma série de comédia sobre a vida dos funcionários de uma pequena filial da Dunder Mifflin, uma empresa de papel e material escritório. A série acompanha as vidas pessoais e profissionais dos funcionários e como eles lidam com seus chefe e entre si.', 'https://seriesgratis.site/serie/the-office.html', 'GamesJamesBr', 'GamesJamesBr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `idade` smallint(6) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `nickname`, `idade`, `email`) VALUES
(11, 'João Vitor', '$2y$10$EEoJ5kaVA3.tLjtRlkncf.tB9Eq1c6aJetzTx8SURuhFat.qpnNoq', 'james', 23, '123@456'),
(12, 'fasef', '$2y$10$fVavJ255KOAEvf3h1KJwZurcdYM7i4ykpv4Kd1Y27HVFoNZk8tz.q', 'james', 17, '1234@1234'),
(14, 'João Vitor', '$2y$10$24DSqClKSUMGyN0W8bpap.oqe7qMgezvu0I0gRQoI7o/GaHD3lIjq', 'JAMES1234', 25, 'SILVA@SANTOS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `animes`
--
ALTER TABLE `animes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `animesOf`
--
ALTER TABLE `animesOf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filmesOf`
--
ALTER TABLE `filmesOf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogos`
--
ALTER TABLE `jogos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogosOf`
--
ALTER TABLE `jogosOf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mangasOf`
--
ALTER TABLE `mangasOf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `seriesOf`
--
ALTER TABLE `seriesOf`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `animes`
--
ALTER TABLE `animes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `animesOf`
--
ALTER TABLE `animesOf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `filmesOf`
--
ALTER TABLE `filmesOf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `jogos`
--
ALTER TABLE `jogos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `jogosOf`
--
ALTER TABLE `jogosOf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `mangas`
--
ALTER TABLE `mangas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mangasOf`
--
ALTER TABLE `mangasOf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `seriesOf`
--
ALTER TABLE `seriesOf`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
