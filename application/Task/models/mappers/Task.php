<?php
class Task_Model_Mapper_Task
{
    private $dbTable;
    
    public function lastInsertId()
    {
        $sql = "SELECT MAX(task_id) AS id FROM tasks";
        $rowSet = $this->getDbTable()->getAdapter()->query($sql);
        if (0 === count($rowSet)) {
            return false;
        }
        foreach ($rowSet as $row) {
             $res = $row['id'] + 1;
             break;
        }
        return $res;
    }
    
    public function find($id)
    {
        $rowSet = $this->getDbTable()->find($id);
        $row = $rowSet->current();
        if (0 === count($row)) {
            return false;
        }
        return $this->rowToObject($row);
    }
    
    public function fetchAll($where = null)
    {
        $rowSet = $this->getDbTable()->fetchAll($where);
        if (0 === count($rowSet)) {
            return false;
        }
        $tasks = array();
        $i = 1;
        foreach ($rowSet as $row) {
             $tasks[$i] = $this->rowToObject($row);
             $i ++;
        }
        return $tasks;
    }    
    
    public function save($task)
    {
        $row = $this->objectToRow($task);
        unset($row['project']);
        unset($row['user']);
        unset($row['priority']);
        
        if (0 === (int) $task->getId()) {
            unset($row['task_id']);
            $this->getDbTable()->insert($row);
            return $this->getDbTable()->getAdapter()->lastInsertId();
        } else {
            $this->getDbTable()
                 ->update(
                      $row, 
                      array('task_id = ?' => $task->getId())
                  );
            return $task->getId();
        }
    }
    
    public function delete($task)
    {
        return $this->getDbTable()->delete(
                    array('task_id = ?' => $task->getId())
                );
    }
    
    public function objectToRow($task)
    {
        
        return array( 
            'task_id'          => $task->getTaskId(),
            'task_label'       => $task->getTaskName(),
            'task_start'       => $task->getTaskStart(),
            'task_end'         => $task->getTaskEnd(),
            'task_description' => $task->getTaskDescription(),
            'user_id'          => $task->getTaskManager()->getId(),
            'priority_id'      => $task->getTaskPriority()->getId(),
            'project_id'       => $task->getTaskProject()->getProjectId(),
        );
    }
    
    public function rowToObject($row)
    {
        $userRow    = $row->findParentRow(
                            'Core_Model_DbTable_User',
                            'User'
                        );
        $userMapper = new Core_Model_Mapper_User();
        $user       = $userMapper->rowToObject($userRow);
        
        $projectRow    = $row->findParentRow(
                            'Project_Model_DbTable_Project',
                            'Project'
                        );
        $projectMapper = new Project_Model_Mapper_Project();
//        $project       = $projectMapper->rowToObject($projectRow);
        $project = $projectMapper->find($row->project_id);
        
        $priorityRow    = $row->findParentRow(
                            'Core_Model_DbTable_Priority',
                            'Priority'
                        );
        $priorityMapper = new Core_Model_Mapper_Priority();
        $priority       = $priorityMapper->rowToObject($priorityRow);
         
        $task = new Task_Model_Task();
        $task->setTaskId($row->task_id)
             ->setTaskName($row->task_label)
             ->setTaskStart($row->task_start)
             ->setTaskEnd($row->task_end)
             ->setTaskDescription($row->task_description)
             ->setTaskManager($user)
             ->setTaskPriority($priority)
             ->setTaskProject($project);
        return $task;
    }
    
    public function getDbTable()
    {
        if (null === $this->dbTable) {
            $this->dbTable = new Task_Model_DbTable_Task();
        }
        return $this->dbTable;
    }
    
    public function setDbTable($dbTable)
    {
        $this->dbTable = $dbTable;
        return $this;
    }
    
}
