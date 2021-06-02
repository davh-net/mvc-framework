<?php

namespace davh_net\mvc_framework;

class app
{
	private router $router;
	
	public function __construct()
	{
		$this->router = new router;
	}
	
	public function get_router()
	{
		return $this->router;
	}
}