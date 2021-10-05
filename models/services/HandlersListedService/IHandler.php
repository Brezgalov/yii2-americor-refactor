<?php

namespace app\models\services\HandlersListedService;

interface IHandler
{
    /**
     * @return bool
     */
    public function resolveIsPossible(): bool;

    /**
     * @return mixed
     */
    public function handle();
}