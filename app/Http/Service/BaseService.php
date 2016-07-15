<?php

namespace App\Http\Service;

use App\Models\System\BaseType;
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
    private $uid = 0;

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
     * 获取企业ID
     * @return mixed
     */
    public function eid()
    {
        if ($this->user) {
            return $this->user->eid;
        }
    }

    /**
     * 获取用户ID
     * @return mixed
     */
    public function uid()
    {
        if ($this->user) {
            return $this->user->id;
        }
    }


    /**
     *获取用户信息
     * @param $key
     * @return mixed
     */
    public function user($key)
    {
        if ($this->user) {
            return $this->user->$key;
        }
    }

    /**
     * 获取用户扩展信息
     * @param $key
     * @return mixed
     */
    public function userinfo($key)
    {
        if ($this->userinfo) {
            return $this->userinfo->$key;
        }
    }

    /**
     * 获取企业信息
     * @param $key
     * @return mixed
     */
    public function enterprise($key)
    {
        if ($this->enterprise) {
            return $this->enterprise->$key;
        }
    }


    /**
     * 获取企业参数配置
     * @param $key
     * @return mixed
     */
    public function config($key)
    {
        if ($this->config) {
            return $this->config->$key;
        }
    }

    /**
     * 根据基础数据标识获取基础数据
     * @param $key
     * @return mixed
     */
    public function data($key)
    {
        $baseType = BaseType::where('code', $key)->first();
        return $baseType;
    }


}