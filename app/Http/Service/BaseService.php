<?php

namespace App\Http\Service;

use Illuminate\Support\Facades\Auth;

/**
 * 基础服务
 * @package App\Http\Service
 */
class BaseService
{
    private $user = null;
    private $userinfo = null;
    private $enterprise = null;
    private $config = null;
    private $eid = 0;

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

    /**
     * @return int
     */
    public function eid()
    {
        if ($this->user) {
            $this->eid = $this->user->eid;
        }
        return $this->eid;
    }


    public function user($key = null)
    {
        if ($this->user) {
            if ($key == null) {
                return $this->user;
            }
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