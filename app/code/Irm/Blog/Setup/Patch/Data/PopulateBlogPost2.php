<?php

namespace Irm\Blog\Setup\Patch\Data;

use Irm\Blog\Api\PostRepositoryInterface;
use Irm\Blog\Model\PostFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class PopulateBlogPost2 implements DataPatchInterface
{
    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory $postFactory,
        private PostRepositoryInterface $postRepository,
    ) {}

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();

        $posts = [
            [
                'title' => 'Today is sunny',
                'content' => 'The weather has been great all week.',
            ],
            [
                'title' => 'My movie review',
                'content' => 'I give this movie 5 out of 5 stars!',
            ],
        ];

        foreach ($posts as $postData) {
            $post = $this->postFactory->create();
            $post->setData($postData);
            $this->postRepository->save($post);
        }

        $this->moduleDataSetup->endSetup();
    }
}
//{
//    public function __construct(
//        private ModuleDataSetupInterface $moduleDataSetup,
//        private PostFactory $postFactory,
//        private PostRepositoryInterface $postRepository,
//    )
//    {}
//    public static function getDependencies()
//    {
//        return [];
//    }
//
//    public function getAliases()
//    {
//        return [];
//    }
//
//    public function apply()
//    {
//        $this->moduleDataSetup->startSetup();
//        $post = $this->postFactory->create();
//        $post->setData([
//            'title' => 'My title',
//            'content' => 'My content for blog post'
//        ]);
//        $this->postRepository->save($post);
//        $this->moduleDataSetup->endSetup();
//    }
//}
