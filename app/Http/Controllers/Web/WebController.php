<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Selection;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $data = [];
        $selection = Selection::get();

        for($s = 0 ;$s < $selection->count(); $s++){
            $data['select' . $s+1] = Selection::findOrFail($s+1);
        }

        return view('web.index')->with($data);
    }
}
