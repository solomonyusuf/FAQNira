<?php

namespace App\Http\Controllers;
use App\Models\DatabaseKey;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Request;
use Carbon\Carbon;

class APIController
{
    public function get_tokens()
    {
        $query_key = DatabaseKey::
        whereDate('approved_date', '=', Carbon::now()->toDate())->first();

        return response()->json([
                $query_key
        ]);

    }

    public function validate_mail(Request $request)
    {
        $user = User::where(['email'=> $request->email])->first();

        return response()->json([
            'data'=> $user ? true : false
        ]);
    }
}
