<?php
function autoloader($class) {
$class = str_replace(chr(92), DIRECTORY_SEPARATOR, $class);
include "src" . DIRECTORY_SEPARATOR . $class . ".php";
}
spl_autoload_register("autoloader");
\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;
(new \Nemundo\Project\Loader\MySqlProjectLoader())->loadProject();