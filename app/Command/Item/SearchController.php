<?php

namespace App\Command\Item;
use App\Model\Item;
use Minicli\Command\CommandController;
use Minicli\Output\Filter\ColorOutputFilter;
use Minicli\Output\Helper\TableHelper;

class SearchController extends CommandController
{
    public function handle(): void
    {   
        $item = new Item;
        $type = '';
        $data = [];

        if($this->hasParam('sku')) {
            $type = 'sku';
            $data['sku'] = $this->getParam('sku');
        }

        if($this->hasParam('title')) {
            $type = 'title';
            $data['title'] = $this->getParam('title');
        }

        if($this->hasParam('company')) {
            $type = 'company';
            $data['company'] = $this->getParam('company');
        }
        // dd($item->search($data, $type));
        $items = $item->search($data, $type);

        // $this->getPrinter()->display('Testing Tables');

        $table = new TableHelper();
        $table->addHeader(['id', 'title', 'sku', 'location', 'company', 'quantity', 'created_at', 'updated_at']);

        foreach ($items as $item) {
            $table->addRow([(string)$item->id, $item->title, $item->sku, $item->location, (string)$item->company, $item->quantity, $item->created_at, $item->updated_at]);
        }

        $this->getPrinter()->newline();
        $this->getPrinter()->rawOutput($table->getFormattedTable(new ColorOutputFilter()));
        $this->getPrinter()->newline();
    }
}

// CDF090912