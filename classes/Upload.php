<?php

class Upload
{
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($upload = null)
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		
	}
	
	//REGISTER A USER IN DATABASE
	public function createstudent($fields = array())
	{
		if(!$this->_db->insert('studentupload', $fields))
		{
			throw new Exception("Cannot create Upload");			
		}
	}
	public function createassignment($fields = array())
	{
		if(!$this->_db->insert('assignment', $fields))
		{
			throw new Exception("Cannot create Upload");			
		}
	}



	public function update($fields = array(), $id = null)
	{
		if(!$id && $this->isLoggedIn())
		{
			$id = $this->data()->id;
		}

		if(!$this->_db->update('studentupload', $id, $fields))
		{
			throw new Exception('There was a problem updating.');
		}
	}

	public function exists()
	{
		return (!empty($this->_data)) ? true : false;
	}

	public function logout()
	{
		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);

		$this->_db->delete('users_session', array('user_id', '=', $this->data()->id));
	}

	public function data()
	{
		return $this->_data;
	}

	public function isLoggedIn()
	{
		return $this->_isLoggedIn;
	}
}