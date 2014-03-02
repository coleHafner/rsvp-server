<?php

class Logger {

	/**
	 * Collects all skipped records
	 * @var	array
	 */
	private $skipped = array();

	/**
	 * Tracks total number of record import attempts
	 * @var	int
	 */
	private $total = 0;

	/**
	 * File pointer for our log
	 * @var	resource
	 */
	private $log = null;

	/**
	 * @var	boolean
	 */
	private $silent = true;

	public function talk($words, $extra_line = false) {

		if($this->silent) {
			return null;
		}

		$phrase = $extra_line ? $words . PHP_EOL : $words;
		echo $phrase;
	}

	public function skip($line, $reason) {

		if ($this->log) {
			array_unshift($line, $reason);
			fputcsv($this->log, $line);
		}

		$this->skipped[] = $line;
		$this->lineSkipped();
	}

	public function showResults() {
		$this->talk('Out of ' . $this->total . ' records, ' . count($this->skipped) . ' were skipped:', true);
		print_r($this->skipped);
	}

	public function openLog() {

		$log_path = LOGS_DIR;

		if (!is_writable($log_path)) {
			throw new RuntimeException('Error Log dir "' . $log_path . '" does not exist or is not writable.');
		}

		$log_name = $log_path . 'log-' . date('Y-m-d') . '_' . date('H-i-s') . '.csv';
		$this->log = fopen($log_name, 'w');

		if($this->log === false) {
			throw new RuntimeException('Could not open log "' . $log_name . '". It is writable, but fopen failed.');
		}
	}

	public function closeLog() {
		if($this->log) {
			fclose($this->log);
		}
	}

	public function lineComplete() {
		$this->talk('+');
	}

	public function lineSkipped() {
		$this->talk('-');
	}

	public function setSilent($silent) {
		$this->silent = $silent;
	}

	public function getSkipped() {
		return $this->skipped;
	}

	public function getTotal() {
		return $this->total;
	}
}