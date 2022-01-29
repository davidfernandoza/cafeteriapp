export default {
	error(error) {
		return {
			title: 'Error!',
			text: error,
			icon: 'error'
		}
	},

	success(success) {
		return {
			title: 'Felicidades!',
			text: success,
			icon: 'success'
		}
	},

	question(question) {
		return {
			buttons: {
				cancel: true,
				confirm: true
			},
			title: '¿Estas seguro?',
			text: question,
			icon: 'warning'
		}
	}
}
