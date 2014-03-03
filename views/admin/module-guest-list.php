<table class="guest_list font_med_II color_accent" style="width:100%;border-collapse:collapse;">
    <tr class="font_med bg_color_light_tan">

		<td class="padder" style="width:25%;">
			Last Name
		</td>

		<td class="padder" style="width:25%;">
			First Name
		</td>
		<td class="padder" style="width:12%;">
			Replied?
		</td>
        <td class="padder" style="width:13%;">
			Activation Code
		</td>
		<td class="padder" style="width:25%;">
			Attending?
			<div class="font_normal bg_color_white color_accent" style="postion:relative;float:right;">
				<div class="padder">
					<?php echo count($guests); ?> Guests
				</div>
			</div>
		</td>
    </tr>

	<?php
	if (is_array($guests) && count($guests) > 0) {
		foreach ($guests as $i => $g) {
			//$bg_class = '';
			$is_attending = "-";
			$bg_class = ( $i % 2 ) ? 'class="bg_color_light_tan"' : '';
			$has_replied = $g->getIsAttending() === null ? "No" : "Yes";

			if ($has_replied == "Yes") {
				$is_attending = ( $g->getIsAttending() ) ? "Yes" : "No";
			}
			?>
		    <tr <?php echo $bg_class; ?> id="guest-row-<?php echo $g->getId(); ?>">
				<td class="padder">
					<?php echo $g->getLastName(); ?>
				</td>

				<td class="padder">
					<?php echo $g->getFirstName(); ?>
				</td>
				<td class="padder">
					<?php echo $has_replied; ?>
				</td>
		        <td>
					<?php echo ($g->getActivationCode()) ? $g->getActivationCode() : '-'; ?>
		        </td>
				<td class="padder">
					<table class="guest_options">
						<tr>
							<td style="font-size:15px;">
								<?php echo $is_attending; ?>
							</td>
							<td class="options">
								<a href="#" class="ui-icon ui-icon-close guest-record" type="guest" process="show-form" action="delete" pk="<?php echo $g->getId(); ?>" style="float:right;margin-left:5px;">&nbsp;</a>
								<a href="#" class="ui-icon ui-icon-pencil guest-record" type="guest" process="show-form" action="edit" pk="<?php echo $g->getId(); ?>" style="float:right;">&nbsp;</a>
							</td>
						</tr>
					</table>

				</td>
		    </tr>

			<?php
		}//end foreach
	} else {
		?>
	    <tr>
			<td colspan="3" style="text-align:center;">
				<br/><br/>
				There are 0 guests that match your criteria.
			</td>
	    </tr>

	<?php } ?>

</table>