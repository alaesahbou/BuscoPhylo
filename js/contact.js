$( document ).ready(function() {
    var lodtxt = "<div id='loading'></div> Loading";
    $( "#send_button" ).click(function() {
      var firstName = document.getElementById('first-name').value;
      var email = document.getElementById('email').value;
      var subject = document.getElementById('subject').value;
      var message = document.getElementById('message').value;
      var phone = "XX";

      if (firstName == "") {
        alert("Enter your name");
        return false;
      }

      if (email == "") {
        alert("Enter your email");
        return false;
      }

      var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      if(email.match(mailformat))
      {

      }
      else
      {
      alert('Error: Invalid email address');
      return false;
      }

      if (subject == "") {
        alert("Error: Enter message subject");
        return false;
      }

      if (message == "") {
        alert("Error: Enter your message");
        return false;
      }

      var current_effect = 'bounce';
      run_waitMe(current_effect);
      function run_waitMe(effect){
      $('#app_frm').waitMe({

      effect: 'ios',
      text: '',

      bg: 'rgba(255,255,255,0)',

      color: 'white',

      maxSize: '',

      waitTime: -1,
      source: '',

      textPos: 'vertical',

      fontSize: '',
      onClose: function() {}

      });
      }


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
      document.getElementById('callback').innerHTML = reply;

      document.getElementById("first-name").value = "";
      document.getElementById("email").value = "";
      document.getElementById("subject").value = "";
      document.getElementById("message").value = "";
      $('#app_frm').waitMe('hide');

      }
      }
      xmlhttp.open("GET","core/send_message.php?first_name="+firstName+"&subject="+subject+"&email="+email+"&phone="+phone+"&message="+message+"", true);
      xmlhttp.send();

    });



});
