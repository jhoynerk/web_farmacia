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
        $crawler = $this->client->request('GET', '/admin/index');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

    public function testConectCreate() {
        $crawler = $this->client->request('GET', '/admin/create');

        $this->assertTrue($this->client->getResponse()->isOk());
    }

}
