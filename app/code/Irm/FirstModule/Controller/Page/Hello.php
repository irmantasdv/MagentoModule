<?php declare(strict_types=1);
namespace Irm\FirstModule\Controller\Page;
use Magento\Framework\App\Action\HttpGetActionInterface;
class Hello implements HttpGetActionInterface
{


    public function execute()
    {
        die('ji');
    }
}
