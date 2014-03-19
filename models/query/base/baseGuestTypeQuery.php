<?php

abstract class baseGuestTypeQuery extends Query {

	function __construct($table_name = null, $alias = null) {
		if (null === $table_name) {
			$table_name = GuestType::getTableName();
		}
		return parent::__construct($table_name, $alias);
	}

	/**
	 * Returns new instance of self by passing arguments directly to constructor.
	 * @param string $alias
	 * @return GuestTypeQuery
	 */
	static function create($table_name = null, $alias = null) {
		return new GuestTypeQuery($table_name, $alias);
	}

	/**
	 * @return GuestType[]
	 */
	function select() {
		return GuestType::doSelect($this);
	}

	/**
	 * @return GuestType
	 */
	function selectOne() {
		$records = GuestType::doSelect($this);
		return array_shift($records);
	}

	/**
	 * @return int
	 */
	function delete(){
		return GuestType::doDelete($this);
	}

	/**
	 * @return int
	 */
	function count(){
		return GuestType::doCount($this);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function addAnd($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && GuestType::isTemporalType($type)) {
			$value = GuestType::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = GuestType::coerceTemporalValue($column, $type);
		}
		return parent::addAnd($column, $value, $operator, $quote);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function addOr($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && GuestType::isTemporalType($type)) {
			$value = GuestType::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = GuestType::coerceTemporalValue($column, $type);
		}
		return parent::addOr($column, $value, $operator, $quote);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andId($integer) {
		return $this->addAnd(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdNot($integer) {
		return $this->andNot(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdLike($integer) {
		return $this->andLike(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdNotLike($integer) {
		return $this->andNotLike(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdGreater($integer) {
		return $this->andGreater(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdGreaterEqual($integer) {
		return $this->andGreaterEqual(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdLess($integer) {
		return $this->andLess(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdLessEqual($integer) {
		return $this->andLessEqual(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdNull() {
		return $this->andNull(GuestType::ID);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdNotNull() {
		return $this->andNotNull(GuestType::ID);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdBetween($integer, $from, $to) {
		return $this->andBetween(GuestType::ID, $integer, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdBeginsWith($integer) {
		return $this->andBeginsWith(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdEndsWith($integer) {
		return $this->andEndsWith(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIdContains($integer) {
		return $this->andContains(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orId($integer) {
		return $this->or(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdNot($integer) {
		return $this->orNot(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdLike($integer) {
		return $this->orLike(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdNotLike($integer) {
		return $this->orNotLike(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdGreater($integer) {
		return $this->orGreater(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdGreaterEqual($integer) {
		return $this->orGreaterEqual(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdLess($integer) {
		return $this->orLess(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdLessEqual($integer) {
		return $this->orLessEqual(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdNull() {
		return $this->orNull(GuestType::ID);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdNotNull() {
		return $this->orNotNull(GuestType::ID);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdBetween($integer, $from, $to) {
		return $this->orBetween(GuestType::ID, $integer, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdBeginsWith($integer) {
		return $this->orBeginsWith(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdEndsWith($integer) {
		return $this->orEndsWith(GuestType::ID, $integer);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIdContains($integer) {
		return $this->orContains(GuestType::ID, $integer);
	}


	/**
	 * @return GuestTypeQuery
	 */
	function orderByIdAsc() {
		return $this->orderBy(GuestType::ID, self::ASC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orderByIdDesc() {
		return $this->orderBy(GuestType::ID, self::DESC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function groupById() {
		return $this->groupBy(GuestType::ID);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitle($varchar) {
		return $this->addAnd(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleNot($varchar) {
		return $this->andNot(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleLike($varchar) {
		return $this->andLike(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleNotLike($varchar) {
		return $this->andNotLike(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleGreater($varchar) {
		return $this->andGreater(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleGreaterEqual($varchar) {
		return $this->andGreaterEqual(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleLess($varchar) {
		return $this->andLess(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleLessEqual($varchar) {
		return $this->andLessEqual(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleNull() {
		return $this->andNull(GuestType::TITLE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleNotNull() {
		return $this->andNotNull(GuestType::TITLE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleBetween($varchar, $from, $to) {
		return $this->andBetween(GuestType::TITLE, $varchar, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleBeginsWith($varchar) {
		return $this->andBeginsWith(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleEndsWith($varchar) {
		return $this->andEndsWith(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andTitleContains($varchar) {
		return $this->andContains(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitle($varchar) {
		return $this->or(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleNot($varchar) {
		return $this->orNot(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleLike($varchar) {
		return $this->orLike(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleNotLike($varchar) {
		return $this->orNotLike(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleGreater($varchar) {
		return $this->orGreater(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleGreaterEqual($varchar) {
		return $this->orGreaterEqual(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleLess($varchar) {
		return $this->orLess(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleLessEqual($varchar) {
		return $this->orLessEqual(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleNull() {
		return $this->orNull(GuestType::TITLE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleNotNull() {
		return $this->orNotNull(GuestType::TITLE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleBetween($varchar, $from, $to) {
		return $this->orBetween(GuestType::TITLE, $varchar, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleBeginsWith($varchar) {
		return $this->orBeginsWith(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleEndsWith($varchar) {
		return $this->orEndsWith(GuestType::TITLE, $varchar);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orTitleContains($varchar) {
		return $this->orContains(GuestType::TITLE, $varchar);
	}


	/**
	 * @return GuestTypeQuery
	 */
	function orderByTitleAsc() {
		return $this->orderBy(GuestType::TITLE, self::ASC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orderByTitleDesc() {
		return $this->orderBy(GuestType::TITLE, self::DESC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function groupByTitle() {
		return $this->groupBy(GuestType::TITLE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecial($tinyint) {
		return $this->addAnd(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialNot($tinyint) {
		return $this->andNot(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialLike($tinyint) {
		return $this->andLike(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialNotLike($tinyint) {
		return $this->andNotLike(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialGreater($tinyint) {
		return $this->andGreater(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialGreaterEqual($tinyint) {
		return $this->andGreaterEqual(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialLess($tinyint) {
		return $this->andLess(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialLessEqual($tinyint) {
		return $this->andLessEqual(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialNull() {
		return $this->andNull(GuestType::IS_SPECIAL);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialNotNull() {
		return $this->andNotNull(GuestType::IS_SPECIAL);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialBetween($tinyint, $from, $to) {
		return $this->andBetween(GuestType::IS_SPECIAL, $tinyint, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialBeginsWith($tinyint) {
		return $this->andBeginsWith(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialEndsWith($tinyint) {
		return $this->andEndsWith(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andIsSpecialContains($tinyint) {
		return $this->andContains(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecial($tinyint) {
		return $this->or(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialNot($tinyint) {
		return $this->orNot(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialLike($tinyint) {
		return $this->orLike(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialNotLike($tinyint) {
		return $this->orNotLike(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialGreater($tinyint) {
		return $this->orGreater(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialGreaterEqual($tinyint) {
		return $this->orGreaterEqual(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialLess($tinyint) {
		return $this->orLess(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialLessEqual($tinyint) {
		return $this->orLessEqual(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialNull() {
		return $this->orNull(GuestType::IS_SPECIAL);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialNotNull() {
		return $this->orNotNull(GuestType::IS_SPECIAL);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialBetween($tinyint, $from, $to) {
		return $this->orBetween(GuestType::IS_SPECIAL, $tinyint, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialBeginsWith($tinyint) {
		return $this->orBeginsWith(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialEndsWith($tinyint) {
		return $this->orEndsWith(GuestType::IS_SPECIAL, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orIsSpecialContains($tinyint) {
		return $this->orContains(GuestType::IS_SPECIAL, $tinyint);
	}


	/**
	 * @return GuestTypeQuery
	 */
	function orderByIsSpecialAsc() {
		return $this->orderBy(GuestType::IS_SPECIAL, self::ASC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orderByIsSpecialDesc() {
		return $this->orderBy(GuestType::IS_SPECIAL, self::DESC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function groupByIsSpecial() {
		return $this->groupBy(GuestType::IS_SPECIAL);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActive($tinyint) {
		return $this->addAnd(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveNot($tinyint) {
		return $this->andNot(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveLike($tinyint) {
		return $this->andLike(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveNotLike($tinyint) {
		return $this->andNotLike(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveGreater($tinyint) {
		return $this->andGreater(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveGreaterEqual($tinyint) {
		return $this->andGreaterEqual(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveLess($tinyint) {
		return $this->andLess(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveLessEqual($tinyint) {
		return $this->andLessEqual(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveNull() {
		return $this->andNull(GuestType::ACTIVE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveNotNull() {
		return $this->andNotNull(GuestType::ACTIVE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveBetween($tinyint, $from, $to) {
		return $this->andBetween(GuestType::ACTIVE, $tinyint, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveBeginsWith($tinyint) {
		return $this->andBeginsWith(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveEndsWith($tinyint) {
		return $this->andEndsWith(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andActiveContains($tinyint) {
		return $this->andContains(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActive($tinyint) {
		return $this->or(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveNot($tinyint) {
		return $this->orNot(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveLike($tinyint) {
		return $this->orLike(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveNotLike($tinyint) {
		return $this->orNotLike(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveGreater($tinyint) {
		return $this->orGreater(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveGreaterEqual($tinyint) {
		return $this->orGreaterEqual(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveLess($tinyint) {
		return $this->orLess(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveLessEqual($tinyint) {
		return $this->orLessEqual(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveNull() {
		return $this->orNull(GuestType::ACTIVE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveNotNull() {
		return $this->orNotNull(GuestType::ACTIVE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveBetween($tinyint, $from, $to) {
		return $this->orBetween(GuestType::ACTIVE, $tinyint, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveBeginsWith($tinyint) {
		return $this->orBeginsWith(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveEndsWith($tinyint) {
		return $this->orEndsWith(GuestType::ACTIVE, $tinyint);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orActiveContains($tinyint) {
		return $this->orContains(GuestType::ACTIVE, $tinyint);
	}


	/**
	 * @return GuestTypeQuery
	 */
	function orderByActiveAsc() {
		return $this->orderBy(GuestType::ACTIVE, self::ASC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orderByActiveDesc() {
		return $this->orderBy(GuestType::ACTIVE, self::DESC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function groupByActive() {
		return $this->groupBy(GuestType::ACTIVE);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreated($integer_timestamp) {
		return $this->addAnd(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedNot($integer_timestamp) {
		return $this->andNot(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedLike($integer_timestamp) {
		return $this->andLike(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedNotLike($integer_timestamp) {
		return $this->andNotLike(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedGreater($integer_timestamp) {
		return $this->andGreater(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedLess($integer_timestamp) {
		return $this->andLess(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedNull() {
		return $this->andNull(GuestType::CREATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedNotNull() {
		return $this->andNotNull(GuestType::CREATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(GuestType::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andCreatedContains($integer_timestamp) {
		return $this->andContains(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreated($integer_timestamp) {
		return $this->or(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedNot($integer_timestamp) {
		return $this->orNot(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedLike($integer_timestamp) {
		return $this->orLike(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedNotLike($integer_timestamp) {
		return $this->orNotLike(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedGreater($integer_timestamp) {
		return $this->orGreater(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedLess($integer_timestamp) {
		return $this->orLess(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedNull() {
		return $this->orNull(GuestType::CREATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedNotNull() {
		return $this->orNotNull(GuestType::CREATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(GuestType::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(GuestType::CREATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orCreatedContains($integer_timestamp) {
		return $this->orContains(GuestType::CREATED, $integer_timestamp);
	}


	/**
	 * @return GuestTypeQuery
	 */
	function orderByCreatedAsc() {
		return $this->orderBy(GuestType::CREATED, self::ASC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orderByCreatedDesc() {
		return $this->orderBy(GuestType::CREATED, self::DESC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function groupByCreated() {
		return $this->groupBy(GuestType::CREATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdated($integer_timestamp) {
		return $this->addAnd(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedNot($integer_timestamp) {
		return $this->andNot(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedLike($integer_timestamp) {
		return $this->andLike(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedNotLike($integer_timestamp) {
		return $this->andNotLike(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedGreater($integer_timestamp) {
		return $this->andGreater(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedLess($integer_timestamp) {
		return $this->andLess(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedNull() {
		return $this->andNull(GuestType::UPDATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedNotNull() {
		return $this->andNotNull(GuestType::UPDATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(GuestType::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function andUpdatedContains($integer_timestamp) {
		return $this->andContains(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdated($integer_timestamp) {
		return $this->or(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedNot($integer_timestamp) {
		return $this->orNot(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedLike($integer_timestamp) {
		return $this->orLike(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedNotLike($integer_timestamp) {
		return $this->orNotLike(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedGreater($integer_timestamp) {
		return $this->orGreater(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedLess($integer_timestamp) {
		return $this->orLess(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedNull() {
		return $this->orNull(GuestType::UPDATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedNotNull() {
		return $this->orNotNull(GuestType::UPDATED);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(GuestType::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(GuestType::UPDATED, $integer_timestamp);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orUpdatedContains($integer_timestamp) {
		return $this->orContains(GuestType::UPDATED, $integer_timestamp);
	}


	/**
	 * @return GuestTypeQuery
	 */
	function orderByUpdatedAsc() {
		return $this->orderBy(GuestType::UPDATED, self::ASC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function orderByUpdatedDesc() {
		return $this->orderBy(GuestType::UPDATED, self::DESC);
	}

	/**
	 * @return GuestTypeQuery
	 */
	function groupByUpdated() {
		return $this->groupBy(GuestType::UPDATED);
	}


}