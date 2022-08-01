function remove_fav(item) {
  var r = confirm("Remove item from favourites?");
  if (r == true) {
    var the_it = 'item'+item+'';
    var element = document.getElementById(the_it);
    element.parentNode.removeChild(element);

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

    xmlhttp.open("GET","const/ajax/remove_fav.php?node="+item+"", true);
    xmlhttp.send();

  } else {

  }
}



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
      url: 'const/ajax/loadmore-favs.php',
      data: 'row=' + row,
      success: function (data) {
      var rowCount = row + limit;
      $('.postList').append(data);
      if (rowCount >= count) {
      document.getElementById('load_area').innerHTML = "";
      } else {
      document.getElementById('load_area').innerHTML = "<button id='loadBtn' class='catalog__more weeee' >Load more</button>";
      }
      }
      });
  });

});
