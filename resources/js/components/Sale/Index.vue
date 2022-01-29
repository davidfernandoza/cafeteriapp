<template>
	<section class="main">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h2>Ventas</h2>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table" class="table table-bordered table-hover table-wrap table-sm">
						<thead>
							<tr>
								<th>Referencia</th>
								<th>Producto</th>
								<th>Cliente</th>
								<th>Precio unitario</th>
								<th>Cantidad</th>
								<th>Precio total</th>
							</tr>
						</thead>
						<tbody>
							<!-- Lista de un solo producto, se puede adecuar para mas productos -->
							<tr v-for="(sale, index) in sales" :key="index">
								<td>{{sale.products[0].reference}}</td>
								<td>{{sale.products[0].name}}</td>
								<td>{{sale.client}}</td>
								<td>{{sale.products[0].pivot.price}}</td>
								<td>{{sale.products[0].pivot.amount}}</td>
								<td>{{sale.total_price}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
	export default {
		name: 'Index',
		props: ['sales'],
		mounted() {
			$('#table').DataTable()
		}
	}
</script>


