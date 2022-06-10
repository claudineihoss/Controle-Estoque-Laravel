@extends('layouts.template')
@extends('layouts.funcao')
@section('title', 'Movimento de Produtos')
@section('content')


<? 
use App\Models\Movimento;
?>

<h4><class="display-4"><center>Relatório Geral de Estoque</center></h4>

<div class="container mt-4">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
            <th>Código</th>
              <th>Produto</th>
              <th>Entrada</th>
              <th>Saida</th>
              <th>Estoque Atual</th>
            </tr>
          </thead>

          <tbody>
            @foreach($produtos as $produto)
            <?php 
        $entradas=Movimento::where('movimento', 0)->where('produto_id','=',$produto->id)->sum('quantidade');
        $saidas=Movimento::where('movimento', 1)->where('produto_id','=',$produto->id)->sum('quantidade');
        $estoque=$entradas-$saidas;
        $entradas=number_format($entradas);
        $saidas=number_format($saidas);
        $estoque=number_format($estoque);
                ?>
          
            <tr>
              <td>{{$produto->codigo}}</td>
              <td>{{$produto->nome}}</td>
              <td>{{$entradas}}</td>
              <td>{{$saidas}}</td>
              <td>{{$estoque}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection