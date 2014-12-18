<?php

namespace APinnecke\Bundle\OAuthBundle;

use APinnecke\Bundle\OAuthBundle\DependencyInjection\APinneckeOAuthExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class APinneckeOAuthBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            return new APinneckeOAuthExtension();
        }

        return $this->extension;
    }
}
