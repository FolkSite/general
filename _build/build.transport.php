<?php
require_once 'build.class.php';
$resolvers = array(
    'providers',
    'addons',
    'rename_htaccess',
    'remove_changelog',
    'cache_options',
    'category',
    'template',
    'tvs',
    'resources',
    'settings',
    'fix_translit',
    'fix_file_permissions'
);
$builder = new siteBuilder('General', '1.0.0', 'beta', $resolvers);
$builder->build();
