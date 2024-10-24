<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\Employee1;
use Session;
use App\Models\User;
use Hash;  

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){

            $query = DB::table('employees_1')
                ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating');
            foreach (['employees_2', 'employees_3'] as $table) {
                $subQuery = DB::table($table)
                    ->select('id', 'name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating');

                $query->unionAll($subQuery);
            }
        
            $employees = DB::table(DB::raw("({$query->toSql()}) as temp_table"))
                ->mergeBindings($query)  
                ->paginate(10);
 
            return view('employees.index', compact('employees', 'employees'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function logout() 
    {

        Session::flush();
        Auth::logout();
        return Redirect('login');
    }


}