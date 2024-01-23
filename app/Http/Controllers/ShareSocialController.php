<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ShareSocialController extends Controller
{
    public function shareSocial()
    {
        $socialShare = \Share::page(
            'https://saifulphoto.com/aboutsme',
            'Lifestyle Photographer',
        )
        ->facebook()
        ->twitter()
        ->linkedin()
        ->whatsapp();
        
        return view('share-social', compact('socialShare'));
    }
}