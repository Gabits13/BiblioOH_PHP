-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2024 às 03:38
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
-- Banco de dados: `bd_biblioteca`
--
create database `bd_biblioteca`;
use `bd_biblioteca`;
-- --------------------------------------------------------

--
-- Estrutura para tabela `administra_livro`
--

CREATE TABLE `administra_livro` (
  `Id_Funcionario` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administra_livro`
--

INSERT INTO `administra_livro` (`Id_Funcionario`, `Cod_Livro`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargo`
--

CREATE TABLE `cargo` (
  `Cod_Cargo` int(11) NOT NULL,
  `Descricao` varchar(50) NOT NULL,
  `Nome_Cargo` varchar(50) NOT NULL,
  `Salario` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cargo`
--

INSERT INTO `cargo` (`Cod_Cargo`, `Descricao`, `Nome_Cargo`, `Salario`) VALUES
(1, 'Gerencia atividades administrativas', 'Gerente', 3500),
(2, 'Cuida das estantes e organiza os livros', 'Bibliotecário', 2800),
(3, 'Atende os clientes e organiza devoluções', 'Atendente', 1800),
(4, 'Realiza limpezas no ambiente', 'Auxiliar de Limpeza', 1200),
(5, 'Gerencia empréstimos e devoluções', 'Supervisor de Empréstimos', 3000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `conta_administrador`
--

CREATE TABLE `conta_administrador` (
  `Id_Funcionario` int(11) NOT NULL,
  `Senha` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `conta_administrador`
--

INSERT INTO `conta_administrador` (`Id_Funcionario`, `Senha`) VALUES
(1, '7272'),
(2, '12345'),
(3, 'batman');

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresta_livro`
--

CREATE TABLE `empresta_livro` (
  `Id_Usuario` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL,
  `Data_Emissao` date NOT NULL,
  `Data_Devolucao` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `empresta_livro`
--

INSERT INTO `empresta_livro` (`Id_Usuario`, `Cod_Livro`, `Data_Emissao`, `Data_Devolucao`) VALUES
(1, 1, '2024-09-01', '2024-09-15'),
(2, 3, '2024-09-05', '2024-09-19'),
(3, 5, '2024-09-07', '2024-09-21'),
(4, 2, '2024-09-10', '2024-09-24'),
(5, 4, '2024-09-12', '2024-09-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
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
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`Id_Funcionario`, `Nome`, `RG`, `CPF`, `Data_Nasc`, `Data_Admissao`, `Endereco`, `Telefone`, `Email`, `Cod_Periodo`, `Cod_Cargo`) VALUES
(1, 'Gabriel Santos', '123456789', '111.111.111-11', '1990-05-10', '2023-01-15', 'Rua A, 123', '(11) 99999-1111', 'gabriel.santos@blibiooh.com', 1, 1),
(2, 'Guilherme Santos', '987654321', '222.222.222-22', '1985-02-20', '2022-03-10', 'Rua B, 456', '(11) 98888-2222', 'guilherme.santos@blibiooh.com', 2, 2),
(3, 'Gabriel Oliveira', '111222333', '333.333.333-33', '1992-07-30', '2021-05-01', 'Rua C, 789', '(11) 97777-3333', 'gabriel.oliveira@blibiooh.com', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
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
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`Cod_Livro`, `Titulo`, `Nome_Autor`, `Data_Lancamento`, `Genero`, `Qtde_Pagina`, `Exemplares`, `Editora`, `ISBN`, `Cod_Setor`) VALUES
(1, 'O Mundo de Sofia', 'Jostein Gaarder', '1991-10-01', 'Filosofia', 400, 5, 'Editora Arqueiro', '9788539002632', 1),
(2, 'O Príncipe de Maquiavel', 'Niccolò Machiavelli', '1532-01-01', 'Política', 200, 4, 'Editora Martin Claret', '9788578273836', 2),
(3, 'A Arte da Guerra', 'Sun Tzu', '500 a.C.', 'Estratégia', 150, 6, 'Editora Record', '9788535906167', 3),
(4, 'O Pequeno Príncipe', 'Antoine de Saint-Exupéry', '1943-04-06', 'Infantil', 100, 6, 'Editora Agir', '9788501060227', 4),
(5, 'O Guarani', 'José de Alencar', '1857-01-01', 'Romance', 380, 3, 'Editora Ática', '9788502047957', 1),
(6, 'Revolução dos Bichos', 'George Orwell', '1945-08-17', 'Fábula Política', 150, 5, 'Editora Companhia das Letras', '9788535911192', 2),
(7, 'O Menino do Pijama Listrado', 'John Boyne', '2006-01-05', 'Ficção Histórica', 250, 4, 'Editora Companhia das Letras', '9788535911239', 3),
(8, 'Fahrenheit 451', 'Ray Bradbury', '1953-10-19', 'Ficção Científica', 300, 5, 'Editora Globo', '9788525068525', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `periodo`
--

CREATE TABLE `periodo` (
  `Cod_Periodo` int(11) NOT NULL,
  `Descricao` varchar(30) NOT NULL,
  `Hora_Entrada` time NOT NULL,
  `Hora_Saida` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `periodo`
--

INSERT INTO `periodo` (`Cod_Periodo`, `Descricao`, `Hora_Entrada`, `Hora_Saida`) VALUES
(1, 'Manhã', '08:00:00', '12:00:00'),
(2, 'Tarde', '13:00:00', '17:00:00'),
(3, 'Noite', '18:00:00', '22:00:00'),
(4, 'Integral', '08:00:00', '17:00:00'),
(5, 'Madrugada', '00:00:00', '06:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `setor`
--

CREATE TABLE `setor` (
  `Cod_Setor` int(11) NOT NULL,
  `Andar` varchar(30) NOT NULL,
  `Genero` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `setor`
--

INSERT INTO `setor` (`Cod_Setor`, `Andar`, `Genero`) VALUES
(1, 'Térreo', 'Ficção'),
(2, '1º Andar', 'História'),
(3, '2º Andar', 'Tecnologia'),
(4, '3º Andar', 'Mistério'),
(5, '4º Andar', 'Romance');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
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
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Nome`, `Endereco`, `RG`, `CPF`, `Telefone`, `Email`, `Senha`) VALUES
(1, 'Gustavo Silva', 'Rua F, 303', '555666777', '666.666.666-66', '(11) 94444-6666', 'gustavosilva@blibiooh.com', 'senha123'),
(2, 'Ana Santos', 'Rua G, 404', '888999000', '777.777.777-77', '(11) 93333-7777', 'anasantos@blibiooh.com', 'senha456'),
(3, 'Juliana Oliveira', 'Rua H, 505', '111222333', '888.888.888-88', '(11) 92222-8888', 'julianaoliveira@blibiooh.com', 'senha789'),
(6, 'Felipe Pato Santos', 'rua ermelino, 90', '1211122234', '11122233345', '11987665433', 'Felipe@blibiooh.com', 'pato'),
(8, 'Usuario da Silva', 'Rua do usuario, 96', '11.222.333-45', '111.222.333.44', '(11) 95494-3200', 'Usuario@blibiooh.com', 'user1');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`Cod_Cargo`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Id_Funcionario`),
  ADD UNIQUE KEY `RG` (`RG`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_Livro`),
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Índices de tabela `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`Cod_Periodo`);

--
-- Índices de tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`Cod_Setor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD UNIQUE KEY `RG` (`RG`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `Cod_Cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Id_Funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_Livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `periodo`
--
ALTER TABLE `periodo`
  MODIFY `Cod_Periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `Cod_Setor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
