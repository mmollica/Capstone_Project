<?php
class Transaction
{
	private $_db, $_data, $_sessionName, $_cookieName, $_isLoggedIn;

	public function __construct()
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');
	}

	//REGISTER A TRANSACTION IN DATABASE
	public function create($fields = array())
	{
		if(!$this->_db->insert('transaction2', $fields))
		{
			throw new Exception("Cannot create transaction");			
		}
	}

	//LOOK UP Transaction UD, GET ALL DATA FOR Transaction
	public function find($transaction = null)
	{
		if($transaction)
		{
			$field = (is_numeric($transaction)) ? 'id' : 'id';
			$data = $this->_db->get('transaction', array($field, '=', $transaction));

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

		if(!$this->_db->update('transaction', $id, $fields))
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
}



?>