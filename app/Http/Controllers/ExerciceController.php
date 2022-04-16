<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercice;


class ExerciceController extends Controller
{
    public function SaveExercice(Request $request){
        
          $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm'
        ]);
 
        $file=$request->file('video');
        $file->move('images',$file->getClientOriginalName());
        $file_name=$file->getClientOriginalName();
 
        $exercice = new Exercice();
        
        $exercice->title = request()->title;
        
        $exercice->text = request()->text;
        $exercice->subtext = request()->subtext;
        $exercice->categorie = request()->categorie;
        $exercice->video = $file_name;
        $nexercice->save();
        return response()->json([
            'message' =>'Exercice created succesfully',
            'code' => 200,
            
        ]);
         
         /* Exercice::create([
              'title'=> request()->title,
              'text'=> request()->text,
              'subtext'=> request()->subtext,
              'categorie'=> request()->categorie,

              'video'=> $file_name,
  
  
          ]);
          return 'saved exercice successfuly';*/
      }public function getExercice(){
        $exercice = Exercice::all();
        return response()->json(
            
          $exercice
            );
           }
          
           public function deleteExercice($id){
               $exercice = NExercice:: find($id);
               if($exercice){
                   $exercice -> delete ();
                   return response()->json([
                    'message' =>'Exercice deleted succesfully',
                    'code' => 200,
                    
                   
                ]);

               }else {
                    return response()->json([
                    'message' =>"Exercie with id:$id does not exist",   ]);
               }
           }

           public function updateExercice($id){
               $exercice = Exercice::find($id);
               return response()->json($exercice);
           }

           public function editExercice(){
               $exercice = Exercice::find(request()->id);
               $exercice->title = request()->title;
               $exercice->text = request()->text;
               $exercice->subtext = request()->subtext;
               $exercice->video = request()->video;
               $exercice->categorie = request()->categorie;

               $exercice->update();
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
     
    
