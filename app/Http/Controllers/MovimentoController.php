<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movimento;
use App\Models\Produto;

class MovimentoController extends Controller
{
    public function index()
    {

        $movimentos=Movimento::paginate(10);
        return view('movimentos.show',['movimentos'=>$movimentos]);

        //retorna todos os movimentos do produto 1, mas somente dados da tabela movimentos
        //$estoque = Produto::find(1)->movimentos;
        //retorna os dados da tabela movimentos com os produtos junto
        //$estoque = Produto::with('movimentos')->find(1);
        //$estoque = Produto::with('movimentos')->get();
        //return view('movimentos.show',['estoque'=>$estoque]);
        //echo "<h3> $estoque</h3>";

    }


    public function create()
    {

        $entradas=Movimento::where('movimento', 0)->sum('quantidade');
        $saidas=Movimento::where('movimento', 1)->sum('quantidade');
        $estoque=$entradas-$saidas;

        $produtos=Produto::orderBy('nome')->get();
       return view('movimentos.create',['produtos'=>$produtos,'estoque'=>$estoque]);
    }

    public function estoque($id)
    {     
        $entradas=Movimento::where('movimento', 0)->where('produto_id','=',$id)->sum('quantidade');
        $saidas=Movimento::where('movimento', 1)->where('produto_id','=',$id)->sum('quantidade');
        $estoque=$entradas-$saidas;

        $produtos=Produto::orderBy('nome')->get();
       return view('movimentos.create',['produtos'=>$produtos,'estoque'=>$estoque,'id'=>$id]);     
        
    }


    public function store(Request $request)
    {
        $produtos=Produto::orderBy('nome')->get();
        $movimentos=new Movimento;
        $produto=$request->produto;
        $quantidade=$request->quantidade;
        $entradas=Movimento::where('movimento', 0)->where('produto_id',$produto)->sum('quantidade');
        $saidas=Movimento::where('movimento', 1)->where('produto_id',$produto)->sum('quantidade');
       $estoqueatual=$entradas-$saidas;
        if(($request->movimento==1) &&($quantidade>$estoqueatual)){
            echo "<script language='javascript'> window.alert('Estoque Insuficiente!') </script>";
            return view('movimentos.create',['produtos'=>$produtos]);
        }
        else{
       $movimentos->quantidade=$request->quantidade;
       $movimentos->movimento=$request->movimento;
       $movimentos->produto_id=$request->produto;
       $movimentos->save();
       return redirect()->route('movimentos');
        }
    }

    public function modal($id)
    {
        $movimentos=Movimento::paginate(10);
        $movimento=Movimento::find($id);
        $entradas=Movimento::where('movimento', 0)->where('produto_id',$movimento->produto_id)->sum('quantidade');
        $saidas=Movimento::where('movimento', 1)->where('produto_id',$movimento->produto_id)->sum('quantidade');
        $estoqueatual=$entradas-$saidas;
        $movimento=Movimento::find($id);

        if(($movimento->movimento==0) &&($movimento->quantidade>$estoqueatual)){
            echo "<script>window.location='/movimentos';alert('Impossivel Deletar!! Estoque Insuficiente');</script>";
        }
        else{

            return view('movimentos.show',['movimentos'=>$movimentos,'id'=>$id]); 
        }
        

    }




    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $movimento=Movimento::find($id);

        $movimento->delete();
        return redirect()->route('movimentos');
    }
}
