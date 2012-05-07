<?php

namespace SimpleDOM;

/**
 *
 * @author chente
 *
 */
abstract class Element
{
    /**
     *
     * @var Document
     */
    private $parent;

    /**
     *
     * @param \DOMDocument $domDocument
     * @return \DOMElement
     */
    abstract protected function generateDOM(\DOMDocument $domDocument = null);

    /**
     *
     * @param Document $document
     */
    protected function setParent(Document $document){
        $this->parent = $document;
    }

    /**
     *
     * @return \SimpleDOM\Document
     */
    public function up(){
        return null == $this->parent ? $this : $this->parent;
    }

}