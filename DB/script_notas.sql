create table estudiantes(
cod_est int not null primary key,
nomb_est varchar(50) not null);

create table cursos(
cod_cur int not null primary key,
nomb_cur varchar(50) not null);     

create table inscripciones(
cod_insc serial not null primary key,
periodo int not null,
year int not null,
cod_cur int not null,
cod_est int not null,
constraint fk_estudiantes foreign key(cod_est) references estudiantes(cod_est) on delete cascade,
constraint fk_cursos foreign key(cod_cur) references cursos(cod_cur) on delete cascade
);


create table notas(
nota serial not null primary key,                          
cod_cur int not null,
descrip_nota varchar(50) not null,
porcentaje float not null,
posicion int not null,
constraint fk_cursos foreign key(cod_cur) references cursos(cod_cur) on update cascade on delete cascade
);


create table calificaciones(
cod_cal serial not null primary key,
valor float not null,
fecha date not null,
nota int not null,
cod_insc int not null,
constraint fk_notas foreign key(nota) references notas(nota) on update cascade on delete cascade,
constraint fk_inscripcion foreign key(cod_insc) references inscripciones(cod_insc) on update cascade on delete cascade
);
