<?php namespace RancherizeMailhog\Event;

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
	public function __construct( ConfigParser $configParser) {
		$this->configParser = $configParser;
	}

	/**
	 * @param InfrastructureBuiltEvent $event
	 */
	public function built( InfrastructureBuiltEvent $event ) {

		$configuration = $event->getConfiguration();


	}
}