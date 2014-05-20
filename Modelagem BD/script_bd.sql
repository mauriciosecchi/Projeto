CREATE TABLE usuario (
  id_usuario INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  cpf VARCHAR(15) NOT NULL,
  nome VARCHAR(45) NULL,
  id_socio VARCHAR(15) NULL,
  rg VARCHAR(45) NULL,
  dt_nasc DATE NULL,
  dt_assoc DATE NULL,
  logradouro VARCHAR(255) NULL,
  cep VARCHAR(15) NULL,
  cidade VARCHAR(45) NULL,
  estado VARCHAR(2) NULL,
  email VARCHAR(255) NULL,
  senha VARCHAR(45) NOT NULL,
  obs VARCHAR(255) NULL,
  tipo_usuario INTEGER UNSIGNED NULL,
  sobrenome VARCHAR(45) NULL,
  aprovacao INTEGER UNSIGNED NULL,
  telefone VARCHAR(45) NULL,
  celular VARCHAR(45) NULL,
  PRIMARY KEY(id_usuario)
);


CREATE TABLE modalidade (
  id_modalidade INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  desc_modalidade VARCHAR(45) NULL,
  horario_base DATETIME NULL,
  horario_ini DATETIME NULL,
  horario_fim DATETIME NULL,
  PRIMARY KEY(id_modalidade)
);

CREATE TABLE restricao (
  id_restricao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_usuario INTEGER UNSIGNED NOT NULL,
  dt_ini DATE NULL,
  dt_fim DATE NULL,
  PRIMARY KEY(id_restricao),
  FOREIGN KEY(id_usuario)
    REFERENCES usuario(id_usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE quadra (
  id_quadra INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_modalidade INTEGER UNSIGNED NOT NULL,
  desc_quadra VARCHAR(45) NULL,
  PRIMARY KEY(id_quadra),
  FOREIGN KEY(id_modalidade)
    REFERENCES modalidade(id_modalidade)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE reserva (
  id_reserva INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_usuario INTEGER UNSIGNED NOT NULL,
  id_quadra INTEGER UNSIGNED NOT NULL,
  desc_reserva VARCHAR(45) NULL,
  obs VARCHAR(255) NULL,
  dt_reserva DATE NULL,
  horario DATETIME NULL,
  PRIMARY KEY(id_reserva),
  FOREIGN KEY(id_usuario)
    REFERENCES usuario(id_usuario)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(id_quadra)
    REFERENCES quadra(id_quadra)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


