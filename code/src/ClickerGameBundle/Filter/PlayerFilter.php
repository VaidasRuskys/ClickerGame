<?php

namespace ClickerGameBundle\Filter;

use ClickerGameBundle\Model\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class PlayerFilter implements FilterInterface
{
    const FIELD = 'player';

    /** @var RequestStack */
    private $requestStack;

    /**
     * PlayerFilter constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function modify(Request $request)
    {
        if ($this->requestStack->getMasterRequest()->get(self::FIELD)) {
            $request->setPlayer($this->requestStack->getMasterRequest()->get(self::FIELD));
        }
    }
}