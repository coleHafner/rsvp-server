<?php
/**
 *		Created by Dan Blaisdell's DABL
 *		Do not alter base files, as they will be overwritten.
 *		To alter the objects, alter the extended classes in
 *		the 'models' folder.
 *
 */
abstract class baseGuestType extends ApplicationModel {

	const ID = 'guest_type.id';
	const TITLE = 'guest_type.title';
	const IS_SPECIAL = 'guest_type.is_special';
	const ACTIVE = 'guest_type.active';
	const CREATED = 'guest_type.created';
	const UPDATED = 'guest_type.updated';

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $_tableName = 'guest_type';

	/**
	 * Cache of objects retrieved from the database
	 * @var GuestType[]
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
		GuestType::ID,
		GuestType::TITLE,
		GuestType::IS_SPECIAL,
		GuestType::ACTIVE,
		GuestType::CREATED,
		GuestType::UPDATED,
	);

	/**
	 * array of all column names
	 * @var string[]
	 */
	protected static $_columnNames = array(
		'id',
		'title',
		'is_special',
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
		'title' => Model::COLUMN_TYPE_VARCHAR,
		'is_special' => Model::COLUMN_TYPE_TINYINT,
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
	 * `title` VARCHAR
	 * @var string
	 */
	protected $title;

	/**
	 * `is_special` TINYINT DEFAULT ''
	 * @var int
	 */
	protected $is_special;

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
	 * @return GuestType
	 */
	function setId($value) {
		return $this->setColumnValue('id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Gets the value of the title field
	 */
	function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the value of the title field
	 * @return GuestType
	 */
	function setTitle($value) {
		return $this->setColumnValue('title', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Gets the value of the is_special field
	 */
	function getIsSpecial() {
		return $this->is_special;
	}

	/**
	 * Sets the value of the is_special field
	 * @return GuestType
	 */
	function setIsSpecial($value) {
		return $this->setColumnValue('is_special', $value, Model::COLUMN_TYPE_TINYINT);
	}

	/**
	 * Convenience function for GuestType::getIsSpecial
	 * final because getIsSpecial should be extended instead
	 * to ensure consistent behavior
	 * @see GuestType::getIsSpecial
	 */
	final function getIs_special() {
		return $this->getIsSpecial();
	}

	/**
	 * Convenience function for GuestType::setIsSpecial
	 * final because setIsSpecial should be extended instead
	 * to ensure consistent behavior
	 * @see GuestType::setIsSpecial
	 * @return GuestType
	 */
	final function setIs_special($value) {
		return $this->setIsSpecial($value);
	}

	/**
	 * Gets the value of the active field
	 */
	function getActive() {
		return $this->active;
	}

	/**
	 * Sets the value of the active field
	 * @return GuestType
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
	 * @return GuestType
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
	 * @return GuestType
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
	 * @return GuestType
	 */
	static function create() {
		return new GuestType();
	}

	/**
	 * @return Query
	 */
	static function getQuery(array $params = array(), Query $q = null) {
		$class = class_exists('GuestTypeQuery') ? 'GuestTypeQuery' : 'Query';
		$q = $q ? clone $q : new $class;
		if (!$q->getTable()) {
			$q->setTable(GuestType::getTableName());
		}

		// filters
		foreach ($params as $key => &$param) {
			if (GuestType::hasColumn($key)) {
				$q->add($key, $param);
			}
		}

		// SortBy (alias of sort_by, deprecated)
		if (isset($params['SortBy']) && !isset($params['order_by'])) {
			$params['order_by'] = $params['SortBy'];
		}

		// order_by
		if (isset($params['order_by']) && GuestType::hasColumn($params['order_by'])) {
			$q->orderBy($params['order_by'], isset($params['dir']) ? Query::DESC : Query::ASC);
		}

		return $q;
	}

	/**
	 * Returns String representation of table name
	 * @return string
	 */
	static function getTableName() {
		return GuestType::$_tableName;
	}

	/**
	 * Access to array of column names
	 * @return array
	 */
	static function getColumnNames() {
		return GuestType::$_columnNames;
	}

	/**
	 * Access to array of fully-qualified(table.column) columns
	 * @return array
	 */
	static function getColumns() {
		return GuestType::$_columns;
	}

	/**
	 * Access to array of column types, indexed by column name
	 * @return array
	 */
	static function getColumnTypes() {
		return GuestType::$_columnTypes;
	}

	/**
	 * Get the type of a column
	 * @return string
	 */
	static function getColumnType($column_name) {
		return GuestType::$_columnTypes[GuestType::normalizeColumnName($column_name)];
	}

	/**
	 * @return bool
	 */
	static function hasColumn($column_name) {
		static $columns_cache = null;
		if (null === $columns_cache) {
			$columns_cache = array_map('strtolower', GuestType::$_columnNames);
		}
		return in_array(strtolower(GuestType::normalizeColumnName($column_name)), $columns_cache);
	}


	/**
	 * Access to array of primary keys
	 * @return array
	 */
	static function getPrimaryKeys() {
		return GuestType::$_primaryKeys;
	}

	/**
	 * Access to name of primary key
	 * @return array
	 */
	static function getPrimaryKey() {
		return GuestType::$_primaryKey;
	}

	/**
	 * Returns true if the primary key column for this table is auto-increment
	 * @return bool
	 */
	static function isAutoIncrement() {
		return GuestType::$_isAutoIncrement;
	}

	/**
	 * Searches the database for a row with the ID(primary key) that matches
	 * the one input.
	 * @return GuestType
	 */
	 static function retrieveByPK($id) {
		return GuestType::retrieveByPKs($id);
	}

	/**
	 * Searches the database for a row with the primary keys that match
	 * the ones input.
	 * @return GuestType
	 */
	static function retrieveByPKs($id) {
		if (null === $id) {
			return null;
		}
		if (GuestType::$_poolEnabled) {
			$pool_instance = GuestType::retrieveFromPool($id);
			if (null !== $pool_instance) {
				return $pool_instance;
			}
		}
		$q = new Query;
		$q->add('id', $id);
		return GuestType::doSelectOne($q);
	}

	/**
	 * Searches the database for a row with a id
	 * value that matches the one provided
	 * @return GuestType
	 */
	static function retrieveById($value) {
		return GuestType::retrieveByPK($value);
	}

	/**
	 * Searches the database for a row with a title
	 * value that matches the one provided
	 * @return GuestType
	 */
	static function retrieveByTitle($value) {
		return GuestType::retrieveByColumn('title', $value);
	}

	/**
	 * Searches the database for a row with a is_special
	 * value that matches the one provided
	 * @return GuestType
	 */
	static function retrieveByIsSpecial($value) {
		return GuestType::retrieveByColumn('is_special', $value);
	}

	/**
	 * Searches the database for a row with a active
	 * value that matches the one provided
	 * @return GuestType
	 */
	static function retrieveByActive($value) {
		return GuestType::retrieveByColumn('active', $value);
	}

	/**
	 * Searches the database for a row with a created
	 * value that matches the one provided
	 * @return GuestType
	 */
	static function retrieveByCreated($value) {
		return GuestType::retrieveByColumn('created', $value);
	}

	/**
	 * Searches the database for a row with a updated
	 * value that matches the one provided
	 * @return GuestType
	 */
	static function retrieveByUpdated($value) {
		return GuestType::retrieveByColumn('updated', $value);
	}

	static function retrieveByColumn($field, $value) {
		$q = Query::create()->add($field, $value)->setLimit(1)->order('id');
		return GuestType::doSelectOne($q);
	}

	/**
	 * Populates and returns an instance of GuestType with the
	 * first result of a query.  If the query returns no results,
	 * returns null.
	 * @return GuestType
	 */
	static function fetchSingle($query_string) {
		$records = GuestType::fetch($query_string);
		return array_shift($records);
	}

	/**
	 * Populates and returns an array of GuestType objects with the
	 * results of a query.  If the query returns no results,
	 * returns an empty Array.
	 * @return GuestType[]
	 */
	static function fetch($query_string) {
		$conn = GuestType::getConnection();
		$result = $conn->query($query_string);
		return GuestType::fromResult($result, 'GuestType');
	}

	/**
	 * Returns an array of GuestType objects from
	 * a PDOStatement(query result).
	 *
	 * @see Model::fromResult
	 */
	static function fromResult(PDOStatement $result, $class = 'GuestType', $use_pool = null) {
		if (null === $use_pool) {
			$use_pool = GuestType::$_poolEnabled;
		}
		return Model::fromResult($result, $class, $use_pool);
	}

	/**
	 * Casts values of int fields to (int)
	 * @return GuestType
	 */
	function castInts() {
		$this->id = (null === $this->id) ? null : (int) $this->id;
		$this->is_special = (null === $this->is_special) ? null : (int) $this->is_special;
		$this->active = (null === $this->active) ? null : (int) $this->active;
		$this->created = (null === $this->created) ? null : (int) $this->created;
		$this->updated = (null === $this->updated) ? null : (int) $this->updated;
		return $this;
	}

	/**
	 * Add (or replace) to the instance pool.
	 *
	 * @param GuestType $object
	 * @return void
	 */
	static function insertIntoPool(GuestType $object) {
		if (!GuestType::$_poolEnabled) {
			return;
		}
		if (GuestType::$_instancePoolCount > GuestType::MAX_INSTANCE_POOL_SIZE) {
			return;
		}

		GuestType::$_instancePool[implode('-', $object->getPrimaryKeyValues())] = $object;
		++GuestType::$_instancePoolCount;
	}

	/**
	 * Return the cached instance from the pool.
	 *
	 * @param mixed $pk Primary Key
	 * @return GuestType
	 */
	static function retrieveFromPool($pk) {
		if (!GuestType::$_poolEnabled || null === $pk) {
			return null;
		}
		if (array_key_exists($pk, GuestType::$_instancePool)) {
			return GuestType::$_instancePool[$pk];
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

		if (array_key_exists($pk, GuestType::$_instancePool)) {
			unset(GuestType::$_instancePool[$pk]);
			--GuestType::$_instancePoolCount;
		}
	}

	/**
	 * Empty the instance pool.
	 *
	 * @return void
	 */
	static function flushPool() {
		GuestType::$_instancePool = array();
	}

	static function setPoolEnabled($bool = true) {
		GuestType::$_poolEnabled = $bool;
	}

	static function getPoolEnabled() {
		return GuestType::$_poolEnabled;
	}

	/**
	 * Returns an array of all GuestType objects in the database.
	 * $extra SQL can be appended to the query to LIMIT, SORT, and/or GROUP results.
	 * If there are no results, returns an empty Array.
	 * @param $extra string
	 * @return GuestType[]
	 */
	static function getAll($extra = null) {
		$conn = GuestType::getConnection();
		$table_quoted = $conn->quoteIdentifier(GuestType::getTableName());
		return GuestType::fetch("SELECT * FROM $table_quoted $extra ");
	}

	/**
	 * @return int
	 */
	static function doCount(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = GuestType::getConnection();
		if (!$q->getTable()) {
			$q->setTable(GuestType::getTableName());
		}
		return $q->doCount($conn);
	}

	/**
	 * @param Query $q
	 * @param bool $flush_pool
	 * @return int
	 */
	static function doDelete(Query $q, $flush_pool = true) {
		$conn = GuestType::getConnection();
		$q = clone $q;
		if (!$q->getTable()) {
			$q->setTable(GuestType::getTableName());
		}
		$result = $q->doDelete($conn);

		if ($flush_pool) {
			GuestType::flushPool();
		}

		return $result;
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return GuestType[]
	 */
	static function doSelect(Query $q = null, $additional_classes = null) {
		if (is_array($additional_classes)) {
			array_unshift($additional_classes, 'GuestType');
			$class = $additional_classes;
		} else {
			$class = 'GuestType';
		}

		return GuestType::fromResult(GuestType::doSelectRS($q), $class);
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return GuestType	 */
	static function doSelectOne(Query $q = null, $additional_classes = null) {
		$q = $q ? clone $q : new Query;
		$q->setLimit(1);
		$result = GuestType::doSelect($q, $additional_classes);
		return array_shift($result);
	}

	/**
	 * @param array $column_values
	 * @param Query $q The Query object that creates the SELECT query string
	 * @return GuestType[]
	 */
	static function doUpdate(array $column_values, Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = GuestType::getConnection();

		if (!$q->getTable()) {
			$q->setTable(GuestType::getTableName());
		}

		return $q->doUpdate($column_values, $conn);
	}

	/**
	 * Set the maximum insert batch size, once this size is reached the batch automatically inserts.
	 * @param int $size
	 * @return int insert batch size
	 */
	static function setInsertBatchSize($size = 500) {
		return GuestType::$_insertBatchSize = $size;
	}

	/**
	 * Queue for batch insert
	 * @return Model this
	 */
	function queueForInsert() {
		// If we've reached the maximum batch size, insert it and empty it.
		if (count(GuestType::$_insertBatch) >= GuestType::$_insertBatchSize) {
			GuestType::insertBatch();
		}

		GuestType::$_insertBatch[] = $this;

		return $this;
	}

	/**
	 * @return int row count
	 * @throws RuntimeException
	 */
	static function insertBatch() {
		$records = GuestType::$_insertBatch;
		if (!$records) {
			return 0;
		}
		$conn = GuestType::getConnection();
		$columns = GuestType::getColumnNames();
		$quoted_table = $conn->quoteIdentifier(GuestType::getTableName());

		$pk = GuestType::getPrimaryKey();
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
				GuestType::insertIntoPool($r);
			} else {
				$r->setDirty(true);
			}
		}

		GuestType::$_insertBatch = array();
		return $result->rowCount();
	}

	static function coerceTemporalValue($value, $column_type, DABLPDO $conn = null) {
		if (null === $conn) {
			$conn = GuestType::getConnection();
		}
		return parent::coerceTemporalValue($value, $column_type, $conn);
	}

	/**
	 * Executes a select query and returns the PDO result
	 * @return PDOStatement
	 */
	static function doSelectRS(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = GuestType::getConnection();

		if (!$q->getTable()) {
			$q->setTable(GuestType::getTableName());
		}

		return $q->doSelect($conn);
	}

	/**
	 * @return GuestType[]
	 */
	static function doSelectJoinAll(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$classes = array();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : GuestType::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (GuestType::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = GuestType::getColumns();
			}
		}

		$q->setColumns($columns);
		return GuestType::doSelect($q, $classes);
	}

	/**
	 * Returns a Query for selecting guest_guest_type Objects(rows) from the guest_guest_type table
	 * with a guest_type_id that matches $this->id.
	 * @return Query
	 */
	function getGuestGuestTypesRelatedByGuestTypeIdQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest_guest_type', 'guest_type_id', 'id', $q);
	}

	/**
	 * Returns the count of GuestGuestType Objects(rows) from the guest_guest_type table
	 * with a guest_type_id that matches $this->id.
	 * @return int
	 */
	function countGuestGuestTypesRelatedByGuestTypeId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		return GuestGuestType::doCount($this->getGuestGuestTypesRelatedByGuestTypeIdQuery($q));
	}

	/**
	 * Deletes the guest_guest_type Objects(rows) from the guest_guest_type table
	 * with a guest_type_id that matches $this->id.
	 * @return int
	 */
	function deleteGuestGuestTypesRelatedByGuestTypeId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		$this->GuestGuestTypesRelatedByGuestTypeId_c = array();
		return GuestGuestType::doDelete($this->getGuestGuestTypesRelatedByGuestTypeIdQuery($q));
	}

	protected $GuestGuestTypesRelatedByGuestTypeId_c = array();

	/**
	 * Returns an array of GuestGuestType objects with a guest_type_id
	 * that matches $this->id.
	 * When first called, this method will cache the result.
	 * After that, if $this->id is not modified, the
	 * method will return the cached result instead of querying the database
	 * a second time(for performance purposes).
	 * @return GuestGuestType[]
	 */
	function getGuestGuestTypesRelatedByGuestTypeId(Query $q = null) {
		if (null === $this->getid()) {
			return array();
		}

		if (
			null === $q
			&& $this->getCacheResults()
			&& !empty($this->GuestGuestTypesRelatedByGuestTypeId_c)
			&& !$this->isColumnModified('id')
		) {
			return $this->GuestGuestTypesRelatedByGuestTypeId_c;
		}

		$result = GuestGuestType::doSelect($this->getGuestGuestTypesRelatedByGuestTypeIdQuery($q));

		if ($q !== null) {
			return $result;
		}

		if ($this->getCacheResults()) {
			$this->GuestGuestTypesRelatedByGuestTypeId_c = $result;
		}
		return $result;
	}

	/**
	 * Convenience function for GuestType::getGuestGuestTypesRelatedByguest_type_id
	 * @return GuestGuestType[]
	 * @see GuestType::getGuestGuestTypesRelatedByGuestTypeId
	 */
	function getGuestGuestTypes($extra = null) {
		return $this->getGuestGuestTypesRelatedByGuestTypeId($extra);
	}

	/**
	  * Convenience function for GuestType::getGuestGuestTypesRelatedByguest_type_idQuery
	  * @return Query
	  * @see GuestType::getGuestGuestTypesRelatedByguest_type_idQuery
	  */
	function getGuestGuestTypesQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest_guest_type', 'guest_type_id','id', $q);
	}

	/**
	  * Convenience function for GuestType::deleteGuestGuestTypesRelatedByguest_type_id
	  * @return int
	  * @see GuestType::deleteGuestGuestTypesRelatedByguest_type_id
	  */
	function deleteGuestGuestTypes(Query $q = null) {
		return $this->deleteGuestGuestTypesRelatedByGuestTypeId($q);
	}

	/**
	  * Convenience function for GuestType::countGuestGuestTypesRelatedByguest_type_id
	  * @return int
	  * @see GuestType::countGuestGuestTypesRelatedByGuestTypeId
	  */
	function countGuestGuestTypes(Query $q = null) {
		return $this->countGuestGuestTypesRelatedByGuestTypeId($q);
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