<?php
/**
 *		Created by Dan Blaisdell's DABL
 *		Do not alter base files, as they will be overwritten.
 *		To alter the objects, alter the extended classes in
 *		the 'models' folder.
 *
 */
abstract class baseWedding extends ApplicationModel {

	const ID = 'wedding.id';
	const NAME = 'wedding.name';
	const SHUTTLE_ENABLED = 'wedding.shuttle_enabled';
	const CREATED = 'wedding.created';
	const UPDATED = 'wedding.updated';

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $_tableName = 'wedding';

	/**
	 * Cache of objects retrieved from the database
	 * @var Wedding[]
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
		Wedding::ID,
		Wedding::NAME,
		Wedding::SHUTTLE_ENABLED,
		Wedding::CREATED,
		Wedding::UPDATED,
	);

	/**
	 * array of all column names
	 * @var string[]
	 */
	protected static $_columnNames = array(
		'id',
		'name',
		'shuttle_enabled',
		'created',
		'updated',
	);

	/**
	 * array of all column types
	 * @var string[]
	 */
	protected static $_columnTypes = array(
		'id' => Model::COLUMN_TYPE_INTEGER,
		'name' => Model::COLUMN_TYPE_VARCHAR,
		'shuttle_enabled' => Model::COLUMN_TYPE_TINYINT,
		'created' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
		'updated' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
	);

	/**
	 * `id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $id;

	/**
	 * `name` VARCHAR
	 * @var string
	 */
	protected $name;

	/**
	 * `shuttle_enabled` TINYINT DEFAULT 0
	 * @var int
	 */
	protected $shuttle_enabled = 0;

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
	 * @return Wedding
	 */
	function setId($value) {
		return $this->setColumnValue('id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Gets the value of the name field
	 */
	function getName() {
		return $this->name;
	}

	/**
	 * Sets the value of the name field
	 * @return Wedding
	 */
	function setName($value) {
		return $this->setColumnValue('name', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Gets the value of the shuttle_enabled field
	 */
	function getShuttleEnabled() {
		return $this->shuttle_enabled;
	}

	/**
	 * Sets the value of the shuttle_enabled field
	 * @return Wedding
	 */
	function setShuttleEnabled($value) {
		return $this->setColumnValue('shuttle_enabled', $value, Model::COLUMN_TYPE_TINYINT);
	}

	/**
	 * Convenience function for Wedding::getShuttleEnabled
	 * final because getShuttleEnabled should be extended instead
	 * to ensure consistent behavior
	 * @see Wedding::getShuttleEnabled
	 */
	final function getShuttle_enabled() {
		return $this->getShuttleEnabled();
	}

	/**
	 * Convenience function for Wedding::setShuttleEnabled
	 * final because setShuttleEnabled should be extended instead
	 * to ensure consistent behavior
	 * @see Wedding::setShuttleEnabled
	 * @return Wedding
	 */
	final function setShuttle_enabled($value) {
		return $this->setShuttleEnabled($value);
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
	 * @return Wedding
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
	 * @return Wedding
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
	 * @return Wedding
	 */
	static function create() {
		return new Wedding();
	}

	/**
	 * @return Query
	 */
	static function getQuery(array $params = array(), Query $q = null) {
		$class = class_exists('WeddingQuery') ? 'WeddingQuery' : 'Query';
		$q = $q ? clone $q : new $class;
		if (!$q->getTable()) {
			$q->setTable(Wedding::getTableName());
		}

		// filters
		foreach ($params as $key => &$param) {
			if (Wedding::hasColumn($key)) {
				$q->add($key, $param);
			}
		}

		// SortBy (alias of sort_by, deprecated)
		if (isset($params['SortBy']) && !isset($params['order_by'])) {
			$params['order_by'] = $params['SortBy'];
		}

		// order_by
		if (isset($params['order_by']) && Wedding::hasColumn($params['order_by'])) {
			$q->orderBy($params['order_by'], isset($params['dir']) ? Query::DESC : Query::ASC);
		}

		return $q;
	}

	/**
	 * Returns String representation of table name
	 * @return string
	 */
	static function getTableName() {
		return Wedding::$_tableName;
	}

	/**
	 * Access to array of column names
	 * @return array
	 */
	static function getColumnNames() {
		return Wedding::$_columnNames;
	}

	/**
	 * Access to array of fully-qualified(table.column) columns
	 * @return array
	 */
	static function getColumns() {
		return Wedding::$_columns;
	}

	/**
	 * Access to array of column types, indexed by column name
	 * @return array
	 */
	static function getColumnTypes() {
		return Wedding::$_columnTypes;
	}

	/**
	 * Get the type of a column
	 * @return string
	 */
	static function getColumnType($column_name) {
		return Wedding::$_columnTypes[Wedding::normalizeColumnName($column_name)];
	}

	/**
	 * @return bool
	 */
	static function hasColumn($column_name) {
		static $columns_cache = null;
		if (null === $columns_cache) {
			$columns_cache = array_map('strtolower', Wedding::$_columnNames);
		}
		return in_array(strtolower(Wedding::normalizeColumnName($column_name)), $columns_cache);
	}


	/**
	 * Access to array of primary keys
	 * @return array
	 */
	static function getPrimaryKeys() {
		return Wedding::$_primaryKeys;
	}

	/**
	 * Access to name of primary key
	 * @return array
	 */
	static function getPrimaryKey() {
		return Wedding::$_primaryKey;
	}

	/**
	 * Returns true if the primary key column for this table is auto-increment
	 * @return bool
	 */
	static function isAutoIncrement() {
		return Wedding::$_isAutoIncrement;
	}

	/**
	 * Searches the database for a row with the ID(primary key) that matches
	 * the one input.
	 * @return Wedding
	 */
	 static function retrieveByPK($id) {
		return Wedding::retrieveByPKs($id);
	}

	/**
	 * Searches the database for a row with the primary keys that match
	 * the ones input.
	 * @return Wedding
	 */
	static function retrieveByPKs($id) {
		if (null === $id) {
			return null;
		}
		if (Wedding::$_poolEnabled) {
			$pool_instance = Wedding::retrieveFromPool($id);
			if (null !== $pool_instance) {
				return $pool_instance;
			}
		}
		$q = new Query;
		$q->add('id', $id);
		return Wedding::doSelectOne($q);
	}

	/**
	 * Searches the database for a row with a id
	 * value that matches the one provided
	 * @return Wedding
	 */
	static function retrieveById($value) {
		return Wedding::retrieveByPK($value);
	}

	/**
	 * Searches the database for a row with a name
	 * value that matches the one provided
	 * @return Wedding
	 */
	static function retrieveByName($value) {
		return Wedding::retrieveByColumn('name', $value);
	}

	/**
	 * Searches the database for a row with a shuttle_enabled
	 * value that matches the one provided
	 * @return Wedding
	 */
	static function retrieveByShuttleEnabled($value) {
		return Wedding::retrieveByColumn('shuttle_enabled', $value);
	}

	/**
	 * Searches the database for a row with a created
	 * value that matches the one provided
	 * @return Wedding
	 */
	static function retrieveByCreated($value) {
		return Wedding::retrieveByColumn('created', $value);
	}

	/**
	 * Searches the database for a row with a updated
	 * value that matches the one provided
	 * @return Wedding
	 */
	static function retrieveByUpdated($value) {
		return Wedding::retrieveByColumn('updated', $value);
	}

	static function retrieveByColumn($field, $value) {
		$q = Query::create()->add($field, $value)->setLimit(1)->order('id');
		return Wedding::doSelectOne($q);
	}

	/**
	 * Populates and returns an instance of Wedding with the
	 * first result of a query.  If the query returns no results,
	 * returns null.
	 * @return Wedding
	 */
	static function fetchSingle($query_string) {
		$records = Wedding::fetch($query_string);
		return array_shift($records);
	}

	/**
	 * Populates and returns an array of Wedding objects with the
	 * results of a query.  If the query returns no results,
	 * returns an empty Array.
	 * @return Wedding[]
	 */
	static function fetch($query_string) {
		$conn = Wedding::getConnection();
		$result = $conn->query($query_string);
		return Wedding::fromResult($result, 'Wedding');
	}

	/**
	 * Returns an array of Wedding objects from
	 * a PDOStatement(query result).
	 *
	 * @see Model::fromResult
	 */
	static function fromResult(PDOStatement $result, $class = 'Wedding', $use_pool = null) {
		if (null === $use_pool) {
			$use_pool = Wedding::$_poolEnabled;
		}
		return Model::fromResult($result, $class, $use_pool);
	}

	/**
	 * Casts values of int fields to (int)
	 * @return Wedding
	 */
	function castInts() {
		$this->id = (null === $this->id) ? null : (int) $this->id;
		$this->shuttle_enabled = (null === $this->shuttle_enabled) ? null : (int) $this->shuttle_enabled;
		$this->created = (null === $this->created) ? null : (int) $this->created;
		$this->updated = (null === $this->updated) ? null : (int) $this->updated;
		return $this;
	}

	/**
	 * Add (or replace) to the instance pool.
	 *
	 * @param Wedding $object
	 * @return void
	 */
	static function insertIntoPool(Wedding $object) {
		if (!Wedding::$_poolEnabled) {
			return;
		}
		if (Wedding::$_instancePoolCount > Wedding::MAX_INSTANCE_POOL_SIZE) {
			return;
		}

		Wedding::$_instancePool[implode('-', $object->getPrimaryKeyValues())] = $object;
		++Wedding::$_instancePoolCount;
	}

	/**
	 * Return the cached instance from the pool.
	 *
	 * @param mixed $pk Primary Key
	 * @return Wedding
	 */
	static function retrieveFromPool($pk) {
		if (!Wedding::$_poolEnabled || null === $pk) {
			return null;
		}
		if (array_key_exists($pk, Wedding::$_instancePool)) {
			return Wedding::$_instancePool[$pk];
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

		if (array_key_exists($pk, Wedding::$_instancePool)) {
			unset(Wedding::$_instancePool[$pk]);
			--Wedding::$_instancePoolCount;
		}
	}

	/**
	 * Empty the instance pool.
	 *
	 * @return void
	 */
	static function flushPool() {
		Wedding::$_instancePool = array();
	}

	static function setPoolEnabled($bool = true) {
		Wedding::$_poolEnabled = $bool;
	}

	static function getPoolEnabled() {
		return Wedding::$_poolEnabled;
	}

	/**
	 * Returns an array of all Wedding objects in the database.
	 * $extra SQL can be appended to the query to LIMIT, SORT, and/or GROUP results.
	 * If there are no results, returns an empty Array.
	 * @param $extra string
	 * @return Wedding[]
	 */
	static function getAll($extra = null) {
		$conn = Wedding::getConnection();
		$table_quoted = $conn->quoteIdentifier(Wedding::getTableName());
		return Wedding::fetch("SELECT * FROM $table_quoted $extra ");
	}

	/**
	 * @return int
	 */
	static function doCount(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Wedding::getConnection();
		if (!$q->getTable()) {
			$q->setTable(Wedding::getTableName());
		}
		return $q->doCount($conn);
	}

	/**
	 * @param Query $q
	 * @param bool $flush_pool
	 * @return int
	 */
	static function doDelete(Query $q, $flush_pool = true) {
		$conn = Wedding::getConnection();
		$q = clone $q;
		if (!$q->getTable()) {
			$q->setTable(Wedding::getTableName());
		}
		$result = $q->doDelete($conn);

		if ($flush_pool) {
			Wedding::flushPool();
		}

		return $result;
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Wedding[]
	 */
	static function doSelect(Query $q = null, $additional_classes = null) {
		if (is_array($additional_classes)) {
			array_unshift($additional_classes, 'Wedding');
			$class = $additional_classes;
		} else {
			$class = 'Wedding';
		}

		return Wedding::fromResult(Wedding::doSelectRS($q), $class);
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Wedding	 */
	static function doSelectOne(Query $q = null, $additional_classes = null) {
		$q = $q ? clone $q : new Query;
		$q->setLimit(1);
		$result = Wedding::doSelect($q, $additional_classes);
		return array_shift($result);
	}

	/**
	 * @param array $column_values
	 * @param Query $q The Query object that creates the SELECT query string
	 * @return Wedding[]
	 */
	static function doUpdate(array $column_values, Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Wedding::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Wedding::getTableName());
		}

		return $q->doUpdate($column_values, $conn);
	}

	/**
	 * Set the maximum insert batch size, once this size is reached the batch automatically inserts.
	 * @param int $size
	 * @return int insert batch size
	 */
	static function setInsertBatchSize($size = 500) {
		return Wedding::$_insertBatchSize = $size;
	}

	/**
	 * Queue for batch insert
	 * @return Model this
	 */
	function queueForInsert() {
		// If we've reached the maximum batch size, insert it and empty it.
		if (count(Wedding::$_insertBatch) >= Wedding::$_insertBatchSize) {
			Wedding::insertBatch();
		}

		Wedding::$_insertBatch[] = $this;

		return $this;
	}

	/**
	 * @return int row count
	 * @throws RuntimeException
	 */
	static function insertBatch() {
		$records = Wedding::$_insertBatch;
		if (!$records) {
			return 0;
		}
		$conn = Wedding::getConnection();
		$columns = Wedding::getColumnNames();
		$quoted_table = $conn->quoteIdentifier(Wedding::getTableName());

		$pk = Wedding::getPrimaryKey();
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
				Wedding::insertIntoPool($r);
			} else {
				$r->setDirty(true);
			}
		}

		Wedding::$_insertBatch = array();
		return $result->rowCount();
	}

	static function coerceTemporalValue($value, $column_type, DABLPDO $conn = null) {
		if (null === $conn) {
			$conn = Wedding::getConnection();
		}
		return parent::coerceTemporalValue($value, $column_type, $conn);
	}

	/**
	 * Executes a select query and returns the PDO result
	 * @return PDOStatement
	 */
	static function doSelectRS(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Wedding::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Wedding::getTableName());
		}

		return $q->doSelect($conn);
	}

	/**
	 * @return Wedding[]
	 */
	static function doSelectJoinAll(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$classes = array();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Wedding::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Wedding::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Wedding::getColumns();
			}
		}

		$q->setColumns($columns);
		return Wedding::doSelect($q, $classes);
	}

	/**
	 * Returns a Query for selecting guest Objects(rows) from the guest table
	 * with a wedding_id that matches $this->id.
	 * @return Query
	 */
	function getGuestsRelatedByWeddingIdQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest', 'wedding_id', 'id', $q);
	}

	/**
	 * Returns the count of Guest Objects(rows) from the guest table
	 * with a wedding_id that matches $this->id.
	 * @return int
	 */
	function countGuestsRelatedByWeddingId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		return Guest::doCount($this->getGuestsRelatedByWeddingIdQuery($q));
	}

	/**
	 * Deletes the guest Objects(rows) from the guest table
	 * with a wedding_id that matches $this->id.
	 * @return int
	 */
	function deleteGuestsRelatedByWeddingId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		$this->GuestsRelatedByWeddingId_c = array();
		return Guest::doDelete($this->getGuestsRelatedByWeddingIdQuery($q));
	}

	protected $GuestsRelatedByWeddingId_c = array();

	/**
	 * Returns an array of Guest objects with a wedding_id
	 * that matches $this->id.
	 * When first called, this method will cache the result.
	 * After that, if $this->id is not modified, the
	 * method will return the cached result instead of querying the database
	 * a second time(for performance purposes).
	 * @return Guest[]
	 */
	function getGuestsRelatedByWeddingId(Query $q = null) {
		if (null === $this->getid()) {
			return array();
		}

		if (
			null === $q
			&& $this->getCacheResults()
			&& !empty($this->GuestsRelatedByWeddingId_c)
			&& !$this->isColumnModified('id')
		) {
			return $this->GuestsRelatedByWeddingId_c;
		}

		$result = Guest::doSelect($this->getGuestsRelatedByWeddingIdQuery($q));

		if ($q !== null) {
			return $result;
		}

		if ($this->getCacheResults()) {
			$this->GuestsRelatedByWeddingId_c = $result;
		}
		return $result;
	}

	/**
	 * Returns a Query for selecting user Objects(rows) from the user table
	 * with a wedding_id that matches $this->id.
	 * @return Query
	 */
	function getUsersRelatedByWeddingIdQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('user', 'wedding_id', 'id', $q);
	}

	/**
	 * Returns the count of User Objects(rows) from the user table
	 * with a wedding_id that matches $this->id.
	 * @return int
	 */
	function countUsersRelatedByWeddingId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		return User::doCount($this->getUsersRelatedByWeddingIdQuery($q));
	}

	/**
	 * Deletes the user Objects(rows) from the user table
	 * with a wedding_id that matches $this->id.
	 * @return int
	 */
	function deleteUsersRelatedByWeddingId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		$this->UsersRelatedByWeddingId_c = array();
		return User::doDelete($this->getUsersRelatedByWeddingIdQuery($q));
	}

	protected $UsersRelatedByWeddingId_c = array();

	/**
	 * Returns an array of User objects with a wedding_id
	 * that matches $this->id.
	 * When first called, this method will cache the result.
	 * After that, if $this->id is not modified, the
	 * method will return the cached result instead of querying the database
	 * a second time(for performance purposes).
	 * @return User[]
	 */
	function getUsersRelatedByWeddingId(Query $q = null) {
		if (null === $this->getid()) {
			return array();
		}

		if (
			null === $q
			&& $this->getCacheResults()
			&& !empty($this->UsersRelatedByWeddingId_c)
			&& !$this->isColumnModified('id')
		) {
			return $this->UsersRelatedByWeddingId_c;
		}

		$result = User::doSelect($this->getUsersRelatedByWeddingIdQuery($q));

		if ($q !== null) {
			return $result;
		}

		if ($this->getCacheResults()) {
			$this->UsersRelatedByWeddingId_c = $result;
		}
		return $result;
	}

	/**
	 * Convenience function for Wedding::getGuestsRelatedBywedding_id
	 * @return Guest[]
	 * @see Wedding::getGuestsRelatedByWeddingId
	 */
	function getGuests($extra = null) {
		return $this->getGuestsRelatedByWeddingId($extra);
	}

	/**
	  * Convenience function for Wedding::getGuestsRelatedBywedding_idQuery
	  * @return Query
	  * @see Wedding::getGuestsRelatedBywedding_idQuery
	  */
	function getGuestsQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest', 'wedding_id','id', $q);
	}

	/**
	  * Convenience function for Wedding::deleteGuestsRelatedBywedding_id
	  * @return int
	  * @see Wedding::deleteGuestsRelatedBywedding_id
	  */
	function deleteGuests(Query $q = null) {
		return $this->deleteGuestsRelatedByWeddingId($q);
	}

	/**
	  * Convenience function for Wedding::countGuestsRelatedBywedding_id
	  * @return int
	  * @see Wedding::countGuestsRelatedByWeddingId
	  */
	function countGuests(Query $q = null) {
		return $this->countGuestsRelatedByWeddingId($q);
	}

	/**
	 * Convenience function for Wedding::getUsersRelatedBywedding_id
	 * @return User[]
	 * @see Wedding::getUsersRelatedByWeddingId
	 */
	function getUsers($extra = null) {
		return $this->getUsersRelatedByWeddingId($extra);
	}

	/**
	  * Convenience function for Wedding::getUsersRelatedBywedding_idQuery
	  * @return Query
	  * @see Wedding::getUsersRelatedBywedding_idQuery
	  */
	function getUsersQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('user', 'wedding_id','id', $q);
	}

	/**
	  * Convenience function for Wedding::deleteUsersRelatedBywedding_id
	  * @return int
	  * @see Wedding::deleteUsersRelatedBywedding_id
	  */
	function deleteUsers(Query $q = null) {
		return $this->deleteUsersRelatedByWeddingId($q);
	}

	/**
	  * Convenience function for Wedding::countUsersRelatedBywedding_id
	  * @return int
	  * @see Wedding::countUsersRelatedByWeddingId
	  */
	function countUsers(Query $q = null) {
		return $this->countUsersRelatedByWeddingId($q);
	}

	/**
	 * Returns true if the column values validate.
	 * @return bool
	 */
	function validate() {
		$this->_validationErrors = array();
		return 0 === count($this->_validationErrors);
	}

}