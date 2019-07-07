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
	if(document.querySelector('#hint').style.display == 'none')
		this.style.height = 0;
}

let hint = document.getElementById('hint');
function addGif(el, gif) {
	el.addEventListener('mouseover', function(e) {
		e.preventDefault();
		hint.style.display = 'block';
		hint.innerHTML = `<img src="static/files/gifs/${gif}" alt="" />`;
		setTimeout(function() {
			hint.style.opacity = 1;
			hint.style.left = e.pageX - (hint.offsetWidth / 2) + 'px';
			hint.style.top = e.pageY + 10 + 'px';			
		}, 100);
	});
	el.addEventListener('mouseout', function(e) {
		e.preventDefault();
		hint.style.opacity = 0;
		setTimeout(function() {
			hint.style.display = 'none';
			hint.style.left = e.pageX - (hint.offsetWidth / 2) + 'px';
			hint.style.top = e.pageY + 'px';			
		}, 300);
	});
}


document.onmousemove = function (){
    hint.style.position = 'fixed';

    document.onmousemove = function(event){
        hint.style.left = event.clientX +20+'px';
        hint.style.top = event.clientY +20+'px';
    }
}

var link = document.querySelector('.mat');
var entry = document.querySelector('.open');
var still = document.querySelector('.still');
var advantagel = document.querySelector('.advantagel');
var search = document.querySelector('.search');
var popcourse = document.querySelector('.popcourse');
var parent = document.querySelector('.parent');

addGif(entry, 'Вход.gif');
addGif(still, 'Еще.gif');
addGif(advantagel, 'НашиПреимущества.gif');
addGif(search, 'Поиск.gif');
addGif(popcourse, 'ПопулярныеКурсы.gif');
addGif(parent, 'Родителям.gif');



