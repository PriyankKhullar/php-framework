<?php

namespace App\Core;

class Router
{
	public $routes = [
		'GET' => [],
		'POST' => [],
	];

	/**
	 * Load route files
	 * 
	 * @param  file
	 * @return load files
	 */
	public static function load($file)
	{
		$router = new static;
		require $file;
		return $router;
	}

	/**
	 * get request
	 * 
	 * @param  url
	 * @param  controller
	 * @return route
	 */
	public function get($url, $controller)
	{
		$this->routes['GET'][$url] = $controller;
	}

	/**
	 * Post request
	 * 
	 * @param  url
	 * @param  controller
	 * @return route
	 */
	public function post($url, $controller)
	{

		$this->routes['POST'][$url] = $controller;
	}

	/**
	 * check url and request type
	 * 
	 * @param  url
	 * @param  request type
	 * @return @callAction method
	 */
	public function direct($url, $requestType)
	{
		if(array_key_exists($url, $this->routes[$requestType])) {
			return $this->callAction(
				...explode('@', $this->routes[$requestType][$url])
			);
		}

		throw new Exception("No Route Define For This URL");
	}

	/**
	 * call method of controller
	 * 
	 * @param  controller
	 * @param  method name
	 * @return call the function
	 */
	protected function callAction($controller, $action)
	{
		$controller = new $controller;

		if (! method_exists($controller, $action)) {
			throw new Exception("{$action} does not exist");
		}

		return $controller->$action(); 
	}
}