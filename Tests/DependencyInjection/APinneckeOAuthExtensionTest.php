<?php


namespace APinnecke\Bundle\OAuthBundle\Tests\DependencyInjection;

use APinnecke\Bundle\OAuthBundle\DependencyInjection\APinneckeOAuthExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class APinneckeOAuthExtensionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var APinneckeOAuthExtension
     */
    private $extension;

    /**
     * @var ContainerBuilder
     */
    private $containerBuilder;

    private $config = [
        0 => [
            'resource_owners' => [
                'xing' => [
                    'client_id' => 'thisismyclientid',
                    'client_secret' => 'thisismyclientsecret',
                ],
                'facebook' => [
                    'client_id' => 'thisismyotherclientid',
                    'client_secret' => 'thisismyotherclientsecret',
                ]
            ]
        ]
    ];

    public function setUp()
    {
        $this->extension = new APinneckeOAuthExtension();
        $this->containerBuilder = new ContainerBuilder();
    }

    public function testExtensionHasCorrectAlias()
    {
        $this->assertEquals('apinnecke_oauth', $this->extension->getAlias());
    }

    public function testServicesAreCreated()
    {
        $this->extension->load($this->config, $this->containerBuilder);

        $definitions = $this->containerBuilder->getDefinitions();
        $this->assertEquals(6, count($definitions));

        $this->assertTrue($this->containerBuilder->hasDefinition('apinnecke_oauth.service.xing'));
        $this->assertTrue($this->containerBuilder->hasDefinition('apinnecke_oauth.service.facebook'));
    }

    public function testParametersAreCreated()
    {
        $this->extension->load($this->config, $this->containerBuilder);

        $parameters = $this->containerBuilder->getParameterBag();
        $this->assertEquals(44, count($parameters->all()));

        $this->assertTrue($parameters->has('apinnecke_oauth.resource_owners'));

        $this->assertTrue($parameters->has('apinnecke_oauth.resource_owners.xing.client_id'));
        $this->assertTrue($parameters->has('apinnecke_oauth.resource_owners.xing.client_secret'));
        $this->assertTrue($parameters->has('apinnecke_oauth.resource_owners.xing.callback_url'));

        $this->assertTrue($parameters->has('apinnecke_oauth.resource_owners.facebook.client_id'));
        $this->assertTrue($parameters->has('apinnecke_oauth.resource_owners.facebook.client_secret'));
        $this->assertTrue($parameters->has('apinnecke_oauth.resource_owners.facebook.callback_url'));
    }

}
 