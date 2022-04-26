<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;

class UserController extends Controller {

    public function profile_page() {
        if(!Auth::check()) return redirect("/")->withErrors("Вы не авторизованы", "message");

        $user_id = Auth::id();

        $app = DB::table("applications")->where("user_id", $user_id)->orderby("created_at", "DESC")->get();

        $categories = DB::table("categories")->get();

        return view("profile", [
            "app" => $app,
            "categories" => $categories
        ]);
    }

    public function app_add(Request $request) {
        if(!Auth::check()) return redirect("/")->withErrors("Вы не авторизованы", "message");

        $validator = Validator::make($request->all(), [
            "image" => "required|mimes:jpeg,jpg,bmp,png|max:10240"
        ]);
        if($validator->fails())
            return redirect("/profile")->withErrors("Файл должен быть изображением с расширениями jpg, jpeg, png, bmp и весить не более 10мб", "message");

        $image_name = "1_". time() ."_". rand() .".". $request->file("image")->extension();
        $request->file("image")->move(public_path("assets/images/before/"), $image_name);
        $path = "images/before/". $image_name;

        DB::table("applications")->insert([
            "user_id" => Auth::id(),
            "title" => $request->input("title"),
            "description" => $request->input("description"),
            "category" => $request->input("category"),
            "path_image_before" => $path,
            "status" => "Новая"
        ]);

        return redirect("/profile")->withErrors("Заявка добавлена", "message"); 

    }

    public function app_delete($app_id) {
        if(!Auth::check()) return redirect("/")->withErrors("Вы не авторизованы", "message");

        if(!$app = DB::table("applications")->where("application_id", $app_id)->first())
            return redirect("/profile")->withErrors("Такой заявки не существует", "message");

        if($app->status != "Новая") 
            return redirect("/profile")->withErrors("Можно удалять заявки только со статусом \"Новая\"", "message");

        if($app->user_id != Auth::id())
            return redirect("/profile")->withErrors("Это не ваша заявка", "message");

        DB::table("applications")->where("application_id", $app_id)->delete();

        return redirect("/profile")->withErrors("Заявка удалена", "message");
    }

}
