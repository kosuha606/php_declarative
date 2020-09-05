<?php

namespace kosuha606\Declarative\Common;

class Entity implements CollectionItemInterface
{
    private $attributes = [];

    private $idAttribute;

    public function __construct($idAttribute, $attributes)
    {
        $this->attributes = $attributes;
        $this->idAttribute = $idAttribute;
    }

    public function getId()
    {
        return $this->attributes[$this->idAttribute] ?? false;
    }

    /**
     * @param $name
     * @return mixed
     * @throws NoAttributeException
     */
    public function __get($name)
    {
        if (!isset($this->attributes[$name])) {
            throw new NoAttributeException($name);
        }

        return $this->attributes[$name];
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     * @throws NoAttributeException
     */
    public function __set($name, $value)
    {
        if (!isset($this->attributes[$name])) {
            throw new NoAttributeException($name);
        }

        $this->attributes[$name] = $value;
    }
}