<?php
class Project_Model_Mapper_Project
{
    private $dbTable;
    
    public function lastInsertId()
    {
        $sql = "SELECT MAX(project_id) AS id FROM projects";
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
    
    /**
     * 
     * @return Array $projects
     */
    public function fetchAll($where = null)
    {
        $rowSet = $this->getDbTable()->fetchAll($where);
        if (0 === count($rowSet)) {
            return false;
        }
        $projects = array();
        $i = 1;
        foreach ($rowSet as $row) {
             $projects[$i] = $this->rowToObject($row);
             $i ++;
        }
        return $projects;
    }    
    
    public function save($project)
    {
        $row = $this->objectToRow($project);
        unset($row['priority']);
        unset($row['user']);
        
        if (0 === (int) $project->getId()) {
            unset($row['project_id']);
            $this->getDbTable()->insert($row);
            return $this->getDbTable()->getAdapter()->lastInsertId();
        } else {
            $this->getDbTable()
                 ->update(
                      $row, 
                      array( 'project_id = ?' => $project->getId())
                  );
            return $project->getId();
        }
    }
    
    public function delete($project)
    {
        return $this->getDbTable()->delete(
                    array('project_id = ?' => $project->getId())
                );
    }
    
    public function objectToRow($project)
    {
        return array( 
            'project_id'          => $project->getProjectId(),
            'project_title'       => $project->getProjectTitle(),
            'project_start'       => $project->getProjectStart(),
            'project_end'         => $project->getProjectEnd(),
            'project_description' => $project->getProjectDescription(),
            'user_id'             => $project->getProjectUser()->getId(),
            'priority_id'         => $project->getProjectPriority()->getId(),
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
        
        $priorityRow    = $row->findParentRow(
                            'Core_Model_DbTable_Priority',
                            'Priority'
                        );
        $priorityMapper = new Core_Model_Mapper_Priority();
        $priority       = $priorityMapper->rowToObject($priorityRow);
        
        $project = new Project_Model_Project();
        $project->setProjectId($row->project_id)
                ->setProjectTitle($row->project_title)
                ->setProjectStart($row->project_start)
                ->setProjectEnd($row->project_end)
                ->setProjectDescription($row->project_description)
                ->setProjectUser($user)
                ->setProjectPriority($priority);
        return $project;
    }
    
    public function getDbTable()
    {
        if (null === $this->dbTable) {
            $this->dbTable = new Project_Model_DbTable_Project();
        }
        return $this->dbTable;
    }
    
    public function setDbTable($dbTable)
    {
        $this->dbTable = $dbTable;
        return $this;
    }
    
}