<?php

abstract class baseUserQuery extends Query {

	function __construct($table_name = null, $alias = null) {
		if (null === $table_name) {
			$table_name = User::getTableName();
		}
		return parent::__construct($table_name, $alias);
	}

	/**
	 * Returns new instance of self by passing arguments directly to constructor.
	 * @param string $alias
	 * @return UserQuery
	 */
	static function create($table_name = null, $alias = null) {
		return new UserQuery($table_name, $alias);
	}

	/**
	 * @return User[]
	 */
	function select() {
		return User::doSelect($this);
	}

	/**
	 * @return User
	 */
	function selectOne() {
		$records = User::doSelect($this);
		return array_shift($records);
	}

	/**
	 * @return int
	 */
	function delete(){
		return User::doDelete($this);
	}

	/**
	 * @return int
	 */
	function count(){
		return User::doCount($this);
	}

	/**
	 * @return UserQuery
	 */
	function addAnd($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && User::isTemporalType($type)) {
			$value = User::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = User::coerceTemporalValue($column, $type);
		}
		return parent::addAnd($column, $value, $operator, $quote);
	}

	/**
	 * @return UserQuery
	 */
	function addOr($column, $value=null, $operator=self::EQUAL, $quote = null, $type = null) {
		if (null !== $type && User::isTemporalType($type)) {
			$value = User::coerceTemporalValue($value, $type);
		}
		if (null === $value && is_array($column) && Model::isTemporalType($type)) {
			$column = User::coerceTemporalValue($column, $type);
		}
		return parent::addOr($column, $value, $operator, $quote);
	}

	/**
	 * @return UserQuery
	 */
	function andId($integer) {
		return $this->addAnd(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdNot($integer) {
		return $this->andNot(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdLike($integer) {
		return $this->andLike(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdNotLike($integer) {
		return $this->andNotLike(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdGreater($integer) {
		return $this->andGreater(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdGreaterEqual($integer) {
		return $this->andGreaterEqual(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdLess($integer) {
		return $this->andLess(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdLessEqual($integer) {
		return $this->andLessEqual(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdNull() {
		return $this->andNull(User::ID);
	}

	/**
	 * @return UserQuery
	 */
	function andIdNotNull() {
		return $this->andNotNull(User::ID);
	}

	/**
	 * @return UserQuery
	 */
	function andIdBetween($integer, $from, $to) {
		return $this->andBetween(User::ID, $integer, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function andIdBeginsWith($integer) {
		return $this->andBeginsWith(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdEndsWith($integer) {
		return $this->andEndsWith(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andIdContains($integer) {
		return $this->andContains(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orId($integer) {
		return $this->or(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdNot($integer) {
		return $this->orNot(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdLike($integer) {
		return $this->orLike(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdNotLike($integer) {
		return $this->orNotLike(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdGreater($integer) {
		return $this->orGreater(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdGreaterEqual($integer) {
		return $this->orGreaterEqual(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdLess($integer) {
		return $this->orLess(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdLessEqual($integer) {
		return $this->orLessEqual(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdNull() {
		return $this->orNull(User::ID);
	}

	/**
	 * @return UserQuery
	 */
	function orIdNotNull() {
		return $this->orNotNull(User::ID);
	}

	/**
	 * @return UserQuery
	 */
	function orIdBetween($integer, $from, $to) {
		return $this->orBetween(User::ID, $integer, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function orIdBeginsWith($integer) {
		return $this->orBeginsWith(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdEndsWith($integer) {
		return $this->orEndsWith(User::ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orIdContains($integer) {
		return $this->orContains(User::ID, $integer);
	}


	/**
	 * @return UserQuery
	 */
	function orderByIdAsc() {
		return $this->orderBy(User::ID, self::ASC);
	}

	/**
	 * @return UserQuery
	 */
	function orderByIdDesc() {
		return $this->orderBy(User::ID, self::DESC);
	}

	/**
	 * @return UserQuery
	 */
	function groupById() {
		return $this->groupBy(User::ID);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingId($integer) {
		return $this->addAnd(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdNot($integer) {
		return $this->andNot(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdLike($integer) {
		return $this->andLike(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdNotLike($integer) {
		return $this->andNotLike(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdGreater($integer) {
		return $this->andGreater(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdGreaterEqual($integer) {
		return $this->andGreaterEqual(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdLess($integer) {
		return $this->andLess(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdLessEqual($integer) {
		return $this->andLessEqual(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdNull() {
		return $this->andNull(User::WEDDING_ID);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdNotNull() {
		return $this->andNotNull(User::WEDDING_ID);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdBetween($integer, $from, $to) {
		return $this->andBetween(User::WEDDING_ID, $integer, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdBeginsWith($integer) {
		return $this->andBeginsWith(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdEndsWith($integer) {
		return $this->andEndsWith(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function andWeddingIdContains($integer) {
		return $this->andContains(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingId($integer) {
		return $this->or(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdNot($integer) {
		return $this->orNot(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdLike($integer) {
		return $this->orLike(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdNotLike($integer) {
		return $this->orNotLike(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdGreater($integer) {
		return $this->orGreater(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdGreaterEqual($integer) {
		return $this->orGreaterEqual(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdLess($integer) {
		return $this->orLess(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdLessEqual($integer) {
		return $this->orLessEqual(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdNull() {
		return $this->orNull(User::WEDDING_ID);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdNotNull() {
		return $this->orNotNull(User::WEDDING_ID);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdBetween($integer, $from, $to) {
		return $this->orBetween(User::WEDDING_ID, $integer, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdBeginsWith($integer) {
		return $this->orBeginsWith(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdEndsWith($integer) {
		return $this->orEndsWith(User::WEDDING_ID, $integer);
	}

	/**
	 * @return UserQuery
	 */
	function orWeddingIdContains($integer) {
		return $this->orContains(User::WEDDING_ID, $integer);
	}


	/**
	 * @return UserQuery
	 */
	function orderByWeddingIdAsc() {
		return $this->orderBy(User::WEDDING_ID, self::ASC);
	}

	/**
	 * @return UserQuery
	 */
	function orderByWeddingIdDesc() {
		return $this->orderBy(User::WEDDING_ID, self::DESC);
	}

	/**
	 * @return UserQuery
	 */
	function groupByWeddingId() {
		return $this->groupBy(User::WEDDING_ID);
	}

	/**
	 * @return UserQuery
	 */
	function andUsername($varchar) {
		return $this->addAnd(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameNot($varchar) {
		return $this->andNot(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameLike($varchar) {
		return $this->andLike(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameNotLike($varchar) {
		return $this->andNotLike(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameGreater($varchar) {
		return $this->andGreater(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameGreaterEqual($varchar) {
		return $this->andGreaterEqual(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameLess($varchar) {
		return $this->andLess(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameLessEqual($varchar) {
		return $this->andLessEqual(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameNull() {
		return $this->andNull(User::USERNAME);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameNotNull() {
		return $this->andNotNull(User::USERNAME);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameBetween($varchar, $from, $to) {
		return $this->andBetween(User::USERNAME, $varchar, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameBeginsWith($varchar) {
		return $this->andBeginsWith(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameEndsWith($varchar) {
		return $this->andEndsWith(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andUsernameContains($varchar) {
		return $this->andContains(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsername($varchar) {
		return $this->or(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameNot($varchar) {
		return $this->orNot(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameLike($varchar) {
		return $this->orLike(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameNotLike($varchar) {
		return $this->orNotLike(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameGreater($varchar) {
		return $this->orGreater(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameGreaterEqual($varchar) {
		return $this->orGreaterEqual(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameLess($varchar) {
		return $this->orLess(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameLessEqual($varchar) {
		return $this->orLessEqual(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameNull() {
		return $this->orNull(User::USERNAME);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameNotNull() {
		return $this->orNotNull(User::USERNAME);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameBetween($varchar, $from, $to) {
		return $this->orBetween(User::USERNAME, $varchar, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameBeginsWith($varchar) {
		return $this->orBeginsWith(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameEndsWith($varchar) {
		return $this->orEndsWith(User::USERNAME, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orUsernameContains($varchar) {
		return $this->orContains(User::USERNAME, $varchar);
	}


	/**
	 * @return UserQuery
	 */
	function orderByUsernameAsc() {
		return $this->orderBy(User::USERNAME, self::ASC);
	}

	/**
	 * @return UserQuery
	 */
	function orderByUsernameDesc() {
		return $this->orderBy(User::USERNAME, self::DESC);
	}

	/**
	 * @return UserQuery
	 */
	function groupByUsername() {
		return $this->groupBy(User::USERNAME);
	}

	/**
	 * @return UserQuery
	 */
	function andPassword($varchar) {
		return $this->addAnd(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordNot($varchar) {
		return $this->andNot(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordLike($varchar) {
		return $this->andLike(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordNotLike($varchar) {
		return $this->andNotLike(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordGreater($varchar) {
		return $this->andGreater(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordGreaterEqual($varchar) {
		return $this->andGreaterEqual(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordLess($varchar) {
		return $this->andLess(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordLessEqual($varchar) {
		return $this->andLessEqual(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordNull() {
		return $this->andNull(User::PASSWORD);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordNotNull() {
		return $this->andNotNull(User::PASSWORD);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordBetween($varchar, $from, $to) {
		return $this->andBetween(User::PASSWORD, $varchar, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordBeginsWith($varchar) {
		return $this->andBeginsWith(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordEndsWith($varchar) {
		return $this->andEndsWith(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function andPasswordContains($varchar) {
		return $this->andContains(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPassword($varchar) {
		return $this->or(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordNot($varchar) {
		return $this->orNot(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordLike($varchar) {
		return $this->orLike(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordNotLike($varchar) {
		return $this->orNotLike(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordGreater($varchar) {
		return $this->orGreater(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordGreaterEqual($varchar) {
		return $this->orGreaterEqual(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordLess($varchar) {
		return $this->orLess(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordLessEqual($varchar) {
		return $this->orLessEqual(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordNull() {
		return $this->orNull(User::PASSWORD);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordNotNull() {
		return $this->orNotNull(User::PASSWORD);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordBetween($varchar, $from, $to) {
		return $this->orBetween(User::PASSWORD, $varchar, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordBeginsWith($varchar) {
		return $this->orBeginsWith(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordEndsWith($varchar) {
		return $this->orEndsWith(User::PASSWORD, $varchar);
	}

	/**
	 * @return UserQuery
	 */
	function orPasswordContains($varchar) {
		return $this->orContains(User::PASSWORD, $varchar);
	}


	/**
	 * @return UserQuery
	 */
	function orderByPasswordAsc() {
		return $this->orderBy(User::PASSWORD, self::ASC);
	}

	/**
	 * @return UserQuery
	 */
	function orderByPasswordDesc() {
		return $this->orderBy(User::PASSWORD, self::DESC);
	}

	/**
	 * @return UserQuery
	 */
	function groupByPassword() {
		return $this->groupBy(User::PASSWORD);
	}

	/**
	 * @return UserQuery
	 */
	function andCreated($integer_timestamp) {
		return $this->addAnd(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedNot($integer_timestamp) {
		return $this->andNot(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedLike($integer_timestamp) {
		return $this->andLike(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedNotLike($integer_timestamp) {
		return $this->andNotLike(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedGreater($integer_timestamp) {
		return $this->andGreater(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedLess($integer_timestamp) {
		return $this->andLess(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedNull() {
		return $this->andNull(User::CREATED);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedNotNull() {
		return $this->andNotNull(User::CREATED);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(User::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andCreatedContains($integer_timestamp) {
		return $this->andContains(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreated($integer_timestamp) {
		return $this->or(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedNot($integer_timestamp) {
		return $this->orNot(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedLike($integer_timestamp) {
		return $this->orLike(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedNotLike($integer_timestamp) {
		return $this->orNotLike(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedGreater($integer_timestamp) {
		return $this->orGreater(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedLess($integer_timestamp) {
		return $this->orLess(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedNull() {
		return $this->orNull(User::CREATED);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedNotNull() {
		return $this->orNotNull(User::CREATED);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(User::CREATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(User::CREATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orCreatedContains($integer_timestamp) {
		return $this->orContains(User::CREATED, $integer_timestamp);
	}


	/**
	 * @return UserQuery
	 */
	function orderByCreatedAsc() {
		return $this->orderBy(User::CREATED, self::ASC);
	}

	/**
	 * @return UserQuery
	 */
	function orderByCreatedDesc() {
		return $this->orderBy(User::CREATED, self::DESC);
	}

	/**
	 * @return UserQuery
	 */
	function groupByCreated() {
		return $this->groupBy(User::CREATED);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdated($integer_timestamp) {
		return $this->addAnd(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedNot($integer_timestamp) {
		return $this->andNot(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedLike($integer_timestamp) {
		return $this->andLike(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedNotLike($integer_timestamp) {
		return $this->andNotLike(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedGreater($integer_timestamp) {
		return $this->andGreater(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedGreaterEqual($integer_timestamp) {
		return $this->andGreaterEqual(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedLess($integer_timestamp) {
		return $this->andLess(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedLessEqual($integer_timestamp) {
		return $this->andLessEqual(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedNull() {
		return $this->andNull(User::UPDATED);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedNotNull() {
		return $this->andNotNull(User::UPDATED);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->andBetween(User::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedBeginsWith($integer_timestamp) {
		return $this->andBeginsWith(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedEndsWith($integer_timestamp) {
		return $this->andEndsWith(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function andUpdatedContains($integer_timestamp) {
		return $this->andContains(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdated($integer_timestamp) {
		return $this->or(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedNot($integer_timestamp) {
		return $this->orNot(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedLike($integer_timestamp) {
		return $this->orLike(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedNotLike($integer_timestamp) {
		return $this->orNotLike(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedGreater($integer_timestamp) {
		return $this->orGreater(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedGreaterEqual($integer_timestamp) {
		return $this->orGreaterEqual(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedLess($integer_timestamp) {
		return $this->orLess(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedLessEqual($integer_timestamp) {
		return $this->orLessEqual(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedNull() {
		return $this->orNull(User::UPDATED);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedNotNull() {
		return $this->orNotNull(User::UPDATED);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedBetween($integer_timestamp, $from, $to) {
		return $this->orBetween(User::UPDATED, $integer_timestamp, $from, $to);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedBeginsWith($integer_timestamp) {
		return $this->orBeginsWith(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedEndsWith($integer_timestamp) {
		return $this->orEndsWith(User::UPDATED, $integer_timestamp);
	}

	/**
	 * @return UserQuery
	 */
	function orUpdatedContains($integer_timestamp) {
		return $this->orContains(User::UPDATED, $integer_timestamp);
	}


	/**
	 * @return UserQuery
	 */
	function orderByUpdatedAsc() {
		return $this->orderBy(User::UPDATED, self::ASC);
	}

	/**
	 * @return UserQuery
	 */
	function orderByUpdatedDesc() {
		return $this->orderBy(User::UPDATED, self::DESC);
	}

	/**
	 * @return UserQuery
	 */
	function groupByUpdated() {
		return $this->groupBy(User::UPDATED);
	}


}