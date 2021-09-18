<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online Ödeme</title>
    <link rel="icon" href="{{asset('images/c-icon.png')}}" type="image/x-icon"/>
</head>
<body>
{!! $paymentForm !!}
<div id="iyzipay-checkout-form" class="responsive"></div>
</body>
</html>
