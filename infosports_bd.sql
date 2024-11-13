-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/11/2024 às 01:22
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `infosports_bd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato_tb`
--

CREATE TABLE `contato_tb` (
  `Id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `mensagem` varchar(255) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `contato_tb`
--

INSERT INTO `contato_tb` (`Id`, `nome`, `sobrenome`, `email`, `telefone`, `mensagem`, `data`) VALUES
(1, 'rafa', 'moura', 'teste@gmail.com', 81987987546, 'testando msg', '2024-09-27 20:14:02'),
(2, 'rafa', 'moura', 'teste@gmail.com', 81987987546, 'testando msg', '2024-09-27 20:15:21'),
(4, 'rafa', 'moura', 'teste@gmail.com', 81987987546, 'testando msg', '2024-09-27 20:15:55'),
(5, 'rafa', 'moura', 'teste@gmail.com', 81987987546, 'testando msg', '2024-09-27 20:17:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imc_tb`
--

CREATE TABLE `imc_tb` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `peso` int(11) NOT NULL,
  `altura` float NOT NULL,
  `imc` float NOT NULL,
  `classificacao` varchar(255) NOT NULL,
  `dataRegistro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `imc_tb`
--

INSERT INTO `imc_tb` (`id`, `nome`, `email`, `peso`, `altura`, `imc`, `classificacao`, `dataRegistro`) VALUES
(1, 'Diogo Ramalho', 'dioramalho@gmail.com', 146, 1.87, 41.75, 'Obesidade grau 3 ou morbida', '2024-09-24 20:35:57'),
(2, 'Ronald', 'ronald@gmail.com', 80, 1.74, 26.42, 'Sobre Peso', '2024-09-24 21:07:35'),
(3, 'teste', 'rafa@gmail.com', 78, 1.78, 24.62, 'Peso Ideal', '2024-10-22 19:34:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias_tb`
--

CREATE TABLE `noticias_tb` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `noticias_tb`
--

INSERT INTO `noticias_tb` (`id`, `titulo`, `descricao`, `imagem`, `id_categoria`, `data`) VALUES
(6, 'BOXE', 'Descubra a força interior e a técnica impecável necessárias para se destacar no ringue. Desafie-se a superar seus limites físicos e mentais enquanto aprende os segredos deste esporte de combate emocionante.', './imagens/boxe.jpg', 1, '2024-10-07 20:19:38'),
(7, 'CROSSFIT', 'Entre na arena do crossfit e desafie seu corpo em um treinamento intenso e variado que irá transformar sua força,resistência e condicionamento físico. Supere seus limites e alcance novos patamares de desempenho.', './imagens/crossfit.jpg', 2, '2024-10-07 20:21:46'),
(8, 'ESPORTE NA NEVE', 'Sinta a adrenalina das montanhas cobertas de neve enquanto desliza pelas encostas em esportes como esqui e snowboard. Prepare-se para a emoção de voar sobre a neve e dominar as pistas.', './imagens/esportesNaNeve.jpg', 0, '2024-10-07 20:22:08'),
(9, 'BASQUETE', 'Drible, passe, arremesse! Junte-se ao emocionante mundo do basquete e experimente a empolgação de jogar em equipe, competir em partidas acirradas e fazer cestas incríveis.', './imagens/basquete.jpg', 0, '2024-10-07 20:22:38'),
(10, 'CORRIDA', 'Calce seus tênis e sinta a energia pulsante das corridas. Desafie-se em diferentes distâncias, supere obstáculos e descubra os benefícios incríveis para a saúde e o bem-estar que a corrida proporciona.', './imagens/corrida.jpg', 0, '2024-10-07 20:23:03'),
(11, 'SURF', 'Sinta a liberdade e a conexão com o mar enquanto desliza pelas ondas no surf. Experimente a emoção de pegar a onda perfeita, domine as técnicas e mergulhe no estilo de vida descontraído e vibrante do surf.', './imagens/surf.jpg', 0, '2024-10-07 20:23:23'),
(12, 'TRILHA', 'Aventure-se pelos caminhos menos percorridos e descubra a beleza da natureza enquanto se desafia em trilhas emocionantes. Deixe a rotina para trás e explore novos horizontes ao ar livre.', './imagens/trilha.jpg', 2, '2024-10-07 20:23:45'),
(13, 'TÊNIS', 'Experimente a elegância e a velocidade do tênis, um esporte que combina habilidade, estratégia e agilidade. Jogue com paixão, vença com classe e desfrute da competição saudável em quadra.', './imagens/tenis.jpg', 0, '2024-10-07 20:24:02'),
(14, 'SKATE', 'Descubra a adrenalina e a habilidade essenciais para brilhar no skate. Desafie-se a ultrapassar seus limites físicos e mentais enquanto aprende os segredos deste emocionante esporte sobre rodas. Prepare-se para dominar manobras incríveis e explorar a liberdade de se mover sobre o asfalto.', './imagens/skate.jpg', 0, '2024-10-09 21:02:02'),
(15, 'BIKE', 'Descubra a emoção pura e a conexão com a natureza que o mountain bike proporciona. Desafie-se a dominar trilhas desafiadoras e a enfrentar terrenos acidentados, enquanto aprimora sua técnica e resistência. Sinta a adrenalina ao descer encostas íngremes e superar obstáculos, testando seus limites físicos e mentais. O mountain bike é mais do que um esporte; é uma jornada que revela a força interior e a habilidade necessária para se destacar na aventura sobre duas rodas.', './imagens/bicicletas.jpg', 0, '2024-11-01 19:59:56'),
(16, 'NATAÇÃO', 'Descubra a emoção pura e a conexão com a natureza que o mountain bike proporciona. Desafie-se a dominar trilhas desafiadoras e a enfrentar terrenos acidentados, enquanto aprimora sua técnica e resistência. Sinta a adrenalina ao descer encostas íngremes e superar obstáculos, testando seus limites físicos e mentais. O mountain bike é mais do que um esporte; é uma jornada que revela a força interior e a habilidade necessária para se destacar na aventura sobre duas rodas.', './imagens/natacao.jpg', 0, '2024-11-01 20:02:40'),
(17, 'CALISTENIA', 'Explore a potência do seu corpo com a calistenia, um treino que transforma o peso corporal em uma ferramenta de força e flexibilidade. Descubra a disciplina e a técnica necessárias para dominar movimentos desafiadores, como flexões, barras e agachamentos. A calistenia não só desenvolve a musculatura, mas também aprimora a coordenação e o equilíbrio, proporcionando um treino completo e funcional. Desafie-se a superar seus limites e a alcançar novas conquistas, enquanto se conecta com o seu corpo de maneira única. Este esporte acessível e dinâmico é perfeito para quem busca um estilo de vida saudável e ativo, sem a necessidade de equipamentos sofisticados.', './imagens/roupas.jpg', 2, '2024-11-01 20:03:36'),
(21, 'CAPOEIRA', 'Descubra o poder da capoeira, uma arte marcial única que combina força, flexibilidade e musicalidade em um espetáculo de técnica e resistência. Envolva-se na tradição e cultura brasileiras ao dominar movimentos fluidos e estratégicos, desafiando seus limites físicos e mentais. Em cada gingado e acrobacia, sinta a harmonia entre corpo e mente enquanto explora o ritmo do berimbau, a camaradagem do jogo e a autodefesa disfarçada de dança. Na capoeira, cada movimento é uma expressão de liberdade, uma celebração da história e uma chance de superar-se.', './imagens/capoeira.jpg', 1, '2024-11-01 20:37:45'),
(22, 'PARKOUR', 'Explore o mundo ao seu redor de uma maneira totalmente nova com o parkour, uma disciplina que une agilidade, força e criatividade. Desafie-se a superar obstáculos urbanos e naturais com movimentos precisos, saltos ousados e aterrissagens controladas. No parkour, cada parede, corrimão ou estrutura se transforma em uma oportunidade para explorar suas habilidades, testar seus limites físicos e aprimorar seu controle mental. Mais que um esporte, o parkour é uma filosofia de adaptação e liberdade, que leva você a se mover com confiança e a ver o ambiente de forma dinâmica e inovadora.', './imagens/parkour.jpg', 0, '2024-11-01 20:52:46'),
(23, 'teste', 'testar', 'teste', 2, '2024-11-12 21:05:08'),
(24, 'teste', 'testar', 'teste', 2, '2024-11-12 21:08:11'),
(25, 'teste', 'testando', 'testar', 2, '2024-11-12 21:08:23'),
(26, 'teste', 'testando', 'testar', 2, '2024-11-12 21:11:46'),
(27, 'teste', 'testando', 'testar', 2, '2024-11-12 21:14:29'),
(28, 'teste', 'testando', 'testar', 2, '2024-11-12 21:15:49'),
(29, 'teste', 'testando', 'testar', 2, '2024-11-12 21:16:32'),
(30, 'teste', 'testando', 'testar', 1, '2024-11-12 21:17:08'),
(31, 'teste', 'testando', 'testar', 5, '2024-11-12 21:17:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registro_tb`
--

CREATE TABLE `registro_tb` (
  `Id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` longtext NOT NULL,
  `Data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `registro_tb`
--

INSERT INTO `registro_tb` (`Id`, `nome`, `email`, `telefone`, `login`, `senha`, `Data`) VALUES
(44, 'rafael', 'teste@gmail.com', 81654987987, 'Rmoura', '2e6f9b0d5885b6010f9167787445617f553a735f', '2024-10-07 20:06:08'),
(46, 'teste', 'testando@hotmail.com', 81679346879, 'Tetestando', 'd210a7325aa5d2068e6ff02451b2726035ffbec4', '2024-10-07 20:07:51'),
(47, 'teste', 'testando@hotmail.com', 81679346879, 'Tetestando', 'd210a7325aa5d2068e6ff02451b2726035ffbec4', '2024-10-07 20:10:09'),
(48, 'teste', 'teste@outlook.com', 81995987985, 'Testar', '93f4ee976c3cae994d07461dce8b7b802652a20b', '2024-10-07 20:10:39'),
(49, 'teste', 'teste@outlook.com', 81987984654, 'testando', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2024-10-11 19:56:26');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contato_tb`
--
ALTER TABLE `contato_tb`
  ADD PRIMARY KEY (`Id`);

--
-- Índices de tabela `imc_tb`
--
ALTER TABLE `imc_tb`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `noticias_tb`
--
ALTER TABLE `noticias_tb`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registro_tb`
--
ALTER TABLE `registro_tb`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato_tb`
--
ALTER TABLE `contato_tb`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `imc_tb`
--
ALTER TABLE `imc_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `noticias_tb`
--
ALTER TABLE `noticias_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `registro_tb`
--
ALTER TABLE `registro_tb`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
