<?php namespace RancherizeMailhog\Config;

/**
 * Class MailhogConfig
 * @package RancherizeMailhog\Config
 */
class MailhogConfig {

	/**
	 * @var bool
	 */
	protected $enabled = false;

	/**
	 * @var int
	 */
	protected $port = 0;

	/**
	 * @return bool
	 */
	public function isEnabled(): bool {
		return $this->enabled;
	}

	/**
	 * @param bool $enabled
	 * @return MailhogConfig
	 */
	public function setEnabled( bool $enabled ): MailhogConfig {
		$this->enabled = $enabled;
		return $this;
	}

	/**
	 * @return int
	 */
	public function getPort(): int {
		return $this->port;
	}

	/**
	 * @param int $port
	 * @return MailhogConfig
	 */
	public function setPort( int $port ): MailhogConfig {
		$this->port = $port;
		return $this;
	}


}