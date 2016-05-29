<?php
/**
 * Twig Template Engine Config File
 *
 * Used to configure the template engine and prepare it for use.
 *
 * @package   SlaxWeb\ViewTwig
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.4
 */
/*
 * Templates location
 */
$configuration["templateDir"] = __DIR__ . "/../Template/";

/*
 * Cache location
 *
 * Set to false to disable cache
 */
$configuration["cacheDir"] = __DIR__ . "/../Cache/Twig/";
