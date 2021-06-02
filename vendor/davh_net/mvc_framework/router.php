<?php

namespace davh_net\mvc_framework;

class router
{
	private array $routes = array();
	private $route;
	
	public function add( Route $route )
	{
		$this->routes[ $route->method() ][] = $route;
	}
	
	public function get()
	{
		return $this->route;
	}
	
	public function route( String $method, String $path )
	{
		$this->route = null;
		
		if( substr( $path, 0, 1 ) == "/" )
			$path = substr( $path, 1 );
		if( substr( $path, -1 ) == "/" )
			$path = substr( $path, 0, -1 );
		
		if( array_key_exists( $method, $this->routes ) )
		{
			$routes = $this->routes[ $method ];
			
			foreach( $routes as $route )
			{
				$route_path = $route->path();
				
				if( $route_path == $path )
				{
					$this->route = $route;
					return $this;
				}
			}
		}
		
		if( $path != "not_found" )
		{
			$this->route( $method, "not_found" )->execute();
			exit;
		}
		
		return $this;
	}
	
	public function execute()
	{
		if( $this->route instanceof Route )
		{
			call_user_func( $this->route->callback() );
			exit;
		}
		
		echo "Error: No route available for this request!";
	}
}