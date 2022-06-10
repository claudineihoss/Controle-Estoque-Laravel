@extends('layouts.template')
@extends('layouts.funcao')
@section('title', 'Cadastrar Movimento')
@section('content')

<script>  
  function atualiza(){
  var produto=document.getElementById("produto").value;
    window.location.href ='/movimentos/estoque/'+produto;
}
  
</script>
<div class="container mt-4">
    <form method="POST" action="{{route('movimentos.insert')}}">
        @csrf

        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Código</label>
                    <select class="form-control" id="produto" name="produto" required onChange="atualiza()";>
                        <option value=''>Informe um Produto</option>
                        @foreach($produtos as $produto)
                        <?php 
                        $selecionado = '';
                      if($id == $produto->id)
                       $selecionado = 'selected';
                       ?>
                        <option value={{$produto->id}} {{$selecionado}} >{{$produto->nome}}</option>";
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Estoque Atual</label>
                    <input type="text" class="form-control" id="" name="quantidade" value="{{$estoque}}" disabled>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantidade</label>
                    <input type="text" class="form-control" id="" name="quantidade" required onKeyUp="maskIt(this,event,'###.###.###,##',true)">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tipo Movimento</label>
                    <select class="form-control" name="movimento">
                        <option value=0>Entrada</option>";
                        <option value=1>Saída</option>";
                    </select>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
    
@endsection