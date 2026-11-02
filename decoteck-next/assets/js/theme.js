(() => {
'use strict';
const header=document.getElementById('site-header');
const toggle=document.querySelector('.menu-toggle');
const nav=document.getElementById('primary-nav');
const closeMenu=()=>{if(!toggle||!nav)return;toggle.setAttribute('aria-expanded','false');toggle.setAttribute('aria-label','باز کردن منو');nav.classList.remove('is-open');document.body.classList.remove('nav-open');};
if(toggle&&nav){
toggle.addEventListener('click',()=>{const open=toggle.getAttribute('aria-expanded')!=='true';toggle.setAttribute('aria-expanded',String(open));toggle.setAttribute('aria-label',open?'بستن منو':'باز کردن منو');nav.classList.toggle('is-open',open);document.body.classList.toggle('nav-open',open);});
nav.querySelectorAll('a').forEach(link=>link.addEventListener('click',closeMenu));
document.addEventListener('keydown',event=>{if(event.key==='Escape')closeMenu();});
window.addEventListener('resize',()=>{if(window.innerWidth>760)closeMenu();},{passive:true});
}
const onScroll=()=>{if(header)header.classList.toggle('is-scrolled',window.scrollY>12);};
onScroll();window.addEventListener('scroll',onScroll,{passive:true});
const reveals=document.querySelectorAll('.entry-reveal');
if('IntersectionObserver'in window&&!window.matchMedia('(prefers-reduced-motion: reduce)').matches){
const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add('is-visible');observer.unobserve(entry.target);}}),{threshold:.12,rootMargin:'0px 0px -30px 0px'});
reveals.forEach(element=>observer.observe(element));
}else{reveals.forEach(element=>element.classList.add('is-visible'));}
})();
