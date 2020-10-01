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
        min-height: 45px;
        border: 1px solid #ccc;
        border-radius: 4px;
        padding: 8px 13px;
        margin-top: 8px;
      }
      form input[type="submit"] {
        padding: 10px 30px;
        background-color: rgb(41, 221, 185);
        color: #fff;
        border: 0;
        font-family: Montserrat, sans-serif;
        font-weight: 700;
        font-size: 18px;
      }
      /* WebKit, Blink, Edge */
      ::-webkit-input-placeholder {
        font-size: 13px;
        color: #a5a5a5;
      }
      /* Mozilla Firefox 4 to 18 */
      :-moz-placeholder {
        font-size: 13px;
        color: #a5a5a5;
      }
      /* Mozilla Firefox 19+ */
      ::-moz-placeholder {
        font-size: 13px;
        color: #a5a5a5;
      }
      :-ms-input-placeholder { /* Internet Explorer 10-11 */
        font-size: 13px;
        color: #a5a5a5;
      }
      /* Microsoft Edge */
      ::-ms-input-placeholder {
        font-size: 13px;
        color: #a5a5a5;
      }
      /* Most modern browsers support this now. */
      ::placeholder {
        font-size: 13px;
        color: #a5a5a5;
      }
    </style>

  </head>

  <body>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <form method="POST" action="{{ route('clients.store') }}">
              @csrf
              <div class="row">
                <div class="col-lg-6">
                  <input type="text" name="first_name" placeholder="Nombre">
                  {!! $errors->first('first_name', '<small>:message</small>') !!}
                </div>

                <div class="col-lg-6">
                  <input type="text" name="last_name" placeholder="Apellidos">
                  {!! $errors->first('last_name', '<small>:message</small>') !!}
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <input type="email" name="email" placeholder="Email">
                  {!! $errors->first('email', '<small>:message</small>') !!}
                </div>

                <div class="col-lg-6">
                  <input type="tel" name="phone" placeholder="Teléfono">
                  {!! $errors->first('phone', '<small>:message</small>') !!}
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4">
                  <input type="text" name="net_income" placeholder="Ingresos netos">
                  {!! $errors->first('net_income', '<small>:message</small>') !!}
                </div>

                <div class="col-lg-4">
                  <input type="text" name="requested_amount" placeholder="Cantidad solicitada">
                  {!! $errors->first('requested_amount', '<small>:message</small>') !!}
                </div>

                <div class="col-lg-4">
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
                  {!! $errors->first('time_slot', '<small>:message</small>') !!}
                </div>
              </div>

              <div class="row">
                <div class="col-12 text-right">
                  <input class="mt-3" type="submit" value="Calcular">
                </div>
              </div>

            </form>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </section>

  </body>

</html>