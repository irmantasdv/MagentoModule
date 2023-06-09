<?php declare(strict_types=1);
namespace Irm\Blog\Model\ResourceModel\Post;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Irm\Blog\Model\ResourceModel\Post as PostResourceModel;
use Irm\Blog\Model\Post;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Post::class,PostResourceModel::class);
    }
}
