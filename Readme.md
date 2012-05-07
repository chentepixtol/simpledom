simpledom [![Build Status](https://secure.travis-ci.org/chentepixtol/simpledom.png?branch=master)](http://travis-ci.org/chentepixtol/simpledom)
============


    $simpledom = new SimpleDOM();
    $simpledom
        ->element('ul', array('class' => 'menu'))
            ->element('li', array('id' => 'list_1'))
                ->element('a', array('href' => 'my_list_1.html'), 'Click Here')->up()
            ->up()
            ->element('li', array('id' => 'list_2'))
                ->text("free text")
                ->comment("my comment");

    $domDocument = $simpledom->getDOMDocument();
    
    echo $domDocument->saveHTML();
    
    <ul class="menu">
        <li id="list_1">
            <a href="my_list_1.html">Click Here</a>
        </li>
        <li id="list_2">free text<!--my comment--></li>
    </ul>
    
