<?php declare(strict_types=1);

namespace MateuszMesek\DocumentDataCmsPage\Data;

use Magento\Cms\Api\Data\PageInterface;
use MateuszMesek\DocumentDataApi\InputInterface;

class Input implements InputInterface
{
    private PageInterface $page;

    public function __construct(
        PageInterface $page
    )
    {
        $this->page = $page;
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
