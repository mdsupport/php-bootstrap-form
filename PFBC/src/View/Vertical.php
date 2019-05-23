<?php
namespace PFBC\View;
use PFBC\AbstractClass\FormView;
use PFBC\AbstractClass\Element;
use PFBC\Element\Hidden;
use PFBC\Element\Button;
use PFBC\Element\HTML;
use PFBC\Element\Checkbox;
use PFBC\Element\File;
use PFBC\Element\Radio;

class Vertical extends FormView {
    private $sharedCount = 0;

    public function renderElement ($element) {
        if ($element instanceof Hidden || $element instanceof HTML || $element instanceof Button) {
            $element->render();
            return;
        }
        if (!$element instanceof Radio && !$element instanceof Checkbox && !$element instanceof File)
            $element->appendAttribute("class", "form-control");

        if ($this->sharedCount == 0) {
            $rowClass = $element->getShared() ? 'row' : '';
            echo '<div class="'.$rowClass.' form-group elem-'.$element->getAttribute ("id").'"> ', $this->renderLabel($element);
        }

        if ($element->getShared()) {
            $colSize = $element->getShared();
            $this->sharedCount += $colSize[strlen ($colSize) - 1];
            echo " <div class='$colSize'> ";
        }

        $element->setAttribute('placeholder', $element->getLabel());
        echo $element->render(), $this->renderDescriptions($element);
        if ($element->getShared())
            echo " </div> ";

        if ($this->sharedCount == 0 || $this->sharedCount == 12) {
            $this->sharedCount = 0;
            echo " </div> ";
        }
    }

    protected function renderLabel (Element $element) {}
}
