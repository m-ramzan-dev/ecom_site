<?php



namespace App\Http\Controllers;



use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $user = User::where(["email" => $request->email, "password" => $request->password])->first();
        if (empty($user)) {
            $request->session()->flash('error', 'Credentails are not valid.');
            return view('login');
        }
        if ($user->role == "user") {
        } else if ($user->role == "admin") {
            $request->session()->put('login', true);
            $request->session()->put('user', $user);
            return redirect('admin/dashboard');
            //return view('admin.dashboard');
        }
        return $user;
    }
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }
}
