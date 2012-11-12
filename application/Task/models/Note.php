<?php
class Task_Model_Note
{
    /**
     *
     * @var int 
     */
    private $noteId;
    /**
     *
     * @var string 
     */
    private $noteName;
    /**
     *
     * @var string 
     */
    private $noteManager;
    /**
     *
     * @var string 
     */
    private $noteDescription;
    /**
     *
     * @var string 
     */
    private $noteDate;
    /**
     *
     * @var Note_Model_Mapper_Note 
     */
    private $noteMapper;


    /**
     * 
     * @return type
     */
    public function getNoteId()
    {
        return $this->noteId;
    }
    

    public function setNoteId($noteId)
    {
        $this->noteId = $noteId;
        return $this;
    }

    public function getNoteName()
    {
        return $this->noteName;
    }

    public function setNoteName($noteName)
    {
        $this->noteName = $noteName;
        return $this;
    }

    public function getNoteManager()
    {
        return $this->noteManager;
    }

    public function setNoteManager($noteManager)
    {
        $this->noteManager = $noteManager;
        return $this;
    }

    public function getNoteDescription()
    {
        return $this->noteDescription;
    }

    public function setNoteDescription($noteDescription)
    {
        $this->noteDescription = $noteDescription;
        return $this;
    }

    public function getNoteDate()
    {
        return $this->noteDate;
    }

    public function setNoteDate($date)
    {
        $this->noteDate = new Zend_Date($date);
        return $this;
    }
    
    public function getNoteMapper()
    {
        $this->noteMapper = new Note_Model_Mapper_Note();
        return $this->noteMapper;
    }

    public function setNoteMapper($noteMapper)
    {
        $this->noteMapper = new Note_Model_Mapper_Note();
        return $this;
    }


}
