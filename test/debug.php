<?php

namespace Watchlater\Test;

require __DIR__ . '/../vendor/autoload.php';
require 'tools.php';

loadDebugEnv();

debugTestRunner('Api\RouterTest', 'testHello');
