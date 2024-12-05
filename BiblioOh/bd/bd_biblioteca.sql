-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Nov-2024 às 15:00
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
-- Banco de dados: `bd_biblioteca`
--
create database `bd_biblioteca`;
use `bd_biblioteca`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `administra_livro`
--

CREATE TABLE `administra_livro` (
  `Id_Funcionario` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administra_livro`
--

INSERT INTO `administra_livro` (`Id_Funcionario`, `Cod_Livro`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `Cod_Cargo` int(11) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `Nome_Cargo` varchar(50) NOT NULL,
  `Salario` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`Cod_Cargo`, `Descricao`, `Nome_Cargo`, `Salario`) VALUES
(1, 'Gerencia atividades administrativas', 'Gerente', 3500),
(2, 'Cuida das estantes e organiza os livros', 'Bibliotecário', 2800),
(3, 'Atende os clientes e organiza devoluções', 'Atendente', 1800),
(4, 'Realiza limpezas no ambiente', 'Auxiliar de Limpeza', 1200),
(5, 'Gerencia empréstimos e devoluções', 'Supervisor de Empréstimos', 3000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta_administrador`
--

CREATE TABLE `conta_administrador` (
  `Id_Funcionario` int(11) NOT NULL,
  `Senha` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `conta_administrador`
--

INSERT INTO `conta_administrador` (`Id_Funcionario`, `Senha`) VALUES
(1, '7272'),
(2, '12345'),
(3, 'batman');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresta_livro`
--

CREATE TABLE `empresta_livro` (
  `Id_Usuario` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL,
  `Data_Emissao` date NOT NULL,
  `Data_Devolucao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresta_livro`
--

INSERT INTO `empresta_livro` (`Id_Usuario`, `Cod_Livro`, `Data_Emissao`, `Data_Devolucao`) VALUES
(1, 1, '2024-11-22', '2024-11-29'),
(2, 3, '2024-11-20', '2024-11-27'),
(3, 5, '2024-11-25', '2024-12-02'),
(4, 2, '2024-11-24', '2024-12-01'),
(5, 4, '2024-11-21', '2024-11-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Id_Funcionario` int(11) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `RG` varchar(12) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Data_Nasc` date NOT NULL,
  `Data_Admissao` date NOT NULL,
  `Endereco` varchar(100) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cod_Periodo` int(11) NOT NULL,
  `Cod_Cargo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`Id_Funcionario`, `Nome`, `RG`, `CPF`, `Data_Nasc`, `Data_Admissao`, `Endereco`, `Telefone`, `Email`, `Cod_Periodo`, `Cod_Cargo`) VALUES
(1, 'Gabriel Santos', '123456782', '111.111.111-11', '1988-02-02', '2018-02-26', 'Rua A, 123', '(11) 99999-1111', 'gabriel.santos@blibiooh.com', 1, 1),
(2, 'Guilherme Santos', '987654321', '222.222.222-22', '1985-02-20', '2022-03-10', 'Rua B, 456', '(11) 98888-2222', 'guilherme.santos@blibiooh.com', 2, 2),
(3, 'Gabriel Oliveira', '111222333', '333.333.333-33', '1992-07-30', '2021-05-01', 'Rua C, 789', '(11) 97777-3333', 'gabriel.oliveira@blibiooh.com', 3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_Livro` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Nome_Autor` varchar(80) NOT NULL,
  `Data_Lancamento` date NOT NULL,
  `Genero` varchar(50) NOT NULL,
  `Qtde_Pagina` int(11) NOT NULL,
  `Exemplares` int(11) NOT NULL,
  `Editora` varchar(50) NOT NULL,
  `ISBN` varchar(13) NOT NULL,
  `Cod_Setor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cod_Livro`, `Titulo`, `Nome_Autor`, `Data_Lancamento`, `Genero`, `Qtde_Pagina`, `Exemplares`, `Editora`, `ISBN`, `Cod_Setor`) VALUES
(1, 'O Mundo de Sofia', 'Jostein Gaarder', '1991-10-01', 'Filosofia', 494, 5, 'Editora Arqueiro', '9788539002632', 1),
(2, 'O Principe de Maquiavel', 'Niccolo Machiavelli', '1532-01-01', 'Politica', 184, 4, 'Editora Martin Claret', '9788578273836', 2),
(3, 'A Arte da Guerra', 'Sun Tzu', '2022-02-15', 'Estrategia', 49, 6, 'Editora Record', '9788535906167', 3),
(4, 'O Guarani', 'Jose de Alencar', '1857-01-01', 'Romance', 568, 3, 'Editora Atica', '9788502047957', 1),
(5, 'O Pequeno Principe', 'Antoine de Saint-Exupery', '1943-04-06', 'Infantil', 71, 6, 'Editora Agir', '9788501060227', 4),
(6, 'Revolucao dos Bichos', 'George Orwell', '1945-08-17', 'Fabula Politica', 87, 5, 'Editora Companhia das Letras', '9788535911192', 2),
(7, 'O Menino do Pijama Listrado', 'John Boyne', '2006-01-05', 'Ficcao Historica', 132, 4, 'Editora Companhia das Letras', '9788535911239', 3),
(8, 'Fahrenheit 451', 'Ray Bradbury', '1953-10-19', 'Ficcao Cientifica', 127, 5, 'Editora Globo', '9788525068525', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

CREATE TABLE `periodo` (
  `Cod_Periodo` int(11) NOT NULL,
  `Descricao` varchar(30) NOT NULL,
  `Hora_Entrada` time NOT NULL,
  `Hora_Saida` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `periodo`
--

INSERT INTO `periodo` (`Cod_Periodo`, `Descricao`, `Hora_Entrada`, `Hora_Saida`) VALUES
(1, 'Manhã', '08:00:00', '12:00:00'),
(2, 'Tarde', '13:00:00', '17:00:00'),
(3, 'Noite', '18:00:00', '22:00:00'),
(4, 'Integral', '08:00:00', '17:00:00'),
(5, 'Madrugada', '00:00:00', '06:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `Cod_Setor` int(11) NOT NULL,
  `Andar` varchar(30) NOT NULL,
  `Genero` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`Cod_Setor`, `Andar`, `Genero`) VALUES
(1, 'Térreo', 'Ficção'),
(2, '1º Andar', 'História'),
(3, '2º Andar', 'Tecnologia'),
(4, '3º Andar', 'Mistério'),
(5, '4º Andar', 'Romance');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Nome` varchar(80) NOT NULL,
  `Endereco` varchar(100) NOT NULL,
  `RG` varchar(15) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `Telefone` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Senha` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nome`, `Endereco`, `RG`, `CPF`, `Telefone`, `Email`, `Senha`) VALUES
(1, 'Gustavo Silva', 'Rua F, 303', '555666776', '666.666.666-66', '(11) 94444-6666', 'gustavosilva@blibiooh.com', 'senha123'),
(2, 'Ana Santos', 'Rua G, 404', '888999000', '777.777.777-77', '(11) 93333-7777', 'anasantos@blibiooh.com', 'senha456'),
(3, 'Juliana Oliveira', 'Rua H, 505', '111222333', '888.888.888-88', '(11) 92222-8888', 'julianaoliveira@blibiooh.com', 'senha789'),
(6, 'Felipe Santos', 'rua ermelino, 90', '1211122234', '11122233345', '11987665433', 'felipe@blibiooh.com', '0000'),
(8, 'Usuario da Silva', 'Rua do usuario, 96', '11.222.333-45', '111.222.333.44', '(11) 95494-3200', 'usuario@blibiooh.com', 'user1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Cod_Cargo`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Id_Funcionario`),
  ADD UNIQUE KEY `RG` (`RG`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_Livro`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Índices para tabela `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`Cod_Periodo`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`Cod_Setor`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `RG` (`RG`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Cod_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Id_Funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_Livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `periodo`
--
ALTER TABLE `periodo`
  MODIFY `Cod_Periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `Cod_Setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
