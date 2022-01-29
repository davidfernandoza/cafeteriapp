<template>
	<div class="card p-3">
		<form @submit.prevent="saveCategory">

			<div class="form-group">
				<label for="name">Nombre</label>
				<input type="text" class="form-control" id="name" v-model="categoryForSend.name" required>
			</div>

			<!-- Buttons -->
			<div class="w-100 d-flex justify-content-end pt-3">
				<button type="button" class="btn btn-secondary mr-1" @click="$root.closeModal('CategoryModal')"> Cancelar
				</button>
				<button type="submit" class="btn btn-primary">{{title}}</button>
			</div>
		</form>
	</div>

</template>

<script>
	import alert from '../../helpers/alerts.js'
	export default {
		name: 'CategoryForm',
		props: ['category'],
		data() {
			return {
				isCreate: true,
				title: '',
				categories: [],
				categoryForSend: {
					category_id: null
				}
			}
		},
		created() {
			if (this.category) {
				this.isCreate = false
				this.title = 'Editar categoria'
				this.categoryForSend = { ...this.category }
			} else this.title = 'Crear categoria'
			this.$parent.$parent.$parent.$parent.title = this.title
		},
		methods: {
			async saveCategory() {
				try {
					const route = this.createRoute()
					const response = await axios.post(route, this.categoryForSend).then(res => res.data)
					if (response.status) {
						await swal(alert.success(`Categoria ${this.isCreate ? 'creada' : 'editada'} con exito!!`))
						location.reload()
					}
				} catch (error) {
					console.error(error)
					swal(alert.error(`Algo salio mal con la categoria!!`))
				}
			},
			createRoute() {
				if (this.isCreate) return '/categories/save-category'
				else return `/categories/update-category/${this.category.id}`
			}
		}
	}
</script>

<style lang='scss' scoped>
</style>
