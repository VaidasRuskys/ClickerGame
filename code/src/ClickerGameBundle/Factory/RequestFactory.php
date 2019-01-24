<?php

namespace ClickerGameBundle\Factory;

use ClickerGameBundle\Model\Request;
use ClickerGameBundle\Filter\FilterInterface;
use Psr\Log\LoggerInterface;

class RequestFactory
{
    /** @var array[]  */
    private $filters = [];

    /** @var LoggerInterface */
    private $logger;

    /**
     * RequestFactory constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function createRequest()
    {
        $request = new Request();

        /** @var FilterInterface $filter */
        foreach($this->filters as $filter) {
            $this->logger->info('Fillter added:' . get_class($filter));
            $filter->modify($request);
        }

        return $request;
    }

    /**
     * @return array[]
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param array[] $filters
     */
    public function setFilters($filters)
    {
        $this->filters = $filters;
    }

    /**
     * @param FilterInterface $filter
     */
    public function addFilter(FilterInterface $filter)
    {
        $this->filters[] = $filter;
    }
}