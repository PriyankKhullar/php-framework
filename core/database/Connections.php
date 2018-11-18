<?php

class Connection
{
	/**
	 * make database connections
	 * 
	 * @param  database settings
	 * @return pdo connection
	 */
	public static function make($config)
	{
		try {
			return new PDO(
				$config['connection'].';dbname='.$config['name'],
				$config['username'],
				$config['password'],
				$config['options']
			);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}