<?php
session_start();
/**
* Login Class
*/
class Login
{
	
	private $userDAO;

	function __construct()
	{
		$connection = new DBConnection();
		$userDAO = new UserDAO($connection);

		$this->userDAO = $userDAO;
	}

	public function loginUser($email, $password)
	{
		
		$userSearched = $this->userDAO->searchByEmailPassword($email, $password);

		if (is_null($userSearched)) {
			$_SESSION["l_danger"] = "Invalid Email or Password.";
			return false;
		}else{
			$_SESSION['email'] = $userSearched['email'];
			$_SESSION["l_success"] = 'User Logged In. Welcome.';

			return true;
		}

		
	}

	public function checkSession($params)
	{
		if ($params['email']) {
			$_SESSION["access_to_index"] = "You are already logged in.";
			return true;
		}else{
			$_SESSION["no_access"] = "You have no access to this functionality";
			return false;
		}
		
	}

	public function killSession()
	{
		session_destroy();
		session_start();

		return true;
	}

}