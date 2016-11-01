<?php
require_once 'build.class.php';
$resolvers = array(
    'providers',
    'addons',
    'rename_htaccess',
    'remove_changelog',
    'category',
    'tvs',
    'resources',
    'settings',
    'dashboard',
    'fix_translit',
    'fix_file_permissions'
);
$builder = new siteBuilder('General', '1.0.0', 'pl', $resolvers);
$builder->build();
