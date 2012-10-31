<?php

namespace Knp\RadBundle\AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle as BaseBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Knp\RadBundle\DependencyInjection\Compiler\RegisterDoctrineRepositoriesPass;

class Bundle extends BaseBundle
{
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterDoctrineRepositoriesPass($this));
    }

    public function getContainerExtension()
    {
        if ($extension = parent::getContainerExtension()) {
            return $extension;
        }

        return $this->extension = new ContainerExtension(__DIR__);
    }
}