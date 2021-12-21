<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Contracts\FormRequestInterface;

class Controller extends BaseController implements FormRequestInterface
{
    protected $params;
    public $request;
 
    public function __construct(Request $request)
    {
       $this->params = $request->all();
       $this->request = $request;
    }

    /**
    * Return the Request Object
    *
    * @return \Illuminate\Http\Request
    */
    public function getParams(): Request
    {
      return $this->request->replace($this->params);
    }

}
