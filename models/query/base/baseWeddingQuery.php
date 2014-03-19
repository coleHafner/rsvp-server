<?php

abstract class baseWeddingQuery extends Query {

	function __construct($table_name = null, $alias = null) {
		if (null === $table_name) {
			$table_name = Wedding::getTableName();
		}
		return parent::__construct($table_name, $alias);
	}

	/**
	 * Returns new instance of self by passing arguments directly to constructor.
	 * @param string $alias
	 * @return WeddingQuery
	 */
	static function create($table_name = null, $alias = null) {
		return new WeddingQuery($table_name, $alias);
	}

	/**
	 * @return Wedding[]
	 */
	function select() {
		return Wedding::doSelect($this);
	}

	/**
	 * @return Wedding
	 */
	function selectOne() {
		$records = Wedding::doSelect($this);
		return array_shift($records);
	}

	/**
	 * @return int
	 */
	function delete(){
		return Wedding::doDelete($this);
	}

	/**
	 * @return int
	 */
	function count(){
		return Wedding::doCount($this);
	}

	/**
	 * @return WeddingQuery
	 */
	function addAnd($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Wedding::isTemporalType($type)) {
			$value = Wedding::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Wedding::coerceTemporalValue($column, $type);
		}
		return parent::addAnd($column, $value, $operator, $quote);
	}

	/**
	 * @return WeddingQuery
	 */
	function addOr($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Wedding::isTemporalType($type)) {
			$value = Wedding::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Wedding::coerceTemporalValue($column, $type);
		}
		return parent::addOr($column, $value, $operator, $quote);
	}

	/**
	 * @return WeddingQuery
	 */
	function andId($integer) {
		return $this->addAnd(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdNot($integer) {
		return $this->andNot(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdLike($integer) {
		return $this->andLike(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdNotLike($integer) {
		return $this->andNotLike(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdGreater($integer) {
		return $this->andGreater(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdLess($integer) {
		return $this->andLess(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdLessEqual($integer) {
		return $this->andLessEqual(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdNull() {
		return $this->andNull(Wedding::ID);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdNotNull() {
		return $this->andNotNull(Wedding::ID);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdBetween($integer, $from, $to) {
		return $this->andBetween(Wedding::ID, $integer, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdBeginsWith($integer) {
		return $this->andBeginsWith(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdEndsWith($integer) {
		return $this->andEndsWith(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function andIdContains($integer) {
		return $this->andContains(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orId($integer) {
		return $this->or(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdNot($integer) {
		return $this->orNot(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdLike($integer) {
		return $this->orLike(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdNotLike($integer) {
		return $this->orNotLike(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdGreater($integer) {
		return $this->orGreater(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdLess($integer) {
		return $this->orLess(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdLessEqual($integer) {
		return $this->orLessEqual(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdNull() {
		return $this->orNull(Wedding::ID);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdNotNull() {
		return $this->orNotNull(Wedding::ID);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdBetween($integer, $from, $to) {
		return $this->orBetween(Wedding::ID, $integer, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdBeginsWith($integer) {
		return $this->orBeginsWith(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdEndsWith($integer) {
		return $this->orEndsWith(Wedding::ID, $integer);
	}

	/**
	 * @return WeddingQuery
	 */
	function orIdContains($integer) {
		return $this->orContains(Wedding::ID, $integer);
	}


	/**
	 * @return WeddingQuery
	 */
	function orderByIdAsc() {
		return $this->orderBy(Wedding::ID, self::ASC);
	}

	/**
	 * @return WeddingQuery
	 */
	function orderByIdDesc() {
		return $this->orderBy(Wedding::ID, self::DESC);
	}

	/**
	 * @return WeddingQuery
	 */
	function groupById() {
		return $this->groupBy(Wedding::ID);
	}

	/**
	 * @return WeddingQuery
	 */
	function andName($varchar) {
		return $this->addAnd(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameNot($varchar) {
		return $this->andNot(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameLike($varchar) {
		return $this->andLike(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameNotLike($varchar) {
		return $this->andNotLike(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameGreater($varchar) {
		return $this->andGreater(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameGreaterEqual($varchar) {
		return $this->andGreaterEqual(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameLess($varchar) {
		return $this->andLess(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameLessEqual($varchar) {
		return $this->andLessEqual(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameNull() {
		return $this->andNull(Wedding::NAME);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameNotNull() {
		return $this->andNotNull(Wedding::NAME);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameBetween($varchar, $from, $to) {
		return $this->andBetween(Wedding::NAME, $varchar, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameBeginsWith($varchar) {
		return $this->andBeginsWith(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameEndsWith($varchar) {
		return $this->andEndsWith(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function andNameContains($varchar) {
		return $this->andContains(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orName($varchar) {
		return $this->or(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameNot($varchar) {
		return $this->orNot(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameLike($varchar) {
		return $this->orLike(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameNotLike($varchar) {
		return $this->orNotLike(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameGreater($varchar) {
		return $this->orGreater(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameGreaterEqual($varchar) {
		return $this->orGreaterEqual(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameLess($varchar) {
		return $this->orLess(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameLessEqual($varchar) {
		return $this->orLessEqual(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameNull() {
		return $this->orNull(Wedding::NAME);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameNotNull() {
		return $this->orNotNull(Wedding::NAME);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameBetween($varchar, $from, $to) {
		return $this->orBetween(Wedding::NAME, $varchar, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameBeginsWith($varchar) {
		return $this->orBeginsWith(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameEndsWith($varchar) {
		return $this->orEndsWith(Wedding::NAME, $varchar);
	}

	/**
	 * @return WeddingQuery
	 */
	function orNameContains($varchar) {
		return $this->orContains(Wedding::NAME, $varchar);
	}


	/**
	 * @return WeddingQuery
	 */
	function orderByNameAsc() {
		return $this->orderBy(Wedding::NAME, self::ASC);
	}

	/**
	 * @return WeddingQuery
	 */
	function orderByNameDesc() {
		return $this->orderBy(Wedding::NAME, self::DESC);
	}

	/**
	 * @return WeddingQuery
	 */
	function groupByName() {
		return $this->groupBy(Wedding::NAME);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreated($integer_timestamp) {
		return $this->addAnd(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedNot($integer_timestamp) {
		return $this->andNot(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedLike($integer_timestamp) {
		return $this->andLike(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedNotLike($integer_timestamp) {
		return $this->andNotLike(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedGreater($integer_timestamp) {
		return $this->andGreater(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedLess($integer_timestamp) {
		return $this->andLess(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedNull() {
		return $this->andNull(Wedding::CREATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedNotNull() {
		return $this->andNotNull(Wedding::CREATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Wedding::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andCreatedContains($integer_timestamp) {
		return $this->andContains(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreated($integer_timestamp) {
		return $this->or(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedNot($integer_timestamp) {
		return $this->orNot(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedLike($integer_timestamp) {
		return $this->orLike(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedNotLike($integer_timestamp) {
		return $this->orNotLike(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedGreater($integer_timestamp) {
		return $this->orGreater(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedLess($integer_timestamp) {
		return $this->orLess(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedNull() {
		return $this->orNull(Wedding::CREATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedNotNull() {
		return $this->orNotNull(Wedding::CREATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Wedding::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Wedding::CREATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orCreatedContains($integer_timestamp) {
		return $this->orContains(Wedding::CREATED, $integer_timestamp);
	}


	/**
	 * @return WeddingQuery
	 */
	function orderByCreatedAsc() {
		return $this->orderBy(Wedding::CREATED, self::ASC);
	}

	/**
	 * @return WeddingQuery
	 */
	function orderByCreatedDesc() {
		return $this->orderBy(Wedding::CREATED, self::DESC);
	}

	/**
	 * @return WeddingQuery
	 */
	function groupByCreated() {
		return $this->groupBy(Wedding::CREATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdated($integer_timestamp) {
		return $this->addAnd(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedNot($integer_timestamp) {
		return $this->andNot(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedLike($integer_timestamp) {
		return $this->andLike(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedNotLike($integer_timestamp) {
		return $this->andNotLike(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedGreater($integer_timestamp) {
		return $this->andGreater(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedLess($integer_timestamp) {
		return $this->andLess(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedNull() {
		return $this->andNull(Wedding::UPDATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedNotNull() {
		return $this->andNotNull(Wedding::UPDATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Wedding::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function andUpdatedContains($integer_timestamp) {
		return $this->andContains(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdated($integer_timestamp) {
		return $this->or(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedNot($integer_timestamp) {
		return $this->orNot(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedLike($integer_timestamp) {
		return $this->orLike(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedNotLike($integer_timestamp) {
		return $this->orNotLike(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedGreater($integer_timestamp) {
		return $this->orGreater(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedLess($integer_timestamp) {
		return $this->orLess(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedNull() {
		return $this->orNull(Wedding::UPDATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedNotNull() {
		return $this->orNotNull(Wedding::UPDATED);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Wedding::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Wedding::UPDATED, $integer_timestamp);
	}

	/**
	 * @return WeddingQuery
	 */
	function orUpdatedContains($integer_timestamp) {
		return $this->orContains(Wedding::UPDATED, $integer_timestamp);
	}


	/**
	 * @return WeddingQuery
	 */
	function orderByUpdatedAsc() {
		return $this->orderBy(Wedding::UPDATED, self::ASC);
	}

	/**
	 * @return WeddingQuery
	 */
	function orderByUpdatedDesc() {
		return $this->orderBy(Wedding::UPDATED, self::DESC);
	}

	/**
	 * @return WeddingQuery
	 */
	function groupByUpdated() {
		return $this->groupBy(Wedding::UPDATED);
	}


}