<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $modx->log(modX::LOG_LEVEL_INFO, 'Run <b>Settings update</b>');
        
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_alias_realtime'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_alias_realtime',
        ), '', true, true);
        $tmp->save();
        
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_urls'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_urls',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_urls_strict'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'friendly_urls_strict',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'hidemenu_default'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'hidemenu_default',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'publish_default'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'publish_default',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'use_alias_path'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'use_alias_path',
        ), '', true, true);
        $tmp->save();


        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'friendly_alias_translit'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'furls',
            'xtype'     => 'textfield',
            'value'     => 'russian',
            'key'       => 'friendly_alias_translit',
        ), '', true, true);
        $tmp->save();

        $alias = '404';
        $tid = $modx->getOption('site_start');
        if ($resource = $modx->getObject('modResource', array('alias' => $alias))) {
            $tid = $resource->get('id');
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'error_page'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => $tid,
            'key'       => 'error_page',
        ), '', true, true);
        $tmp->save();
        
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'site_unavailable_page'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => $tid,
            'key'       => 'site_unavailable_page',
        ), '', true, true);
        $tmp->save();
        
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'unauthorized_page'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => $tid,
            'key'       => 'unauthorized_page',
        ), '', true, true);
        $tmp->save();


        $default_template = 'Внутренняя страница';
        if ($template = $modx->getObject('modTemplate', array('templatename' => $default_template))) {
            $template = $template->id;
        }else{
            $template = 3;
        }
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'default_template'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'modx-combo-template',
            'value'     => $template,
            'key'       => 'default_template',
        ), '', true, true);
        $tmp->save();

        //Удаляем начальный шаблон
        if($template = $modx->getObject('modTemplate', array('templatename' => 'Начальный шаблон'))){
            $template->remove();
        }
        
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'error_page_header'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'site',
            'xtype'     => 'textfield',
            'value'     => 'HTTP/1.0 404 Not Found',
            'key'       => 'error_page_header',
        ), '', true, true);
        $tmp->save();
    
        
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'locale'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'core',
            'area'      => 'language',
            'xtype'     => 'textfield',
            'value'     => 'ru_RU.utf8',
            'key'       => 'locale',
        ), '', true, true);
        $tmp->save();

        //ACE
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ace.font_size'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'ace',
            'area'      => 'general',
            'xtype'     => 'textfield',
            'value'     => '15px',
            'key'       => 'ace.font_size',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ace.theme'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'ace',
            'area'      => 'general',
            'xtype'     => 'textfield',
            'value'     => 'monokai',
            'key'       => 'ace.theme',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'ace.word_wrap'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'ace',
            'area'      => 'general',
            'xtype'     => 'combo-boolean',
            'value'     => '1',
            'key'       => 'ace.word_wrap',
        ), '', true, true);
        $tmp->save();

        //TinyMCE
        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tiny.custom_plugins'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'tinymce',
            'area'      => 'custom-buttons',
            'xtype'     => 'textfield',
            'value'     => 'spellchecker,pagebreak,template,nonbreaking,visualchars,xhtmlxtras,directionality,layer,emotions,style,advimage,advlink,modxlink,searchreplace,print,contextmenu,paste,fullscreen,style,noneditable,nonbreaking,xhtmlxtras,visualchars,media,table,save,paste,searchreplace,insertdatetime,preview',
            'key'       => 'tiny.custom_plugins',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tiny.custom_buttons1'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'tinymce',
            'area'      => 'custom-buttons',
            'xtype'     => 'textfield',
            'value'     => 'save,cance,newdocument,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect,styleselect',
            'key'       => 'tiny.custom_buttons1',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tiny.custom_buttons2'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'tinymce',
            'area'      => 'custom-buttons',
            'xtype'     => 'textfield',
            'value'     => 'cut,copy,paste,pastetext,pasteword,selectall,search,bullist,numlist,outdent,indent,blockquote,undo,redo,link,anchor,image,cleanup,help,code,insertdate,inserttime,preview,fullpage,forecolor,backcolor,forecolorpicker,backcolorpicker',
            'key'       => 'tiny.custom_buttons2',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tiny.custom_buttons3'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'tinymce',
            'area'      => 'custom-buttons',
            'xtype'     => 'textfield',
            'value'     => 'tablecontrols,row_props,cell_props,delete_col,delete_row,col_after,col_before,row_after,row_before,split_cells,merge_cells,hr,removeformat,visualaid,sub,sup,charmap,emotions,media,advhr,print,ltr,rtl,fullscreen,separator',
            'key'       => 'tiny.custom_buttons3',
        ), '', true, true);
        $tmp->save();

        if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'tiny.custom_buttons4'))) {
            $tmp = $modx->newObject('modSystemSetting');
        }
        $tmp->fromArray(array(
            'namespace' => 'tinymce',
            'area'      => 'custom-buttons',
            'xtype'     => 'textfield',
            'value'     => 'insertlayer,moveforward,movebackward,absolute,styleprops,cite,acronym,abbr,del,ins,attribs,visualchars,nonbreaking,template,pagebreak,spellchecker',
            'key'       => 'tiny.custom_buttons4',
        ), '', true, true);
        $tmp->save();

        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
