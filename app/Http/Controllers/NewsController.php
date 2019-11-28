<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\News;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{

    
    public function index()
    {       
        $noticias = News::all();
        return view('paginas.painel', compact('noticias'));
    }


    public function adiciona()
    {
        return view('paginas.nova');
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $validator = Validator::make($dados, [
            'title' => 'required',
            'message' => 'required',
            'type' => 'required|numeric'
        ], [
            'title.required' => 'Informe um titulo.',
            'message.required' => 'Informe uma News.',
            'type.required' => 'Informe o tipo de News.',
            'type.numeric' => 'Informe corretamente o tipo.'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        //dd($dados);
        $dados = [
            '_token' => $request->_token,
            "title" => $request->title,
            "message" => $request->message,
            "type" => intval($request->type),
            'user_id' => Auth::user()->id
        ];
        
        //dd($dados);
        News::create($dados);
        return redirect()->route('painel')->with('message', 'News criada com sucesso!');
    }

    public function edit($id)
    {
        $noticia = News::find($id);
        return view('paginas.edit', compact('noticia'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'message' => 'required',
            'type' => 'required|numeric'
        ], [
            'title.required' => 'Informe um titulo.',
            'message.required' => 'Informe uma News.',
            'type.required' => 'Informe o tipo de News.',
            'type.numeric' => 'Informe corretamente o tipo.'
        ]);

        if($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $noticia = News::find($id);
        $dados = [
            'title' => $request->title,
            'message' => $request->message,
            'type' => $request->type
        ];

        News::where('id', $id)->update($dados);
        return redirect()->route('painel')->with('message', 'News editada com sucesso!');
    }


    public function delete($id){
        $noticia = News::find($id);
        return view('paginas.delete', compact('noticia'));
    }

    public function destroy($id){
        $noticia = News::find($id);

        $noticia->delete();

        return redirect()->route('painel')->with('message', "News apagada com sucesso!");
    }


}
