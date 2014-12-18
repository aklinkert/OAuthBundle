<?php

namespace APinnecke\Bundle\OAuthBundle\ServiceFactory;

use OAuth\Common\Consumer\Credentials;
use OAuth\Common\Exception\Exception;
use OAuth\Common\Storage\TokenStorageInterface;
use OAuth\ServiceFactory as BaseServiceFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ServiceFactory
{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var BaseServiceFactory
     */
    private $factory;

    /**
     * @var TokenStorageInterface
     */
    private $storage;

    /**
     * @var array
     */
    private $credentialsCache = [];

    /**
     * @var array
     */
    private $serviceCache = [];

    public function __construct(ContainerInterface $container, BaseServiceFactory $factory, TokenStorageInterface $storage)
    {
        $this->container = $container;
        $this->factory = $factory;
        $this->storage = $storage;
    }

    /**
     * @param $resourceOwnerName
     * @return \OAuth\Common\Service\ServiceInterface
     * @throws Exception
     */
    public function createService($resourceOwnerName)
    {
        if (!isset(ResourceOwners::$all[$resourceOwnerName])) {
            throw new Exception('Resource owner ' . $resourceOwnerName . ' is not available');
        }

        if (isset($this->serviceCache[$resourceOwnerName])) {
            return $this->serviceCache[$resourceOwnerName];
        }

        if (!isset($this->credentialsCache[$resourceOwnerName])) {
            $paramName = 'apinnecke_oauth.resource_owner.' . $resourceOwnerName . '.callback_url';

            if ($this->container->hasParameter($paramName)) {
                $callbackUrl = $this->container->getParameter($paramName);
            } else {
                $callbackUrl = $this->container->get('router')->getContext()->getBaseUrl();
            }
            $credentials = new Credentials(
                $this->container->getParameter('apinnecke_oauth.resource_owner.' . $resourceOwnerName . '.client_id'),
                $this->container->getParameter('apinnecke_oauth.resource_owner.' . $resourceOwnerName . '.client_secret'),
                $callbackUrl
            );
        }

        $credentials = isset($credentials)? $credentials : $this->credentialsCache[$resourceOwnerName];
        return $this->serviceCache[$resourceOwnerName] = $this->factory->createService($resourceOwnerName, $credentials, $this->storage);
    }
}
 