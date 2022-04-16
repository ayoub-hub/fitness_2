<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function SaveCoach(Request $request){
        $file_extension =$request -> photo -> getClientOriginalExtension();
         $file_name =time().'.'.$file_extension;
         $path ='images';
         $request -> photo -> move($path,$file_name);

    $coach = new Coach();
        
        $coach->name = request()->name;
        $coach->text = request()->text;
        $coach->subtext = request()->subtext;
        $coach->specialite = request()->specialite;
        $coach->age = request()->age;
        $coach->photo = $file_name;
        $coach->save();
        return response()->json([
            'message' =>'Coach created succesfully',
            'code' => 200,
            
        ]);
}

public function getCoach(){
    $coach = Coach::all();
    return response()->json(
        
      $coach
        );
       }
      
       public function deleteCoach($id){
           $coach = Coach:: find($id);
           if($coach){
               $coach -> delete ();
               return response()->json([
                'message' =>'Coach deleted succesfully',
                'code' => 200,
                
               
            ]);

           }else {
                return response()->json([
                'message' =>"Coach with id:$id does not exist",   ]);
           }
       }

       public function updateCoach($id){
           $coach = Coach::find($id);
           return response()->json($coach);
       }

       public function editCoach(){
           $coach = Coach::find(request()->id);
           $coach->name = request()->name;
           $coach->text = request()->text;
           $coach->subtext = request()->subtext;
           $coach->photo = request()->photo;
           $coach->age = request()->age;
           $coach->specialite = request()->specialite;
           $coach->update();
           return 'ok';

       }
}
