<?php

namespace Application\Template;

use Application\Menu\MenuReader;

class FrontendTwigRenderer implements FrontendRenderer
{
    private $renderer;
    private $menu;

    public function __construct(Renderer $renderer, MenuReader $menu)
    {
        $this->renderer = $renderer;
        $this->menu = $menu;
    }

    public function render($template, $data = [])
    {
        $data = array_merge($data, ['menuItems' => $this->menu->readMenu() ]);
        return $this->renderer->render($template, $data);
    }
}