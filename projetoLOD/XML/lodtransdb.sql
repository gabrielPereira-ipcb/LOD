-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Out-2024 às 13:35
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lodtransdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `camiao`
--

CREATE TABLE `camiao` (
  `matricula` varchar(10) NOT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `combustivel` varchar(20) DEFAULT NULL,
  `capacidade_combustivel` int(11) DEFAULT NULL,
  `capacidade_carga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `camiao`
--

INSERT INTO `camiao` (`matricula`, `marca`, `modelo`, `combustivel`, `capacidade_combustivel`, `capacidade_carga`) VALUES
('DG03TY', 'Mercedes-Benz', 'Arocs 3240', 'Gasoleo', 170, 200),
('HG02KE', 'Mercedes-Benz', 'Arocs 3240', 'Gasolina', 120, 250),
('JS43IS', 'Mercedes-Benz', 'Arocs 3240', 'Eletrico', 100, 230),
('MO05TE', 'Mercedes-Benz', 'Arocs 3240', 'Gasolina', 120, 250);

-- --------------------------------------------------------

--
-- Estrutura da tabela `camionista`
--

CREATE TABLE `camionista` (
  `id` int(11) NOT NULL,
  `numDoc` varchar(10) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `apelidos` varchar(100) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `altura` decimal(3,2) DEFAULT NULL,
  `nac` char(3) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL,
  `dataVal` date DEFAULT NULL,
  `filiacao` varchar(100) DEFAULT NULL,
  `idFiscal` varchar(9) DEFAULT NULL,
  `segSoc` varchar(15) DEFAULT NULL,
  `utenteSaude` varchar(15) DEFAULT NULL,
  `cartaCond` varchar(15) DEFAULT NULL,
  `dataConct` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `camionista`
--

INSERT INTO `camionista` (`id`, `numDoc`, `nome`, `apelidos`, `sexo`, `altura`, `nac`, `dataNasc`, `dataVal`, `filiacao`, `idFiscal`, `segSoc`, `utenteSaude`, `cartaCond`, `dataConct`) VALUES
(358734562, '3 YK8', 'MANUEL', 'SILVA OLIVEIRA FIGUEIREDO', 'M', '1.75', 'PRT', '1987-03-15', '2028-11-12', 'JOAQUIM OLIVEIRA SOUSA * FATIMA FIGUEIREDO SILVA', '345678910', '13456279098', '569874231', '4982347892', '2025-05-14'),
(459834621, '4 WZ3', 'RICARDO', 'MARTINS FONSECA PEREIRA', 'M', '1.78', 'PRT', '1990-11-08', '2032-08-22', 'ANTONIO PEREIRA FONSECA * CARLA MARTINS FERREIRA', '456782913', '12457609872', '785623014', '5493820176', '2026-06-06'),
(855305734, '1 ZX6', 'MIGUEL', 'ALMEIDA DOS SANTOS', 'M', '1.70', 'PRT', '1972-07-25', '2030-07-09', 'ANTONIO AVEIRO DOS SANTOS * MARIA DOLORES', '203457890', '11235987', '657890123', '467901342', '2024-09-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `entidade` varchar(50) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `concelho` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telemovel` varchar(15) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`entidade`, `nif`, `distrito`, `concelho`, `email`, `telemovel`, `endereco`) VALUES
('Peixaria do Antonio', '193760184', 'Castelo Branco', 'Castelo Branco', 'almeida@gmail.pt', '967210891', 'Avenida Ribeiro das Perdizes, lote 9, 4C, 6000-345'),
('Pingo Doce', '196587960', 'Castelo Branco', 'Castelo Branco', 'cardoso@gmail.pt', '923458910', 'Avenida Julio Rodrigues, lote 23, 4F, 6000-210'),
('Carnes Matias', '297605098', 'Castelo Branco', 'Covilha', 'antunes@gmail.pt', '965432167', 'Avenida Das Flores, lote 1, 3D, 6003-210');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `entidade` varchar(50) NOT NULL,
  `nif` varchar(9) NOT NULL,
  `distrito` varchar(50) DEFAULT NULL,
  `concelho` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telemovel` varchar(15) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`entidade`, `nif`, `distrito`, `concelho`, `email`, `telemovel`, `endereco`) VALUES
('LODTrans', '983759326', 'Castelo Branco', 'Castelo Branco', 'lodtrans@gmail.pt', '967472538', 'Avenida Cidade de Zuhai, lote 23, 2FD, 6000-345');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE `encomenda` (
  `idEnc` varchar(10) NOT NULL,
  `nifCliente` varchar(9) DEFAULT NULL,
  `matCamiao` varchar(10) DEFAULT NULL,
  `idCamionista` int(11) DEFAULT NULL,
  `dataRecolha` date DEFAULT NULL,
  `dataEntrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `encomenda`
--

INSERT INTO `encomenda` (`idEnc`, `nifCliente`, `matCamiao`, `idCamionista`, `dataRecolha`, `dataEntrega`) VALUES
('001', '193760184', 'HG02KE', 855305734, '2024-10-13', '2024-10-17'),
('002', '297605098', 'JS43IS', 358734562, '2024-10-01', '2024-10-03');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `camiao`
--
ALTER TABLE `camiao`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `camionista`
--
ALTER TABLE `camionista`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nif`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`nif`);

--
-- Índices para tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD PRIMARY KEY (`idEnc`),
  ADD KEY `nifCliente` (`nifCliente`),
  ADD KEY `matCamiao` (`matCamiao`),
  ADD KEY `idCamionista` (`idCamionista`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD CONSTRAINT `encomenda_ibfk_1` FOREIGN KEY (`nifCliente`) REFERENCES `cliente` (`nif`),
  ADD CONSTRAINT `encomenda_ibfk_2` FOREIGN KEY (`matCamiao`) REFERENCES `camiao` (`matricula`),
  ADD CONSTRAINT `encomenda_ibfk_3` FOREIGN KEY (`idCamionista`) REFERENCES `camionista` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
