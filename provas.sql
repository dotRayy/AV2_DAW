-- Criando tabela candidatos
CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `identidade` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cargo_pretendido` varchar(255) NOT NULL,
  `sala_de_prova` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Criando tabela fiscais
CREATE TABLE `fiscais` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sala_de_prova` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

ALTER TABLE `fiscais`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `fiscais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Populando candidatos
INSERT INTO `candidatos` (`nome`, `cpf`, `identidade`, `email`, `cargo_pretendido`, `sala_de_prova`) VALUES
('Maria Silva', '12345678901', '987654321', 'maria@gmail.com', 'Engenheira', 1),
('João Oliveira', '98765432109', '123456789', 'joao@yahoo.com', 'Programador', 2),
('Ana Souza', '45678901234', '789012345', 'ana@hotmail.com', 'Médica', 3),
('Carlos Pereira', '98701234567', '543210987', 'carlos@gmail.com', 'Advogado', 1),
('Juliana Santos', '56789012345', '210987654', 'juliana@yahoo.com', 'Professora', 2);

-- Populando fiscais
INSERT INTO `fiscais` (`nome`, `cpf`, `email`, `sala_de_prova`) VALUES
('Alice Silva', '11223344556', 'alice.silva@gmail.com', 1),
('Bob Santos', '22334455667', 'bob.santos@yahoo.com', 2),
('Carol Oliveira', '33445566778', 'carol.oliveira@hotmail.com', 3);
