<?php

namespace App\Http\Controllers;
use App\Mail\Mailtrap;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(){

    Mail::to('sumit.sri0607@gmail.com')->send(new Mailtrap());
}

}

