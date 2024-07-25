create database dbsisusuarios;
use dbsisusuarios;

create table tabela_usuarios(
    Email varchar(255) NOT NULL,
    Senha varchar(255) NOT NULL,
    Id int AUTO_INCREMENT,
    Tema int,
    Nome varchar(50) NOT NULL,
    Sobrenome varchar(50) NOT NULL,
    Apelido varchar(50) NOT NULL,
    PRIMARY_KEY (email)
);

