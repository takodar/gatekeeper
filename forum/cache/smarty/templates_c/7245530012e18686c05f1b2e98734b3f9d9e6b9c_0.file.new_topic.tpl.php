<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-06 20:14:11
  from "C:\Users\regta001\Desktop\testGK\gatekeeper\forum\sites\default\themes\2k18\templates\forum\new_topic.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59d7d603158cf0_89787556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7245530012e18686c05f1b2e98734b3f9d9e6b9c' => 
    array (
      0 => 'C:\\Users\\regta001\\Desktop\\testGK\\gatekeeper\\forum\\sites\\default\\themes\\2k18\\templates\\forum\\new_topic.tpl',
      1 => 1503893738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:forum/editor.tpl' => 1,
  ),
),false)) {
function content_59d7d603158cf0_89787556 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\Users\\regta001\\Desktop\\testGK\\gatekeeper\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
if (!is_callable('smarty_function_print_children')) require_once 'C:\\Users\\regta001\\Desktop\\testGK\\gatekeeper\\forum\\sys\\CODOF\\Smarty\\plugins\\function.print_children.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
new Block_body_47476444759d7d603158cf7_82505394($_smarty_tpl);
?>


<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\Users\regta001\Desktop\testGK\gatekeeper\forum\sites\default\themes\2k18\templates\forum\new_topic.tpl */
class Block_body_47476444759d7d603158cf7_82505394 extends Smarty_Internal_Block
{
public $name = 'body';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
?>


    <div class="container">

        <div class="row">

            <div id="breadcrumb" class="col-md-12">

                <div class="codo_breadcrumb_list btn-breadcrumb hidden-xs">
                    <?php echo smarty_modifier_load_block("block_breadcrumbs_before");?>

                    <a href="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><div><i class="glyphicon glyphicon-home"></i></div></a>
                    <?php if ($_smarty_tpl->tpl_vars['selected_cat']->value) {?>
                        <a href="index.php?u=/category/<?php echo $_smarty_tpl->tpl_vars['selected_cat']->value->cat_alias;?>
"><?php echo $_smarty_tpl->tpl_vars['selected_cat']->value->cat_name;?>
</a>
                    <?php }?>
                    <!--<div>_t("New topic")}</div>-->
                    <?php echo smarty_modifier_load_block("block_breadcrumbs_after");?>

                </div>
            </div>

            <?php echo smarty_modifier_load_block("block_create_topic_before");?>


            <div class="codo_widget">

                <div class="codo_widget-header">
                    <?php echo _t("Create Topic");?>

                </div>

                <div class="codo_widget-content">
                    <form id="codo_new_reply_post"  method="POST" class="" role="form">

                        <div class="form-group">
                            <label for="title"><?php echo _t("Title");?>
</label>
                            <div>
                                <input id="codo_topic_title" type="text" class="codo_input" value="<?php echo $_smarty_tpl->tpl_vars['topic']->value['title'];?>
" placeholder="<?php echo _t('Give a title for your topic');?>
" required>
                            </div>

                        </div>

                        <?php if ($_smarty_tpl->tpl_vars['can_add_tags']->value) {?>   
                            <div class="form-group codo_tags">

                                <label for="tags"><?php echo _t("Tags");?>
</label>
                                <div>
                                    <input id="codo_tags" data-role="tagsinput" type="text" value="<?php echo $_smarty_tpl->tpl_vars['tags']->value;?>
" />
                                </div>
                                

                            </div>
                        <?php }?>

                        <div class="form-group codo_select_category">
                            <label for="category"><?php echo _t('Category');?>
</label>
                            <div>
                                <div class="dropdown" id="codo_category_select">
                                    <button value="" class="btn dropdown-toggle btn-default" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                        <span><?php echo _t("Select a category");?>
</span>
                                        <span class="caret"></span>
                                    </button>
                                    <ul id="codo_select_category" class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cats']->value, 'cat');
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$_smarty_tpl->tpl_vars['cat']->_loop = true;
$__foreach_cat_0_saved = $_smarty_tpl->tpl_vars['cat'];
?>

                                            <li role="presentation"><a id="<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_id;?>
" data-alias="<?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_alias;?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value->cat_name;?>
</a></li>

                                            <?php echo smarty_function_print_children(array('cat'=>$_smarty_tpl->tpl_vars['cat']->value),$_smarty_tpl);?>

                                        <?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


                                    </ul>

                                </div>
                                <div class="codo_move_sep">
                                </div>
                                <div class="well codo_move">

                                    <span id="codo_move_text"><?php echo _t("You are moving this topic from %fromCategoryName% to %toCategoryName%");?>
.</span>
                                    <div class="checkbox">
                                        <label>
                                            <input id="move_notify" type="checkbox"> <?php echo _t("Notify any followers of the topic about this change ?");?>

                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input id="move_reason" type="hidden" class="form-control" placeholder="<?php echo _t('reason - leave blank if not required');?>
" />
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div id="codo_new_reply" class="codo_new_reply">

                            <!--<div class="codo_reply_resize_handle"></div>-->

                            <div class="codo_reply_box" id="codo_reply_box">
                                <textarea placeholder="<?php echo _t('Describe your topic . You can use BBcode or Markdown');?>
" id="codo_new_reply_textarea" name="input_text"><?php echo $_smarty_tpl->tpl_vars['topic']->value['imessage'];?>
</textarea>
                                <div class="codo_new_reply_preview" id="codo_new_reply_preview_container">
                                    <div class="codo_editor_preview_placeholder"><?php echo _t("live preview");?>
</div>
                                    <div id="codo_new_reply_preview"></div>
                                </div>
                                <div class="codo_reply_min_chars"><?php echo _t("enter atleast ");?>
<span id="codo_reply_min_chars_left"><?php echo $_smarty_tpl->tpl_vars['reply_min_chars']->value;?>
</span><?php echo _t(" characters");?>
</div>                                    
                            </div>

                            <div id="codo_non_mentionable" class="codo_non_mentionable"><b><?php echo _t("WARNING:");?>
 </b><?php echo _t("You mentioned %MENTIONS%, but they cannot see this message and will not be notified");?>
 
                            </div>

                            <div class="codo_new_reply_action">

                                <button class="codo_btn codo_new_reply_action_post" id="codo_new_reply_action_post"><i class="icon-check"></i><span class="codo_action_button_txt"><?php echo _t("Post");?>
</span></button>
                                <button onclick="window.history.back()" class="codo_btn codo_btn_def" id="codo_new_reply_action_cancel"><i class="icon-times"></i><span class="codo_action_button_txt"><?php echo _t("Cancel");?>
</span></button>

                                <img id="codo_new_reply_loading" src="<?php echo @constant('CURR_THEME');?>
img/ajax-loader.gif" />
                                <button class="codo_btn codo_btn_def codo_post_preview_bg" id="codo_post_preview_btn">&nbsp;</button>
                                <button class="codo_btn codo_btn_def codo_post_preview_bg" id="codo_post_preview_btn_resp">&nbsp;</button>
                                <div class="codo_draft_status_saving"><?php echo _t("Saving...");?>
</div>
                                <div class="codo_draft_status_saved"><?php echo _t("Saved");?>
</div>

                            </div>
                            <input type="text" class="end-of-line" name="end_of_line" />

                        </div>

                        <hr class="perm_sticky_auto_close"/>

                        <div class="form-group" id="alter_topic_status" style="display: none">
                            <label for="title"><?php echo _t('Topic should be');?>
</label>
                            <div>
                                <input name="topic_status" value="stickyfc" <?php if ($_smarty_tpl->tpl_vars['radio_topic_status']->value == 'stickyfc') {?>checked<?php }?> type="radio" /> <?php echo _t('sticky and show in front page and category page');?>

                            </div>
                            <div>
                                <input name="topic_status" value="stickyc" <?php if ($_smarty_tpl->tpl_vars['radio_topic_status']->value == 'stickyc') {?>checked<?php }?> type="radio" /> <?php echo _t('sticky and show only in category page');?>

                            </div>
                            <div>
                                <input name="topic_status" value="notsticky" <?php if ($_smarty_tpl->tpl_vars['radio_topic_status']->value == 'notsticky') {?>checked<?php }?> type="radio" /> <?php echo _t('not sticky');?>
      
                            </div>

                            <div class="muted"><?php echo _t('sticky topics are always shown before the normal topics');?>
</div>
                        </div>
                        <br/>

                        <div class="form-group perm_auto_close" style="display: none">
                            <label for="title"><?php echo _t('Set the topic status as');?>
</label>

                            <div>
                                <div id="is_topic_open" class="codo_switch codo_switch_on">
                                    <div class="codo_switch_toggle"></div>
                                    <span class="codo_switch_on"><?php echo _t('Open');?>
</span>
                                    <span class="codo_switch_off"><?php echo _t('Close');?>
</span>
                                </div>
                            </div>
                            <div class="muted"><?php echo _t('people cannot reply to closed topics');?>
.</div>
                        </div>

                        <div class="form-group perm_auto_close" style="display: none">
                            <label for="title"><?php echo _t('Should the topic be auto-closed ?');?>
</label>

                            <div>
                                <div id="topic_auto_close" class="codo_switch codo_switch_off">
                                    <div class="codo_switch_toggle"></div>
                                    <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                    <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                </div>
                            </div>

                            <div id="content_toggle_topic_auto_close">     
                                <b><?php echo _t('On');?>
</b>
                                <div class="form-group">
                                    <div class="col-sm-6" style="padding-left: 0">
                                        <input placeholder="<?php echo _t("Select a date");?>
" class="form-control col-md-3" type="text" id="datetimepicker"/>
                                    </div>
                                </div>
                                <div class="muted"><?php echo _t('topic will automatically closed on mentioned date');?>
.</div>
                            </div>
                        </div>

                        <div class="form-group" id="add_poll_switch_container" >

                            <label for="title"><?php echo _t('Add a poll to this topic ?');?>
</label>
                            <div>
                                <div id="add_poll_switch" class="codo_switch codo_switch_off">
                                    <div class="codo_switch_toggle"></div>
                                    <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                    <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                </div>
                            </div>
                        </div>                            

                        <div class="form-group add_poll_container" id="add_poll_toggle_yes" style="display: none">
                            <div>     
                                <div class="form-group">
                                    <label for="title"><?php echo _t("Poll question");?>
</label>
                                    <div>
                                        <input id="poll_question" type="text" class="codo_input" placeholder="<?php echo _t('Give a title for your poll');?>
">
                                    </div>
                                </div>
                                <div class="form-group" id="codo_poll_inputs">
                                    <label for="title"><?php echo _t("Poll options");?>
</label>
                                    <div class="codo_poll_input">
                                        <input id="poll_question" type="text" class="codo_input" placeholder="<?php echo _t('Poll option');?>
">
                                        <div class="codo_poll_options">
                                            <div title="<?php echo _t("add poll option");?>
" class="codo_poll_option codo_poll_add_option"><i class="glyphicon glyphicon-plus"></i></div>                                        
                                            <div title="<?php echo _t("remove poll option");?>
" class="codo_poll_option codo_poll_remove_option"><i class="glyphicon glyphicon-remove"></i></div>
                                        </div>
                                    </div>
                                    <div class="codo_poll_input">
                                        <input id="poll_question" type="text" class="codo_input" placeholder="<?php echo _t('Poll option');?>
">
                                        <div class="codo_poll_options">
                                            <div title="<?php echo _t("add poll option");?>
" class="codo_poll_option codo_poll_add_option"><i class="glyphicon glyphicon-plus"></i></div>                                        
                                            <div title="<?php echo _t("remove poll option");?>
" class="codo_poll_option codo_poll_remove_option"><i class="glyphicon glyphicon-remove"></i></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="advanced_poll_options">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="title"><?php echo _t('Can user recast his vote ?');?>
</label>

                                        <div id="can_recast_vote" class="codo_switch codo_switch_on">
                                            <div class="codo_switch_toggle"></div>
                                            <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                            <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label for="title"><?php echo _t('Show poll result without voting ?');?>
</label>
                                        <div id="show_result_without_vote" class="codo_switch codo_switch_on">
                                            <div class="codo_switch_toggle"></div>
                                            <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                            <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                        </div>                                
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="title"><?php echo _t('Should the poll be auto-closed ?');?>
</label>

                                    <div>
                                        <div id="poll_auto_close" class="codo_switch codo_switch_off">
                                            <div class="codo_switch_toggle"></div>
                                            <span class="codo_switch_on"><?php echo _t('Yes');?>
</span>
                                            <span class="codo_switch_off"><?php echo _t('No');?>
</span>
                                        </div>
                                    </div>

                                    <div id="content_toggle_poll_auto_close" style="display: none">     
                                        <b><?php echo _t('On');?>
</b>
                                        <div class="form-group">
                                            <div class="col-sm-6" style="padding-left: 0">
                                                <input placeholder="<?php echo _t("Select a date");?>
" class="form-control col-md-3" type="text" id="polldatepicker"/>
                                            </div>
                                        </div>
                                        <div class="muted"><?php echo _t('poll will be automatically closed on mentioned date');?>
.</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="perm_sticky_auto_close"/>

                        <div class="codo_new_reply_action perm_sticky_auto_close">

                            <button class="codo_btn codo_new_reply_action_post" id="trigger_codo_new_reply_action_post"><i class="icon-check"></i><span class="codo_action_button_txt"><?php echo _t("Post");?>
</span></button>
                            <button onclick="window.history.back()" class="codo_btn codo_btn_def" id="trigger_codo_new_reply_action_cancel"><i class="icon-times"></i><span class="codo_action_button_txt"><?php echo _t("Cancel");?>
</span></button>
                        </div>
                        <input type="text" class="end-of-line" id="end_of_line" name="end_of_line" />
                        <input id="codo_topic_cat" name="codo_topic_cat" type="hidden" />
                        <input id="codo_topic_cat_alias" name="codo_topic_cat_alias" type="hidden" />
                        <input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['CSRF_token']->value;?>
" />

                    </form>
                </div>

            </div>
            <?php echo smarty_modifier_load_block("block_create_topic_after");?>

            <div id = "alert_placeholder"></div>
        </div>

        <?php $_smarty_tpl->_subTemplateRender("file:forum/editor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>
    <?php echo '<script'; ?>
 type="text/javascript">

        CODOFVAR = {
            smileys: JSON.parse('<?php echo $_smarty_tpl->tpl_vars['forum_smileys']->value;?>
'),
            reply_min_chars: parseInt(<?php echo $_smarty_tpl->tpl_vars['reply_min_chars']->value;?>
),
            trans: {
                continue_mesg: '<?php echo _t("Continue");?>
'
            },
            dropzone: {
                dictDefaultMessage: '<?php echo _t("Drop files to upload &nbsp;&nbsp;(or click)");?>
',
                max_file_size: parseInt('<?php echo $_smarty_tpl->tpl_vars['max_file_size']->value;?>
'),
                allowed_file_mimetypes: '<?php echo $_smarty_tpl->tpl_vars['allowed_file_mimetypes']->value;?>
',
                forum_attachments_multiple: <?php echo $_smarty_tpl->tpl_vars['forum_attachments_multiple']->value;?>
,
                forum_attachments_parallel: parseInt('<?php echo $_smarty_tpl->tpl_vars['forum_attachments_parallel']->value;?>
'),
                forum_attachments_max: parseInt('<?php echo $_smarty_tpl->tpl_vars['forum_attachments_max']->value;?>
')

            }

        };

        function add_poll_option(event, value) {

            value = value || "";

            if ($('.codo_poll_input').length === <?php echo $_smarty_tpl->tpl_vars['max_poll_options']->value;?>
) {

                CODOF.util.alert("<?php echo _t("Cannot add more than %s poll options",null,$_smarty_tpl->tpl_vars['max_poll_options']->value);?>
", "<?php echo _t("Cannot add");?>
");
                return false;
            }

            var poll_option = $(event.target).parents('.codo_poll_input');
            var clone = poll_option.clone();
            clone.insertAfter(poll_option).find("input").val(value);

            return clone;
        }

        function remove_poll_option(event) {

            if ($('.codo_poll_input').length === 2) {

                CODOF.util.alert("<?php echo _t("Poll must have atleast 2 options");?>
", "<?php echo _t("Cannot delete");?>
");
                return false;
            }

            var poll_option = $(event.target).parents('.codo_poll_input');
            poll_option.slideUp().remove();
        }

        function on_codo_loaded() {

            CODOF.selectCat = function(cat_id) {

                $('#codo_category_select li  a').each(function () {

                    if (parseInt($(this).attr('id')) === cat_id) {

                        $('#codo_category_select > button > span:first-child').text($.trim($(this).text()));
                        $('#codo_topic_cat').val($(this).attr('id'));
                        $('#dropdownMenu1').val($(this).attr('id'));
                        $('#codo_topic_cat_alias').val($(this).data('alias'));
                        //$('#codo_category_select li  a').off();
                        $('.codo_new_reply_action_post .codo_action_button_txt').html('<?php echo _t("Save");?>
');
                        //$('#codo_category_select button').css('background','#eee');

                        CODOFVAR.cid = cat_id;
                    }
                });
            };


        <?php if ($_smarty_tpl->tpl_vars['can_make_sticky']->value) {?>

            $('#alter_topic_status').show();
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['can_close_topics']->value) {?>
            $(".perm_auto_close").show();
        <?php }?>

        <?php if (!$_smarty_tpl->tpl_vars['can_make_sticky']->value && !$_smarty_tpl->tpl_vars['can_close_topics']->value) {?>
            $('.perm_sticky_auto_close').hide();
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['can_add_poll']->value) {?>
            $("#add_poll_switch_container").show();
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['selected_cat']->value) {?>
            CODOF.selectCat(parseInt(<?php echo $_smarty_tpl->tpl_vars['selected_cat']->value->cat_id;?>
));
        <?php }?>


            CODOFVAR.pollData = '<?php echo $_smarty_tpl->tpl_vars['poll_data']->value;?>
';

            if (CODOFVAR.pollData !== "") {

                var pollData = JSON.parse(CODOFVAR.pollData);


                if (pollData.isActive === 1) {

                    CODOF.switch.set('add_poll_switch', true);
                    $('#add_poll_toggle_yes').show();

                    if(pollData.canRecast === 0) {
                    
                        CODOF.switch.set('can_recast_vote', false);                        
                    }    

                    if(pollData.viewWithoutVote === 0) {
                    
                        CODOF.switch.set('show_result_without_vote', false);                        
                    }    

                    $('#poll_question').val(pollData.title);

                    $('.codo_poll_input:first').remove();

                    var afterDiv = $('.codo_poll_input:first #poll_question')[0];

                    for (var i = 0; i < pollData.options.length; i++) {

                        var option = pollData.options[i];
                        var clone = add_poll_option({
                            target: afterDiv
                        }, option.option_name);

                        afterDiv = clone.find('#poll_question');
                    }

                    $('.codo_poll_input:first').remove();
                }
            }


            $('#codo_poll_inputs').on('click', '.codo_poll_add_option', add_poll_option);
            $('#codo_poll_inputs').on('click', '.codo_poll_remove_option', remove_poll_option);
            $datepicker = $('#polldatepicker').pickadate();
            CODOF.poll_datepicker = $datepicker.pickadate('picker');
            $('#poll_auto_close').on('switch_on', function () {

                $('#content_toggle_poll_auto_close').show();
            }).on('switch_off', function () {

                $('#content_toggle_poll_auto_close').hide();
            });
            $('#trigger_codo_new_reply_action_post').click(function () {

                $('#codo_new_reply_action_post').trigger('click');
            });
            CODOF.inTopic = true;
            $datepicker = $('#datetimepicker').pickadate();
            CODOF.datepicker = $datepicker.pickadate('picker');
            $('#topic_auto_close').on('switch_on', function () {

                $('#content_toggle_topic_auto_close').show();
            }).on('switch_off', function () {

                $('#content_toggle_topic_auto_close').hide();
            });
            $('#add_poll_switch').on('switch_on', function () {

                $('#add_poll_toggle_yes').show();
            }).on('switch_off', function () {

                $('#add_poll_toggle_yes').hide();
            });
            setTimeout(function () {
                $('#codo_topic_title').focus();
            }, 500);
            $('html, body').animate({
                scrollTop: $(".codo_widget-header").offset().top
            }, 500);
            CODOF.editor_form = $('#codo_new_reply_post');
            CODOF.editor_preview_btn = $('#codo_post_preview_btn');
            CODOF.editor_reply_post_btn = $('.codo_new_reply_action_post');
            $('#codo_new_reply_textarea').putCursorAtEnd();
            $('#codo_category_select li  a').on('click', function () {
                var cid = $(this).attr('id');
                $('#codo_category_select > button > span:first-child').text($.trim($(this).text()));
                $('#codo_topic_cat').val(cid);
                $('#dropdownMenu1').val(cid);
                $('#codo_topic_cat_alias').val($(this).data('alias'));
                //return false;
                CODOFVAR.cid = cid;
                CODOF.mentions.updateSpec(cid);
                CODOF.mentions.checkForNonMentions();
                CODOF.newCatName = $('#codo_category_select > button > span:first-child').text();
                if (CODOF.oldCatName) {

                    if (CODOF.oldCatName == CODOF.newCatName) {

                        $('.codo_move, .codo_move_sep').slideUp();
                    } else {

                        $('#codo_move_from_category_name').text(CODOF.oldCatName);
                        $('#codo_move_to_category_name').text(CODOF.newCatName);
                        $('.codo_move, .codo_move_sep').slideDown()
                    }
                }

            });
            $('#codo_tags').tagsinput({
                maxTags: codo_defs.forum_tags_num,
                maxChars: codo_defs.forum_tags_len,
                trimValue: true
            });
            var str = $('#codo_non_mentionable').html();
            $('#codo_non_mentionable').html(str.replace('%MENTIONS%', '<span id="codo_nonmentionable_users"></span>'));


            CODOF.mentions.extractAndAddToManned($("#codo_new_reply_textarea").val());
            //should be called ONLY after tagsinput() init
            CODOF.restoreFromDraft = function () {

                var obj = JSON.parse(localStorage.getItem('reply_' + codo_defs.uid));
                if (obj === null)
                    return;
                if (obj.title !== "") {
                    //add title
                    $('#codo_topic_title').val(obj.title);
                }

                if (obj.tags && obj.tags.length > 0) {
                    //add tags
                    var i, len = obj.tags.length;
                    for (i = 0; i < len; i++) {

                        $('#codo_tags').tagsinput('add', obj.tags[i]);
                    }

                }

                //add message
                $("#codo_new_reply_textarea").val(obj.text);
                CODOF.mentions.extractAndAddToManned(obj.text);
                if (obj.cat) {
                    //add cat
                    CODOF.selectCat(parseInt(obj.cat));
                    CODOF.mentions.checkForNonMentions();
                }

                /*if (obj.poll_title) {
                 
                 $('#poll_question').val(obj.poll_title);
                 }
                 
                 if (obj.poll_options) {
                 
                 //2 options already exists
                 for (var i = 2; i <= obj.poll_options.length; i++)
                 {
                 add_poll_option({
                 target: $('.codo_poll_input:first').find('.glyphicon-plus')
                 });
                 }
                 
                 for(var i=0; i<obj.poll_options.length; i++) {
                 
                 $('.codo_poll_input input').get(i).value = obj.poll_options[i];
                 }
                 }*/
            };
            if (window.location.hash === '#draft') {

                CODOF.restoreFromDraft();
            } else if (window.location.hash === '#draftEdit') {

                var y = confirm('aa');
            } else {

                if (localStorage.getItem('reply_' + codo_defs.uid) !== null) {

                    var obj = JSON.parse(localStorage.getItem('reply_' + codo_defs.uid));
                    $('#codo_draft_topic_title').html(obj.title);
                    $('#codo_draft_pending').modal();
                }
            }


            function select_curr_cat() {


                var cat_id = parseInt('<?php echo $_smarty_tpl->tpl_vars['topic']->value['cat_id'];?>
');
                CODOF.edit_topic_id = false;
                if (cat_id !== 0) {

                    CODOF.edit_topic_id = parseInt('<?php echo $_smarty_tpl->tpl_vars['topic']->value['topic_id'];?>
');
                    CODOF.selectCat(cat_id);
                    CODOF.oldCatName = $('#codo_category_select > button > span:first-child').text();
                    $('#codo_move_text').html(
                            $('#codo_move_text').text()
                            .replace('%fromCategoryName%', '<span id="codo_move_from_category_name"></span>')
                            .replace('%toCategoryName%', '<span id="codo_move_to_category_name"></span>')
                            );
                }

            }
            ;
            select_curr_cat();
        <?php if ($_smarty_tpl->tpl_vars['is_topic_open']->value) {?>
            CODOF.switch.set('is_topic_open', true);
        <?php } else { ?>
            CODOF.switch.set('is_topic_open', false);
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['is_auto_close']->value) {?>
            $('#content_toggle_topic_auto_close').show();
            CODOF.switch.set('topic_auto_close', true);
            CODOF.datepicker.set('select', '<?php echo $_smarty_tpl->tpl_vars['auto_close_date']->value;?>
', {
                format: 'yyyy-mm-dd'

            });
        <?php }?>

            CODOF.submitted = function () {
                //$('#codo_reply_replica').val($('#codo_new_reply_preview').html());

                var warned = false;
                if (CODOF.editor_reply_post_btn.hasClass('codo_btn_primary') && !CODOF.is_error()) {

                    if (!warned) {

                        if (CODOF.mentions.warnForNonMentions()) {

                            warned = true;
                            return false;
                        }
                    }
                    CODOF.editor_reply_post_btn.removeClass('codo_btn_primary');
                    $('#codo_new_reply_loading').show();
                    var action = 'create';
                    if (CODOF.edit_topic_id) {

                        action = 'edit';
                    }

                    $('#codo_reply_box').append('<div id="codo_reply_html_playground"></div>');
                    $('#codo_reply_html_playground').html($('#codo_new_reply_preview').html());
                    $('#codo_reply_html_playground .codo_embed_container').remove();
                    $('#codo_reply_html_playground .codo_embed_placeholder').remove();
                    $('#codo_reply_html_playground .codo_oembed').each(function () {

                        var href = $(this).attr('href');
                        $(this).html(href);
                    });
                    var poll_data = {
                        "viewResultWithoutVote": CODOF.switch.get('show_result_without_vote') ? 'yes' : 'no',
                        "canRecast": CODOF.switch.get('can_recast_vote') ? 'yes' : 'no',
                        "endTime": CODOF.poll_datepicker.get(),
                        "options": $('#codo_poll_inputs input').map(function () {
                            return this.value;
                        }).get()
                    };
                    var title = $.trim($('#codo_topic_title').val());
                    CODOF.req.data = {
                        title: title,
                        cat: $.trim($('#codo_topic_cat').val()),
                        imesg: $('#codo_new_reply_textarea').val(),
                        omesg: $('#codo_reply_html_playground').html().replace(/\</g, 'STARTCODOTAG'),
                        end_of_line: $('#end_of_line').val(),
                        token: codo_defs.token,
                        tid: CODOF.edit_topic_id,
                        notify: $('#move_notify').prop('checked'),
                        reason: $('#move_notify').val(),
                        tags: $('#codo_tags').tagsinput('items'),
                        sticky: $('input[name=topic_status]:checked').val(),
                        is_open: CODOF.switch.get('is_topic_open') ? 'yes' : 'no',
                        is_auto_close: CODOF.switch.get('topic_auto_close') ? 'yes' : 'no',
                        auto_close_date: CODOF.datepicker.get(),
                        has_poll: CODOF.switch.get('add_poll_switch') ? 'yes' : 'no',
                        poll_title: $('#poll_question').val(),
                        poll_data: poll_data
                    };
                    CODOF.hook.call('before_req_send');
                    $.post(
                            codo_defs.url + 'Ajax/topic/' + action,
                            CODOF.req.data,
                            function (response) {

                                var obj;
                                try {
                                    obj = JSON.parse(response);
                                } catch (e) {
                                    obj = response;
                                }
                                if (obj.tid) {

                                    CODOF.autoDraft.remove();
                                    window.location.href = codo_defs.url + 'topic/' + obj.tid + '/' + title;
                                } else {
                                    alert(response);
                                    CODOF.editor_reply_post_btn.addClass('codo_btn_primary');
                                }

                                $('#codo_new_topic_loader').hide();
                            }
                    );
                }

                return false;
            };
            CODOF.is_error = function () {

                var error = false;
                var val = $.trim($('#dropdownMenu1').val());
                if (val === "") {

                    $('#dropdownMenu1').addClass('boundary-error').focus();
                    error = true;
                } else {

                    $('#dropdownMenu1').removeClass('boundary-error');
                }

                if ($('#add_poll_switch').hasClass('codo_switch_on') && $('#poll_question').val() === "") {

                    CODOF.util.alert("<?php echo _t("Poll must have a question/title");?>
");
                    error = true;
                } else if ($('#add_poll_switch').hasClass('codo_switch_on')) {

                    var poll_option_filled = 0;
                    $('#codo_poll_inputs input').each(function () {
                        if (this.value !== "")
                            poll_option_filled++;
                    });
                    if (poll_option_filled < 2) {
                        CODOF.util.alert("<?php echo _t("Poll must have at least two options");?>
");
                        error = true;
                    }
                }

                $('#codo_new_reply_post :input[required=""],#codo_new_reply_post :input[required]').each(function () {

                    var val = $(this).val();
                    if ($.trim(val) === "") {

                        $(this).addClass('boundary-error').focus();
                        error = true;
                        return false;
                    } else {
                        $(this).removeClass('boundary-error')
                    }
                });
                return error;
            };
        }
        ;

    <?php echo '</script'; ?>
>

    <link rel="stylesheet" type="text/css" href="<?php echo @constant('DURI');?>
assets/markitup/highlight/styles/github.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo @constant('DURI');?>
assets/dropzone/css/basic.css" />


<?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
