<?php
/**
 * @author Crunchify.co
 * Plugin: All in One Webmaster
 */
?>

<div class="postbox">
    <h3>Extra HTML code to be inserted in to Header or Footer Section</h3>

    <div>
        <table class="form-table">

            <tr valign="top" class="alternate">

                <th scope="row" style="width:32%;"><label>1) <b>Header</b> Section</label><?=$new_icon?><br><br>Add <b>ONLY
                    HTML</b> code to the <code>head</code> of your blog
                </th>

                <td><textarea name="all_in_one_head_section" cols="60"
                              rows="5"><?php echo get_option('all_in_one_head_section'); ?></textarea></td>
            </tr>
            <tr valign="top">
                <th scope="row" style="width:32%;"><label>2) <b>Footer</b> Section</label><?=$new_icon?><br><br>Add <b>ONLY
                    HTML</b> code to the <code>footer</code> of your blog
                </th>

                <td><textarea name="all_in_one_footer_section" cols="60"
                              rows="5"><?php echo get_option('all_in_one_footer_section'); ?></textarea></td>
            </tr>

        </table>
    </div>

</div>

<a href="http://Crunchify.co/all-in-one-webmaster/" target="_blank">Feedback</a> | <a href="http://twitter.com/CrunchifyCo"
                                                                                    target="_blank">Twitter</a> | <a
        href="http://www.facebook.com/iCrunch" target="_blank">Facebook</a>

<div class="submit">
    <input type="submit" name="info_update1" class="button-primary" value="<?php _e('Update options'); ?> &raquo;"/>

</div>

</form>
