<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController
{
    public static function UploadFile(Request $request, string $type)
    {
        if($type == 'image')
        {
            $client = $request?->image->getClientOriginalExtension();

            if ($client == 'pdf' || $client == 'doc' || $client == 'jpg' || $client == 'png' || $client == 'jpeg') {
                $file = asset('Staticfiles/'.rand(00001, 10000) . time() . '.' . request()->image->getClientOriginalName());
                request()->image->move(public_path('Staticfiles'), $file);

                return $file;
            }
        }

    }
}
