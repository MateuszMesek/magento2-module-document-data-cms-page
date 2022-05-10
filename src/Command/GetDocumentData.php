<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsPage\Command;

use Magento\Cms\Api\Data\PageInterface;
use MateuszMesek\DocumentDataApi\Command\GetDocumentDataInterface;
use MateuszMesek\DocumentDataApi\Data\DocumentDataInterface;
use MateuszMesek\DocumentDataCmsPage\Data\InputFactory;

class GetDocumentData
{
    private InputFactory $inputFactory;
    private GetDocumentDataInterface $getDocumentData;

    public function __construct(
        InputFactory $inputFactory,
        GetDocumentDataInterface $getDocumentData
    )
    {
        $this->inputFactory = $inputFactory;
        $this->getDocumentData = $getDocumentData;
    }

    public function execute(PageInterface $page): ?DocumentDataInterface
    {
        $input = $this->inputFactory->create(['page' => $page]);

        return $this->getDocumentData->execute('cms_page', $input);
    }
}
