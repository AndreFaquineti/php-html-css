mysql --user avnadmin --password=AVNS_Eh3MstTzS3bRKma2cM9 --host mysql-portifolio-php-html-css.i.aivencloud.com --port 27320 defaultdb

create database dbsisusuarios;
use dbsisusuarios;

CREATE TABLE tabela_usuarios(
    Id int AUTO_INCREMENT PRIMARY KEY,
    Email varchar(255) NOT NULL UNIQUE,
    Senha varchar(255) NOT NULL,
    Tema int,
    Nome varchar(50) NULL,
    Sobrenome varchar(50) NULL,
    Apelido varchar(50) NULL
);

