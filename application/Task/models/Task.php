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
     * @var Core_Model_User 
     */
    private $taskManager;
    /**
     *
     * @var int 
     */
    private $taskManagerId;
    /**
     *
     * @var Core_Model_Priority 
     */
    private $taskPriority;
    /**
     *
     * @var int 
     */
    private $taskPriorityId;
    /**
     *
     * @var Project_Model_Project 
     */
    private $taskProject;
    /**
     *
     * @var int 
     */
    private $taskProjectId;
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
     * @return Core_Model_User
     */
    public function getTaskManager()
    {
        return $this->taskManager;
    }
    
    /**
     * 
     * @return int
     */
    public function getTaskManagerId()
    {
        return $this->taskManagerId;
    }
    
    /**
     * 
     * @param Core_Model_User $taskManager
     * @return Task_Model_Task
     */
    public function setTaskManager(Core_Model_User $taskManager)
    {
        $this->taskManager = $taskManager;
        return $this;
    }
    
    public function setTaskManagerId($id)
    {
        $this->taskManagerId = $id;
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
     * @return Core_Model_Priority
     */
    public function getTaskPriority() {
        return $this->taskPriority;
    }
    
    public function getTaskPriorityId() {
        return $this->taskPriorityId;
    }
    
    /**
     * 
     * @param Core_Model_Priority $taskPriority
     * @return Task_Model_Task
     */
    public function setTaskPriority(Core_Model_Priority $taskPriority) {
        $this->taskPriority = $taskPriority;
        return $this;
    }
    
    public function setTaskPriorityId($id) {
        $this->taskPriorityId = $id;
        return $this;
    }
    
    /**
     * 
     * @return Project_Model_Project
     */
    public function getTaskProject()
    {
        return $this->taskProject;
    }
    
    /**
     * 
     * @param Project_Model_Project $taskProject
     * @return Task_Model_Task
     */
    public function setTaskProject(Project_Model_Project $taskProject)
    {
        $this->taskProject = $taskProject;
        return $this;
    }
    
    public function setTaskProjectId($id)
    {
        $this->taskProjectId = $id;
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
