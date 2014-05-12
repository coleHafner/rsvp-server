<?php

class JoyceSegalDinnerImport extends BaseImport {

	public function run() {
		$fp = fopen($this->filename, 'r');
		$this->startRun();
		$i = 0;

		try {
			while (!feof($fp)) {

				$line = fgetcsv($fp);

				if ($i == 0) {
					$i++;
					continue;
				}

				$guest_id = @$line[0];
				$rsvp_col = @$line[3];
				$guest = Guest::retrieveByPK($guest_id);

				if (!$guest instanceof Guest) {
					$this->skip($line, 'No guest for id #' . $guest_id);
				}

				$can_rsvp = BaseImport::answerToBoolean($rsvp_col);
				$guest->setRsvpDinnerEnabled($can_rsvp);
				$guest->save();
				$this->showProgress();
			}

			$this->endRun(true);

		}catch (Exception $e) {
			$this->endRun(false);
			throw $e;
		}
	}
}