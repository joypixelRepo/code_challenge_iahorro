@extends('layout')

@section('content')
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="pr-5">
            <h1>Solicita tu hipoteca en iAhorro</h1>
            <h2>No malgastes tu tiempo</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur.</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-box">

            @if(isset($_GET['status']) && $_GET['status'] == 1)
            <div class="row">
              <div class="col-12">
                <p class="status">Gracias. Hemos registrado tus datos. Nos pondremos en contacto contigo en la mayor brevedad posible.</p>
              </div>
            </div>
            @endif

            <h3>Rellena los siguientes datos y calcula tu hipoteca:</h3>
            <form method="POST" id="form-hipoteca" action="{{ route('clients.store') }}">
              @csrf
              <div class="row">
                <div class="col-lg-5 form-input-box">
                  <label class="form-label">Nombre</label>
                  <input type="text" name="first_name" value="{{ old('first_name') }}">
                  {!! $errors->first('first_name', '<label class="err">:message</label>') !!}
                </div>

                <div class="col-lg-7 form-input-box">
                  <label class="form-label">Apellidos</label>
                  <input type="text" name="last_name" value="{{ old('last_name') }}">
                  {!! $errors->first('last_name', '<label class="err">:message</label>') !!}
                </div>
              </div>

              <div class="row">
                <div class="col-lg-7 form-input-box">
                  <label class="form-label">Correo electrónico</label>
                  <input type="email" name="email" value="{{ old('email') }}">
                  {!! $errors->first('email', '<label class="err">:message</label>') !!}
                </div>

                <div class="col-lg-5 form-input-box">
                  <label class="form-label">Teléfono</label>
                  <input type="tel" name="phone" value="{{ old('phone') }}">
                  {!! $errors->first('phone', '<label class="err">:message</label>') !!}
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 form-input-box">
                  <label class="form-label">Ingresos netos</label>
                  <input type="text" name="net_income" value="{{ old('net_income') }}" class="euro" placeholder="€">
                  {!! $errors->first('net_income', '<label class="err">:message</label>') !!}
                </div>

                <div class="col-lg-4 form-input-box">
                  <label class="form-label">Cantidad solicitada</label>
                  <input type="text" name="requested_amount" value="{{ old('requested_amount') }}" class="euro" placeholder="€">
                  {!! $errors->first('requested_amount', '<label class="err">:message</label>') !!}
                </div>

                <div class="col-lg-4 form-input-box">
                  <label class="form-label">Franja horaria</label>
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
                  {!! $errors->first('time_slot', '<label class="err">:message</label>') !!}
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <label class="policy">
                    <input type="checkbox" name="policy" required>Acepto la política de privacidad, bla bla bla...
                  </label>
                </div>
              </div>

              <div class="row">
                <div class="col-12 text-right">
                  <button type="submit" class="mt-3">
                    <img src="/img/home.svg">Solicitar hipoteca
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection