<?php
/**
 * User
 *
 * *
 * @package    Dinkly
 * @subpackage ModelsCustomClasses
 * @author     Christopher Lewis <lewsid@lewsid.com>
 */
class User extends BaseUser
{
	public static function isLoggedIn()
	{
		if (isset($_SESSION['dinkly']['user']['logged_in'])) {
			return $_SESSION['dinkly']['user']['logged_in'];
		}
		return false;
	}
}

