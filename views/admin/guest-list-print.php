<?php
if (count($guests) == 0) :
	echo 'There are 0 guests in the list.';
	return;
endif;
?>

<table class="guest-printout">
    <tr>

<?php
$counter = -1;
foreach($guests as $g) {
?>
        <td>
            <div class="guest-card">
                    <div class="guest-card-info">
                        <div class="padder_5">
                            <?php
                            $children = $g->getChildren();
                            echo $g->getFirstName() . ' ' . $g->getLastName() . '<br/>';

                            foreach($children as $g_ch) {
                                echo $g_ch->getFirstName() . ' ' . $g_ch->getLastName() . '<br/>';
                            }

                            ?>
                            RSVP Code: <?php echo $g->getActivationCode(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </td>
<?php if($counter%3 == 1) { ?>
    </tr>

    <tr>
<?php
    }
    $counter++;
}?>
</table>
