<?php

namespace Wikibase\DataModel\Term;

use InvalidArgumentException;

/**
 * Immutable value object.
 *
 * @since 0.7.3
 *
 * @licence GNU GPL v2+
 * @author Jeroen De Dauw < jeroendedauw@gmail.com >
 */
class Term {

	private $languageCode;
	private $text;

	/**
	 * @param string $languageCode
	 * @param string $text
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( $languageCode, $text ) {
		if ( !is_string( $languageCode ) ) {
			throw new InvalidArgumentException( '$languageCode should be a string' );
		}

		if ( !is_string( $text ) ) {
			throw new InvalidArgumentException( '$text should be a string' );
		}

		$this->languageCode = $languageCode;
		$this->text = $text;
	}

	/**
	 * @return string
	 */
	public function getLanguageCode() {
		return $this->languageCode;
	}

	/**
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

}