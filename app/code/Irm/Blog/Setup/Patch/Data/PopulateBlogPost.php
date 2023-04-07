<?php declare(strict_types=1);

namespace Irm\Blog\Setup\Patch\Data;
use Irm\Blog\Api\PostRepositoryInterface;
use Irm\Blog\Model\PostFactory;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use magento\Framework\Setup\ModuleDataSetupInterface;

class PopulateBlogPost implements DataPatchInterface
{

    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private PostFactory $postFactory,
        private PostRepositoryInterface $postRepository

    ){}

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
        $post = $this->postFactory->create();
        $post->setData([
            'title' => 'My first post today',
            'content' => 'This is totally awesome'
        ]);
        $this->postRepository->save($post);
        $this->moduleDataSetup->endSetup();
    }
}
