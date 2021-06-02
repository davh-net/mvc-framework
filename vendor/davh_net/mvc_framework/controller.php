<?php

namespace davh_net\mvc_framework;

class controller
{
	private String $views_dir;
	private String $models_dir;
	
	public function __construct( String $views_dir = "", String $models_dir = "" )
	{
		$this->views_dir = $views_dir;
		$this->models_dir = $models_dir;
	}
	
	public function view( String $path, array $data = [] )
	{
		if( $this->views_dir == "" )
			return;
		
		if( ! file_exists( $this->views_dir . '/' . $path . '.view.php' ) )
			return;
		
		require_once $this->views_dir . '/' . $path . '.view.php';
	}
	
	public function model( String $model )
	{
		if( $this->models_dir == "" )
			return;
		
		if( ! file_exists( $this->models_dir . '/' . $model . '.model.php' ) )
			return;
		
		require_once $this->models_dir . '/' . $model . '.model.php';
		
		$classname = $model . "_model";
		
		$instance =  new $classname;
		
		if( $instance instanceof model )
			return $instance;
	}
}