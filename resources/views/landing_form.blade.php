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
    </style>

  </head>

  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <form method="POST" action="/">
              @csrf
              <input type="text" name="full_name">
              <input type="submit">
            </form>
          </div>
        </div>
      </div>
    </section>

  </body>

</html>