<?php declare(strict_types=1);
namespace Irm\Blog\VieModel;

use Magento\Framework\DataObject;
use Magento\Framework\View\Element\Block\ArgumentInterface;
class Post implements ArgumentInterface
{
    public function getList(): array
    {
        return([
           new DataObject(['id' => 1,'title' => 'First title 1']),
        new DataObject(['id' => 2,'title' => 'Second title 2']),
            new DataObject(['id' => 3,'title' => 'Third title 3']),
        ]);
    }
}
