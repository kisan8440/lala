<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function energy_audit()
    {
        return view('energy_audit');
    }
    public function consulting()
    {
        return view('consulting');
    }
    public function electrical_design_and_builds()
    {
        return view('electrical_design_and_builds');
    }
}
