@extends('layouts.template')
@extends('layouts.funcao')
@section('title', 'Cadastrar Passaro')
@section('content')
<div class="container mt-4">
    <form method="POST" action="{{route('produtos.insert')}}">
    
        @csrf

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Código</label>
                    <input type="text" class="form-control" id="" name="codigo" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" id="" name="nome" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="exampleInputEmail1">Custo Fiscal</label>
                    <input type="text" class="form-control" id="" name="custo" required onKeyUp="maskIt(this,event,'###.###.###,##',true)">
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection