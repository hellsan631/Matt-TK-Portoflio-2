$("#pass").focus(function() {
    if (this.value === this.defaultValue) {
        this.value = '';
			this.type = 'password';
    }
}).blur(function() {
    if (this.value === '') {
        this.value = this.defaultValue;
			this.type = 'text';
    }
});