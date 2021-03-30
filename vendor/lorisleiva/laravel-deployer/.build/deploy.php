<?php

namespace Deployer;

require 'recipe/laravel-deployer.php';

/*
 * Includes
 */

/*
 * Options
 */

set('strategy', 'basic');
set('application', 'Laravel');
set('repository', 'https://7336c8b2db492819135a1dd4f8f318de299d0eee:x-oauth-basic@github.com/ankitjaiswal/nearryapp.git');

/*
 * Hosts and localhost
 */

host('165.22.212.89')
    ->set('deploy_path', '/var/www/nearry.com/html')
    ->user('nearryapp')
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/github');

/*
 * Strategies
 */

/*
 * Hooks
 */

after('hook:ready', 'artisan:storage:link');
after('hook:ready', 'artisan:view:clear');
after('hook:ready', 'artisan:config:cache');
after('hook:ready', 'artisan:migrate');