<?php

abstract class baseGuestQuery extends Query {

	function __construct($table_name = null, $alias = null) {
		if (null === $table_name) {
			$table_name = Guest::getTableName();
		}
		return parent::__construct($table_name, $alias);
	}

	/**
	 * Returns new instance of self by passing arguments directly to constructor.
	 * @param string $alias
	 * @return GuestQuery
	 */
	static function create($table_name = null, $alias = null) {
		return new GuestQuery($table_name, $alias);
	}

	/**
	 * @return Guest[]
	 */
	function select() {
		return Guest::doSelect($this);
	}

	/**
	 * @return Guest
	 */
	function selectOne() {
		$records = Guest::doSelect($this);
		return array_shift($records);
	}

	/**
	 * @return int
	 */
	function delete(){
		return Guest::doDelete($this);
	}

	/**
	 * @return int
	 */
	function count(){
		return Guest::doCount($this);
	}

	/**
	 * @return GuestQuery
	 */
	function addAnd($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Guest::isTemporalType($type)) {
			$value = Guest::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Guest::coerceTemporalValue($column, $type);
		}
		return parent::addAnd($column, $value, $operator, $quote);
	}

	/**
	 * @return GuestQuery
	 */
	function addOr($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Guest::isTemporalType($type)) {
			$value = Guest::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Guest::coerceTemporalValue($column, $type);
		}
		return parent::addOr($column, $value, $operator, $quote);
	}

	/**
	 * @return GuestQuery
	 */
	function andId($integer) {
		return $this->addAnd(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdNot($integer) {
		return $this->andNot(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdLike($integer) {
		return $this->andLike(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdNotLike($integer) {
		return $this->andNotLike(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdGreater($integer) {
		return $this->andGreater(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdLess($integer) {
		return $this->andLess(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdLessEqual($integer) {
		return $this->andLessEqual(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdNull() {
		return $this->andNull(Guest::ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdNotNull() {
		return $this->andNotNull(Guest::ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdBetween($integer, $from, $to) {
		return $this->andBetween(Guest::ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdBeginsWith($integer) {
		return $this->andBeginsWith(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdEndsWith($integer) {
		return $this->andEndsWith(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andIdContains($integer) {
		return $this->andContains(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orId($integer) {
		return $this->or(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdNot($integer) {
		return $this->orNot(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdLike($integer) {
		return $this->orLike(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdNotLike($integer) {
		return $this->orNotLike(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdGreater($integer) {
		return $this->orGreater(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdLess($integer) {
		return $this->orLess(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdLessEqual($integer) {
		return $this->orLessEqual(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdNull() {
		return $this->orNull(Guest::ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdNotNull() {
		return $this->orNotNull(Guest::ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdBetween($integer, $from, $to) {
		return $this->orBetween(Guest::ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdBeginsWith($integer) {
		return $this->orBeginsWith(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdEndsWith($integer) {
		return $this->orEndsWith(Guest::ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orIdContains($integer) {
		return $this->orContains(Guest::ID, $integer);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByIdAsc() {
		return $this->orderBy(Guest::ID, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByIdDesc() {
		return $this->orderBy(Guest::ID, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupById() {
		return $this->groupBy(Guest::ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentId($integer) {
		return $this->addAnd(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdNot($integer) {
		return $this->andNot(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdLike($integer) {
		return $this->andLike(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdNotLike($integer) {
		return $this->andNotLike(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdGreater($integer) {
		return $this->andGreater(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdLess($integer) {
		return $this->andLess(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdLessEqual($integer) {
		return $this->andLessEqual(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdNull() {
		return $this->andNull(Guest::PARENT_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdNotNull() {
		return $this->andNotNull(Guest::PARENT_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdBetween($integer, $from, $to) {
		return $this->andBetween(Guest::PARENT_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdBeginsWith($integer) {
		return $this->andBeginsWith(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdEndsWith($integer) {
		return $this->andEndsWith(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andParentIdContains($integer) {
		return $this->andContains(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentId($integer) {
		return $this->or(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdNot($integer) {
		return $this->orNot(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdLike($integer) {
		return $this->orLike(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdNotLike($integer) {
		return $this->orNotLike(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdGreater($integer) {
		return $this->orGreater(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdLess($integer) {
		return $this->orLess(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdLessEqual($integer) {
		return $this->orLessEqual(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdNull() {
		return $this->orNull(Guest::PARENT_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdNotNull() {
		return $this->orNotNull(Guest::PARENT_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdBetween($integer, $from, $to) {
		return $this->orBetween(Guest::PARENT_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdBeginsWith($integer) {
		return $this->orBeginsWith(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdEndsWith($integer) {
		return $this->orEndsWith(Guest::PARENT_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orParentIdContains($integer) {
		return $this->orContains(Guest::PARENT_ID, $integer);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByParentIdAsc() {
		return $this->orderBy(Guest::PARENT_ID, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByParentIdDesc() {
		return $this->orderBy(Guest::PARENT_ID, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByParentId() {
		return $this->groupBy(Guest::PARENT_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressId($integer) {
		return $this->addAnd(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdNot($integer) {
		return $this->andNot(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdLike($integer) {
		return $this->andLike(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdNotLike($integer) {
		return $this->andNotLike(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdGreater($integer) {
		return $this->andGreater(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdLess($integer) {
		return $this->andLess(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdLessEqual($integer) {
		return $this->andLessEqual(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdNull() {
		return $this->andNull(Guest::ADDRESS_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdNotNull() {
		return $this->andNotNull(Guest::ADDRESS_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdBetween($integer, $from, $to) {
		return $this->andBetween(Guest::ADDRESS_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdBeginsWith($integer) {
		return $this->andBeginsWith(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdEndsWith($integer) {
		return $this->andEndsWith(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andAddressIdContains($integer) {
		return $this->andContains(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressId($integer) {
		return $this->or(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdNot($integer) {
		return $this->orNot(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdLike($integer) {
		return $this->orLike(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdNotLike($integer) {
		return $this->orNotLike(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdGreater($integer) {
		return $this->orGreater(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdLess($integer) {
		return $this->orLess(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdLessEqual($integer) {
		return $this->orLessEqual(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdNull() {
		return $this->orNull(Guest::ADDRESS_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdNotNull() {
		return $this->orNotNull(Guest::ADDRESS_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdBetween($integer, $from, $to) {
		return $this->orBetween(Guest::ADDRESS_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdBeginsWith($integer) {
		return $this->orBeginsWith(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdEndsWith($integer) {
		return $this->orEndsWith(Guest::ADDRESS_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orAddressIdContains($integer) {
		return $this->orContains(Guest::ADDRESS_ID, $integer);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByAddressIdAsc() {
		return $this->orderBy(Guest::ADDRESS_ID, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByAddressIdDesc() {
		return $this->orderBy(Guest::ADDRESS_ID, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByAddressId() {
		return $this->groupBy(Guest::ADDRESS_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingId($integer) {
		return $this->addAnd(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdNot($integer) {
		return $this->andNot(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdLike($integer) {
		return $this->andLike(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdNotLike($integer) {
		return $this->andNotLike(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdGreater($integer) {
		return $this->andGreater(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdLess($integer) {
		return $this->andLess(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdLessEqual($integer) {
		return $this->andLessEqual(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdNull() {
		return $this->andNull(Guest::WEDDING_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdNotNull() {
		return $this->andNotNull(Guest::WEDDING_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdBetween($integer, $from, $to) {
		return $this->andBetween(Guest::WEDDING_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdBeginsWith($integer) {
		return $this->andBeginsWith(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdEndsWith($integer) {
		return $this->andEndsWith(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andWeddingIdContains($integer) {
		return $this->andContains(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingId($integer) {
		return $this->or(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdNot($integer) {
		return $this->orNot(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdLike($integer) {
		return $this->orLike(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdNotLike($integer) {
		return $this->orNotLike(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdGreater($integer) {
		return $this->orGreater(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdLess($integer) {
		return $this->orLess(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdLessEqual($integer) {
		return $this->orLessEqual(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdNull() {
		return $this->orNull(Guest::WEDDING_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdNotNull() {
		return $this->orNotNull(Guest::WEDDING_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdBetween($integer, $from, $to) {
		return $this->orBetween(Guest::WEDDING_ID, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdBeginsWith($integer) {
		return $this->orBeginsWith(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdEndsWith($integer) {
		return $this->orEndsWith(Guest::WEDDING_ID, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orWeddingIdContains($integer) {
		return $this->orContains(Guest::WEDDING_ID, $integer);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByWeddingIdAsc() {
		return $this->orderBy(Guest::WEDDING_ID, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByWeddingIdDesc() {
		return $this->orderBy(Guest::WEDDING_ID, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByWeddingId() {
		return $this->groupBy(Guest::WEDDING_ID);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstName($varchar) {
		return $this->addAnd(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameNot($varchar) {
		return $this->andNot(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameLike($varchar) {
		return $this->andLike(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameNotLike($varchar) {
		return $this->andNotLike(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameGreater($varchar) {
		return $this->andGreater(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameGreaterEqual($varchar) {
		return $this->andGreaterEqual(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameLess($varchar) {
		return $this->andLess(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameLessEqual($varchar) {
		return $this->andLessEqual(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameNull() {
		return $this->andNull(Guest::FIRST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameNotNull() {
		return $this->andNotNull(Guest::FIRST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameBetween($varchar, $from, $to) {
		return $this->andBetween(Guest::FIRST_NAME, $varchar, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameBeginsWith($varchar) {
		return $this->andBeginsWith(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameEndsWith($varchar) {
		return $this->andEndsWith(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andFirstNameContains($varchar) {
		return $this->andContains(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstName($varchar) {
		return $this->or(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameNot($varchar) {
		return $this->orNot(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameLike($varchar) {
		return $this->orLike(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameNotLike($varchar) {
		return $this->orNotLike(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameGreater($varchar) {
		return $this->orGreater(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameGreaterEqual($varchar) {
		return $this->orGreaterEqual(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameLess($varchar) {
		return $this->orLess(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameLessEqual($varchar) {
		return $this->orLessEqual(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameNull() {
		return $this->orNull(Guest::FIRST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameNotNull() {
		return $this->orNotNull(Guest::FIRST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameBetween($varchar, $from, $to) {
		return $this->orBetween(Guest::FIRST_NAME, $varchar, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameBeginsWith($varchar) {
		return $this->orBeginsWith(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameEndsWith($varchar) {
		return $this->orEndsWith(Guest::FIRST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orFirstNameContains($varchar) {
		return $this->orContains(Guest::FIRST_NAME, $varchar);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByFirstNameAsc() {
		return $this->orderBy(Guest::FIRST_NAME, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByFirstNameDesc() {
		return $this->orderBy(Guest::FIRST_NAME, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByFirstName() {
		return $this->groupBy(Guest::FIRST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastName($varchar) {
		return $this->addAnd(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameNot($varchar) {
		return $this->andNot(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameLike($varchar) {
		return $this->andLike(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameNotLike($varchar) {
		return $this->andNotLike(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameGreater($varchar) {
		return $this->andGreater(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameGreaterEqual($varchar) {
		return $this->andGreaterEqual(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameLess($varchar) {
		return $this->andLess(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameLessEqual($varchar) {
		return $this->andLessEqual(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameNull() {
		return $this->andNull(Guest::LAST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameNotNull() {
		return $this->andNotNull(Guest::LAST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameBetween($varchar, $from, $to) {
		return $this->andBetween(Guest::LAST_NAME, $varchar, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameBeginsWith($varchar) {
		return $this->andBeginsWith(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameEndsWith($varchar) {
		return $this->andEndsWith(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andLastNameContains($varchar) {
		return $this->andContains(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastName($varchar) {
		return $this->or(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameNot($varchar) {
		return $this->orNot(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameLike($varchar) {
		return $this->orLike(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameNotLike($varchar) {
		return $this->orNotLike(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameGreater($varchar) {
		return $this->orGreater(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameGreaterEqual($varchar) {
		return $this->orGreaterEqual(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameLess($varchar) {
		return $this->orLess(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameLessEqual($varchar) {
		return $this->orLessEqual(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameNull() {
		return $this->orNull(Guest::LAST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameNotNull() {
		return $this->orNotNull(Guest::LAST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameBetween($varchar, $from, $to) {
		return $this->orBetween(Guest::LAST_NAME, $varchar, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameBeginsWith($varchar) {
		return $this->orBeginsWith(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameEndsWith($varchar) {
		return $this->orEndsWith(Guest::LAST_NAME, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orLastNameContains($varchar) {
		return $this->orContains(Guest::LAST_NAME, $varchar);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByLastNameAsc() {
		return $this->orderBy(Guest::LAST_NAME, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByLastNameDesc() {
		return $this->orderBy(Guest::LAST_NAME, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByLastName() {
		return $this->groupBy(Guest::LAST_NAME);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCode($varchar) {
		return $this->addAnd(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeNot($varchar) {
		return $this->andNot(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeLike($varchar) {
		return $this->andLike(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeNotLike($varchar) {
		return $this->andNotLike(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeGreater($varchar) {
		return $this->andGreater(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeGreaterEqual($varchar) {
		return $this->andGreaterEqual(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeLess($varchar) {
		return $this->andLess(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeLessEqual($varchar) {
		return $this->andLessEqual(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeNull() {
		return $this->andNull(Guest::ACTIVATION_CODE);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeNotNull() {
		return $this->andNotNull(Guest::ACTIVATION_CODE);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeBetween($varchar, $from, $to) {
		return $this->andBetween(Guest::ACTIVATION_CODE, $varchar, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeBeginsWith($varchar) {
		return $this->andBeginsWith(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeEndsWith($varchar) {
		return $this->andEndsWith(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function andActivationCodeContains($varchar) {
		return $this->andContains(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCode($varchar) {
		return $this->or(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeNot($varchar) {
		return $this->orNot(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeLike($varchar) {
		return $this->orLike(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeNotLike($varchar) {
		return $this->orNotLike(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeGreater($varchar) {
		return $this->orGreater(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeGreaterEqual($varchar) {
		return $this->orGreaterEqual(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeLess($varchar) {
		return $this->orLess(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeLessEqual($varchar) {
		return $this->orLessEqual(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeNull() {
		return $this->orNull(Guest::ACTIVATION_CODE);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeNotNull() {
		return $this->orNotNull(Guest::ACTIVATION_CODE);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeBetween($varchar, $from, $to) {
		return $this->orBetween(Guest::ACTIVATION_CODE, $varchar, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeBeginsWith($varchar) {
		return $this->orBeginsWith(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeEndsWith($varchar) {
		return $this->orEndsWith(Guest::ACTIVATION_CODE, $varchar);
	}

	/**
	 * @return GuestQuery
	 */
	function orActivationCodeContains($varchar) {
		return $this->orContains(Guest::ACTIVATION_CODE, $varchar);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByActivationCodeAsc() {
		return $this->orderBy(Guest::ACTIVATION_CODE, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByActivationCodeDesc() {
		return $this->orderBy(Guest::ACTIVATION_CODE, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByActivationCode() {
		return $this->groupBy(Guest::ACTIVATION_CODE);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCount($integer) {
		return $this->addAnd(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountNot($integer) {
		return $this->andNot(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountLike($integer) {
		return $this->andLike(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountNotLike($integer) {
		return $this->andNotLike(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountGreater($integer) {
		return $this->andGreater(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountGreaterEqual($integer) {
		return $this->andGreaterEqual(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountLess($integer) {
		return $this->andLess(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountLessEqual($integer) {
		return $this->andLessEqual(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountNull() {
		return $this->andNull(Guest::EXPECTED_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountNotNull() {
		return $this->andNotNull(Guest::EXPECTED_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountBetween($integer, $from, $to) {
		return $this->andBetween(Guest::EXPECTED_COUNT, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountBeginsWith($integer) {
		return $this->andBeginsWith(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountEndsWith($integer) {
		return $this->andEndsWith(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andExpectedCountContains($integer) {
		return $this->andContains(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCount($integer) {
		return $this->or(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountNot($integer) {
		return $this->orNot(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountLike($integer) {
		return $this->orLike(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountNotLike($integer) {
		return $this->orNotLike(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountGreater($integer) {
		return $this->orGreater(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountGreaterEqual($integer) {
		return $this->orGreaterEqual(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountLess($integer) {
		return $this->orLess(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountLessEqual($integer) {
		return $this->orLessEqual(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountNull() {
		return $this->orNull(Guest::EXPECTED_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountNotNull() {
		return $this->orNotNull(Guest::EXPECTED_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountBetween($integer, $from, $to) {
		return $this->orBetween(Guest::EXPECTED_COUNT, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountBeginsWith($integer) {
		return $this->orBeginsWith(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountEndsWith($integer) {
		return $this->orEndsWith(Guest::EXPECTED_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orExpectedCountContains($integer) {
		return $this->orContains(Guest::EXPECTED_COUNT, $integer);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByExpectedCountAsc() {
		return $this->orderBy(Guest::EXPECTED_COUNT, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByExpectedCountDesc() {
		return $this->orderBy(Guest::EXPECTED_COUNT, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByExpectedCount() {
		return $this->groupBy(Guest::EXPECTED_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCount($integer) {
		return $this->addAnd(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountNot($integer) {
		return $this->andNot(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountLike($integer) {
		return $this->andLike(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountNotLike($integer) {
		return $this->andNotLike(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountGreater($integer) {
		return $this->andGreater(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountGreaterEqual($integer) {
		return $this->andGreaterEqual(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountLess($integer) {
		return $this->andLess(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountLessEqual($integer) {
		return $this->andLessEqual(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountNull() {
		return $this->andNull(Guest::ACTUAL_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountNotNull() {
		return $this->andNotNull(Guest::ACTUAL_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountBetween($integer, $from, $to) {
		return $this->andBetween(Guest::ACTUAL_COUNT, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountBeginsWith($integer) {
		return $this->andBeginsWith(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountEndsWith($integer) {
		return $this->andEndsWith(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function andActualCountContains($integer) {
		return $this->andContains(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCount($integer) {
		return $this->or(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountNot($integer) {
		return $this->orNot(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountLike($integer) {
		return $this->orLike(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountNotLike($integer) {
		return $this->orNotLike(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountGreater($integer) {
		return $this->orGreater(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountGreaterEqual($integer) {
		return $this->orGreaterEqual(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountLess($integer) {
		return $this->orLess(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountLessEqual($integer) {
		return $this->orLessEqual(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountNull() {
		return $this->orNull(Guest::ACTUAL_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountNotNull() {
		return $this->orNotNull(Guest::ACTUAL_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountBetween($integer, $from, $to) {
		return $this->orBetween(Guest::ACTUAL_COUNT, $integer, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountBeginsWith($integer) {
		return $this->orBeginsWith(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountEndsWith($integer) {
		return $this->orEndsWith(Guest::ACTUAL_COUNT, $integer);
	}

	/**
	 * @return GuestQuery
	 */
	function orActualCountContains($integer) {
		return $this->orContains(Guest::ACTUAL_COUNT, $integer);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByActualCountAsc() {
		return $this->orderBy(Guest::ACTUAL_COUNT, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByActualCountDesc() {
		return $this->orderBy(Guest::ACTUAL_COUNT, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByActualCount() {
		return $this->groupBy(Guest::ACTUAL_COUNT);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSite($tinyint) {
		return $this->addAnd(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteNot($tinyint) {
		return $this->andNot(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteLike($tinyint) {
		return $this->andLike(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteNotLike($tinyint) {
		return $this->andNotLike(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteGreater($tinyint) {
		return $this->andGreater(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteGreaterEqual($tinyint) {
		return $this->andGreaterEqual(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteLess($tinyint) {
		return $this->andLess(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteLessEqual($tinyint) {
		return $this->andLessEqual(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteNull() {
		return $this->andNull(Guest::RSVP_THROUGH_SITE);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteNotNull() {
		return $this->andNotNull(Guest::RSVP_THROUGH_SITE);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteBetween($tinyint, $from, $to) {
		return $this->andBetween(Guest::RSVP_THROUGH_SITE, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteBeginsWith($tinyint) {
		return $this->andBeginsWith(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteEndsWith($tinyint) {
		return $this->andEndsWith(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andRsvpThroughSiteContains($tinyint) {
		return $this->andContains(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSite($tinyint) {
		return $this->or(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteNot($tinyint) {
		return $this->orNot(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteLike($tinyint) {
		return $this->orLike(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteNotLike($tinyint) {
		return $this->orNotLike(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteGreater($tinyint) {
		return $this->orGreater(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteGreaterEqual($tinyint) {
		return $this->orGreaterEqual(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteLess($tinyint) {
		return $this->orLess(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteLessEqual($tinyint) {
		return $this->orLessEqual(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteNull() {
		return $this->orNull(Guest::RSVP_THROUGH_SITE);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteNotNull() {
		return $this->orNotNull(Guest::RSVP_THROUGH_SITE);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteBetween($tinyint, $from, $to) {
		return $this->orBetween(Guest::RSVP_THROUGH_SITE, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteBeginsWith($tinyint) {
		return $this->orBeginsWith(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteEndsWith($tinyint) {
		return $this->orEndsWith(Guest::RSVP_THROUGH_SITE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orRsvpThroughSiteContains($tinyint) {
		return $this->orContains(Guest::RSVP_THROUGH_SITE, $tinyint);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByRsvpThroughSiteAsc() {
		return $this->orderBy(Guest::RSVP_THROUGH_SITE, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByRsvpThroughSiteDesc() {
		return $this->orderBy(Guest::RSVP_THROUGH_SITE, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByRsvpThroughSite() {
		return $this->groupBy(Guest::RSVP_THROUGH_SITE);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttending($tinyint) {
		return $this->addAnd(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingNot($tinyint) {
		return $this->andNot(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingLike($tinyint) {
		return $this->andLike(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingNotLike($tinyint) {
		return $this->andNotLike(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingGreater($tinyint) {
		return $this->andGreater(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingGreaterEqual($tinyint) {
		return $this->andGreaterEqual(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingLess($tinyint) {
		return $this->andLess(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingLessEqual($tinyint) {
		return $this->andLessEqual(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingNull() {
		return $this->andNull(Guest::IS_ATTENDING);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingNotNull() {
		return $this->andNotNull(Guest::IS_ATTENDING);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingBetween($tinyint, $from, $to) {
		return $this->andBetween(Guest::IS_ATTENDING, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingBeginsWith($tinyint) {
		return $this->andBeginsWith(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingEndsWith($tinyint) {
		return $this->andEndsWith(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsAttendingContains($tinyint) {
		return $this->andContains(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttending($tinyint) {
		return $this->or(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingNot($tinyint) {
		return $this->orNot(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingLike($tinyint) {
		return $this->orLike(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingNotLike($tinyint) {
		return $this->orNotLike(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingGreater($tinyint) {
		return $this->orGreater(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingGreaterEqual($tinyint) {
		return $this->orGreaterEqual(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingLess($tinyint) {
		return $this->orLess(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingLessEqual($tinyint) {
		return $this->orLessEqual(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingNull() {
		return $this->orNull(Guest::IS_ATTENDING);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingNotNull() {
		return $this->orNotNull(Guest::IS_ATTENDING);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingBetween($tinyint, $from, $to) {
		return $this->orBetween(Guest::IS_ATTENDING, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingBeginsWith($tinyint) {
		return $this->orBeginsWith(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingEndsWith($tinyint) {
		return $this->orEndsWith(Guest::IS_ATTENDING, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsAttendingContains($tinyint) {
		return $this->orContains(Guest::IS_ATTENDING, $tinyint);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByIsAttendingAsc() {
		return $this->orderBy(Guest::IS_ATTENDING, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByIsAttendingDesc() {
		return $this->orderBy(Guest::IS_ATTENDING, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByIsAttending() {
		return $this->groupBy(Guest::IS_ATTENDING);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNew($tinyint) {
		return $this->addAnd(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewNot($tinyint) {
		return $this->andNot(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewLike($tinyint) {
		return $this->andLike(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewNotLike($tinyint) {
		return $this->andNotLike(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewGreater($tinyint) {
		return $this->andGreater(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewGreaterEqual($tinyint) {
		return $this->andGreaterEqual(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewLess($tinyint) {
		return $this->andLess(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewLessEqual($tinyint) {
		return $this->andLessEqual(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewNull() {
		return $this->andNull(Guest::IS_NEW);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewNotNull() {
		return $this->andNotNull(Guest::IS_NEW);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewBetween($tinyint, $from, $to) {
		return $this->andBetween(Guest::IS_NEW, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewBeginsWith($tinyint) {
		return $this->andBeginsWith(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewEndsWith($tinyint) {
		return $this->andEndsWith(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andIsNewContains($tinyint) {
		return $this->andContains(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNew($tinyint) {
		return $this->or(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewNot($tinyint) {
		return $this->orNot(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewLike($tinyint) {
		return $this->orLike(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewNotLike($tinyint) {
		return $this->orNotLike(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewGreater($tinyint) {
		return $this->orGreater(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewGreaterEqual($tinyint) {
		return $this->orGreaterEqual(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewLess($tinyint) {
		return $this->orLess(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewLessEqual($tinyint) {
		return $this->orLessEqual(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewNull() {
		return $this->orNull(Guest::IS_NEW);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewNotNull() {
		return $this->orNotNull(Guest::IS_NEW);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewBetween($tinyint, $from, $to) {
		return $this->orBetween(Guest::IS_NEW, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewBeginsWith($tinyint) {
		return $this->orBeginsWith(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewEndsWith($tinyint) {
		return $this->orEndsWith(Guest::IS_NEW, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orIsNewContains($tinyint) {
		return $this->orContains(Guest::IS_NEW, $tinyint);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByIsNewAsc() {
		return $this->orderBy(Guest::IS_NEW, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByIsNewDesc() {
		return $this->orderBy(Guest::IS_NEW, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByIsNew() {
		return $this->groupBy(Guest::IS_NEW);
	}

	/**
	 * @return GuestQuery
	 */
	function andActive($tinyint) {
		return $this->addAnd(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveNot($tinyint) {
		return $this->andNot(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveLike($tinyint) {
		return $this->andLike(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveNotLike($tinyint) {
		return $this->andNotLike(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveGreater($tinyint) {
		return $this->andGreater(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveGreaterEqual($tinyint) {
		return $this->andGreaterEqual(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveLess($tinyint) {
		return $this->andLess(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveLessEqual($tinyint) {
		return $this->andLessEqual(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveNull() {
		return $this->andNull(Guest::ACTIVE);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveNotNull() {
		return $this->andNotNull(Guest::ACTIVE);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveBetween($tinyint, $from, $to) {
		return $this->andBetween(Guest::ACTIVE, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveBeginsWith($tinyint) {
		return $this->andBeginsWith(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveEndsWith($tinyint) {
		return $this->andEndsWith(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function andActiveContains($tinyint) {
		return $this->andContains(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActive($tinyint) {
		return $this->or(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveNot($tinyint) {
		return $this->orNot(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveLike($tinyint) {
		return $this->orLike(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveNotLike($tinyint) {
		return $this->orNotLike(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveGreater($tinyint) {
		return $this->orGreater(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveGreaterEqual($tinyint) {
		return $this->orGreaterEqual(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveLess($tinyint) {
		return $this->orLess(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveLessEqual($tinyint) {
		return $this->orLessEqual(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveNull() {
		return $this->orNull(Guest::ACTIVE);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveNotNull() {
		return $this->orNotNull(Guest::ACTIVE);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveBetween($tinyint, $from, $to) {
		return $this->orBetween(Guest::ACTIVE, $tinyint, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveBeginsWith($tinyint) {
		return $this->orBeginsWith(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveEndsWith($tinyint) {
		return $this->orEndsWith(Guest::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestQuery
	 */
	function orActiveContains($tinyint) {
		return $this->orContains(Guest::ACTIVE, $tinyint);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByActiveAsc() {
		return $this->orderBy(Guest::ACTIVE, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByActiveDesc() {
		return $this->orderBy(Guest::ACTIVE, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByActive() {
		return $this->groupBy(Guest::ACTIVE);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreated($integer_timestamp) {
		return $this->addAnd(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedNot($integer_timestamp) {
		return $this->andNot(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedLike($integer_timestamp) {
		return $this->andLike(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedNotLike($integer_timestamp) {
		return $this->andNotLike(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedGreater($integer_timestamp) {
		return $this->andGreater(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedLess($integer_timestamp) {
		return $this->andLess(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedNull() {
		return $this->andNull(Guest::CREATED);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedNotNull() {
		return $this->andNotNull(Guest::CREATED);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Guest::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andCreatedContains($integer_timestamp) {
		return $this->andContains(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreated($integer_timestamp) {
		return $this->or(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedNot($integer_timestamp) {
		return $this->orNot(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedLike($integer_timestamp) {
		return $this->orLike(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedNotLike($integer_timestamp) {
		return $this->orNotLike(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedGreater($integer_timestamp) {
		return $this->orGreater(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedLess($integer_timestamp) {
		return $this->orLess(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedNull() {
		return $this->orNull(Guest::CREATED);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedNotNull() {
		return $this->orNotNull(Guest::CREATED);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Guest::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Guest::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orCreatedContains($integer_timestamp) {
		return $this->orContains(Guest::CREATED, $integer_timestamp);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByCreatedAsc() {
		return $this->orderBy(Guest::CREATED, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByCreatedDesc() {
		return $this->orderBy(Guest::CREATED, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByCreated() {
		return $this->groupBy(Guest::CREATED);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdated($integer_timestamp) {
		return $this->addAnd(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedNot($integer_timestamp) {
		return $this->andNot(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedLike($integer_timestamp) {
		return $this->andLike(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedNotLike($integer_timestamp) {
		return $this->andNotLike(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedGreater($integer_timestamp) {
		return $this->andGreater(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedLess($integer_timestamp) {
		return $this->andLess(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedNull() {
		return $this->andNull(Guest::UPDATED);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedNotNull() {
		return $this->andNotNull(Guest::UPDATED);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Guest::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function andUpdatedContains($integer_timestamp) {
		return $this->andContains(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdated($integer_timestamp) {
		return $this->or(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedNot($integer_timestamp) {
		return $this->orNot(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedLike($integer_timestamp) {
		return $this->orLike(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedNotLike($integer_timestamp) {
		return $this->orNotLike(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedGreater($integer_timestamp) {
		return $this->orGreater(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedLess($integer_timestamp) {
		return $this->orLess(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedNull() {
		return $this->orNull(Guest::UPDATED);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedNotNull() {
		return $this->orNotNull(Guest::UPDATED);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Guest::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Guest::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestQuery
	 */
	function orUpdatedContains($integer_timestamp) {
		return $this->orContains(Guest::UPDATED, $integer_timestamp);
	}


	/**
	 * @return GuestQuery
	 */
	function orderByUpdatedAsc() {
		return $this->orderBy(Guest::UPDATED, self::ASC);
	}

	/**
	 * @return GuestQuery
	 */
	function orderByUpdatedDesc() {
		return $this->orderBy(Guest::UPDATED, self::DESC);
	}

	/**
	 * @return GuestQuery
	 */
	function groupByUpdated() {
		return $this->groupBy(Guest::UPDATED);
	}


}