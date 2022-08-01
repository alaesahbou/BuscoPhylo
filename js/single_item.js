$(document).ready(function () {
  $(document).on('click', '#loadBtn', function () {
    var row = Number($('#row').val());
    var count = Number($('#postCount').val());
    var limit = 12;
    row = row + limit;
    $('#row').val(row);
    document.getElementById('load_area').innerHTML = "<div class='catalog__morev' ><div id='loading'></div></div>";

      $.ajax({
      type: 'POST',
      url: 'const/ajax/loadmore-comments.php',
      data: 'row=' + row,
      success: function (data) {
      var rowCount = row + limit;
      $('.comments__list').append(data);
      if (rowCount >= count) {
      document.getElementById('load_area').innerHTML = "";
      } else {
      document.getElementById('load_area').innerHTML = "<button id='loadBtn' class='catalog__more weeee' >Load more</button>";
      }
      }
      });
  });



  $(document).on('click', '#loadBtnb', function () {
    var rowb = Number($('#rowb').val());
    var countb = Number($('#postCountb').val());
    var limitb = 12;
    rowb = rowb + limitb;
    $('#row').val(rowb);
    document.getElementById('load_areab').innerHTML = "<div class='catalog__morev' ><div id='loading'></div></div>";

      $.ajax({
      type: 'POST',
      url: 'const/ajax/loadmore-reviews.php',
      data: 'rowb=' + rowb,
      success: function (data) {
      var rowCountb = rowb + limitb;
      $('.reviews__list').append(data);
      if (rowCountb >= countb) {
      document.getElementById('load_areab').innerHTML = "";
      } else {
      document.getElementById('load_areab').innerHTML = "<button id='loadBtn' class='catalog__more weeee' >Load more</button>";
      }
      }
      });
  });

});


function add_fav(item) {
document.getElementById('wait').innerHTML = "<button class='article__favorites' type='button'><div id='loading2'></div>&nbsp;&nbsp;Please wait..</button>";

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
document.getElementById('wait').innerHTML = results;
}
}

xmlhttp.open("GET","../../const/ajax/add_to_fav.php?item="+item+"", true);
xmlhttp.send();

}
