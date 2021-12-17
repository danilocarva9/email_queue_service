<?php
namespace App\Services;

use App\Jobs\SendEmailJob;

class EmailService
{
    public function __construct()
    {
        //
    }
   
    public function send(array $email_data): bool{

        
        $job = (new SendEmailJob($email_data));
        dispatch($job);
        return "Bulk mail send successfully in the background...";
    }
}