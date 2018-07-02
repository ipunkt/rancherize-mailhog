<?php namespace RancherizeMailhog\Event;

use Rancherize\Blueprint\Events\MainServiceBuiltEvent;
use Rancherize\Blueprint\Infrastructure\Service\Service;
use Rancherize\Services\BuildServiceEvent\InfrastructureBuiltEvent;
use RancherizeMailhog\Parser\ConfigParser;

/**
 * Class EventHandler
 * @package RancherizeMailhog\Event
 */
class EventHandler {
	/**
	 * @var ConfigParser
	 */
	private $configParser;

	/**
	 * EventHandler constructor.
	 * @param ConfigParser $configParser
	 */
	public function __construct( ConfigParser $configParser ) {
		$this->configParser = $configParser;
	}

	/**
	 * @param MainServiceBuiltEvent $event
	 */
	public function built( MainServiceBuiltEvent $event ) {

		$mainService = $event->getMainService();
		$configuration = $event->getEnvironmentConfiguration();

		$mailhogConfig = $this->configParser->parse( $configuration );
		if ( !$mailhogConfig->isEnabled() )
			return;

		$mailhogService = new Service();
		$mailhogService->setName( 'Mailhog' );
		$mailhogService->setImage( 'mailhog/mailhog:v1.0.0' );

		$mainService->addLink( $mailhogService, 'mailhog' );
		$mainService->setEnvironmentVariable( 'MAIL_HOST', 'mailhog' );
		$mainService->setEnvironmentVariable( 'MAIL_PORT', '1025' );
		if ( $mailhogConfig->isExposed() )
			$mailhogService->expose( 8025, $mailhogConfig->getPort() );

		$event->getInfrastructure()->addService( $mailhogService );


	}
}