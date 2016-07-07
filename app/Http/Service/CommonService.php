<?php

namespace App\Http\Service;

use App\Models\System\Config;
use Illuminate\Support\Facades\Auth;

class CommonService
{
    private $enterprise = null;
    private $config = null;

    public function __construct()
    {
        if (Auth::check()) {
            if ($this->enterprise == null) {
                $this->enterprise = Auth::user()->enterprise;
            }
            if ($this->config == null) {
                $this->config = $this->enterprise->config;
            }
        } else {
            return '未登录！';
        }
    }

    public function config($key)
    {
        if ($this->config) {
            return $this->config->$key;
        }
    }

    public function enterprise($key)
    {
        if ($this->enterprise) {
            return $this->enterprise->$key;
        }
    }
}