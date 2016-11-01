<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:

        $modx->log(modX::LOG_LEVEL_INFO, 'Run <b>Create TVs</b>');

        if (isset($options['site_category']) && $options['site_category']) {
            if ($category = $modx->getObject('modCategory', array('category' => $options['site_category']))) {
                $cat_id = $category->get('id');
            } else {
                $cat_id = 0;
            }
        } else {
            $cat_id = 0;
        }

        $cat_id_main = $modx->getObject('modCategory', array('category' => 'Основные настройки'))->get('id');
        
        $tvs = array();

        //TV Основных настроек сайта
        $name = 'site.header.logo';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'image',
            'caption'      => 'Логотип в шапке',
            'category'     => $cat_id_main,
            'rank'         => 0
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.footer.logo';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'image',
            'caption'      => 'Логотип в подвале',
            'category'     => $cat_id_main,
            'rank'         => 1
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.phone';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'text',
            'caption'      => 'Номер телефона',
            'category'     => $cat_id_main,
            'rank'         => 3
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.email';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'text',
            'caption'      => 'Email для связи',
            'category'     => $cat_id_main,
            'rank'         => 4
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.contacts';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'migx',
            'caption'      => 'Контакты',
            'category'     => $cat_id_main,
            'rank'         => 5,
            'input_properties' => array(
                                    "formtabs" => '[{"caption":"Контакты", "fields": [{"field":"image","caption":"Иконка","inputTVtype":"image"},{"field":"data_field","caption":"Значение поля"},{"field":"data_link","caption":"Значение ссылки"}]}]',
                                    "columns" => '[{"header": "Иконка", "sortable": "false", "dataIndex": "image","renderer": "this.renderImage"},{"header": "Значение поля", "sortable": "true", "dataIndex": "data_field"},{"header": "Значение ссылки", "sortable": "true", "dataIndex": "data_link"}]'
                                )
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.address';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'text',
            'caption'      => 'Контакты',
            'category'     => $cat_id_main,
            'rank'         => 6
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.jobstime';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'text',
            'caption'      => 'Режим работы',
            'category'     => $cat_id_main,
            'rank'         => 7
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.copyright';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'text',
            'caption'      => 'Копирайт',
            'category'     => $cat_id_main,
            'rank'         => 8
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.main.email';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'text',
            'caption'      => 'Укажите email адрес на который будут приходить письма со всех форм',
            'description'  => 'Если адресов несколько, то указывайте их через запятую ","',
            'category'     => $cat_id_main,
            'rank'         => 9
        ));
        $tv->save();
        $tvs[] = $tv->get('id');


        $cat_id_slider = $modx->getObject('modCategory', array('category' => 'Слайдер'))->get('id');
        $name = 'site.slider';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'migx',
            'caption'      => 'Контакты',
            'category'     => $cat_id_slider,
            'rank'         => 1,
            'input_properties' => array(
                                    "formtabs" => '[{"caption":"Изображения", "fields": [{"field":"title","caption":"Заголовок"},{"field":"description","caption":"Описание"},{"field":"link","caption":"Ссылка"}, {"field":"image","caption":"Изображение","inputTVtype":"image"}]}]',
                                    "columns" => '[{"header": "Заголовок", "sortable": "true", "dataIndex": "title"},{"header": "Описание", "sortable": "true", "dataIndex": "description"},{"header": "Ссылка", "sortable": "true", "dataIndex": "link"},{"header": "Изображение", "sortable": "false", "dataIndex": "image","renderer": "this.renderImage"}]',
                                    "btntext" => 'Добавить слайд'
                                )
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        $name = 'site.slider.time';
        if (!$tv = $modx->getObject('modTemplateVar', array('name' => $name))) {
            $tv = $modx->newObject('modTemplateVar');
        }
        $tv->fromArray(array(
            'name'         => $name,
            'type'         => 'text',
            'caption'      => 'Время смены слайда',
            'description'  => 'в миллисекундах',
            'category'     => $cat_id_slider,
            'rank'         => 0
        ));
        $tv->save();
        $tvs[] = $tv->get('id');

        //Присваеваем TVs к шаблону главной страницы
        $templateId =  $modx->getObject('modTemplate', array('templatename' => 'Главная страница'))->get('id');
        foreach ($tvs as $k => $tvid) {
            if (!$tvt = $modx->getObject('modTemplateVarTemplate', array('tmplvarid' => $tvid, 'templateid' => $templateId))) {
                $record = array('tmplvarid' => $tvid, 'templateid' => $templateId);
                $keys = array_keys($record);
                $fields = '`' . implode('`,`', $keys) . '`';
                $placeholders = substr(str_repeat('?,', count($keys)), 0, -1);
                $sql = "INSERT INTO {$modx->getTableName('modTemplateVarTemplate')} ({$fields}) VALUES ({$placeholders});";
                $modx->prepare($sql)->execute(array_values($record));
            }
        }
        
        
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;