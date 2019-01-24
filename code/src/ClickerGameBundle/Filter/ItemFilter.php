<?php

namespace ClickerGameBundle\Filter;

use ClickerGameBundle\Model\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ItemFilter implements FilterInterface
{
    const FIELD = 'item';

    /** @var RequestStack */
    private $requestStack;

    /**
     * ItemFilter constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function modify(Request $request)
    {
        if ($this->requestStack->getMasterRequest()->get(self::FIELD)) {
            $request->setItem($this->requestStack->getMasterRequest()->get(self::FIELD));
        }
    }
}