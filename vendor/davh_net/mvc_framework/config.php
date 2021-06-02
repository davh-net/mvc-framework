<?php

namespace davh_net\mvc_framework;

class config
{
	private array $config;
	
	public function __construct( array $config )
	{
		$this->config = $config;
	}
	
	public function get( String $key )
	{
		if( array_key_exists( $key, $this->config ) )
			return $this->config[ $key ];
		return "";
	}
}