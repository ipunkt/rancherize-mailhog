<?php

use Rancherize\Plugin\Provider;
use Rancherize\Plugin\ProviderTrait;
use Rancherize\Services\BuildServiceEvent\InfrastructureBuiltEvent;
use RancherizeMailhog\Event\EventHandler;
use RancherizeMailhog\Parser\ConfigParser;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class MailhogProvider
 */
class MailhogProvider implements Provider {

	use ProviderTrait;

	/**
	 */
	public function register() {
		$this->container[ConfigParser::class] = function () {
			return new ConfigParser();
		};

		$this->container[EventHandler::class] = function ( $c ) {
			return new EventHandler( $c[ConfigParser::class] );
		};
	}

	/**
	 */
	public function boot() {
		/**
		 * @var EventDispatcher $dispatcher
		 */
		$dispatcher = $this->container['event'];
		$listener = $this->container[EventHandler::class];
		$dispatcher->addListener( InfrastructureBuiltEvent::class, [$listener, 'built'] );
	}
}