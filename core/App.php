<?php

namespace App\Core;

class App
{
	protected static $registry = [
		'config' => []
	];

	/**
	 * bind key values in array
	 * 
	 * @param  key of array
	 * @param  values of array
	 * @return array with new values
	 */
	public static function bind($key, $value)
	{
		static::$registry[$key] = $value;
	}

	/**
	 * get array by key value
	 * 
	 * @param  key of array
	 * @return array
	 */
	public static function get($key)
	{
		if (!array_key_exists($key, static::$registry)) {
			throw new Exception("No {$key} is found in the container.");
			
		}
		return static::$registry[$key];
	}
}