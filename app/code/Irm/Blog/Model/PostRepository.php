<?php

namespace Irm\Blog\Model;

use Irm\Blog\Api\Data\PostInterface;
use Irm\Blog\Api\PostRepositoryInterface;
use Irm\Blog\Model\ResourceModel\Post as PostResourceModel;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class PostRepository implements PostRepositoryInterface
{
    private PostFactory $postFactory;
    private PostResourceModel $postResourceModel;

    /**
     * @param PostFactory $postFactory
     * @param PostResourceModel $postResourceModel
     */
    public function __construct(PostFactory $postFactory, PostResourceModel $postResourceModel)
    {
        $this->postFactory = $postFactory;
        $this->postResourceModel = $postResourceModel;
    }


    /**
     * @inheritDoc
     */
    public function getById(int $id): PostInterface
    {
        $post = $this->postFactory->create();
        $this->postResourceModel->load($post,$id);
        if(!$post->get()){
            throw new NoSuchEntityException(__('The blog post with id "%1" dosen\'t exist',$id));
        }
        return $post;
    }

    /**
     * @inheritDoc
     */
    public function save(PostInterface $post): PostInterface
    {
        try{
            $this->postResourceModel->save($post);
        } catch (\Exception $exception){
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $post;
    }

    /**
     * @inheritDoc
     */
    public function deleteById(int $id): bool
    {
       $post = $this->getById($id);
       try{
        $this->postResourceModel->delete($post);
       }catch (\Exception $exception){
           throw new CouldNotDeleteException(__($exception->getMessage()));
       }
       return $post;
    }
}
