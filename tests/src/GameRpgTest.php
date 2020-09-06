<?php

use kosuha606\Declarative\Common\Storage;
use kosuha606\Declarative\Game\RPG\Application;
use PHPUnit\Framework\TestCase;

class GameRpgTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testMain()
    {
        $application = new Application(new Storage());
        $user = $application->login(1);

        $this->assertEquals('Евгеий', $user->name);

        $application->moveUser($user, 1, 1);
        $this->assertEquals([1, 1], $user->map_position);

        $application->moveUser($user, 4, 1);
        $this->assertEquals([4, 1], $user->map_position);
    }
}