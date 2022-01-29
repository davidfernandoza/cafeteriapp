<template>
	<b-modal :id="modalId" :no-close-on-backdrop="modalStatic ? modalStatic : false" :no-close-on-esc="modalStatic ? modalStatic : false" :body-class="`${classBody ? classBody : 'p-0'}`" :size="size? size : 'md'" header-border-variant="secondary" footer-border-variant="secondary" hide-footer :scrollable="scrollable ? true : false">

		<!-- Header -->
		<template :class="`modal-header border-0 p-0`" #modal-title>
			<div :class="`w-100 text-center ${classHeader ? classHeader: ''}`">
				<slot name="header"></slot>
			</div>
		</template>

		<!-- Body -->
		<div>
			<slot></slot>
		</div>
	</b-modal>
</template>

<script>
	export default {
		name: 'modal',
		props: ['modalId', 'size', 'modalStatic', 'classBody', 'classHeader', 'scrollable']
	}
</script>

<style lang="scss">
.button-modal {
	right: 12px;
	top: 8px;
	z-index: 9;
}
</style>
