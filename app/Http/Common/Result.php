<?php
namespace App\Http\Common;
class Result
{

    public function __construct()
    {
        $this->setCode(0);
    }

    public function setCode($code)
    {
        $this->code = $code;
        switch ($code) {
            case 0:
                $this->msg = '成功';
                break;
            case -1:
                $this->msg = '异常';
                break;

        }
    }

    public function setData($data)
    {
        $this->data = $data;

    }
}