var pet_search=prompt("What is the breed of the Pet?");
if(pet_search==null || pet_search=="")
{
  document.getElementById("wrapper").innerHTML="No Results Found";
}
else {
  var header='<img src="../Pet images';
  header=header+ "/"+pet_search.toLowerCase() +  '.jpg">' +  "<h2>Details of breed - " + pet_search.toUpperCase() + "</h2>";
  document.getElementById("header").innerHTML=header;
}
function submitted()
{
  alert("Information Updated!");
}
