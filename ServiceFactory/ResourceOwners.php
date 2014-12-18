<?php

namespace APinnecke\Bundle\OAuthBundle\ServiceFactory;

final class ResourceOwners
{
    // OAuth V1
    const BIT_BUCKET = 'BitBucket';
    const ETSY = 'Etsy';
    const FIT_BIT = 'FitBit';
    const FLICKR = 'Flickr';
    const SCOOP_IT = 'ScoopeIt';
    const TUMBLR = 'Tumblr';
    const TWITTER = 'Twitter';
    const XING = 'Xing';
    const YAHOO = 'Yahoo';

    // OAuth V2
    const AMAZON = 'Amazon';
    const BITLY = 'Bitly';
    const BOX = 'Box';
    const BUFFER = 'Buffer';
    const DAILYMOTION = 'Dailymotion';
    const DROPBOX = 'Dropbox';
    const FACEBOOK = 'Facebook';
    const FOURSQuARE = 'Foursquare';
    const GITHUB = 'GitHub';
    const GOOGLE = 'Google';
    const HARVEST = 'Harvest';
    const HEROKU = 'Heroku';
    const INSTAGRAM = 'Instagram';
    const JAWBONE_UP = 'JawboneUP';
    const LINKED_IN = 'LinkedIn';
    const MAILCHIMP = 'Mailchimp';
    const MICROSOFT = 'Microsoft';
    const PAYPAL = 'Paypal';
    const POCKET = 'Pocket';
    const REDDIT = 'Reddit';
    const RUN_KEEPER = 'RunKeeper';
    const SALESFORCE = 'Salesforce';
    const SOUND_CLOUD = 'SoundCloud';
    const SPOTIFY = 'Spotify';
    const USTREAM = 'Ustream';
    const VKONTAKTE = 'Vkontakte';
    const YAMMER = 'Yammer';

    private function __construct()
    {
    }

    public static $all = [
        self::BIT_BUCKET => self::BIT_BUCKET,
        self::ETSY => self::ETSY,
        self::FIT_BIT => self::FIT_BIT,
        self::FLICKR => self::FLICKR,
        self::SCOOP_IT => self::SCOOP_IT,
        self::TUMBLR => self::TUMBLR,
        self::TWITTER => self::TWITTER,
        self::XING => self::XING,
        self::YAHOO => self::YAHOO,
        self::AMAZON => self::AMAZON,
        self::BITLY => self::BITLY,
        self::BOX => self::BOX,
        self::BUFFER => self::BUFFER,
        self::DAILYMOTION => self::DAILYMOTION,
        self::DROPBOX => self::DROPBOX,
        self::FACEBOOK => self::FACEBOOK,
        self::FOURSQuARE => self::FOURSQuARE,
        self::GITHUB => self::GITHUB,
        self::GOOGLE => self::GOOGLE,
        self::HARVEST => self::HARVEST,
        self::HEROKU => self::HEROKU,
        self::INSTAGRAM => self::INSTAGRAM,
        self::JAWBONE_UP => self::JAWBONE_UP,
        self::LINKED_IN => self::LINKED_IN,
        self::MAILCHIMP => self::MAILCHIMP,
        self::MICROSOFT => self::MICROSOFT,
        self::PAYPAL => self::PAYPAL,
        self::POCKET => self::POCKET,
        self::REDDIT => self::REDDIT,
        self::RUN_KEEPER => self::RUN_KEEPER,
        self::SALESFORCE => self::SALESFORCE,
        self::SOUND_CLOUD => self::SOUND_CLOUD,
        self::SPOTIFY => self::SPOTIFY,
        self::USTREAM => self::USTREAM,
        self::VKONTAKTE => self::VKONTAKTE,
        self::YAMMER => self::YAMMER,
    ];

    public static $oauth1 = [
        self::BIT_BUCKET => self::BIT_BUCKET,
        self::ETSY => self::ETSY,
        self::FIT_BIT => self::FIT_BIT,
        self::FLICKR => self::FLICKR,
        self::SCOOP_IT => self::SCOOP_IT,
        self::TUMBLR => self::TUMBLR,
        self::TWITTER => self::TWITTER,
        self::XING => self::XING,
        self::YAHOO => self::YAHOO,
    ];

    public static $oauth2 = [
        self::AMAZON => self::AMAZON,
        self::BITLY => self::BITLY,
        self::BOX => self::BOX,
        self::BUFFER => self::BUFFER,
        self::DAILYMOTION => self::DAILYMOTION,
        self::DROPBOX => self::DROPBOX,
        self::FACEBOOK => self::FACEBOOK,
        self::FOURSQuARE => self::FOURSQuARE,
        self::GITHUB => self::GITHUB,
        self::GOOGLE => self::GOOGLE,
        self::HARVEST => self::HARVEST,
        self::HEROKU => self::HEROKU,
        self::INSTAGRAM => self::INSTAGRAM,
        self::JAWBONE_UP => self::JAWBONE_UP,
        self::LINKED_IN => self::LINKED_IN,
        self::MAILCHIMP => self::MAILCHIMP,
        self::MICROSOFT => self::MICROSOFT,
        self::PAYPAL => self::PAYPAL,
        self::POCKET => self::POCKET,
        self::REDDIT => self::REDDIT,
        self::RUN_KEEPER => self::RUN_KEEPER,
        self::SALESFORCE => self::SALESFORCE,
        self::SOUND_CLOUD => self::SOUND_CLOUD,
        self::SPOTIFY => self::SPOTIFY,
        self::USTREAM => self::USTREAM,
        self::VKONTAKTE => self::VKONTAKTE,
        self::YAMMER => self::YAMMER,
    ];
}
 