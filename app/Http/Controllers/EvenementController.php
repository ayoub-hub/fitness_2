<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function SaveEvenement(Request $request){
        $file_extension =$request -> photo -> getClientOriginalExtension();
         $file_name =time().'.'.$file_extension;
         $path ='images';
         $request -> photo -> move($path,$file_name);

    $evenement = new Evenement();
        
        $evenement->name = request()->name;
        $evenement->text = request()->text;
        $evenement->subtext = request()->subtext;
        $evenement->date = request()->date;
        $evenement->photo = $file_name;
        $evenement->save();
        return response()->json([
            'message' =>'Evenement created succesfully',
            'code' => 200,
            
        ]);
}

public function getEvenement(){
    $evenement = Evenement::all();
    return response()->json(
        
      $evenement
        );
       }
      
       public function deleteEvenement($id){
           $evenement = Evenement:: find($id);
           if($evenement){
               $evenement -> delete ();
               return response()->json([
                'message' =>'Evenement deleted succesfully',
                'code' => 200,
                
               
            ]);

           }else {
                return response()->json([
                'message' =>"Evenement with id:$id does not exist",   ]);
           }
       }

       public function updateEvenement($id){
           $evenement = Evenement::find($id);
           return response()->json($evenement);
       }

       public function editEvenement(){
           $evenement = Evenement::find(request()->id);
           $evenement->name = request()->name;
           $evenement->text = request()->text;
           $evenement->subtext = request()->subtext;
           $evenement->photo = request()->photo;
           $evenement->date = request()->date;
           $evenement->update();
           return 'ok';

       }
      /* public function store(Request $request){
        //insert photo 
         $file_extension =$request -> photo -> getClientOriginalExtension();
         $file_name =time().'.'.$file_extension;
         $path ='images';
         $request -> photo -> move($path,$file_name);
       }*/
    
}
