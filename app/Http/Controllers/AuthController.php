<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class AuthController extends Controller {

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            "login" => "required|unique:users,login"
        ]);
        if($validator->fails())
            return redirect("/")->withErrors("Такой логин уже есть", "message");

        DB::table("users")->insert([
            "fio" => $request->input("fio"),
            "email" => $request->input("email"),
            "login" => $request->input("login"),
            "password" => bcrypt($request->input("password")),
            "role" => "user"
        ]);

        return redirect("/")->withErrors("Вы зарегистрировались", "message");
    }

    public function login(Request $request) {
        $login = $request->input("login");
        $password = $request->input("password");
        if(Auth::attempt(["login" => $login, "password" => $password], true))
            return redirect("/profile");
        else return redirect("/")->withErrors("Ошибка логина или пароля", "message");
    }

    public function logout() {
        if(Auth::check()) {
            Auth::logout();
            return redirect("/")->withErrors("Вы вышли", "message");
        } else return redirect("/")->withErrors("Вы не авторизованы", "message");
    }

}
