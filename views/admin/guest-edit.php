<script type="text/javascript">
$(function() {
	$('#dinner-enabled').change(function() {
		if ($(this).val() == 0) {
			$('#dinner-count').val(0);
		}
	});
});
</script>

<div class="padder_10_top">
    <form id="guest-edit-form-<?php echo ($activeRecord->isNew()) ? 0 : $activeRecord->getId(); ?>" >
		<table >
			<tr>
				<td style="text-align:right;">
					First Name:
				</td>
				<td>
					<input type="text" name="first_name" class="text_input" value="<?php echo $activeRecord->getFirstName(); ?>"/>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">
					Last Name:
				</td>
				<td>
					<input type="text" name="last_name" class="text_input" value="<?php echo $activeRecord->getLastName(); ?>"/>
				</td>
			</tr>
			
			<tr>
				<td style="text-align:right;">
					Activation Code:
				</td>
				<td>
					<input type="text" name="activation_code" class="text_input" value="<?php echo $activeRecord->getActivationCode(); ?>"/>
				</td>
			</tr>
			
			<tr>
				<td style="text-align:right;vertical-align:top;">
					Parent Guest:
				</td>
				<td>
					<select name="parent_id">
						<option value="0">No Parent Guest</option>

						<?php foreach (Guest::getAllParents(Application::getUser()) as $g) { ?>
							<option value="<?php echo $g->getId(); ?>" <?php echo $g->getId() == $activeRecord->getParentId() ? 'selected' : ''; ?>>
								<?php echo $g->getLastName() . ', ' . $g->getFirstName(); ?>
							</option>
						<?php }//end foreach ?>

					</select>
				</td>
			</tr>
			
			<?php if (Application::getWedding() && Application::getWedding()->getRsvpDinnerEnabled()) : ?>
				<tr>
					<td style="text-align:right;">
						Attending Dinner:
					</td>
					<td>
						<select name="rsvp_dinner_enabled" id="dinner-enabled">
							<option value="1" <?php echo $activeRecord->getRsvpDinnerEnabled() ? 'selected' : ''; ?>>Yes</option>
							<option value="0" <?php echo !$activeRecord->getRsvpDinnerEnabled() ? 'selected' : ''; ?>>No</option>
						</select>
					</td>
				</tr>
				
				<tr>
					<td style="text-align:right;">
						Dinner Count:
					</td>
					<td>
						<select name="dinner_count" id="dinner-count" >
							<?php for($i = 0; $i <= 10; $i++) :?>
								<option value="<?php echo $i; ?>" <?php echo $activeRecord->getDinnerCount() == $i ? 'selected' : ''; ?>>
									<?php echo $i; ?>
								</option>
							<?php endfor; ?>
						</select>
					</td>
				</tr>
			<?php endif; ?>
				
			<?php if (Application::getWedding() && Application::getWedding()->getShuttleEnabled()) : ?>
				<tr>
					<td style="text-align:right;">
						Shuttle Count:
					</td>
					<td>
						<select name="shuttle_count">
							<?php for($i = 0; $i <= 10; $i++) :?>
								<option value="<?php echo $i; ?>" <?php echo $activeRecord->getShuttleCount() == $i ? 'selected' : ''; ?>>
									<?php echo $i; ?>
								</option>
							<?php endfor; ?>
						</select>
					</td>
				</tr>
			<?php endif; ?>

			<?php if (Application::getUser()->isAdmin()) : ?>
				<tr>
					<td style="text-align:right;vertical-align:top;">
						Wedding:
					</td>
					<td>
						<select id="wedding_id" name="wedding_id">
							<option value="">Select Wedding</option>

							<?php foreach (Wedding::getAll() as $w) { ?>
								<option value="<?php echo $w->getId(); ?>">
									<?php echo $w->getName(); ?>
								</option>
							<?php }//end foreach ?>

						</select>
					</td>
				</tr>
			<?php else : ?>
				<input
					id="wedding_id"
					type="hidden"
					name="wedding_id"
					value="<?php echo Application::getUser()->getWeddingId(); ?>" />
			<?php endif; ?>

			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>&nbsp;</td>
				<td>
					<label>
						<input type="checkbox" name="is_attending" <?php echo ($activeRecord->getIsAttending()) ? 'checked="checked"' : ''; ?> />
						&nbsp;Attending Wedding
					</label>
				</td>
			</tr>
		</table>
    </form>
</div>