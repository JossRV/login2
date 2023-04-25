@extends('layouts/main')
@section('seccion')
    <div class="container">
        <div class="row mt-5">
            <div class="col text-center">
                <div class="display-4">Login</div>
            </div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{route('logeo')}}" method="POST">
                    @csrf
                    @method('post')
                    <label for="">Nombre</label>
                    <input type="text" name="name" class="form-control mb-3">
                    <label for="">Contraseña</label>
                    <input type="text" name="password" class="form-control mb-3">
                    <button class="btn btn-outline-dark">Ingresar</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
