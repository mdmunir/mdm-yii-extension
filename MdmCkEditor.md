# Instalasi extension MdmCkEditor. #


Untuk dapat memakai MdmCkEditor, anda harus punya ckeditor terlebih dahulu, silakan download ckeditor di [sini](http://ckeditor.com/download).
Ekstrak file yang sudah anda download ke folder protected/extension. Kemudian edit konfigurasi komponen clientScript (biasanya pada file protected/cofig/main.php), tambahkan kode berikut.
```php

'clientScript' => array(
'packages' => array(
'ckeditor' => array(
'basePath' => 'ext.ckeditor',
'js' => array('ckeditor.js','adapters/jquery.js'),
'depends' => array('jquery'),
),
),
),
```
Nilai `basePath` adalah alias dari folder ekstraksi ckeditor. Selanjutnya download MdmCkEditor, letakkan pada folder extension juga. Selajutnya pada aplikasi anda dapat memanggil widget ini dengan sintak
```php

$this->widget('ext.MdmCkEditor', array(
'model' => $model,
'attribute' => 'content',
'options' => array(
'extraPlugins' => 'equation',
'toolbar' => array(
array('Source'),
array('Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'),
array('equation', 'Image', 'Table','Link', 'Smiley', 'Iframe'),
array('JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock')
),
'skin'=>'office2003'
),
));
```