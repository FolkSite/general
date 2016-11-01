<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $modx->log(modX::LOG_LEVEL_INFO, 'Run <b>Dashboard settings</b>');
    
        //add widget "Backup MODX" 
        $dashWidget = $modx->getObject('modDashboardWidget',array('name' => 'Backup MODX'));
	    $dashWidgetId = $dashWidget->id;
    
	    $dashPlace = $modx->newObject('modDashboardWidgetPlacement');
        $dashPlace->set('dashboard',1);
        $dashPlace->set('widget',$dashWidgetId);
        $dashPlace->set('rank',0);
    
	    $dashPlace->save();
    
	    //remove widget News & Security MODX feed 
	    $dashWidget = $modx->getObject('modDashboardWidget',array('name' => 'w_newsfeed'));
	    $dashWidgetId = $dashWidget->id;
    
	    $dashPlace = $modx->getObject('modDashboardWidgetPlacement',array('widget' => $dashWidgetId));
	    $dashPlace->remove();
     
	    $dashWidget = $modx->getObject('modDashboardWidget',array('name' => 'w_securityfeed'));
	    $dashWidgetId = $dashWidget->id;
     
	    $dashPlace = $modx->getObject('modDashboardWidgetPlacement',array('widget' => $dashWidgetId));
	    $dashPlace->remove();
    
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
    }

return true;