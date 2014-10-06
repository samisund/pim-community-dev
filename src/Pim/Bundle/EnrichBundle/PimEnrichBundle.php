<?php

namespace Pim\Bundle\EnrichBundle;

use Pim\Bundle\EnrichBundle\DependencyInjection\Compiler;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Enrich bundle
 *
 * @author    Nicolas Dupont <nicolas@akeneo.com>
 * @copyright 2014 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class PimEnrichBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container
            ->addCompilerPass(new Compiler\RegisterMassEditOperatorsPass())
            ->addCompilerPass(new Compiler\RegisterMassEditOperationsPass())
            ->addCompilerPass(new Compiler\SerializerPass('pim_private_api_serializer'));
    }
}
