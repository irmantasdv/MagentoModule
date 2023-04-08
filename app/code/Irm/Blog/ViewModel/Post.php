<?php declare(strict_types=1);
namespace Irm\Blog\ViewModel;

use Irm\Blog\Model\PostFactory;
use Irm\Blog\Api\Data\PostInterface;
use Irm\Blog\Api\PostRepositoryInterface;
use Irm\Blog\Model\ResourceModel\Post\Collection;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Post implements ArgumentInterface
{
    public function __construct(
        private Collection $collection,
        private PostRepositoryInterface $postRepository,
        private RequestInterface $request,
        private PostFactory $postFactory,
    )
    {
    }

    public function getList(): array
    {
        return $this->collection->getItems();
    }
    public function count(): int
    {
        return $this->collection->count();
    }

    public function getDetails(): PostInterface
    {
        $id = (int) $this->request->getParam('id');
        return $this->postRepository->getById($id);
    }
    public function testCreatePost(){
        $post = $this->postFactory->create();
        $post->setTitle('mi title');
        $post->setContent('mi content');
        $this->postRepository->save($post);
    }
}
