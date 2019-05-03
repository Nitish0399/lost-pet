const logo=document.querySelector('#logo');
const walk=document.querySelector('.scroll');
logo.addEventListener('click',()=>{
  walk.innerHTML='<marquee behavior="scroll" direction="right" loop="1"><img id="dog-walk" src="http://www.animatedimages.org/data/media/202/animated-dog-image-0077.gif" alt="dog-walk"></marquee>';
});
