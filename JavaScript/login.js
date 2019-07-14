var html="";
var i=1;
function sliding()
{
    html='<img src="../Pet images/'+i+'.jpg">';
    i++;
    if(i==6)
    i=1;
    document.getElementById("slider").innerHTML=html;
}
setInterval(sliding,1500);


let email=document.getElementById('email');
let pwd=document.getElementById('password');
const login=document.getElementById('login');
const caution=document.querySelector('#caution');
login.addEventListener('click',() =>{
  if(email.value=="nitish0399@hotmail.com" && pwd.value=="123456789")
    window.location.href="search-pet.html";
    else {
      email.style.borderColor="red";
      pwd.style.borderColor="red";
      caution.textContent="Wrong details entered. Retry again.";
    }
});
