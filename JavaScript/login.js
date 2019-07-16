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
