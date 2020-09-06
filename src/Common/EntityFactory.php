<?php

namespace kosuha606\Declarative\Common;

class EntityFactory
{
    public static function create($id, $attributes, $entityClass = Entity::class)
    {
        return new $entityClass($id, $attributes);
    }
}