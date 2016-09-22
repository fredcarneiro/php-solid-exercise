<?php

/**
* User DAO Interface
*/
interface IUserDAO
{
	public function insert(User $user);
	public function search($value);
	public function searchByEmailPassword($email, $password);
}