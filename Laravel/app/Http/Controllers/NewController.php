<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request ;
use App\Http\Requests ;
use App\persons;
use App\post;
class NewController extends Controller
{
   

    public function DeleteAllPosts()
    {
        DB::delete('delete from posts');
        return 10;
    }

    public function DeleteAllUsers()
    {
        DB::delete('delete from people');
        return 10;
    }

    public function createUser(Request $request)
    {
        $firstName = $request->get('name');
        $lastName = $request->get('lastName');
        $age = $request->get('age');
        $country = $request->get('country');
        $login = $request->get('login');
        $email = $request->get('email');
        $password = $request->get('password');
        $passwordRep = $request->get('confirm_password');
        if ($firstName!=null &&
            $lastName!=null &&
            $age!=null &&
            $country!=null &&
            $login!=null &&
            $email!=null &&
            $password!=null &&
            $passwordRep!=null &&
            $passwordRep==$password)
        {
            $bool_one=null;
            $bool_two=null;
            $bool_one = persons::where('login', $login)->first();
            echo $bool_one;
            $bool_two = persons::where('email', $email)->first();
            echo $bool_two;
            if ($bool_one==null && $bool_two==null)
            {
                $pers = new persons;
                $pers->login = $login;
                $pers->password = $password;
                $pers->firstName = $firstName;
                $pers->lastName = $lastName;
                $pers->email = $email;
                $pers->age = $age;
                $pers->country = $country;
                $pers->save();
                $result =  post::all();
                return View('blog.guest', ['result'=>$result]);
            }
            else
            {
                return View('blog.error');
            }
            
        }
        else
        {
            return View('blog.error');
        }
    }

   

    public function tryAuth(Request $request)
    {
        $login = $request->get('login');
        $password = $request->get('password');
        if ($login!=null && $password!=null)
        {
            $control=null;
            $control = persons::where('login', [$login])->first();
  //          DB::select('select * from people where login=?', [$login])[0];
            if ($password==$control->password)
            {
                return redirect()->action('NewController@loadInform', ['login'=>$login]);
            }
            else
            {
                return View("blog.error");
            }
        }
    }


    // public function loadInform(){


    //     $pers = persons::all();

    //     foreach ($pers as $per) {
    //       echo $per->login;
    //   }
    // }
     public function loadInform(Request $request)
    {
        $result = null;
        $result =  post::all();
        $login=null;
        $login = $request->get('login');

        if ($login!=null)
        {
            return View('blog.authUsers', ['result'=>$result]);
        }
        else
        {
            return View('blog.guest', ['result'=>$result]);
        }
    }

    public function createPost(Request $request)
    {
        $theme = $request->get('Theme');
        $text = $request->get('Text');
        $login = $request->get('Login');
        if ($theme!=null && $text!=null && $login!=null) 
        {
            $post = new post();
            $post->text = $text;
            $post->theme = $theme;
            $post->author = $login;
            $post->save();
        }
        
        $result =  post::all();
        return redirect()->action('NewController@loadInform', ['login'=>$login]);
    }



}
