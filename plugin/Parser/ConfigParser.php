<?php namespace RancherizeMailhog\Parser;

use Rancherize\Configuration\Configuration;
use Rancherize\Configuration\PrefixConfigurationDecorator;
use RancherizeMailhog\Config\MailhogConfig;

/**
 * Class ConfigParser
 * @package RancherizeMailhog\Parser
 */
class ConfigParser {

	/**
	 * @param Configuration $configuration
	 */
	public function parse( Configuration $configuration ) {
		$mailhogConfiguration = new PrefixConfigurationDecorator( $configuration, 'mailhog.' );

		$config = new MailhogConfig();

		if ( !$configuration->has( 'mailhog' ) )
			return $config;

		$config->setEnabled( true );
		$config->setPort( $mailhogConfiguration->get('port') );

		return $config;

	}

}