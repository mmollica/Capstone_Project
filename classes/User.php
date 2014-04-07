<?php

class User
{
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$user)
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
		}
	}
	public function get_number($groups)
	{	

		$con = mysqli_connect("localhost","host","test", "capstone_db");

	    if (!$con)
	        {
	             die('Could not connect: ' . mysql_error());
	        }

	    
	    $query = "SELECT id FROM users WHERE groups='" . $groups ."' ORDER BY `date_added` DESC LIMIT 1"; 
	    $result = mysqli_query($con, $query);
	    $row = mysqli_fetch_assoc($result);
	    $number = $row['id'];

	    if(!$result)
	        {
	        	die(mysqli_error($con));
	        }

		switch($groups)
		{
			case '1':
				if($number >= 10000000)
				{
					return $number + 1;
				}
				else
					{return 10000000;}
			break;
			case '2':
				if($number >= 20000000)
				{
					return $number + 1;
				}
				else
					{return 20000000;}
			break;
			case '3':
				if($number >= 30000000)
				{
					return $number + 1;
				}
				else
					{return 30000000;}
			break;
			case '4':
				if($number >= 40000000)
				{
					return $number + 1;
				}
				else
					{return 40000000;}
			break;
			
			break;
			default:
				return 00000000	;
			break;
		}
	}

	//REGISTER A USER IN DATABASE
	public function create($fields = array())
	{
		if(!$this->_db->insert('users', $fields))
		{
			throw new Exception("Cannot create User");			
		}
	}

	//LOOK UP USERNAME, GET ALL DATA FOR USER
	public function find($user = null)
	{
		if($user)
		{
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));

			if($data->count())
			{
				$this->_data = $data->first();
				return true;
			}
		}

		return false;
	}

	//LOGIN FUNCTION ACTUAL
	public function login($username = null, $password = null, $remember = false)
	{
		$user = $this->find($username);

		if(!$username && !$password && $this->exists())
		{
			Session::put($this->_sessionName, $this->data()->id);
		}
		else
		{
				
			if($user)
			{
				if($this->data()->password === Hash::make($password, $this->data()->salt))
				{
					Session::put($this->_sessionName, $this->data()->id);

					if($remember)
					{
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

						if(!$hashCheck->count())
						{
							$this->_db->insert('users_session', array('user_id' => $this->data()->id, 'hash' => $hash));
						}
						else
						{
							$hash = $hashCheck->first()->hash;
						}

						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}

					return true;
				}
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

		if(!$this->_db->update('users', $id, $fields))
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