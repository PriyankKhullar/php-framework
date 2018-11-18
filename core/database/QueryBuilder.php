<?php

class QueryBuilder
{
	protected $pdo;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	/**
	 * select all data from dynamic table
	 * 
	 * @param  table name
	 * @return list of all records
	 */
	public function selectAll($table)
	{
		$statement = $this->pdo->prepare("select * from {$table}");
		$statement->execute();
		return $statement->fetchAll(PDO::FETCH_CLASS);
	}

	/**
	 * add data to dynamic table
	 * 
	 * @param  table name
	 * @param  fields name with its value
	 * @return save value in database.
	 */
	public function insert($table, $parameters)
	{
		$sql = sprintf(
			'insert into %s (%s) values (%s)',
			$table,
			implode(', ', array_keys($parameters)),
			':'. implode(', :', array_keys($parameters))
		);

		try {
			$statement = $this->pdo->prepare($sql);
			$data = $statement->execute($parameters);
			
		} catch (Exception $e) {
			die('Oops! Something went wrong');			
		}

	}
}
