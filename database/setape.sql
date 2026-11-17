
CREATE DATABASE solidariza
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE solidariza;

-- TABELA DE USUÁRIOS
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cep CHAR(8) NOT NULL,
    logradouro VARCHAR(255),
    bairro VARCHAR(100),
    localidade VARCHAR(100),
    uf VARCHAR(2),
    nivel_acesso ENUM('doador', 'admin') DEFAULT 'doador',
    data_cadastro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- TABELA DE CAMPANHAS
CREATE TABLE campanhas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    descricao TEXT NOT NULL,
    status ENUM('ativa', 'inativa') DEFAULT 'ativa',
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- TABELA DE DOAÇÕES
CREATE TABLE doacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    campanha_id INT NOT NULL,
    item_descricao VARCHAR(255) NOT NULL,
    quantidade INT NOT NULL,
    status_logistica ENUM(
        'pendente',
        'aprovado',
        'coletado'
    ) DEFAULT 'pendente',
    data_registro DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (campanha_id) REFERENCES campanhas(id)
);
