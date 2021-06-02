<?php

namespace davh_net\mvc_framework;

class route
{
	private $method;
	private $path;
	private $callback;
	private $info;
	
	public function __construct( String $method, String $path, callable $callback, array $info = array() )
	{
		$this->method = $method;
		$this->path = $path;
		$this->callback = $callback;
		$this->info = $info;
	}
	
	public function method()
	{
		return $this->method;
	}
	
	public function path()
	{
		return $this->path;
	}
	
	public function callback()
	{
		return $this->callback;
	}
	
	public function info( String $key = '' )
	{
		if( "" == $key )
			return $this->info;
		
		if( array_key_exists( $key, $this->info ) )
			return $this->info[ $key ];
	}
}