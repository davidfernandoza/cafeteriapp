<template>
	<section class="main">
		<div class="card">
			<div class="card-header d-flex justify-content-between">
				<h2>Categorias</h2>
				<div>
					<button type="button" class="btn btn-primary" @click="createCategory">
						Crear categoria
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table" class="table table-bordered table-hover table-wrap table-sm">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(category, index) in categories" :key="index">
								<td>{{category.name}}</td>
								<td style="width:20%;">
									<div class="d-flex justify-content-center">
										<button class="btn btn-sm btn-warning mr-1" type="button" @click="editCategory(category)">Editar</button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div>
			<CategoryModal :category="category"></CategoryModal>
		</div>
	</section>
</template>

<script>
	import CategoryModal from './CategoryModal.vue'
	export default {
		name: 'Index',
		props: ['categories'],
		components: { CategoryModal },
		data() {
			return { category: null }
		},
		mounted() {
			$('#table').DataTable()
		},
		methods: {
			openCategoryModal() {
				this.$root.openModal('CategoryModal')
			},
			createCategory() {
				this.category = null
				this.openCategoryModal()
			},
			editCategory(category) {
				this.category = category
				this.openCategoryModal()
			}
		}
	}
</script>


