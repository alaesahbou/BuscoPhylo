
    $(document).on('click', '#popular', function () {
      if($(this).prop("checked") == true){
      $("#newest").prop( "checked", false );
      document.getElementById('movie_grid').innerHTML = "<div class='catalog__morev' ><div id='loading'></div></div>";
      filter_by_popular();
      }
    });

    $(document).on('click', '#newest', function () {
      if($(this).prop("checked") == true){
      $("#popular").prop( "checked", false );
      document.getElementById('movie_grid').innerHTML = "<div class='catalog__morev' ><div id='loading'></div></div>";
      filter_by_newest();
      }
    });


    function filter_by_popular() {

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
      var reply = xmlhttp.responseText;
      document.getElementById('movie_grid').innerHTML = reply;

      }
      }
      xmlhttp.open("GET","const/ajax/home_catalog_popular.php", true);
      xmlhttp.send();

    }

    function filter_by_newest() {

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
      var reply = xmlhttp.responseText;
      document.getElementById('movie_grid').innerHTML = reply;

      }
      }
      xmlhttp.open("GET","const/ajax/home_catalog_newest.php", true);
      xmlhttp.send();

    }
