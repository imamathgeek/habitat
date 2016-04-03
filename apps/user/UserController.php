<?php
/**
 * UserController
 * 
 *
 * @package    Dinkly
 * @subpackage AppsUserController
 * @author     Christopher Lewis <lewsid@lewsid.com>
 */

class UserController extends Dinkly
{
	/**
	 * Default Constructor
	 * 
	 * @return bool
	 * 
	 */
	public function __construct()
	{
		DinklyDataConfig::setActiveConnection('habitat');
		$this->db = DinklyDataConnector::fetchDB();
		
		return true;
	}
}
