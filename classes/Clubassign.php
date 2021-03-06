<?php

class Clubassign
{
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		/*if(!$user)
		{
			if(Session::exists($this->_sessionName))
			{
				$user = Session::get($this->_sessionName);

				if($this->find($user))
				{
					$this->_isLoggedIn = true;
				}
				else
				{
					//process Logout
				}
			}
		}
		else
		{
			$this->find($user);
		}*/
	}

	//REGISTER A USER IN DATABASE
	public function create($fields = array())
	{
		if(!$this->_db->insert('clubassign', $fields))
		{
			throw new Exception("Cannot create Club");			
		}
	}

	//LOOK UP USERNAME, GET ALL DATA FOR USER
	public function find($user = null)
	{
		if($user)
		{
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('clubassign', array($field, '=', $user));

			if($data->count())
			{
				$this->_data = $data->first();
				return true;
			}
		}

		return false;
	}

	

	public function update($fields = array(), $id = null)
	{
		if(!$id && $this->isLoggedIn())
		{
			$id = $this->data()->id;
		}

		if(!$this->_db->update('club', $id, $fields))
		{
			throw new Exception('There was a problem updating.');
		}
	}

	public function exists()
	{
		return (!empty($this->_data)) ? true : false;
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