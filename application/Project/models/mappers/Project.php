<?php
class Project_Model_Mapper_Project
{
    private $dbTable;
    
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
        $projects = array();
        foreach ($rowSet as $row) {
             $projects[] = $this->rowToObject($row);
        }
        return $projects;
    }    
    
    public function save($project)
    {
        $row = $this->objectToRow($project);
        
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
        );
    }
    
    public function rowToObject($row)
    {
         
         $project = new Project_Model_Project();
         $project->setProjectId($row->project_id)
                 ->setProjectTitle($row->project_title)
                 ->setProjectStart($row->project_start)
                 ->setProjectEnd($row->project_end)
                 ->setProjectDescription($row->project_description);
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