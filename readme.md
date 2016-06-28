Updated the git with only the most necessary things.
To install on the localhost (engine) please follow these steps:
- Pull all the files from git
- Copy and paste them to your working laravel installation
- Follow the steps from these URLs for each packages:
    - https://github.com/cviebrock/eloquent-sluggable
    - https://laravel.com/docs/5.2/mail (on SES section)
    - https://github.com/laravel/socialite
    - https://laravelcollective.com/docs/5.2/html

composer.json should look like this:

    "name": "laravel/laravel",
    "description": "The Laravel Framework.",
    "keywords": ["framework", "laravel"],
    "license": "MIT",
    "type": "project",
    "require": {
        "php": ">=5.5.9",
        "laravel/framework": "5.2.*",
        "cviebrock/eloquent-sluggable": "~4.0@dev",
        "laravel/socialite": "^2.0",
        "laravelcollective/html": "5.2.*",
        "aws/aws-sdk-php": "~3.0"
    },
    "require-dev": {
        "fzaninotto/faker": "~1.4",
        "mockery/mockery": "0.9.*",
        "phpunit/phpunit": "~4.0",
        "symfony/css-selector": "2.8.*|3.0.*",
        "symfony/dom-crawler": "2.8.*|3.0.*"
    },
    "autoload": {
        "classmap": [
            "database"
        ],
        "psr-4": {
            "App\\": "app/"
        }
    },
    "autoload-dev": {
        "classmap": [
            "tests/TestCase.php"
        ]
    },
    "scripts": {
        "post-root-package-install": [
            "php -r \"copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "php artisan key:generate"
        ],
        "post-install-cmd": [
            "Illuminate\\Foundation\\ComposerScripts::postInstall",
            "php artisan optimize"
        ],
        "post-update-cmd": [
            "Illuminate\\Foundation\\ComposerScripts::postUpdate",
            "php artisan optimize"
        ]
    },
    "config": {
        "preferred-install": "dist"
    }
}
