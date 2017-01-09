<?php
/**
 * Post Component configuration script
 *
 * Executed after the ViewTwig subcomponent has been installed and configured. Used
 * to enable the Twig Template Loader Registration.
 *
 * @package   SlaxWeb\ViewTwig
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.4
 */
$configFile = "{$this->app["appDir"]}Config/view.php";
$config = file_get_contents($configFile);

// change loader
preg_match("~.*?(configuration\[['\"]loader['\"]\].*?=.*?['\"](.*?)['\"]).*~s", $config, $matches);
$loader = str_replace($matches[2], "Twig", $matches[1]);
$config = str_replace($matches[1], $loader, $config);

// change template file extension
preg_match("~.*?(configuration\[['\"]templateExtension['\"]\].*?=.*?['\"](.*?)['\"]).*~s", $config, $matches);
$tplExt = str_replace($matches[2], "tpl", $matches[1]);
$config = str_replace($matches[1], $tplExt, $config);

file_put_contents($configFile, $config);
