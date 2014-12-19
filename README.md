# OAuth wrapper for Symfony 2

oauth-bundle is a symfony 2 wrapper bundle for [Lusitanian/PHPoAuthLib](https://github.com/Lusitanian/PHPoAuthLib) 
which provides oAuth support in PHP 5.3+ and is very easy to integrate with any project which requires an oAuth client.

[![Build Status](https://travis-ci.org/APinnecke/OAuthBundle.png?branch=master)](https://travis-ci.org/APinneckeOAuthBundle)
[![Latest Stable Version](https://poser.pugx.org/apinnecke/oauth-bundle/v/stable.png)](https://packagist.org/packages/apinnecke/oauth-bundle)
[![Total Downloads](https://poser.pugx.org/apinnecke/oauth-bundle/downloads.png)](https://packagist.org/packages/apinnecke/oauth-bundle)

---
 
- [Supported services](#supported-services)
- [Installation](#installation)
- [Registering the Bundle](#registering-the-bundle)
- [Configuration](#configuration)
- [Usage](#usage)
- [Basic usage](#basic-usage)
- [More usage examples](#more-usage-examples)

## Supported services

The library supports both oAuth 1.x and oAuth 2.0 compliant services. A list of currently implemented services can be found below. More services will be implemented soon.

Included service implementations:

 - OAuth1
    - BitBucket
    - Etsy
    - FitBit
    - Flickr
    - Scoop.it!
    - Tumblr
    - Twitter
    - Xing
    - Yahoo
 - OAuth2
    - Amazon
    - BitLy
    - Box
    - Dailymotion
    - Dropbox
    - Facebook
    - Foursquare
    - GitHub
    - Google
    - Harvest
    - Heroku
    - Instagram
    - LinkedIn
    - Mailchimp
    - Microsoft
    - PayPal
    - Pocket
    - Reddit
    - RunKeeper
    - SoundCloud
    - Vkontakte
    - Yammer
- more to come!

To learn more about Lusitanian/PHPoAuthLib go [here](https://github.com/Lusitanian/PHPoAuthLib) 

## Installation

Add oauth-bundle to your composer.json file:

```json
"require": {
  "apinnecke/oauth-bundle": "~0.1"
}
```

Use composer to install this package.

```
$ composer update apinnecke/oauth-bundle
```

### Registering the Bundle

Register the bundle in your ```app/AppKernel.php```:

```php
    new \APinnecke\Bundle\OAuthBundle\APinneckeOAuthBundle(),
```

## Configuration

Now add required config to ```app/config/config.yml```: 

```yaml
apinnecke_oauth:
    resource_owners:
        xing:
            client_id: thisismyclientid
            client_secret: thisismyclientsecret
```

Xing is used as an example here. Replace it with whatever your want. Now add all the resource owners you need, the services are created automatically.

# Services

Services will be created automatically by this bundle. In my case, i want the xing service:
 
```php
    $service = $this->container->get('apinnecke_oauth.service.xing');
```

or inject it into another service:

```php
    fancy_company.random_namespace.wayne_bundle:
        class: FancyCompany\Bundle\WayneBundle\MyCool\ClassFor\WorldDominance
        arguments:
            - "@apinnecke_oauth.service.xing"
```

---

### More usage examples:

For examples go [here](https://github.com/Lusitanian/PHPoAuthLib/tree/master/examples)

