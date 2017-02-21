CREATE TABLE if not exists users(
	id serial primary key,
	name varchar(20) not null,
	apaterno varchar(20) not null,
	amaterno varchar(20) not null,
	f_nacimiento date not null,
	num_tarjeta varchar(20) not null,
	email varchar(30) not null,
	pass varchar(30) not null,
	salt varchar(15) not null
);

insert into users (name, apaterno, amaterno, f_nacimiento, num_tarjeta, email, pass, salt)
		values('ramon', 'gomez', 'sandobal', '2000/11/01', '323456789', 'ramon@gmail.com', 'hola123,', 'wawa'),
			  ('encarnacion', 'rosa', 'perez', '1990/01/23', '4345678900', 'hola@gmail.com', '123', 'aaa');

CREATE TABLE if not exists categories(
	id serial primary key,
	name varchar(30) not null
);

insert into categories (name) values('technology');

CREATE TABLE if not exists products(
	id serial primary key,
	name varchar(30) not null,
	description text not null,
	price float not null,
	category int not null,
	foreign key(category) references categories(id)
	on update cascade on delete restrict
);

insert into products(name, description, price, category) values
	('PC', 'lalalal', 20, 1),
	('lap', 'lalalal', 20, 1),
	('cel', 'lalalal', 20, 1),
	('lapiz', 'lalalal', 20, 1),
	('goma', 'lalalal', 20, 1);

CREATE TABLE if not exists buy(
	id serial primary key,
	id_user int  references users(id)
	on update cascade on delete restrict,
	id_product int references products(id)
	on update cascade on delete restrict,
	date_time timestamp default now()
);

insert into buy(id_user, id_product) values(1, 1),(1,2),(1,4);