<?php
 
class CoursesModel extends Model
{
	
	public function getTopics($id)
    {
        $sql = "SELECT * FROM tbl_topic WHERE course_id=".$id;
         
        $this->_setSql($sql);
        $topics = $this->getAll();
        if (empty($topics))
        {
            return false;
        }
		return $topics;
    }
	public function addCourse($post)
    {
        $sql = "insert into tbl_course(`course_name`) values('".$post["name"]."')"; 
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function courseDelete()
    {
        $sql = "delete from tbl_course where id = ".$_SESSION["deleteCourseId"];
		unset($_SESSION["deleteCourseId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
         

		
    }
	public function updateCourse($post)
    {
        $sql = "update tbl_course set `course_name`='".$post["name"]."' where id = ".$_SESSION["editCourseId"];
		unset($_SESSION["editCourseId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getCourses($id)
	{
		$sql = "SELECT * FROM tbl_course ";
		$sqlWhere = "";
		if($id != "")
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
        $courses = $this->getAll();
        if (empty($courses))
        {
            return false;
        }
        return $courses;
	}
}
