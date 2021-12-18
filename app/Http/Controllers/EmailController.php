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
        $email = new Email();
        $email->fill($request->all());
        $this->emailService->handleRequest($email);
        return response()->json($email);
    }
}
