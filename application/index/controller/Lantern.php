<?php
namespace app\index\controller;
use think\Controller;
class User extends Controller
{
    public function toLogin()
    {

        return $this->fetch('user/to_login.html');

    }
}
