<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Blade Template Global Variables
    |--------------------------------------------------------------------------
    |
    | Created this to store a single source of truth for blade variables
    |
    */

    'links' => [
        'social' => [
            'facebook'      => ['url' => 'https://www.facebook.com/iosifvee/', 'icon' => 'fa fa-facebook-f', 'text' => 'Check out my FB'],
            'instagram'     => ['url' => 'https://www.instagram.com/iosifvee/', 'icon' => 'fa fa-instagram', 'text' => 'Good pictures, no selfies'],
            'linkedin'      => ['url' => 'https://www.linkedin.com/in/iosifv', 'icon' => 'fa fa-linkedin', 'text' => 'Linkedin'],
            'twitter'       => ['url' => 'https://twitter.com/iosifvee/', 'icon' => 'fa fa-twitter', 'text' => 'Twitter'],
        ],

        'contact' => [
            'phone'         => ['url' => 'tel:+44 759 713 7739', 'icon' => 'fa fa-phone', 'text' => 'Just call me'],
            'whatsapp'      => ['url' => 'https://wa.me/447597137739', 'icon' => 'fa fa-whatsapp', 'text' => 'DM me on Whatsapp'],
//            'messenger'     => ['url' => 'https://fb.com/msg/iosifvee', 'icon' => 'fab fa-facebook-messenger', 'text' => 'DM me on Messenger'],
            'messenger'     => ['url' => 'https://fb.com/msg/iosifvee', 'icon' => 'fa fa-comments', 'text' => 'DM me on Messenger'],
            'snapchat'      => ['url' => 'https://www.snapchat.com/add/iosifvee/', 'icon' => 'fa fa-snapchat', 'text' => 'DM me on Snapchat'],
//            'calendly'      => ['url' => 'https://calendly.com/iosifv', 'icon' => '', 'text' => 'Book a meeting'],
            'vcf'           => ['url' => mix('assets/iosifv.vcf'), 'icon' => 'fa fa-user-circle', 'text' => 'Download contact file to your phone'],
        ],

        'development' => [
            'stackoverflow' => ['url' => 'https://stackoverflow.com/users/3219816/iosifv', 'icon' => 'fa fa-stack-overflow', 'text' => 'Stackoverflow'],
            'github'        => ['url' => 'https://github.com/iosifv', 'icon' => 'fa fa-github', 'text' => 'Github'],
            'bitbucket'     => ['url' => 'https://bitbucket.org/iosifvigh/', 'icon' => 'fa fa-bitbucket', 'text' => 'Bitbucket'],
        ],

//        'money' => [
//            'paypal'        => ['url' => 'https://www.paypal.com/paypalme/iosifvee', 'icon' => 'fab fa-paypal', 'text' => ''],
//        ],

        'crypto' => [
            'btc-wallet'    => ['url' => 'https://www.blockchain.com/btc/address/bc1qhuz60p86kuakx99e2k8lkvpfstu7yfyj85qu76', 'icon' => 'fa fa-btc', 'text' => 'BTC Address'],
            'eth-wallet'    => ['url' => 'https://etherscan.io/address/0x2807DcEB543909a9173Df3c3Cb703f9447e6b771', 'icon' => 'fa fa-btc', 'text' => 'ETH Address (iosifv.eth)'],
        ],

//        'affiliate' => [
//            'hired' => ['url' => 'https://hired.com/x/1mmag', 'icon' => '', 'text' => ''],
//        'talent.io' => ['url' => 'https://www.talent.io/ref/cUy2Sseq']
//        ],

//        'misc' => [
//            'chess'         => ['url' => 'https://www.chess.com/stats/daily/chess/iosifv', 'icon' => 'fas fa-chess-knight', 'text' => 'Lets play some chess'],
//            'udemy'         => ['url' => 'https://www.udemy.com/user/iosif-v/', 'icon' => 'fas fa-graduation-cap fa-2x', 'text' => ''],
//        ],

//        'protected' => [],
    ]
];
