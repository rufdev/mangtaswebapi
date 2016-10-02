<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Case;
class CasesController extends BaeController
{
    //
    public function index(')
    {
    	# code...
    	return $this->response->array(Case::all());
    }
}
