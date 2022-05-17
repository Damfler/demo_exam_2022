<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class MainController extends Controller {

    public function main_page() {
        $count = DB::table("applications")->where("status", "Одобрена")->count();
        $app = DB::table("applications")->where("status", "Одобрена")->orderby("created_at", "DESC")->limit(4)->get();
        return view("index", [
            "count" => $count,
            "app" => $app
        ]);
    }

}
