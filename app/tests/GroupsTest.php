<?php

class GroupsTest extends TestCase {

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testSetGet_name() {
        $gruoups = new gruoups();
        $string = "prueba";
        $gruoups->set_name($string);
        $this->assertEquals($gruoups->get_name(), $string);
    }

}
