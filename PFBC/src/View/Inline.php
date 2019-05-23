<?php
namespace PFBC\View;
use PFBC\AbstractClass\FormView;
use PFBC\AbstractClass\Element;
use PFBC\Element\Button;
use PFBC\Element\Checkbox;
use PFBC\Element\File;
use PFBC\Element\HTML;
use PFBC\Element\Hidden;
use PFBC\Element\Radio;

class Inline extends FormView {
    protected $class = "form-inline";

    public function renderElement ($element) {
        if ($element instanceof Hidden || $element instanceof HTML || $element instanceof Button) {
            $element->render();
            return;
        }
        if (!$element instanceof Radio && !$element instanceof Checkbox && !$element instanceof File)
            $element->appendAttribute("class", "form-control");

        if ($this->noLabel) {
            $label = $element->getLabel();
            $element->setAttribute("placeholder", $label);
            $element->setLabel("");
        }

        echo '<div class="form-group elem-'.$element->getAttribute("id").'"> ', $this->renderLabel($element);
        echo $element->render(), $this->renderDescriptions($element);
        echo "</div> ";
    }

    protected function renderLabel (Element $element) {
        $label = $element->getLabel();
        if(empty ($label))
            $label = '';
        echo ' <label for="', $element->getAttribute("id"), '">';
        if ($element->isRequired())
            echo '<span class="required">* </span> ';
        echo $label, '</label> ';
    }
}
