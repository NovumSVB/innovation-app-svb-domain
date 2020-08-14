<?php
use Core\Cfg;

if(isset($_SERVER['IS_DEVEL']))
{
    $aConfig = [
        'PROTOCOL' => 'http',
        'ADMIN_PROTOCOL' => 'http',
        'CUSTOM_FOLDER' => 'NovumSvb',
        'ABSOLUTE_ROOT' => '/home/anton/Documents/sites/hurah',
        'DOMAIN' => 'svb.demo.novum.nuidev.nl',
        /* Je zoekt waarschijnlijk Config::getDataDir() */
        'DATA_DIR' => '../'
    ];
}
else
{
    $aConfig = [
        'PROTOCOL' => 'https',
        'ADMIN_PROTOCOL' => 'https',
        'CUSTOM_FOLDER' => 'NovumSvb',
        'DOMAIN' => 'svb.demo.novum.nu',
        /* Je zoekt waarschijnlijk Config::getDataDir() */
        'ABSOLUTE_ROOT' => '/home/nov_svb/platform/system',
        'DATA_DIR' => '/home/nov_svb/platform/data'
    ];
}

$aConfig['CUSTOM_NAMESPACE'] = 'NovumSvb';

Cfg::set($aConfig);

