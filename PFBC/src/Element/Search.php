<?php
namespace PFBC\Element;


class Search extends Textbox {
	protected $_attributes = array(
		"class" => "search-query",
	);
    protected $append = '<button class="btn btn-info"><span class="glyphicon glyphicon-search"></span></button>';
}
