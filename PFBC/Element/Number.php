<?php
namespace PFBC\Element;

use PFBC\Validation\Validation_Numeric;

class Element_Number extends Element_Textbox {
	protected $_attributes = array("type" => "number");

	public function render() {
		$this->validation[] = new Validation_Numeric;
		parent::render();
	}
}
