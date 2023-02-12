<?php
 
class Model 
{
    protected $_db;
    protected $_sql;
	
    public function __construct()
    {
        $this->_db = Db::init();
    }
     
    protected function _setSql($sql)
    {
        $this->_sql = $sql;
    }
     
	 
    public function getAll($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
        $array = array();
        $result = $this->_db->query($this->_sql);
        if($result)
		{
			while ($row = $result->fetch_object())
			{
				$array[] = $row;
			}
			$result->close();
			$this->_db->next_result();
		}
		unset($this->_sql);
		return $array;
    }
	public function getAll1($data = null)
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
        $string = string();
        $result = $this->_db->query($this->_sql);
        if($result)
		{
			while ($row = $result->fetch_object())
			{
				$string[] = $row;
			}
			$result->close();
			$this->_db->next_result();
		}
		unset($this->_sql);
		return $string;
    }
	public function save($data = null)
    {
		if (!$this->_sql)
		{
			throw new Exception("No SQL query!");
		}
		$result = $this->_db->query($this->_sql);
		if($result)
		{
			unset($this->_sql);
			return true;
		}
		else
		{
			unset($this->_sql);
			return false;
		}
	}
	public function saveAndReturnId($data = null)
    {
		if (!$this->_sql)
		{
			throw new Exception("No SQL query!");
		}
		$result = $this->_db->query($this->_sql);
		if($result)
		{
			unset($this->_sql);
			return $this->_db->insert_id;
		}
		else
		{
			unset($this->_sql);
			return false;
		}
	}
	
	
	public function update()
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
        $result = $this->_db->query($this->_sql);
        if($result)
		{
			unset($this->_sql);
			return true;
		}
		else
		{
			unset($this->_sql);
			return false;
		}
    }
	public function updateMulti()
    {
        if (!$this->_sql)
        {
            throw new Exception("No SQL query!");
        }
        $result = $this->_db->multi_query($this->_sql);
        if($result)
		{
			while ($this->_db->next_result()) {;} 
			unset($this->_sql);
			return true;
		}
		else
		{
			while ($this->_db->next_result()) {;} 
			unset($this->_sql);
			return false;
		}
    }
	public function getAllCourses()
	{
		$this->_setSql("SELECT * FROM tbl_course");
        $courses = $this->getAll();
        if (empty($courses))
        {
            return false;
        }
        return $courses;
	}
	public function getAllTopics()
	{
		$this->_setSql("SELECT * FROM tbl_topic");
        $topics = $this->getAll();
        if (empty($topics))
        {
            return false;
        }
        return $topics;
	}
	public function getAllStudents()
	{
		$this->_setSql("SELECT * FROM tbl_student_online a LEFT JOIN tbl_student_online_details b ON a.id=b.student_id ");
        $students = $this->getAll();
        if (empty($students))
        {
            return false;
        }
        return $students;
	}
	public function getAllTrainers()
	{
		$this->_setSql("SELECT * FROM tbl_trainer");
        $trainers = $this->getAll();
        if (empty($trainers))
        {
            return false;
        }
        return $trainers;
	}
	public function getAllAliasTrainers()
	{
		$this->_setSql("SELECT * FROM tbl_trainer");
        $trainers = $this->getAll();
        if (empty($aliasTrainer))
        {
            return false;
        }
        return $aliasTrainer;
	}
	public function getAllRoles()
	{
		$this->_setSql("SELECT * FROM tbl_roles");
        $role = $this->getAll();
        if (empty($role))
        {
            return false;
        }
        return $role;
	}
	public function getAdmins($id)
	{
		$sql = "SELECT * FROM tbl_trainer where role_id=3 ";
		$sqlWhere = "";
		if($id != NULL)
		{
			if($sqlWhere != "")
			{
				$sqlWhere = " AND id = ".$id;
			}
			else
			{
				$sqlWhere = " WHERE id = ".$id;
			}
		}
		$sql .= $sqlWhere;
		$this->_setSql($sql);
        $trainers = $this->getAll();
        if (empty($trainers))
        {
            return false;
        }
        return $trainers;
	}
	
}