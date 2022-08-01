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
var stripe_pk = xmlhttp.responseText;
var stripe = Stripe(stripe_pk);
var elements = stripe.elements();

var style = {
  base: {
    color: 'white',
    fontSize: '15px',
    fontFamily: 'Montserrat',
    fontSmoothing: 'antialiased',
    '::placeholder': {
      color: 'white',
    },
  },
  invalid: {
    color: 'white',
    ':focus': {
      color: 'white',
    },
  },
};


var card = elements.create('card', {style: style});

card.mount('#card-element');

var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();


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


  stripe.createToken(card).then(function(result) {
    if (result.error) {
      $('#SELECTOR').waitMe('hide');
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {

      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {

  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  form.submit();
}
}
}
xmlhttp.open("GET","const/co2.php", true);
xmlhttp.send();

$(document).ready(function () {
  $(document).on('click', '#stripe-checkout-button', function () {
    var current_effect = 'bounce';
    run_waitMe(current_effect);
    function run_waitMe(effect){
    $('#SELECTOR').waitMe({

    effect: 'win8_linear',
    text: '',

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

});
