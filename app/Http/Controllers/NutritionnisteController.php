<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NutritionnisteController extends Controller
{
    public function SaveNutritionniste(Request $request){
        $file_extension =$request -> photo -> getClientOriginalExtension();
         $file_name =time().'.'.$file_extension;
         $path ='images';
         $request -> photo -> move($path,$file_name);

    $nutritionniste = new Nutritionniste();
        
        $nutritionniste->name = request()->name;
        $nutritionniste->text = request()->text;
        $nutritionniste->subtext = request()->subtext;
        $nutritionniste->adresse = request()->adresse;
        $nutritionniste->photo = $file_name;
        $nutritionniste->save();
        return response()->json([
            'message' =>'Nutritionniste created succesfully',
            'code' => 200,
            
        ]);
}

public function getNutritionniste(){
    $Nutritionniste = Nutritionniste::all();
    return response()->json(
        
      $nutritionniste
        );
       }
      
       public function deleteNutritionniste($id){
           $nutritionniste = Nutritionniste:: find($id);
           if($nutritionniste){
               $nutritionniste -> delete ();
               return response()->json([
                'message' =>'Nutritionniste deleted succesfully',
                'code' => 200,
                
               
            ]);

           }else {
                return response()->json([
                'message' =>"Nutritionniste with id:$id does not exist",   ]);
           }
       }

       public function updateNutritionniste($id){
           $nutritionniste = Nutritionniste::find($id);
           return response()->json($nutritionniste);
       }

       public function editNutritionniste(){
           $nutritionniste = Nutritionniste::find(request()->id);
           $nutritionniste->nom = request()->nom;
           $nutritionniste->text = request()->text;
           $nutritionniste->subtext = request()->subtext;
           $enutritionniste->photo = request()->photo;
           $nutritionniste->adresse = request()->adresse;
           $nutritionniste->update();
           return 'ok';

       }
}
