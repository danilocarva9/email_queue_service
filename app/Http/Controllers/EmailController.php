<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use Illuminate\Http\Request;
use App\Models\Email;

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

    public function sendEmail(Request $request)
    {
        $email = $request->all();
        $method = env('MAIL_SEND_TYPE');
        $this->emailService->handleRequest($email, $method);
        return response()->json($email);
    }
}
