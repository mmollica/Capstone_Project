<?php

class Grades
{
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');
	}

	//REGISTER A USER IN DATABASE
	public function create($fields = array())
	{
		if(!$this->_db->insert('grades', $fields))
		{
			throw new Exception("Cannot create Grades");			
		}
	}
}
?>