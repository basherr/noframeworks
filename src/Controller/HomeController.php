<?php

namespace Application\Controller;

use Http\Response;
use Http\Request;
use Application\Page\PageReader;
use Application\Page\InvalidPageException;
use Application\Template\FrontendRenderer;

class HomeController
{
    private $response;
    private $renderer;
    private $pageReader;
    protected $request;

    public function __construct(
        Response $response,
        FrontendRenderer $renderer,
        PageReader $pageReader,
        Request $request
    ) {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
        $this->request = $request;
    }	
    /**
	 * Show data
	 *
	 * @param null
	 * @return null
	 */
	public function show($params)
	{
		$slug = $params['slug'];
	    try {
	        $data['content'] = $this->pageReader->readBySlug($slug);
	    } catch (InvalidPageException $e) {
	        var_dump($e);
	        $this->response->setStatusCode(404);
	        return $this->response->setContent('404 - Page not found');
	    }

	    $html = $this->renderer->render('home', $data);
	    $this->response->setContent($html);
	    echo $this->response->getContent();
	}
}