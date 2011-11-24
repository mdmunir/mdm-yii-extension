<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MdmGridColumn
 *
 * @author mdmunir
 */
class MdmInputColumn extends MdmDataColumn {

    //put your code here
    public $editorType = 'text';
    public $editorOptions;
    public $dynamicEditorOptions;
    public $required = false;
    public $initEditor;
    public $onKeydown;

    /**
     * @var array the HTML options for the header cell tag.
     */
    public function generateColumn() {
        $config = parent::generateColumn();
        if ($this->required) {
            if ($this->editorType == 'text')
                $this->editorType = 'validatebox';
            $this->editorOptions['required'] = true;
        }
        if (isset($this->editorOptions) || isset($this->dynamicEditorOptions)) {
            $config['editor'] = array(
                'type' => $this->editorType,
            );
            if (isset($this->editorOptions))
                $config['editor']['options'] = $this->editorOptions;
            if (isset($this->dynamicEditorOptions)) {
                if (strpos($this->dynamicEditorOptions, 'js:') !== 0)
                    $this->dynamicEditorOptions = 'js:' . $this->dynamicEditorOptions;
                $config['editor']['dynamicOpts'] = $this->dynamicEditorOptions;
            }
        } else {
            $config['editor'] = $this->editorType;
        }
        return $config;
    }

}

?>
