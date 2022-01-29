<template>
	<modal modalId="CategoryModal">
		<!-- Header -->
		<template v-slot:header>
			<h2 class="h5">{{title}}</h2>
		</template>

		<CategoryForm :category="category"></CategoryForm>
	</modal>
</template>

<script>
	import CategoryForm from './CategoryForm.vue'
	export default {
		name: 'CategoryModal',
		props: ['category'],
		components: { CategoryForm },
		data() {
			return {
				title: ''
			}
		}
	}
</script>

