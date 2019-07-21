let $breed=$("#pet_info span").text();
if($breed!="")
{
  $("#pet_info").show();
}

let $status=$(".status input");
$status.click(function(){
  if($status.attr("value")=="Active")
  {
    $status.attr("value","Unactive");
    $status.css("color","red");
  }
  else
  {
    $status.attr("value","Active");
    $status.css("color","green");
  }
});
