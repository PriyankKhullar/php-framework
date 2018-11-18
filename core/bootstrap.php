<?php

use App\Core\App;

// bind config file with config array
App::bind('config', require 'config.php');

// bind connection with database
App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));

/**
 * return view
 * 
 * @param  view name
 * @param  data {collections}
 * @return render view
 */
function view($name, $data)
{
	extract($data);
	return require "app/views/{$name}.view.php";
}
