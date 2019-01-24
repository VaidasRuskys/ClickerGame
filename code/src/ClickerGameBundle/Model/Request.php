<?php
/**
 * Created by PhpStorm.
 * User: Vaidas
 * Date: 1/15/2019
 * Time: 8:36 PM
 */

namespace ClickerGameBundle\Model;

class Request
{
    /** @var string */
    private $item;

    /** @var string */
    private $action;

    /** @var string */
    private $player;

    /**
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param string $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param string $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }
}