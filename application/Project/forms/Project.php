<?php
class Project_Form_Project extends Zend_Form
{
    public function init()
    {
        $projectId          = new Zend_Form_Element_Hidden('hid_project_id');
        $projectName        = new Zend_Form_Element_Text('inp_project_name');
        $projectStartDate   = new Zend_Form_Element_Text(
                    'inp_project_start_datepicker'
                );
        $projectEndDate     = new Zend_Form_Element_Text(
                    'inp_project_end_datepicker'
                );
        $projectUser        = new Zend_Form_Element_Select(
                    'sel_project_manager'
                );
        $projectPriority    = new Zend_Form_Element_Select(
                    'sel_project_priority'
                );
        $projectDescription = new Zend_Form_Element_Textarea(
                    'tarea_project_description'
                );
//        $projectDescription->setOptions(array('cols' => '4', 'rows' => '4'));
                  
        $projectSubmit      = new Zend_Form_Element_Submit(
                    'submit_project_form'
                );
        $projectSubmitFalse = new Zend_Form_Element_Hidden(
                    'hid_submit_false'
                );
        
        $projectName->setRequired(true)
                    ->addFilter(new Zend_Filter_StripTags())
                    ->addValidator(
                       new Zend_Validate_StringLength(
                           array('min' => 1, 'max' => 50)
                       )
                    );
//        $projectStartDate->setRequired(true)->setAttrib('class', 'datepicker')
//                    ->addFilter(new Zend_Filter_StripTags())
//                    ->addValidator(
//                       new Zend_Validate_Date()
//                    );
        $projectEndDate->setRequired(false)->setAttrib('class', 'datepicker')
                    ->addFilter(new Zend_Filter_StripTags())
                    ->addValidator(
                       //@TODO: date format
                       //array('format' => 'YYYY-MM-DD')
                       new Zend_Validate_Date('dd-mm-yy')
                    );
        
//        $projectUser->setMultiOptions(
//                        array(
//                                1 => 'User 1',
//                                2 => 'User 2',
//                                3 => 'User 3'
//                            )
//                    );
//        $projectPriority->setMultiOptions(
//                array(
//                    1 => 'Low',
//                    2 => 'Normal',
//                    3 => 'Urgent'
//                    )
//                );
        $projectDescription->addFilter(new Zend_Filter_StripTags());
        
        $this->addElement($projectId);
        $this->addElement($projectName);
        $this->addElement($projectUser);
        $this->addElement($projectStartDate);
        $this->addElement($projectEndDate);
//        $this->addElement($projectPriority);
        $this->addElement($projectDescription);
        $this->addElement($projectSubmitFalse);
        $this->addElement($projectSubmit);
      
    }
}
