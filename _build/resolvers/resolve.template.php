<?php

/** @var $modx modX */
if (!$modx = $object->xpdo AND !$object->xpdo instanceof modX) {
    return true;
}

/** @var $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        if (isset($options['site_template_name']) && !empty($options['site_template_name'])) {

            //Узнаем ID категории
            if (isset($options['site_category']) && $options['site_category']) {
                if ($category = $modx->getObject('modCategory', array('category' => $options['site_category']))) {
                    $cat_id = $category->get('id');
                } else {
                    $cat_id = 0;
                }
            } else {
                $cat_id = 0;
            }

            //Создаем необходимые шаблоны

            $name = 'Главная страница';
            $template = $modx->newObject('modTemplate');
            $template->fromArray(array(
                'templatename' => $name,
                'category'     => $cat_id,
                'description' => 'Шаблон для главной страницы',
                'content' => '<!DOCTYPE html>
                <html lang="ru-RU">
                <head>[[$site.head]]</head>
                <body>
                    [[$site.hedaer]]
                    <!-- Основная часть -->
            
                    <!-- End Основная часть -->
                    [[$site.footer]]
                    [[$site.ajaxform.callback]]
                    [[$site.footer.scripts]]
                </body>
            </html>'
            ));
            $template->save();


            $name = 'Внутренняя страница';
            $template = $modx->newObject('modTemplate');
            $template->fromArray(array(
                'templatename' => $name,
                'category'     => $cat_id,
                'description' => 'Шаблон для внутренней страницы',
                'content' => '<!DOCTYPE html>
                                <html lang="ru-RU">
                                    <head>
                                        [[$site.head]]
                                    </head>
                                    <body>
                                        [[$site.header]]
                                        <!-- Основная часть -->
                                        [[$site.content.breadcrumbs]]
                                        [[$site.content.pagetitle]]
                                        [[*content]]
                                        <!-- End Основная часть -->
                                        [[$site.ajaxform.callback]]
                                        [[$site.footer]]
                                        [[$site.footer.scripts]]
                                    </body>
                                </html>'
            ));
            $template->save();

            
            $template = $modx->getObject('modTemplate', array('templatename' => 'Внутренняя страница'));
            
            if (!$tmp = $modx->getObject('modSystemSetting', array('key' => 'default_template'))) {
                $tmp = $modx->newObject('modSystemSetting');
            }
            $tmp->fromArray(array(
                'namespace' => 'core',
                'area'      => 'site',
                'xtype'     => 'textfield',
                'value'     => $template->get('id'),
                'key'       => 'default_template',
            ), '', true, true);
            $tmp->save();
            
            $site_start = $modx->getObject('modResource', 'Главная');
            if ($site_start) {
                $site_start->set('template', $modx->getObject('modTemplate', array('templatename' => 'Главная страница'))->get('id'));
                $site_start->save();
            }
        }
        break;
    case xPDOTransport::ACTION_UNINSTALL:
        break;
}

return true;