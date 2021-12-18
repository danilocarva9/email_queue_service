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

    public function handleRequest(Email $email)
    {
        $emailAttributes = $email->getAttributes();
        $email->save();
        $job = (new SendEmailJob($emailAttributes));
        dispatch($job);
    }
}