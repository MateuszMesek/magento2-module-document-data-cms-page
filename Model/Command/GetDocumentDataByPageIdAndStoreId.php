<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsPage\Model\Command;

use Magento\Cms\Model\PageFactory;
use Magento\Cms\Model\ResourceModel\Page as PageResource;
use MateuszMesek\DocumentDataApi\Model\Data\DocumentDataInterface;
use MateuszMesek\DocumentDataCmsPage\Model\Command\GetDocumentData;

class GetDocumentDataByPageIdAndStoreId
{
    public function __construct(
        private readonly PageResource    $pageResource,
        private readonly PageFactory     $pageFactory,
        private readonly GetDocumentData $getDocumentData
    )
    {
    }

    public function execute(int $pageId, int $storeId): ?DocumentDataInterface
    {
        $page = $this->pageFactory->create();
        $page->setStoreId($storeId);

        $this->pageResource->load($page, $pageId);

        return $this->getDocumentData->execute($page);
    }
}
