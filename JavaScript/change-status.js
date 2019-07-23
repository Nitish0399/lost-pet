let $breed=$("#pet_info span").text();
if($breed!="")
{
  $("#pet_info").show();
}

let $status=$(".status input");
$status.click(function(){
  if($status.attr("value")=="ACTIVE")
  {
    $status.attr("value","UNACTIVE");
    $("input[type='hidden']").attr("value","UNACTIVE");
    $status.css("color","red");
  }
  else
  {
    $status.attr("value","ACTIVE");
    $("input[type='hidden']").attr("value","ACTIVE");
    $status.css("color","#00b300");
  }
});
