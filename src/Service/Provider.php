<?php
/**
 * View Twig SubComponent Service Provider
 *
 * Registers the twig loader service and the template loader service, but only
 * if the configured loader is 'Twig'.
 *
 * @package   SlaxWeb\ViewTwig
 * @author    Tomaz Lovrec <tomaz.lovrec@gmail.com>
 * @copyright 2016 (c) Tomaz Lovrec
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://github.com/slaxweb/
 * @version   0.5
 */
namespace SlaxWeb\ViewTwig\Service;

use Pimple\Container;

class Provider implements \Pimple\ServiceProviderInterface
{
    /**
     * Register provider
     *
     * Register the PHP Template Loader as the tempalte loader to the DIC.
     *
     * @param \Pimple\Container $container DIC
     * @return void
     */
    public function register(Container $container)
    {
        if ($container["config.service"]["view.loader"] !== "Twig") {
            return;
        }

        $container["tplLoader.service"] = function (Container $container) {
            $loader = new \SlaxWeb\ViewTwig\Loader\Twig(
                $container["response.service"],
                $container["logger.service"](),
                $container["twig.service"]
            );
            return $loader->setTemplateExt($container["config.service"]["view.templateExtension"]);
        };

        $container["twig.service"] = $container->factory(
            function (Container $cont) {
                return new \Twig_Environment(
                    $cont["twigFilesystemLoader.service"],
                    ["cache" => $cont["config.service"]["twig.cacheDir"]]
                );
            }
        );

        $container["twigFilesystemLoader.service"] = $container->factory(
            function (Container $cont) {
                return new \Twig_Loader_Filesystem(
                    $cont["config.service"]["twig.templateDir"]
                );
            }
        );
    }
}
