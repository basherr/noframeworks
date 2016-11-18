<?php

namespace Application\Page;

interface PageReader
{
    public function readBySlug($slug);
}