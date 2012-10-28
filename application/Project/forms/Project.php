<?php
class Project_Form_Project extends Zend_Form
{
    public function init()
    {
        $projectId          = new Zend_Form_Element_Hidden('hid_project_id');
        $projectName        = new Zend_Form_Element_Text('inp_project_name');
        $projectManager     = new Zend_Form_Element_Select(
                    'sel_project_manager'
                );
        $projectDescription = new Zend_Form_Element_Textarea(
                    'tarea_project_description'
                );
        $projectSubmit      = new Zend_Form_Element_Submit(
                    'submit_project_form'
                );
        
        $projectName->setRequired(true)
                    ->addFilter(new Zend_Filter_StripTags())
                    ->addValidator(
                       new Zend_Validate_StringLength(
                           array('min' => 1, 'max' => 50)
                       )
                    );
        $projectManager->setMultiOptions(array('User 1', 'User 2', 'User 3'));
        $projectDescription->addFilter(new Zend_Filter_StripTags());
        
        $this->addElement($projectId);
        $this->addElement($projectName);
        $this->addElement($projectManager);
        $this->addElement($projectDescription);
        $this->addElement($projectSubmit);
    }
}
