<?php
use \Core\Setting;

echo "Setting initial menu state " . PHP_EOL;
Setting::store('show_navbar_top', true);
Setting::store('show_sidebar_left', true);
Setting::store('start_installer', false);
