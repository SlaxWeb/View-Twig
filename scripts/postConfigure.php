<?php
/**
 * Post Component configuration script
 *
 * Executed after the ViewTwig subcomponent has been installed and configured. Used
 * to enable the Twig Template Loader Registration.
 *
 * @package   SlaxWeb\View
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.3
 */
$configFile = "{$this->_app["appDir"]}Config/view.php";
$config = file_get_contents($configFile);

preg_match("~.*?(configuration\[['\"]loader['\"]\].*?=.*?['\"](.*?)['\"]).*~s", $config, $matches);
$loader = str_replace($matches[2], "Twig", $matches[1]);
$config = str_replace($matches[1], $loader, $config);
file_put_contents($configFile, $config);
