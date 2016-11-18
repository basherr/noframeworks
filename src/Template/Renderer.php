<?php

namespace Application\Template;

interface Renderer {

	public function render($template, $data = []);

}