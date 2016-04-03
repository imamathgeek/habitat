<?php
/**
 * UserCollection
 *
 * *
 * @package    Dinkly
 * @subpackage ModelsCustomClasses
 * @author     Christopher Lewis <lewsid@lewsid.com>
 */
class UserCollection extends DinklyDataCollection
{
	public static function getAllUnseenUsers($db = null, $id)
	{
		if (is_null($db)) { $db = self::fetchDB(); }

		$Select = "SELECT * FROM user
					WHERE id != " . $id . " 
					AND id NOT IN
					(SELECT swiped_id FROM pair
					WHERE swiper_id = " . $id . ")";

		$stmt = $db->prepare($Select);
		$stmt->execute();
		$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $results;
	}
}

