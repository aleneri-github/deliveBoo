<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.css" integrity="sha512-f73UKwzP1Oia45eqHpHwzJtFLpvULbhVpEJfaWczo/ZCV5NWSnK4vLDnjTaMps28ocZ05RbI83k2RlQH92zy7A==" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.0/axios.js" integrity="sha512-bYkaBWaFtfPIMYt9+CX/4DWgfrjcHinjerNYxQmQx1VM76eUsPPKZa5zWV8KksVkBF/DaHSADCwil2J5Uq2ctA==" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Prova</title>
  </head>

  <body>
    <div id="detail">
      <div class="container">
        <div class="main">
          <div class="card" v-for="dish in dishes">
            <h2>{{ dish.name }}</h2>
            <button class="btn" type="button" @click="addOne(dish)">Aggiungi</button>
            <button class="btn" type="button" @click="removeOne(dish)">Togli</button>
          </div>
        </div>
        <div class="cart">
          <h2>Lista</h2>
          <ul>
            <li v-for="item in cart">{{ item.name }}-{{ item.quantity }}-{{ item.total }}</li>
          </ul>
          <h3>{{ cartTotal() }}</h3>
        </div>
      </div>
    </div>
    <script src="script.js" charset="utf-8"></script>
  </body>

</html>
