/* COLOCAR O LIMITE DA SENHA EM 300, COLOCAR SERIAL NAS RESPECTIVAS TABELAS,
TIRAR A TABELA USUARIO_DISCIPLINA, TIRAR O ID_USUARIO DA TABELA PLANEJAMENTO,
ADICIONAR UMA COLUNA INTEGER DE NOME "FAZER" NA TABELA plan_disc, TIRAR AS
SEGUINTES DISCIPLINAS: ATUALIDADES, SOCIOLOGIA, FILOSOFIA, COLOCAR MUITO 
MAIS CONTEUDO EM CADA DISCIPLINA(EU TE MANDO UM LUGAR ONDE TEM AS QUE MAIS
CAEM)  */

/* Lógico_1: */

CREATE TABLE USUARIO (
    ID INTEGER PRIMARY KEY,
    NOME VARCHAR(50),
    SEXO VARCHAR(50),
    DATA_NASCIMENTO DATE,
    SOBRENOME VARCHAR(50),
    EMAIL VARCHAR(100),
    SENHA VARCHAR(50),
    CELULAR VARCHAR(50)
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
    DT_INICIO DATE,
    DT_FINAL DATE,
    ID_USUARIO INTEGER,
    ID INTEGER PRIMARY KEY,
    NOME VARCHAR(50),
    FK_USUARIO_ID INTEGER
);

CREATE TABLE DIA_SEMANA (
    ID INTEGER PRIMARY KEY,
    NOME VARCHAR(100)
);

CREATE TABLE USUARIO_DISCIPLINA (
    FK_USUARIO_ID INTEGER,
    FK_DISCIPLINAS_ID INTEGER
);

CREATE TABLE PLAN_DISC (
    FK_PLANEJAMENTO_ID INTEGER,
    FK_DISCIPLINAS_ID INTEGER
);

CREATE TABLE PLAN_DIA (
    FK_PLANEJAMENTO_ID INTEGER,
    FK_DIA_SEMANA_ID INTEGER,
    QTD_HORAS INTEGER
);
 
ALTER TABLE CONTEUDOS ADD CONSTRAINT FK_CONTEUDOS_2
    FOREIGN KEY (FK_DISCIPLINAS_ID)
    REFERENCES DISCIPLINAS (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLANEJAMENTO ADD CONSTRAINT FK_PLANEJAMENTO_2
    FOREIGN KEY (FK_USUARIO_ID)
    REFERENCES USUARIO (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE USUARIO_DISCIPLINA ADD CONSTRAINT FK_USUARIO_DISCIPLINA_1
    FOREIGN KEY (FK_USUARIO_ID)
    REFERENCES USUARIO (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE USUARIO_DISCIPLINA ADD CONSTRAINT FK_USUARIO_DISCIPLINA_2
    FOREIGN KEY (FK_DISCIPLINAS_ID)
    REFERENCES DISCIPLINAS (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLAN_DISC ADD CONSTRAINT FK_PLAN_DISC_1
    FOREIGN KEY (FK_PLANEJAMENTO_ID)
    REFERENCES PLANEJAMENTO (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLAN_DISC ADD CONSTRAINT FK_PLAN_DISC_2
    FOREIGN KEY (FK_DISCIPLINAS_ID)
    REFERENCES DISCIPLINAS (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLAN_DIA ADD CONSTRAINT FK_PLAN_DIA_1
    FOREIGN KEY (FK_PLANEJAMENTO_ID)
    REFERENCES PLANEJAMENTO (ID)
    ON DELETE RESTRICT;
 
ALTER TABLE PLAN_DIA ADD CONSTRAINT FK_PLAN_DIA_2
    FOREIGN KEY (FK_DIA_SEMANA_ID)
    REFERENCES DIA_SEMANA (ID)
    ON DELETE RESTRICT;

insert into usuario (ID, nome, sobrenome, email, celular, sexo, senha) values
(1234, 'Fernando', 'Marvila', 'fernandomarvila@gmail.com', '27999998888', 'M', 'fernandomarvila'),
(2345, 'Larissa', 'Silva', 'larissasilva@gmail.com', '27999997777', 'F', 'larissasilva'),
(3456, 'Julia', 'Rabello', 'juliarabello@gmail.com', '27999996666', 'F', 'juliarabello'),
(4567, 'Marcela', 'Abreu', 'marcelaabreu@gmail.com', '27999995555', 'F', 'marcelaabreu'),
(5678, 'Joao', 'Francalossi', 'joaofrancalossi@gmail.com', '27999994444', 'M', 'joaofrancalossi'),
(6789, 'Ricardo', 'Mariano', 'ricardomariano@gmail.com', '27999993333', 'M', 'ricardomariano'),
(7891, 'Otavio', 'Marconi', 'otaviomarconi@gmail.com', '27999992222', 'M', 'otaviomarconi'),
(8912, 'Pedro', 'Massariol', 'pedromassariol@gmail.com', '27999991111', 'M', 'pedromassariol'),
(9123, 'Aline', 'Tavares', 'alinetavares@gmail.com', '27999990000', 'F', 'alinetavares'),
(1235, 'Amanda', 'Santana', 'amandasantana@gmail.com', '27999988888', 'F', 'amandasantana');

insert into disciplinas (nome, id) values
('Matematica', 1),
('Portugues', 2),
('Fisica', 3),
('Biologia', 4),
('Quimica', 5),
('Geografia', 6),
('Historia', 7),
('Filosofia', 8),
('Sociologia', 9),
('Atualidades', 10);

insert into conteudos (nome, id, fk_disciplinas_id) values
('Trigonometria', 1, 1),
('Morfologia', 2, 2),
('Forca de atrito', 3, 3),
('Fisiologia humana', 4, 4),
('Quimica organica', 5, 5),
('Globalizacao', 6, 6),
('Polinomios', 7, 1),
('Sintaxe', 8, 2),
('Leis de newton', 9, 3),
('Brasil império', 10, 7);


insert into planejamento (nome, dt_inicio, dt_final, id, fk_usuario_id) values
('Meu planejamento', '09-19-2022', '12-10-2022', 1, 1234),
('Meu planejamento', '09-19-2022', '12-10-2022', 2, 2345),
('Meu planejamento', '09-19-2022', '12-10-2022', 3, 3456),
('Meu planejamento', '09-19-2022', '12-10-2022', 4, 4567),
('Meu planejamento', '09-19-2022', '12-10-2022', 5, 5678),
('Meu planejamento', '09-19-2022', '12-10-2022', 6, 6789),
('Meu planejamento', '09-19-2022', '12-10-2022', 7, 7891),
('Meu planejamento', '09-19-2022', '12-10-2022', 8, 8912),
('Meu planejamento', '09-19-2022', '12-10-2022', 9, 9123),
('Meu planejamento', '09-19-2022', '12-10-2022', 10, 1235);

insert into dia_semana (id, nome) values
(1, 'Segunda feira'),
(2, 'Terca feira'),
(3, 'Quarta feira'),
(4, 'Quinta feira'),
(5, 'Sexta feira'),
(6, 'Sabado'),
(7, 'Domingo');



insert into plan_disc (fk_planejamento_id, fk_disciplinas_id) values
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10);


insert into plan_dia (fk_planejamento_id, fk_dia_semana_id, qtd_horas) values
(1, 1, 4),
(1, 2, 4),
(1, 3, 4),
(1, 4, 4),
(2, 1, 4),
(2, 2, 4),
(2, 3, 4),
(2, 4, 4),
(3, 1, 4),
(3, 2, 4);

insert into usuario_disciplina (fk_usuario_id, fk_disciplinas_id) values
(1234, 1),
(1234, 2),
(1234, 3),
(1234, 4),
(1234, 5),
(1234, 6),
(1234, 7),
(2345, 1),
(2345, 2),
(2345, 3);

insert into usuario values 
(0, 'ADM','ADM' ,'ADM@ADM.COM','27997330514', 'ADM', '$2y$10$1IM1Eq0gbCAHoYj6TSy8sO1ynvrxWcdmjvevjU4QfTBzC3N.aLCvS' ); 
/*usuário=ADM@ADM.COM
senha = adm*/