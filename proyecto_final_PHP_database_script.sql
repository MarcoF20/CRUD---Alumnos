create database pFinal;
use pFinal;
create table alumnos(
	matricula varchar (50) primary key,
    nombre varchar(255),
    apellidoP varchar(255),
    apellidoM varchar(255),
    fechaNacimiento date,
    carrera varchar(255),
    grupo varchar (255),
    turno varchar(255)
);
create table administradores(
	id int primary key auto_increment,
    nombre varchar(255),
    apellido varchar(255),
    username varchar(255),
    password varchar(255)
);