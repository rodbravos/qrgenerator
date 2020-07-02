<?php

namespace App\Http\Controllers;

use App\Http\Requests\QrRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function generate(QrRequest $request)
    {
        switch ( $request->type ){
            case 'phone':
                $message = \QrCode::format('svg')
                        ->size(300)
                        ->errorCorrection('H')
                        ->phoneNumber(''.$request->phone_number.'');
                break;

            case 'web':
                $message = \QrCode::format('svg')
                    ->size(300)
                    ->errorCorrection('H')
                    ->generate($request->text_message);
                break;

            case 'sms':
                $message = \QrCode::format('svg')
                    ->size(300)
                    ->errorCorrection('H')
                    ->SMS($request->phone_number, $request->text_message);
                break;
        }


        return view('welcome', compact('message'));

    }
}
