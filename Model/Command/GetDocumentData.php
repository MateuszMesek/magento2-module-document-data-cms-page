<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsPage\Model\Command;

use Magento\Cms\Api\Data\PageInterface;
use MateuszMesek\DocumentDataApi\Model\Command\GetDocumentDataInterface;
use MateuszMesek\DocumentDataApi\Model\Data\DocumentDataInterface;
use MateuszMesek\DocumentDataCmsPage\Model\Data\InputFactory;

class GetDocumentData
{
    public function __construct(
        private readonly InputFactory             $inputFactory,
        private readonly GetDocumentDataInterface $getDocumentData
    )
    {
    }

    public function execute(PageInterface $page): ?DocumentDataInterface
    {
        $input = $this->inputFactory->create(['page' => $page]);

        return $this->getDocumentData->execute('cms_page', $input);
    }
}
