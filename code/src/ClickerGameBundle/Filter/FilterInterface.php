<?php

namespace ClickerGameBundle\Filter;

use ClickerGameBundle\Model\Request;

interface FilterInterface
{
    public function modify(Request $request);
}