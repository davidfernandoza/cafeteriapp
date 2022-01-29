# traer los productos con mayor stock
SELECT p.id, p.name, p.stock FROM products AS p ORDER BY p.stock DESC LIMIT 1;

# trae el producto mas vendido
SELECT p.id, p.name, p.stock, sum(d.amount) as sum_amount FROM details AS d LEFT JOIN products AS p ON p.id = d.product_id GROUP BY p.id ORDER BY sum_amount DESC LIMIT 1;
