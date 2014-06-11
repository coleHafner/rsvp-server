<?php

$wedding = Application::getWedding();
$rsvp_dinner = $wedding && $wedding->getRsvpDinnerEnabled();
$shuttle = $wedding && $wedding->getShuttleEnabled();
?>

<table class="guest_list font_med_II color_accent" style="width:100%;border-collapse:collapse;">
    <tr class="font_med bg_color_light_tan">

		<td class="padder" style="width:20%;">
			Last Name
		</td>

		<td class="padder" style="width:20%;">
			First Name
		</td>
        <td class="padder" style="width:14%;">
			Code
		</td>
		
		<?php if ($rsvp_dinner) : ?>
			<td class="padder" style="width:13%;">
				Dinner Count
			</td>
		<?php endif; ?>
			
		<?php if ($shuttle) : ?>
			<td class="padder" style="width:13%;">
				Shuttle Count
			</td>
		<?php endif; ?>
		
		<td class="padder" style="width:20%;">
			Attending
		</td>
    </tr>

	<?php
	if (is_array($guests) && count($guests) > 0) {
		foreach ($guests as $i => $g) {
			//$bg_class = '';
			$is_attending = "-";
			$bg_class = ( $i % 2 ) ? 'class="bg_color_light_tan"' : '';
			
			if ($g->getIsAttending() !== null) {
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
		        <td>
					<?php echo ($g->getActivationCode()) ? $g->getActivationCode() : '-'; ?>
		        </td>
				
				<?php if ($rsvp_dinner) : ?>
					<td class="padder">
						<?php echo $g->getDinnerCount() !== null ? $g->getDinnerCount() : '-'; ?>
					</td>
				<?php endif; ?>
					
				<?php if ($shuttle) : ?>
					<td class="padder">
						<?php echo $g->getShuttleCount() !== null ? $g->getShuttleCount() : '-'; ?>
					</td>
				<?php endif; ?>
					
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