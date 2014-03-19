<?php

abstract class baseGuestGuestTypeQuery extends Query {

	function __construct($table_name = null, $alias = null) {
		if (null === $table_name) {
			$table_name = GuestGuestType::getTableName();
		}
		return parent::__construct($table_name, $alias);
	}

	/**
	 * Returns new instance of self by passing arguments directly to constructor.
	 * @param string $alias
	 * @return GuestGuestTypeQuery
	 */
	static function create($table_name = null, $alias = null) {
		return new GuestGuestTypeQuery($table_name, $alias);
	}

	/**
	 * @return GuestGuestType[]
	 */
	function select() {
		return GuestGuestType::doSelect($this);
	}

	/**
	 * @return GuestGuestType
	 */
	function selectOne() {
		$records = GuestGuestType::doSelect($this);
		return array_shift($records);
	}

	/**
	 * @return int
	 */
	function delete(){
		return GuestGuestType::doDelete($this);
	}

	/**
	 * @return int
	 */
	function count(){
		return GuestGuestType::doCount($this);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function addAnd($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && GuestGuestType::isTemporalType($type)) {
			$value = GuestGuestType::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = GuestGuestType::coerceTemporalValue($column, $type);
		}
		return parent::addAnd($column, $value, $operator, $quote);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function addOr($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && GuestGuestType::isTemporalType($type)) {
			$value = GuestGuestType::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = GuestGuestType::coerceTemporalValue($column, $type);
		}
		return parent::addOr($column, $value, $operator, $quote);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestId($integer) {
		return $this->addAnd(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdNot($integer) {
		return $this->andNot(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdLike($integer) {
		return $this->andLike(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdNotLike($integer) {
		return $this->andNotLike(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdGreater($integer) {
		return $this->andGreater(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdGreaterEqual($integer) {
		return $this->andGreaterEqual(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdLess($integer) {
		return $this->andLess(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdLessEqual($integer) {
		return $this->andLessEqual(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdNull() {
		return $this->andNull(GuestGuestType::GUEST_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdNotNull() {
		return $this->andNotNull(GuestGuestType::GUEST_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdBetween($integer, $from, $to) {
		return $this->andBetween(GuestGuestType::GUEST_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdBeginsWith($integer) {
		return $this->andBeginsWith(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdEndsWith($integer) {
		return $this->andEndsWith(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestIdContains($integer) {
		return $this->andContains(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestId($integer) {
		return $this->or(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdNot($integer) {
		return $this->orNot(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdLike($integer) {
		return $this->orLike(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdNotLike($integer) {
		return $this->orNotLike(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdGreater($integer) {
		return $this->orGreater(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdGreaterEqual($integer) {
		return $this->orGreaterEqual(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdLess($integer) {
		return $this->orLess(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdLessEqual($integer) {
		return $this->orLessEqual(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdNull() {
		return $this->orNull(GuestGuestType::GUEST_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdNotNull() {
		return $this->orNotNull(GuestGuestType::GUEST_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdBetween($integer, $from, $to) {
		return $this->orBetween(GuestGuestType::GUEST_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdBeginsWith($integer) {
		return $this->orBeginsWith(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdEndsWith($integer) {
		return $this->orEndsWith(GuestGuestType::GUEST_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestIdContains($integer) {
		return $this->orContains(GuestGuestType::GUEST_ID, $integer);
	}


	/**
	 * @return GuestGuestTypeQuery
	 */
	function orderByGuestIdAsc() {
		return $this->orderBy(GuestGuestType::GUEST_ID, self::ASC);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orderByGuestIdDesc() {
		return $this->orderBy(GuestGuestType::GUEST_ID, self::DESC);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function groupByGuestId() {
		return $this->groupBy(GuestGuestType::GUEST_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeId($integer) {
		return $this->addAnd(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdNot($integer) {
		return $this->andNot(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdLike($integer) {
		return $this->andLike(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdNotLike($integer) {
		return $this->andNotLike(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdGreater($integer) {
		return $this->andGreater(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdGreaterEqual($integer) {
		return $this->andGreaterEqual(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdLess($integer) {
		return $this->andLess(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdLessEqual($integer) {
		return $this->andLessEqual(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdNull() {
		return $this->andNull(GuestGuestType::GUEST_TYPE_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdNotNull() {
		return $this->andNotNull(GuestGuestType::GUEST_TYPE_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdBetween($integer, $from, $to) {
		return $this->andBetween(GuestGuestType::GUEST_TYPE_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdBeginsWith($integer) {
		return $this->andBeginsWith(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdEndsWith($integer) {
		return $this->andEndsWith(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andGuestTypeIdContains($integer) {
		return $this->andContains(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeId($integer) {
		return $this->or(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdNot($integer) {
		return $this->orNot(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdLike($integer) {
		return $this->orLike(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdNotLike($integer) {
		return $this->orNotLike(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdGreater($integer) {
		return $this->orGreater(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdGreaterEqual($integer) {
		return $this->orGreaterEqual(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdLess($integer) {
		return $this->orLess(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdLessEqual($integer) {
		return $this->orLessEqual(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdNull() {
		return $this->orNull(GuestGuestType::GUEST_TYPE_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdNotNull() {
		return $this->orNotNull(GuestGuestType::GUEST_TYPE_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdBetween($integer, $from, $to) {
		return $this->orBetween(GuestGuestType::GUEST_TYPE_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdBeginsWith($integer) {
		return $this->orBeginsWith(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdEndsWith($integer) {
		return $this->orEndsWith(GuestGuestType::GUEST_TYPE_ID, $integer);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orGuestTypeIdContains($integer) {
		return $this->orContains(GuestGuestType::GUEST_TYPE_ID, $integer);
	}


	/**
	 * @return GuestGuestTypeQuery
	 */
	function orderByGuestTypeIdAsc() {
		return $this->orderBy(GuestGuestType::GUEST_TYPE_ID, self::ASC);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orderByGuestTypeIdDesc() {
		return $this->orderBy(GuestGuestType::GUEST_TYPE_ID, self::DESC);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function groupByGuestTypeId() {
		return $this->groupBy(GuestGuestType::GUEST_TYPE_ID);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreated($integer_timestamp) {
		return $this->addAnd(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedNot($integer_timestamp) {
		return $this->andNot(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedLike($integer_timestamp) {
		return $this->andLike(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedNotLike($integer_timestamp) {
		return $this->andNotLike(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedGreater($integer_timestamp) {
		return $this->andGreater(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedLess($integer_timestamp) {
		return $this->andLess(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedNull() {
		return $this->andNull(GuestGuestType::CREATED);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedNotNull() {
		return $this->andNotNull(GuestGuestType::CREATED);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(GuestGuestType::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function andCreatedContains($integer_timestamp) {
		return $this->andContains(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreated($integer_timestamp) {
		return $this->or(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedNot($integer_timestamp) {
		return $this->orNot(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedLike($integer_timestamp) {
		return $this->orLike(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedNotLike($integer_timestamp) {
		return $this->orNotLike(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedGreater($integer_timestamp) {
		return $this->orGreater(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedLess($integer_timestamp) {
		return $this->orLess(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedNull() {
		return $this->orNull(GuestGuestType::CREATED);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedNotNull() {
		return $this->orNotNull(GuestGuestType::CREATED);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(GuestGuestType::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(GuestGuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orCreatedContains($integer_timestamp) {
		return $this->orContains(GuestGuestType::CREATED, $integer_timestamp);
	}


	/**
	 * @return GuestGuestTypeQuery
	 */
	function orderByCreatedAsc() {
		return $this->orderBy(GuestGuestType::CREATED, self::ASC);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function orderByCreatedDesc() {
		return $this->orderBy(GuestGuestType::CREATED, self::DESC);
	}

	/**
	 * @return GuestGuestTypeQuery
	 */
	function groupByCreated() {
		return $this->groupBy(GuestGuestType::CREATED);
	}


}