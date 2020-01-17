<?php

namespace App\Http\Controllers;

use App\Consult;
use Illuminate\Http\Request;

class ConsultController extends Controller
{

    public function show(Consult $consult)
    {
        if(!empty($consult)){
//            return $consult;
            return view('admin.pages.application.consult_preview')->with('form', $consult);
        }

        return back()->withErrors(array('error'=>'Records Not Found'));
    }


    public function destroy(Consult $consult)
    {
        if(!empty($consult)){
            $consult->delete();
            return back()->withMessage('Record has been deleted');
        }

        return back()->withErrors(array('error'=>'Records Not Found'));
    }
}
