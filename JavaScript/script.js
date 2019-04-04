var animals=[
  {
    Type_of_Animal:"Dog",
    Address:"9th Downing Street",
    City: "New York City",
    State: "New York",
    Breed: "Morkie",
    Sex:"Female",
    Colour:"Brown"
  },
  {
    Type_of_Animal:"Cat",
    Address:"Main Suburb Centre",
    City: "Olympia",
    State: "Washington",
    Breed: "Maine Coon",
    Sex:"Male",
    Colour:"Gray"
  }
];

var html="";
var con=false;
var animal_search=prompt("What is the breed of the Animal?");
if(animal_search==null || animal_search=="")
{
  document.getElementById("wrapper").innerHTML="No Results Found";
}
var header='<img src="Pet images';
header=header+ "/"+animal_search.toLowerCase() +  '.jpg">' +  "<h2>Details of breed - " + animal_search.toUpperCase() + "</h2>";
document.getElementById("header").innerHTML=header;
for(var i=0;i<animals.length;i++)
{
  if(animal_search.toLowerCase()==animals[i].Breed.toLowerCase())
  {
      html=html+"<ul>";
      html=html+"<li>"+animals[i].Type_of_Animal+"</li>";
      html=html+"<li>"+animals[i].Address+"</li>";
      html=html+"<li>"+animals[i].City+"</li>";
      html=html+"<li>"+animals[i].State+"</li>";
      html=html+"<li>"+animals[i].Breed+"</li>";
      html=html+"<li>"+animals[i].Sex+"</li>";
      html=html+"<li>"+animals[i].Colour+"</li>";
      html=html+"</ul>";
      con=true;
      break;
  }
}
if(con==false)
{
  document.getElementById("wrapper").innerHTML="Animal Not Found";
}
else {
  document.getElementById("values").innerHTML = html;
}
