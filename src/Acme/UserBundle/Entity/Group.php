<?php

namespace Acme\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseGroup as BaseGroup;

class Group extends BaseGroup
{
    public function __construct($name, $roles = array())
    {
        parent::__construct($name, $roles);
    }

    /**
     * @var integer $id
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}