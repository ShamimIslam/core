<?php
/**
 * @author Robin Appelman <icewind@owncloud.com>
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
namespace OCP\App;

use OCP\IUser;

interface IAppManager {
	/**
	 * Check if an app is enabled for user
	 *
	 * @param string $appId
	 * @param \OCP\IUser $user (optional) if not defined, the currently loggedin user will be used
	 * @return bool
	 */
	public function isEnabledForUser($appId, $user = null);

	/**
	 * Check if an app is installed in the instance
	 *
	 * @param string $appId
	 * @return bool
	 */
	public function isInstalled($appId);

	/**
	 * Enable an app for every user
	 *
	 * @param string $appId
	 */
	public function enableApp($appId);

	/**
	 * Enable an app only for specific groups
	 *
	 * @param string $appId
	 * @param \OCP\IGroup[] $groups
	 */
	public function enableAppForGroups($appId, $groups);

	/**
	 * Disable an app for every user
	 *
	 * @param string $appId
	 */
	public function disableApp($appId);

	/**
	 * List all apps enabled for a user
	 *
	 * @param \OCP\IUser $user
	 * @return string[]
	 */
	public function getEnabledAppsForUser(IUser $user);

	/**
	 * List all installed apps
	 *
	 * @return string[]
	 */
	public function getInstalledApps();
}
