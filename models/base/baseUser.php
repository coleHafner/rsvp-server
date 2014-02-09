<?php
/**
 *		Created by Dan Blaisdell's DABL
 *		Do not alter base files, as they will be overwritten.
 *		To alter the objects, alter the extended classes in
 *		the 'models' folder.
 *
 */
abstract class baseUser extends ApplicationModel {

	const ID = 'user.id';
	const WEDDING_ID = 'user.wedding_id';
	const USERNAME = 'user.username';
	const PASSWORD = 'user.password';
	const CREATED = 'user.created';
	const UPDATED = 'user.updated';

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $_tableName = 'user';

	/**
	 * Cache of objects retrieved from the database
	 * @var User[]
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
		User::ID,
		User::WEDDING_ID,
		User::USERNAME,
		User::PASSWORD,
		User::CREATED,
		User::UPDATED,
	);

	/**
	 * array of all column names
	 * @var string[]
	 */
	protected static $_columnNames = array(
		'id',
		'wedding_id',
		'username',
		'password',
		'created',
		'updated',
	);

	/**
	 * array of all column types
	 * @var string[]
	 */
	protected static $_columnTypes = array(
		'id' => Model::COLUMN_TYPE_INTEGER,
		'wedding_id' => Model::COLUMN_TYPE_INTEGER,
		'username' => Model::COLUMN_TYPE_VARCHAR,
		'password' => Model::COLUMN_TYPE_VARCHAR,
		'created' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
		'updated' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
	);

	/**
	 * `id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $id;

	/**
	 * `wedding_id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $wedding_id;

	/**
	 * `username` VARCHAR NOT NULL
	 * @var string
	 */
	protected $username;

	/**
	 * `password` VARCHAR NOT NULL
	 * @var string
	 */
	protected $password;

	/**
	 * `created` INTEGER_TIMESTAMP NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $created;

	/**
	 * `updated` INTEGER_TIMESTAMP NOT NULL DEFAULT ''
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
	 * @return User
	 */
	function setId($value) {
		return $this->setColumnValue('id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Gets the value of the wedding_id field
	 */
	function getWeddingId() {
		return $this->wedding_id;
	}

	/**
	 * Sets the value of the wedding_id field
	 * @return User
	 */
	function setWeddingId($value) {
		return $this->setColumnValue('wedding_id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for User::getWeddingId
	 * final because getWeddingId should be extended instead
	 * to ensure consistent behavior
	 * @see User::getWeddingId
	 */
	final function getWedding_id() {
		return $this->getWeddingId();
	}

	/**
	 * Convenience function for User::setWeddingId
	 * final because setWeddingId should be extended instead
	 * to ensure consistent behavior
	 * @see User::setWeddingId
	 * @return User
	 */
	final function setWedding_id($value) {
		return $this->setWeddingId($value);
	}

	/**
	 * Gets the value of the username field
	 */
	function getUsername() {
		return $this->username;
	}

	/**
	 * Sets the value of the username field
	 * @return User
	 */
	function setUsername($value) {
		return $this->setColumnValue('username', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Gets the value of the password field
	 */
	function getPassword() {
		return $this->password;
	}

	/**
	 * Sets the value of the password field
	 * @return User
	 */
	function setPassword($value) {
		return $this->setColumnValue('password', $value, Model::COLUMN_TYPE_VARCHAR);
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
	 * @return User
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
	 * @return User
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
	 * @return User
	 */
	static function create() {
		return new User();
	}

	/**
	 * @return Query
	 */
	static function getQuery(array $params = array(), Query $q = null) {
		$class = class_exists('UserQuery') ? 'UserQuery' : 'Query';
		$q = $q ? clone $q : new $class;
		if (!$q->getTable()) {
			$q->setTable(User::getTableName());
		}

		// filters
		foreach ($params as $key => &$param) {
			if (User::hasColumn($key)) {
				$q->add($key, $param);
			}
		}

		// SortBy (alias of sort_by, deprecated)
		if (isset($params['SortBy']) && !isset($params['order_by'])) {
			$params['order_by'] = $params['SortBy'];
		}

		// order_by
		if (isset($params['order_by']) && User::hasColumn($params['order_by'])) {
			$q->orderBy($params['order_by'], isset($params['dir']) ? Query::DESC : Query::ASC);
		}

		return $q;
	}

	/**
	 * Returns String representation of table name
	 * @return string
	 */
	static function getTableName() {
		return User::$_tableName;
	}

	/**
	 * Access to array of column names
	 * @return array
	 */
	static function getColumnNames() {
		return User::$_columnNames;
	}

	/**
	 * Access to array of fully-qualified(table.column) columns
	 * @return array
	 */
	static function getColumns() {
		return User::$_columns;
	}

	/**
	 * Access to array of column types, indexed by column name
	 * @return array
	 */
	static function getColumnTypes() {
		return User::$_columnTypes;
	}

	/**
	 * Get the type of a column
	 * @return string
	 */
	static function getColumnType($column_name) {
		return User::$_columnTypes[User::normalizeColumnName($column_name)];
	}

	/**
	 * @return bool
	 */
	static function hasColumn($column_name) {
		static $columns_cache = null;
		if (null === $columns_cache) {
			$columns_cache = array_map('strtolower', User::$_columnNames);
		}
		return in_array(strtolower(User::normalizeColumnName($column_name)), $columns_cache);
	}


	/**
	 * Access to array of primary keys
	 * @return array
	 */
	static function getPrimaryKeys() {
		return User::$_primaryKeys;
	}

	/**
	 * Access to name of primary key
	 * @return array
	 */
	static function getPrimaryKey() {
		return User::$_primaryKey;
	}

	/**
	 * Returns true if the primary key column for this table is auto-increment
	 * @return bool
	 */
	static function isAutoIncrement() {
		return User::$_isAutoIncrement;
	}

	/**
	 * Searches the database for a row with the ID(primary key) that matches
	 * the one input.
	 * @return User
	 */
	 static function retrieveByPK($id) {
		return User::retrieveByPKs($id);
	}

	/**
	 * Searches the database for a row with the primary keys that match
	 * the ones input.
	 * @return User
	 */
	static function retrieveByPKs($id) {
		if (null === $id) {
			return null;
		}
		if (User::$_poolEnabled) {
			$pool_instance = User::retrieveFromPool($id);
			if (null !== $pool_instance) {
				return $pool_instance;
			}
		}
		$q = new Query;
		$q->add('id', $id);
		return User::doSelectOne($q);
	}

	/**
	 * Searches the database for a row with a id
	 * value that matches the one provided
	 * @return User
	 */
	static function retrieveById($value) {
		return User::retrieveByPK($value);
	}

	/**
	 * Searches the database for a row with a wedding_id
	 * value that matches the one provided
	 * @return User
	 */
	static function retrieveByWeddingId($value) {
		return User::retrieveByColumn('wedding_id', $value);
	}

	/**
	 * Searches the database for a row with a username
	 * value that matches the one provided
	 * @return User
	 */
	static function retrieveByUsername($value) {
		return User::retrieveByColumn('username', $value);
	}

	/**
	 * Searches the database for a row with a password
	 * value that matches the one provided
	 * @return User
	 */
	static function retrieveByPassword($value) {
		return User::retrieveByColumn('password', $value);
	}

	/**
	 * Searches the database for a row with a created
	 * value that matches the one provided
	 * @return User
	 */
	static function retrieveByCreated($value) {
		return User::retrieveByColumn('created', $value);
	}

	/**
	 * Searches the database for a row with a updated
	 * value that matches the one provided
	 * @return User
	 */
	static function retrieveByUpdated($value) {
		return User::retrieveByColumn('updated', $value);
	}

	static function retrieveByColumn($field, $value) {
		$q = Query::create()->add($field, $value)->setLimit(1)->order('id');
		return User::doSelectOne($q);
	}

	/**
	 * Populates and returns an instance of User with the
	 * first result of a query.  If the query returns no results,
	 * returns null.
	 * @return User
	 */
	static function fetchSingle($query_string) {
		$records = User::fetch($query_string);
		return array_shift($records);
	}

	/**
	 * Populates and returns an array of User objects with the
	 * results of a query.  If the query returns no results,
	 * returns an empty Array.
	 * @return User[]
	 */
	static function fetch($query_string) {
		$conn = User::getConnection();
		$result = $conn->query($query_string);
		return User::fromResult($result, 'User');
	}

	/**
	 * Returns an array of User objects from
	 * a PDOStatement(query result).
	 *
	 * @see Model::fromResult
	 */
	static function fromResult(PDOStatement $result, $class = 'User', $use_pool = null) {
		if (null === $use_pool) {
			$use_pool = User::$_poolEnabled;
		}
		return Model::fromResult($result, $class, $use_pool);
	}

	/**
	 * Casts values of int fields to (int)
	 * @return User
	 */
	function castInts() {
		$this->id = (null === $this->id) ? null : (int) $this->id;
		$this->wedding_id = (null === $this->wedding_id) ? null : (int) $this->wedding_id;
		$this->created = (null === $this->created) ? null : (int) $this->created;
		$this->updated = (null === $this->updated) ? null : (int) $this->updated;
		return $this;
	}

	/**
	 * Add (or replace) to the instance pool.
	 *
	 * @param User $object
	 * @return void
	 */
	static function insertIntoPool(User $object) {
		if (!User::$_poolEnabled) {
			return;
		}
		if (User::$_instancePoolCount > User::MAX_INSTANCE_POOL_SIZE) {
			return;
		}

		User::$_instancePool[implode('-', $object->getPrimaryKeyValues())] = $object;
		++User::$_instancePoolCount;
	}

	/**
	 * Return the cached instance from the pool.
	 *
	 * @param mixed $pk Primary Key
	 * @return User
	 */
	static function retrieveFromPool($pk) {
		if (!User::$_poolEnabled || null === $pk) {
			return null;
		}
		if (array_key_exists($pk, User::$_instancePool)) {
			return User::$_instancePool[$pk];
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

		if (array_key_exists($pk, User::$_instancePool)) {
			unset(User::$_instancePool[$pk]);
			--User::$_instancePoolCount;
		}
	}

	/**
	 * Empty the instance pool.
	 *
	 * @return void
	 */
	static function flushPool() {
		User::$_instancePool = array();
	}

	static function setPoolEnabled($bool = true) {
		User::$_poolEnabled = $bool;
	}

	static function getPoolEnabled() {
		return User::$_poolEnabled;
	}

	/**
	 * Returns an array of all User objects in the database.
	 * $extra SQL can be appended to the query to LIMIT, SORT, and/or GROUP results.
	 * If there are no results, returns an empty Array.
	 * @param $extra string
	 * @return User[]
	 */
	static function getAll($extra = null) {
		$conn = User::getConnection();
		$table_quoted = $conn->quoteIdentifier(User::getTableName());
		return User::fetch("SELECT * FROM $table_quoted $extra ");
	}

	/**
	 * @return int
	 */
	static function doCount(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = User::getConnection();
		if (!$q->getTable()) {
			$q->setTable(User::getTableName());
		}
		return $q->doCount($conn);
	}

	/**
	 * @param Query $q
	 * @param bool $flush_pool
	 * @return int
	 */
	static function doDelete(Query $q, $flush_pool = true) {
		$conn = User::getConnection();
		$q = clone $q;
		if (!$q->getTable()) {
			$q->setTable(User::getTableName());
		}
		$result = $q->doDelete($conn);

		if ($flush_pool) {
			User::flushPool();
		}

		return $result;
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return User[]
	 */
	static function doSelect(Query $q = null, $additional_classes = null) {
		if (is_array($additional_classes)) {
			array_unshift($additional_classes, 'User');
			$class = $additional_classes;
		} else {
			$class = 'User';
		}

		return User::fromResult(User::doSelectRS($q), $class);
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return User	 */
	static function doSelectOne(Query $q = null, $additional_classes = null) {
		$q = $q ? clone $q : new Query;
		$q->setLimit(1);
		$result = User::doSelect($q, $additional_classes);
		return array_shift($result);
	}

	/**
	 * @param array $column_values
	 * @param Query $q The Query object that creates the SELECT query string
	 * @return User[]
	 */
	static function doUpdate(array $column_values, Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = User::getConnection();

		if (!$q->getTable()) {
			$q->setTable(User::getTableName());
		}

		return $q->doUpdate($column_values, $conn);
	}

	/**
	 * Set the maximum insert batch size, once this size is reached the batch automatically inserts.
	 * @param int $size
	 * @return int insert batch size
	 */
	static function setInsertBatchSize($size = 500) {
		return User::$_insertBatchSize = $size;
	}

	/**
	 * Queue for batch insert
	 * @return Model this
	 */
	function queueForInsert() {
		// If we've reached the maximum batch size, insert it and empty it.
		if (count(User::$_insertBatch) >= User::$_insertBatchSize) {
			User::insertBatch();
		}

		User::$_insertBatch[] = $this;

		return $this;
	}

	/**
	 * @return int row count
	 * @throws RuntimeException
	 */
	static function insertBatch() {
		$records = User::$_insertBatch;
		if (!$records) {
			return 0;
		}
		$conn = User::getConnection();
		$columns = User::getColumnNames();
		$quoted_table = $conn->quoteIdentifier(User::getTableName());

		$pk = User::getPrimaryKey();
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
				User::insertIntoPool($r);
			} else {
				$r->setDirty(true);
			}
		}

		User::$_insertBatch = array();
		return $result->rowCount();
	}

	static function coerceTemporalValue($value, $column_type, DABLPDO $conn = null) {
		if (null === $conn) {
			$conn = User::getConnection();
		}
		return parent::coerceTemporalValue($value, $column_type, $conn);
	}

	/**
	 * Executes a select query and returns the PDO result
	 * @return PDOStatement
	 */
	static function doSelectRS(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = User::getConnection();

		if (!$q->getTable()) {
			$q->setTable(User::getTableName());
		}

		return $q->doSelect($conn);
	}

	/**
	 * @return User
	 */
	function setWedding(Wedding $wedding = null) {
		return $this->setWeddingRelatedByWeddingId($wedding);
	}

	/**
	 * @return User
	 */
	function setWeddingRelatedByWeddingId(Wedding $wedding = null) {
		if (null === $wedding) {
			$this->setwedding_id(null);
		} else {
			if (!$wedding->getid()) {
				throw new Exception('Cannot connect a Wedding without a id');
			}
			$this->setwedding_id($wedding->getid());
		}
		return $this;
	}

	/**
	 * Returns a wedding object with a id
	 * that matches $this->wedding_id.
	 * @return Wedding
	 */
	function getWedding() {
		return $this->getWeddingRelatedByWeddingId();
	}

	/**
	 * Returns a wedding object with a id
	 * that matches $this->wedding_id.
	 * @return Wedding
	 */
	function getWeddingRelatedByWeddingId() {
		$fk_value = $this->getwedding_id();
		if (null === $fk_value) {
			return null;
		}
		return Wedding::retrieveByPK($fk_value);
	}

	static function doSelectJoinWedding(Query $q = null, $join_type = Query::LEFT_JOIN) {
		return User::doSelectJoinWeddingRelatedByWeddingId($q, $join_type);
	}

	/**
	 * @return User[]
	 */
	static function doSelectJoinWeddingRelatedByWeddingId(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : User::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (User::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = User::getColumns();
			}
		}

		$to_table = Wedding::getTableName();
		$q->join($to_table, $this_table . '.wedding_id = ' . $to_table . '.id', $join_type);
		foreach (Wedding::getColumns() as $column) {
			$columns[] = $column;
		}
		$q->setColumns($columns);

		return User::doSelect($q, array('Wedding'));
	}

	/**
	 * @return User[]
	 */
	static function doSelectJoinAll(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$classes = array();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : User::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (User::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = User::getColumns();
			}
		}

		$to_table = Wedding::getTableName();
		$q->join($to_table, $this_table . '.wedding_id = ' . $to_table . '.id', $join_type);
		foreach (Wedding::getColumns() as $column) {
			$columns[] = $column;
		}
		$classes[] = 'Wedding';
	
		$q->setColumns($columns);
		return User::doSelect($q, $classes);
	}

	/**
	 * Returns a Query for selecting session Objects(rows) from the session table
	 * with a user_id that matches $this->id.
	 * @return Query
	 */
	function getSessionsRelatedByUserIdQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('session', 'user_id', 'id', $q);
	}

	/**
	 * Returns the count of Session Objects(rows) from the session table
	 * with a user_id that matches $this->id.
	 * @return int
	 */
	function countSessionsRelatedByUserId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		return Session::doCount($this->getSessionsRelatedByUserIdQuery($q));
	}

	/**
	 * Deletes the session Objects(rows) from the session table
	 * with a user_id that matches $this->id.
	 * @return int
	 */
	function deleteSessionsRelatedByUserId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		$this->SessionsRelatedByUserId_c = array();
		return Session::doDelete($this->getSessionsRelatedByUserIdQuery($q));
	}

	protected $SessionsRelatedByUserId_c = array();

	/**
	 * Returns an array of Session objects with a user_id
	 * that matches $this->id.
	 * When first called, this method will cache the result.
	 * After that, if $this->id is not modified, the
	 * method will return the cached result instead of querying the database
	 * a second time(for performance purposes).
	 * @return Session[]
	 */
	function getSessionsRelatedByUserId(Query $q = null) {
		if (null === $this->getid()) {
			return array();
		}

		if (
			null === $q
			&& $this->getCacheResults()
			&& !empty($this->SessionsRelatedByUserId_c)
			&& !$this->isColumnModified('id')
		) {
			return $this->SessionsRelatedByUserId_c;
		}

		$result = Session::doSelect($this->getSessionsRelatedByUserIdQuery($q));

		if ($q !== null) {
			return $result;
		}

		if ($this->getCacheResults()) {
			$this->SessionsRelatedByUserId_c = $result;
		}
		return $result;
	}

	/**
	 * Convenience function for User::getSessionsRelatedByuser_id
	 * @return Session[]
	 * @see User::getSessionsRelatedByUserId
	 */
	function getSessions($extra = null) {
		return $this->getSessionsRelatedByUserId($extra);
	}

	/**
	  * Convenience function for User::getSessionsRelatedByuser_idQuery
	  * @return Query
	  * @see User::getSessionsRelatedByuser_idQuery
	  */
	function getSessionsQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('session', 'user_id','id', $q);
	}

	/**
	  * Convenience function for User::deleteSessionsRelatedByuser_id
	  * @return int
	  * @see User::deleteSessionsRelatedByuser_id
	  */
	function deleteSessions(Query $q = null) {
		return $this->deleteSessionsRelatedByUserId($q);
	}

	/**
	  * Convenience function for User::countSessionsRelatedByuser_id
	  * @return int
	  * @see User::countSessionsRelatedByUserId
	  */
	function countSessions(Query $q = null) {
		return $this->countSessionsRelatedByUserId($q);
	}

	/**
	 * Returns true if the column values validate.
	 * @return bool
	 */
	function validate() {
		$this->_validationErrors = array();
		if (null === $this->getwedding_id()) {
			$this->_validationErrors[] = 'wedding_id must not be null';
		}
		if (null === $this->getusername()) {
			$this->_validationErrors[] = 'username must not be null';
		}
		if (null === $this->getpassword()) {
			$this->_validationErrors[] = 'password must not be null';
		}
		return 0 === count($this->_validationErrors);
	}

}