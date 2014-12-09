<?php

class CRUDTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample() {
        $crawler = $this->client->request('GET', '/');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testConectIndex() {
        $crawler = $this->client->request('GET', '/farmacias/index');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testConectCreate() {
        $crawler = $this->client->request('GET', '/farmacias/create');

        $this->assertTrue($this->client->getResponse()->isOk());
    }
    
    public function testConectImages() {
        $crawler = $this->client->request('GET', '/imagenes/create/1');

        $this->assertTrue($this->client->getResponse()->isOk());
    }
    
    public function testViewImages() {
        $crawler = $this->client->request('GET', '/farmacias/images/1');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

}
