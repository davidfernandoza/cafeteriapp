<template>
	<section class="main">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h2>Productos</h2>
				<div>
					<button type="button" class="btn btn-primary" @click="createProduct">
						Crear producto
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table" class="table table-bordered table-hover table-wrap table-sm">
						<thead>
							<tr>
								<th>Referencia</th>
								<th>Nombre</th>
								<th>Categoria</th>
								<th>Precio</th>
								<th>Peso (libras)</th>
								<th>Stock</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(product, index) in products" :key="index">
								<td>{{product.reference}}</td>
								<td>{{product.name}}</td>
								<td>{{product.category.name}}</td>
								<td>{{product.price}}</td>
								<td>{{product.weight}}</td>
								<td>{{product.stock}}</td>
								<td>
									<div class="d-flex justify-content-center">
										<button class="btn btn-sm btn-warning mr-1" type="button" @click="editProduct(product)">Editar</button>
										<button class="btn btn-sm btn-danger mr-1" type="button" @click="deleteProduct(product)">Eliminar</button>
										<button class="btn btn-sm btn-info" type="button" @click="saleProduct(product)">
											Vender
										</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div>
			<ProductModal :product="product"></ProductModal>
			<SaleModal :product="product"></SaleModal>
		</div>
	</section>
</template>

<script>
	import ProductModal from './ProductModal.vue'
	import SaleModal from '../Sale/SaleModal.vue'
	import alert from '../../helpers/alerts.js'

	export default {
		name: 'Index',
		props: ['products'],
		components: { ProductModal, SaleModal },
		data() {
			return { product: null }
		},
		mounted() {
			$('#table').DataTable()
		},
		methods: {
			openProductModal() {
				this.$root.openModal('ProductModal')
			},
			openSaleModal() {
				this.$root.openModal('SaleModal')
			},
			createProduct() {
				this.product = null
				this.openProductModal()
			},
			editProduct(product) {
				this.product = product
				this.openProductModal()
			},
			saleProduct(product) {
				if (product.stock <= 0) {
					swal(alert.error('No hay stock para vender!!'))
					return false
				}
				this.product = product
				this.openSaleModal()
			},

			async deleteProduct(product) {
				if (!(await this.deleteValidate())) return false
				try {
					await axios.post(`/products/delete-product/${product.id}`)
					await swal(alert.success('Producto eliminado con exito!!'))
					location.reload()
				} catch (error) {
					console.error(error)
					swal(alert.error('No se pudo eliminar el producto!!'))
				}
			},
			async deleteValidate() {
				return await swal(alert.question('¿Quieres eliminar este producto?'))
			}
		}
	}
</script>


