<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Auth;

class CommonService
{
    private $user = null;
    private $userinfo = null;
    private $enterprise = null;
    private $config = null;

    public function __construct()
    {
        if (Auth::check()) {
            if ($this->user == null) {
                $this->user = Auth::user();
            }
            if ($this->userinfo == null) {
                $this->userinfo = Auth::user()->userinfo;
            }
            if ($this->enterprise == null) {
                $this->enterprise = Auth::user()->enterprise;
            }
            if ($this->config == null) {
                $this->config = $this->enterprise->config;
            }
        }
    }

    public function eid()
    {
        if ($this->user) {
            return $this->user->eid;
        }
    }

    public function user($key)
    {
        if ($this->user) {
            return $this->user->$key;
        }
    }

    public function userinfo($key)
    {
        if ($this->userinfo) {
            return $this->userinfo->$key;
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