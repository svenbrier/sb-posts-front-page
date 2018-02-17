<?php
/**
 * Created by PhpStorm.
 * User: sb
 * Date: 17.08.2017
 * Time: 17:15
 */
?>

<div class="wrap">
    <h1>SB Posts on Front Page</h1>

    <form method="post" action="options.php">
		<?php settings_fields( $viewData['option_group'] ); ?>
		<?php do_settings_sections( $viewData['option_group'] ); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row"><?php esc_html_e( 'Number of posts on the front page', 'sb-posts-front-page' ); ?></th>
                <td><input class="small-text" type="number" min="0" name="<?= $viewData['option_name']; ?>"
                           value="<?= get_option( $viewData['option_name'] ); ?>"/></td>
            </tr>
        </table>
		<?php submit_button(); ?>
    </form>
</div>