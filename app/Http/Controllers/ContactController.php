<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactController extends Controller{
    public function index(){
        $contato = new \App\contactModel();
        $dados['contatos'] = $contato->get();
        return view('home',$dados);
    }
    public function create(){
        $dados['action']='Incluir';
        $dados['contato']= new \App\contactModel();
      
        return view('formContact',$dados);
       
    }
    public function edit(Request $request){
        $contato = new \App\contactModel();
        $dados['contato']= $contato->find( $request->id);
        $dados['action']='Alterar';
        if(is_null($dados['contato'])){
            return redirect('/')->with('status', "contact not found !");
        }
        
        return view('formContact',$dados);
       
    }
    public function insert(Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required|unique:contacts',
            'tel_number' => 'required|max:15|min:14',
        ]);

      $contato = new \App\contactModel();
      $contato->name = $request->name;
      $contato->email = $request->email;
      $contato->tel_number = $request->tel_number;
      $contato->save();
      return redirect('/')->with('status', 'Contact save!');;

    }
    public function update(Request $request){
        $this->validate($request,[
            'name' => 'required|max:100',
            'email' => 'required',
            'tel_number' => 'required|max:15|min:14',
        ]);
    
      $contato = \App\contactModel::find($request->id);
      $contato->name = $request->name;
      $contato->email = $request->email;
      $contato->tel_number = $request->tel_number;
      $contato->save();
      return redirect('/')->with('status', "Contact {$contato->name } altered!");

    }
    public function search(Request $request){
        
      $contato = \App\contactModel::where('email', 'like', $request->search . '%')
                                    ->orWhere('name', 'like', $request->search . '%');

    $dados['contatos'] = $contato->get();
    return view('home',$dados);
     /* $contato->name = $request->name;
      $contato->email = $request->email;
      $contato->tel_number = $request->tel_number;
      $contato->save();
      return redirect('/')->with('status', "Contact {$contato->name } altered!");*/

    }
    public function destroy(Request $request){
       

      $contato = new \App\contactModel();
      $contact_removed= $contato->find( $request->id);
        
      if($contato->destroy($request->id)){
        return redirect('/')->with('status', "Contact {$contact_removed->name}  removed!");
      }else{
        return redirect('/')->with('status', "Error deleting the registry!");
      }


    }
}

