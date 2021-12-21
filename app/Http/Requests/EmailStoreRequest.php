<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailStoreRequest extends Controller
{

    public function __construct(Request $request)
    {
        $this->validate($request, [
            'from' => 'required',
            'reply_to' => 'required|email'
        ]);

        parent::__construct($request);
    }
  
}