-- phpMyAdmin SQL Dump
-- version 4.3.7
-- http://www.phpmyadmin.net
--
-- Host: mysql01-farm62.kinghost.net
-- Tempo de geração: 24/09/2017 às 20:23
-- Versão do servidor: 5.7.18-log
-- Versão do PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `pep`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `AgendaTreinamentos`
--

CREATE TABLE IF NOT EXISTS `AgendaTreinamentos` (
  `codAgendaTreinamentos` smallint(6) NOT NULL,
  `codPlanoAtividadePessoal` int(11) NOT NULL,
  `valorNotacao` int(11) NOT NULL,
  `codNotacao` int(11) NOT NULL COMMENT 'Tipo Utilitário 13',
  `qtRepeticoes` int(11) NOT NULL,
  `codNotacoTempoExecucao` int(11) NOT NULL COMMENT 'Tipo Utilitário 13',
  `valorTempoExecucao` int(11) NOT NULL,
  `realizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `AtividadesTreino`
--

CREATE TABLE IF NOT EXISTS `AtividadesTreino` (
  `codAtividadesTreino` smallint(6) NOT NULL,
  `codTreino` int(11) NOT NULL,
  `codExercicio` int(11) NOT NULL,
  `codTipo` int(11) NOT NULL COMMENT 'Tipo Utilitário 9',
  `codNotacao` int(11) NOT NULL COMMENT 'Tipo Utilitário 13',
  `valorNotacao` int(11) NOT NULL,
  `qtCalorias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `AvaliacaoAluno`
--

CREATE TABLE IF NOT EXISTS `AvaliacaoAluno` (
  `codAvaliacaoAluno` smallint(6) NOT NULL,
  `codSolicitacaoAvaliacao` int(11) NOT NULL,
  `codProfessor` int(11) NOT NULL COMMENT 'Tabela habilitação pessoa',
  `codAluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ChekinPessoal`
--

CREATE TABLE IF NOT EXISTS `ChekinPessoal` (
  `codChekeinPessoal` smallint(6) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `dataNacimento` date NOT NULL,
  `pesoAtual` int(11) NOT NULL,
  `codSituacaoFisica` int(11) NOT NULL COMMENT 'Tipo Utilitário id: 4',
  `codObjetivo` int(11) NOT NULL COMMENT 'Tipo Utilitário 10',
  `pesoDesejado` int(11) NOT NULL,
  `nroMeses` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `ChekinPessoal`
--

INSERT INTO `ChekinPessoal` (`codChekeinPessoal`, `codPessoa`, `dataNacimento`, `pesoAtual`, `codSituacaoFisica`, `codObjetivo`, `pesoDesejado`, `nroMeses`) VALUES
(1, 1, '2000-06-05', 0, 5, 43, 80, 10),
(2, 1, '1990-09-21', 100, 3, 41, 80, 6),
(3, 2, '2001-09-11', 90, 3, 42, 70, 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Exercicios`
--

CREATE TABLE IF NOT EXISTS `Exercicios` (
  `codExercicios` smallint(6) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `codRestricaos` int(11) NOT NULL COMMENT 'Tipo Utilitário id:14'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Feeback`
--

CREATE TABLE IF NOT EXISTS `Feeback` (
  `codFeeback` smallint(6) NOT NULL,
  `cod` int(11) NOT NULL COMMENT 'Cod de varias tabelas ',
  `tabela` varchar(40) NOT NULL COMMENT 'Nome da tabela origem a linha',
  `notaAvalicao` int(11) NOT NULL,
  `dataAvalicao` date NOT NULL,
  `tempoAtividade` int(11) NOT NULL,
  `codNotacao` int(11) NOT NULL COMMENT 'Tipo Utilitário id:13'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `HabilitacaoPessoa`
--

CREATE TABLE IF NOT EXISTS `HabilitacaoPessoa` (
  `codHabilitacaoPessoa` smallint(6) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `codTipoHabilitacao` int(11) NOT NULL COMMENT 'Tipo Utilitário id:8',
  `Ativo` tinyint(1) NOT NULL,
  `codLocalidade` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `HabilitacaoPessoa`
--

INSERT INTO `HabilitacaoPessoa` (`codHabilitacaoPessoa`, `codPessoa`, `codTipoHabilitacao`, `Ativo`, `codLocalidade`) VALUES
(1, 1, 16, 1, 0),
(2, 2, 17, 1, 0),
(3, 3, 17, 1, 0),
(4, 4, 16, 1, 0),
(5, 5, 17, 1, 0),
(6, 6, 17, 1, 0),
(7, 7, 17, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PerfisUsuario`
--

CREATE TABLE IF NOT EXISTS `PerfisUsuario` (
  `codPerfisUsuarios` smallint(6) NOT NULL,
  `codHabilitacaoPessoa` int(11) NOT NULL,
  `Objeto` varchar(50) NOT NULL,
  `criar` tinyint(1) NOT NULL,
  `editar` tinyint(1) NOT NULL,
  `deletar` tinyint(1) NOT NULL,
  `cosultar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `PermisoesUsuarios`
--

CREATE TABLE IF NOT EXISTS `PermisoesUsuarios` (
  `codPermisoesUsuarios` smallint(6) NOT NULL,
  `idPerfisUsuario` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Pessoa`
--

CREATE TABLE IF NOT EXISTS `Pessoa` (
  `codPessoa` smallint(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `codTipoPessoa` int(11) NOT NULL COMMENT 'Tipo Utilitário id:3',
  `codProfissao` int(11) NOT NULL COMMENT 'Tipo Utilitário id:6',
  `cpf` varchar(20) NOT NULL,
  `Ativa` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=REDUNDANT;

--
-- Fazendo dump de dados para tabela `Pessoa`
--

INSERT INTO `Pessoa` (`codPessoa`, `nome`, `cidade`, `codTipoPessoa`, `codProfissao`, `cpf`, `Ativa`) VALUES
(1, 'Jorge maia', 'Porto alegre', 23, 29, '223332123312', 1),
(2, 'Neiamar gobbi', 'Porto alegre', 23, 26, '223332123312', 1),
(3, 'Mariana', 'Porto alegre', 23, 26, '126565612767', 1),
(4, 'Castor solverio', 'Porto alegre', 23, 29, '126565617788', 1),
(5, 'Rodrigo avelar', 'Porto alegre', 23, 26, '165652128768', 1),
(6, 'Daniel dias', 'Porto alegre', 23, 27, '125454128787', 1),
(7, 'Aurelio santana', 'Porto alegre', 23, 28, '121545428787', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `PlanoAtividadePessoal`
--

CREATE TABLE IF NOT EXISTS `PlanoAtividadePessoal` (
  `codPlanoAtividadePessoal` int(11) NOT NULL,
  `codTreino` int(11) NOT NULL,
  `codAluno` int(11) NOT NULL,
  `codTipoTreino` int(11) NOT NULL COMMENT 'Tipo Utilitário id:9',
  `codAvaliacaoAlunos` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL,
  `dataIniciao` date NOT NULL,
  `dataFim` int(11) NOT NULL,
  `codObjeitvo` int(11) NOT NULL COMMENT 'Tipo Utilitário id:10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ResultadosPeriodicos`
--

CREATE TABLE IF NOT EXISTS `ResultadosPeriodicos` (
  `codResultadosPeriodicos` smallint(6) NOT NULL,
  `codPlanoAtividadePessoal` int(11) NOT NULL,
  `pesoMeta` int(11) NOT NULL,
  `pesoAtingido` int(11) NOT NULL,
  `nroDias` int(11) NOT NULL,
  `dataAvalicao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `SolicitacaoAvalicao`
--

CREATE TABLE IF NOT EXISTS `SolicitacaoAvalicao` (
  `codSolicitacaoAvalicao` smallint(6) NOT NULL,
  `codAluno` int(11) NOT NULL,
  `codProfessor` int(11) NOT NULL,
  `codSituação` int(11) NOT NULL COMMENT 'Tipo Utilitário id:4'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `TipoUtilitarios`
--

CREATE TABLE IF NOT EXISTS `TipoUtilitarios` (
  `codTipoUtilitario` smallint(20) unsigned NOT NULL,
  `descTipoUtilitario` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `TipoUtilitarios`
--

INSERT INTO `TipoUtilitarios` (`codTipoUtilitario`, `descTipoUtilitario`) VALUES
(3, 'Tipo pessoa'),
(4, 'Situação fisica'),
(5, 'Doenças'),
(6, 'Profissoções'),
(7, 'Tipo Exercícios'),
(8, 'Tipo habilitação pessoa'),
(9, 'Tipo de treinos'),
(10, 'Objetivo checkim'),
(12, 'Tipo execução atividade trieno'),
(13, 'Notação'),
(14, 'Restrições exercicios');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Treinos`
--

CREATE TABLE IF NOT EXISTS `Treinos` (
  `codTreinos` smallint(6) NOT NULL,
  `codProfessor` int(11) NOT NULL,
  `codTipoTreino` int(11) NOT NULL COMMENT 'Tipo Utilitário id:9',
  `descObjetivo` text NOT NULL,
  `qtDiasDuracao` int(11) NOT NULL,
  `qtDiasAvaliacao` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(10) unsigned zerofill NOT NULL,
  `login` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Usuario`
--

INSERT INTO `Usuario` (`id`, `login`, `email`, `senha`) VALUES
(0000000010, 'Mariana', 'mariana@gmail.com', '12345'),
(0000000011, 'Rodrigo', 'roavellarm@gmail.com', '54321'),
(0000000012, 'AurÃ©lio', 'aurelio@email.com', '123123'),
(0000000013, 'Neimar', 'neimar@email.com', '321321'),
(0000000014, 'Daniel', 'daniel@email.com', '654876');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `codUsuarios` varchar(20) NOT NULL,
  `codPessoa` int(11) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `confirmaSenha` varchar(8) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Usuarios`
--

INSERT INTO `Usuarios` (`codUsuarios`, `codPessoa`, `senha`, `confirmaSenha`, `status`) VALUES
('', 2, '1234', '0', 0),
('neimar', 2, '1234', '0', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Utilitarios`
--

CREATE TABLE IF NOT EXISTS `Utilitarios` (
  `codUtilitario` smallint(11) NOT NULL,
  `utilitario` varchar(255) NOT NULL,
  `codTipoUtilirario` int(11) NOT NULL,
  `Obs` text NOT NULL,
  `codSubGrupo` int(11) NOT NULL,
  `favorita` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `Utilitarios`
--

INSERT INTO `Utilitarios` (`codUtilitario`, `utilitario`, `codTipoUtilirario`, `Obs`, `codSubGrupo`, `favorita`) VALUES
(1, 'Não realizo atividades', 4, '', 0, 0),
(2, 'Realizo atividades', 4, '', 0, 0),
(3, 'Não realizo atividades', 4, '', 0, 0),
(4, 'Realizo atividades', 4, '', 0, 0),
(5, 'Sou atleta amador', 4, '', 0, 0),
(6, 'Ateleta profissional', 4, '', 0, 0),
(7, 'Cedentário', 4, '', 0, 0),
(8, 'Perna', 7, '', 0, 0),
(9, 'Lombar', 7, '', 0, 0),
(10, 'Hipertenção ', 5, '', 0, 0),
(11, 'Ostoporose', 5, '', 0, 0),
(12, 'Hipertenção ', 5, '', 0, 0),
(13, 'Ostoporose', 5, '', 0, 0),
(15, 'Administrador', 8, '', 0, 0),
(16, 'Personal treiner', 8, '', 0, 0),
(17, 'Aluno', 8, '', 0, 0),
(18, 'Intermediario', 9, '', 0, 0),
(19, 'Básico', 9, '', 0, 0),
(20, 'Intermidiario', 9, '', 0, 0),
(21, 'Avançado', 9, '', 0, 0),
(22, 'Profissional', 9, '', 0, 0),
(23, 'Fisica', 3, '', 0, 0),
(24, 'Juridica', 3, '', 0, 0),
(25, 'Ambos', 3, '', 0, 0),
(26, 'Engenheiro', 6, '', 0, 0),
(27, 'Estudante', 6, '', 0, 0),
(28, 'Programador', 6, '', 0, 0),
(29, 'Professor', 6, '', 0, 0),
(30, 'Faxineiro', 6, '', 0, 0),
(41, 'Perder peso', 10, '', 0, 0),
(42, 'Ganhar massa muscular', 10, '', 0, 0),
(43, 'Melhorar meu preparo fisico', 10, '', 0, 0),
(44, 'Treinamento profissional', 10, '', 0, 0),
(45, 'Treinamento para competir', 10, '', 0, 0),
(49, 'Diário', 12, '', 0, 0),
(50, 'Dia sim dia não', 12, '', 0, 0),
(51, 'Semanal', 12, '', 0, 0),
(52, 'Quinsenal', 12, '', 0, 0),
(53, 'Série', 13, '', 0, 0),
(54, 'Hs', 13, '', 0, 0),
(55, 'Dias', 13, '', 0, 0),
(56, 'Semanas', 13, '', 0, 0),
(57, 'Série', 13, '', 0, 0),
(58, 'Km', 13, '', 0, 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `AgendaTreinamentos`
--
ALTER TABLE `AgendaTreinamentos`
  ADD PRIMARY KEY (`codAgendaTreinamentos`);

--
-- Índices de tabela `AtividadesTreino`
--
ALTER TABLE `AtividadesTreino`
  ADD PRIMARY KEY (`codAtividadesTreino`);

--
-- Índices de tabela `AvaliacaoAluno`
--
ALTER TABLE `AvaliacaoAluno`
  ADD PRIMARY KEY (`codAvaliacaoAluno`);

--
-- Índices de tabela `ChekinPessoal`
--
ALTER TABLE `ChekinPessoal`
  ADD PRIMARY KEY (`codChekeinPessoal`);

--
-- Índices de tabela `Feeback`
--
ALTER TABLE `Feeback`
  ADD PRIMARY KEY (`codFeeback`);

--
-- Índices de tabela `HabilitacaoPessoa`
--
ALTER TABLE `HabilitacaoPessoa`
  ADD PRIMARY KEY (`codHabilitacaoPessoa`);

--
-- Índices de tabela `PerfisUsuario`
--
ALTER TABLE `PerfisUsuario`
  ADD PRIMARY KEY (`codPerfisUsuarios`);

--
-- Índices de tabela `PermisoesUsuarios`
--
ALTER TABLE `PermisoesUsuarios`
  ADD PRIMARY KEY (`codPermisoesUsuarios`);

--
-- Índices de tabela `Pessoa`
--
ALTER TABLE `Pessoa`
  ADD PRIMARY KEY (`codPessoa`);

--
-- Índices de tabela `ResultadosPeriodicos`
--
ALTER TABLE `ResultadosPeriodicos`
  ADD PRIMARY KEY (`codResultadosPeriodicos`);

--
-- Índices de tabela `SolicitacaoAvalicao`
--
ALTER TABLE `SolicitacaoAvalicao`
  ADD PRIMARY KEY (`codSolicitacaoAvalicao`);

--
-- Índices de tabela `TipoUtilitarios`
--
ALTER TABLE `TipoUtilitarios`
  ADD PRIMARY KEY (`codTipoUtilitario`), ADD UNIQUE KEY `codTipoUtilitario` (`codTipoUtilitario`);

--
-- Índices de tabela `Treinos`
--
ALTER TABLE `Treinos`
  ADD PRIMARY KEY (`codTreinos`);

--
-- Índices de tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `Utilitarios`
--
ALTER TABLE `Utilitarios`
  ADD PRIMARY KEY (`codUtilitario`), ADD UNIQUE KEY `codUtilitario` (`codUtilitario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `AgendaTreinamentos`
--
ALTER TABLE `AgendaTreinamentos`
  MODIFY `codAgendaTreinamentos` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `AtividadesTreino`
--
ALTER TABLE `AtividadesTreino`
  MODIFY `codAtividadesTreino` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `AvaliacaoAluno`
--
ALTER TABLE `AvaliacaoAluno`
  MODIFY `codAvaliacaoAluno` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `ChekinPessoal`
--
ALTER TABLE `ChekinPessoal`
  MODIFY `codChekeinPessoal` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de tabela `Feeback`
--
ALTER TABLE `Feeback`
  MODIFY `codFeeback` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `HabilitacaoPessoa`
--
ALTER TABLE `HabilitacaoPessoa`
  MODIFY `codHabilitacaoPessoa` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `PerfisUsuario`
--
ALTER TABLE `PerfisUsuario`
  MODIFY `codPerfisUsuarios` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `PermisoesUsuarios`
--
ALTER TABLE `PermisoesUsuarios`
  MODIFY `codPermisoesUsuarios` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Pessoa`
--
ALTER TABLE `Pessoa`
  MODIFY `codPessoa` smallint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `ResultadosPeriodicos`
--
ALTER TABLE `ResultadosPeriodicos`
  MODIFY `codResultadosPeriodicos` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `SolicitacaoAvalicao`
--
ALTER TABLE `SolicitacaoAvalicao`
  MODIFY `codSolicitacaoAvalicao` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `TipoUtilitarios`
--
ALTER TABLE `TipoUtilitarios`
  MODIFY `codTipoUtilitario` smallint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de tabela `Treinos`
--
ALTER TABLE `Treinos`
  MODIFY `codTreinos` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de tabela `Utilitarios`
--
ALTER TABLE `Utilitarios`
  MODIFY `codUtilitario` smallint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
