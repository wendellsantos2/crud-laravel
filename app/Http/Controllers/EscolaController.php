<?php
namespace App\Http\Controllers;
use App\Models\Escola;
use App\Models\Local;
use Illuminate\Http\Request;

class EscolaController extends Controller
{
    public function index()
    {
        $escolas = Escola::select(
            "escolas.escola_id", 
            "escolas.name",
            "escolas.image", 
            "escolas.created_at", 
            "local.name as local_name"
        )
        ->join("local", "local.id_local", "=", "local.id_local")
        ->get();
        
     
        return view('escolas.index', compact('escolas'));
    }



    public function create()
    {
        $escolas = Local::select('id_local','name')->get();
       
        return view('escolas.create', compact('escolas'));
    }

 

    public function adc_local(Request $request)
    {
        
        $input = $request->all();
        Local::create($input);
        return redirect()->route('escolas.index')
            ->with('success','Escola Criada com  successo.');
    }
    
    public function adc_escola(Request $request)
    {
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $escolaImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $escolaImage);
            $input['image'] = "$escolaImage";
        }
        Escola::create($input);
        return redirect()->route('escolas.index')
            ->with('success','Escola Criada com  successo.');
    }

    public function show(Escola $escola)
    {
  
        return view('escolas.show', compact('escola'));
    }

    public function edit(Escola $escola)
    {
        return view('escolas.edit', compact('escola'));
    }

    public function update(Request $request, Escola $escola)
    {

        
        
        $request->validate([
            'name' => 'required',
             
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $escolaImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $escolaImage);
            $input['image'] = "$escolaImage";
        } else {
            unset($input['image']);
        }

        $escola->update($input);
        return redirect()->route('escolas.index')
            ->with('success','Escola editada com  sucesso');
    }

    public function destroy(Escola $escola)
    {
        $escola->delete();
        return redirect()->route('escolas.index')
            ->with('success','Escola excluida com  sucesso');
    }



}
