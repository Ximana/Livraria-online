-- Estrutura para tabela autores
CREATE TABLE autores (
  id int PRIMARY KEY AUTO_INCREMENT,
  nome varchar(255) NOT NULL,
  profissao varchar(255) NOT NULL,
  biografia text NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

-- Estrutura para tabela autores_livros
CREATE TABLE autores_livros (
  id int PRIMARY KEY AUTO_INCREMENT,
  id_livro int NOT NULL,
  id_autor int NOT NULL,
  descricao enum('Autor','Co-Autor','Tradutor'),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  FOREIGN KEY (id_autor) REFERENCES autores(id) ON DELETE CASCADE,
  FOREIGN KEY (id_livro) REFERENCES livros(id) ON DELETE CASCADE
);

-- Estrutura para tabela categorias
CREATE TABLE categorias (
  id int PRIMARY KEY AUTO_INCREMENT,
  categoria varchar(255) NOT NULL,
  descricao text,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

-- Estrutura para tabela categoria_livros
CREATE TABLE categoria_livros (
  id int PRIMARY KEY AUTO_INCREMENT,
  id_livro int NOT NULL,
  id_categoria int NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  FOREIGN KEY (id_categoria) REFERENCES categorias(id) ON DELETE CASCADE,
  FOREIGN KEY (id_livro) REFERENCES livros(id) ON DELETE CASCADE
);

-- Estrutura para tabela livros
CREATE TABLE livros (
  id int PRIMARY KEY AUTO_INCREMENT,
  titulo varchar(255) NOT NULL,
  editora varchar(255),
  isbn varchar(255),
  idioma varchar(255) NOT NULL,
  resumo text NOT NULL,
  data_publicacao date DEFAULT NULL,
  preco decimal(8,2) NOT NULL,
  quantidade int NOT NULL,
  imagem varchar(255),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

-- Estrutura para tabela users
CREATE TABLE users (
  id int PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL,
  tipo varchar(255) NOT NULL DEFAULT 'cliente',
  email_verified_at timestamp NULL DEFAULT NULL,
  password varchar(255) NOT NULL,
  remember_token varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
);

-- Estrutura para tabela favoritos
CREATE TABLE favoritos (
  id int PRIMARY KEY AUTO_INCREMENT,
  user_id int NOT NULL,
  livro_id int NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (livro_id) REFERENCES livros(id) ON DELETE CASCADE
);

-- Estrutura para tabela pagamentos
CREATE TABLE pagamentos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  pedido_id INT NOT NULL,
  user_id INT NOT NULL,
  forma_pagamento ENUM('transferencia', 'multicaixa') NOT NULL,
  comprovativo VARCHAR(255) NOT NULL,
  status ENUM('pendente', 'confirmado', 'recusado') DEFAULT 'pendente',
  created_at TIMESTAMP NULL DEFAULT NULL,
  updated_at TIMESTAMP NULL DEFAULT NULL,
  FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);