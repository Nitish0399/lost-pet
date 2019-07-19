let $breed=$("#pet_info span").text();
if($breed!="")
{
  $("#pet_info").show();
}

const status=document.querySelector("span");
status.addEventListener("click", () =>{
  if(status.textContent=="ACTIVE")
  {
    status.textContent="UNACTIVE";
    status.style.color="red";
  }
  else {
    status.textContent="ACTIVE";
    status.style.color="green";
  }
});
