<?php

namespace Wikibase\DataModel\Statement;

use Comparable;
use InvalidArgumentException;
use Wikibase\DataModel\Entity\EntityId;

/**
 * @since 3.0
 *
 * @licence GNU GPL v2+
 * @author Adam Shorland
 */
class StatementGuid implements Comparable {

	/**
	 * The separator for the prefix and suffix of the GUID.
	 */
	const SEPARATOR = '$';

	private $entityId;
	private $serialization;

	/**
	 * @param EntityId $entityId
	 * @param string $guid
	 *
	 * @throws InvalidArgumentException
	 */
	public function __construct( $entityId, $guid ) {
		if ( !$entityId instanceof EntityId ) {
			throw new InvalidArgumentException( '$entityId must be an instance of EntityId' );
		}
		if ( !is_string( $guid ) ) {
			throw new InvalidArgumentException( '$guid must be a string' );
		}

		$this->serialization = $entityId->getSerialization() . self::SEPARATOR . $guid;
		$this->entityId = $entityId;
	}

	/**
	 * @return EntityId
	 */
	public function getEntityId() {
		return $this->entityId;
	}

	/**
	 * @return string
	 */
	public function getSerialization() {
		return $this->serialization;
	}

	/**
	 * @param StatementGuid $target
	 *
	 * @return bool
	 */
	public function equals( $target ) {
		if ( $this === $target ) {
			return true;
		}

		return $target instanceof self
		&& $target->serialization === $this->serialization;
	}

	public function __toString() {
		return $this->serialization;
	}

}