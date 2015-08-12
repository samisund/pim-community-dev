<?php

namespace Pim\Bundle\EnrichBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Compiler pass to register category extension to a registry
 *
 * @author    Marie Bochu <marie.bochu@akeneo.com>
 * @copyright 2015 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class RegisterCategoryExtensionPass implements CompilerPassInterface
{
    const CATEGORY_TAG = 'pim_enrich.twig.category.extension';

    const CATEGORY_REGISTRY = 'pim_enrich.category.registry';

    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition(static::CATEGORY_REGISTRY)) {
            return;
        }

        $registryDefinition = $container->getDefinition(static::CATEGORY_REGISTRY);

        foreach ($container->findTaggedServiceIds(static::CATEGORY_TAG) as $serviceId => $attributes) {
            foreach ($attributes as $attribute) {
                $registryDefinition->addMethodCall(
                    'register',
                    [
                        new Reference($serviceId),
                        $attribute['type']
                    ]
                );
            }
        }
    }
}
