<?php

namespace Application\Menu;

class ArrayMenuReader implements MenuReader
{
    public function readMenu()
    {
        return [
            ['href' => '/home', 'text' => 'Homepage'],
        ];
    }
}