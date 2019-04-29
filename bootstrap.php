<?php
$app = new Phooty\Foundation\Application();

(new Phooty\Orm\Bootstrap\RegisterBindings)->register($app);

return $app;
