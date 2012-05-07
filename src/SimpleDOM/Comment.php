<?php

namespace SimpleDOM;

/**
 *
 * @author chente
 *
 */
class Comment extends Element
{
    /**
     *
     * @var string
     */
    private $content;

    /**
     *
     * @param string $content
     */
    public function __construct($content){
        $this->content = $content;
    }

    /**
     * (non-PHPdoc)
     * @see SimpleDOM.Element::generateDOM()
     */
    protected function generateDOM(\DOMDocument $domDocument = null){
        return new \DOMComment($this->content);
    }

}