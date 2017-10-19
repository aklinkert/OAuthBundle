<?php

namespace APinnecke\Bundle\OAuthBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class APinneckeOAuthExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration($this->getAlias());
        $config = $this->processConfiguration($configuration, $configs);

        $resourceOwners = array();
        foreach ($config['resource_owners'] as $name => $options) {
            $resourceOwners[] = $name;
            $lowerName = strtolower($name);

            $definition = new Definition();
            if (method_exists($definition, 'setFactory')) {
                // to be inlined when dependency on Symfony DependencyInjection is newer than 2.5.9
                $definition->setFactory(array(new Reference('apinnecke_oauth.service_factory'), 'createService'));
            } else {
                // to be removed when dependency on Symfony DependencyInjection is older than 2.6
                $definition->setFactoryService('apinnecke_oauth.service_factory');
                $definition->setFactoryMethod('createService');
            }
            $definition->setFactory(array(new Reference('apinnecke_oauth.service_factory'), 'createService'));
            $definition->setClass('%apinnecke_oauth.service.' . $lowerName . '.class%');
            $definition->addArgument($name);

            $container->setDefinition('apinnecke_oauth.service.' . $lowerName, $definition);

            foreach($options as $key => $value) {
                $container->setParameter('apinnecke_oauth.resource_owners.' . $lowerName . '.' . $key, $value);
            }
        }
        $container->setParameter('apinnecke_oauth.resource_owners', $resourceOwners);


        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * {@inheritdoc}
     */
    public function getAlias()
    {
        return 'apinnecke_oauth';
    }
}
