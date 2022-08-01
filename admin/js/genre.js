function edit_modal(mod) {
document.getElementById('response').innerHTML = "<center><div id='loading'></div></center>";

var txt;
var xmlhttp;

if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}

xmlhttp.onreadystatechange = function() {
if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
{
var results = xmlhttp.responseText;
document.getElementById('response').innerHTML = results;

}
}

xmlhttp.open("GET","../const/ajax/edit_genre.php?node="+mod+"", true);
xmlhttp.send();
}
