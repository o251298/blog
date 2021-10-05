<?php

namespace App\Http\Controllers;
use App\Mail\ResetPassword;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(LoginRequest $request){
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password]))
        {
            return redirect()->route('profile');
        }
        return redirect(route('login'))->withErrors([
            'username' => 'Неверные данные для входа'
        ]);
;    }
    public function register(RegisterRequest $request){
        $user = User::create([
            'username' => $request->username,
            'password' => $request->password,
            'email' => $request->email,
            'token' => Str::random(60),
        ]);
        if ($user){
            Auth::login($user);
            return redirect('/');
        }
    }

    public function profile(){
        $user = User::find(Auth::user()->id);
        $posts = $user->posts()->get();
        return view('user.my_posts', [
            'posts' => $posts
        ]);
    }
    public function newPassword(Request $request){
        $user = User::where('email', '=', $request->email)->first();

        if (isset($user->username)){
            $new_password = User::newPassword();
            $user->password = $new_password;
            Mail::to($user->email)->send(new ResetPassword($user->username, $new_password));
            Log::debug($new_password);
            $user->save();
            return redirect(route('login'))->withErrors(['reset_password_success' => 'Вам на почту выслано новый пароль!']);

        } else {
            return redirect(route('reset_password'))->withErrors(['email' => "Неверный емайл"]);
        }
    }
}
