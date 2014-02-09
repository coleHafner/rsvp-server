<?php
/**
 *		Created by Dan Blaisdell's DABL
 *		Do not alter base files, as they will be overwritten.
 *		To alter the objects, alter the extended classes in
 *		the 'models' folder.
 *
 */
abstract class baseGuestGuestType extends ApplicationModel {

	const GUEST_ID = 'guest_guest_type.guest_id';
	const GUEST_TYPE_ID = 'guest_guest_type.guest_type_id';
	const CREATED = 'guest_guest_type.created';

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $_tableName = 'guest_guest_type';

	/**
	 * Cache of objects retrieved from the database
	 * @var GuestGuestType[]
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
		'guest_id',
		'guest_type_id',
	);

	/**
	 * string name of the primary key column
	 * @var string
	 */
	protected static $_primaryKey = '';

	/**
	 * true if primary key is an auto-increment column
	 * @var bool
	 */
	protected static $_isAutoIncrement = false;

	/**
	 * array of all fully-qualified(table.column) columns
	 * @var string[]
	 */
	protected static $_columns = array(
		GuestGuestType::GUEST_ID,
		GuestGuestType::GUEST_TYPE_ID,
		GuestGuestType::CREATED,
	);

	/**
	 * array of all column names
	 * @var string[]
	 */
	protected static $_columnNames = array(
		'guest_id',
		'guest_type_id',
		'created',
	);

	/**
	 * array of all column types
	 * @var string[]
	 */
	protected static $_columnTypes = array(
		'guest_id' => Model::COLUMN_TYPE_INTEGER,
		'guest_type_id' => Model::COLUMN_TYPE_INTEGER,
		'created' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
	);

	/**
	 * `guest_id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $guest_id;

	/**
	 * `guest_type_id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $guest_type_id;

	/**
	 * `created` INTEGER_TIMESTAMP DEFAULT ''
	 * @var int
	 */
	protected $created;

	/**
	 * Gets the value of the guest_id field
	 */
	function getGuestId() {
		return $this->guest_id;
	}

	/**
	 * Sets the value of the guest_id field
	 * @return GuestGuestType
	 */
	function setGuestId($value) {
		return $this->setColumnValue('guest_id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for GuestGuestType::getGuestId
	 * final because getGuestId should be extended instead
	 * to ensure consistent behavior
	 * @see GuestGuestType::getGuestId
	 */
	final function getGuest_id() {
		return $this->getGuestId();
	}

	/**
	 * Convenience function for GuestGuestType::setGuestId
	 * final because setGuestId should be extended instead
	 * to ensure consistent behavior
	 * @see GuestGuestType::setGuestId
	 * @return GuestGuestType
	 */
	final function setGuest_id($value) {
		return $this->setGuestId($value);
	}

	/**
	 * Gets the value of the guest_type_id field
	 */
	function getGuestTypeId() {
		return $this->guest_type_id;
	}

	/**
	 * Sets the value of the guest_type_id field
	 * @return GuestGuestType
	 */
	function setGuestTypeId($value) {
		return $this->setColumnValue('guest_type_id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for GuestGuestType::getGuestTypeId
	 * final because getGuestTypeId should be extended instead
	 * to ensure consistent behavior
	 * @see GuestGuestType::getGuestTypeId
	 */
	final function getGuest_type_id() {
		return $this->getGuestTypeId();
	}

	/**
	 * Convenience function for GuestGuestType::setGuestTypeId
	 * final because setGuestTypeId should be extended instead
	 * to ensure consistent behavior
	 * @see GuestGuestType::setGuestTypeId
	 * @return GuestGuestType
	 */
	final function setGuest_type_id($value) {
		return $this->setGuestTypeId($value);
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
	 * @return GuestGuestType
	 */
	function setCreated($value) {
		return $this->setColumnValue('created', $value, Model::COLUMN_TYPE_INTEGER_TIMESTAMP);
	}

	/**
	 * @return DABLPDO
	 */
	static function getConnection() {
		return DBManager::getConnection('default_connection');
	}

	/**
	 * @return GuestGuestType
	 */
	static function create() {
		return new GuestGuestType();
	}

	/**
	 * @return Query
	 */
	static function getQuery(array $params = array(), Query $q = null) {
		$class = class_exists('GuestGuestTypeQuery') ? 'GuestGuestTypeQuery' : 'Query';
		$q = $q ? clone $q : new $class;
		if (!$q->getTable()) {
			$q->setTable(GuestGuestType::getTableName());
		}

		// filters
		foreach ($params as $key => &$param) {
			if (GuestGuestType::hasColumn($key)) {
				$q->add($key, $param);
			}
		}

		// SortBy (alias of sort_by, deprecated)
		if (isset($params['SortBy']) && !isset($params['order_by'])) {
			$params['order_by'] = $params['SortBy'];
		}

		// order_by
		if (isset($params['order_by']) && GuestGuestType::hasColumn($params['order_by'])) {
			$q->orderBy($params['order_by'], isset($params['dir']) ? Query::DESC : Query::ASC);
		}

		return $q;
	}

	/**
	 * Returns String representation of table name
	 * @return string
	 */
	static function getTableName() {
		return GuestGuestType::$_tableName;
	}

	/**
	 * Access to array of column names
	 * @return array
	 */
	static function getColumnNames() {
		return GuestGuestType::$_columnNames;
	}

	/**
	 * Access to array of fully-qualified(table.column) columns
	 * @return array
	 */
	static function getColumns() {
		return GuestGuestType::$_columns;
	}

	/**
	 * Access to array of column types, indexed by column name
	 * @return array
	 */
	static function getColumnTypes() {
		return GuestGuestType::$_columnTypes;
	}

	/**
	 * Get the type of a column
	 * @return string
	 */
	static function getColumnType($column_name) {
		return GuestGuestType::$_columnTypes[GuestGuestType::normalizeColumnName($column_name)];
	}

	/**
	 * @return bool
	 */
	static function hasColumn($column_name) {
		static $columns_cache = null;
		if (null === $columns_cache) {
			$columns_cache = array_map('strtolower', GuestGuestType::$_columnNames);
		}
		return in_array(strtolower(GuestGuestType::normalizeColumnName($column_name)), $columns_cache);
	}


	/**
	 * Access to array of primary keys
	 * @return array
	 */
	static function getPrimaryKeys() {
		return GuestGuestType::$_primaryKeys;
	}

	/**
	 * Access to name of primary key
	 * @return array
	 */
	static function getPrimaryKey() {
		return GuestGuestType::$_primaryKey;
	}

	/**
	 * Returns true if the primary key column for this table is auto-increment
	 * @return bool
	 */
	static function isAutoIncrement() {
		return GuestGuestType::$_isAutoIncrement;
	}

	/**
	 * Searches the database for a row with the ID(primary key) that matches
	 * the one input.
	 * @return GuestGuestType
	 */
	 static function retrieveByPK($the_pk) {
		throw new Exception('This table has more than one primary key.  Use retrieveByPKs() instead.');
	}

	/**
	 * Searches the database for a row with the primary keys that match
	 * the ones input.
	 * @return GuestGuestType
	 */
	static function retrieveByPKs($guest_id, $guest_type_id) {
		if (null === $guest_id) {
			return null;
		}
		if (null === $guest_type_id) {
			return null;
		}
		$args = func_get_args();
		if (GuestGuestType::$_poolEnabled) {
			$pool_instance = GuestGuestType::retrieveFromPool(implode('-', $args));
			if (null !== $pool_instance) {
				return $pool_instance;
			}
		}
		$q = new Query;
		$q->add('guest_id', $guest_id);
		$q->add('guest_type_id', $guest_type_id);
		return GuestGuestType::doSelectOne($q);
	}

	/**
	 * Searches the database for a row with a guest_id
	 * value that matches the one provided
	 * @return GuestGuestType
	 */
	static function retrieveByGuestId($value) {
		return GuestGuestType::retrieveByColumn('guest_id', $value);
	}

	/**
	 * Searches the database for a row with a guest_type_id
	 * value that matches the one provided
	 * @return GuestGuestType
	 */
	static function retrieveByGuestTypeId($value) {
		return GuestGuestType::retrieveByColumn('guest_type_id', $value);
	}

	/**
	 * Searches the database for a row with a created
	 * value that matches the one provided
	 * @return GuestGuestType
	 */
	static function retrieveByCreated($value) {
		return GuestGuestType::retrieveByColumn('created', $value);
	}

	static function retrieveByColumn($field, $value) {
		$q = Query::create()->add($field, $value)->setLimit(1);
		return GuestGuestType::doSelectOne($q);
	}

	/**
	 * Populates and returns an instance of GuestGuestType with the
	 * first result of a query.  If the query returns no results,
	 * returns null.
	 * @return GuestGuestType
	 */
	static function fetchSingle($query_string) {
		$records = GuestGuestType::fetch($query_string);
		return array_shift($records);
	}

	/**
	 * Populates and returns an array of GuestGuestType objects with the
	 * results of a query.  If the query returns no results,
	 * returns an empty Array.
	 * @return GuestGuestType[]
	 */
	static function fetch($query_string) {
		$conn = GuestGuestType::getConnection();
		$result = $conn->query($query_string);
		return GuestGuestType::fromResult($result, 'GuestGuestType');
	}

	/**
	 * Returns an array of GuestGuestType objects from
	 * a PDOStatement(query result).
	 *
	 * @see Model::fromResult
	 */
	static function fromResult(PDOStatement $result, $class = 'GuestGuestType', $use_pool = null) {
		if (null === $use_pool) {
			$use_pool = GuestGuestType::$_poolEnabled;
		}
		return Model::fromResult($result, $class, $use_pool);
	}

	/**
	 * Casts values of int fields to (int)
	 * @return GuestGuestType
	 */
	function castInts() {
		$this->guest_id = (null === $this->guest_id) ? null : (int) $this->guest_id;
		$this->guest_type_id = (null === $this->guest_type_id) ? null : (int) $this->guest_type_id;
		$this->created = (null === $this->created) ? null : (int) $this->created;
		return $this;
	}

	/**
	 * Add (or replace) to the instance pool.
	 *
	 * @param GuestGuestType $object
	 * @return void
	 */
	static function insertIntoPool(GuestGuestType $object) {
		if (!GuestGuestType::$_poolEnabled) {
			return;
		}
		if (GuestGuestType::$_instancePoolCount > GuestGuestType::MAX_INSTANCE_POOL_SIZE) {
			return;
		}

		GuestGuestType::$_instancePool[implode('-', $object->getPrimaryKeyValues())] = $object;
		++GuestGuestType::$_instancePoolCount;
	}

	/**
	 * Return the cached instance from the pool.
	 *
	 * @param mixed $pk Primary Key
	 * @return GuestGuestType
	 */
	static function retrieveFromPool($pk) {
		if (!GuestGuestType::$_poolEnabled || null === $pk) {
			return null;
		}
		if (array_key_exists($pk, GuestGuestType::$_instancePool)) {
			return GuestGuestType::$_instancePool[$pk];
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

		if (array_key_exists($pk, GuestGuestType::$_instancePool)) {
			unset(GuestGuestType::$_instancePool[$pk]);
			--GuestGuestType::$_instancePoolCount;
		}
	}

	/**
	 * Empty the instance pool.
	 *
	 * @return void
	 */
	static function flushPool() {
		GuestGuestType::$_instancePool = array();
	}

	static function setPoolEnabled($bool = true) {
		GuestGuestType::$_poolEnabled = $bool;
	}

	static function getPoolEnabled() {
		return GuestGuestType::$_poolEnabled;
	}

	/**
	 * Returns an array of all GuestGuestType objects in the database.
	 * $extra SQL can be appended to the query to LIMIT, SORT, and/or GROUP results.
	 * If there are no results, returns an empty Array.
	 * @param $extra string
	 * @return GuestGuestType[]
	 */
	static function getAll($extra = null) {
		$conn = GuestGuestType::getConnection();
		$table_quoted = $conn->quoteIdentifier(GuestGuestType::getTableName());
		return GuestGuestType::fetch("SELECT * FROM $table_quoted $extra ");
	}

	/**
	 * @return int
	 */
	static function doCount(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = GuestGuestType::getConnection();
		if (!$q->getTable()) {
			$q->setTable(GuestGuestType::getTableName());
		}
		return $q->doCount($conn);
	}

	/**
	 * @param Query $q
	 * @param bool $flush_pool
	 * @return int
	 */
	static function doDelete(Query $q, $flush_pool = true) {
		$conn = GuestGuestType::getConnection();
		$q = clone $q;
		if (!$q->getTable()) {
			$q->setTable(GuestGuestType::getTableName());
		}
		$result = $q->doDelete($conn);

		if ($flush_pool) {
			GuestGuestType::flushPool();
		}

		return $result;
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return GuestGuestType[]
	 */
	static function doSelect(Query $q = null, $additional_classes = null) {
		if (is_array($additional_classes)) {
			array_unshift($additional_classes, 'GuestGuestType');
			$class = $additional_classes;
		} else {
			$class = 'GuestGuestType';
		}

		return GuestGuestType::fromResult(GuestGuestType::doSelectRS($q), $class);
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return GuestGuestType	 */
	static function doSelectOne(Query $q = null, $additional_classes = null) {
		$q = $q ? clone $q : new Query;
		$q->setLimit(1);
		$result = GuestGuestType::doSelect($q, $additional_classes);
		return array_shift($result);
	}

	/**
	 * @param array $column_values
	 * @param Query $q The Query object that creates the SELECT query string
	 * @return GuestGuestType[]
	 */
	static function doUpdate(array $column_values, Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = GuestGuestType::getConnection();

		if (!$q->getTable()) {
			$q->setTable(GuestGuestType::getTableName());
		}

		return $q->doUpdate($column_values, $conn);
	}

	/**
	 * Set the maximum insert batch size, once this size is reached the batch automatically inserts.
	 * @param int $size
	 * @return int insert batch size
	 */
	static function setInsertBatchSize($size = 500) {
		return GuestGuestType::$_insertBatchSize = $size;
	}

	/**
	 * Queue for batch insert
	 * @return Model this
	 */
	function queueForInsert() {
		// If we've reached the maximum batch size, insert it and empty it.
		if (count(GuestGuestType::$_insertBatch) >= GuestGuestType::$_insertBatchSize) {
			GuestGuestType::insertBatch();
		}

		GuestGuestType::$_insertBatch[] = $this;

		return $this;
	}

	/**
	 * @return int row count
	 * @throws RuntimeException
	 */
	static function insertBatch() {
		$records = GuestGuestType::$_insertBatch;
		if (!$records) {
			return 0;
		}
		$conn = GuestGuestType::getConnection();
		$columns = GuestGuestType::getColumnNames();
		$quoted_table = $conn->quoteIdentifier(GuestGuestType::getTableName());


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
				GuestGuestType::insertIntoPool($r);
			} else {
				$r->setDirty(true);
			}
		}

		GuestGuestType::$_insertBatch = array();
		return $result->rowCount();
	}

	static function coerceTemporalValue($value, $column_type, DABLPDO $conn = null) {
		if (null === $conn) {
			$conn = GuestGuestType::getConnection();
		}
		return parent::coerceTemporalValue($value, $column_type, $conn);
	}

	/**
	 * Executes a select query and returns the PDO result
	 * @return PDOStatement
	 */
	static function doSelectRS(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = GuestGuestType::getConnection();

		if (!$q->getTable()) {
			$q->setTable(GuestGuestType::getTableName());
		}

		return $q->doSelect($conn);
	}

	/**
	 * @return GuestGuestType
	 */
	function setGuest(Guest $guest = null) {
		return $this->setGuestRelatedByGuestId($guest);
	}

	/**
	 * @return GuestGuestType
	 */
	function setGuestRelatedByGuestId(Guest $guest = null) {
		if (null === $guest) {
			$this->setguest_id(null);
		} else {
			if (!$guest->getid()) {
				throw new Exception('Cannot connect a Guest without a id');
			}
			$this->setguest_id($guest->getid());
		}
		return $this;
	}

	/**
	 * Returns a guest object with a id
	 * that matches $this->guest_id.
	 * @return Guest
	 */
	function getGuest() {
		return $this->getGuestRelatedByGuestId();
	}

	/**
	 * Returns a guest object with a id
	 * that matches $this->guest_id.
	 * @return Guest
	 */
	function getGuestRelatedByGuestId() {
		$fk_value = $this->getguest_id();
		if (null === $fk_value) {
			return null;
		}
		return Guest::retrieveByPK($fk_value);
	}

	static function doSelectJoinGuest(Query $q = null, $join_type = Query::LEFT_JOIN) {
		return GuestGuestType::doSelectJoinGuestRelatedByGuestId($q, $join_type);
	}

	/**
	 * @return GuestGuestType[]
	 */
	static function doSelectJoinGuestRelatedByGuestId(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : GuestGuestType::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (GuestGuestType::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = GuestGuestType::getColumns();
			}
		}

		$to_table = Guest::getTableName();
		$q->join($to_table, $this_table . '.guest_id = ' . $to_table . '.id', $join_type);
		foreach (Guest::getColumns() as $column) {
			$columns[] = $column;
		}
		$q->setColumns($columns);

		return GuestGuestType::doSelect($q, array('Guest'));
	}

	/**
	 * @return GuestGuestType
	 */
	function setGuestType(GuestType $guesttype = null) {
		return $this->setGuestTypeRelatedByGuestTypeId($guesttype);
	}

	/**
	 * @return GuestGuestType
	 */
	function setGuestTypeRelatedByGuestTypeId(GuestType $guesttype = null) {
		if (null === $guesttype) {
			$this->setguest_type_id(null);
		} else {
			if (!$guesttype->getid()) {
				throw new Exception('Cannot connect a GuestType without a id');
			}
			$this->setguest_type_id($guesttype->getid());
		}
		return $this;
	}

	/**
	 * Returns a guest_type object with a id
	 * that matches $this->guest_type_id.
	 * @return GuestType
	 */
	function getGuestType() {
		return $this->getGuestTypeRelatedByGuestTypeId();
	}

	/**
	 * Returns a guest_type object with a id
	 * that matches $this->guest_type_id.
	 * @return GuestType
	 */
	function getGuestTypeRelatedByGuestTypeId() {
		$fk_value = $this->getguest_type_id();
		if (null === $fk_value) {
			return null;
		}
		return GuestType::retrieveByPK($fk_value);
	}

	static function doSelectJoinGuestType(Query $q = null, $join_type = Query::LEFT_JOIN) {
		return GuestGuestType::doSelectJoinGuestTypeRelatedByGuestTypeId($q, $join_type);
	}

	/**
	 * @return GuestGuestType[]
	 */
	static function doSelectJoinGuestTypeRelatedByGuestTypeId(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : GuestGuestType::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (GuestGuestType::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = GuestGuestType::getColumns();
			}
		}

		$to_table = GuestType::getTableName();
		$q->join($to_table, $this_table . '.guest_type_id = ' . $to_table . '.id', $join_type);
		foreach (GuestType::getColumns() as $column) {
			$columns[] = $column;
		}
		$q->setColumns($columns);

		return GuestGuestType::doSelect($q, array('GuestType'));
	}

	/**
	 * @return GuestGuestType[]
	 */
	static function doSelectJoinAll(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$classes = array();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : GuestGuestType::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (GuestGuestType::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = GuestGuestType::getColumns();
			}
		}

		$to_table = Guest::getTableName();
		$q->join($to_table, $this_table . '.guest_id = ' . $to_table . '.id', $join_type);
		foreach (Guest::getColumns() as $column) {
			$columns[] = $column;
		}
		$classes[] = 'Guest';
	
		$to_table = GuestType::getTableName();
		$q->join($to_table, $this_table . '.guest_type_id = ' . $to_table . '.id', $join_type);
		foreach (GuestType::getColumns() as $column) {
			$columns[] = $column;
		}
		$classes[] = 'GuestType';
	
		$q->setColumns($columns);
		return GuestGuestType::doSelect($q, $classes);
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