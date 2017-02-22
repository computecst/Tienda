-- 1. factura de la ultima compra 
-- (cantidad, nombre producto, precio producto, total_de_este_producto)
select distinct d.id, 
				v.id_product, v.id_venta, 
				d.name, d.description, d.price, 
				total_producto.price as total, total_producto.num_productos
from venta_producto as v, 
	products as p, 
	descripcion_producto as d,
	(
		select sum(d.price) as price, count(d.price) as num_productos
		from venta_producto as v, products as p, descripcion_producto as d
		where v.id_product = p.id
		and p.producto = d.id
		group by(d.id)
	) as total_producto
where v.id_product = p.id
and p.producto = d.id;


-- 2. borrar lo productos del carrito de un X usuario
delete from carrito where id_user = '';

-- 3. pasar productos del carrito a ventas
select * from carrito where id_user = '';
insert into ventas(id_user) values('');
insert into venta_producto(id_product, id_venta) values('', '');
delete from carrito where id_user = '';