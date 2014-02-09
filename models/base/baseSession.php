<?php
/**
 *		Created by Dan Blaisdell's DABL
 *		Do not alter base files, as they will be overwritten.
 *		To alter the objects, alter the extended classes in
 *		the 'models' folder.
 *
 */
abstract class baseSession extends ApplicationModel {

	const ID = 'session.id';
	const USER_ID = 'session.user_id';
	const HASH = 'session.hash';
	const USER_AGENT = 'session.user_agent';
	const IP_ADDRESS = 'session.ip_address';
	const TERMINATED = 'session.terminated';
	const CREATED = 'session.created';
	const UPDATED = 'session.updated';

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $_tableName = 'session';

	/**
	 * Cache of objects retrieved from the database
	 * @var Session[]
	 */
	protected static $_instancePool = array();

	protected static $_instancePoolCount = 0;

	protected static $_poolEnabled = true;

	/**
	 * Array of objects to batch insert
	 */
	protected static $_insertBatch = array();

	/**
	 * Maximum size of the insert batch
	 */
	protected static $_insertBatchSize = 500;

	/**
	 * Array of all primary keys
	 * @var string[]
	 */
	protected static $_primaryKeys = array(
		'id',
	);

	/**
	 * string name of the primary key column
	 * @var string
	 */
	protected static $_primaryKey = 'id';

	/**
	 * true if primary key is an auto-increment column
	 * @var bool
	 */
	protected static $_isAutoIncrement = true;

	/**
	 * array of all fully-qualified(table.column) columns
	 * @var string[]
	 */
	protected static $_columns = array(
		Session::ID,
		Session::USER_ID,
		Session::HASH,
		Session::USER_AGENT,
		Session::IP_ADDRESS,
		Session::TERMINATED,
		Session::CREATED,
		Session::UPDATED,
	);

	/**
	 * array of all column names
	 * @var string[]
	 */
	protected static $_columnNames = array(
		'id',
		'user_id',
		'hash',
		'user_agent',
		'ip_address',
		'terminated',
		'created',
		'updated',
	);

	/**
	 * array of all column types
	 * @var string[]
	 */
	protected static $_columnTypes = array(
		'id' => Model::COLUMN_TYPE_INTEGER,
		'user_id' => Model::COLUMN_TYPE_INTEGER,
		'hash' => Model::COLUMN_TYPE_VARCHAR,
		'user_agent' => Model::COLUMN_TYPE_VARCHAR,
		'ip_address' => Model::COLUMN_TYPE_VARCHAR,
		'terminated' => Model::COLUMN_TYPE_TIMESTAMP,
		'created' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
		'updated' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
	);

	/**
	 * `id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $id;

	/**
	 * `user_id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $user_id;

	/**
	 * `hash` VARCHAR NOT NULL
	 * @var string
	 */
	protected $hash;

	/**
	 * `user_agent` VARCHAR NOT NULL
	 * @var string
	 */
	protected $user_agent;

	/**
	 * `ip_address` VARCHAR NOT NULL
	 * @var string
	 */
	protected $ip_address;

	/**
	 * `terminated` TIMESTAMP
	 * @var string
	 */
	protected $terminated;

	/**
	 * `created` INTEGER_TIMESTAMP DEFAULT ''
	 * @var int
	 */
	protected $created;

	/**
	 * `updated` INTEGER_TIMESTAMP DEFAULT ''
	 * @var int
	 */
	protected $updated;

	/**
	 * Gets the value of the id field
	 */
	function getId() {
		return $this->id;
	}

	/**
	 * Sets the value of the id field
	 * @return Session
	 */
	function setId($value) {
		return $this->setColumnValue('id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Gets the value of the user_id field
	 */
	function getUserId() {
		return $this->user_id;
	}

	/**
	 * Sets the value of the user_id field
	 * @return Session
	 */
	function setUserId($value) {
		return $this->setColumnValue('user_id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for Session::getUserId
	 * final because getUserId should be extended instead
	 * to ensure consistent behavior
	 * @see Session::getUserId
	 */
	final function getUser_id() {
		return $this->getUserId();
	}

	/**
	 * Convenience function for Session::setUserId
	 * final because setUserId should be extended instead
	 * to ensure consistent behavior
	 * @see Session::setUserId
	 * @return Session
	 */
	final function setUser_id($value) {
		return $this->setUserId($value);
	}

	/**
	 * Gets the value of the hash field
	 */
	function getHash() {
		return $this->hash;
	}

	/**
	 * Sets the value of the hash field
	 * @return Session
	 */
	function setHash($value) {
		return $this->setColumnValue('hash', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Gets the value of the user_agent field
	 */
	function getUserAgent() {
		return $this->user_agent;
	}

	/**
	 * Sets the value of the user_agent field
	 * @return Session
	 */
	function setUserAgent($value) {
		return $this->setColumnValue('user_agent', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Convenience function for Session::getUserAgent
	 * final because getUserAgent should be extended instead
	 * to ensure consistent behavior
	 * @see Session::getUserAgent
	 */
	final function getUser_agent() {
		return $this->getUserAgent();
	}

	/**
	 * Convenience function for Session::setUserAgent
	 * final because setUserAgent should be extended instead
	 * to ensure consistent behavior
	 * @see Session::setUserAgent
	 * @return Session
	 */
	final function setUser_agent($value) {
		return $this->setUserAgent($value);
	}

	/**
	 * Gets the value of the ip_address field
	 */
	function getIpAddress() {
		return $this->ip_address;
	}

	/**
	 * Sets the value of the ip_address field
	 * @return Session
	 */
	function setIpAddress($value) {
		return $this->setColumnValue('ip_address', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Convenience function for Session::getIpAddress
	 * final because getIpAddress should be extended instead
	 * to ensure consistent behavior
	 * @see Session::getIpAddress
	 */
	final function getIp_address() {
		return $this->getIpAddress();
	}

	/**
	 * Convenience function for Session::setIpAddress
	 * final because setIpAddress should be extended instead
	 * to ensure consistent behavior
	 * @see Session::setIpAddress
	 * @return Session
	 */
	final function setIp_address($value) {
		return $this->setIpAddress($value);
	}

	/**
	 * Gets the value of the terminated field
	 */
	function getTerminated($format = null) {
		if (null === $this->terminated || null === $format) {
			return $this->terminated;
		}
		if (0 === strpos($this->terminated, '0000-00-00')) {
			return null;
		}
		return date($format, strtotime($this->terminated));
	}

	/**
	 * Sets the value of the terminated field
	 * @return Session
	 */
	function setTerminated($value) {
		return $this->setColumnValue('terminated', $value, Model::COLUMN_TYPE_TIMESTAMP);
	}

	/**
	 * Gets the value of the created field
	 */
	function getCreated($format = 'Y-m-d H:i:s') {
		if (null === $this->created || null === $format) {
			return $this->created;
		}
		return date($format, $this->created);
	}

	/**
	 * Sets the value of the created field
	 * @return Session
	 */
	function setCreated($value) {
		return $this->setColumnValue('created', $value, Model::COLUMN_TYPE_INTEGER_TIMESTAMP);
	}

	/**
	 * Gets the value of the updated field
	 */
	function getUpdated($format = 'Y-m-d H:i:s') {
		if (null === $this->updated || null === $format) {
			return $this->updated;
		}
		return date($format, $this->updated);
	}

	/**
	 * Sets the value of the updated field
	 * @return Session
	 */
	function setUpdated($value) {
		return $this->setColumnValue('updated', $value, Model::COLUMN_TYPE_INTEGER_TIMESTAMP);
	}

	/**
	 * @return DABLPDO
	 */
	static function getConnection() {
		return DBManager::getConnection('default_connection');
	}

	/**
	 * @return Session
	 */
	static function create() {
		return new Session();
	}

	/**
	 * @return Query
	 */
	static function getQuery(array $params = array(), Query $q = null) {
		$class = class_exists('SessionQuery') ? 'SessionQuery' : 'Query';
		$q = $q ? clone $q : new $class;
		if (!$q->getTable()) {
			$q->setTable(Session::getTableName());
		}

		// filters
		foreach ($params as $key => &$param) {
			if (Session::hasColumn($key)) {
				$q->add($key, $param);
			}
		}

		// SortBy (alias of sort_by, deprecated)
		if (isset($params['SortBy']) && !isset($params['order_by'])) {
			$params['order_by'] = $params['SortBy'];
		}

		// order_by
		if (isset($params['order_by']) && Session::hasColumn($params['order_by'])) {
			$q->orderBy($params['order_by'], isset($params['dir']) ? Query::DESC : Query::ASC);
		}

		return $q;
	}

	/**
	 * Returns String representation of table name
	 * @return string
	 */
	static function getTableName() {
		return Session::$_tableName;
	}

	/**
	 * Access to array of column names
	 * @return array
	 */
	static function getColumnNames() {
		return Session::$_columnNames;
	}

	/**
	 * Access to array of fully-qualified(table.column) columns
	 * @return array
	 */
	static function getColumns() {
		return Session::$_columns;
	}

	/**
	 * Access to array of column types, indexed by column name
	 * @return array
	 */
	static function getColumnTypes() {
		return Session::$_columnTypes;
	}

	/**
	 * Get the type of a column
	 * @return string
	 */
	static function getColumnType($column_name) {
		return Session::$_columnTypes[Session::normalizeColumnName($column_name)];
	}

	/**
	 * @return bool
	 */
	static function hasColumn($column_name) {
		static $columns_cache = null;
		if (null === $columns_cache) {
			$columns_cache = array_map('strtolower', Session::$_columnNames);
		}
		return in_array(strtolower(Session::normalizeColumnName($column_name)), $columns_cache);
	}


	/**
	 * Access to array of primary keys
	 * @return array
	 */
	static function getPrimaryKeys() {
		return Session::$_primaryKeys;
	}

	/**
	 * Access to name of primary key
	 * @return array
	 */
	static function getPrimaryKey() {
		return Session::$_primaryKey;
	}

	/**
	 * Returns true if the primary key column for this table is auto-increment
	 * @return bool
	 */
	static function isAutoIncrement() {
		return Session::$_isAutoIncrement;
	}

	/**
	 * Searches the database for a row with the ID(primary key) that matches
	 * the one input.
	 * @return Session
	 */
	 static function retrieveByPK($id) {
		return Session::retrieveByPKs($id);
	}

	/**
	 * Searches the database for a row with the primary keys that match
	 * the ones input.
	 * @return Session
	 */
	static function retrieveByPKs($id) {
		if (null === $id) {
			return null;
		}
		if (Session::$_poolEnabled) {
			$pool_instance = Session::retrieveFromPool($id);
			if (null !== $pool_instance) {
				return $pool_instance;
			}
		}
		$q = new Query;
		$q->add('id', $id);
		return Session::doSelectOne($q);
	}

	/**
	 * Searches the database for a row with a id
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveById($value) {
		return Session::retrieveByPK($value);
	}

	/**
	 * Searches the database for a row with a user_id
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveByUserId($value) {
		return Session::retrieveByColumn('user_id', $value);
	}

	/**
	 * Searches the database for a row with a hash
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveByHash($value) {
		return Session::retrieveByColumn('hash', $value);
	}

	/**
	 * Searches the database for a row with a user_agent
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveByUserAgent($value) {
		return Session::retrieveByColumn('user_agent', $value);
	}

	/**
	 * Searches the database for a row with a ip_address
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveByIpAddress($value) {
		return Session::retrieveByColumn('ip_address', $value);
	}

	/**
	 * Searches the database for a row with a terminated
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveByTerminated($value) {
		return Session::retrieveByColumn('terminated', $value);
	}

	/**
	 * Searches the database for a row with a created
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveByCreated($value) {
		return Session::retrieveByColumn('created', $value);
	}

	/**
	 * Searches the database for a row with a updated
	 * value that matches the one provided
	 * @return Session
	 */
	static function retrieveByUpdated($value) {
		return Session::retrieveByColumn('updated', $value);
	}

	static function retrieveByColumn($field, $value) {
		$q = Query::create()->add($field, $value)->setLimit(1)->order('id');
		return Session::doSelectOne($q);
	}

	/**
	 * Populates and returns an instance of Session with the
	 * first result of a query.  If the query returns no results,
	 * returns null.
	 * @return Session
	 */
	static function fetchSingle($query_string) {
		$records = Session::fetch($query_string);
		return array_shift($records);
	}

	/**
	 * Populates and returns an array of Session objects with the
	 * results of a query.  If the query returns no results,
	 * returns an empty Array.
	 * @return Session[]
	 */
	static function fetch($query_string) {
		$conn = Session::getConnection();
		$result = $conn->query($query_string);
		return Session::fromResult($result, 'Session');
	}

	/**
	 * Returns an array of Session objects from
	 * a PDOStatement(query result).
	 *
	 * @see Model::fromResult
	 */
	static function fromResult(PDOStatement $result, $class = 'Session', $use_pool = null) {
		if (null === $use_pool) {
			$use_pool = Session::$_poolEnabled;
		}
		return Model::fromResult($result, $class, $use_pool);
	}

	/**
	 * Casts values of int fields to (int)
	 * @return Session
	 */
	function castInts() {
		$this->id = (null === $this->id) ? null : (int) $this->id;
		$this->user_id = (null === $this->user_id) ? null : (int) $this->user_id;
		$this->created = (null === $this->created) ? null : (int) $this->created;
		$this->updated = (null === $this->updated) ? null : (int) $this->updated;
		return $this;
	}

	/**
	 * Add (or replace) to the instance pool.
	 *
	 * @param Session $object
	 * @return void
	 */
	static function insertIntoPool(Session $object) {
		if (!Session::$_poolEnabled) {
			return;
		}
		if (Session::$_instancePoolCount > Session::MAX_INSTANCE_POOL_SIZE) {
			return;
		}

		Session::$_instancePool[implode('-', $object->getPrimaryKeyValues())] = $object;
		++Session::$_instancePoolCount;
	}

	/**
	 * Return the cached instance from the pool.
	 *
	 * @param mixed $pk Primary Key
	 * @return Session
	 */
	static function retrieveFromPool($pk) {
		if (!Session::$_poolEnabled || null === $pk) {
			return null;
		}
		if (array_key_exists($pk, Session::$_instancePool)) {
			return Session::$_instancePool[$pk];
		}

		return null;
	}

	/**
	 * Remove the object from the instance pool.
	 *
	 * @param mixed $object Object or PK to remove
	 * @return void
	 */
	static function removeFromPool($object) {
		$pk = is_object($object) ? implode('-', $object->getPrimaryKeyValues()) : $object;

		if (array_key_exists($pk, Session::$_instancePool)) {
			unset(Session::$_instancePool[$pk]);
			--Session::$_instancePoolCount;
		}
	}

	/**
	 * Empty the instance pool.
	 *
	 * @return void
	 */
	static function flushPool() {
		Session::$_instancePool = array();
	}

	static function setPoolEnabled($bool = true) {
		Session::$_poolEnabled = $bool;
	}

	static function getPoolEnabled() {
		return Session::$_poolEnabled;
	}

	/**
	 * Returns an array of all Session objects in the database.
	 * $extra SQL can be appended to the query to LIMIT, SORT, and/or GROUP results.
	 * If there are no results, returns an empty Array.
	 * @param $extra string
	 * @return Session[]
	 */
	static function getAll($extra = null) {
		$conn = Session::getConnection();
		$table_quoted = $conn->quoteIdentifier(Session::getTableName());
		return Session::fetch("SELECT * FROM $table_quoted $extra ");
	}

	/**
	 * @return int
	 */
	static function doCount(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Session::getConnection();
		if (!$q->getTable()) {
			$q->setTable(Session::getTableName());
		}
		return $q->doCount($conn);
	}

	/**
	 * @param Query $q
	 * @param bool $flush_pool
	 * @return int
	 */
	static function doDelete(Query $q, $flush_pool = true) {
		$conn = Session::getConnection();
		$q = clone $q;
		if (!$q->getTable()) {
			$q->setTable(Session::getTableName());
		}
		$result = $q->doDelete($conn);

		if ($flush_pool) {
			Session::flushPool();
		}

		return $result;
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Session[]
	 */
	static function doSelect(Query $q = null, $additional_classes = null) {
		if (is_array($additional_classes)) {
			array_unshift($additional_classes, 'Session');
			$class = $additional_classes;
		} else {
			$class = 'Session';
		}

		return Session::fromResult(Session::doSelectRS($q), $class);
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Session	 */
	static function doSelectOne(Query $q = null, $additional_classes = null) {
		$q = $q ? clone $q : new Query;
		$q->setLimit(1);
		$result = Session::doSelect($q, $additional_classes);
		return array_shift($result);
	}

	/**
	 * @param array $column_values
	 * @param Query $q The Query object that creates the SELECT query string
	 * @return Session[]
	 */
	static function doUpdate(array $column_values, Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Session::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Session::getTableName());
		}

		return $q->doUpdate($column_values, $conn);
	}

	/**
	 * Set the maximum insert batch size, once this size is reached the batch automatically inserts.
	 * @param int $size
	 * @return int insert batch size
	 */
	static function setInsertBatchSize($size = 500) {
		return Session::$_insertBatchSize = $size;
	}

	/**
	 * Queue for batch insert
	 * @return Model this
	 */
	function queueForInsert() {
		// If we've reached the maximum batch size, insert it and empty it.
		if (count(Session::$_insertBatch) >= Session::$_insertBatchSize) {
			Session::insertBatch();
		}

		Session::$_insertBatch[] = $this;

		return $this;
	}

	/**
	 * @return int row count
	 * @throws RuntimeException
	 */
	static function insertBatch() {
		$records = Session::$_insertBatch;
		if (!$records) {
			return 0;
		}
		$conn = Session::getConnection();
		$columns = Session::getColumnNames();
		$quoted_table = $conn->quoteIdentifier(Session::getTableName());

		$pk = Session::getPrimaryKey();
		foreach ($columns as $key => &$c) {
			if ($c == $pk) {
				unset($columns[$key]);
				break;
			}
		}

		$values = array();

		$query_s = 'INSERT INTO ' . $quoted_table . ' (' . implode(', ', array_map(array($conn, 'quoteIdentifier'), $columns)) . ') VALUES' . "\n";

		foreach ($records as $k => $r) {
			$placeholders = array();

			if (!$r->validate()) {
				throw new RuntimeException('Cannot save ' . get_class($r) . ' with validation errors: ' . implode(', ', $r->getValidationErrors()));
			}
			if ($r->isNew() && $r->hasColumn('Created') && !$r->isColumnModified('Created')) {
				$r->setCreated(time());
			}
			if (($r->isNew() || $r->isModified()) && $r->hasColumn('Updated') && !$r->isColumnModified('Updated')) {
				$r->setUpdated(time());
			}

			foreach ($columns as &$column) {
				if ($column == $pk) {
					continue;
				}
				$values[] = $r->$column;
				$placeholders[] = '?';
			}

			if ($k > 0) {
				$query_s .= ",\n";
			}
			$query_s .= '(' . implode(', ', $placeholders) . ')';
		}

		$statement = new QueryStatement($conn);
		$statement->setString($query_s);
		$statement->setParams($values);

		$result = $statement->bindAndExecute();

		foreach ($records as $r) {
			$r->setNew(false);
			$r->resetModified();

			if ($r->hasPrimaryKeyValues()) {
				Session::insertIntoPool($r);
			} else {
				$r->setDirty(true);
			}
		}

		Session::$_insertBatch = array();
		return $result->rowCount();
	}

	static function coerceTemporalValue($value, $column_type, DABLPDO $conn = null) {
		if (null === $conn) {
			$conn = Session::getConnection();
		}
		return parent::coerceTemporalValue($value, $column_type, $conn);
	}

	/**
	 * Executes a select query and returns the PDO result
	 * @return PDOStatement
	 */
	static function doSelectRS(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Session::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Session::getTableName());
		}

		return $q->doSelect($conn);
	}

	/**
	 * @return Session
	 */
	function setUser(User $user = null) {
		return $this->setUserRelatedByUserId($user);
	}

	/**
	 * @return Session
	 */
	function setUserRelatedByUserId(User $user = null) {
		if (null === $user) {
			$this->setuser_id(null);
		} else {
			if (!$user->getid()) {
				throw new Exception('Cannot connect a User without a id');
			}
			$this->setuser_id($user->getid());
		}
		return $this;
	}

	/**
	 * Returns a user object with a id
	 * that matches $this->user_id.
	 * @return User
	 */
	function getUser() {
		return $this->getUserRelatedByUserId();
	}

	/**
	 * Returns a user object with a id
	 * that matches $this->user_id.
	 * @return User
	 */
	function getUserRelatedByUserId() {
		$fk_value = $this->getuser_id();
		if (null === $fk_value) {
			return null;
		}
		return User::retrieveByPK($fk_value);
	}

	static function doSelectJoinUser(Query $q = null, $join_type = Query::LEFT_JOIN) {
		return Session::doSelectJoinUserRelatedByUserId($q, $join_type);
	}

	/**
	 * @return Session[]
	 */
	static function doSelectJoinUserRelatedByUserId(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Session::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Session::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Session::getColumns();
			}
		}

		$to_table = User::getTableName();
		$q->join($to_table, $this_table . '.user_id = ' . $to_table . '.id', $join_type);
		foreach (User::getColumns() as $column) {
			$columns[] = $column;
		}
		$q->setColumns($columns);

		return Session::doSelect($q, array('User'));
	}

	/**
	 * @return Session[]
	 */
	static function doSelectJoinAll(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$classes = array();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Session::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Session::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Session::getColumns();
			}
		}

		$to_table = User::getTableName();
		$q->join($to_table, $this_table . '.user_id = ' . $to_table . '.id', $join_type);
		foreach (User::getColumns() as $column) {
			$columns[] = $column;
		}
		$classes[] = 'User';
	
		$q->setColumns($columns);
		return Session::doSelect($q, $classes);
	}

	/**
	 * Returns true if the column values validate.
	 * @return bool
	 */
	function validate() {
		$this->_validationErrors = array();
		if (null === $this->getuser_id()) {
			$this->_validationErrors[] = 'user_id must not be null';
		}
		if (null === $this->gethash()) {
			$this->_validationErrors[] = 'hash must not be null';
		}
		if (null === $this->getuser_agent()) {
			$this->_validationErrors[] = 'user_agent must not be null';
		}
		if (null === $this->getip_address()) {
			$this->_validationErrors[] = 'ip_address must not be null';
		}
		return 0 === count($this->_validationErrors);
	}

}