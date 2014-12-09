<?php

class LoginTest extends TestCase {
    
    public function testLogin() {
        $arr = array('email'=>'arasmit_yamaui@hotmail.com','password'=>'123456');
        $crawler = $this->client->request('POST', '/login',$arr);
        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testLogout() {
        $credentials = array(
            'email' => 'email@4geeks.com.ve',
            'password' => 'miclave'
        );
        Sentry::authenticate($credentials, false);
        $crawler = $this->client->request('GET', '/logout');
        $this->assertTrue($this->client->getResponse()->isOk());
    }
}
