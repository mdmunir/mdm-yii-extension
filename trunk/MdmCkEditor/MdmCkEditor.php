<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MdmCkEditor
 *
 * @author mdmunir
 */
class MdmCkEditor extends CInputWidget{
    //put your code here
    
    public $options=array();
    public $editorReady = 'function(){}';


    public function run() {
        list($name, $id) = $this->resolveNameID();

        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;

        if (isset($this->htmlOptions['name']))
            $name = $this->htmlOptions['name'];

        if ($this->hasModel())
            echo CHtml::activeTextArea($this->model, $this->attribute, $this->htmlOptions);
        else
            echo CHtml::textArea($name, $this->value, $this->htmlOptions);

        $options = CJavaScript::encode($this->options);

        $js = "jQuery('#{$id}').ckeditor({$this->editorReady},$options);";
        //{$this->editorReady},$options
        
        $cs = Yii::app()->getClientScript();
        $assets = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ckeditor' . DIRECTORY_SEPARATOR;
        $aUrl = Yii::app()->getAssetManager()->publish($assets);
        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile($aUrl . DIRECTORY_SEPARATOR . 'ckeditor.js');
        $cs->registerScriptFile($aUrl . DIRECTORY_SEPARATOR . 'adapters/adapter.jquery.js');

        $cs->registerScript(__CLASS__ . '#' . $id, $js);
    }
    
}

?>
