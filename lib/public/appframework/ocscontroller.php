<?php
/**
 * @author Bernhard Posselt <dev@bernhard-posselt.com>
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
namespace OCP\AppFramework;

use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Http\OCSResponse;
use OCP\IRequest;


/**
 * Base class to inherit your controllers from that are used for RESTful APIs
 */
abstract class OCSController extends ApiController {

	/**
	 * constructor of the controller
	 * @param string $appName the name of the app
	 * @param IRequest $request an instance of the request
	 * @param string $corsMethods: comma seperated string of HTTP verbs which
	 * should be allowed for websites or webapps when calling your API, defaults to
	 * 'PUT, POST, GET, DELETE, PATCH'
	 * @param string $corsAllowedHeaders: comma seperated string of HTTP headers
	 * which should be allowed for websites or webapps when calling your API,
	 * defaults to 'Authorization, Content-Type, Accept'
	 * @param int $corsMaxAge number in seconds how long a preflighted OPTIONS
	 * request should be cached, defaults to 1728000 seconds
	 */
	public function __construct($appName,
								IRequest $request,
								$corsMethods='PUT, POST, GET, DELETE, PATCH',
								$corsAllowedHeaders='Authorization, Content-Type, Accept',
								$corsMaxAge=1728000){
		parent::__construct($appName, $request, $corsMethods,
							$corsAllowedHeaders, $corsMaxAge);
		$this->registerResponder('json', function ($data) {
			return $this->buildOCSResponse('json', $data);
		});
		$this->registerResponder('xml', function ($data) {
			return $this->buildOCSResponse('xml', $data);
		});
	}


	/**
	 * Unwrap data and build ocs response
	 * @param string $format json or xml
	 * @param array|DataResponse $data the data which should be transformed
	 */
	private function buildOCSResponse($format, $data) {
		if ($data instanceof DataResponse) {
			$data = $data->getData();
		}

		$params = [
			'status' => 'OK',
			'statuscode' => 100,
			'message' => 'OK',
			'data' => [],
			'tag' => '',
			'tagattribute' => '',
			'dimension' => 'dynamic',
			'itemscount' => '',
			'itemsperpage' => ''
		];

		foreach ($data as $key => $value) {
			$params[$key] = $value;
		}

		return new OCSResponse(
			$format, $params['status'], $params['statuscode'],
			$params['message'], $params['data'], $params['tag'],
			$params['tagattribute'], $params['dimension'],
			$params['itemscount'], $params['itemsperpage']
		);
	}

}
