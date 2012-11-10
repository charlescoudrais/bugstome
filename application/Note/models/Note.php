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
     * @var string 
     */
    private $taskManager;
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
    public function getTaskId() {
        return $this->taskId;
    }
    

    public function setTaskId($taskId) {
        $this->taskId = $taskId;
        return $this;
    }

    public function getTaskName() {
        return $this->taskName;
    }

    public function setTaskName($taskName) {
        $this->taskName = $taskName;
        return $this;
    }

    public function getTaskManager() {
        return $this->taskManager;
    }

    public function setTaskManager($taskManager) {
        $this->taskManager = $taskManager;
        return $this;
    }

    public function getTaskDescription() {
        return $this->taskDescription;
    }

    public function setTaskDescription($taskDescription) {
        $this->taskDescription = $taskDescription;
        return $this;
    }
    
    public function getTaskMapper() {
        $this->taskMapper = new Task_Model_Mapper_Task();
        return $this->taskMapper;
    }

    public function setTaskMapper($taskMapper) {
        $this->taskMapper = new Task_Model_Mapper_Task();
        return $this;
    }


}
