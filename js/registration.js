$( document ).ready(function() {


    $( "#email" ).change(function() {
      check_email();
    });
    $( "#username" ).change(function() {
      check_username();
    });

    function check_email() {
      var email = document.getElementById('email').value;

      if (email == "") {
      }else{

        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(email.match(mailformat))
        {
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
          document.getElementById('email_response').innerHTML = results;
          }
          }

          xmlhttp.open("GET","const/ajax/valid_email.php?email="+email+"", true);
          xmlhttp.send();

        }
        else
        {
          document.getElementById('email_response').innerHTML = "Invalid email address";
        }




      }

    }

    function check_username() {
      var username = document.getElementById('username').value;
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
      document.getElementById('username_response').innerHTML = results;
      }
      }

      xmlhttp.open("GET","const/ajax/valid_username.php?username="+username+"", true);
      xmlhttp.send();
    }



});
