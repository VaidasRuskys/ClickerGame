<?php

namespace ClickerGameBundle\Filter;

use ClickerGameBundle\Model\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ActionFilter implements FilterInterface
{
    const FIELD = 'action';

    /** @var RequestStack */
    private $requestStack;

    /**
     * ActionFilter constructor.
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function modify(Request $request)
    {
        if ($this->requestStack->getMasterRequest()->get(self::FIELD)) {
            $request->setAction($this->requestStack->getMasterRequest()->get(self::FIELD));
        }
    }
}