<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body style="box-sizing:border-box; margin:0; padding:0; border: 7px solid #00B08C;">
    <header style="box-sizing:border-box; margin:0; height:20vh; padding-left: 40px; background-color:#FDC234; border-bottom: 2px solid white; ">
      <img style="height:100%;" src="{{ asset('img/deliverYou-bianco.svg') }}" alt="logo">
    </header>
    <main style="background-image: url('https://previews.123rf.com/images/nightman1965/nightman19651205/nightman1965120500003/13434243-muro-di-mattoni-texture-di-alta-qualit%C3%A0.jpg'); background-size: cover; background-repeat: no-repeat; box-sizing:border-box; margin:0; padding:15px; display:flex; justify-content:center;">
      <div style="background-color: rgba(255, 255, 255, 0.7); width:70%; display:flex; flex-direction:column; justify-content:center; align-items: center; border-radius:20px; border: 4px solid #00B08C;)">
        <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size:28px; text-align:center; color:#00B08C; ">
          Complimenti <strong>{{ $order->name. ' ' .$order->surname }}</strong>! <br> Ordine effettuato con successo!!
        </h3>
        <img style="height:130px;" src="{{ asset('img/food-rest.svg') }}" alt="">
        <h3 style="font-family: 'Barlow Condensed', sans-serif; font-size:28px; text-align:center; color:#00B08C; ">Grazie per averci scelto!</h3>
        <div style="box-sizing:border-box; border: 4px solid #00B08C; border-radius: 20px; padding:5px; width:90%; margin:15px;">
          <h4 style="font-family: 'Barlow Condensed', sans-serif; text-align:center; font-size:22px; color:#00B08C;  margin:10px;">Indirizzo di consegna: <br> <strong>{{ $order->buyer_address}}</strong></h4>

            <h4 style="font-family: 'Barlow Condensed', sans-serif; text-align:center; font-size:22px; color:#00B08C;  margin:0px;">Totale: <strong>{{ $order->total }} &euro;</strong></h4>
        </div>
      </div>
    </main>
    <footer style="box-sizing:border-box; margin:0; height:20vh; background-color:#FDC234; border-top: 2px solid white;"></footer>
  </body>
</html>
