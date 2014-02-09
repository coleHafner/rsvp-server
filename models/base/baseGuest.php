<?php
/**
 *		Created by Dan Blaisdell's DABL
 *		Do not alter base files, as they will be overwritten.
 *		To alter the objects, alter the extended classes in
 *		the 'models' folder.
 *
 */
abstract class baseGuest extends ApplicationModel {

	const ID = 'guest.id';
	const PARENT_ID = 'guest.parent_id';
	const ADDRESS_ID = 'guest.address_id';
	const WEDDING_ID = 'guest.wedding_id';
	const FIRST_NAME = 'guest.first_name';
	const LAST_NAME = 'guest.last_name';
	const ACTIVATION_CODE = 'guest.activation_code';
	const EXPECTED_COUNT = 'guest.expected_count';
	const ACTUAL_COUNT = 'guest.actual_count';
	const RSVP_THROUGH_SITE = 'guest.rsvp_through_site';
	const IS_ATTENDING = 'guest.is_attending';
	const IS_NEW = 'guest.is_new';
	const ACTIVE = 'guest.active';
	const CREATED = 'guest.created';
	const UPDATED = 'guest.updated';

	/**
	 * Name of the table
	 * @var string
	 */
	protected static $_tableName = 'guest';

	/**
	 * Cache of objects retrieved from the database
	 * @var Guest[]
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
		Guest::ID,
		Guest::PARENT_ID,
		Guest::ADDRESS_ID,
		Guest::WEDDING_ID,
		Guest::FIRST_NAME,
		Guest::LAST_NAME,
		Guest::ACTIVATION_CODE,
		Guest::EXPECTED_COUNT,
		Guest::ACTUAL_COUNT,
		Guest::RSVP_THROUGH_SITE,
		Guest::IS_ATTENDING,
		Guest::IS_NEW,
		Guest::ACTIVE,
		Guest::CREATED,
		Guest::UPDATED,
	);

	/**
	 * array of all column names
	 * @var string[]
	 */
	protected static $_columnNames = array(
		'id',
		'parent_id',
		'address_id',
		'wedding_id',
		'first_name',
		'last_name',
		'activation_code',
		'expected_count',
		'actual_count',
		'rsvp_through_site',
		'is_attending',
		'is_new',
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
		'parent_id' => Model::COLUMN_TYPE_INTEGER,
		'address_id' => Model::COLUMN_TYPE_INTEGER,
		'wedding_id' => Model::COLUMN_TYPE_INTEGER,
		'first_name' => Model::COLUMN_TYPE_VARCHAR,
		'last_name' => Model::COLUMN_TYPE_VARCHAR,
		'activation_code' => Model::COLUMN_TYPE_VARCHAR,
		'expected_count' => Model::COLUMN_TYPE_INTEGER,
		'actual_count' => Model::COLUMN_TYPE_INTEGER,
		'rsvp_through_site' => Model::COLUMN_TYPE_TINYINT,
		'is_attending' => Model::COLUMN_TYPE_TINYINT,
		'is_new' => Model::COLUMN_TYPE_TINYINT,
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
	 * `parent_id` INTEGER DEFAULT ''
	 * @var int
	 */
	protected $parent_id;

	/**
	 * `address_id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $address_id;

	/**
	 * `wedding_id` INTEGER NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $wedding_id;

	/**
	 * `first_name` VARCHAR
	 * @var string
	 */
	protected $first_name;

	/**
	 * `last_name` VARCHAR
	 * @var string
	 */
	protected $last_name;

	/**
	 * `activation_code` VARCHAR
	 * @var string
	 */
	protected $activation_code;

	/**
	 * `expected_count` INTEGER DEFAULT ''
	 * @var int
	 */
	protected $expected_count;

	/**
	 * `actual_count` INTEGER DEFAULT ''
	 * @var int
	 */
	protected $actual_count;

	/**
	 * `rsvp_through_site` TINYINT NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $rsvp_through_site;

	/**
	 * `is_attending` TINYINT NOT NULL DEFAULT ''
	 * @var int
	 */
	protected $is_attending;

	/**
	 * `is_new` TINYINT NOT NULL DEFAULT 0
	 * @var int
	 */
	protected $is_new = 0;

	/**
	 * `active` TINYINT NOT NULL DEFAULT 1
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
	 * @return Guest
	 */
	function setId($value) {
		return $this->setColumnValue('id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Gets the value of the parent_id field
	 */
	function getParentId() {
		return $this->parent_id;
	}

	/**
	 * Sets the value of the parent_id field
	 * @return Guest
	 */
	function setParentId($value) {
		return $this->setColumnValue('parent_id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for Guest::getParentId
	 * final because getParentId should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getParentId
	 */
	final function getParent_id() {
		return $this->getParentId();
	}

	/**
	 * Convenience function for Guest::setParentId
	 * final because setParentId should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setParentId
	 * @return Guest
	 */
	final function setParent_id($value) {
		return $this->setParentId($value);
	}

	/**
	 * Gets the value of the address_id field
	 */
	function getAddressId() {
		return $this->address_id;
	}

	/**
	 * Sets the value of the address_id field
	 * @return Guest
	 */
	function setAddressId($value) {
		return $this->setColumnValue('address_id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for Guest::getAddressId
	 * final because getAddressId should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getAddressId
	 */
	final function getAddress_id() {
		return $this->getAddressId();
	}

	/**
	 * Convenience function for Guest::setAddressId
	 * final because setAddressId should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setAddressId
	 * @return Guest
	 */
	final function setAddress_id($value) {
		return $this->setAddressId($value);
	}

	/**
	 * Gets the value of the wedding_id field
	 */
	function getWeddingId() {
		return $this->wedding_id;
	}

	/**
	 * Sets the value of the wedding_id field
	 * @return Guest
	 */
	function setWeddingId($value) {
		return $this->setColumnValue('wedding_id', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for Guest::getWeddingId
	 * final because getWeddingId should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getWeddingId
	 */
	final function getWedding_id() {
		return $this->getWeddingId();
	}

	/**
	 * Convenience function for Guest::setWeddingId
	 * final because setWeddingId should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setWeddingId
	 * @return Guest
	 */
	final function setWedding_id($value) {
		return $this->setWeddingId($value);
	}

	/**
	 * Gets the value of the first_name field
	 */
	function getFirstName() {
		return $this->first_name;
	}

	/**
	 * Sets the value of the first_name field
	 * @return Guest
	 */
	function setFirstName($value) {
		return $this->setColumnValue('first_name', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Convenience function for Guest::getFirstName
	 * final because getFirstName should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getFirstName
	 */
	final function getFirst_name() {
		return $this->getFirstName();
	}

	/**
	 * Convenience function for Guest::setFirstName
	 * final because setFirstName should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setFirstName
	 * @return Guest
	 */
	final function setFirst_name($value) {
		return $this->setFirstName($value);
	}

	/**
	 * Gets the value of the last_name field
	 */
	function getLastName() {
		return $this->last_name;
	}

	/**
	 * Sets the value of the last_name field
	 * @return Guest
	 */
	function setLastName($value) {
		return $this->setColumnValue('last_name', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Convenience function for Guest::getLastName
	 * final because getLastName should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getLastName
	 */
	final function getLast_name() {
		return $this->getLastName();
	}

	/**
	 * Convenience function for Guest::setLastName
	 * final because setLastName should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setLastName
	 * @return Guest
	 */
	final function setLast_name($value) {
		return $this->setLastName($value);
	}

	/**
	 * Gets the value of the activation_code field
	 */
	function getActivationCode() {
		return $this->activation_code;
	}

	/**
	 * Sets the value of the activation_code field
	 * @return Guest
	 */
	function setActivationCode($value) {
		return $this->setColumnValue('activation_code', $value, Model::COLUMN_TYPE_VARCHAR);
	}

	/**
	 * Convenience function for Guest::getActivationCode
	 * final because getActivationCode should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getActivationCode
	 */
	final function getActivation_code() {
		return $this->getActivationCode();
	}

	/**
	 * Convenience function for Guest::setActivationCode
	 * final because setActivationCode should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setActivationCode
	 * @return Guest
	 */
	final function setActivation_code($value) {
		return $this->setActivationCode($value);
	}

	/**
	 * Gets the value of the expected_count field
	 */
	function getExpectedCount() {
		return $this->expected_count;
	}

	/**
	 * Sets the value of the expected_count field
	 * @return Guest
	 */
	function setExpectedCount($value) {
		return $this->setColumnValue('expected_count', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for Guest::getExpectedCount
	 * final because getExpectedCount should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getExpectedCount
	 */
	final function getExpected_count() {
		return $this->getExpectedCount();
	}

	/**
	 * Convenience function for Guest::setExpectedCount
	 * final because setExpectedCount should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setExpectedCount
	 * @return Guest
	 */
	final function setExpected_count($value) {
		return $this->setExpectedCount($value);
	}

	/**
	 * Gets the value of the actual_count field
	 */
	function getActualCount() {
		return $this->actual_count;
	}

	/**
	 * Sets the value of the actual_count field
	 * @return Guest
	 */
	function setActualCount($value) {
		return $this->setColumnValue('actual_count', $value, Model::COLUMN_TYPE_INTEGER);
	}

	/**
	 * Convenience function for Guest::getActualCount
	 * final because getActualCount should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getActualCount
	 */
	final function getActual_count() {
		return $this->getActualCount();
	}

	/**
	 * Convenience function for Guest::setActualCount
	 * final because setActualCount should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setActualCount
	 * @return Guest
	 */
	final function setActual_count($value) {
		return $this->setActualCount($value);
	}

	/**
	 * Gets the value of the rsvp_through_site field
	 */
	function getRsvpThroughSite() {
		return $this->rsvp_through_site;
	}

	/**
	 * Sets the value of the rsvp_through_site field
	 * @return Guest
	 */
	function setRsvpThroughSite($value) {
		return $this->setColumnValue('rsvp_through_site', $value, Model::COLUMN_TYPE_TINYINT);
	}

	/**
	 * Convenience function for Guest::getRsvpThroughSite
	 * final because getRsvpThroughSite should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getRsvpThroughSite
	 */
	final function getRsvp_through_site() {
		return $this->getRsvpThroughSite();
	}

	/**
	 * Convenience function for Guest::setRsvpThroughSite
	 * final because setRsvpThroughSite should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setRsvpThroughSite
	 * @return Guest
	 */
	final function setRsvp_through_site($value) {
		return $this->setRsvpThroughSite($value);
	}

	/**
	 * Gets the value of the is_attending field
	 */
	function getIsAttending() {
		return $this->is_attending;
	}

	/**
	 * Sets the value of the is_attending field
	 * @return Guest
	 */
	function setIsAttending($value) {
		return $this->setColumnValue('is_attending', $value, Model::COLUMN_TYPE_TINYINT);
	}

	/**
	 * Convenience function for Guest::getIsAttending
	 * final because getIsAttending should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getIsAttending
	 */
	final function getIs_attending() {
		return $this->getIsAttending();
	}

	/**
	 * Convenience function for Guest::setIsAttending
	 * final because setIsAttending should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setIsAttending
	 * @return Guest
	 */
	final function setIs_attending($value) {
		return $this->setIsAttending($value);
	}

	/**
	 * Gets the value of the is_new field
	 */
	function getIsNew() {
		return $this->is_new;
	}

	/**
	 * Sets the value of the is_new field
	 * @return Guest
	 */
	function setIsNew($value) {
		return $this->setColumnValue('is_new', $value, Model::COLUMN_TYPE_TINYINT);
	}

	/**
	 * Convenience function for Guest::getIsNew
	 * final because getIsNew should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::getIsNew
	 */
	final function getIs_new() {
		return $this->getIsNew();
	}

	/**
	 * Convenience function for Guest::setIsNew
	 * final because setIsNew should be extended instead
	 * to ensure consistent behavior
	 * @see Guest::setIsNew
	 * @return Guest
	 */
	final function setIs_new($value) {
		return $this->setIsNew($value);
	}

	/**
	 * Gets the value of the active field
	 */
	function getActive() {
		return $this->active;
	}

	/**
	 * Sets the value of the active field
	 * @return Guest
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
	 * @return Guest
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
	 * @return Guest
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
	 * @return Guest
	 */
	static function create() {
		return new Guest();
	}

	/**
	 * @return Query
	 */
	static function getQuery(array $params = array(), Query $q = null) {
		$class = class_exists('GuestQuery') ? 'GuestQuery' : 'Query';
		$q = $q ? clone $q : new $class;
		if (!$q->getTable()) {
			$q->setTable(Guest::getTableName());
		}

		// filters
		foreach ($params as $key => &$param) {
			if (Guest::hasColumn($key)) {
				$q->add($key, $param);
			}
		}

		// SortBy (alias of sort_by, deprecated)
		if (isset($params['SortBy']) && !isset($params['order_by'])) {
			$params['order_by'] = $params['SortBy'];
		}

		// order_by
		if (isset($params['order_by']) && Guest::hasColumn($params['order_by'])) {
			$q->orderBy($params['order_by'], isset($params['dir']) ? Query::DESC : Query::ASC);
		}

		return $q;
	}

	/**
	 * Returns String representation of table name
	 * @return string
	 */
	static function getTableName() {
		return Guest::$_tableName;
	}

	/**
	 * Access to array of column names
	 * @return array
	 */
	static function getColumnNames() {
		return Guest::$_columnNames;
	}

	/**
	 * Access to array of fully-qualified(table.column) columns
	 * @return array
	 */
	static function getColumns() {
		return Guest::$_columns;
	}

	/**
	 * Access to array of column types, indexed by column name
	 * @return array
	 */
	static function getColumnTypes() {
		return Guest::$_columnTypes;
	}

	/**
	 * Get the type of a column
	 * @return string
	 */
	static function getColumnType($column_name) {
		return Guest::$_columnTypes[Guest::normalizeColumnName($column_name)];
	}

	/**
	 * @return bool
	 */
	static function hasColumn($column_name) {
		static $columns_cache = null;
		if (null === $columns_cache) {
			$columns_cache = array_map('strtolower', Guest::$_columnNames);
		}
		return in_array(strtolower(Guest::normalizeColumnName($column_name)), $columns_cache);
	}


	/**
	 * Access to array of primary keys
	 * @return array
	 */
	static function getPrimaryKeys() {
		return Guest::$_primaryKeys;
	}

	/**
	 * Access to name of primary key
	 * @return array
	 */
	static function getPrimaryKey() {
		return Guest::$_primaryKey;
	}

	/**
	 * Returns true if the primary key column for this table is auto-increment
	 * @return bool
	 */
	static function isAutoIncrement() {
		return Guest::$_isAutoIncrement;
	}

	/**
	 * Searches the database for a row with the ID(primary key) that matches
	 * the one input.
	 * @return Guest
	 */
	 static function retrieveByPK($id) {
		return Guest::retrieveByPKs($id);
	}

	/**
	 * Searches the database for a row with the primary keys that match
	 * the ones input.
	 * @return Guest
	 */
	static function retrieveByPKs($id) {
		if (null === $id) {
			return null;
		}
		if (Guest::$_poolEnabled) {
			$pool_instance = Guest::retrieveFromPool($id);
			if (null !== $pool_instance) {
				return $pool_instance;
			}
		}
		$q = new Query;
		$q->add('id', $id);
		return Guest::doSelectOne($q);
	}

	/**
	 * Searches the database for a row with a id
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveById($value) {
		return Guest::retrieveByPK($value);
	}

	/**
	 * Searches the database for a row with a parent_id
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByParentId($value) {
		return Guest::retrieveByColumn('parent_id', $value);
	}

	/**
	 * Searches the database for a row with a address_id
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByAddressId($value) {
		return Guest::retrieveByColumn('address_id', $value);
	}

	/**
	 * Searches the database for a row with a wedding_id
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByWeddingId($value) {
		return Guest::retrieveByColumn('wedding_id', $value);
	}

	/**
	 * Searches the database for a row with a first_name
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByFirstName($value) {
		return Guest::retrieveByColumn('first_name', $value);
	}

	/**
	 * Searches the database for a row with a last_name
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByLastName($value) {
		return Guest::retrieveByColumn('last_name', $value);
	}

	/**
	 * Searches the database for a row with a activation_code
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByActivationCode($value) {
		return Guest::retrieveByColumn('activation_code', $value);
	}

	/**
	 * Searches the database for a row with a expected_count
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByExpectedCount($value) {
		return Guest::retrieveByColumn('expected_count', $value);
	}

	/**
	 * Searches the database for a row with a actual_count
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByActualCount($value) {
		return Guest::retrieveByColumn('actual_count', $value);
	}

	/**
	 * Searches the database for a row with a rsvp_through_site
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByRsvpThroughSite($value) {
		return Guest::retrieveByColumn('rsvp_through_site', $value);
	}

	/**
	 * Searches the database for a row with a is_attending
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByIsAttending($value) {
		return Guest::retrieveByColumn('is_attending', $value);
	}

	/**
	 * Searches the database for a row with a is_new
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByIsNew($value) {
		return Guest::retrieveByColumn('is_new', $value);
	}

	/**
	 * Searches the database for a row with a active
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByActive($value) {
		return Guest::retrieveByColumn('active', $value);
	}

	/**
	 * Searches the database for a row with a created
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByCreated($value) {
		return Guest::retrieveByColumn('created', $value);
	}

	/**
	 * Searches the database for a row with a updated
	 * value that matches the one provided
	 * @return Guest
	 */
	static function retrieveByUpdated($value) {
		return Guest::retrieveByColumn('updated', $value);
	}

	static function retrieveByColumn($field, $value) {
		$q = Query::create()->add($field, $value)->setLimit(1)->order('id');
		return Guest::doSelectOne($q);
	}

	/**
	 * Populates and returns an instance of Guest with the
	 * first result of a query.  If the query returns no results,
	 * returns null.
	 * @return Guest
	 */
	static function fetchSingle($query_string) {
		$records = Guest::fetch($query_string);
		return array_shift($records);
	}

	/**
	 * Populates and returns an array of Guest objects with the
	 * results of a query.  If the query returns no results,
	 * returns an empty Array.
	 * @return Guest[]
	 */
	static function fetch($query_string) {
		$conn = Guest::getConnection();
		$result = $conn->query($query_string);
		return Guest::fromResult($result, 'Guest');
	}

	/**
	 * Returns an array of Guest objects from
	 * a PDOStatement(query result).
	 *
	 * @see Model::fromResult
	 */
	static function fromResult(PDOStatement $result, $class = 'Guest', $use_pool = null) {
		if (null === $use_pool) {
			$use_pool = Guest::$_poolEnabled;
		}
		return Model::fromResult($result, $class, $use_pool);
	}

	/**
	 * Casts values of int fields to (int)
	 * @return Guest
	 */
	function castInts() {
		$this->id = (null === $this->id) ? null : (int) $this->id;
		$this->parent_id = (null === $this->parent_id) ? null : (int) $this->parent_id;
		$this->address_id = (null === $this->address_id) ? null : (int) $this->address_id;
		$this->wedding_id = (null === $this->wedding_id) ? null : (int) $this->wedding_id;
		$this->expected_count = (null === $this->expected_count) ? null : (int) $this->expected_count;
		$this->actual_count = (null === $this->actual_count) ? null : (int) $this->actual_count;
		$this->rsvp_through_site = (null === $this->rsvp_through_site) ? null : (int) $this->rsvp_through_site;
		$this->is_attending = (null === $this->is_attending) ? null : (int) $this->is_attending;
		$this->is_new = (null === $this->is_new) ? null : (int) $this->is_new;
		$this->active = (null === $this->active) ? null : (int) $this->active;
		$this->created = (null === $this->created) ? null : (int) $this->created;
		$this->updated = (null === $this->updated) ? null : (int) $this->updated;
		return $this;
	}

	/**
	 * Add (or replace) to the instance pool.
	 *
	 * @param Guest $object
	 * @return void
	 */
	static function insertIntoPool(Guest $object) {
		if (!Guest::$_poolEnabled) {
			return;
		}
		if (Guest::$_instancePoolCount > Guest::MAX_INSTANCE_POOL_SIZE) {
			return;
		}

		Guest::$_instancePool[implode('-', $object->getPrimaryKeyValues())] = $object;
		++Guest::$_instancePoolCount;
	}

	/**
	 * Return the cached instance from the pool.
	 *
	 * @param mixed $pk Primary Key
	 * @return Guest
	 */
	static function retrieveFromPool($pk) {
		if (!Guest::$_poolEnabled || null === $pk) {
			return null;
		}
		if (array_key_exists($pk, Guest::$_instancePool)) {
			return Guest::$_instancePool[$pk];
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

		if (array_key_exists($pk, Guest::$_instancePool)) {
			unset(Guest::$_instancePool[$pk]);
			--Guest::$_instancePoolCount;
		}
	}

	/**
	 * Empty the instance pool.
	 *
	 * @return void
	 */
	static function flushPool() {
		Guest::$_instancePool = array();
	}

	static function setPoolEnabled($bool = true) {
		Guest::$_poolEnabled = $bool;
	}

	static function getPoolEnabled() {
		return Guest::$_poolEnabled;
	}

	/**
	 * Returns an array of all Guest objects in the database.
	 * $extra SQL can be appended to the query to LIMIT, SORT, and/or GROUP results.
	 * If there are no results, returns an empty Array.
	 * @param $extra string
	 * @return Guest[]
	 */
	static function getAll($extra = null) {
		$conn = Guest::getConnection();
		$table_quoted = $conn->quoteIdentifier(Guest::getTableName());
		return Guest::fetch("SELECT * FROM $table_quoted $extra ");
	}

	/**
	 * @return int
	 */
	static function doCount(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Guest::getConnection();
		if (!$q->getTable()) {
			$q->setTable(Guest::getTableName());
		}
		return $q->doCount($conn);
	}

	/**
	 * @param Query $q
	 * @param bool $flush_pool
	 * @return int
	 */
	static function doDelete(Query $q, $flush_pool = true) {
		$conn = Guest::getConnection();
		$q = clone $q;
		if (!$q->getTable()) {
			$q->setTable(Guest::getTableName());
		}
		$result = $q->doDelete($conn);

		if ($flush_pool) {
			Guest::flushPool();
		}

		return $result;
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Guest[]
	 */
	static function doSelect(Query $q = null, $additional_classes = null) {
		if (is_array($additional_classes)) {
			array_unshift($additional_classes, 'Guest');
			$class = $additional_classes;
		} else {
			$class = 'Guest';
		}

		return Guest::fromResult(Guest::doSelectRS($q), $class);
	}

	/**
	 * @param Query $q The Query object that creates the SELECT query string
	 * @param array $additional_classes Array of additional classes for fromResult to instantiate as properties
	 * @return Guest	 */
	static function doSelectOne(Query $q = null, $additional_classes = null) {
		$q = $q ? clone $q : new Query;
		$q->setLimit(1);
		$result = Guest::doSelect($q, $additional_classes);
		return array_shift($result);
	}

	/**
	 * @param array $column_values
	 * @param Query $q The Query object that creates the SELECT query string
	 * @return Guest[]
	 */
	static function doUpdate(array $column_values, Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Guest::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Guest::getTableName());
		}

		return $q->doUpdate($column_values, $conn);
	}

	/**
	 * Set the maximum insert batch size, once this size is reached the batch automatically inserts.
	 * @param int $size
	 * @return int insert batch size
	 */
	static function setInsertBatchSize($size = 500) {
		return Guest::$_insertBatchSize = $size;
	}

	/**
	 * Queue for batch insert
	 * @return Model this
	 */
	function queueForInsert() {
		// If we've reached the maximum batch size, insert it and empty it.
		if (count(Guest::$_insertBatch) >= Guest::$_insertBatchSize) {
			Guest::insertBatch();
		}

		Guest::$_insertBatch[] = $this;

		return $this;
	}

	/**
	 * @return int row count
	 * @throws RuntimeException
	 */
	static function insertBatch() {
		$records = Guest::$_insertBatch;
		if (!$records) {
			return 0;
		}
		$conn = Guest::getConnection();
		$columns = Guest::getColumnNames();
		$quoted_table = $conn->quoteIdentifier(Guest::getTableName());

		$pk = Guest::getPrimaryKey();
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
				Guest::insertIntoPool($r);
			} else {
				$r->setDirty(true);
			}
		}

		Guest::$_insertBatch = array();
		return $result->rowCount();
	}

	static function coerceTemporalValue($value, $column_type, DABLPDO $conn = null) {
		if (null === $conn) {
			$conn = Guest::getConnection();
		}
		return parent::coerceTemporalValue($value, $column_type, $conn);
	}

	/**
	 * Executes a select query and returns the PDO result
	 * @return PDOStatement
	 */
	static function doSelectRS(Query $q = null) {
		$q = $q ? clone $q : new Query;
		$conn = Guest::getConnection();

		if (!$q->getTable()) {
			$q->setTable(Guest::getTableName());
		}

		return $q->doSelect($conn);
	}

	/**
	 * @return Guest
	 */
	function setParent(Guest $guest = null) {
		return $this->setGuestRelatedByParentId($guest);
	}

	/**
	 * @return Guest
	 */
	function setGuestRelatedByParentId(Guest $guest = null) {
		if (null === $guest) {
			$this->setparent_id(null);
		} else {
			if (!$guest->getid()) {
				throw new Exception('Cannot connect a Guest without a id');
			}
			$this->setparent_id($guest->getid());
		}
		return $this;
	}

	/**
	 * Returns a guest object with a id
	 * that matches $this->parent_id.
	 * @return Guest
	 */
	function getParent() {
		return $this->getGuestRelatedByParentId();
	}

	/**
	 * Returns a guest object with a id
	 * that matches $this->parent_id.
	 * @return Guest
	 */
	function getGuestRelatedByParentId() {
		$fk_value = $this->getparent_id();
		if (null === $fk_value) {
			return null;
		}
		return Guest::retrieveByPK($fk_value);
	}

	static function doSelectJoinParent(Query $q = null, $join_type = Query::LEFT_JOIN) {
		return Guest::doSelectJoinGuestRelatedByParentId($q, $join_type);
	}

	/**
	 * Returns a guest object with a id
	 * that matches $this->parent_id.
	 * @return Guest
	 */
	function getGuest() {
		return $this->getGuestRelatedByParentId();
	}

	/**
	 * @return Guest
	 */
	function setGuest(Guest $guest = null) {
		return $this->setGuestRelatedByParentId($guest);
	}

	/**
	 * @return Guest[]
	 */
	static function doSelectJoinGuestRelatedByParentId(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Guest::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Guest::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Guest::getColumns();
			}
		}

		$to_table = Guest::getTableName();
		$q->join($to_table, $this_table . '.parent_id = ' . $to_table . '.id', $join_type);
		foreach (Guest::getColumns() as $column) {
			$columns[] = $column;
		}
		$q->setColumns($columns);

		return Guest::doSelect($q, array('Guest'));
	}

	/**
	 * @return Guest
	 */
	function setAddress(Address $address = null) {
		return $this->setAddressRelatedByAddressId($address);
	}

	/**
	 * @return Guest
	 */
	function setAddressRelatedByAddressId(Address $address = null) {
		if (null === $address) {
			$this->setaddress_id(null);
		} else {
			if (!$address->getid()) {
				throw new Exception('Cannot connect a Address without a id');
			}
			$this->setaddress_id($address->getid());
		}
		return $this;
	}

	/**
	 * Returns a address object with a id
	 * that matches $this->address_id.
	 * @return Address
	 */
	function getAddress() {
		return $this->getAddressRelatedByAddressId();
	}

	/**
	 * Returns a address object with a id
	 * that matches $this->address_id.
	 * @return Address
	 */
	function getAddressRelatedByAddressId() {
		$fk_value = $this->getaddress_id();
		if (null === $fk_value) {
			return null;
		}
		return Address::retrieveByPK($fk_value);
	}

	static function doSelectJoinAddress(Query $q = null, $join_type = Query::LEFT_JOIN) {
		return Guest::doSelectJoinAddressRelatedByAddressId($q, $join_type);
	}

	/**
	 * @return Guest[]
	 */
	static function doSelectJoinAddressRelatedByAddressId(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Guest::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Guest::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Guest::getColumns();
			}
		}

		$to_table = Address::getTableName();
		$q->join($to_table, $this_table . '.address_id = ' . $to_table . '.id', $join_type);
		foreach (Address::getColumns() as $column) {
			$columns[] = $column;
		}
		$q->setColumns($columns);

		return Guest::doSelect($q, array('Address'));
	}

	/**
	 * @return Guest
	 */
	function setWedding(Wedding $wedding = null) {
		return $this->setWeddingRelatedByWeddingId($wedding);
	}

	/**
	 * @return Guest
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
		return Guest::doSelectJoinWeddingRelatedByWeddingId($q, $join_type);
	}

	/**
	 * @return Guest[]
	 */
	static function doSelectJoinWeddingRelatedByWeddingId(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Guest::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Guest::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Guest::getColumns();
			}
		}

		$to_table = Wedding::getTableName();
		$q->join($to_table, $this_table . '.wedding_id = ' . $to_table . '.id', $join_type);
		foreach (Wedding::getColumns() as $column) {
			$columns[] = $column;
		}
		$q->setColumns($columns);

		return Guest::doSelect($q, array('Wedding'));
	}

	/**
	 * @return Guest[]
	 */
	static function doSelectJoinAll(Query $q = null, $join_type = Query::LEFT_JOIN) {
		$q = $q ? clone $q : new Query;
		$columns = $q->getColumns();
		$classes = array();
		$alias = $q->getAlias();
		$this_table = $alias ? $alias : Guest::getTableName();
		if (!$columns) {
			if ($alias) {
				foreach (Guest::getColumns() as $column_name) {
					$columns[] = $alias . '.' . $column_name;
				}
			} else {
				$columns = Guest::getColumns();
			}
		}

		$to_table = Guest::getTableName();
		$q->join($to_table, $this_table . '.parent_id = ' . $to_table . '.id', $join_type);
		foreach (Guest::getColumns() as $column) {
			$columns[] = $column;
		}
		$classes[] = 'Guest';
	
		$to_table = Address::getTableName();
		$q->join($to_table, $this_table . '.address_id = ' . $to_table . '.id', $join_type);
		foreach (Address::getColumns() as $column) {
			$columns[] = $column;
		}
		$classes[] = 'Address';
	
		$to_table = Wedding::getTableName();
		$q->join($to_table, $this_table . '.wedding_id = ' . $to_table . '.id', $join_type);
		foreach (Wedding::getColumns() as $column) {
			$columns[] = $column;
		}
		$classes[] = 'Wedding';
	
		$q->setColumns($columns);
		return Guest::doSelect($q, $classes);
	}

	/**
	 * Returns a Query for selecting guest Objects(rows) from the guest table
	 * with a parent_id that matches $this->id.
	 * @return Query
	 */
	function getGuestsRelatedByParentIdQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest', 'parent_id', 'id', $q);
	}

	/**
	 * Returns the count of Guest Objects(rows) from the guest table
	 * with a parent_id that matches $this->id.
	 * @return int
	 */
	function countGuestsRelatedByParentId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		return Guest::doCount($this->getGuestsRelatedByParentIdQuery($q));
	}

	/**
	 * Deletes the guest Objects(rows) from the guest table
	 * with a parent_id that matches $this->id.
	 * @return int
	 */
	function deleteGuestsRelatedByParentId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		$this->GuestsRelatedByParentId_c = array();
		return Guest::doDelete($this->getGuestsRelatedByParentIdQuery($q));
	}

	protected $GuestsRelatedByParentId_c = array();

	/**
	 * Returns an array of Guest objects with a parent_id
	 * that matches $this->id.
	 * When first called, this method will cache the result.
	 * After that, if $this->id is not modified, the
	 * method will return the cached result instead of querying the database
	 * a second time(for performance purposes).
	 * @return Guest[]
	 */
	function getGuestsRelatedByParentId(Query $q = null) {
		if (null === $this->getid()) {
			return array();
		}

		if (
			null === $q
			&& $this->getCacheResults()
			&& !empty($this->GuestsRelatedByParentId_c)
			&& !$this->isColumnModified('id')
		) {
			return $this->GuestsRelatedByParentId_c;
		}

		$result = Guest::doSelect($this->getGuestsRelatedByParentIdQuery($q));

		if ($q !== null) {
			return $result;
		}

		if ($this->getCacheResults()) {
			$this->GuestsRelatedByParentId_c = $result;
		}
		return $result;
	}

	/**
	 * Returns a Query for selecting guest_guest_type Objects(rows) from the guest_guest_type table
	 * with a guest_id that matches $this->id.
	 * @return Query
	 */
	function getGuestGuestTypesRelatedByGuestIdQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest_guest_type', 'guest_id', 'id', $q);
	}

	/**
	 * Returns the count of GuestGuestType Objects(rows) from the guest_guest_type table
	 * with a guest_id that matches $this->id.
	 * @return int
	 */
	function countGuestGuestTypesRelatedByGuestId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		return GuestGuestType::doCount($this->getGuestGuestTypesRelatedByGuestIdQuery($q));
	}

	/**
	 * Deletes the guest_guest_type Objects(rows) from the guest_guest_type table
	 * with a guest_id that matches $this->id.
	 * @return int
	 */
	function deleteGuestGuestTypesRelatedByGuestId(Query $q = null) {
		if (null === $this->getid()) {
			return 0;
		}
		$this->GuestGuestTypesRelatedByGuestId_c = array();
		return GuestGuestType::doDelete($this->getGuestGuestTypesRelatedByGuestIdQuery($q));
	}

	protected $GuestGuestTypesRelatedByGuestId_c = array();

	/**
	 * Returns an array of GuestGuestType objects with a guest_id
	 * that matches $this->id.
	 * When first called, this method will cache the result.
	 * After that, if $this->id is not modified, the
	 * method will return the cached result instead of querying the database
	 * a second time(for performance purposes).
	 * @return GuestGuestType[]
	 */
	function getGuestGuestTypesRelatedByGuestId(Query $q = null) {
		if (null === $this->getid()) {
			return array();
		}

		if (
			null === $q
			&& $this->getCacheResults()
			&& !empty($this->GuestGuestTypesRelatedByGuestId_c)
			&& !$this->isColumnModified('id')
		) {
			return $this->GuestGuestTypesRelatedByGuestId_c;
		}

		$result = GuestGuestType::doSelect($this->getGuestGuestTypesRelatedByGuestIdQuery($q));

		if ($q !== null) {
			return $result;
		}

		if ($this->getCacheResults()) {
			$this->GuestGuestTypesRelatedByGuestId_c = $result;
		}
		return $result;
	}

	/**
	 * Convenience function for Guest::getGuestsRelatedByparent_id
	 * @return Guest[]
	 * @see Guest::getGuestsRelatedByParentId
	 */
	function getGuests($extra = null) {
		return $this->getGuestsRelatedByParentId($extra);
	}

	/**
	  * Convenience function for Guest::getGuestsRelatedByparent_idQuery
	  * @return Query
	  * @see Guest::getGuestsRelatedByparent_idQuery
	  */
	function getGuestsQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest', 'parent_id','id', $q);
	}

	/**
	  * Convenience function for Guest::deleteGuestsRelatedByparent_id
	  * @return int
	  * @see Guest::deleteGuestsRelatedByparent_id
	  */
	function deleteGuests(Query $q = null) {
		return $this->deleteGuestsRelatedByParentId($q);
	}

	/**
	  * Convenience function for Guest::countGuestsRelatedByparent_id
	  * @return int
	  * @see Guest::countGuestsRelatedByParentId
	  */
	function countGuests(Query $q = null) {
		return $this->countGuestsRelatedByParentId($q);
	}

	/**
	 * Convenience function for Guest::getGuestGuestTypesRelatedByguest_id
	 * @return GuestGuestType[]
	 * @see Guest::getGuestGuestTypesRelatedByGuestId
	 */
	function getGuestGuestTypes($extra = null) {
		return $this->getGuestGuestTypesRelatedByGuestId($extra);
	}

	/**
	  * Convenience function for Guest::getGuestGuestTypesRelatedByguest_idQuery
	  * @return Query
	  * @see Guest::getGuestGuestTypesRelatedByguest_idQuery
	  */
	function getGuestGuestTypesQuery(Query $q = null) {
		return $this->getForeignObjectsQuery('guest_guest_type', 'guest_id','id', $q);
	}

	/**
	  * Convenience function for Guest::deleteGuestGuestTypesRelatedByguest_id
	  * @return int
	  * @see Guest::deleteGuestGuestTypesRelatedByguest_id
	  */
	function deleteGuestGuestTypes(Query $q = null) {
		return $this->deleteGuestGuestTypesRelatedByGuestId($q);
	}

	/**
	  * Convenience function for Guest::countGuestGuestTypesRelatedByguest_id
	  * @return int
	  * @see Guest::countGuestGuestTypesRelatedByGuestId
	  */
	function countGuestGuestTypes(Query $q = null) {
		return $this->countGuestGuestTypesRelatedByGuestId($q);
	}

	/**
	 * Returns true if the column values validate.
	 * @return bool
	 */
	function validate() {
		$this->_validationErrors = array();
		if (null === $this->getaddress_id()) {
			$this->_validationErrors[] = 'address_id must not be null';
		}
		if (null === $this->getwedding_id()) {
			$this->_validationErrors[] = 'wedding_id must not be null';
		}
		if (null === $this->getrsvp_through_site()) {
			$this->_validationErrors[] = 'rsvp_through_site must not be null';
		}
		if (null === $this->getis_attending()) {
			$this->_validationErrors[] = 'is_attending must not be null';
		}
		return 0 === count($this->_validationErrors);
	}

}