<?php
/**
 * Twig Template Loader
 *
 * Twig template loader loads and parses the twig template files.
 *
 * @package   SlaxWeb\ViewTwig
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.5
 */
namespace SlaxWeb\ViewTwig\Loader;

use Twig_Environment;
use SlaxWeb\View\AbstractLoader;
use \Psr\Log\LoggerInterface as Logger;
use Symfony\Component\HttpFoundation\Response;

class Twig extends \SlaxWeb\View\AbstractLoader
{
    /**
     * Template file extension
     *
     * @var string
     */
    protected $_fileExt = "html";

    /**
     * Twig
     *
     * @var \Twig_Environment
     */
    protected $twig = null;

    /**
     * Class constructor
     *
     * Assigns the dependant Response object to the class property. The View loader
     * will automatically add template contents to as response body.
     *
     * @param \Symfony\Component\HttpFoundation\Response $response Response object
     * @param \Psr\Log\LoggerInterface $logger PSR4 compatible Logger object
     * @param \Twig_Environment $twig Twig template loader
     * @return void
     */
    public function __construct(Response $response, Logger $logger, Twig_Environment $twig)
    {
        $this->twig = $twig;

        parent::__construct($response, $logger);
    }

    /**
     * Load template
     *
     * Load and render the template file with twig.
     *
     * @param string $template Path to the template file
     * @param array $data View data
     * @return string
     */
    protected function load(string $template, array $data): string
    {
        return $this->twig->render($template, $data);
    }
}
