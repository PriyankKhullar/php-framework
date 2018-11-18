<?php

namespace App\Core;

class Request
{	
	/**
	 * return current page url
	 * 
	 * @return page url
	 */
	public static function url()
	{
		return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
	}

	/**
	 * request method
	 * 
	 * @return method name [get/post]
	 */
	public static function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
}