# social-share

Step 1: Install Laravel Project
composer create-project --prefer-dist laravel/laravel social-share

Step 2 : Install "jorenvanhocht/laravel-share" Package
In this step, You have to need jorenvanhocht/laravel-share package. So let's open terminal and run bellow composer command:
composer require jorenvanhocht/laravel-share

Run succefully above command then after open config/app.php and put the bellow code.

config/app.php
'aliases' => [
    'Share' => Jorenvh\Share\ShareFacade::class,
]

Now publish config file using bellow command so lets open terminal and run bellow command:

php artisan vendor:publish --provider="Jorenvh\Share\Providers\ShareServiceProvider"


Step 3 : Add Route
now, we need to add route for share social in laravel application. so open your "routes/web.php" file and add following route.

route/web.php

use App\Http\Controllers\ShareSocialController;

Route::get('/share-social', [ShareSocialController::class,'shareSocial']);

Step 4 : Create Controller

Here this step now we should create new controller as ShareSocialController. So run bellow command and create new controller.

php artisan make:controller ShareSocialController

app/http/controller/ShareSocialController.php

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ShareSocialController extends Controller
{
    public function shareSocial()
    {
        $socialShare = \Share::page(
            'https://www.nicesnippets.com/blog/laravel-custom-foreign-key-name-example',
            'Laravel Custom Foreign Key Name Example',
        )
        ->facebook()
        ->twitter()
        ->reddit()
        ->linkedin()
        ->whatsapp()
        ->telegram();
        
        return view('share-social', compact('socialShare'));
    }
}


Step 5 : Create Blade File
In last step. we have to create blade file for list of social button. So finally you have to create following file and put bellow code:

/resources/views/share-social.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>How to Add Share Social Media Button in Laravel - saifulphoto.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
        li{
            list-style: none;
            background: #e2e2e2;
            margin-left: 5px;
            text-align: center;
            border-radius:5px;
        }
        li span{
            font-size: 20px;
        }
        ul li{
            display: inline-block;
            padding: 10px 10px 5px;
        }
        #social-links{
            float: left;
        }
    </style>
</head>
<body>
    <div class="row mt-5">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5>How to Add Share Social Media Button in Laravel - saifulphoto.com</h5>
                </div>
                <div class="card-body">
                    <strong class="float-left pt-2">Social Media : </strong>
                    {!! $socialShare !!}
                </div>
            </div>
        </div>
    </div>
</body>
</html>

Now we are ready to run our example so run bellow command for quick run:

php artisan serve

Now you can open bellow URL on your browser:

http://localhost:8000/share-social

It will help you...
