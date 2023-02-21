@extends('layouts.app')

@section('content')
<div class="container my-4">

        <div class="row justify-content-center">
                <div class="col-12 col-md-4 my-5">
                    
                        <div class="card align-items-center border-light bg-light shadow">
                                <div class="text-center">
                                  <img class="m-0" src="{{asset('img/discar_rc2.png')}}" alt="" width="300" height="150">
                                </div>
                                
                                <div class="card-body">
                                  <h1>Iniciar Sesión</h1>
                                  <p class="text-muted">Ingresa tu Usuario</p>
                                  <form method="POST" action="{{ route('login') }}">
                                   @csrf
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="icon-user"></i>
                                      </span>
                                    </div>
                                    <input id="user" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Usuario" required autofocus>
                                    {{-- <input class="form-control" type="text" placeholder="Usuario"> --}}
                                    @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                    @endif
                                  </div>
                                  <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                      </span>
                                    </div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>
        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                  </div>
                                  <div class="form-group">
                                        
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                 </div>
                                  
                                  <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
                                  </div>
                                  </form>
                            </div>
                        </div>
        
                </div>
            </div>
   
</div>
@endsection
