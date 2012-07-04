<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MdmLinkButton
 *
 * @author mdmunir
 */
class MdmTreeGrid extends MdmEuiWidget {

    //put your code here
    public $tagName = 'table';
    public $url;
    public $idField;
    public $treeField;
    public $columns = array();

    public function init() {
        parent::init();

        $id = $this->getId();
        if (isset($this->htmlOptions['id']))
            $id = $this->htmlOptions['id'];
        else
            $this->htmlOptions['id'] = $id;

        if (isset($this->url)) {
            $this->options['url'] = CHtml::normalizeUrl($this->url);
        }
        if (isset($this->idField)) {
            $this->options['idField'] = $this->idField;
        }
        if (isset($this->treeField)) {
            $this->options['treeField'] = $this->treeField;
        }
        if (!empty($this->columns)) {
            $this->options['columns'] = array($this->columns);
        }
        if (empty($this->options)) {
            $this->htmlOptions['class'] = 'easyui-treegrid';
        } else {
            $options = CJavaScript::encode($this->options);
            Yii::app()->getClientScript()->registerScript(__CLASS__ . '#' . $id, "jQuery('#{$id}').treegrid($options);");
        }
        echo CHtml::tag($this->tagName, $this->htmlOptions, $this->text);
    }

}

?>
