<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SideNavbarController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
      }
      public function sideNavbar() {
        return view('admin.side_navbar');
      }
}
