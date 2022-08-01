$( "#paypal_btn" ).click(function() {
  var current_effect = 'bounce';
  run_waitMe(current_effect);
  function run_waitMe(effect){
  $('#SELECTOR').waitMe({

  effect: 'win8_linear',

  bg: 'rgba(255,255,255,0.3)',

  color: 'white',

  maxSize: '',

  waitTime: -1,
  source: '',

  textPos: 'vertical',

  fontSize: '',
  onClose: function() {}

  });
  }
});
