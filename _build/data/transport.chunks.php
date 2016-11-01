<?php
/** @var modX $this->modx */
/** @var array $sources */

$chunks = array();

$tmp = array(
    'site.head' => array(
        'file' => 'site.head',
        'description' => '',
        'category' => 'General'
    ),
    'site.header' => array(
        'file' => 'site.header',
        'description' => 'Шапка сайта',
        'category' => 'General'
    ),
    'site.content' => array(
        'file' => 'site.content',
        'description' => '',
        'category' => 'General'
    ),
    'site.footer' => array(
        'file' => 'site.footer',
        'description' => 'Подвал сайта',
        'category' => 'General'
    ),
    'site.footer.scripts' => array(
        'file' => 'site.footer.scripts',
        'description' => 'Скрипты',
        'category' => 'General'
    ),
);
$setted = false;
foreach ($tmp as $k => $v) {
    
    /** @var modchunk $chunk */
    $chunk = $this->modx->newObject('modChunk');
    $chunk->fromArray(array(
        'name' => $k,
        'category' => $v['category'],
        'description' => @$v['description'],
        'content' => file_get_contents($this->config['PACKAGE_ROOT'] . 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/chunks/chunk.' . $v['file'] . '.html'),
        'static' => false,
        //'source' => 1,
        //'static_file' => 'core/components/'.strtolower($this->config['PACKAGE_NAME']).'/elements/chunks/chunk.' . $v['file'] . '.html',
    ), '', true, true);
    $chunks[] = $chunk;
}
unset($tmp, $properties);

return $chunks;