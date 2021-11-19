<?php

use app\models\repositories\UserRepository;
use PHPUnit\Framework\TestCase;

class UsertTest extends TestCase
{
    public function testUser() {
        $login = 'admin';
        $pass = 125;//= false; 123 = true
        $user = (new UserRepository())->auth($login,$pass);

        $this->assertTrue($user);
    }

}