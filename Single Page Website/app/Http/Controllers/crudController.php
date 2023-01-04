<?php

namespace App\Http\Controllers;
use App\Models\setup;
use App\Models\category;


use Illuminate\Http\Request;


//use Illuminate\Support\Facades\Request;

use DB;
use Session;



class crudController extends Controller
{ 
    

    public function insertData(Request $request){

        /* $this->validate($request,['logo'=>'required',
    
        'meta_title'=>'required|max:100|min:4',
        'address'=>'required|max:100|min:4',
        'contact'=>'required|max:30|min:4',
        'email'=>'required|email|unique:setups',
        
        ]); */


        
           $data = $request->except('_token','submit');
            $tbl=decrypt($data['tbl']);
            unset ($data['tbl']);

            If ($request->has('social')){
                $data['social']=implode(',',$data['social']);
            }
            If(!empty($data['logo'])){
                if($request->hasFile('logo')){
                    $data['logo']=$this->upload($data['logo'],$tbl); 
                }
            }

            If($request->has('title')){
                $data['slug']=$this->slug($data['title']);
            }



            $data['created_at'] = date('Y-m-d H:i:s');
            DB::table($tbl)->insert($data);
            session::flash('message','Data inserted successfully!!!');
            return redirect()->back();
        
         
    }

    private function slug($string){
        
            $string= strtolower(trim($string)); 
            $string =preg_replace('/\s+/','-',$string);
            $string =preg_replace('/[^a-z0-9-]/','-',$string);
            $string =preg_replace('/-+/','-',$string);
             return rtrim($string,'-');


      
        return redirect()->back()->with('message','New data successfully inserted');
     

        //$request['slug']=$this->slug($request['title']);
        

       // $string= strtolower(trim($string)); 
       // $string =preg_replace('/\s+/','-',$string);
       // $string =preg_replace('/[^a-z0-9-]/','-',$string);
       // $string =preg_replace('/-+/','-',$string);
       // return rtrim($string,'-');
    }




    private function upload($logo,$tbl){
       
            $name=$logo->GetClientOriginalName();
            $newName=date('ymdgis').$name;
            $logo->move(public_path().'/'.$tbl,$newName);
            return $newName;
        }


        public function updateData(Request $request){

            
               $data = $request->except('_token','submit');
                $tbl=decrypt($data['tbl']);
                unset ($data['tbl']);
    
                If ($request->has('social')){
                    $data['social']=implode(',',$data['social']);
                }
                If(!empty($data['logo'])){
                    if($request->hasFile('logo')){
                        $data['logo']=$this->upload($data['logo'],$tbl); 
                    }
                }
    
                If($request->has('title')){
                    $data['slug']=$this->slug($data['title']);
                }
    
    
    
                $data['updated_at'] = date('Y-m-d H:i:s');
                DB::table($tbl)->where(key($data),reset($data))->update($data);
                session::flash('message','Data updated successfully!!!');
                return redirect()->back();
            
             
        }
        
       


    }


    

       


         /* setup::create([
            //dd($students);
    
        'image'=> $request->logo,
        'meta_title'=> $request->meta_title,
        'address'=> $request->address,
        'contact'=> $request->contact,
        'email'=> $request->email,

        
        'social[]'=> $request->social,
        'created_at'=> now(),
        ]);
*/

        

/*$setup=setup::all();
        
//dd($setup);



session::flash('message','Data inserted successfully!!!');
return redirect()->back()->with('message','New data successfully inserted');*/



        
    
    
        
          /*  $data = $request->except('_token','submit');
            print_r($data);
            $tbl=decript($data['tbl']);
            unset ($data['tbl']);

            If($request->has('socials')){
                $data['social'] = implode(',',$data['social']);
            }
            $data['slug'] = $this->slug($data['title']);
            $data['created_at'] = date('Y-m-d H:i:s');
            DB::table($tbl)->insert($data);
            session::flash('message','Data inserted successfully!!!');
            return redirect()->back()->with('message','New data successfully inserted');
        
*/


    
    

