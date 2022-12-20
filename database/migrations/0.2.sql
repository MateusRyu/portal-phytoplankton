USE portal_fitoplancton;

CREATE TABLE  portal_fitoplancton.Pais (
    id_Pais INT(3) PRIMARY KEY AUTO_INCREMENT,
    nome_pais VARCHAR(50)
);

DROP TABLE IF EXISTS portal_fitoplancton.Imagem;
DROP TABLE IF EXISTS portal_fitoplancton.Sinonimo;

ALTER TABLE  portal_fitoplancton.Projeto RENAME TO portal_fitoplancton.Registro;
ALTER TABLE  portal_fitoplancton.Registro CHANGE id_estudo id_registro INT(6) NOT NULL AUTO_INCREMENT; 
ALTER TABLE  portal_fitoplancton.Registro CHANGE descricao_estudo descricao_registro TEXT;
ALTER TABLE  portal_fitoplancton.Registro DROP data;

ALTER TABLE  portal_fitoplancton.Realiza CHANGE fk_Projeto_id_estudo fk_Registro_id_registro INT(6) NULL DEFAULT NULL; 

ALTER TABLE  portal_fitoplancton.Local RENAME TO portal_fitoplancton.Amostra;
ALTER TABLE  portal_fitoplancton.Amostra CHANGE id_local id_amostra INT(6) NOT NULL AUTO_INCREMENT; 
ALTER TABLE  portal_fitoplancton.Amostra CHANGE fk_Projeto_id_estudo fk_Registro_id_registro INT(6) NULL DEFAULT NULL; 
ALTER TABLE  portal_fitoplancton.Amostra CHANGE fk_Cidade_id_regiao fk_Cidade_id_cidade INT(8) NULL DEFAULT NULL; 
ALTER TABLE  portal_fitoplancton.Amostra CHANGE nome_local nome_amostra VARCHAR(50); 
ALTER TABLE  portal_fitoplancton.Amostra CHANGE unidade_medida unidade_medida VARCHAR(30); 
ALTER TABLE  portal_fitoplancton.Amostra CHANGE data data_edicao TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP; 
ALTER TABLE  portal_fitoplancton.Amostra ADD COLUMN data_coleta TIMESTAMP NOT NULL AFTER data_edicao;
ALTER TABLE  portal_fitoplancton.Amostra ADD COLUMN diretorio_capa VARCHAR(40);

DROP TABLE IF EXISTS portal_fitoplancton.Avalia;
CREATE TABLE  portal_fitoplancton.Contexto (
    fk_Amostra_id_amostra INT(6),
    fk_Variavel_auxiliar_id_variavel INT(3),
    valor VARCHAR(30)
);
DROP TABLE IF EXISTS portal_fitoplancton.Variavel_ambiental;
CREATE TABLE portal_fitoplancton.Variavel_auxiliar (
    id_variavel INT(3) PRIMARY KEY AUTO_INCREMENT,
    nome_var VARCHAR(50),
    unidade_medida VARCHAR(30)
);
ALTER TABLE  portal_fitoplancton.Contexto ADD CONSTRAINT FK_Contexto_1
    FOREIGN KEY (fk_Variavel_auxiliar_id_variavel)
    REFERENCES Variavel_auxiliar (id_variavel)
    ON DELETE SET NULL;
 
ALTER TABLE  portal_fitoplancton.Contexto ADD CONSTRAINT FK_Contexto_2
    FOREIGN KEY (fk_Amostra_id_amostra)
    REFERENCES Amostra (id_amostra)
    ON DELETE SET NULL;

DROP TABLE IF EXISTS portal_fitoplancton.Fitoplancton;
DROP TABLE IF EXISTS portal_fitoplancton.Taxon;
CREATE TABLE  portal_fitoplancton.Fitoplancton (
    id_fitoplancton INT(11) PRIMARY KEY AUTO_INCREMENT,
    fk_Amostra_id_amostra INT(6),
    fk_Taxon_id_taxon INT(6),
    quantidade_media FLOAT(12,2),
    quantidade_maxima FLOAT(12,2),
    diretorio_imagem VARCHAR(40)
);
CREATE TABLE  portal_fitoplancton.Taxon (
    id_taxon INT(6) PRIMARY KEY AUTO_INCREMENT,
    fk_Taxon_id_taxon_superior INT(6),
    nome_taxon VARCHAR(50),
    nivel VARCHAR(15),
    sinonimos VARCHAR(255)
);
ALTER TABLE  portal_fitoplancton.Fitoplancton ADD CONSTRAINT FK_Fitoplancton_Taxon_id_taxon
    FOREIGN KEY (fk_Taxon_id_taxon)
    REFERENCES Taxon (id_taxon)
    ON DELETE SET NULL;
ALTER TABLE  portal_fitoplancton.Fitoplancton ADD CONSTRAINT FK_Amostra_id_amostra
    FOREIGN KEY (fk_Amostra_id_amostra)
    REFERENCES Amostra (id_amostra)
    ON DELETE SET NULL;
ALTER TABLE  portal_fitoplancton.Taxon ADD CONSTRAINT FK_Taxon_3
    FOREIGN KEY (fk_Taxon_id_taxon_superior)
    REFERENCES Taxon (id_taxon)
    ON DELETE SET NULL;


ALTER TABLE  portal_fitoplancton.Estado ADD fk_Pais_id_pais INT NOT NULL AFTER id_estado; 
ALTER TABLE  portal_fitoplancton.Estado ADD CONSTRAINT fk_Pais_id_pais
    FOREIGN KEY (fk_Pais_id_pais)
    REFERENCES Pais (id_pais);

ALTER TABLE  portal_fitoplancton.Cidade CHANGE id_regiao id_cidade INT(8) NOT NULL AUTO_INCREMENT; 
