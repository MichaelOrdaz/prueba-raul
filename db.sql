create database encuentas;

create table trabajadores(
  id int auto_increment,
  nombre varchar(200), 
  numero_empleado varchar(15),
  created_at datetime default current_timestamp,
  primary key (id)
);

INSERT INTO trabajadores (nombre, numero_empleado) VALUES
('Della Potter', '772875127536'),
('Bertie Matthews', '404929242112'),
('Curtis Padilla', '1371390038016'),
('Jay Holmes', '674229850368'),
('Theresa Buchanan', '2891404763136');

create table preguntas(
  id int auto_increment,
  pregunta varchar(400),
  tipo varchar(30),
  respuestas text,
  correcta varchar(60),
  created_at datetime default current_timestamp,
  primary key (id)
);

INSERT INTO preguntas (pregunta, tipo, respuestas, correcta) VALUES
('¿independencia de mex?', 'cerrada', "[2010, 1925, 1975, 1810]", '1810'),
('De que estado eres', 'abierta', '', ""),
('genero', 'abierta', '["M", "F"]', ""),
('tu color favorito', 'abierta', '', "");

create table respuestas(
  id int auto_increment,
  respuesta varchar(200),
  trabajador_id int,
  pregunta_id int,
  created_at datetime default current_timestamp,
  primary key (id),
  foreign key(trabajador_id) references trabajadores(id),
  foreign key(pregunta_id) references preguntas(id)
);
