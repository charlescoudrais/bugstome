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
    
    public function fetchAll()
    {
        $rowSet = $this->getDbTable()->fetchAll();
        if (0 === count($rowSet)) {
            return false;
        }
        $tasks = array();
        foreach ($rowSet as $row) {
             $tasks[] = $this->rowToObject($row);
        }
        return $tasks;
    }    
    
    public function save($task)
    {
        $row = $this->objectToRow($task);
        
        if (0 === (int) $task->getId()) {
            unset($row['task_id']);
            $this->getDbTable()->insert($row);
            return $this->getDbTable()->getAdapter()->lastInsertId();
        } else {
            $this->getDbTable()
                 ->update(
                      $row, 
                      array( 'task_id = ?' => $task->getId())
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
            'task_title'       => $task->getTaskName(),
            'task_start'       => $task->getTaskStart(),
            'task_end'         => $task->getTaskEnd(),
            'task_description' => $task->getTaskDescription(),
            'user_id'          => $task->getTaskManager(),
            'priority_id'      => $task->getTaskPriority(),
        );
    }
    
    public function rowToObject($row)
    {
         
         $task = new Task_Model_Task();
         $task->setTaskId($row->task_id)
              ->setTaskName($row->task_title)
              ->setTaskStart($row->task_start)
              ->setTaskEnd($row->task_end)
              ->setTaskDescription($row->task_description)
              ->setTaskManager($row->user_id)
              ->setTaskPriority($row->priority_id);
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
