/* Lógico: */
CREATE DATABASE portal_fitoplancton;

CREATE TABLE  portal_fitoplancton.Usuario (
    id_usuario INT(3) PRIMARY KEY AUTO_INCREMENT,
    nome_usuario VARCHAR(50),
    email VARCHAR(255),
    senha CHAR(255),
    categoria VARCHAR(15)
);

CREATE TABLE  portal_fitoplancton.Projeto (
    id_estudo INT(6) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200),
    data DATETIME,
    descricao_estudo VARCHAR(500),
    referencia VARCHAR(400)
);

CREATE TABLE  portal_fitoplancton.Fitoplancton (
    id_fitoplancton INT(11) PRIMARY KEY AUTO_INCREMENT,
    fk_Local_id_local INT(6),
    fk_Taxon_nome_taxon VARCHAR(50),
    quantidade FLOAT(8,2)
);

CREATE TABLE  portal_fitoplancton.Variavel_ambiental (
    nome_var VARCHAR(50) PRIMARY KEY,
    descricao_variavel TEXT
);

CREATE TABLE  portal_fitoplancton.Local (
    id_local INT(6) PRIMARY KEY AUTO_INCREMENT,
    fk_Projeto_id_estudo INT(6),
    fk_Cidade_id_regiao INT(8),
    nome_local VARCHAR(50),
    coordenadas POINT,
    profundidade FLOAT(5,2),
    data TIMESTAMP,
    status VARCHAR(15),
    observacao VARCHAR(60),
    marcador VARCHAR(15),
    unidade_medida VARCHAR(55)
);

CREATE TABLE  portal_fitoplancton.Sinonimo (
    sinonimo VARCHAR(50) PRIMARY KEY,
    fk_Taxon_nome_taxon VARCHAR(50)
);

CREATE TABLE  portal_fitoplancton.Taxon (
    nome_taxon VARCHAR(50) PRIMARY KEY,
    fk_Taxon_taxon_superior VARCHAR(50),
    nivel VARCHAR(15),
    descricao_taxon TEXT
);

CREATE TABLE  portal_fitoplancton.Imagem (
    diretorio VARCHAR(50) PRIMARY KEY,
    fk_Fitoplancton_id_fitoplancton INT(11),
    fk_Local_id_local INT(6)
);

CREATE TABLE  portal_fitoplancton.Cidade (
    id_regiao INT(8) PRIMARY KEY AUTO_INCREMENT,
    fk_Estado_id_estado INT(8),
    nome_cidade VARCHAR(50)
);

CREATE TABLE  portal_fitoplancton.Estado (
    id_estado INT(8) PRIMARY KEY AUTO_INCREMENT,
    nome_estado VARCHAR(50)
);

CREATE TABLE  portal_fitoplancton.Realiza (
    fk_Usuario_id_usuario INT(3),
    fk_Projeto_id_estudo INT(6), 
    Cargo VARCHAR(50)
);

CREATE TABLE  portal_fitoplancton.Avalia (
    fk_Variavel_ambiental_nome_var VARCHAR(50),
    fk_Local_id_local INT(6),
    valor FLOAT(8,2),
    unidade_medida VARCHAR(55),
    classe VARCHAR(50)
);

/* Relacionamento: */
 
ALTER TABLE  portal_fitoplancton.Fitoplancton ADD CONSTRAINT FK_Fitoplancton_2
    FOREIGN KEY (fk_Local_id_local)
    REFERENCES Local (id_local)
    ON DELETE RESTRICT;
 
ALTER TABLE  portal_fitoplancton.Fitoplancton ADD CONSTRAINT FK_Fitoplancton_3
    FOREIGN KEY (fk_Taxon_nome_taxon)
    REFERENCES Taxon (nome_taxon)
    ON DELETE CASCADE;
 
ALTER TABLE  portal_fitoplancton.Local ADD CONSTRAINT FK_Local_2
    FOREIGN KEY (fk_Cidade_id_regiao)
    REFERENCES Cidade (id_regiao)
    ON DELETE CASCADE;
 
ALTER TABLE  portal_fitoplancton.Local ADD CONSTRAINT FK_Local_3
    FOREIGN KEY (fk_Projeto_id_estudo)
    REFERENCES Projeto (id_estudo);
 
ALTER TABLE  portal_fitoplancton.Sinonimo ADD CONSTRAINT FK_Sinonimo_2
    FOREIGN KEY (fk_Taxon_nome_taxon)
    REFERENCES Taxon (nome_taxon)
    ON DELETE CASCADE;
 
ALTER TABLE  portal_fitoplancton.Taxon ADD CONSTRAINT FK_Taxon_2
    FOREIGN KEY (fk_Taxon_taxon_superior)
    REFERENCES Taxon (nome_taxon);
 
ALTER TABLE  portal_fitoplancton.Imagem ADD CONSTRAINT FK_Imagem_2
    FOREIGN KEY (fk_Fitoplancton_id_fitoplancton)
    REFERENCES Fitoplancton (id_fitoplancton)
    ON DELETE SET NULL;
 
ALTER TABLE  portal_fitoplancton.Imagem ADD CONSTRAINT FK_Imagem_3
    FOREIGN KEY (fk_Local_id_local)
    REFERENCES Local (id_local)
    ON DELETE SET NULL;
 
ALTER TABLE  portal_fitoplancton.Cidade ADD CONSTRAINT FK_Cidade_2
    FOREIGN KEY (fk_Estado_id_estado)
    REFERENCES Estado (id_estado)
    ON DELETE RESTRICT;
 
ALTER TABLE  portal_fitoplancton.Realiza ADD CONSTRAINT FK_Realiza_1
    FOREIGN KEY (fk_Usuario_id_usuario)
    REFERENCES Usuario (id_usuario)
    ON DELETE RESTRICT;
 
ALTER TABLE  portal_fitoplancton.Realiza ADD CONSTRAINT FK_Realiza_2
    FOREIGN KEY (fk_Projeto_id_estudo)
    REFERENCES Projeto (id_estudo)
    ON DELETE SET NULL;
 
ALTER TABLE  portal_fitoplancton.Avalia ADD CONSTRAINT FK_Avalia_1
    FOREIGN KEY (fk_Variavel_ambiental_nome_var)
    REFERENCES Variavel_ambiental (nome_var)
    ON DELETE SET NULL;
 
ALTER TABLE  portal_fitoplancton.Avalia ADD CONSTRAINT FK_Avalia_2
    FOREIGN KEY (fk_Local_id_local)
    REFERENCES Local (id_local)
    ON DELETE SET NULL;

