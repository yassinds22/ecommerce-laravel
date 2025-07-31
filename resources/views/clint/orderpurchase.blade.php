<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    * {
  box-sizing: border-box;
}

body {
  background: #ECECEC;
  font-family: sans-serif, open-sans, arial;
}

#container {
  position: absolute;
  left: calc(50% - 300px);
  top: calc(50% - 250px);
  background: transparent;
  border-radius: 10px;
  width: 600px;
  height: 450px;
  box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
  zoom: 0.8;
}
#container #info {
  position: relative;
  float: left;
  width: 50%;
  height: 100%;
  background: #fff;
  padding: 30px;
  border-radius: 10px 0px 0px 0px;
}
#container #info label {
  color: #8A8A8C;
  font-size: 13px;
  font-weight: 300;
  margin-bottom: 10px;
  float: left;
}
#container #info label + input, #container #info label + select {
  width: 100%;
  height: 50px;
  outline: none;
  border: 1px solid rgba(0, 0, 0, 0.1);
  margin-bottom: 30px;
  padding: 10px 20px;
  font-size: 17px;
  font-weight: 300;
}
#container #info input[name=cardDate] {
  width: 160px;
  display: block;
  float: left;
  clear: left;
  text-align: center;
}
#container #info input[name=cvv] {
  width: 60px;
  float: right;
  text-align: center;
  padding: 10px;
}
#container #info label[for=cardDate] {
  display: block;
  width: 130px;
}
#container #info label[for=cvv] {
  float: right;
  width: 60px;
  margin-top: -24px;
}
#container #info #makePayment {
  position: absolute;
  bottom: -10%;
  left: 0;
  width: 100%;
  height: 10%;
  background: #363636;
  border: none;
  text-transform: uppercase;
  font-size: 15px;
  color: #FFF;
  font-weight: 300;
  cursor: pointer;
  border-radius: 0px 0px 10px 10px;
  box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
  transition: 0.2s;
}
#container #info #makePayment:hover {
  transform: translateY(-5px);
}
#container #description {
  float: right;
  width: 50%;
  height: 100%;
  background: linear-gradient(to bottom, #76D2FF, #07E7D7);
  text-align: center;
  border-radius: 0px 10px 10px 0px;
}
#container #description img {
  max-width: 80%;
  margin: auto;
  margin-top: 40px;
  transition: 0.5s ease;
}
#container #description img:hover {
  transform: scale(2);
}
#container #description #editOrder {
  width: 60%;
  margin: auto;
  background: none;
  border: 1px solid #FFF;
  color: #FFF;
  font-size: 14px;
  font-weight: 300;
  height: 45px;
  margin-top: 20px;
  cursor: pointer;
  transition: 0.2s;
}
#container #description #editOrder:hover {
  transform: scale(1.15);
}
#container #description h1, #container #description h2, #container #descriptionh3 {
  margin: 0;
  color: #FFF;
}
#container #description h1 {
  font-size: 40px;
  font-weight: 500;
}
#container #description h2 {
  margin-top: 20px;
  font-size: 16px;
  font-weight: 400;
  text-transform: uppercase;
  margin-top: 60px;
}
#container #description h3 {
  margin-top: 5px;
  color: #FFF;
  font-size: 13px;
  font-weight: 300;
  text-transform: uppercase;
}
</style>
<body>
    <!------ Copyright ------
Designed by: Emily Feng
Dribbble: https://dribbble.com/emilyfeng
Developed by Yago Rocha for educational purpose
-->

<main id='container'>
  <aside id='info'>
    <label for='paymentMethod'>Payment Method</label>
    <select name='paymentMethod'>
      <option>Visa</option>
      <option>MasterCard</option>
      <option>Elo</option>
    </select>

    <!-- Credit Card Number -->
    <label for='cardNumber'>Credit Card Number</label>
    <input type='text' name='cardNumber' />

    <!-- Credit Card Holder Name -->
    <label for='cardholderName'>Cardholder Name</label>
    <input type='text' name='cardholderName' />

    <!-- Expiration Date -->
    <label for='cardDate'>Expiration Date</label>
    <input type='text' name='cardDate' />

    <!-- CVV Card Number -->
    <label for='cvv'>CVV</label>
    <input type='text' name='cvv' />

    <button id='makePayment'>MAKE A PAYMENT</button>
  </aside>
  <aside id='description'>
    <h2>Original wayfarer classic</h2>
    <h3>Green classic g-15</h3>
    <img src='http://www.ray-ban.com/_repository/_resources/_collections/sun/RB4105/601/_default_500_300/601.png'>
    <h1>$150</h1>
    <button id='editOrder'>Edit the Order</button>
  </aside>
</main>
</body>
</html>