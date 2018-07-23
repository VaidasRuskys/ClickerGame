<?php

namespace ClickerGameBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity
 * @ORM\Table(name="players")
 */
class Player extends BaseUser
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\Column(type="string", unique=true, nullable=false)
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    protected $level;

    /**
     * Player constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->id = Uuid::uuid1();
        $this->level = 0;
    }
}