<?php

class Classes
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
	public function get_number_class()
	{	

		$con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");

	    if (!$con)
	        {
	             die('Could not connect: ' . mysqli_error($con));
	        }

	    
	    $query = "SELECT id FROM class ORDER BY `date_added` DESC LIMIT 1"; 
	    $result = mysqli_query($con, $query);
	    $row = mysqli_fetch_assoc($result);
	    $number = $row['id'];

	    if(!$result)
	        {
	        	die(mysqli_error($con));
	        }
		if($number >= 50000000)
		{
			return $number + 1;
		}
		else
			{return 50000000;}
	
	}
	public function get_number_club()
	{	

		$con = mysqli_connect("localhost","mmollica","Thepw164", "capstone_db");

	    if (!$con)
	        {
	             die('Could not connect: ' . mysqli_error($con));
	        }

	    
	    $query = "SELECT id FROM club ORDER BY `date_added` DESC LIMIT 1"; 
	    $result = mysqli_query($con, $query);
	    $row = mysqli_fetch_assoc($result);
	    $number = $row['id'];

	    if(!$result)
	        {
	        	die(mysqli_error($con));
	        }
		if($number >= 60000000)
		{
			return $number + 1;
		}
		else
			{return 60000000;}
	
	}

	//REGISTER A USER IN DATABASE
	public function create1($fields = array())
	{
		if(!$this->_db->insert('class', $fields))
		{
			throw new Exception("Cannot create Class");			
		}
	}
	public function create2($fields = array())
	{
		if(!$this->_db->insert('club', $fields))
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
			$data = $this->_db->get('class', array($field, '=', $user));

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

		if(!$this->_db->update('class', $id, $fields))
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