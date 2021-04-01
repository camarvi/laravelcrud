@extends('layouts.base')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">

            <!--Mensaje flash -->

            @if (session('usuarioGuardado'))
                <div class="alert alert-success">
                    {{ session('usuarioGuardado') }}
                </div>
            @endif


            <!-- Validacion de errores -->
            @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
            @endif
            <!-- Fin Mostrar mensajes de error -->
            <div class="card">
                <form action="{{ route('save') }}" method="POST">
                @csrf
                    <div class="card-header text-center">AGREGAR USUARIO</div>

                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombre</label>
                            <input type="text" name="nombre" value="{{old('nombre')}}" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" value="{{old('email')}}" class="form-control col-md-9">
                        </div>

                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Guardar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <a href="{{ url('/') }}" class="btn btn-light mt-5">Volver Listado Usuarios</a>


</div>
