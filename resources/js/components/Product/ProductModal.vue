<template>
	<modal modalId="ProductModal">
		<!-- Header -->
		<template v-slot:header>
			<h2 class="h5">{{title}}</h2>
		</template>

		<ProductForm :product="product"></ProductForm>
	</modal>
</template>

<script>
	import ProductForm from './ProductForm.vue'
	export default {
		name: 'ProductModal',
		props: ['product'],
		components: { ProductForm },
		data() {
			return {
				title: ''
			}
		}
	}
</script>

