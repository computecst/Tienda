-- 1. todos los productos y su disponbilidad
select d.id, d.name, d.description, d.price, existencia.total
from (
	select count(d.id) as total, d.id
	from products as p, descripcion_producto as d, venta_producto as v
	where p.producto = d.id
	and p.id != v.id_product
	group by(d.id)
) as existencia
join descripcion_producto as d
on d.id = existencia.id;

--2. cuanto producto tiene en codigo X y que no estan vendidos
select d.id, d.name, d.description, d.price, existencia.total
from (
	select count(d.id) as total, d.id
	from products as p, descripcion_producto as d, venta_producto as v
	where p.producto = d.id
	and p.id != v.id_product
	and d.id = 2
	group by(d.id)
) as existencia
join descripcion_producto as d
on d.id = existencia.id;

--3. agregar un producto al carrito
insert into carrito(id_product, id_user) values(1, 1);