<?php
namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return redirect()->to('admin/dashboard')->with('message', 'You are Login as Admin!');
    }

    public function Dashboard()
    {

        return view('modules.dashboard.index');
    }

    public function AccountSetting()
    {

        return view('modules.auth.account-setting');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'old_password'          => 'required|min:6',
            'password'              => 'required|min:8',
            'password_confirmation' => 'required|same:password|min:8',
        ]);
        $data = $request->all();
        $id   = auth()->user();
        if (Hash::check($data['old_password'], $id->password) == true) {
            $id->password = Hash::make($data['password']);
            $id->save();
            return redirect()->back()->with('success', 'Password Update Successfully...!!');
        } else {
            return redirect()->back()->with('message', 'Old password does not match');
        }
    }

    public function update_profile(Request $request)
    {

        $id = auth()->user();

        if ($request->avatar) {
            $id->image = $this->sendimagetodirectory($request->avatar);
        }
        $id->name  = $request->name;
        $id->phone = $request->phone;
        $id->save();

        return redirect()->back()->with('success', 'Profile Update Successfully...!!');

    }

    public static function sendimagetodirectory($imagename)
    {

        $file = $imagename;

        $filename = rand() . '.' . $file->getClientOriginalExtension();

        $file->move(public_path('assets/customer'), $filename);

        return $filename;

    }
}
