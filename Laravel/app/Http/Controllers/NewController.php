<?php

namespace App\Http\Controllers;

use DB;

use Illuminate\Http\Request ;
use App\Http\Requests ;

class NewController extends Controller
{
    public function InsertIntoDb()
    {
        DB::insert('insert into people (login, password, firstName, lastName, age, email, country) values (?, ?, ?, ?, ?, ?, ?)', ['Admin', 'pass', 'Инна', 'Шутова', 19,'i.schutowa2011@yandex.ru', 'Russia']);
        return 'Должно работать';
    }

    public function SelectFromDB()
    {
    	$result =  DB::select('select * from people where login=?', ['Admin'])[0];
    	/*$mas;
    	foreach ($result as $v) {
    		$mas = $v->age;	
    	}*/
    	return $result->id;
    }

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
            $bool_one = DB::select('select age from people where login=?', [$login]);
            $bool_two = DB::select('select * from people where email=?', [$email]);
            if ($bool_one==null && $bool_two==null)
            {
                DB::insert('insert into people 
                            (login, password, firstName, lastName, email, age, country) 
                            values (?, ?, ?, ?, ?, ?, ?)',
                            [$login, $password, $firstName, $lastName, $email, $age, $country]);
                $result =  DB::select('select * from posts');
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
            $control = DB::select('select * from people where login=?', [$login])[0];
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

     public function loadInform(Request $request)
    {
        $result = null;
        $result =  DB::select('select * from posts');
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
        if ($theme!=null && $text!=null && $login!=null) DB::insert('insert into posts (text, theme, author) values (?, ?, ?)', [$text, $theme, $login]);
        $result =  DB::select('select * from posts');
        return redirect('/')->with('result', $result);
    }



}
