<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        
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

        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;
