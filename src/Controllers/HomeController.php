<?php

namespace XmtApp\Module\Administration\Controllers;

use XmtApp\Http\Controller;

class HomeController extends Controller {

    public function home()
    {
        return view('admin::home');
    }
}