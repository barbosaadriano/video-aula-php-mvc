create table usuario(
	id int primary key,
	nome varchar(45),
	login varchar(45),
	senha varchar(32),
	status char(1)	
);
alter table usuario add thumbnail_path varchar(100);
insert into usuario (id, nome, login, senha, status)
values (1,'administrador', 'admin', 'admin', 'A');
create table if not exists empresa
(
id integer not null primary key auto_increment,
nome varchar(45),
situacao varchar(25)
);