<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Cyber;
use App\User;
use Session;



class CyberController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function admin()
    {
        $this->middleware('admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function add()
    {
        $result = DB::table ('users') -> get ();
        return view ('pages.user', ["totals"=>$result]); 
    }
    
    public function rest(){
        
        if(!empty(Input::get('select'))){
            $prm = Input::get('select');

            $url='http://192.168.20.122:8979/monitoring-cyberpatrol/monitoring-cyberpatrol/get-all?id_category='.$prm;
            
            
        }else{
            $url = 'http://192.168.20.122:8979/monitoring-cyberpatrol/monitoring-cyberpatrol/get-all?id_category=1';
            $prm = '';
        }

        // return $prm;

        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $datax = json_decode($response, true);
        $err = curl_error($curl);
        $data = array("hasil"=>$datax,"prm"=>$prm);
        // return $datax[0];
        return view ('pages.content',$data);
    }

    public function cate()
    {
         $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://103.75.25.62:8119/api/v2/categori',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $datax = json_decode($response, true);
        $err = curl_error($curl);
        $data = array("cates"=>$datax);
        // return $datax;
        return view ('pages.content',$data);


    }
    
    public function destroy($id)
    {
        // return $id;
        $user = User::findOrfail($id);
        $user->delete();
  
        Session::flash('flash_messagse','Suscces Deleted');
        return redirect ('/user');

    }

    public function users()
    {
        // $aktivitas= DB::get('aktivitas');
        // return view('beranda', ['beranda' => $aktivitas]);
       $users= Input::all(); 
        $users= new User;

        $name= Input::get('name');
        $email= Input::get('email');
        $password= bcrypt (Input::get('password'));
        $level= Input::get('level');

        // $users = bcrypt(Input::get('password'));

        $users -> name = $name; 
        $users -> email = $email;
        $users -> password = $password;
        $users -> level = $level;
        $users -> save();
        \Session::flash('flash_message','successfully saved.');
        $result = DB::table ('users') -> get ();
        return view ( 'pages.user', ["totals"=>$result]);

       
    }
    public function form()
    {
        return view ('pages.form'); 
    }

    public function modal()
    {
        return view ('pages.modal'); 
    }
    public function kategory()
    {
        // $aktivitas= DB::get('aktivitas');
        // return view('beranda', ['beranda' => $aktivitas]);
        $kategory= new Category;

        $category= Input::get('category');

        $users -> category = $category; 
   
        $users -> save();
        // \Session::flash('flash_message','successfully saved.');
        // $result = DB::table ('users') -> get ();
        // return view ( 'pages.user', ["totals"=>$result]);

       
    }
}

