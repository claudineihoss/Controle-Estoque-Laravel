<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{

    public function index()
    {

        //$produtos = Produto::all();
        $produtos = Produto::paginate(10);

        return view('produtos.show', ['produtos' => $produtos]);
    }

    public function estoque()
    {

        $produtos = Produto::paginate(10);

        return view('produtos.estoque', ['produtos' => $produtos]);
    }


    public function create()
    {
        return view('produtos.create');
    }


    public function store(Request $request)
    {
        $produtos = new Produto;
        $codigo=$request->codigo;
        $validacao = Produto::where('codigo', '=', $codigo)->first();

        if (@$validacao->id == null) {
        $produtos->codigo = $request->codigo;
        $produtos->nome = $request->nome;
        $produtos->custo = $request->custo;
        $produtos->custo = str_replace('.', '', $produtos->custo);
        $produtos->custo = str_replace(",", ".", $produtos->custo);
        $produtos->save();

        return redirect()->route('produtos');
    }
    else {
        echo "<script language='javascript'> window.alert('Produto ja Cadastrado!') </script>";
        return view('produtos.create');
    }
}


    public function show($id)
    {
       
    }


    public function edit($id)
    {
        $produtos=Produto::findOrfail($id);
        return view('produtos.edit',['produtos'=>$produtos]);
    }

    public function modal($id)
    {
        $produtos = Produto::paginate(10);
        return view('produtos.show',['produtos'=>$produtos,'id'=>$id]);
    }


    public function update(Request $request, $id)
    {
       $produto=Produto::find($id);
       $produto->codigo=$request->get('codigo');
       $produto->nome=$request->get('nome');
       $produto->custo = $request->get('custo');
        $produto->custo = str_replace('.', '', $produto->custo);
        $produto->custo = str_replace(",", ".", $produto->custo);
        $produto->save();
        return redirect()->route('produtos');


    }


    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->route('produtos');
    }
}
