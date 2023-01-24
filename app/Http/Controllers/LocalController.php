<?php
namespace App\Http\Controllers;
use App\Models\Escola;
use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{ 
    public function create()
    {
        $escolas = Local::select('id_local','name')->get();
       
        return view('escolas.create', compact('escolas'));
    }

    
    public function store_local(Request $request)
    {
        
       $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $escolaImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $escolaImage);
            $input['image'] = "$escolaImage";
        }
        Local::create($input);
        return redirect()->route('escolas.index')
            ->with('success','Escola Criada com  successo.');
    }
   
}

