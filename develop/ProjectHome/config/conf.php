<?php

	class Conf{

		static $debug = 1;

		static $databases = array(
			'default' => array(
				'host'		=> 'localhost',
				'database'	=> 'projecthome',
				'login'		=> 'root',
				'password'	=> ''
			)
		);

	}

	Router::connect('','announces/index');
	Router::connect('announces/:slug-:id','announces/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
	//Router::connect('blog/*','posts/*');

?>