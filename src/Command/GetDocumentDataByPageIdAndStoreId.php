<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsPage\Command;

use Magento\Cms\Model\PageFactory;
use Magento\Cms\Model\ResourceModel\Page as PageResource;
use MateuszMesek\DocumentDataApi\Data\DocumentDataInterface;

class GetDocumentDataByPageIdAndStoreId
{
    private PageResource $pageResource;
    private PageFactory $pageFactory;
    private GetDocumentData $getDocumentData;

    public function __construct(
        PageResource    $pageResource,
        PageFactory     $pageFactory,
        GetDocumentData $getDocumentData
    )
    {
        $this->pageResource = $pageResource;
        $this->pageFactory = $pageFactory;
        $this->getDocumentData = $getDocumentData;
    }

    public function execute(int $pageId, int $storeId): ?DocumentDataInterface
    {
        $page = $this->pageFactory->create();
        $page->setStoreId($storeId);

        $this->pageResource->load($page, $pageId);

        return $this->getDocumentData->execute($page);
    }
}
