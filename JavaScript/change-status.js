var animal_search=prompt("What is the breed of the Animal?");
if(animal_search==null || animal_search=="")
{
  document.getElementById("wrapper").innerHTML="No Results Found";
}
else {
  var header='<img src="../Pet images';
  header=header+ "/"+animal_search.toLowerCase() +  '.jpg">' +  "<h2>Details of breed - " + animal_search.toUpperCase() + "</h2>";
  document.getElementById("header").innerHTML=header;
}
function submitted()
{
  alert("Information Updated!");
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
