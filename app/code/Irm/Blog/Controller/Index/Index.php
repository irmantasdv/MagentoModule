<?php declare(strict_types=1);
namespace Irm\Blog\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\Result\ForwardFactory;

class Index implements HttpGetActionInterface
{

    public function __construct(
        private ForwardFactory $forwardFactory,
    ){}
    public function execute(): Forward
    {
        /** @var Forward $foward */
        $foward = $this->forwardFactory->create();
        return $foward->setController('post')->forward('list');
    }
}
