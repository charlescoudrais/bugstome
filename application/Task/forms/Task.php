<?php
class Task_Form_Task extends Zend_Form
{
    public function init()
    {
        $taskId          = new Zend_Form_Element_Hidden('hid_task_id');
        $taskName        = new Zend_Form_Element_Text('inp_task_name');
        $taskStartDate   = new Zend_Form_Element_Text(
                    'inp_task_start_datepicker'
                );
        $taskEndDate     = new Zend_Form_Element_Text(
                    'inp_task_end_datepicker'
                );
        $taskManager     = new Zend_Form_Element_Select(
                    'sel_task_manager'
                );
        $taskDescription = new Zend_Form_Element_Textarea(
                    'tarea_task_description'
                );
        $taskSubmit      = new Zend_Form_Element_Submit(
                    'submit_task_form'
                );
        
        $taskName->setRequired(true)
                    ->addFilter(new Zend_Filter_StripTags())
                    ->addValidator(
                       new Zend_Validate_StringLength(
                           array('min' => 1, 'max' => 50)
                       )
                    );
        $taskStartDate->setRequired(true)->setAttrib('class', 'datepicker')
                    ->addFilter(new Zend_Filter_StripTags())
                    ->addValidator(
                       //@TODO: date format
                       //array('format' => 'YYYY-MM-DD')
                       new Zend_Validate_Date()
                    );
        $taskEndDate->setRequired(false)->setAttrib('class', 'datepicker')
                    ->addFilter(new Zend_Filter_StripTags())
                    ->addValidator(
                       new Zend_Validate_Date(array())
                    );
        $taskManager->setMultiOptions(array('User 1', 'User 2', 'User 3'));
        $taskDescription->addFilter(new Zend_Filter_StripTags());
        
        $this->addElement($taskId);
        $this->addElement($taskName);
        $this->addElement($taskStartDate);
        $this->addElement($taskEndDate);
        $this->addElement($taskManager);
        $this->addElement($taskDescription);
        $this->addElement($taskSubmit);
    }
}
