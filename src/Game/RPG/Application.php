<?php

namespace kosuha606\Declarative\Game\RPG;

use kosuha606\Declarative\Common\Entity;
use kosuha606\Declarative\Common\EntityFactory;
use kosuha606\Declarative\Common\Storage;

class Application
{
    private $config = [];

    public function __construct(Storage $storage)
    {
        $this->config = $storage->readFile(__DIR__.'/config.php');
    }

    /**
     * @param $userId
     * @return Entity
     * @throws \Exception
     */
    public function login($userId)
    {
        if (!isset($this->config['users'][$userId])) {
            throw new \Exception("No user with id $userId");
        }

        return EntityFactory::create($userId, $this->config['users'][$userId]['fields']);
    }

    /**
     * Переместить пользователя в позицию
     *
     * @param $user
     * @param $x
     * @param $y
     */
    public function moveUser($user, $x, $y)
    {
        $user->map_position = [$x, $y];
    }

}