create database testePratico; 

use testePratico;

CREATE TABLE tipos_usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tipo VARCHAR(50) NOT NULL
);
 
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  login VARCHAR(255) NOT NULL,
  senha VARCHAR(255) NOT NULL,
  tipo_id INT NOT NULL,
  FOREIGN KEY (tipo_id) REFERENCES tipos_usuarios(id)
);

INSERT INTO tipos_usuarios (tipo) VALUES ('user'), ('admin');
