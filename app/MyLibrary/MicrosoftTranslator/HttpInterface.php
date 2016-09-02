<?php 
namespace App\MyLibrary\MicrosoftTranslator;

interface HttpInterface
{
	/**
	 * GET API endpoint
	 *
	 * @param string      $url
	 * @param string|null $access_token
	 * @param array       $parameters
	 * @param string      $contentType
	 *
	 * @return array
	 */
	public function get( $url , $access_token = null , $parameters = array() , $contentType = 'text/xml' );

	/**
	 * POST API endpoint
	 *
	 * @param string       $url
	 * @param string|null  $access_token
	 * @param string|array $parameters
	 * @param string       $contentType
	 *
	 * @return array
	 */
	public function post( $url , $access_token = null , $parameters = array() , $contentType = 'text/xml' );

	/**
	 * PUT API endpoint
	 *
	 * @param string       $url
	 * @param string|null  $access_token
	 * @param string|array $parameters
	 * @param string       $contentType
	 *
	 * @return array
	 */
	public function put( $url , $access_token = null , $parameters = array() , $contentType = 'text/xml' );

	/**
	 * DELETE API endpoint
	 *
	 * @param string       $url
	 * @param string|null  $access_token
	 * @param string|array $parameters
	 * @param string       $contentType
	 *
	 * @return array
	 */
	public function delete( $url , $access_token = null , $parameters = array() , $contentType = 'text/xml' );
}