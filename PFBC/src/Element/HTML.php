<?php
namespace PFBC\Element;
use PFBC\AbstractClass\Element;


class Element_HTML extends Element {
	public function __construct($value) {
		$properties = array("value" => $value);
		parent::__construct("", "", $properties);
	}

	public function render() { 
		echo $this->_attributes["value"];
	}
}
