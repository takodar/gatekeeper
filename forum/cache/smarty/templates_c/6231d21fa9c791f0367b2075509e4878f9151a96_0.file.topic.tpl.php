<?php
/* Smarty version 3.1.30-dev/44, created on 2017-10-06 20:15:57
  from "C:\Users\regta001\Desktop\testGK\gatekeeper\forum\sites\default\themes\2k18\templates\forum\topic.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/44',
  'unifunc' => 'content_59d7d66d1f50f2_81248230',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6231d21fa9c791f0367b2075509e4878f9151a96' => 
    array (
      0 => 'C:\\Users\\regta001\\Desktop\\testGK\\gatekeeper\\forum\\sites\\default\\themes\\2k18\\templates\\forum\\topic.tpl',
      1 => 1503893738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
    'file:forum/notification_level.tpl' => 1,
    'file:forum/editor.tpl' => 1,
  ),
),false)) {
function content_59d7d66d1f50f2_81248230 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_URL_safe')) require_once 'C:\\Users\\regta001\\Desktop\\testGK\\gatekeeper\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.URL_safe.php';
if (!is_callable('smarty_modifier_load_block')) require_once 'C:\\Users\\regta001\\Desktop\\testGK\\gatekeeper\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.load_block.php';
if (!is_callable('smarty_modifier_abbrev_no')) require_once 'C:\\Users\\regta001\\Desktop\\testGK\\gatekeeper\\forum\\sys\\CODOF\\Smarty\\plugins\\modifier.abbrev_no.php';
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>




<?php 
new Block_body_13800097759d7d66d1f50f5_93388936($_smarty_tpl);
$_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} C:\Users\regta001\Desktop\testGK\gatekeeper\forum\sites\default\themes\2k18\templates\forum\topic.tpl */
class Block_body_13800097759d7d66d1f50f5_93388936 extends Smarty_Internal_Block
{
public $name = 'body';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->blockNesting++;
?>


    <?php $_smarty_tpl->_assignInScope('safe_title', smarty_modifier_URL_safe($_smarty_tpl->tpl_vars['title']->value));
?>
    <?php $_smarty_tpl->_assignInScope('tid', $_smarty_tpl->tpl_vars['topic_info']->value['topic_id']);
?>
    <?php $_smarty_tpl->_assignInScope('cid', $_smarty_tpl->tpl_vars['topic_info']->value['cat_id']);
?>

    <div class="container-fluid top-custom-container-profile">
        <div class="container" style="padding-top:50px;">
            <div class="row">
                <div class="col-md-9" style="padding-left: 0">
                    <div id="breadcrumb" class="col-md-12">


                        <?php echo smarty_modifier_load_block("block_breadcrumbs_before");?>


                        <div class="codo_breadcrumb_list btn-breadcrumb hidden-xs">
                            <a href="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><div><i class="glyphicon glyphicon-home"></i></div></a>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parents']->value, 'crumb');
foreach ($_from as $_smarty_tpl->tpl_vars['crumb']->value) {
$_smarty_tpl->tpl_vars['crumb']->_loop = true;
$__foreach_crumb_0_saved = $_smarty_tpl->tpl_vars['crumb'];
?>
                                <a title="<?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
" data-placement="bottom" data-toggle="tooltip" href="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['crumb']->value['alias'];?>
"><div><?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
</div></a>                    
                                    <?php
$_smarty_tpl->tpl_vars['crumb'] = $__foreach_crumb_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                            &nbsp;
                        </div>


                        <select id="codo_breadcrumb_select" class="form-control hidden-sm hidden-md hidden-lg">
                            <option selected="selected" value=""><?php echo _t("Where am I ?");?>
</option>
                            <?php $_smarty_tpl->_assignInScope('space', "&nbsp;&nbsp;&nbsp;");
?>
                            <?php $_smarty_tpl->_assignInScope('indent', ((string)$_smarty_tpl->tpl_vars['space']->value));
?>

                            <option value="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['indent']->value;
echo $_smarty_tpl->tpl_vars['home_title']->value;?>
</option>

                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parents']->value, 'crumb');
foreach ($_from as $_smarty_tpl->tpl_vars['crumb']->value) {
$_smarty_tpl->tpl_vars['crumb']->_loop = true;
$__foreach_crumb_1_saved = $_smarty_tpl->tpl_vars['crumb'];
?>
                                <?php $_smarty_tpl->_assignInScope('indent', ((string)$_smarty_tpl->tpl_vars['indent']->value).((string)$_smarty_tpl->tpl_vars['space']->value));
?>
                                <option value="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['crumb']->value['alias'];?>
"><?php echo $_smarty_tpl->tpl_vars['indent']->value;
echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
</option>                   
                            <?php
$_smarty_tpl->tpl_vars['crumb'] = $__foreach_crumb_1_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </select>    
                        <?php echo smarty_modifier_load_block("block_breadcrumbs_after");?>
                
                    </div>

                    <div class="codo_topic_blockquote"><?php echo $_smarty_tpl->tpl_vars['topic_info']->value['cat_name'];?>
</div>
                    <div class="codo_topic_top_title"><?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES);?>
</div>

                    <?php if ($_smarty_tpl->tpl_vars['tags']->value) {?>
                        <div class="codo_statistic_block_topic">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
$__foreach_tag_2_saved = $_smarty_tpl->tpl_vars['tag'];
?>
                                <a href="<?php echo @constant('RURI');?>
tags/<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</a>
                            <?php
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_2_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                        </div>
                    <?php }?>

                </div>
            </div>		
        </div>
    </div>

    <!--<div id="breadcrumb" class="col-md-12">


    <?php echo smarty_modifier_load_block("block_breadcrumbs_before");?>


    <div class="codo_breadcrumb_list btn-breadcrumb hidden-xs">
        <a href="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><div><i class="glyphicon glyphicon-home"></i></div></a>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parents']->value, 'crumb');
foreach ($_from as $_smarty_tpl->tpl_vars['crumb']->value) {
$_smarty_tpl->tpl_vars['crumb']->_loop = true;
$__foreach_crumb_3_saved = $_smarty_tpl->tpl_vars['crumb'];
?>
        <a title="<?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
" data-placement="bottom" data-toggle="tooltip" href="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['crumb']->value['alias'];?>
"><div><?php echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
</div></a>                    
    <?php
$_smarty_tpl->tpl_vars['crumb'] = $__foreach_crumb_3_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
&nbsp;
</div>


<select id="codo_breadcrumb_select" class="form-control hidden-sm hidden-md hidden-lg">
<option selected="selected" value=""><?php echo _t("Where am I ?");?>
</option>
    <?php $_smarty_tpl->_assignInScope('space', "&nbsp;&nbsp;&nbsp;");
?>
    <?php $_smarty_tpl->_assignInScope('indent', ((string)$_smarty_tpl->tpl_vars['space']->value));
?>

    <option value="<?php echo @constant('RURI');
echo $_smarty_tpl->tpl_vars['site_url']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['indent']->value;
echo $_smarty_tpl->tpl_vars['home_title']->value;?>
</option>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['parents']->value, 'crumb');
foreach ($_from as $_smarty_tpl->tpl_vars['crumb']->value) {
$_smarty_tpl->tpl_vars['crumb']->_loop = true;
$__foreach_crumb_4_saved = $_smarty_tpl->tpl_vars['crumb'];
?>
        <?php $_smarty_tpl->_assignInScope('indent', ((string)$_smarty_tpl->tpl_vars['indent']->value).((string)$_smarty_tpl->tpl_vars['space']->value));
?>
        <option value="<?php echo @constant('RURI');?>
category/<?php echo $_smarty_tpl->tpl_vars['crumb']->value['alias'];?>
"><?php echo $_smarty_tpl->tpl_vars['indent']->value;
echo $_smarty_tpl->tpl_vars['crumb']->value['name'];?>
</option>                   
    <?php
$_smarty_tpl->tpl_vars['crumb'] = $__foreach_crumb_4_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</select>    
    <?php echo smarty_modifier_load_block("block_breadcrumbs_after");?>
                
</div>-->

    <div class="container" style="padding:0px;">
        <?php if ($_smarty_tpl->tpl_vars['topic_is_spam']->value) {?>
            <div class="codo_spam_alert alert alert-warning"><b><?php echo _t('NOTE: ');?>
</b><?php echo _t('This topic is marked as spam and is hidden from public view.');?>
</div>
                <?php }?>

        <div class="row">

            <div class="codo_posts col-md-9">

                <?php echo smarty_modifier_load_block("block_posts_before");?>

                <div class="codo_widget">
                    <!--<div class="codo_widget-header" id="codo_head_title">
                        <div class="row">
                            <div class="codo_topic_title">
                                <a href="<?php echo @constant('RURI');?>
topic/<?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['safe_title']->value;?>
">
                                    <h1><div class="codo_widget_header_title"><?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['title']->value, ENT_QUOTES);?>
</div></h1>
                                </a>
                            </div>
                            <div id="codo_topic_title_pagination" class="codo_head_navigation">
                    <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

                </div>
            </div>
        </div>-->


                    <div style="display: none" id="codo_no_topics_display" class="codo_no_topics"><?php echo _t("No posts to display");?>
</div>

                    <div id="codo_posts_container" class="codo_widget-content">

                        <?php if ($_smarty_tpl->tpl_vars['poll']->value && $_smarty_tpl->tpl_vars['poll']->value['isActive'] == 1) {?>    
                            <article class="clearfix poll_container" id="poll_<?php echo $_smarty_tpl->tpl_vars['poll']->value['id'];?>
">
                                <?php if ($_smarty_tpl->tpl_vars['poll']->value['hasVoted'] || $_smarty_tpl->tpl_vars['poll']->value['viewWithoutVote']) {?>
                                    <div class="poll_result" style="display: <?php if ($_smarty_tpl->tpl_vars['poll']->value['hasVoted']) {?>block<?php } else { ?>none<?php }?>">
                                        <div class="poll_title"><b><?php echo _t("Poll Result: ");?>
</b><?php echo $_smarty_tpl->tpl_vars['poll']->value['title'];?>
</div>
                                        <div class="poll_options">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['poll']->value['options'], 'option');
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
$__foreach_option_5_saved = $_smarty_tpl->tpl_vars['option'];
?>
                                                <div class="poll_option">
                                                    <div class="poll_option_label">
                                                        <div class="poll_option_name"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_name'];?>
</div>
                                                        <span class="poll_option_count"><?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['option']->value['num_votes']);?>
&nbsp;<?php echo _t("votes");?>
</span>
                                                    </div>
                                                    <div class="poll_option_bar">
                                                        <div class="poll_option_fill" style="width:<?php echo $_smarty_tpl->tpl_vars['option']->value['percent'];?>
%"><?php echo $_smarty_tpl->tpl_vars['option']->value['percent'];?>
%</div>                                                            
                                                    </div>
                                                </div>
                                            <?php
$_smarty_tpl->tpl_vars['option'] = $__foreach_option_5_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                                        </div>     
                                        
                                        <?php if ($_smarty_tpl->tpl_vars['poll']->value['canRecast']) {?>
                                            <div class="poll_footer">
                                                <div class="codo_btn" id="codo_poll_revote_btn"><?php echo _t("Cast Vote");?>
</div>
                                            </div>               
                                        <?php }?>
                                    </div>
                                <?php }?>
                                <div class="poll_vote" style="display: <?php if (!$_smarty_tpl->tpl_vars['poll']->value['hasVoted']) {?>block<?php } else { ?>none<?php }?>">                                
                                    <div class="poll_left_section">
                                        <i class="poll_icon glyphicon glyphicon-question-sign"></i>
                                    </div>
                                    <div class="poll_right_section col-md-10 col-xs-12">
                                        <div class="poll_title"><b><?php echo _t("Poll: ");?>
</b><?php echo $_smarty_tpl->tpl_vars['poll']->value['title'];?>
</div>

                                        <div class="poll_options">
                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['poll']->value['options'], 'option');
foreach ($_from as $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
$__foreach_option_6_saved = $_smarty_tpl->tpl_vars['option'];
?>
                                                <div id="poll_option_<?php echo $_smarty_tpl->tpl_vars['option']->value['id'];?>
" title="<?php echo _t("Click to select this option");?>
" class="poll_option"><?php echo $_smarty_tpl->tpl_vars['option']->value['option_name'];?>
</div>
                                            <?php
$_smarty_tpl->tpl_vars['option'] = $__foreach_option_6_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                                        </div>
                                        <div class="poll_footer">
                                            <div class="codo_btn" id="codo_poll_vote_btn"><?php echo _t("Vote");?>
</div>
                                            <?php if ($_smarty_tpl->tpl_vars['poll']->value['viewWithoutVote']) {?>
                                                <div id="codo_poll_view_result_btn" class="codo_btn codo_btn_approve"><?php echo _t("View result");?>
</div>
                                            <?php }?>   
                                            <img id="codo_vote_loading" src="<?php echo @constant('CURR_THEME');?>
img/ajax-loader.gif" />
                                        </div>

                                    </div>

                                </div>
                            </article>
                        <?php }?>

                        <?php echo $_smarty_tpl->tpl_vars['posts']->value;?>

                        <?php if ($_smarty_tpl->tpl_vars['num_pages']->value > 1) {?>
                            <div class="codo_topics_pagination">

                                <?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

                            </div>
                        <?php }?>

                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="codo_topic" id="codo_topic_sidebar">
                    <?php echo smarty_modifier_load_block("block_topic_info_before");?>


                    <div class="codo_topic_statistics codo_sidebar_fixed_els row">

                        <div class="codo_cat_num col-xs-4">
                            <i class="icon icon-eye2" style="color:#00b147;font-size:20px;padding-top: 2px;"></i>
                            <div class="codo_topic_views codo-topic-right" data-number="<?php echo $_smarty_tpl->tpl_vars['topic_info']->value['no_views'];?>
">
                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['topic_info']->value['no_views']);?>

                            </div>

                        </div>
                        <div class="codo_cat_num col-xs-4">
                            <i class="icon icon-message" style="color:#0097f6;font-size:20px;padding-top: 2px;"></i>
                            <div class="codo-topic-right">
                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['topic_info']->value['no_replies']);?>

                            </div>

                        </div>
                        <div class="codo_cat_num col-xs-4">
                            <i class="glyphicon glyphicon-stats" style="font-size:20px;color:#5a7fee;"></i>
                            <div class="codo-topic-right">
                                <?php echo smarty_modifier_abbrev_no($_smarty_tpl->tpl_vars['no_followers']->value);?>

                            </div>

                        </div>

                    </div>

                    <!--<?php if ($_smarty_tpl->tpl_vars['can_search']->value) {?>    
                        <div class="codo_sidebar_search">
                            <input type="text" placeholder="<?php echo _t('Search');?>
" class="form-control codo_topics_search_input" />
                            <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                        </div>
                    <?php }?>-->


                        <!--<?php if ($_smarty_tpl->tpl_vars['tags']->value) {?>
                            <div class="codo_statistic_block">
                                <ul class="codo_tags">
        
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tags']->value, 'tag');
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
$__foreach_tag_7_saved = $_smarty_tpl->tpl_vars['tag'];
?>
                            <li ><a href="<?php echo @constant('RURI');?>
tags/<?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value;?>
</a></li>
                        <?php
$_smarty_tpl->tpl_vars['tag'] = $__foreach_tag_7_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
                </ul>
            </div>
                        <?php }?>-->
                            <?php if ($_smarty_tpl->tpl_vars['logged_in']->value) {?>
                                <?php $_smarty_tpl->_subTemplateRender("file:forum/notification_level.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                            <?php }?>

                            <div class="codo_sidebar_fixed">

                                <?php if ($_smarty_tpl->tpl_vars['can_search']->value) {?>
                                    <div id="codo_sidebar_fixed_search" class="codo_sidebar_search codo_sidebar_fixed_els">
                                        <input type="text" placeholder="<?php echo _t('Search');?>
" class="form-control codo_topics_search_input" />
                                        <i class="glyphicon glyphicon-search codo_topics_search_icon" title="Advanced search" ></i>
                                    </div>
                                <?php }?>

                            </div>


                            <?php if ($_smarty_tpl->tpl_vars['is_closed']->value) {?>
                                <div class="codo_topic_side_div codo_topic_closed">

                                    <?php echo _t('This topic is closed');?>

                                </div>
                            <?php }?>


                            <?php echo smarty_modifier_load_block("block_topic_info_after");?>

                        </div>	

                        <?php if ($_smarty_tpl->tpl_vars['can_reply']->value) {?>
                            <div style="clear:both;width:100%;">
                                <button id="codo_reply_btn" type="submit" class="codo_btn codo_reply_btn codo_can_reply codo_btn_primary" style="width:100%;padding: 14px;"><?php echo _t('Reply');?>
</button>
                            </div>
                        <?php }?>

                    </div>



                </div>
                <div id="codo_new_reply" class="codo_new_reply">

                    <div class="codo_reply_resize_handle"></div>
                    <form id="codo_new_reply_post" action="/" method="POST">

                        <div class="codo_reply_box" id="codo_reply_box">
                            <textarea placeholder="<?php echo _t('Start typing here . You can use BBcode or Markdown');?>
" id="codo_new_reply_textarea" name="input_text"></textarea>
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
                            <button class="codo_btn" id="codo_post_new_reply"><i class="icon-check"></i><span class="codo_action_button_txt"><?php echo _t("Post");?>
</span></button>
                            <button class="codo_btn codo_btn_def" id="codo_post_cancel"><i class="icon-times"></i><span class="codo_action_button_txt"><?php echo _t("Cancel");?>
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
                        <input type="text" class="end-of-line" name="end_of_line" id="end_of_line" />
                    </form>

                </div>

                <?php $_smarty_tpl->_subTemplateRender("file:forum/editor.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

            </div>

            <div id="codo_topics_multiselect" class="codo_topics_multiselect">

                <?php ob_start();
echo _t("With");
$_prefixVariable1=ob_get_clean();
echo $_prefixVariable1;?>
 <span id="codo_number_selected"></span> <?php ob_start();
echo _t("selected");
$_prefixVariable2=ob_get_clean();
echo $_prefixVariable2;?>
 

                <span class="codo_multiselect_deselect codo_btn codo_btn_sm codo_btn_def" id="codo_multiselect_deselect"><?php ob_start();
echo _t("deselect posts");
$_prefixVariable3=ob_get_clean();
echo $_prefixVariable3;?>
</span>
                <span style="margin-right: 4px;" class="codo_multiselect_deselect codo_btn codo_btn_sm codo_btn_def" id="codo_multiselect_show_selected"><?php ob_start();
echo _t("show selected posts");
$_prefixVariable4=ob_get_clean();
echo $_prefixVariable4;?>
</span>
                <select class="form-control" id="codo_topics_multiselect_select">
                    <option value="nothing"><?php ob_start();
echo _t("Select action");
$_prefixVariable5=ob_get_clean();
echo $_prefixVariable5;?>
</option>
                    <optgroup label="<?php ob_start();
echo _t("Actions");
$_prefixVariable6=ob_get_clean();
echo $_prefixVariable6;?>
">
                        <option id="move_post_option" value="move"><?php ob_start();
echo _t("Move posts");
$_prefixVariable7=ob_get_clean();
echo $_prefixVariable7;?>
</option>    
                    </optgroup>

                </select>
            </div>


            
            <div class="modal fade" id='codo_check_show_selected_posts_modal'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header-info">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title"><?php echo _t("Selected posts");?>
</h4>
                        </div>
                        <div class="modal-body">

                            <b><?php echo _t("Topic: ");?>
</b> <span id="codo_check_selected_posts_modal_title"></span>
                            <br/><br/>
                            <b><?php echo _t("Selected posts: ");?>
</b><br/>
                            <ul id="codo_check_new_posts_modal_list"></ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Close");?>
</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            
            <div class="modal fade" id='codo_move_posts_confirm'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header-primary">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title"><?php echo _t("Confirm move posts");?>
</h4>
                        </div>
                        <div class="modal-body">

                            <div style="display: none" id="codo_move_posts_confirm_moving_main_post">
                                <?php echo _t("One of the posts you selected ");?>

                                <?php echo _t("is the main post of the topic, moving this post ");?>
<br/>
                                <?php echo _t("will make the oldest non-moved post of ");?>
                        
                                <span class="codo_move_posts_confirm_old_topic"></span> <br/>                
                                <?php echo _t(" as the main topic post");?>
<br/>
                                <hr/>
                            </div>

                            <div style="display: none" id="codo_move_posts_confirm_deleting_old_topic">
                                <?php echo _t("You have selected all the posts from the topic, hence after moving");?>
<br/>
                                <span class="codo_move_posts_confirm_old_topic"></span> <br/>                
                                <?php echo _t("will be deleted");?>
<br/>
                                <hr/>
                            </div>



                            <?php echo _t("Are you sure you want to move ");?>

                            <span id="codo_move_posts_confirm_number"></span>                   
                            <?php echo _t(" post(s) from the topic ");?>
<br/>
                            <span class="codo_move_posts_confirm_old_topic"></span> <br/>                
                            <?php echo _t("to the topic ");?>
<br/>
                            <span id="codo_move_posts_confirm_new_topic"></span>                   
                            <?php echo _t(" ?");?>

                        </div>
                        <div class="modal-footer">
                            <div class="codo_load_more_bar_blue_gif"><?php echo _t("Moving...");?>
</div>
                            <button id="codo_move_posts_confirm_yes" type="button" class="btn btn-primary"><?php echo _t("Yes");?>
</button>                    
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("No");?>
</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            
            <div class="modal fade" id='codo_cannot_move_posts_this_topic'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header-warning">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title"><?php echo _t("Insufficient permissions");?>
</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo _t("You do not have permission to move posts to this category.");?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Close");?>
</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            
            <div class="modal fade" id='codo_cannot_move_posts_same_topic'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header-warning">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title"><?php echo _t("Select a different topic");?>
</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo _t("You cannot move posts to the same topic.");?>

                            <br/>
                            <?php echo _t("Please go to a different topic.");?>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Close");?>
</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            
            <div class="modal fade" id='codo_check_new_posts_modal'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header-warning">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title"><?php echo _t("Confirm selection");?>
</h4>
                        </div>
                        <div class="modal-body">

                            <?php echo _t("Are you sure you want to check this post ?");?>

                            <br/>
                            <?php echo _t("If you click 'Yes', your selection for the topic ");?>
 
                            <b><span id="codo_check_new_posts_modal_title"></span></b>
                                <?php echo _t(" will be cleared");?>

                        </div>
                        <div class="modal-footer">
                            <button id="codo_check_new_posts_modal_btn_yes" type="button" class="btn btn-primary" data-dismiss="modal"><?php echo _t("Yes");?>
</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("No");?>
</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            
            <div class="modal fade" id='codo_history_modal'>
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title"><?php echo _t("Edit history");?>
</h4>
                        </div>
                        <div class="modal-body">

                            <div id="codo_history_table"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo _t("Close");?>
</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div id='codo_delete_topic_confirm_html'>
                <div class='codo_posts_topic_delete'>
                    <div class='codo_content'>
                        <?php echo _t("All posts under this topic will be ");?>
<b><?php echo _t("deleted");?>
</b> ?
                        <br/>

                        <div class="codo_consider_as_spam codo_spam_checkbox">
                            <input id="codo_spam_checkbox" name="spam" type="checkbox" checked="">
                            <label class="codo_spam_checkbox" for="spam"><?php echo _t('Mark as spam');?>
</label>
                        </div>
                    </div>
                    <div class="codo_modal_footer">
                        <div class="codo_btn codo_btn_def codo_modal_delete_topic_cancel"><?php echo _t("Cancel");?>
</div>
                        <div class="codo_btn codo_btn_primary codo_modal_delete_topic_submit"><?php echo _t("Delete");?>
</div>
                    </div>
                    <div class="codo_spinner"></div>
                </div>
            </div>
            <div id = "alert_placeholder"></div>

            <?php echo '<script'; ?>
>

                CODOFVAR = {
                    tid: <?php echo $_smarty_tpl->tpl_vars['tid']->value;?>
,
                    cid: <?php echo $_smarty_tpl->tpl_vars['cid']->value;?>
,
                    post_id: <?php echo $_smarty_tpl->tpl_vars['topic_info']->value['post_id'];?>
,
                    cat_alias: '<?php echo $_smarty_tpl->tpl_vars['topic_info']->value['cat_alias'];?>
',
                    title: '<?php echo $_smarty_tpl->tpl_vars['safe_title']->value;?>
',
                    full_title: '<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
',
                    curr_page: <?php echo $_smarty_tpl->tpl_vars['curr_page']->value;?>
,
                    num_pages: <?php echo $_smarty_tpl->tpl_vars['num_pages']->value;?>
,
                    num_posts: <?php echo $_smarty_tpl->tpl_vars['topic_info']->value['no_posts'];?>
,
                    url: '<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
',
                    new_page: '<?php echo $_smarty_tpl->tpl_vars['new_page']->value;?>
',
                    smileys: JSON.parse('<?php echo $_smarty_tpl->tpl_vars['forum_smileys']->value;?>
'),
                    reply_min_chars: parseInt(<?php echo $_smarty_tpl->tpl_vars['reply_min_chars']->value;?>
),
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

                    },
                    trans: {
                        continue_mesg: '<?php echo _t("Continue");?>
'
                    },
                    deleted_msg: '<?php echo _t("The post has been ");?>
',
                    deleted: '<?php echo _t("deleted");?>
',
                    undo_msg: '<?php echo _t("undo");?>
',
                    search_data: '<?php echo $_smarty_tpl->tpl_vars['search_data']->value;?>
'
                }

                <?php if ($_smarty_tpl->tpl_vars['poll']->value) {?>
                CODOFVAR.hasVoted = "<?php echo $_smarty_tpl->tpl_vars['poll']->value['hasVoted'];?>
";
                <?php } else { ?>
                CODOFVAR.hasVoted = "0";
                <?php }?>
            <?php echo '</script'; ?>
>

            <link rel="stylesheet" type="text/css" href="<?php echo @constant('DURI');?>
assets/markitup/highlight/styles/github.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo @constant('DURI');?>
assets/dropzone/css/basic.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo @constant('DURI');?>
assets/oembedget/oembed-get.css" />

            <?php
$_smarty_tpl->ext->_inheritance->blockNesting--;
}
}
/* {/block 'body'} */
}
