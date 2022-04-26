<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller {

    public function main_page() {
        $count = DB::table('applications')->where('status', 'Одобрено')->count();
        $app = DB::table('applications')->where('status', 'Одобрено')->limit(4)->get();
        return view('index', [
            'count' => $count,
            'app' => $app
        ]);
    }

}
