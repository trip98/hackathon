let Registration = {
	select: null,
	languages: [],
	checkRole(value) {
		if(value == 2) {
			this.clearLanguages();
		}else if(value == 3) {
			this.getLanguages();
		}
	},
	checkLanguage() {
		let select = document.querySelector('.language');
		if(this.languages.find(v => v == select.value)) return;
		let option = select.querySelector('option[value="'+select.value+'"]');
		let li = document.createElement('li');
		let button = document.createElement('button');
		li.innerText = option.innerText;
		button.innerText = 'Удалить';
		button.onclick = this.deleteLanguage;
		li.appendChild(button);
		let list = document.querySelector('.listLanguages');
		list.appendChild(li);
		this.languages.push(+select.value);
	},
	async getLanguages() {
		let data = await fetch('/getLanguages').then(res => res.json());
		let select = document.createElement('select');
		let subscripe = document.createDocumentFragment();
		let subscripeSelect = document.createElement('p');
		let button = document.createElement('button');
		let ul = document.createElement('ul');
		let self = this;
		data.forEach(v => {
			let option = document.createElement('option');
			option.value = v.id;
			option.innerText = v.name;
			subscripe.appendChild(option);
		});
		ul.classList.add('listLanguages');
		select.appendChild(subscripe);
		select.classList.add('language');
		button.onclick = function() { self.checkLanguage(); };
		button.innerText = 'Добавить'
		subscripeSelect.appendChild(select);
		subscripeSelect.appendChild(button);
		subscripeSelect.appendChild(ul);
		document.querySelector('div.form').appendChild(subscripeSelect);
	},
	clearLanguages() {
		let language = document.querySelector('div.form .language');
		if(language)
			language.parentNode.remove();
	},
	deleteLanguage(self) {
		let li = self.target.parentNode;
		let ul = li.parentNode;
		let index = [].indexOf.call(ul.children, li);
		Registration.languages.splice(index, 1);
		li.remove();
	},
	async save() {
		let data = new FormData;
		let form = document.querySelector('div.form');
		let fields = form.querySelectorAll('.fields');
		let result = [];
		fields.forEach(v => {
			let label = v.children[0].name;
			if(label != 'two_password') {
				data.append(label, v.children[0].value);
				result[label] = v.children[0].value;
			}
		});
		if(result.role == '3') {
			data.append('languages', JSON.stringify(this.languages));
			console.log('tut');
		}
		result = await fetch('/registration', {body: data, method: 'POST'}).then(v => v.text);
	}
}
export {Registration};