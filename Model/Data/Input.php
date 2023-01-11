<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsPage\Model\Data;

use Magento\Cms\Api\Data\PageInterface;
use MateuszMesek\DocumentDataApi\Model\InputInterface;

class Input implements InputInterface
{
    public function __construct(
        private readonly PageInterface $page
    )
    {
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return (string)$this->page->getId();
    }

    /**
     * @return \Magento\Cms\Api\Data\PageInterface
     */
    public function getPage(): PageInterface
    {
        return $this->page;
    }
}
