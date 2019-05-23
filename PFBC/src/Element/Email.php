<?php
namespace PFBC\Element;
use PFBC\Validation\Email;

class Email extends Textbox {
	protected $_attributes = array("type" => "email");

	public function render() {
		$this->validation[] = new Email;
		parent::render();
	}
}
