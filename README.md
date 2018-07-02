# rancherize-mailhog
mailhog rancherize plugin

## Install
If you are using the rancherize docker container:

	rancherize plugin:register ipunkt/rancherize-mailhog

If you are using rancherize via composer:

	rancherize plugin:install ipunkt/rancherize-mailhog:^1.0.0
	
## Use
Add the following section to your environment or `default`-section of your rancherize.json:

```json
"mailhog":{
	"port":PORT_TO_EXPOSE_ON
}
```

Example:
```json
"mailhog":{
	"port":9081
}
```

## Details
It will set the following variables on your main service:
MAIL_HOST: `mailhog`
MAIL_PORT: `1025`
SMTP_SERVER: `mailhog:1025`

SMTP_SERVER enables sendmail via mailhog when using the webserver or php-cli ipunkt blueprints.
MAIL_HOST and MAIL_PORT will cause a laravel project to send via mailhog
