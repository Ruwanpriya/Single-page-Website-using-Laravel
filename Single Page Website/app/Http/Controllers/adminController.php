<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use session;
use DB;

class adminController extends Controller
{
    public function __construct(){


    }

    public function admin(){
        return view('insert.dashboard');
    }

    public function setup(){
        $data=DB::table('setups')->first();
        if(!empty($data)){
            $socials=explode(',',$data->social);
        }else{
            $socials=[];
        }
        return view('insert.setup',['data'=>$data,'socials'=>$socials]);
    } 
 


    public function categories (){
        $data =DB::table('categories')->get();
        return view('insert.category',['data'=>$data]);
    }

    public function deleteCategory($id){
        $data=DB::table('categories')->where('cid',$id)->delete();
        return redirect()->back()->with('message','Data deleted successfully');
    }

    public function editCategory($id){
        $data =DB::table('categories')->get();
        $maindata=DB::table('categories')->where('cid',$id)->first();
        if($maindata){
            return view('insert.editCategory',['data'=>$data,'maindata'=>$maindata]);
        }
        else{
            return view('insert.category',['data'=>$data]);
        }
    }





    public function newpost (){
        $cats =DB::table('categories')->where('status','on')->get();
        return view('insert.newpost',['cats'=>$cats]);
    }

    public function allposts (){
        $data =DB::table('contents')->get();
        return view('insert.posts',['data'=>$data]);
    }

    public function allservices (){
        $data =DB::table('services')->get();
        return view('insert.all-services',['data'=>$data]);
    }

    public function editPost($id){
        $cats =DB::table('categories')->where('status','on')->get();
        $data =DB::table('contents')->where('conid',$id)->first();
        return view('insert.editpost',['data'=>$data,'cats'=>$cats]);
    }
    public function deletePost($id){
        $data=DB::table('contents')->where('conid',$id)->delete();
        return redirect()->back()->with('message','Data deleted successfully');
    }


    public function newservice (){
        return view('insert.service');
    }

    public function editService($id){
        $cats =DB::table('categories')->where('status','on')->get();
        $data =DB::table('services')->where('sid',$id)->first();
        return view('insert.edit-service',['data'=>$data,'cats'=>$cats]);
    }

    public function deleteSE($id){
        $data=DB::table('services')->where('sid',$id)->delete();
        return redirect()->back()->with('message','Data deleted successfully');
    }
   



    public function portcats(){
        $data =DB::table('portcats')->get();
        return view('insert.portfolio-category',['data'=>$data]);
    }

    public function portfolio (){
        $cats =DB::table('portcats')->where('status','on')->get();
        return view('insert.portfolio',['cats'=>$cats]);
    }

    public function clientall(){
        $data =DB::table('clients')->get();
        return view('insert.client',['data'=>$data]);
    }
    public function editClient($id){
        $data =DB::table('clients')->get();
        $maindata=DB::table('categories')->where('cid',$id)->first();
        if($maindata){
            return view('insert.editCategory',['data'=>$data,'maindata'=>$maindata]);
        }
        else{
            return view('insert.category',['data'=>$data]);
        }
    }


    public function newMember(){
        return view('insert.team');
    }


    public function allmembers (){
        $data =DB::table('teams')->get();
        return view('insert.all-team',['data'=>$data]);
    }

    public function editmember($id){
        $data =DB::table('teams')->where('tid',$id)->first();
        if(!empty($data)){
            $socials=explode(',',$data->social);
        }else{
            $socials=[];
        }
        return view('insert.edit-team',['data'=>$data,'socials'=>$socials]);
    }

    public function deleteteam($id){
        $data=DB::table('teams')->where('tid',$id)->delete();
        return redirect()->back()->with('message','Data deleted successfully');
    }


}




