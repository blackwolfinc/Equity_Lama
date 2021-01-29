<?php
// $Id$

/**
 * @file
 * MyLiveChat module admin panel
 */

function mylivechat_admin_settings_form($form_state) {
  global $language, $base_url;

  $mylivechat = mylivechat::get_instance();
  $mylivechat->include_admin_js();

  /**
   * MyLiveChat code notification  
 */
  if ($mylivechat->is_installed()) {
    if ($mylivechat->chat_button_installed()) {
      $form['live_chat'] = array
      (
        '#type' => 'item',
        '#markup' => t('<div class="messages status">MyLiveChat "Click-to-chat" button/box/link is installed properly.</div>')
      );
    }
    else {
      $form['live_chat'] = array
      (
        '#type' => 'item',
        '#markup' => t('<div class="messages warning">You should install the MyLiveChat.<br />Please activate the "MyLiveChat" block in !url (see the "Disabled" section).</div>', array('!url' => l(t('Structure') . ' > ' . t('Blocks'), $base_url . '/admin/structure/block')))
      );
    }
  }
  else
  {
	$form['choose_form'] = array
	  (
		'#type' => 'fieldset',
		'#collapsible' => FALSE,
		'#prefix' => '<div><h3>Already have a MyLiveChat account?</h3>',
		'#suffix' => '</div>'
	  );
	 $form['choose_form']['content'] = array
	  (
		'#type' => 'item',
		'#markup' =>
		  '<ul style="list-style: none;">'.
		  '<li><input type="radio" name="choose_form" id="choose_form_1" checked="checked" onclick="MyLiveChat_Show_Setting();"> <label for="choose_form_1" style="display: inline;">Yes, I already have a MyLiveChat account</label></li>'.
		  '<li><input type="radio" name="choose_form" id="choose_form_0" onclick="MyLiveChat_Show_Signup();"> <label for="choose_form_0" style="display: inline;">No, I want to create one</label></li>'.
		  '</ul>'
	  );
	
	  // New account form
	  $form['new_account'] = array
	  (
		'#type' => 'fieldset',
		'#collapsible' => FALSE,
		'#prefix' => '<div id="Cont_MyLiveChat_Signup" style="display:none;"><h3>Create a new MyLiveChat account</h3>',
		'#suffix' => '</div>'
	  );
	  $form['new_account']['email'] = array
	  (
		'#type' => 'textfield',
		'#title' => t('Email'),
		'#size' => 30,
		'#maxlength' => 70,
		'#required' => FALSE // handled by JavaScript validator
	  );
	  $form['new_account']['password'] = array
	  (
		'#type' => 'password',
		'#title' => t('Password'),
		'#size' => 30,
		'#maxlength' => 100,
		'#required' => FALSE // handled by JavaScript validator
	  );
	  $form['new_account']['password_retype'] = array
	  (
		'#type' => 'password',
		'#title' => t('Retype Password'),
		'#size' => 30,
		'#maxlength' => 100,
		'#required' => FALSE // handled by JavaScript validator
	  );
	  $form['new_account']['firstname'] = array
	  (
		'#type' => 'textfield',
		'#title' => t('First Name'),
		'#size' => 30,
		'#maxlength' => 60,
		'#required' => FALSE // handled by JavaScript validator
	  );
	  $form['new_account']['lastname'] = array
	  (
		'#type' => 'textfield',
		'#title' => t('Last Name'),
		'#size' => 30,
		'#maxlength' => 60,
		'#required' => FALSE // handled by JavaScript validator
	  );
	  $form['new_account']['ajax_message'] = array
	  (
		'#type' => 'item',
		'#markup' => '<p class="ajax_message"></p>'
	  );
  }



	 $form['general'] = array
	  (
		'#type' => 'fieldset',
		'#collapsible' => FALSE,
		'#prefix' => '<div id="Cont_MyLiveChat_Setting"><h3>MyLiveChat Settings</h3>',
		'#suffix' => '</div>'
	  );
	  $form['general']['mylivechat_id'] = array(
		'#type' => 'textfield',
		'#title' => t('MyLiveChat ID'),
		'#size' => '10',
		'#maxlength' => 8,
		'#default_value' => variable_get('mylivechat_id',''),
		'#required' => 1,
		'#description' => t('Click the link below to get your free MyLiveChat account.<br/>!url', array('!url' => l('Don\'t have MyLiveChat account? Get it for free!', 'https://www.mylivechat.com/register.aspx')))
	  );
	  $form['general']['mylivechat_displaytype'] = array(
		'#type' => 'select',
		'#title' => t('Display Type'),
		'#options' => Array(
		       'inline' => 'Inline Chat',
		       'button' => 'Chat Button',
		       'box' => 'Chat Box',
		       'link' => 'Chat Text Link',
		       'widget' => 'Chat Widget'
		),
		'#default_value' => variable_get('mylivechat_displaytype','inline'),
		'#description' => t('Choose MyLiveChat display type.')
	  );	  
	  $form['general']['mylivechat_membership'] = array(
		'#type' => 'select',
		'#title' => t('Integrate User'),
		'#options' => Array(
		       'yes' => 'Yes',
		       'no' => 'No'
		),
		'#default_value' => variable_get('mylivechat_membership','no'),
		'#description' => t('Integrate Drupal Membership with MyLiveChat.')
	  );
	  $form['general']['mylivechat_encrymode'] = array(
		'#type' => 'select',
		'#title' => t('Encryption Mode'),
		'#options' => Array(
		       'none' => 'None',
		       'basic' => 'Basic'
		),
		'#default_value' => variable_get('mylivechat_encrymode','none'),
		'#description' => t('Select an encryption mode.')
	  );
	  $form['general']['mylivechat_encrykey'] = array(
		'#type' => 'textfield',
		'#title' => t('Encryption Key'),
		'#size' => '10',
		'#default_value' => variable_get('mylivechat_encrykey',''),
		'#description' => t('Set an encryption key with a length greater <b>8</b>. The encryption key is used to create a secure connection between your customization code and MyLiveChat server, and to avoid man-in-the-middle attacks.<br/><b>Encryption key used must be the same as key in MyLiveChat control panel</b>')
	  );

	return system_settings_form($form);
}

function mylivechat_admin_settings_form_validate($form, &$data) {
  $mylivechat = mylivechat::get_instance();

  // Check if "Reset" button has been clicked
  if (isset($data['input']) && isset($data['input']['op']) && $data['input']['op'] === 'Reset settings')
  {
    $mylivechat->reset_settings();
  }
  else
  {
	  /**
	   * Form validation
	   */
	  if ($mylivechat->validate_id($data['input']['mylivechat_id']) == FALSE) {
		form_set_error('mylivechat_id', t('MyLiveChat ID is incorrect.'));
	  }

	  variable_set('mylivechat_id', $data['input']['mylivechat_id']);
	  variable_set('mylivechat_encrykey', $data['input']['mylivechat_encrykey']);
	  variable_set('mylivechat_displaytype', $data['input']['mylivechat_displaytype']);
	  variable_set('mylivechat_membership', $data['input']['mylivechat_membership']);
	  variable_set('mylivechat_encrymode', $data['input']['mylivechat_encrymode']);
  }
}