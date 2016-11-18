<?php 

namespace Application\Template;

use Mustache_Engine;

Class MustacheRenderer implements Renderer
{
	private $engine;

	public function __construct(Mustache_Engine $engine)
	{
		$this->engine = $engine;
	}
	/**
	* Render view
	*
	*  @param template
	*  @return data array
	*/
	public function render($template, $data = [])
	{
		return $this->engine->render($template, $data);
	}
}