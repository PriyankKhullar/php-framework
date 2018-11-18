<?php 

namespace App\Controllers;

use App\Core\App;

class TaskController
{
	/**
	 * view task listing page
	 * 
	 * @return all tasks listing
	 */
	public function index()
	{
		$tasks = App::get('database')->selectAll('todos');
		return view('index',compact('tasks'));
	}

	/**
	 * add tasks in task list
	 * 
	 */
	public function add()
	{
		App::get('database')->insert('todos', [
			'descriptions' =>  $_POST['task'],
			'completed' => 0
		]);

		header('Location: /');
	}
}