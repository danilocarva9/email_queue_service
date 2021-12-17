<?php
namespace App\Services;

use App\Jobs\SendEmailJob;
use App\Models\Email;

class EmailService
{
    public function __construct()
    {
        //
    }
   
    public function send($email)
    {

       //Manual sending

        // $job = (new SendEmailJob($email));
        // dispatch($job);
        // return true;
    }


    public function handleRequest(array $email, $method = 'queue')
    {
        if($method == 'queue'){
            $job = (new SendEmailJob($email));
            dispatch($job);
        }else{
            $this->send($email);
        }
    }
}