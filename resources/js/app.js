import './bootstrap'
import 'sweetalert'
import vSelect from 'vue-select'
import Vue from 'vue'
import { BootstrapVue } from 'bootstrap-vue'

Vue.use(BootstrapVue)
Vue.component('modal', () => import('./components/Include/Modal.vue'))
Vue.component('v-select', vSelect)

/*--------------------------------------------------------*/
/* Components
/*--------------------------------------------------------*/
import PorductsIndex from './components/Product/Index.vue'
import SalesIndex from './components/Sale/Index.vue'
import CategoriesIndex from './components/Category/Index.vue'

/*--------------------------------------------------------*/
/* Register
/*--------------------------------------------------------*/

new Vue({
	el: '#app',
	components: {
		PorductsIndex,
		SalesIndex,
		CategoriesIndex
	},
	methods: {
		closeModal(modalId) {
			this.$root.$emit('bv::toggle::modal', modalId)
		},
		openModal(modalId) {
			this.$root.$emit('bv::show::modal', modalId)
		}
	}
})
