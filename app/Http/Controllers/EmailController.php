<?php

namespace App\Http\Controllers;

use App\Services\EmailService;

class EmailController extends Controller
{

    protected $emailService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function sendEmail()
    {
        //$job = (new SendEmailJob());

        $email_data = [
            'subject' => 'assunto',
            'email' => 'danilocarva9@gmail.com',
            'message' => '<p>html do email</p>'
        ];

        $this->emailService->send($email_data);

        // $job = (new SendEmailJob());
        // dispatch($job);
        // return "Bulk mail send successfully in the background...";
    }
}
