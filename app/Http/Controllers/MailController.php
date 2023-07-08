<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(){
        $data=array('name'=>'boopalan');
        Mail::send(['text'=>'mail'],$data,function($message){
       $message->to('oxtony29@gmail.com','boopalan')->subject('100 va venu');
      $message->from('shivaramm29@gmail.com','sivadharshan');
        });
        echo "Email is sent";
    }
    public function attachMail(){
        $data=array('name'=>'boopalan');
        Mail::send(['text'=>'mail'],$data,function($message){
       $message->to('oxtony29@gmail.com','boopalan')->subject('my photo');
       $message->attach('C:\Users\subha\testing_app\public\uploads\public/uploads/IMG_20220101_221955.jpg');
      $message->from('shivaramm29@gmail.com','sivadharshan');
        });
        echo "Email is sent";
    }
    public function htmlMail(){
        $data=array('name'=>'boopalan');
        Mail::send('mail',$data,function($message){
       $message->to('oxtony29@gmail.com','boopalan')->subject('this is html mail');
      $message->from('shivaramm29@gmail.com','sivadharshan');
        });
        echo "Email is sent";
    }
}
