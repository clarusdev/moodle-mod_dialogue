<?php
require_once ($CFG->dirroot.'/course/moodleform_mod.php');

class mod_dialogue_mod_form extends moodleform_mod {

    function definition() {
    
        $mform    =& $this->_form;

//-------------------------------------------------------------------------------
        $mform->addElement('header', 'general', get_string('general', 'form'));

        $mform->addElement('text', 'name', get_string("dialoguename", "dialogue"), array('size'=>'64'));
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');

        $mform->addElement('htmleditor', 'intro', get_string("dialogueintro", "dialogue"));
        $mform->setType('intro', PARAM_CLEANHTML);
        $mform->addRule('intro', null, 'required', null, 'client');
        $mform->setHelpButton('intro', array('writing', 'questions', 'richtext'), false, 'editorhelpbutton');

       
        $options = array();
        $options[0] =  get_string('no'); 
        $options[1] = get_string('yes');
        
        $mform->addElement('select', 'multipleconversations', get_string("allowmultiple", "dialogue"), $options);
        $mform->setHelpButton('multipleconversations', array('multiple', get_string("allowmultiple", "dialogue"), 'dialogue', 'allowmultiple'));

        $options = array (0 => 0, 7 => 7, 14 => 14, 30 => 30, 150 => 150, 365 => 365 );
        $mform->addElement('select', 'deleteafter', get_string("deleteafter", "dialogue"), $options);
        $mform->setHelpButton('deleteafter', array('deleteafter', get_string("deleteafter", "dialogue"), 'dialogue', 'deleteafter'));
        $mform->setAdvanced('deleteafter');

        $options = array();
        $options[0] =  get_string('no'); 
        $options[1] = get_string('yes');
        
        $mform->addElement('select', 'maildefault', get_string("mailnotification", "dialogue"), $options);
        $mform->setHelpButton('maildefault', array('maildefault', get_string("mailnotification", "dialogue"), 'dialogue', 'maildefault'));
        $mform->setAdvanced('maildefault');

        $options = array();
        $options[0] =  get_string("teachertostudent", "dialogue"); 
        $options[1] =  get_string("studenttostudent", "dialogue"); 
        $options[2] =  get_string("everybody", "dialogue"); 
        $mform->addElement('select', 'dialoguetype', get_string("typeofdialogue", "dialogue"), $options);
        $mform->setType('dialoguetype', PARAM_INT);
        $mform->setDefault('dialoguetype', 0);
        $mform->setHelpButton('dialoguetype', array('dialoguetype', get_string("typeofdialogue", "dialogue"), 'dialogue', 'dialoguetype'));
        $mform->setAdvanced('dialoguetype');

        $mform->addElement('text', 'edittime', get_string("edittime", "dialogue"), array('size'=>'4'));
        $mform->setType('edittime', PARAM_INT);
        $mform->setDefault('edittime', 30);
        $mform->setHelpButton('edittime', array('edittime', get_string("edittime", "dialogue"), 'dialogue', 'edittime'));
        $mform->setAdvanced('edittime');
        


//-------------------------------------------------------------------------------
        $features = new stdClass;
        $features->groups = true;
        $features->groupings = true;
        $features->groupmembersonly = true;
        $this->standard_coursemodule_elements($features);
//-------------------------------------------------------------------------------
        $this->add_action_buttons();
    }
}
?>