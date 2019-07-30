const logo=document.querySelector('#logo');
const walk=document.querySelector('.scroll');
logo.addEventListener('click',()=>{
  walk.innerHTML='<marquee behavior="scroll" direction="right" loop="1"><img id="dog-walk" src="http://www.animatedimages.org/data/media/202/animated-dog-image-0077.gif" alt="dog-walk"></marquee>';
});


const dropdown_btn=document.querySelector("#dropdown-nav button");
dropdown_btn.addEventListener("click",()=>{
  const dropdown=document.querySelector("#dropdown");
  if(dropdown.style.display=="none")
    dropdown.style.display="block";
  else
    dropdown.style.display="none";
});

window.onclick=function(event){
  if(!event.target.matches("#dropdown-nav button") && !event.target.matches("#dropdown-nav button i"))
  {
    document.querySelector("#dropdown").style.display="none";
  }
}
