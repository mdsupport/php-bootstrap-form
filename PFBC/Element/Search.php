<?php
namespace PFBC\Element;

class Element_Search extends Element_Textbox {
	protected $_attributes = array(
		"class" => "search-query",
	);
	// BS4 dropped glyphicons.  Use post processor to inject site specific icon here.
    protected $append = '<button class="btn btn-info"><span class="skin-select skin-icon-search">?</span></button>';
}
