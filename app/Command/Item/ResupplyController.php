<?php

namespace App\Command\Item;

use Minicli\Command\CommandController;

class ResupplyController extends CommandController
{
    public function handle(): void
    {
        $name = $this->hasParam('user') ? $this->getParam('user') : 'World';
        $this->getPrinter()->display(sprintf("Hello, %s!", $name));

        print_r($this->getParams());
    }
}