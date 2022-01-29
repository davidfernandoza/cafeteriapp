<template>
	<div class="card p-3">
		<form @submit.prevent="saveProduct">
			<div class="form-group">
				<label for="reference">Referencia</label>
				<input type="text" class="form-control" id="reference" v-model="productForSend.reference" required>
			</div>
			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" class="form-control" id="name" v-model="productForSend.name" required>
			</div>
			<!-- Select -->
			<div class="form-group">
				<label for="category">Categoria</label>
				<v-select :options="categories" v-model="productForSend.category_id" :reduce="category => category.id" label="name" :clearable="false">
					<template #search="{attributes, events}">
						<input class="vs__search" :required="!productForSend.category_id" v-bind="attributes" v-on="events" />
					</template>
				</v-select>
			</div>
			<div class="form-group">
				<label for="name">Precio</label>
				<input type="text" class="form-control" id="price" step="any" v-model="productForSend.price" required>
			</div>
			<div class="form-group">
				<label for="weight">Peso (Libras)</label>
				<input type="number" class="form-control" id="weight" step="any" v-model="productForSend.weight" required>
			</div>
			<div class="form-group mb-2">
				<label for="stock">Stock</label>
				<input type="number" class="form-control" id="stock" step="any" v-model="productForSend.stock" required>
			</div>

			<!-- Buttons -->
			<div class="w-100 d-flex justify-content-end pt-3">

				<button type="button" class="btn btn-secondary mr-1" @click="$root.closeModal('ProductModal')">
					Cancelar
				</button>
				<button type="submit" class="btn btn-primary">{{title}}</button>
			</div>
		</form>
	</div>

</template>

<script>
	import alert from '../../helpers/alerts.js'
	export default {
		name: 'ProductForm',
		props: ['product'],
		data() {
			return {
				isCreate: true,
				title: '',
				categories: [],
				productForSend: {
					category_id: null
				}
			}
		},
		created() {
			this.getCategories()
			if (this.product) {
				this.isCreate = false
				this.title = 'Editar producto'
				this.productForSend = { ...this.product }
			} else this.title = 'Crear producto'
			this.$parent.$parent.$parent.$parent.title = this.title
		},
		methods: {
			async getCategories() {
				try {
					this.categories = await axios.get('/categories/get-categories').then(res => res.data)
					if (this.categories.length == 0) {
						await swal(alert.error(`No hay categorias, crea una!!`))
						location.href = '/categorias'
					}
				} catch (error) {
					console.error(error)
					swal(alert.error(`Algo salio mal con las categorias!!`))
				}
			},
			async saveProduct() {
				try {
					const route = this.createRoute()
					const response = await axios.post(route, this.productForSend).then(res => res.data)
					if (response.status) {
						await swal(alert.success(`Producto ${this.isCreate ? 'creado' : 'editado'} con exito!!`))
						location.reload()
					}
				} catch (error) {
					console.error(error)
					swal(alert.error(`Algo salio mal con el producto!!`))
				}
			},
			createRoute() {
				if (this.isCreate) return '/products/save-product'
				else return `/products/update-product/${this.product.id}`
			}
		}
	}
</script>

<style lang='scss' scoped>
</style>
