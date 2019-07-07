let Authentication = {
	templates: {
		entry: `
			<p><input placeholder="Электронный адрес" name='email' type="text"></p>
			<p><input placeholder="Пароль" name='password' type="password"></p>
		`,
		registration: `
			<p><input placeholder="Фамилия" name='lastname' type="text"></p>
			<p><input placeholder="Имя" name='name' type="text"></p>
			<p><input placeholder="Электронный адрес" name='email' type="text"></p>
			<p><input placeholder="Пароль" name='password' type="password"></p>
			<p><input placeholder="Повторите пароль" name='two_password' type="password"></p>
		`
	},
	toggle(el) {
		let button = document.querySelector('.submit-entry');		
		let vkB = document.querySelector('.entry-vk');
		if(el.dataset.id == 1) {
			document.querySelector('.subscripe-inputs').innerHTML = this.templates.entry;
			button.classList.add('entry');
			button.classList.remove('registration');
			button.innerText = 'Войти';
			vkB.innerText = 'Вход через VK';
		}else if(el.dataset.id == 2) {
			document.querySelector('.subscripe-inputs').innerHTML = this.templates.registration;
			button.classList.add('registration');
			button.classList.remove('entry');
			button.innerText = 'Зарегистрироваться';
			vkB.innerText = 'Регистрация через VK';
		}
	},
	generateData() {
		let form = document.querySelectorAll('.subscripe-inputs p');
		let data = new FormData;
		form.forEach(v => {
			let label = v.children[0];
			if(label.name != 'two_password')
				data.append(label.name, label.value);
		});
		return data;
	},
	async entry() {
		let data = this.generateData();
		let result = await fetch('/entry', {body: data, method: 'POST'}).then(res => res.json());
		if(result) location.reload();
	},
	async registration() {
		let data = this.generateData();
		let result = await fetch('/registration', {body: data, method: 'POST'}).then(res => res.json());
		if(result) location.reload();
	},
	open() {
		document.querySelector('.entry-form').style.display = 'block';
		document.querySelector('.subscripe-entry-form').style.display = 'block';
	},
	close() {
		document.querySelector('.entry-form').style.display = 'none';
		document.querySelector('.subscripe-entry-form').style.display = 'none';
	}
}
export {Authentication};