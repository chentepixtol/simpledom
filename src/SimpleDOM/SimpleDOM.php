<?php

namespace SimpleDOM;

/**
 *
 * @author chente
 *
 */
class SimpleDOM extends Document
{
    /**
     *
     * @var string
     */
    private $version;

    /**
     *
     * @var string
     */
    private $encoding;

    /**
     *
     * @param string $version
     * @param string $encoding
     */
    public function __construct($version = null, $encoding = null){
        $this->version = $version;
        $this->encoding = $encoding;
    }

    /**
     *
     * @return \DOMDocument
     */
    public function getDOMDocument(){
        $domDocument = new \DOMDocument($this->version, $this->encoding);

        foreach ($this->children as $child){
            $domDocument->appendChild($child->generateDOM($domDocument));
        }

        return $domDocument;
    }

}