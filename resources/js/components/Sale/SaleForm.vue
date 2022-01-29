<template>
	<div class="card p-3">
		<form @submit.prevent="saveSale">
			<div class="form-group">
				<label for="name">Cliente</label>
				<input type="text" class="form-control" id="name" v-model="saleForSend.sale.client" required>
			</div>
			<!-- Select -->
			<div class="form-group">
				<label for="category">Cantidad</label>
				<v-select :options="stock" v-model="saleForSend.detail.amount" @option:selected="sumPrice" :clearable="false">
					<template #search="{attributes, events}">
						<input class="vs__search" :required="!saleForSend.detail.amount" v-bind="attributes" v-on="events" />
					</template>
				</v-select>
			</div>
			<div class="form-group">
				<label for="name">Precio unitario</label>
				<input type="text" class="form-control" id="price" step="any" readonly v-model="saleForSend.detail.price">
			</div>
			<div class="form-group">
				<label for="weight">Total a pagar</label>
				<input type="number" class="form-control" id="weight" step="any" readonly v-model="saleForSend.sale.total_price">
			</div>

			<!-- Buttons -->
			<div class="w-100 d-flex justify-content-end pt-3">
				<button type="button" class="btn btn-secondary mr-1" @click="$root.closeModal('SaleModal')">
					Cancelar
				</button>
				<button type="submit" class="btn btn-primary">Vender</button>
			</div>
		</form>
	</div>

</template>

<script>
	import alert from '../../helpers/alerts.js'
	export default {
		name: 'SaleForm',
		props: ['product'],
		data() {
			return {
				saleForSend: {
					detail: {
						amount: 1,
						price: this.product.price
					},
					sale: {
						client: '',
						total_price: 0
					}
				},
				stock: []
			}
		},
		created() {
			this.sumPrice()
			for (let index = 1; index <= this.product.stock; index++) {
				this.stock.push(index)
			}
		},
		methods: {
			async saveSale() {
				try {
					const response = await axios
						.post(`/sales/save-sale/product/${this.product.id}`, this.saleForSend)
						.then(res => res.data)
					if (response.status) {
						await swal(alert.success(`Venta creada con exito!!`))
						location.reload()
					}
				} catch (error) {
					console.error(error)
					swal(alert.error(`Algo salio mal con la venta!!`))
				}
			},
			sumPrice() {
				this.saleForSend.sale.total_price =
					this.saleForSend.detail.price * this.saleForSend.detail.amount
			}
		}
	}
</script>

