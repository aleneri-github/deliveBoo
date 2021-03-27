<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h3>Benvenuto {{ $user->name }}!!</h3>
    <h3>Registrazione a DeliverYou effettuata con successo, entra nell'area amministratore per gestire il tuo ristorante e aggiungere nuovi piatti!</h3>
    <img src="{{ asset('img/deliverYou.svg') }}" alt="">

  </body>
</html>
