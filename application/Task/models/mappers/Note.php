<?php
class Task_Model_Mapper_Note
{
    public function find($id)
    {
        return $id;
    }
    
    public function fetchAll($where = null) {
        $users = array(
            1 => 'Note 1',
            2 => 'Note 2',
            3 => 'Note 3',
        );
        
        return $users;
    }
}
