<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MdmComboColumn
 *
 * @author mdmunir
 */
class MdmAutocompleteColumn extends MdmInputColumn {

    //put your code here
    public $data;
    public $url;

    public function generateColumn() {
        $this->registerCoreScripts();
        $this->editorType = 'autocomplete';
        $this->editorOptions = $this->getOption();
        return parent::generateColumn();
    }

    protected function getOption() {
        $option = isset ($this->editorOptions)?$this->editorOptions:array();
        if (isset($this->url))
            $option['data'] = '"'.CHtml::normalizeUrl($this->url).'"';
        else
            $option['data'] = $this->data;

        return $option;
    }

    protected function registerCoreScripts() {
        $cs = Yii::app()->getClientScript();
        $cs->registerCoreScript('autocomplete');
        $url = $cs->getCoreScriptUrl() . '/autocomplete/jquery.autocomplete.css';
        $cs->registerCssFile($url);
    }

}

?>
