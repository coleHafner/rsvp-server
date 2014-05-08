<?php
$table_style = ( array_key_exists("table_style", $params) ) ? $params['table_style'] : 'style="postion:relative;margin:auto;"';
$container_id = ( array_key_exists("container_id", $params) ) ? 'id="' . $params['container_id'] . '"' : '';
?>

<table <?php echo $table_style . ' ' . $container_id; ?>>
    <tr>
	<td class="center">
	    <?php View::load('widgets/button', $params['left']); ?>
	</td>

        <?php if(isset($params['right'])) : ?>
            <td>
                &nbsp;
            </td>
            <td class="center">
                <?php View::load('widgets/button', $params['right']); ?>
            </td>
        <?php endif; ?>
    </tr>
</table>