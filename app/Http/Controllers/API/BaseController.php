<?php
namespace App\Http\Controllers\API;

use App\Http\Common\Result;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public $pageSize = 15;
    public $result;

    public function __construct()
    {
        $this->result = new Result();;
    }
}
 