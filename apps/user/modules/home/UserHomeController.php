<?php
/**
 * HomeController
 *
 *
 * @package    Dinkly
 * @subpackage AppsUserHomeController
 * @author     Christopher Lewis <lewsid@lewsid.com>
 */

class UserHomeController extends UserController
{
	/**
	 * Constructor
	 *
	 * @return void
	 *
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Load default view
	 *
	 * @return bool: always returns true on successful construction of view
	 *
	 */
	public function loadDefault()
	{
		$unseen_users = UserCollection::getAllUnseenUsers($this->db, 1);
		$this->unseen_user = $unseen_users[0];

		return true;
	}
}
