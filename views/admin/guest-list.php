<div class="title_button_container">
	<?php View::load('widgets/button-round', $params['button']); ?>
	<?php View::load('widgets/button-round', $params['button_2']); ?>
</div>

<div id="guest_list_filter" class="margin_10_top padder_10 rounded_corners bg_color_light_tan">
    <span class="title_span header color_accent">
		Filter Guest List
    </span>
    <div class="padder_10_top">
		<form id="guest_list_form">
			<div style="position:relative;width:24%;float:left;">
				<span class="title_span">
					First Name:
				</span>

				<div class="padder" style="padding-left:0px;">
					<input name="first_name" value="" />
				</div>
			</div>

			<div style="position:relative;width:24%;float:left;">
				<span class="title_span">
					Last Name:
				</span>

				<div class="padder" style="padding-left:0px;">
					<input name="last_name" value="" />
				</div>
			</div>

			<div style="position:relative;width:20%;float:left;">
				<span class="title_span">
					Has Replied:
				</span>
				<div class="padder" style="padding-left:0px;">
					<select name="has_replied">
						<option value="1" >Yes</option>
						<option value="0" >No</option>
						<option value="" >Doesn't Matter</option>
					</select>
				</div>
			</div>

			<?php if (Application::getUser()->isAdmin()) : ?>
				<div style="position:relative;width:20%;float:left;">
					<span class="title_span">
						Wedding:
					</span>

					<div class="padder" style="padding-left:0px;">
						<select name="wedding_id">
							<option value="">
								All Weddings
							</option>

							<?php foreach (Wedding::getAll() as $w) { ?>
								<option value="<?php echo $w->getId(); ?>">
									<?php echo $w->getName(); ?>
								</option>
							<?php }//end foreach ?>

						</select>
					</div>
				</div>
			<?php endif; ?>

			<div style="position:relative;width:12%;float:left;">
				<?php View::load('widgets/button-form', $params['form-buttons']); ?>
			</div>

			<div class="clear"></div>
		</form>
    </div>
</div>

<div style="position:relative;margin:15px auto auto auto;width:100%;">
    <div class="padder" id="guest_list_container">
		<?php View::load('admin/module-guest-list', $params); ?>
    </div>
</div>