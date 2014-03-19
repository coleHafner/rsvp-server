<?php

abstract class baseAddressQuery extends Query {

	function __construct($table_name = null, $alias = null) {
		if (null === $table_name) {
			$table_name = Address::getTableName();
		}
		return parent::__construct($table_name, $alias);
	}

	/**
	 * Returns new instance of self by passing arguments directly to constructor.
	 * @param string $alias
	 * @return AddressQuery
	 */
	static function create($table_name = null, $alias = null) {
		return new AddressQuery($table_name, $alias);
	}

	/**
	 * @return Address[]
	 */
	function select() {
		return Address::doSelect($this);
	}

	/**
	 * @return Address
	 */
	function selectOne() {
		$records = Address::doSelect($this);
		return array_shift($records);
	}

	/**
	 * @return int
	 */
	function delete(){
		return Address::doDelete($this);
	}

	/**
	 * @return int
	 */
	function count(){
		return Address::doCount($this);
	}

	/**
	 * @return AddressQuery
	 */
	function addAnd($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Address::isTemporalType($type)) {
			$value = Address::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Address::coerceTemporalValue($column, $type);
		}
		return parent::addAnd($column, $value, $operator, $quote);
	}

	/**
	 * @return AddressQuery
	 */
	function addOr($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && Address::isTemporalType($type)) {
			$value = Address::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = Address::coerceTemporalValue($column, $type);
		}
		return parent::addOr($column, $value, $operator, $quote);
	}

	/**
	 * @return AddressQuery
	 */
	function andId($integer) {
		return $this->addAnd(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdNot($integer) {
		return $this->andNot(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdLike($integer) {
		return $this->andLike(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdNotLike($integer) {
		return $this->andNotLike(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdGreater($integer) {
		return $this->andGreater(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdGreaterEqual($integer) {
		return $this->andGreaterEqual(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdLess($integer) {
		return $this->andLess(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdLessEqual($integer) {
		return $this->andLessEqual(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdNull() {
		return $this->andNull(Address::ID);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdNotNull() {
		return $this->andNotNull(Address::ID);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdBetween($integer, $from, $to) {
		return $this->andBetween(Address::ID, $integer, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdBeginsWith($integer) {
		return $this->andBeginsWith(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdEndsWith($integer) {
		return $this->andEndsWith(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function andIdContains($integer) {
		return $this->andContains(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orId($integer) {
		return $this->or(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdNot($integer) {
		return $this->orNot(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdLike($integer) {
		return $this->orLike(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdNotLike($integer) {
		return $this->orNotLike(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdGreater($integer) {
		return $this->orGreater(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdGreaterEqual($integer) {
		return $this->orGreaterEqual(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdLess($integer) {
		return $this->orLess(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdLessEqual($integer) {
		return $this->orLessEqual(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdNull() {
		return $this->orNull(Address::ID);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdNotNull() {
		return $this->orNotNull(Address::ID);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdBetween($integer, $from, $to) {
		return $this->orBetween(Address::ID, $integer, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdBeginsWith($integer) {
		return $this->orBeginsWith(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdEndsWith($integer) {
		return $this->orEndsWith(Address::ID, $integer);
	}

	/**
	 * @return AddressQuery
	 */
	function orIdContains($integer) {
		return $this->orContains(Address::ID, $integer);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByIdAsc() {
		return $this->orderBy(Address::ID, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByIdDesc() {
		return $this->orderBy(Address::ID, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupById() {
		return $this->groupBy(Address::ID);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1($varchar) {
		return $this->addAnd(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1Not($varchar) {
		return $this->andNot(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1Like($varchar) {
		return $this->andLike(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1NotLike($varchar) {
		return $this->andNotLike(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1Greater($varchar) {
		return $this->andGreater(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1GreaterEqual($varchar) {
		return $this->andGreaterEqual(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1Less($varchar) {
		return $this->andLess(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1LessEqual($varchar) {
		return $this->andLessEqual(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1Null() {
		return $this->andNull(Address::STREET_1);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1NotNull() {
		return $this->andNotNull(Address::STREET_1);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1Between($varchar, $from, $to) {
		return $this->andBetween(Address::STREET_1, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1BeginsWith($varchar) {
		return $this->andBeginsWith(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1EndsWith($varchar) {
		return $this->andEndsWith(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet1Contains($varchar) {
		return $this->andContains(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1($varchar) {
		return $this->or(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1Not($varchar) {
		return $this->orNot(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1Like($varchar) {
		return $this->orLike(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1NotLike($varchar) {
		return $this->orNotLike(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1Greater($varchar) {
		return $this->orGreater(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1GreaterEqual($varchar) {
		return $this->orGreaterEqual(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1Less($varchar) {
		return $this->orLess(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1LessEqual($varchar) {
		return $this->orLessEqual(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1Null() {
		return $this->orNull(Address::STREET_1);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1NotNull() {
		return $this->orNotNull(Address::STREET_1);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1Between($varchar, $from, $to) {
		return $this->orBetween(Address::STREET_1, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1BeginsWith($varchar) {
		return $this->orBeginsWith(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1EndsWith($varchar) {
		return $this->orEndsWith(Address::STREET_1, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet1Contains($varchar) {
		return $this->orContains(Address::STREET_1, $varchar);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByStreet1Asc() {
		return $this->orderBy(Address::STREET_1, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByStreet1Desc() {
		return $this->orderBy(Address::STREET_1, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByStreet1() {
		return $this->groupBy(Address::STREET_1);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2($varchar) {
		return $this->addAnd(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2Not($varchar) {
		return $this->andNot(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2Like($varchar) {
		return $this->andLike(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2NotLike($varchar) {
		return $this->andNotLike(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2Greater($varchar) {
		return $this->andGreater(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2GreaterEqual($varchar) {
		return $this->andGreaterEqual(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2Less($varchar) {
		return $this->andLess(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2LessEqual($varchar) {
		return $this->andLessEqual(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2Null() {
		return $this->andNull(Address::STREET_2);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2NotNull() {
		return $this->andNotNull(Address::STREET_2);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2Between($varchar, $from, $to) {
		return $this->andBetween(Address::STREET_2, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2BeginsWith($varchar) {
		return $this->andBeginsWith(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2EndsWith($varchar) {
		return $this->andEndsWith(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStreet2Contains($varchar) {
		return $this->andContains(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2($varchar) {
		return $this->or(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2Not($varchar) {
		return $this->orNot(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2Like($varchar) {
		return $this->orLike(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2NotLike($varchar) {
		return $this->orNotLike(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2Greater($varchar) {
		return $this->orGreater(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2GreaterEqual($varchar) {
		return $this->orGreaterEqual(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2Less($varchar) {
		return $this->orLess(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2LessEqual($varchar) {
		return $this->orLessEqual(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2Null() {
		return $this->orNull(Address::STREET_2);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2NotNull() {
		return $this->orNotNull(Address::STREET_2);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2Between($varchar, $from, $to) {
		return $this->orBetween(Address::STREET_2, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2BeginsWith($varchar) {
		return $this->orBeginsWith(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2EndsWith($varchar) {
		return $this->orEndsWith(Address::STREET_2, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStreet2Contains($varchar) {
		return $this->orContains(Address::STREET_2, $varchar);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByStreet2Asc() {
		return $this->orderBy(Address::STREET_2, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByStreet2Desc() {
		return $this->orderBy(Address::STREET_2, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByStreet2() {
		return $this->groupBy(Address::STREET_2);
	}

	/**
	 * @return AddressQuery
	 */
	function andCity($varchar) {
		return $this->addAnd(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityNot($varchar) {
		return $this->andNot(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityLike($varchar) {
		return $this->andLike(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityNotLike($varchar) {
		return $this->andNotLike(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityGreater($varchar) {
		return $this->andGreater(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityGreaterEqual($varchar) {
		return $this->andGreaterEqual(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityLess($varchar) {
		return $this->andLess(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityLessEqual($varchar) {
		return $this->andLessEqual(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityNull() {
		return $this->andNull(Address::CITY);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityNotNull() {
		return $this->andNotNull(Address::CITY);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityBetween($varchar, $from, $to) {
		return $this->andBetween(Address::CITY, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityBeginsWith($varchar) {
		return $this->andBeginsWith(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityEndsWith($varchar) {
		return $this->andEndsWith(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andCityContains($varchar) {
		return $this->andContains(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCity($varchar) {
		return $this->or(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityNot($varchar) {
		return $this->orNot(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityLike($varchar) {
		return $this->orLike(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityNotLike($varchar) {
		return $this->orNotLike(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityGreater($varchar) {
		return $this->orGreater(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityGreaterEqual($varchar) {
		return $this->orGreaterEqual(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityLess($varchar) {
		return $this->orLess(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityLessEqual($varchar) {
		return $this->orLessEqual(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityNull() {
		return $this->orNull(Address::CITY);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityNotNull() {
		return $this->orNotNull(Address::CITY);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityBetween($varchar, $from, $to) {
		return $this->orBetween(Address::CITY, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityBeginsWith($varchar) {
		return $this->orBeginsWith(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityEndsWith($varchar) {
		return $this->orEndsWith(Address::CITY, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orCityContains($varchar) {
		return $this->orContains(Address::CITY, $varchar);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByCityAsc() {
		return $this->orderBy(Address::CITY, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByCityDesc() {
		return $this->orderBy(Address::CITY, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByCity() {
		return $this->groupBy(Address::CITY);
	}

	/**
	 * @return AddressQuery
	 */
	function andState($varchar) {
		return $this->addAnd(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateNot($varchar) {
		return $this->andNot(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateLike($varchar) {
		return $this->andLike(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateNotLike($varchar) {
		return $this->andNotLike(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateGreater($varchar) {
		return $this->andGreater(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateGreaterEqual($varchar) {
		return $this->andGreaterEqual(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateLess($varchar) {
		return $this->andLess(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateLessEqual($varchar) {
		return $this->andLessEqual(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateNull() {
		return $this->andNull(Address::STATE);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateNotNull() {
		return $this->andNotNull(Address::STATE);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateBetween($varchar, $from, $to) {
		return $this->andBetween(Address::STATE, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateBeginsWith($varchar) {
		return $this->andBeginsWith(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateEndsWith($varchar) {
		return $this->andEndsWith(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andStateContains($varchar) {
		return $this->andContains(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orState($varchar) {
		return $this->or(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateNot($varchar) {
		return $this->orNot(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateLike($varchar) {
		return $this->orLike(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateNotLike($varchar) {
		return $this->orNotLike(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateGreater($varchar) {
		return $this->orGreater(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateGreaterEqual($varchar) {
		return $this->orGreaterEqual(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateLess($varchar) {
		return $this->orLess(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateLessEqual($varchar) {
		return $this->orLessEqual(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateNull() {
		return $this->orNull(Address::STATE);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateNotNull() {
		return $this->orNotNull(Address::STATE);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateBetween($varchar, $from, $to) {
		return $this->orBetween(Address::STATE, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateBeginsWith($varchar) {
		return $this->orBeginsWith(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateEndsWith($varchar) {
		return $this->orEndsWith(Address::STATE, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orStateContains($varchar) {
		return $this->orContains(Address::STATE, $varchar);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByStateAsc() {
		return $this->orderBy(Address::STATE, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByStateDesc() {
		return $this->orderBy(Address::STATE, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByState() {
		return $this->groupBy(Address::STATE);
	}

	/**
	 * @return AddressQuery
	 */
	function andZip($varchar) {
		return $this->addAnd(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipNot($varchar) {
		return $this->andNot(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipLike($varchar) {
		return $this->andLike(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipNotLike($varchar) {
		return $this->andNotLike(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipGreater($varchar) {
		return $this->andGreater(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipGreaterEqual($varchar) {
		return $this->andGreaterEqual(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipLess($varchar) {
		return $this->andLess(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipLessEqual($varchar) {
		return $this->andLessEqual(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipNull() {
		return $this->andNull(Address::ZIP);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipNotNull() {
		return $this->andNotNull(Address::ZIP);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipBetween($varchar, $from, $to) {
		return $this->andBetween(Address::ZIP, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipBeginsWith($varchar) {
		return $this->andBeginsWith(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipEndsWith($varchar) {
		return $this->andEndsWith(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function andZipContains($varchar) {
		return $this->andContains(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZip($varchar) {
		return $this->or(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipNot($varchar) {
		return $this->orNot(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipLike($varchar) {
		return $this->orLike(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipNotLike($varchar) {
		return $this->orNotLike(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipGreater($varchar) {
		return $this->orGreater(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipGreaterEqual($varchar) {
		return $this->orGreaterEqual(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipLess($varchar) {
		return $this->orLess(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipLessEqual($varchar) {
		return $this->orLessEqual(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipNull() {
		return $this->orNull(Address::ZIP);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipNotNull() {
		return $this->orNotNull(Address::ZIP);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipBetween($varchar, $from, $to) {
		return $this->orBetween(Address::ZIP, $varchar, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipBeginsWith($varchar) {
		return $this->orBeginsWith(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipEndsWith($varchar) {
		return $this->orEndsWith(Address::ZIP, $varchar);
	}

	/**
	 * @return AddressQuery
	 */
	function orZipContains($varchar) {
		return $this->orContains(Address::ZIP, $varchar);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByZipAsc() {
		return $this->orderBy(Address::ZIP, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByZipDesc() {
		return $this->orderBy(Address::ZIP, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByZip() {
		return $this->groupBy(Address::ZIP);
	}

	/**
	 * @return AddressQuery
	 */
	function andActive($tinyint) {
		return $this->addAnd(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveNot($tinyint) {
		return $this->andNot(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveLike($tinyint) {
		return $this->andLike(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveNotLike($tinyint) {
		return $this->andNotLike(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveGreater($tinyint) {
		return $this->andGreater(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveGreaterEqual($tinyint) {
		return $this->andGreaterEqual(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveLess($tinyint) {
		return $this->andLess(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveLessEqual($tinyint) {
		return $this->andLessEqual(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveNull() {
		return $this->andNull(Address::ACTIVE);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveNotNull() {
		return $this->andNotNull(Address::ACTIVE);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveBetween($tinyint, $from, $to) {
		return $this->andBetween(Address::ACTIVE, $tinyint, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveBeginsWith($tinyint) {
		return $this->andBeginsWith(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveEndsWith($tinyint) {
		return $this->andEndsWith(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function andActiveContains($tinyint) {
		return $this->andContains(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActive($tinyint) {
		return $this->or(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveNot($tinyint) {
		return $this->orNot(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveLike($tinyint) {
		return $this->orLike(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveNotLike($tinyint) {
		return $this->orNotLike(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveGreater($tinyint) {
		return $this->orGreater(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveGreaterEqual($tinyint) {
		return $this->orGreaterEqual(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveLess($tinyint) {
		return $this->orLess(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveLessEqual($tinyint) {
		return $this->orLessEqual(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveNull() {
		return $this->orNull(Address::ACTIVE);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveNotNull() {
		return $this->orNotNull(Address::ACTIVE);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveBetween($tinyint, $from, $to) {
		return $this->orBetween(Address::ACTIVE, $tinyint, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveBeginsWith($tinyint) {
		return $this->orBeginsWith(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveEndsWith($tinyint) {
		return $this->orEndsWith(Address::ACTIVE, $tinyint);
	}

	/**
	 * @return AddressQuery
	 */
	function orActiveContains($tinyint) {
		return $this->orContains(Address::ACTIVE, $tinyint);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByActiveAsc() {
		return $this->orderBy(Address::ACTIVE, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByActiveDesc() {
		return $this->orderBy(Address::ACTIVE, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByActive() {
		return $this->groupBy(Address::ACTIVE);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreated($integer_timestamp) {
		return $this->addAnd(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedNot($integer_timestamp) {
		return $this->andNot(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedLike($integer_timestamp) {
		return $this->andLike(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedNotLike($integer_timestamp) {
		return $this->andNotLike(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedGreater($integer_timestamp) {
		return $this->andGreater(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedLess($integer_timestamp) {
		return $this->andLess(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedNull() {
		return $this->andNull(Address::CREATED);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedNotNull() {
		return $this->andNotNull(Address::CREATED);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Address::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andCreatedContains($integer_timestamp) {
		return $this->andContains(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreated($integer_timestamp) {
		return $this->or(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedNot($integer_timestamp) {
		return $this->orNot(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedLike($integer_timestamp) {
		return $this->orLike(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedNotLike($integer_timestamp) {
		return $this->orNotLike(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedGreater($integer_timestamp) {
		return $this->orGreater(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedLess($integer_timestamp) {
		return $this->orLess(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedNull() {
		return $this->orNull(Address::CREATED);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedNotNull() {
		return $this->orNotNull(Address::CREATED);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Address::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Address::CREATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orCreatedContains($integer_timestamp) {
		return $this->orContains(Address::CREATED, $integer_timestamp);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByCreatedAsc() {
		return $this->orderBy(Address::CREATED, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByCreatedDesc() {
		return $this->orderBy(Address::CREATED, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByCreated() {
		return $this->groupBy(Address::CREATED);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdated($integer_timestamp) {
		return $this->addAnd(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedNot($integer_timestamp) {
		return $this->andNot(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedLike($integer_timestamp) {
		return $this->andLike(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedNotLike($integer_timestamp) {
		return $this->andNotLike(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedGreater($integer_timestamp) {
		return $this->andGreater(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedLess($integer_timestamp) {
		return $this->andLess(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedNull() {
		return $this->andNull(Address::UPDATED);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedNotNull() {
		return $this->andNotNull(Address::UPDATED);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(Address::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function andUpdatedContains($integer_timestamp) {
		return $this->andContains(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdated($integer_timestamp) {
		return $this->or(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedNot($integer_timestamp) {
		return $this->orNot(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedLike($integer_timestamp) {
		return $this->orLike(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedNotLike($integer_timestamp) {
		return $this->orNotLike(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedGreater($integer_timestamp) {
		return $this->orGreater(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedLess($integer_timestamp) {
		return $this->orLess(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedNull() {
		return $this->orNull(Address::UPDATED);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedNotNull() {
		return $this->orNotNull(Address::UPDATED);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(Address::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(Address::UPDATED, $integer_timestamp);
	}

	/**
	 * @return AddressQuery
	 */
	function orUpdatedContains($integer_timestamp) {
		return $this->orContains(Address::UPDATED, $integer_timestamp);
	}


	/**
	 * @return AddressQuery
	 */
	function orderByUpdatedAsc() {
		return $this->orderBy(Address::UPDATED, self::ASC);
	}

	/**
	 * @return AddressQuery
	 */
	function orderByUpdatedDesc() {
		return $this->orderBy(Address::UPDATED, self::DESC);
	}

	/**
	 * @return AddressQuery
	 */
	function groupByUpdated() {
		return $this->groupBy(Address::UPDATED);
	}


}