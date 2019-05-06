var pets=[
  {
    Type_of_Pet:"Dog",
    Date_Picked_up:"01-03-2019",
    Address:"9th Downing Street",
    City: "New York City",
    State: "New York",
    Breed: "Morkie",
    Sex:"Female",
    Colour:"Brown"
  },
  {
    Type_of_Pet:"Cat",
    Date_Picked_up:"29-02-2019",
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
var pet_search=prompt("What is the breed of the Pet?");
if(pet_search==null || pet_search=="")
{
  document.getElementById("wrapper").innerHTML="No Results Found";
}
else {
  var header='<img src="../Pet images';
  header=header+ "/"+pet_search.toLowerCase() +  '.jpg">' +  "<h2>Details of breed - " + pet_search.toUpperCase() + "</h2>";
  document.getElementById("header").innerHTML=header;
  for(var i=0;i<pets.length;i++)
  {
    if(pet_search.toLowerCase()==pets[i].Breed.toLowerCase())
    {
        html=html+"<ul>";
        html=html+"<li>"+pets[i].Type_of_Pet+"</li>";
        html=html+"<li>"+pets[i].Date_Picked_up+"</li>";
        html=html+"<li>"+pets[i].Address+"</li>";
        html=html+"<li>"+pets[i].City+"</li>";
        html=html+"<li>"+pets[i].State+"</li>";
        html=html+"<li>"+pets[i].Breed+"</li>";
        html=html+"<li>"+pets[i].Sex+"</li>";
        html=html+"<li>"+pets[i].Colour+"</li>";
        html=html+"</ul>";
        con=true;
        break;
    }
  }
  if(con==false)
  {
    document.getElementById("wrapper").innerHTML="Pet Not Found";
  }
  else {
    document.getElementById("values").innerHTML = html;
  }
}
