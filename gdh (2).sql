-- CREATE TABLE USUARIO (
--     ID SERIAL PRIMARY KEY,
--     NOME VARCHAR(50),
--     SOBRENOME VARCHAR(50),
--     EMAIL VARCHAR(100),
--     CELULAR VARCHAR(50),
--     GENERO VARCHAR(50),
--     SENHA VARCHAR(300)
-- );

-- CREATE TABLE DISCIPLINAS (
--     NOME VARCHAR(50),
--     ID PRIMARY KEY
-- );

-- CREATE TABLE CONTEUDOS (
--     NOME VARCHAR(100),
--     ID INTEGER PRIMARY KEY,
--     COD_DISCIPLINA INTEGER,
--     FK_DISCIPLINAS_ID INTEGER
-- );

-- CREATE TABLE PLANEJAMENTO (
--     NOME VARCHAR(50),
--     DT_INICIO DATE,
--     DT_FIM DATE,
--     FK_USUARIO_ID INTEGER,
--     ID SERIAL PRIMARY KEY
-- );

-- CREATE TABLE DIA_SEMANA (
--     ID INTEGER PRIMARY KEY,
--     NOME VARCHAR(100)
-- );

-- CREATE TABLE PLAN_DISC (
--     FK_DISCIPLINAS_ID INTEGER,
--     FAZER INTEGER,
--     ID INTEGER PRIMARY KEY
-- );

-- CREATE TABLE PLAN_DIA (
--     FK_DIA_SEMANA_ID INTEGER,
--     QTD_HORAS INTEGER,
--     ID INTEGER PRIMARY KEY
-- );


ALTER TABLE PLANEJAMENTO ADD ID SERIAL PRIMARY KEY;



/* Lógico_1: */

CREATE TABLE USUARIO (
    ID SERIAL PRIMARY KEY,
    NOME VARCHAR(50),
    SOBRENOME VARCHAR(50),
    EMAIL VARCHAR(100),
    CELULAR INTEGER,
    GENERO VARCHAR(50),
    SENHA VARCHAR(300)
);

CREATE TABLE DISCIPLINAS (
    NOME VARCHAR(50),
    ID INTEGER PRIMARY KEY
);

CREATE TABLE CONTEUDOS (
    NOME VARCHAR(100),
    ID INTEGER PRIMARY KEY,
    COD_DISCIPLINA INTEGER,
    FK_DISCIPLINAS_ID INTEGER
);

CREATE TABLE PLANEJAMENTO (
    NOME VARCHAR(50),
    DT_INICIO DATE,
    DT_FIM DATE,
    ID SERIAL PRIMARY KEY,
    FK_USUARIO_ID SERIAL
);

CREATE TABLE DIA_SEMANA (
    ID INTEGER PRIMARY KEY,
    NOME VARCHAR(100)
);

CREATE TABLE PLAN_DISC (
    FK_PLANEJAMENTO_ID INTEGER,
    FK_DISCIPLINAS_ID INTEGER,
    FAZER INTEGER,
    ID INTEGER PRIMARY KEY
);

CREATE TABLE PLAN_DIA (
    FK_PLANEJAMENTO_ID INTEGER,
    FK_DIA_SEMANA_ID INTEGER,
    QTD_HORAS INTEGER,
    ID INTEGER PRIMARY KEY
);
 
ALTER TABLE CONTEUDOS ADD CONSTRAINT FK_CONTEUDOS_2
    FOREIGN KEY (FK_DISCIPLINAS_ID)
    REFERENCES DISCIPLINAS (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLANEJAMENTO ADD CONSTRAINT FK_PLANEJAMENTO_2
    FOREIGN KEY (FK_USUARIO_ID)
    REFERENCES USUARIO (ID)
    ON DELETE CASCADE;
 
ALTER TABLE PLAN_DISC ADD CONSTRAINT FK_PLAN_DISC_2
    FOREIGN KEY (FK_PLANEJAMENTO_ID)
    REFERENCES PLANEJAMENTO (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLAN_DISC ADD CONSTRAINT FK_PLAN_DISC_3
    FOREIGN KEY (FK_DISCIPLINAS_ID)
    REFERENCES DISCIPLINAS (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLAN_DIA ADD CONSTRAINT FK_PLAN_DIA_2
    FOREIGN KEY (FK_PLANEJAMENTO_ID)
    REFERENCES PLANEJAMENTO (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLAN_DIA ADD CONSTRAINT FK_PLAN_DIA_3
    FOREIGN KEY (FK_DIA_SEMANA_ID)
    REFERENCES DIA_SEMANA (ID)
    ON DELETE RESTRICT;



insert into disciplinas (nome, id) values
('Matematica', 1),
('Portugues', 2),
('Fisica', 3),
('Biologia', 4),
('Quimica', 5),
('Geografia', 6),
('Historia', 7);

insert into conteudos (nome, id, fk_disciplinas_id) values
('Trigonometria', 1, 1),
('Estatistica', 2, 1),
('Logaritmo', 3, 1),
('Probabilidade', 4, 1),
('Equacao de 1 grau', 5, 1),
('Triangulos', 6, 1),
('Matematica basica', 7, 1),
('Analise de poemas', 8, 2),
('Generos e tipos textuais', 9, 2),
('Recursos expressivos', 10, 2),
('Figuras de linguagem', 11, 2),
('Romantismo', 12, 2),
('Realismo', 13, 2),
('Modernismo', 14, 2),
('Eletrodinamica', 15, 3),
('Termologia', 16, 3),
('Ondulatoria', 17, 3),
('Dinamica', 18, 3),
('Eletricidade', 19, 3),
('Hidrostatica', 20, 3),
('Optica', 21, 3),
('Fisiologia humana', 22, 4),
('Ecologia', 23, 4),
('Humana', 24, 4),
('Genetica', 25, 4),
('Impactos ambientais', 26, 4),
('Energia celular', 27, 4),
('Citologia', 28, 4),
('Quimica organica', 29, 5),
('Estequiometria', 30, 5),
('Pilha', 31, 5),
('Entalpia', 32, 5),
('Sistemas e misturas', 33, 5),
('Forcas intermoleculares', 34, 5),
('Entalpia', 35, 5),
('Globalizacao', 36, 6),
('Tectonismo', 37, 6),
('Demografia', 38, 6),
('Urbanizacao', 39, 6),
('Industria cultural', 40, 6),
('Clima', 41, 6),
('Relevo', 42, 6),
('Brasil imperio', 43, 7),
('Era Vargas', 44, 7),
('Guerra Fria', 45, 7),
('Queda do feudalismo', 46, 7),
('Imperio romano', 47, 7),
('Escravidao e pacto colonial', 48, 7),
('Antiguidade oriental', 49, 7);

insert into dia_semana (id, nome) values
(1, 'Segunda feira'),
(2, 'Terca feira'),
(3, 'Quarta feira'),
(4, 'Quinta feira'),
(5, 'Sexta feira'),
(6, 'Sabado'),
(7, 'Domingo');

insert INTO USUARIO (id, nome, EMAIL)





