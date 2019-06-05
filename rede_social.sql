-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jun-2019 às 01:36
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rede_social`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `amigos`
--

CREATE TABLE `amigos` (
  `id_amigos` int(11) NOT NULL,
  `id_solicitante` int(11) NOT NULL,
  `id_solicitado` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `amigos`
--

INSERT INTO `amigos` (`id_amigos`, `id_solicitante`, `id_solicitado`, `status`) VALUES
(27, 1, 3, 1),
(29, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci,
  `data_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_post`, `id_user`, `comentario`, `data_comentario`) VALUES
(1, 2, 1, 'Realmente, pior bola!', '2019-06-05 09:53:07'),
(2, 2, 1, 'SÃ³ fez arrumar problema na copa de 2014 ou foi 2010, nÃ£o lembro qual', '2019-06-05 09:53:33');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `curtida` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `curtida`
--

INSERT INTO `curtida` (`id_like`, `id_post`, `id_user`, `curtida`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `id_post` int(11) NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `data_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `postagem`
--

INSERT INTO `postagem` (`id_post`, `post`, `img`, `data_post`, `id_user`) VALUES
(2, 'AtÃ© hoje, considerada a pior bola', 'https://http2.mlstatic.com/bola-adidas-jabulani-da-final-D_NQ_NP_686042-MLB27247179532_042018-F.jpg', '2019-06-05 09:49:35', 2),
(3, 'aaa', 'https://http2.mlstatic.com/replica-taca-trofeu-da-copa-do-mundo-fifa-tamanho-oficial-D_NQ_NP_828840-MLB27364673626_052018-F.jpg', '2019-06-05 23:20:54', 7),
(4, 'asdsa', 'https://http2.mlstatic.com/replica-taca-trofeu-da-copa-do-mundo-fifa-tamanho-oficial-D_NQ_NP_828840-MLB27364673626_052018-F.jpg', '2019-06-05 23:29:52', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `aniversario` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(100) COLLATE utf8_unicode_ci DEFAULT '-----',
  `jogador` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_user`, `email`, `senha`, `nome`, `sobrenome`, `foto`, `aniversario`, `sexo`, `estado`, `cidade`, `time`, `jogador`) VALUES
(1, 'aaa@aaa.aaa', 'e10adc3949ba59abbe56e057f20f883e', 'Ariel', 'Rocha', 'https://statig1.akamaized.net/bancodeimagens/ag/56/32/ag5632w153wnqsm6dlx59dar8.jpg', '1998-04-22', 'Masculino', 'Bahia', 'Salvador', 'E.C Bahia', 'Lewandowski'),
(2, 'bbb@bbb.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pedro', 'Soares', 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/20180602_FIFA_Friendly_Match_Austria_vs._Germany_Manuel_Neuer_850_0723.jpg/260px-20180602_FIFA_Friendly_Match_Austria_vs._Germany_Manuel_Neuer_850_0723.jpg', '1933-05-04', 'Masculino', 'Rio de Janeiro', 'Rio de Janeiro', 'Clube de Regatas Flamengo', 'Gabigol'),
(3, 'ccc@ccc.ccc', 'e10adc3949ba59abbe56e057f20f883e', 'Isaac', 'Andrade', 'https://conteudo.imguol.com.br/c/esporte/10/2019/03/17/lionel-messi-atacante-do-barcelona-celebra-gol-1552863233908_v2_900x506.jpg', '1999-08-02', 'Masculino', 'SÃ£o Paulo', 'SÃ£o Paulo', 'Santos', 'Messi'),
(4, 'ddd@ddd.ddd', 'e10adc3949ba59abbe56e057f20f883e', 'Cristian ', 'Bruno', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Cristiano_Ronaldo_2018.jpg/250px-Cristiano_Ronaldo_2018.jpg', '1995-07-14', 'Indefinido', 'Sergipe', 'Aracaju', 'Real Madrid', 'Cristiano Ronaldo'),
(5, 'eee@eee.eee', 'e10adc3949ba59abbe56e057f20f883e', 'Fernada', 'Silva', 'https://extra.globo.com/incoming/22984156-934-043/w448h673-PROP/soccer-worldcup-bel-jpn_.jpg', '1999-04-02', 'Feminino', 'Bahia', 'Feira de Santana', 'Orlando City', 'Marta'),
(6, 'fff@fff.fff', 'e10adc3949ba59abbe56e057f20f883e', 'Larissa', 'Souza', 'https://extra.globo.com/incoming/22984156-934-043/w448h673-PROP/soccer-worldcup-bel-jpn_.jpg', '1984-12-06', 'Feminino', 'Pernanbuco', 'Recife', 'Barcelona', 'Martens'),
(7, 'jjj@jjj.jjj', 'e10adc3949ba59abbe56e057f20f883e', 'Marcelo', 'da Hora', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/Adriano_Leite_Ribeiro_01.jpg/220px-Adriano_Leite_Ribeiro_01.jpg', '2012-03-31', 'Masculino', 'Bahia', 'Salvador', 'Botafogo', 'Ronaldinho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amigos`
--
ALTER TABLE `amigos`
  ADD PRIMARY KEY (`id_amigos`),
  ADD UNIQUE KEY `id_solicitado` (`id_solicitado`,`id_solicitante`) USING BTREE,
  ADD KEY `id_solicitante` (`id_solicitante`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `comentario_ibfk_1` (`id_post`);

--
-- Indexes for table `curtida`
--
ALTER TABLE `curtida`
  ADD PRIMARY KEY (`id_like`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_post`) USING BTREE,
  ADD KEY `curtida_ibfk_1` (`id_post`,`id_user`) USING BTREE;

--
-- Indexes for table `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `postagem_ibfk_1` (`id_user`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amigos`
--
ALTER TABLE `amigos`
  MODIFY `id_amigos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `curtida`
--
ALTER TABLE `curtida`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `postagem`
--
ALTER TABLE `postagem`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `amigos`
--
ALTER TABLE `amigos`
  ADD CONSTRAINT `amigos_ibfk_1` FOREIGN KEY (`id_solicitado`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `amigos_ibfk_2` FOREIGN KEY (`id_solicitante`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `postagem` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `curtida`
--
ALTER TABLE `curtida`
  ADD CONSTRAINT `curtida_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `postagem` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curtida_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
