<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        return $this->middleware('isAdmin');
        return $this->middleware('auth');
    }

    public function index($id){
        $setting = Setting::find($id);
        return view('admin.setting.index', compact('setting'));
    }
   
}
