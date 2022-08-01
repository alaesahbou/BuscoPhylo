<?php
session_start();
require 'stripe-php-master/init.php';
\Stripe\Stripe::setApiKey($_SESSION['stripe_sk']);

header('Content-Type: application/json');

$DOMAIN = $_SESSION['domain'];
$success_url = $_SESSION['success_url'];
$cancel_url = $_SESSION['cancel_url'];

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => $_SESSION['st_currency'],
      'unit_amount' => $_SESSION['unit_amount'],
      'product_data' => [
        'name' => $_SESSION['trans_name'],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $DOMAIN . '/'.$success_url.'',
  'cancel_url' => $DOMAIN . '/'.$cancel_url.'',
]);

echo json_encode(['id' => $checkout_session->id]);
