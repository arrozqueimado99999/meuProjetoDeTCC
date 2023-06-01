DROP TABLE IF EXISTS usuarios;

CREATE TABLE IF NOT EXISTS usuarios (
    id              INTEGER PRIMARY KEY,
    nome            TEXT NOT NULL,
    email           TEXT NOT NULL,
    senha           TEXT NOT NULL,
    curso           TEXT NOT NULL
);

INSERT INTO usuarios (id, nome, email, senha, curso) values (1,'Default','rochaisaac3254@gmail.com','isaac8638','informática');

DROP TABLE IF EXISTS categorias;
CREATE TABLE IF NOT EXISTS categorias (
    id              INTEGER PRIMARY KEY,
    nome            TEXT NOT NULL
);

INSERT INTO categorias (id, nome) values (1,'Análise e Desenvolvimento de Sistemas');

DROP TABLE IF EXISTS sub_categ;

CREATE TABLE IF NOT EXISTS sub_categ (
   id              INTEGER PRIMARY KEY,
   nome            TEXT NOT NULL,
   categoria_id       INTEGER,
   FOREIGN KEY (categoria_id)
       REFERENCES categorias (id)
);

INSERT INTO sub_categ (id, nome, categoria_id) values 
 (1,'Banco de Dados', 1),
 (2,'Ciência da Computação', 1),
 (3,'Ciência e Tecnologia', 1),
 (4,'Computação', 1),
 (5,'Estatística', 1),
 (6,'Informática', 1),
 (7,'Gestão da Tecnologia da Informação', 1),
 (8,'Nanotecnologia', 1),
 (9,'Redes de Computadores', 1),
 (10,'Segurança da Informação', 1),
 (11,'Sistemas de Informação', 1),
 (12,'Sistemas para Internet', 1);

DROP TABLE IF EXISTS projetos;

CREATE TABLE IF NOT EXISTS projetos (
    id              INTEGER PRIMARY KEY,
    titulo          TEXT    NOT NULL,
    descricao       TEXT,
    categoria_id       INTEGER,
    sub_categ_id       INTEGER,
    usuario_id      INTEGER,
    orient_id       INTEGER,
    FOREIGN KEY (sub_categ_id)
       REFERENCES sub_categ (id),
        FOREIGN KEY (categoria_id)
       REFERENCES categorias (id),
    FOREIGN KEY (usuario_id)
       REFERENCES usuarios (id),
    FOREIGN KEY (orient_id)
       REFERENCES orientadores (id)
);

INSERT INTO projetos (id, titulo, descricao, categoria_id, sub_categ_id, usuario_id, orient_id) values (1,'Default', 'hjcbjdjhchjadbchdjc', 1, 12 , 1, 1);

CREATE TABLE IF NOT EXISTS orientadores (
    id              INTEGER PRIMARY KEY,
    nome            TEXT NOT NULL,
    email           TEXT NOT NULL,
    senha           TEXT NOT NULL,
    curso           TEXT NOT NULL
);

INSERT INTO orientadores (id, nome, email, senha, curso ) values (1,'Default','rochaisaac3254@gmail.com','isaac8638','informática');

DROP TABLE IF EXISTS midia;
CREATE TABLE IF NOT EXISTS midia (
    id      INTEGER PRIMARY KEY,
    usuario_id      INTEGER    NOT NULL,
    projeto_id      INTEGER   NOT NULL,
    FOREIGN KEY (usuario_id)
       REFERENCES usuarios (id),
    FOREIGN KEY (projeto_id)
       REFERENCES projetos (id)
);