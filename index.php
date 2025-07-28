<?php

// require_once __DIR__ . "/config/config.php";

// require_once __DIR__ . "/core/Core.php";
// require_once __DIR__ . "/routes/router.php";

// $core = new Core();
// $core->run($routes);

require_once __DIR__ . "/routes/main.php";
require_once __DIR__ . "/Core/Core.php";
require_once __DIR__ . "/Http/Route.php";

Core::dispatch(Route::routes());