<?php
namespace PFBC\Element;
use PFBC\Validation\Url;


class Url extends Textbox {
	protected $_attributes = array("type" => "url");

	public function render() {
		$this->validation[] = new Url;
		parent::render();
	}
}
