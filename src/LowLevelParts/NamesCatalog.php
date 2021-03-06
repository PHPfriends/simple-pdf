<?php

namespace PHPfriends\SimplePdf\LowLevelParts;

class NamesCatalog implements PartInterface
{
    /** @var PdfAssocArray */
    protected $values;

    /**
     */
    public function __construct()
    {
        $this->values = new PdfAssocArray();
    }

    /**
     * @param string $key
     * @param PartInterface $value
     * @return $this
     */
    public function addItem($key, PartInterface $value)
    {
        $this->values->addItem($key, $value);

        return $this;
    }

    /**
     * @return string
     */
    public function dump()
    {
        return sprintf("<<\r\n/Names\r\n%s\r\n>>", $this->values->dump());
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'NamesCatalog '.md5($this->dump());
    }
}