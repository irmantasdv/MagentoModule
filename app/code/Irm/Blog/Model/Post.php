<?php declare(strict_types=1);
namespace Irm\Blog\Model;

use Irm\Blog\Api\Data\PostInterface;
use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Post::class);
    }

    public function getTitle()
    {
       return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        return $this->setData(self::TITLE,$title);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($text)
    {
        return $this->setData(self::CONTENT,$text);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }
}
