<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        //Проверяем есть ли основная категория
        if (isset($options['site_category']) && $options['site_category']) {
            if (!$category = $modx->getObject('modCategory', array('category' => $options['site_category']))) {
                $category = $modx->newObject('modCategory');
                $category->fromArray(array(
                    'category' => 'General.site'
                    ));
                $category->save();
            }
        } else {
            $category = $modx->newObject('modCategory');
            $category->fromArray(array(
                    'category' => 'General.site'
                    ));
            $category->save();
        }

        //Создаем остальные категории
        $category = $modx->newObject('modCategory');
        $category->fromArray(array(
                'category' => 'Основные настройки'
                ));
        $category->save();

        $category = $modx->newObject('modCategory');
        $category->fromArray(array(
                'category' => 'Дополнительные настройки'
                ));
        $category->save();

        $category = $modx->newObject('modCategory');
        $category->fromArray(array(
                'category' => 'Слайдер'
                ));
        $category->save();
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;