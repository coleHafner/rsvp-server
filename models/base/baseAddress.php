<?php
/**
 *		Created by Dan Blaisdell's DABL
 *		Do not alter base files, as they will be overwritten.
 *		To alter the objects, alter the extended classes in
 *		the 'models' folder.
 *
 */
abstract class baseAddress extends ApplicationModel {

	const ID = 'address.id';
	const STREET_1 = 'address.street_1';
	const STREET_2 = 'address.street_2';
	const CITY = 'address.city';
	const STATE = 'address.state';
	const ZIP = 'address.zip';
	const ACTIVE = 'address.active';
	const CREATED = 'address.created';
	const UPDATED = 'address.updated';

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $_tableName = 'address';

	/**
	 * Cache of objects retrieved from the database
	 * @var Address[]
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
		Address::ID,
		Address::STREET_1,
		Address::STREET_2,
		Address::CITY,
		Address::STATE,
		Address::ZIP,
		Address::ACTIVE,
		Address::CREATED,
		Address::UPDATED,
	);

	/**
	 * array of all column names
	 * @var string[]
	 */
	protected static $_columnNames = array(
		'id',
		'street_1',
		'street_2',
		'city',
		'state',
		'zip',
		'active',
		'created',
		'updated',
	);

	/**
	 * array of all column types
	 * @var string[]
	 */
	protected static $_columnTypes = array(
		'id' => Model::COLUMN_TYPE_INTEGER,
		'street_1' => Model::COLUMN_TYPE_VARCHAR,
		'street_2' => Model::COLUMN_TYPE_VARCHAR,
		'city' => Model::COLUMN_TYPE_VARCHAR,
		'state' => Model::COLUMN_TYPE_VARCHAR,
		'zip' => Model::COLUMN_TYPE_VARCHAR,
		'active' => Model::COLUMN_TYPE_TINYINT,
		'created' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
		'updated' => Model::COLUMN_TYPE_INTEGER_TIMESTAMP,
	);

	/**
	 * `id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $id;

	/**
	 * `street_1` VARCHAR
	 * @var string
	 */
	protected $street_1;

	/**
	 * `street_2` VARCHAR
	 * @var string
	 */
	protected $street_2;

	/**
	 * `city` VARCHAR
	 * @var string
	 */
	protected $city;

	/**
	 * `state` VARCHAR
	 * @var string
	 */
	protected $state;

	/**
	 * `zip` VARCHAR
	 * @var string
	 */
	protected $zip;

	/**
	 * `active` TINYINT DEFAULT 1
	 * @var int
	 */
	protected $active = 1;

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
	 * @return Address
	 */
	function setId($value) {
		return $this->setColumnValue('id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Gets the value of the street_1 field
	 */
	function getStreet1() {
		return $this->street_1;
	}

	/**
	 * Sets the value of the street_1 field
	 * @return Address
	 */
	function setStreet1($value) {
		return $this->setColumnValue('street_1', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Convenience function for Address::getStreet1
	 * final because getStreet1 should be extended instead
	 * to ensure consistent behavior
	 * @see Address::getStreet1
	 */
	final function getStreet_1() {
		return $this->getStreet1();
	}

	/**
	 * Convenience function for Address::setStreet1
	 * final because setStreet1 should be extended instead
	 * to ensure consistent behavior
	 * @see Address::setStreet1
	 * @return Address
	 */
	final function setStreet_1($value) {
		return $this->setStreet1($value);
	}

	/**
	 * Gets the value of the street_2 field
	 */
	function getStreet2() {
		return $this->street_2;
	}

	/**
	 * Sets the value of the street_2 field
	 * @return Address
	 */
	function setStreet2($value) {
		return $this->setColumnValue('street_2', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Convenience function for Address::getStreet2
	 * final because getStreet2 should be extended instead
	 * to ensure consistent behavior
	 * @see Address::getStreet2
	 */
	final function getStreet_2() {
		return $this->getStreet2();
	}

	/**
	 * Convenience function for Address::setStreet2
	 * final because setStreet2 should be extended instead
	 * to ensure consistent behavior
	 * @see Address::setStreet2
	 * @return Address
	 */
	final function setStreet_2($value) {
		return $this->setStreet2($value);
	}

	/**
	 * Gets the value of the city field
	 */
	function getCity() {
		return $this->city;
	}

	/**
	 * Sets the value of the city field
	 * @return Address
	 */
	function setCity($value) {
		return $this->setColumnValue('city', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Gets the value of the state field
	 */
	function getState() {
		return $this->state;
	}

	/**
	 * Sets the value of the state field
	 * @return Address
	 */
	function setState($value) {
		return $this->setColumnValue('state', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Gets the value of the zip field
	 */
	function getZip() {
		return $this->zip;
	}

	/**
	 * Sets the value of the zip field
	 * @return Address
	 */
	function setZip($value) {
		return $this->setColumnValue('zip', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Gets the value of the active field
	 */
	function getActive() {
		return $this->active;
	}

	/**
	 * Sets the value of the active field
	 * @return Address
	 */
	function setActive($value) {
		return $this->setColumnValue('active', $value, Model::COLUMN_TYPE_TINYINT);
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
	 * @return Address
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
	 * @return Address
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
	 * @return Address
	 */
	static function create() {
		return new Address();
	}

	/**
	 * @return Query
	 */
	static function getQuery(array $params = array(), Query $q = null) {
		$class = class_exists('AddressQuery') ? 'AddressQuery' : 'Query';
		$q = $q ? clone $q : new $class;
		if (!$q->getTable()) {
			$q->setTable(Address::getTableName());
		}

		// filters
		foreach ($params as $key => &$param) {
			if (Address::hasColumn($key)) {
				$q->add($key, $param);
			}
		}

		// SortBy (alias of sort_by, deprecated)
		if (isset($params['SortBy']) && !isset($params['order_by'])) {
			$params['order_by'] = $params['SortBy'];
		}

		// order_by
		if (isset($params['order_by']) && Address::hasColumn($params['order_by'])) {
			$q->orderBy($params['order_by'], isset($params['dir']) ? Query::DESC : Query::ASC);
		}

		return $q;
	}

	/**
	 * Returns String representation of table name
	 * @return string
	 */
	static function getTableName() {
		return Address::$_tableName;
	}

	/**
	 * Access to array of column names
	 * @return array
	 */
	static function getColumnNames() {
		return Address::$_columnNames;
	}

	/**
	 * Access to array of fully-qualified(table.column) columns
	 * @return array
	 */
	static function getColumns() {
		return Address::$_columns;
	}

	/**
	 * Access to array of column types, indexed by column name
	 * @return array
	 */
	static function getColumnTypes() {
		return Address::$_columnTypes;
	}

	/**
	 * Get the type of a column
	 * @return string
	 */
	static function getColumnType($column_name) {
		return Address::$_columnTypes[Address::normalizeColumnName($column_name)];
	}

	/**
	 * @return bool
	 */
	static function hasColumn($column_name) {
		static $columns_cache = null;
		if (null === $columns_cache) {
			$columns_cache = array_map('strtolower', Address::$_columnNames);
		}
		return in_array(strtolower(Address::normalizeColumnName($column_name)), $columns_cache);
	}


	/**
	 * Access to array of primary keys
	 * @return array
	 */
	static function getPrimaryKeys() {
		return Address::$_primaryKeys;
	}

	/**
	 * Access to name of primary key
	 * @return array
	 */
	static function getPrimaryKey() {
		return Address::$_primaryKey;
	}

	/**
	 * Returns true if the primary key column for this table is auto-increment
	 * @return bool
	 */
	static function isAutoIncrement() {
		return Address::$_isAutoIncrement;
	}

	/**
	 * Searches the database for a row with the ID(primary key) that matches
	 * the one input.
	 * @return Address
	 */
	 static function retrieveByPK($id) {
		return Address::retrieveByPKs($id);
	}

	/**
	 * Searches the database for a row with the primary keys that match
	 * the ones input.
	 * @return Address
	 */
	static function retrieveByPKs($id) {
		if (null === $id) {
			return null;
		}
		if (Address::$_poolEnabled) {
			$pool_instance = Address::retrieveFromPool($id);
			if (null !== $pool_instance) {
				return $pool_instance;
			}
		}
		$q = new Query;
		$q->add('id', $id);
		return Address::doSelectOne($q);
	}

	/**
	 * Searches the database for a row with a id
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveById($value) {
		return Address::retrieveByPK($value);
	}

	/**
	 * Searches the database for a row with a street_1
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByStreet1($value) {
		return Address::retrieveByColumn('street_1', $value);
	}

	/**
	 * Searches the database for a row with a street_2
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByStreet2($value) {
		return Address::retrieveByColumn('street_2', $value);
	}

	/**
	 * Searches the database for a row with a city
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByCity($value) {
		return Address::retrieveByColumn('city', $value);
	}

	/**
	 * Searches the database for a row with a state
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByState($value) {
		return Address::retrieveByColumn('state', $value);
	}

	/**
	 * Searches the database for a row with a zip
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByZip($value) {
		return Address::retrieveByColumn('zip', $value);
	}

	/**
	 * Searches the database for a row with a active
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByActive($value) {
		return Address::retrieveByColumn('active', $value);
	}

	/**
	 * Searches the database for a row with a created
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByCreated($value) {
		return Address::retrieveByColumn('created', $value);
	}

	/**
	 * Searches the database for a row with a updated
	 * value that matches the one provided
	 * @return Address
	 */
	static function retrieveByUpdated($value) {
		return Address::retrieveByColumn('updated', $value);
	}

	static function retrieveByColumn($field, $value) {
		$q = Query::create()->add($field, $value)->setLimit(1)->order('id');
		return Address::doSelectOne($q);
	}

	/**
	 * Populates and returns an instance of Address with the
	 * first result of a query.  If the query returns no results,
	 * returns null.
	 * @return Address
	 */
	static function fetchSingle($query_string) {
		$records = Address::fetch($query_string);
		return array_shift($records);
	}

	/**
	 * Populates and returns an array of Address objects with the
	 * results of a query.  If the query returns no results,
	 * returns an empty Array.
	 * @return Address[]
	 */
	static function fetch($query_string) {
		$conn = Address::getConnection();
		$result = $conn->query($query_string);
		return Address::fromResult($result, 'Address');
	}

	/**
	 * Returns an array of Address objects from
	 * a PDOStatement(query result).
	 *
	 * @see Model::fromResult
	 */
	static function fromResult(PDOStatement $result, $class = 'Address', $use_pool = null) {
		if (null === $use_pool) {
			$use_pool = Address::$_poolEnabled;
		}
		return Model::fromResult($result, $class, $use_pool);
	}

	/**
	 * Casts values of int fields to (int)
	 * @return Address
	 */
	function castInts() {
		$this->id = (null === $this->id) ? null : (int) $this->id;
		$this->active = (null === $this->active) ? null : (int) $this->active;
		$this->created = (null === $this->created) ? null : (int) $this->created;
		$this->updated = (null === $this->updated) ? null : (int) $this->updated;
		return $this;
	}

	/**
	 * Add (or replace) to the instance pool.
	 *
	 * @param Address $object
	 * @return void
	 */
	static function insertIntoPool(Address $object) {
		if (!Address::$_poolEnabled) {
			return;
		}
		if (Address::$_instancePoolCount > Address::MAX_INSTANCE_POOL_SIZE) {
			return;
		}

		Address::$_instancePool[implode('-', $object->getPrimaryKeyValues())] = $object;
		++Address::$_instancePoolCount;
	}

	/**
	 * Return the cached instance from the pool.
	 *
	 * @param mixed $pk Primary Key
	 * @return Address
	 */
	static function retrieveFromPool($pk) {
		if (!Address::$_poolEnabled || null === $pk) {
			return null;
		}
		if (array_key_exists($pk, Address::$_instancePool)) {
			return Address::$_instancePool[$pk];
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

		if (array_key_exists($pk, Address::$_instancePool)) {
			unset(Address::$_instancePool[$pk]);
			--Address::$_instancePoolCount;
		}
	}

	/**
	 * Empty the instance pool.
	 *
	 * @return void
	 */
	static function flushPool() {
		Address::$_instancePool = array();
	}

	static function setPoolEnabled($bool = true) {
		Address::$_poolEnabled = $bool;
	}

	static function getPoolEnabled() {
		return Address::$_poolEnabled;
	}

	/**
	 * Returns an array of all Address objects in the database.
	 * $extra SQL can be appended to the query to LIMIT, SORT, and/or GROUP results.
	 * If there are no results, returns an empty Array.
	 * @param $extra string
	 * @return Address[]
	 */
	static function getAll($extra = null) {
		$conn = Address::getConnection();
		$table_quoted = $conn->quoteIdentifier(Address::getTableName());
		return Address::fetch("SELECT * FROM $table_quoted $extra ");
	}

	/**
	 * @return int
	 */
	static function doCount(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Address::getConnection();
		if (!$q->getTable()) {
			$q->setTable(Address::getTableName());
		}
		return $q->doCount($conn);
	}

	/**
	 * @param Query $q
	 * @param bool $flush_pool
	 * @return int
	 */
	static function doDelete(Query $q, $flush_pool = true) {
		$conn = Address::getConnection();
		$q = clone $q;
		if (!$q->getTable()) {
			$q->setTable(Address::getTableName());
		}
		$result = $q->doDelete($conn);

		if ($flush_pool) {
			Address::flushPool();
		}

		return $result;
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Address[]
	 */
	static function doSelect(Query $q = null, $additional_classes = null) {
		if (is_array($additional_classes)) {
			array_unshift($additional_classes, 'Address');
			$class = $additional_classes;
		} else {
			$class = 'Address';
		}

		return Address::fromResult(Address::doSelectRS($q), $class);
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Address	 */
	static function doSelectOne(Query $q = null, $additional_classes = null) {
		$q = $q ? clone $q : new Query;
		$q->setLimit(1);
		$result = Address::doSelect($q, $additional_classes);
		return array_shift($result);
	}

	/**
	 * @param array $column_values
	 * @param Query $q The Query object that creates the SELECT query string
	 * @return Address[]
	 */
	static function doUpdate(array $column_values, Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Address::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Address::getTableName());
		}

		return $q->doUpdate($column_values, $conn);
	}

	/**
	 * Set the maximum insert batch size, once this size is reached the batch automatically inserts.
	 * @param int $size
	 * @return int insert batch size
	 */
	static function setInsertBatchSize($size = 500) {
		return Address::$_insertBatchSize = $size;
	}

	/**
	 * Queue for batch insert
	 * @return Model this
	 */
	function queueForInsert() {
		// If we've reached the maximum batch size, insert it and empty it.
		if (count(Address::$_insertBatch) >= Address::$_insertBatchSize) {
			Address::insertBatch();
		}

		Address::$_insertBatch[] = $this;

		return $this;
	}

	/**
	 * @return int row count
	 * @throws RuntimeException
	 */
	static function insertBatch() {
		$records = Address::$_insertBatch;
		if (!$records) {
			return 0;
		}
		$conn = Address::getConnection();
		$columns = Address::getColumnNames();
		$quoted_table = $conn->quoteIdentifier(Address::getTableName());

		$pk = Address::getPrimaryKey();
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
				Address::insertIntoPool($r);
			} else {
				$r->setDirty(true);
			}
		}

		Address::$_insertBatch = array();
		return $result->rowCount();
	}

	static function coerceTemporalValue($value, $column_type, DABLPDO $conn = null) {
		if (null === $conn) {
			$conn = Address::getConnection();
		}
		return parent::coerceTemporalValue($value, $column_type, $conn);
	}

	/**
	 * Executes a select query and returns the PDO result
	 * @return PDOStatement
	 */
	static function doSelectRS(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Address::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Address::getTableName());
		}

		return $q->doSelect($conn);
	}

	/**
	 * @return Address[]
	 */
	static function doSelectJoinAll(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$classes = array();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Address::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Address::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Address::getColumns();
			}
		}

		$q->setColumns($columns);
		return Address::doSelect($q, $classes);
	}

	/**
	 * Returns a Query for selecting guest Objects(rows) from the guest table
	 * with a address_id that matches $this->id.
	 * @return Query
	 */
	function getGuestsRelatedByAddressIdQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest', 'address_id', 'id', $q);
	}

	/**
	 * Returns the count of Guest Objects(rows) from the guest table
	 * with a address_id that matches $this->id.
	 * @return int
	 */
	function countGuestsRelatedByAddressId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		return Guest::doCount($this->getGuestsRelatedByAddressIdQuery($q));
	}

	/**
	 * Deletes the guest Objects(rows) from the guest table
	 * with a address_id that matches $this->id.
	 * @return int
	 */
	function deleteGuestsRelatedByAddressId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		$this->GuestsRelatedByAddressId_c = array();
		return Guest::doDelete($this->getGuestsRelatedByAddressIdQuery($q));
	}

	protected $GuestsRelatedByAddressId_c = array();

	/**
	 * Returns an array of Guest objects with a address_id
	 * that matches $this->id.
	 * When first called, this method will cache the result.
	 * After that, if $this->id is not modified, the
	 * method will return the cached result instead of querying the database
	 * a second time(for performance purposes).
	 * @return Guest[]
	 */
	function getGuestsRelatedByAddressId(Query $q = null) {
		if (null === $this->getid()) {
			return array();
		}

		if (
			null === $q
			&& $this->getCacheResults()
			&& !empty($this->GuestsRelatedByAddressId_c)
			&& !$this->isColumnModified('id')
		) {
			return $this->GuestsRelatedByAddressId_c;
		}

		$result = Guest::doSelect($this->getGuestsRelatedByAddressIdQuery($q));

		if ($q !== null) {
			return $result;
		}

		if ($this->getCacheResults()) {
			$this->GuestsRelatedByAddressId_c = $result;
		}
		return $result;
	}

	/**
	 * Convenience function for Address::getGuestsRelatedByaddress_id
	 * @return Guest[]
	 * @see Address::getGuestsRelatedByAddressId
	 */
	function getGuests($extra = null) {
		return $this->getGuestsRelatedByAddressId($extra);
	}

	/**
	  * Convenience function for Address::getGuestsRelatedByaddress_idQuery
	  * @return Query
	  * @see Address::getGuestsRelatedByaddress_idQuery
	  */
	function getGuestsQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest', 'address_id','id', $q);
	}

	/**
	  * Convenience function for Address::deleteGuestsRelatedByaddress_id
	  * @return int
	  * @see Address::deleteGuestsRelatedByaddress_id
	  */
	function deleteGuests(Query $q = null) {
		return $this->deleteGuestsRelatedByAddressId($q);
	}

	/**
	  * Convenience function for Address::countGuestsRelatedByaddress_id
	  * @return int
	  * @see Address::countGuestsRelatedByAddressId
	  */
	function countGuests(Query $q = null) {
		return $this->countGuestsRelatedByAddressId($q);
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