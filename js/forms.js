$( document ).ready(function() {


  $("#app_frm").on("submit", function(){
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
  })

  $("#app_frm_dsc").on("submit", function(){
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#modal-discount').waitMe({

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
  })

  $("#app_frm3").on("submit", function(){
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#app_frm3').waitMe({

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
  })

  $("#app_frm4").on("submit", function(){
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#app_frm4').waitMe({

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
  })

  $("#app_frmb").on("submit", function(){
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#app_frmb').waitMe({

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
  })


  $("#app_frmc").on("submit", function(){
    var oldpass = document.getElementById('oldpass').value;
    var newpass = document.getElementById('newpass').value;
    var confirmpass = document.getElementById('confirmpass').value;


    if(oldpass == ""){
    alert("Error: Please enter your old password!");
    return false;
    }else{
    }

    if((oldpass).length < 8)
    {
    alert("Error: Old password should be minimum 8 characters.");
    return false;
    }

    if((oldpass).length > 20)
    {
    alert("Error: Old password should be maximum 20 characters.");
    return false;
    }

    if(newpass == ""){
    alert("Error: Please enter your new password!");
    return false;
    }else{
    }

    if((newpass).length < 8)
    {
    alert("Error: New password should be minimum 8 characters.");
    return false;
    }

    if((newpass).length > 20)
    {
    alert("Error: New password should be maximum 20 characters.");
    return false;
    }


    if(confirmpass == ""){
    alert("Error: Please confirm your password.");
    return false;
    }else{
    }

    if(newpass != confirmpass)
    {
    alert("Error: Password confirmation does not match.");
    return false;
    }



    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#app_frmc').waitMe({

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


  })

  $("#app_frmc2").on("submit", function(){
    var newpass = document.getElementById('newpass').value;
    var confirmpass = document.getElementById('confirmpass').value;

    if(newpass == ""){
    alert("Error: Please enter your new password!");
    return false;
    }else{
    }

    if((newpass).length < 8)
    {
    alert("Error: New password should be minimum 8 characters.");
    return false;
    }

    if((newpass).length > 20)
    {
    alert("Error: New password should be maximum 20 characters.");
    return false;
    }


    if(confirmpass == ""){
    alert("Error: Please confirm your password.");
    return false;
    }else{
    }

    if(newpass != confirmpass)
    {
    alert("Error: Password confirmation does not match.");
    return false;
    }



    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#app_frmc2').waitMe({

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


  })


  $("#app_frm_c").on("submit", function(){

    var id = document.getElementsByClassName("select2-selection__choice");
    var l = id.length;
    var div = document.getElementById('genre_list');
    for (i = 0; i < l; i++) {
      var current_list = id[i].id;
      div.innerHTML += '<input type="hidden" name="gen[]" value="'+current_list+'">';
    }


    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#app_frm_c').waitMe({

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
  })



  $("#ifrm").on("submit", function(){
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#modal-add').waitMe({

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
  })


  $("#ifrm2").on("submit", function(){
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#modal-edit').waitMe({

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
  })

  $("#ifrm3").on("submit", function(){
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#modal-add-2').waitMe({

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
  })



  $("#app_btnf").on("click", function(){

    var rep_em = document.getElementById('email_response').innerHTML;
    var rep_un = document.getElementById('username_response').innerHTML;

    if(rep_em == ""){
    }else{
      alert("Error: Please check your email!");
      return false;
    }

    if(rep_un == ""){
    }else{
      alert("Error: Please check your username!");
      return false;
    }


    var pass = document.getElementById('id-signup-password').value;

    if (pass == "") {
      alert("Error: Enter password.");
      return false;
    }

    if((pass).length < 8)
    {
        alert("Error: Password should be minimum 8 characters.");
        return false;
    }

    if((pass).length > 20)
    {
        alert("Error: Password should be maximum 20 characters.");
        frm1.password.focus();
        return false;
    }

  })
});
