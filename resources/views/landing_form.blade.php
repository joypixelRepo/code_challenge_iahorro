<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>iAhorro - Formulario para solicitud de hipoteca</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
      body {
        font-family: 'Montserrat', sans-serif;
      }
      form small {
        color: red;
      }
      form input[type="text"],
      form input[type="email"],
      form input[type="tel"],
      form select {
        width: 100%;
      }
    </style>

  </head>

  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
            <form method="POST" action="{{ route('clients.store') }}">
              @csrf
              <input type="text" name="first_name" placeholder="Nombre"><br>
              {!! $errors->first('first_name', '<small>:message</small><br>') !!}

              <input type="text" name="last_name" placeholder="Apellidos"><br>
              {!! $errors->first('last_name', '<small>:message</small><br>') !!}

              <input type="email" name="email" placeholder="Email"><br>
              {!! $errors->first('email', '<small>:message</small><br>') !!}

              <input type="tel" name="phone" placeholder="Teléfono"><br>
              {!! $errors->first('phone', '<small>:message</small><br>') !!}

              <input type="text" name="net_income" placeholder="Ingresos netos"><br>
              {!! $errors->first('net_income', '<small>:message</small><br>') !!}

              <input type="text" name="requested_amount" placeholder="Cantidad solicitada"><br>
              {!! $errors->first('requested_amount', '<small>:message</small><br>') !!}

              <select name="time_slot"><br>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
              </select><br>
              {!! $errors->first('time_slot', '<small>:message</small><br>') !!}

              <input type="submit" value="Calcular">
            </form>
          </div>
          <div class="col-3"></div>
        </div>
      </div>
    </section>

  </body>

</html>