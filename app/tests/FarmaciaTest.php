<?php

class FarmaciaTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testSetGet_nombre() {
        $farmacia = new Farmacia();
        $string = "prueba";
        $farmacia->set_nombre($string);
        $this->assertEquals($farmacia->get_nombre(), $string);
    }

    public function testSetGet_slogan() {
        $farmacia = new Farmacia();
        $string = "prueba";
        $farmacia->set_slogan($string);
        $this->assertEquals($farmacia->get_slogan(), $string);
    }

    public function testSetGet_direccion() {
        $farmacia = new Farmacia();
        $string = "prueba";
        $farmacia->set_direccion($string);
        $this->assertEquals($farmacia->get_direccion(), $string);
    }

    public function testSetGet_latitud() {
        $farmacia = new Farmacia();
        $string = "prueba";
        $farmacia->set_latitud($string);
        $this->assertEquals($farmacia->get_latitud(), $string);
    }

    public function testSetGet_longitud() {
        $farmacia = new Farmacia();
        $string = "prueba";
        $farmacia->set_longitud($string);
        $this->assertEquals($farmacia->get_longitud(), $string);
    }

    public function testSetGet_horario() {
        $farmacia = new Farmacia();
        $string = "prueba";
        $farmacia->set_horario($string);
        $this->assertEquals($farmacia->get_horario(), $string);
    }

    public function testSetGet_telefono() {
        $farmacia = new Farmacia();
        $string = "prueba";
        $farmacia->set_telefono($string);
        $this->assertEquals($farmacia->get_telefono(), $string);
    }

    public function testGetDetails() {
        $farmacias = Farmacia::all();
        foreach ($farmacias as $farmacia) {
            $crawler = $this->client->request('GET', '/farmacia/'.$farmacia->slug);
            $this->assertTrue($this->client->getResponse()->isOk());
        }
    }

}
