<?php

namespace SimpleDOM;

/**
 *
 * @author chente
 *
 */
class Document extends Element
{
    /**
     *
     * @var string
     */
    private $node;

    /**
     *
     * @var array
     */
    private $attrs;

    /**
     *
     * @var string
     */
    private $value;

    /**
     *
     * @var array
     */
    protected $children = array();

    /**
     *
     * @param string $node
     * @param array $attrs
     * @param string $value
     */
    public function __construct($node, array $attrs = array(), $value = null){
        $this->node = $node;
        $this->attrs = $attrs;
        $this->value = $value;
    }

    /**
     *
     * @param Element $child
     */
    protected function addChild(Element $child){
        $child->setParent($this);
        $this->children[] = $child;
    }

    /**
     *
     * @param string $node
     * @param array $attrs
     * @param string $value
     * @return \SimpleDOM\Document
     */
    public function element($node, array $attrs = array(), $value = null){
        $child = new Document($node, $attrs, $value);
        $this->addChild($child);
        return $child;
    }

    /**
     *
     * @param string $text
     * @return \SimpleDOM\Document
     */
    public function text($text){
        $child = new Text($text);
        $this->addChild($child);
        return $this;
    }

    /**
     *
     * @param string $text
     * @return \SimpleDOM\Document
     */
    public function comment($text){
        $child = new Comment($text);
        $this->addChild($child);
        return $this;
    }

    /**
     * (non-PHPdoc)
     * @see SimpleDOM.Element::generateDOM()
     */
    protected function generateDOM(\DOMDocument $domDocument = null)
    {
        $element = $domDocument->createElement($this->node, $this->value);
        foreach ($this->attrs as $attr => $value){
            $element->setAttributeNode(new \DOMAttr($attr, $value));
        }

        foreach ($this->children as $child){
            $element->appendChild($child->generateDOM($domDocument));
        }

        return $element;
    }

}