-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 20-Nov-2018 às 21:40
-- Versão do servidor: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_os`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cados`
--

DROP TABLE IF EXISTS `cados`;
CREATE TABLE IF NOT EXISTS `cados` (
  `id_os` int(11) NOT NULL AUTO_INCREMENT,
  `numero_os` int(11) NOT NULL,
  `id_funcionario_os` int(11) NOT NULL,
  `id_status_os` int(11) NOT NULL,
  `data_agendamento_os` date NOT NULL,
  `data_cadastro_os` datetime NOT NULL,
  `data_modify_os` datetime DEFAULT NULL,
  PRIMARY KEY (`id_os`),
  KEY `fk_cados_id_funcionario_os` (`id_funcionario_os`) USING BTREE,
  KEY `fk_cados_id_status_os` (`id_status_os`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cados`
--

INSERT INTO `cados` (`id_os`, `numero_os`, `id_funcionario_os`, `id_status_os`, `data_agendamento_os`, `data_cadastro_os`, `data_modify_os`) VALUES
(9, 78271312, 4, 4, '2018-11-20', '2018-11-13 22:02:56', NULL),
(8, 99999999, 3, 4, '2018-11-16', '2018-11-13 22:02:33', NULL),
(7, 88888888, 3, 1, '2018-11-29', '2018-11-13 22:02:12', '2018-11-13 23:03:01'),
(10, 11111111, 1, 4, '2018-11-30', '2018-11-13 22:03:25', '2018-11-13 23:02:17'),
(11, 21782178, 4, 1, '2018-11-18', '2018-11-18 15:40:40', '2018-11-18 21:35:05'),
(12, 8912381, 3, 1, '2018-11-18', '2018-11-18 19:22:00', '2018-11-18 21:43:02'),
(13, 8928198, 1, 2, '2018-11-18', '2018-11-18 19:22:15', '2018-11-18 21:42:33'),
(14, 721812312, 4, 4, '2018-11-18', '2018-11-18 19:27:39', '2018-11-18 21:42:42'),
(16, 898989, 4, 4, '2018-11-19', '2018-11-19 11:49:51', NULL),
(17, 565656, 1, 4, '2018-11-19', '2018-11-19 11:50:12', NULL),
(18, 902912, 3, 4, '2018-11-19', '2018-11-19 19:40:08', NULL),
(19, 829212, 9, 1, '2018-11-19', '2018-11-19 19:41:29', '2018-11-19 19:41:37'),
(20, 888888, 1, 1, '2018-11-19', '2018-11-19 21:08:15', '2018-11-19 21:09:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcao`
--

DROP TABLE IF EXISTS `funcao`;
CREATE TABLE IF NOT EXISTS `funcao` (
  `funcao_id` int(11) NOT NULL AUTO_INCREMENT,
  `funcao_descricao` varchar(100) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `data_modify` datetime DEFAULT NULL,
  PRIMARY KEY (`funcao_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcao`
--

INSERT INTO `funcao` (`funcao_id`, `funcao_descricao`, `data_cadastro`, `data_modify`) VALUES
(8, 'Técnico Externo', '2018-10-15 16:57:56', NULL),
(7, 'Analista De Suporte 2', '2018-10-15 16:57:51', '2018-10-16 19:12:51'),
(13, 'Diretor', '2018-11-13 23:03:36', NULL),
(11, 'Gerente', '2018-11-02 17:09:16', NULL),
(12, 'Supervisor', '2018-11-02 17:09:26', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cpf` varchar(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `fun_data_cadastro` datetime NOT NULL,
  `fun_data_modify` datetime DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  KEY `fk_fun_id_funcao` (`id_funcao`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_funcionario`, `nome`, `email`, `cpf`, `id_funcao`, `fun_data_cadastro`, `fun_data_modify`) VALUES
(1, 'Andrew Mota  ', 'andrew@andrew.com.br', '12345678901', 7, '2018-11-02 11:42:59', '2018-11-02 17:21:49'),
(2, 'Antonio Sousa ', 'antonio@antonio.com.br', '9090129101 ', 10, '2018-11-02 17:08:39', '2018-11-02 17:25:15'),
(3, 'Stefano  ', 'stefano@stefano.com.br', '89273873  ', 8, '2018-11-02 17:15:14', '2018-11-18 19:26:20'),
(4, 'Antonio Sousa', 'tonysoumkd1@gmail.com', '12345678901', 8, '2018-11-13 21:58:25', '2018-11-18 19:30:10'),
(8, 'Thamyres', 'thamyres@thamyres.com.br', '90219021891', 11, '2018-11-19 19:40:51', NULL),
(9, 'Pedro', 'pedro@pedro.com.br', '92012910901', 8, '2018-11-19 19:41:11', NULL),
(10, 'Geverson', 'geverson@geverson.com.br', '892182921', 7, '2018-11-19 20:12:22', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `data_modify` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricao`, `data_cadastro`, `data_modify`) VALUES
(1, 'Concluida', '2018-10-16 19:04:09', NULL),
(2, 'Cancelada', '2018-10-16 19:04:22', NULL),
(4, 'Pendente', '2018-10-16 19:10:07', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `login` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `nivel_acesso` int(11) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `data_modify` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`, `email`, `nivel_acesso`, `data_cadastro`, `data_modify`) VALUES
(47, 'Paulo', 'paulo', '123', 'paulo@paulo.com.br', 0, '2018-09-19 01:25:57', NULL),
(48, 'Gustavo', 'gustavo', '123', 'gustavo@gustavo.com.br', 0, '2018-09-19 01:26:23', NULL),
(49, 'Antonio Jose', '', '', 'antonio@antonio.com.br', 0, '2018-10-31 19:30:40', NULL),
(42, 'Sissy Castro', 'sissy', '123', 'sissy@yahoo.com.br', 0, '2018-09-19 01:07:11', NULL),
(50, 'User', 'user', 'user', 'user@user.com.br', 0, '2018-11-19 11:56:10', NULL),
(38, 'Antonio Sousa Santos Dos Santos', 'admin ', '123 ', 'teste@teste.com.br', 1, '2018-09-16 19:56:30', '2018-09-16 20:00:23'),
(45, 'Stefano', 'stefano', '123', 'stefano@hotmail.com', 0, '2018-09-19 01:25:10', NULL),
(41, 'Antônio José Sousa Dos Santos ', 'admin ', 'admin     ', 'admin@admin.com.br', 1, '2018-09-16 19:59:32', '2018-09-19 11:15:24'),
(44, 'Pedro', 'pedro', '123', 'pedro@pedro.com.br', 0, '2018-09-19 01:24:45', NULL),
(31, 'Antônio Sousa ', 'asousa', '123 ', 'tonysousantos@gmail.com', 1, '2018-09-16 11:11:24', '2018-09-16 11:14:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
