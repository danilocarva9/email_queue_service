<?php

namespace App\Http\Controllers;

use App\Services\EmailService;
use App\Http\Requests\EmailStoreRequest;
use App\Models\Email;

class EmailController extends Controller
{

    protected $emailService;
    protected $params;
    public $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EmailService $emailService)
    {
        $this->emailService = $emailService;
    }

    public function sendEmail(EmailStoreRequest $request)
    {
        // $this->validate($request, [
        //     'from' => 'required',
        //     'reply_to' => 'required|email'
        // ]);

        dd($request);
        
        $email = new Email();
        $email->fill($this->request->all());
        $this->emailService->handleRequest($email);
        return response()->json($email);
    }
}
