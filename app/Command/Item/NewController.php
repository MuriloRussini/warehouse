<?php

namespace App\Command\Item;

use App\Model\Item;
use Minicli\App;
use Minicli\Command\CommandController;

class NewController extends CommandController
{
    public function handle(): void
    {
        $item = new Item();
        $data = [];
        $this->getPrinter()->OUT("Please enter item information \r\n");
        $data['sku'] = readline('SKU: ');
        $data['title'] = readline('Title: ');
        $data['company'] = readline('Company: ');
        $data['location'] = readline('Location: ');
        $data['quantity'] = readline('Quantity: ');

        $item->insert($data);
        $this->getPrinter()->OUT("Item saved successfully \r\n");

        dd($data);
    }
}