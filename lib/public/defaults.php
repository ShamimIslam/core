<?php
/**
 * @author Björn Schießle <schiessle@owncloud.com>
 * @author Lukas Reschke <lukas@owncloud.com>
 * @author Morris Jobke <hey@morrisjobke.de>
 * @author scolebrook <scolebrook@mac.com>
 *
 * @copyright Copyright (c) 2015, ownCloud, Inc.
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
// use OCP namespace for all classes that are considered public.
// This means that they should be used by apps instead of the internal ownCloud classes
namespace OCP;

/**
 * public api to access default strings and urls for your templates
 */
class Defaults {

	/**
	 * \OC_Defaults instance to retrieve the defaults
	 * @return string
	 */
	private $defaults;

	/**
	 * creates a \OC_Defaults instance which is used in all methods to retrieve the
	 * actual defaults
	 */
	function __construct() {
		$this->defaults = new \OC_Defaults();
	}

	/**
	 * get base URL for the organisation behind your ownCloud instance
	 * @return string
	 */
	public function getBaseUrl() {
		return $this->defaults->getBaseUrl();
	}

	/**
	 * link to the desktop sync client
	 * @return string
	 */
	public function getSyncClientUrl() {
		return $this->defaults->getSyncClientUrl();
	}

	/**
	 * link to the iOS client
	 * @return string
	 */
	public function getiOSClientUrl() {
		return $this->defaults->getiOSClientUrl();
	}

	/**
	 * link to the Android client
	 * @return string
	 */
	public function getAndroidClientUrl() {
		return $this->defaults->getAndroidClientUrl();
	}

	/**
	 * base URL to the documentation of your ownCloud instance
	 * @return string
	 */
	public function getDocBaseUrl() {
		return $this->defaults->getDocBaseUrl();
	}

	/**
	 * name of your ownCloud instance
	 * @return string
	 */
	public function getName() {
		return $this->defaults->getName();
	}

	/**
	 * name of your ownCloud instance containing HTML styles
	 * @return string
	 */
	public function getHTMLName() {
		return $this->defaults->getHTMLName();
	}

	/**
	 * Entity behind your onwCloud instance
	 * @return string
	 */
	public function getEntity() {
		return $this->defaults->getEntity();
	}

	/**
	 * ownCloud slogan
	 * @return string
	 */
	public function getSlogan() {
		return $this->defaults->getSlogan();
	}

	/**
	 * logo claim
	 * @return string
	 */
	public function getLogoClaim() {
		return $this->defaults->getLogoClaim();
	}

	/**
	 * footer, short version
	 * @return string
	 */
	public function getShortFooter() {
		return $this->defaults->getShortFooter();
	}

	/**
	 * footer, long version
	 * @return string
	 */
	public function getLongFooter() {
		return $this->defaults->getLongFooter();
	}

	/**
	 * Returns the AppId for the App Store for the iOS Client
	 * @return string AppId
	 */
	public function getiTunesAppId() {
		return $this->defaults->getiTunesAppId();
	}
}
