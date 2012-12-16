<?php
class Task_Model_Task
{
    /**
     *
     * @var int 
     */
    private $taskId;
    /**
     *
     * @var string 
     */
    private $taskName;
    /**
     *
     * @var Zend_Date
     */
    private $taskStart;
    /**
     *
     * @var Zend_Date 
     */
    private $taskEnd;
    /**
     *
     * @var int 
     */
    private $taskManager;
    /**
     *
     * @var int 
     */
    private $taskPriority;
    /**
     *
     * @var int 
     */
    private $taskProject;
    /**
     *
     * @var string 
     */
    private $taskDescription;
    /**
     *
     * @var Task_Model_Mapper_Task 
     */
    private $taskMapper;


    /**
     * 
     * @return type
     */
    public function getTaskId()
    {
        return $this->taskId;
    }
    

    public function setTaskId($taskId)
    {
        $this->taskId = $taskId;
        return $this;
    }

    public function getTaskName()
    {
        return $this->taskName;
    }

    public function setTaskName($taskName)
    {
        $this->taskName = $taskName;
        return $this;
    }
    
    public function getTaskStart()
    {
        return $this->taskStart;
    }
    
    /**
     * 
     * @param string $taskStart
     * @return Task_Model_Task
     */
    public function setTaskStart($taskStart)
    {
        $this->taskStart = new Zend_Date($taskStart);
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getTaskEnd()
    {
        return $this->taskEnd;
    }
    
    /**
     * 
     * @param string $taskEnd
     * @return Task_Model_Task
     */
    public function setTaskEnd($taskEnd)
    {
        $this->taskEnd = new Zend_Date($taskEnd);
        return $this;
    }
    
    /**
     * 
     * @return int
     */
    public function getTaskManager()
    {
        return $this->taskManager;
    }
    
    /**
     * 
     * @param int $taskManager
     * @return Task_Model_Task
     */
    public function setTaskManager($taskManager)
    {
        $this->taskManager = $taskManager;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getTaskDescription()
    {
        return $this->taskDescription;
    }
    
    /**
     * 
     * @param string $taskDescription
     * @return Task_Model_Task
     */
    public function setTaskDescription($taskDescription)
    {
        $this->taskDescription = $taskDescription;
        return $this;
    }
    
    /**
     * 
     * @return int
     */
    public function getTaskPriority() {
        return $this->taskPriority;
    }
    
    /**
     * 
     * @param int $taskPriority
     * @return Task_Model_Task
     */
    public function setTaskPriority($taskPriority) {
        $this->taskPriority = $taskPriority;
        return $this;
    }
    
    /**
     * 
     * @return int
     */
    public function getTaskProject()
    {
        return $this->taskProject;
    }
    
    /**
     * 
     * @param int $taskProject
     * @return Task_Model_Task
     */
    public function setTaskProject($taskProject)
    {
        $this->taskProject = $taskProject;
        return $this;
    }
    
    /**
     * 
     * @return Task_Model_Mapper_Task 
     */
    public function getTaskMapper()
    {
        if (NULL === $this->taskMapper) {
            $this->taskMapper = new Task_Model_Mapper_Task();
        }
        return $this->taskMapper;
    }
    
    /**
     * 
     * @param Task_Model_Mapper_Task $taskMapper
     * @return Task_Model_Task
     */
    public function setTaskMapper($taskMapper)
    {
        $this->taskMapper = $taskMapper;
        return $this;
    }


}
