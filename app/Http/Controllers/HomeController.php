<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Validator,Str;

class HomeController extends Controller
{
    public function getIndex()
    {
        return view('home');
    }

    public function postUpload(Request $request)
    {
        $rules = ['file' => 'required'];
        $message = ['files.required' => 'El archivo es requerido'];

        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error');
        else:
            $path = date('Y/m/d');
            //$original_name = $request->file('file')->getClientOriginalName();
            $final_name = Str::slug($request->file('file')->getClientOriginalName().'_'.time()).'.'.trim($request->file('file')->getClientOriginalExtension());
            $request->file->storeAs($path,$final_name,'public');

        endif;
    }
}
