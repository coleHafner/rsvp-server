<?php

abstract class baseSessionQuery extends Query {

	function __construct($table_name = null, $alias = null) {
		if (null === $table_name) {
			$table_name = Session::getTableName();
		}
		return parent::__construct($table_name, $alias);
	}

	/**
	 * Returns new instance of self by passing arguments directly to constructor.
	 * @param string $alias
	 * @return SessionQuery
	 */
	static function create($table_name = null, $alias = null) {
		return new SessionQuery($table_name, $alias);
	}

	/**
	 * @return Session[]
	 */
	function select() {
		return Session::doSelect($this);
	}

	/**
	 * @return Session
	 */
	function selectOne() {
		$records = Session::doSelect($this);
		return array_shift($records);
	}

	/**
	 * @return int
	 */
	function delete(){
		return Session::doDelete($this);
	}

	/**
	 * @return int
	 */
	function count(){
		return Session::doCount($this);
	}

	/**
	 * @return SessionQuery
	 */
	function addAnd($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Session::isTemporalType($type)) {
			$value = Session::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Session::coerceTemporalValue($column, $type);
		}
		return parent::addAnd($column, $value, $operator, $quote);
	}

	/**
	 * @return SessionQuery
	 */
	function addOr($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Session::isTemporalType($type)) {
			$value = Session::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Session::coerceTemporalValue($column, $type);
		}
		return parent::addOr($column, $value, $operator, $quote);
	}

	/**
	 * @return SessionQuery
	 */
	function andId($integer) {
		return $this->addAnd(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdNot($integer) {
		return $this->andNot(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdLike($integer) {
		return $this->andLike(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdNotLike($integer) {
		return $this->andNotLike(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdGreater($integer) {
		return $this->andGreater(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdLess($integer) {
		return $this->andLess(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdLessEqual($integer) {
		return $this->andLessEqual(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdNull() {
		return $this->andNull(Session::ID);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdNotNull() {
		return $this->andNotNull(Session::ID);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdBetween($integer, $from, $to) {
		return $this->andBetween(Session::ID, $integer, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdBeginsWith($integer) {
		return $this->andBeginsWith(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdEndsWith($integer) {
		return $this->andEndsWith(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andIdContains($integer) {
		return $this->andContains(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orId($integer) {
		return $this->or(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdNot($integer) {
		return $this->orNot(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdLike($integer) {
		return $this->orLike(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdNotLike($integer) {
		return $this->orNotLike(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdGreater($integer) {
		return $this->orGreater(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdLess($integer) {
		return $this->orLess(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdLessEqual($integer) {
		return $this->orLessEqual(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdNull() {
		return $this->orNull(Session::ID);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdNotNull() {
		return $this->orNotNull(Session::ID);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdBetween($integer, $from, $to) {
		return $this->orBetween(Session::ID, $integer, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdBeginsWith($integer) {
		return $this->orBeginsWith(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdEndsWith($integer) {
		return $this->orEndsWith(Session::ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orIdContains($integer) {
		return $this->orContains(Session::ID, $integer);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByIdAsc() {
		return $this->orderBy(Session::ID, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByIdDesc() {
		return $this->orderBy(Session::ID, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupById() {
		return $this->groupBy(Session::ID);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserId($integer) {
		return $this->addAnd(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdNot($integer) {
		return $this->andNot(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdLike($integer) {
		return $this->andLike(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdNotLike($integer) {
		return $this->andNotLike(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdGreater($integer) {
		return $this->andGreater(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdLess($integer) {
		return $this->andLess(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdLessEqual($integer) {
		return $this->andLessEqual(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdNull() {
		return $this->andNull(Session::USER_ID);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdNotNull() {
		return $this->andNotNull(Session::USER_ID);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdBetween($integer, $from, $to) {
		return $this->andBetween(Session::USER_ID, $integer, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdBeginsWith($integer) {
		return $this->andBeginsWith(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdEndsWith($integer) {
		return $this->andEndsWith(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserIdContains($integer) {
		return $this->andContains(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserId($integer) {
		return $this->or(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdNot($integer) {
		return $this->orNot(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdLike($integer) {
		return $this->orLike(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdNotLike($integer) {
		return $this->orNotLike(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdGreater($integer) {
		return $this->orGreater(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdLess($integer) {
		return $this->orLess(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdLessEqual($integer) {
		return $this->orLessEqual(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdNull() {
		return $this->orNull(Session::USER_ID);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdNotNull() {
		return $this->orNotNull(Session::USER_ID);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdBetween($integer, $from, $to) {
		return $this->orBetween(Session::USER_ID, $integer, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdBeginsWith($integer) {
		return $this->orBeginsWith(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdEndsWith($integer) {
		return $this->orEndsWith(Session::USER_ID, $integer);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserIdContains($integer) {
		return $this->orContains(Session::USER_ID, $integer);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByUserIdAsc() {
		return $this->orderBy(Session::USER_ID, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByUserIdDesc() {
		return $this->orderBy(Session::USER_ID, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupByUserId() {
		return $this->groupBy(Session::USER_ID);
	}

	/**
	 * @return SessionQuery
	 */
	function andHash($varchar) {
		return $this->addAnd(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashNot($varchar) {
		return $this->andNot(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashLike($varchar) {
		return $this->andLike(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashNotLike($varchar) {
		return $this->andNotLike(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashGreater($varchar) {
		return $this->andGreater(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashGreaterEqual($varchar) {
		return $this->andGreaterEqual(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashLess($varchar) {
		return $this->andLess(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashLessEqual($varchar) {
		return $this->andLessEqual(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashNull() {
		return $this->andNull(Session::HASH);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashNotNull() {
		return $this->andNotNull(Session::HASH);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashBetween($varchar, $from, $to) {
		return $this->andBetween(Session::HASH, $varchar, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashBeginsWith($varchar) {
		return $this->andBeginsWith(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashEndsWith($varchar) {
		return $this->andEndsWith(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andHashContains($varchar) {
		return $this->andContains(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHash($varchar) {
		return $this->or(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashNot($varchar) {
		return $this->orNot(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashLike($varchar) {
		return $this->orLike(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashNotLike($varchar) {
		return $this->orNotLike(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashGreater($varchar) {
		return $this->orGreater(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashGreaterEqual($varchar) {
		return $this->orGreaterEqual(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashLess($varchar) {
		return $this->orLess(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashLessEqual($varchar) {
		return $this->orLessEqual(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashNull() {
		return $this->orNull(Session::HASH);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashNotNull() {
		return $this->orNotNull(Session::HASH);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashBetween($varchar, $from, $to) {
		return $this->orBetween(Session::HASH, $varchar, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashBeginsWith($varchar) {
		return $this->orBeginsWith(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashEndsWith($varchar) {
		return $this->orEndsWith(Session::HASH, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orHashContains($varchar) {
		return $this->orContains(Session::HASH, $varchar);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByHashAsc() {
		return $this->orderBy(Session::HASH, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByHashDesc() {
		return $this->orderBy(Session::HASH, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupByHash() {
		return $this->groupBy(Session::HASH);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgent($varchar) {
		return $this->addAnd(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentNot($varchar) {
		return $this->andNot(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentLike($varchar) {
		return $this->andLike(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentNotLike($varchar) {
		return $this->andNotLike(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentGreater($varchar) {
		return $this->andGreater(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentGreaterEqual($varchar) {
		return $this->andGreaterEqual(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentLess($varchar) {
		return $this->andLess(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentLessEqual($varchar) {
		return $this->andLessEqual(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentNull() {
		return $this->andNull(Session::USER_AGENT);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentNotNull() {
		return $this->andNotNull(Session::USER_AGENT);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentBetween($varchar, $from, $to) {
		return $this->andBetween(Session::USER_AGENT, $varchar, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentBeginsWith($varchar) {
		return $this->andBeginsWith(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentEndsWith($varchar) {
		return $this->andEndsWith(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andUserAgentContains($varchar) {
		return $this->andContains(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgent($varchar) {
		return $this->or(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentNot($varchar) {
		return $this->orNot(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentLike($varchar) {
		return $this->orLike(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentNotLike($varchar) {
		return $this->orNotLike(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentGreater($varchar) {
		return $this->orGreater(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentGreaterEqual($varchar) {
		return $this->orGreaterEqual(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentLess($varchar) {
		return $this->orLess(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentLessEqual($varchar) {
		return $this->orLessEqual(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentNull() {
		return $this->orNull(Session::USER_AGENT);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentNotNull() {
		return $this->orNotNull(Session::USER_AGENT);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentBetween($varchar, $from, $to) {
		return $this->orBetween(Session::USER_AGENT, $varchar, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentBeginsWith($varchar) {
		return $this->orBeginsWith(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentEndsWith($varchar) {
		return $this->orEndsWith(Session::USER_AGENT, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orUserAgentContains($varchar) {
		return $this->orContains(Session::USER_AGENT, $varchar);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByUserAgentAsc() {
		return $this->orderBy(Session::USER_AGENT, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByUserAgentDesc() {
		return $this->orderBy(Session::USER_AGENT, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupByUserAgent() {
		return $this->groupBy(Session::USER_AGENT);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddress($varchar) {
		return $this->addAnd(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressNot($varchar) {
		return $this->andNot(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressLike($varchar) {
		return $this->andLike(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressNotLike($varchar) {
		return $this->andNotLike(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressGreater($varchar) {
		return $this->andGreater(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressGreaterEqual($varchar) {
		return $this->andGreaterEqual(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressLess($varchar) {
		return $this->andLess(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressLessEqual($varchar) {
		return $this->andLessEqual(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressNull() {
		return $this->andNull(Session::IP_ADDRESS);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressNotNull() {
		return $this->andNotNull(Session::IP_ADDRESS);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressBetween($varchar, $from, $to) {
		return $this->andBetween(Session::IP_ADDRESS, $varchar, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressBeginsWith($varchar) {
		return $this->andBeginsWith(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressEndsWith($varchar) {
		return $this->andEndsWith(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function andIpAddressContains($varchar) {
		return $this->andContains(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddress($varchar) {
		return $this->or(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressNot($varchar) {
		return $this->orNot(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressLike($varchar) {
		return $this->orLike(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressNotLike($varchar) {
		return $this->orNotLike(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressGreater($varchar) {
		return $this->orGreater(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressGreaterEqual($varchar) {
		return $this->orGreaterEqual(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressLess($varchar) {
		return $this->orLess(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressLessEqual($varchar) {
		return $this->orLessEqual(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressNull() {
		return $this->orNull(Session::IP_ADDRESS);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressNotNull() {
		return $this->orNotNull(Session::IP_ADDRESS);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressBetween($varchar, $from, $to) {
		return $this->orBetween(Session::IP_ADDRESS, $varchar, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressBeginsWith($varchar) {
		return $this->orBeginsWith(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressEndsWith($varchar) {
		return $this->orEndsWith(Session::IP_ADDRESS, $varchar);
	}

	/**
	 * @return SessionQuery
	 */
	function orIpAddressContains($varchar) {
		return $this->orContains(Session::IP_ADDRESS, $varchar);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByIpAddressAsc() {
		return $this->orderBy(Session::IP_ADDRESS, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByIpAddressDesc() {
		return $this->orderBy(Session::IP_ADDRESS, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupByIpAddress() {
		return $this->groupBy(Session::IP_ADDRESS);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminated($timestamp) {
		return $this->addAnd(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedNot($timestamp) {
		return $this->andNot(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedLike($timestamp) {
		return $this->andLike(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedNotLike($timestamp) {
		return $this->andNotLike(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedGreater($timestamp) {
		return $this->andGreater(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedGreaterEqual($timestamp) {
		return $this->andGreaterEqual(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedLess($timestamp) {
		return $this->andLess(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedLessEqual($timestamp) {
		return $this->andLessEqual(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedNull() {
		return $this->andNull(Session::TERMINATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedNotNull() {
		return $this->andNotNull(Session::TERMINATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedBetween($timestamp, $from, $to) {
		return $this->andBetween(Session::TERMINATED, $timestamp, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedBeginsWith($timestamp) {
		return $this->andBeginsWith(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedEndsWith($timestamp) {
		return $this->andEndsWith(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andTerminatedContains($timestamp) {
		return $this->andContains(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminated($timestamp) {
		return $this->or(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedNot($timestamp) {
		return $this->orNot(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedLike($timestamp) {
		return $this->orLike(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedNotLike($timestamp) {
		return $this->orNotLike(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedGreater($timestamp) {
		return $this->orGreater(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedGreaterEqual($timestamp) {
		return $this->orGreaterEqual(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedLess($timestamp) {
		return $this->orLess(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedLessEqual($timestamp) {
		return $this->orLessEqual(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedNull() {
		return $this->orNull(Session::TERMINATED);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedNotNull() {
		return $this->orNotNull(Session::TERMINATED);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedBetween($timestamp, $from, $to) {
		return $this->orBetween(Session::TERMINATED, $timestamp, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedBeginsWith($timestamp) {
		return $this->orBeginsWith(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedEndsWith($timestamp) {
		return $this->orEndsWith(Session::TERMINATED, $timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orTerminatedContains($timestamp) {
		return $this->orContains(Session::TERMINATED, $timestamp);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByTerminatedAsc() {
		return $this->orderBy(Session::TERMINATED, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByTerminatedDesc() {
		return $this->orderBy(Session::TERMINATED, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupByTerminated() {
		return $this->groupBy(Session::TERMINATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreated($integer_timestamp) {
		return $this->addAnd(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedNot($integer_timestamp) {
		return $this->andNot(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedLike($integer_timestamp) {
		return $this->andLike(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedNotLike($integer_timestamp) {
		return $this->andNotLike(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedGreater($integer_timestamp) {
		return $this->andGreater(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedLess($integer_timestamp) {
		return $this->andLess(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedNull() {
		return $this->andNull(Session::CREATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedNotNull() {
		return $this->andNotNull(Session::CREATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Session::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andCreatedContains($integer_timestamp) {
		return $this->andContains(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreated($integer_timestamp) {
		return $this->or(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedNot($integer_timestamp) {
		return $this->orNot(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedLike($integer_timestamp) {
		return $this->orLike(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedNotLike($integer_timestamp) {
		return $this->orNotLike(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedGreater($integer_timestamp) {
		return $this->orGreater(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedLess($integer_timestamp) {
		return $this->orLess(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedNull() {
		return $this->orNull(Session::CREATED);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedNotNull() {
		return $this->orNotNull(Session::CREATED);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Session::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Session::CREATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orCreatedContains($integer_timestamp) {
		return $this->orContains(Session::CREATED, $integer_timestamp);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByCreatedAsc() {
		return $this->orderBy(Session::CREATED, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByCreatedDesc() {
		return $this->orderBy(Session::CREATED, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupByCreated() {
		return $this->groupBy(Session::CREATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdated($integer_timestamp) {
		return $this->addAnd(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedNot($integer_timestamp) {
		return $this->andNot(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedLike($integer_timestamp) {
		return $this->andLike(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedNotLike($integer_timestamp) {
		return $this->andNotLike(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedGreater($integer_timestamp) {
		return $this->andGreater(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedLess($integer_timestamp) {
		return $this->andLess(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedNull() {
		return $this->andNull(Session::UPDATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedNotNull() {
		return $this->andNotNull(Session::UPDATED);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Session::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function andUpdatedContains($integer_timestamp) {
		return $this->andContains(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdated($integer_timestamp) {
		return $this->or(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedNot($integer_timestamp) {
		return $this->orNot(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedLike($integer_timestamp) {
		return $this->orLike(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedNotLike($integer_timestamp) {
		return $this->orNotLike(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedGreater($integer_timestamp) {
		return $this->orGreater(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedLess($integer_timestamp) {
		return $this->orLess(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedNull() {
		return $this->orNull(Session::UPDATED);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedNotNull() {
		return $this->orNotNull(Session::UPDATED);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Session::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Session::UPDATED, $integer_timestamp);
	}

	/**
	 * @return SessionQuery
	 */
	function orUpdatedContains($integer_timestamp) {
		return $this->orContains(Session::UPDATED, $integer_timestamp);
	}


	/**
	 * @return SessionQuery
	 */
	function orderByUpdatedAsc() {
		return $this->orderBy(Session::UPDATED, self::ASC);
	}

	/**
	 * @return SessionQuery
	 */
	function orderByUpdatedDesc() {
		return $this->orderBy(Session::UPDATED, self::DESC);
	}

	/**
	 * @return SessionQuery
	 */
	function groupByUpdated() {
		return $this->groupBy(Session::UPDATED);
	}


}