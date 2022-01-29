<template>
	<modal modalId="SaleModal">
		<!-- Header -->
		<template v-slot:header>
			<h2 class="h5">Venta de {{product.name}}</h2>
		</template>

		<SaleForm :product="product"></SaleForm>
	</modal>
</template>

<script>
	import SaleForm from './SaleForm.vue'
	export default {
		name: 'SaleModal',
		props: ['product'],
		components: { SaleForm }
	}
</script>

