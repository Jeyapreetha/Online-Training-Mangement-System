<?php
 
class StudentsModel extends Model
{
	
	
	public function studentDelete()
    {
        $sql = "delete from tbl_student_online_details where id = ".$_SESSION["deleteStudentId"];
		unset($_SESSION["deleteQuestionId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function updateStudent($post)
    {
        $sql = "update tbl_student_online_details set `name`='".$post["name"]."',`course_id`='".$post["course"]."',`alias_id`='".$post["trainer"]."',`mobile`=".$post["mobile"].",`address`='".$post["address"]."',`skype_id`='".$post["skypeId"]."' where id = ".$_SESSION["editStudentId"];
		unset($_SESSION["editStudentId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getStudents($id)
	{
		$sql = "SELECT  a.id, a.student_id, a.name, a.course_id, a.trainer_id, a.alias_id,a.mobile, a.address,a.skype_id, 
		b.course_name,c.trainer_name,c.alias_name FROM tbl_student_online_details a LEFT JOIN tbl_course b ON a.course_id=b.id 
		LEFT JOIN tbl_trainer c ON a.trainer_id= c.id ";
		$sqlWhere = "";
		if($id != "")
		{
			if($sqlWhere != "")
			{
				$sqlWhere = " AND a.id = ".$id;
			}
			else
			{
				$sqlWhere = " WHERE a.id = ".$id;
			}
		}
		$sql .= $sqlWhere;
		$this->_setSql($sql);
        $students = $this->getAll();
        if (empty($students))
        {
            return false;
        }
        return $students;
	}
}
