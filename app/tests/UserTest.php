<?php

class UsersTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */

	public function testSetGet_first_name()
	{
		$users = new users();
		$string = "prueba";
		$users->set_first_name($string);
		$this->assertEquals($users->get_first_name(),$string);
	}

	public function testSetGet_last_name()
	{
		$users = new users();
		$string = "prueba";
		$users->set_last_name($string);
		$this->assertEquals($users->get_last_name(),$string);
	}

	public function testSetGet_password()
	{
		$users = new users();
		$string = "prueba";
		$users->set_password($string);
		$this->assertEquals($users->get_password(),$string);
	}

	public function testSetGet_email()
	{
		$users = new users();
		$string = "prueba@4geeks.com.ve";
		$users->set_email($string);
		$this->assertEquals($users->get_email(),$string);
	}


}