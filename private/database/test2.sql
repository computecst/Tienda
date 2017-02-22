CREATE TABLE if not exists users(
	id serial primary key,
	name varchar(20) not null,
	apaterno varchar(20) not null,
	amaterno varchar(20) not null,
	num_tarjeta varchar(20) not null,
	email varchar(30) not null,
	pass varchar(30) not null,
	salt varchar(15) not null,
	admin boolean not null default false
);
insert into users (name, apaterno, amaterno, num_tarjeta, email, pass, salt)
		values('ramon', 'gomez', 'sandobal', '323456789', 'ramon@gmail.com', 'hola123,', 'wawa'),
			  ('encarnacion', 'rosa', 'perez', '4345678900', 'hola@gmail.com', '123', 'aaa');

CREATE TABLE if not exists descripcion_producto(
	id serial primary key,
	code varchar(25) not null,
	name varchar(30) not null,
	description text not null,
	price float not null
);
insert into descripcion_producto(code, name, description, price) values
	('34567', 'PC', 'lalalal', 20),
	('23451', 'lap', 'lalalal', 20),
	('87678', 'cel', 'lalalal', 20),
	('45673', 'lapiz', 'lalalal', 20),
	('80000', 'goma', 'lalalal', 20);

CREATE TABLE if not exists products(
	id serial primary key,
	producto int not null,
	foreign key(producto) references descripcion_producto(id)
	on update cascade on delete restrict
);
insert into products(producto) values(1),(2);

CREATE TABLE if not exists ventas(
	id serial primary key,
	id_user int  references users(id)
	on update cascade on delete restrict,
	date_time timestamp default now()
);
insert into ventas(id_user) values(1),(2);


CREATE TABLE if not exists venta_producto(
	id serial primary key,
	id_product int  references products(id)
	on update cascade on delete restrict,
	id_venta int  references ventas(id)
	on update cascade on delete restrict
);
insert into venta_producto(id_product, id_venta) values(1, 1);

CREATE TABLE if not exists carrito(
	id serial primary key,
	id_product int references products(id)
	on update cascade on delete restrict,
	id_user int references users(id)
	on update cascade on delete restrict
);
