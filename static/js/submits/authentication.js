import {Authentication} from '../functions/authentication.js';
if(document.querySelector('.subscripe-entry-button'))
	document.querySelector('.subscripe-entry-button').addEventListener('click', e => {
		if(e.target.classList.contains('entry')) {
			Authentication.entry();
		}else if(e.target.classList.contains('registration')) {
			Authentication.registration();
		}
	});
let popup = document.querySelector('.popup');
let ul = popup.querySelector('ul');
document.querySelectorAll('.navigation-entry li').forEach(v => v.onclick = function() {Authentication.toggle(this);});
document.querySelector('.open').onclick = function() {Authentication.open();}
if(document.querySelector('.subscripe-entry-form'))
	document.querySelector('.subscripe-entry-form').onclick = function() { Authentication.close();}
document.querySelector('#a').onmouseover = function() {
	if(popup.style.height == 0 || popup.style.height == '0px') popup.style.height = 'auto';
}
ul.onmouseover = function() {
	if(popup.style.height == 0 || popup.style.height == '0px') popup.style.height = 'auto';	
}
popup.onmouseout = function(e) {
	this.style.height = 0;
}
// document.querySelector('select').onchange = function() { Registration.checkRole(this.value)};
// document.querySelector('.save').onclick = function() { Registration.save();};