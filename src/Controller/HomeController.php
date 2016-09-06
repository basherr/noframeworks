<?php

namespace Application\Controller;

use Http\Response;
use Http\Request;

class HomeController {
	
	private $response = null;	
	private $request = null;	

	public function __construct(Response $response, Request $request)
	{
		$this->response = $response;
		$this->request = $request;
	}
	/**
	 * Show data
	 *
	 * @param null
	 * @return null
	 */
	public function show()
	{
		$content = '<h1> Helloo '. $this->request->getParameter('name', 'stranger').'</h1>';
		$this->response->setContent($content);
		echo $this->response->getContent();
	}
}