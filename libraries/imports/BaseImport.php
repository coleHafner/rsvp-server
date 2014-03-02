<?php

abstract class BaseImport {

	/**
	 * Config option for logging.
	 * @var	boolean
	 */
	private $logging = false;

	/**
	 * @var	Logger
	 */
	private $log = null;

	/**
	 * Absolute path to file
	 * @var	string
	 */
	protected $filename = null;

	/**
	 * Initialized on initializeRun
	 * @var	PDOConnection
	 */
	private $conn = null;

	function __construct($filename) {

		$this->log = new Logger;

		if (!is_readable($filename)) {
			throw new RuntimeException('Error: Cannot read file "' . $filename . '"');
		}

		$this->filename = $filename;
	}

	/**
	 * All children must have this method
	 */
	abstract public function run();

	protected function startRun() {

		$this->conn = Guest::getConnection();
		$this->conn->beginTransaction();

		if($this->logging) {
			$this->log->openLog();
		}
	}

	protected function endRun($commit = false) {

		if($commit === true) {
			$this->conn->commit();
		}else {
			$this->conn->rollBack();
		}

		if($this->logging) {
			$this->log->closeLog();
		}
	}

	protected function showProgress() {
		$this->log->lineComplete();
	}

	protected function indicateLineWasSkipped() {
		$this->log->lineSkipped();
	}

	protected function skip($line, $reason) {
		$this->log->skip($line, $reason);
	}

	public function setSilent($silent) {
		$this->log->setSilent($silent);
	}

	public function setLogging($logging) {
		$this->logging = $logging;
	}
}