<?php

namespace Test\Unit;

use SimpleDOM\SimpleDOM;

use SimpleDOM\Document;

use SimpleDOM\Comment;

use SimpleDOM\Text;

/**
 *
 * @author chente
 *
 */
class BaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function document()
    {
        $simpledom = new SimpleDOM();
        $simpledom->element('ul', array('class' => 'menu'))
                ->element('li', array('id' => 'list_1'))
                    ->element('a', array('href' => 'my_list_1.html'), 'Click Here')->up()
                ->up()
                ->element('li', array('id' => 'list_2'))
                    ->text("free text")
                    ->comment("my comment");

        $domDocument = $simpledom->getDOMDocument();

        $this->assertEquals('<ul class="menu"><li id="list_1"><a href="my_list_1.html">Click Here</a></li><li id="list_2">free text<!--my comment--></li></ul>', preg_replace('/\n/', '', $domDocument->saveHTML()));
    }

}

