<?php
 
class UsersModel extends Model
{
    public function getUsers()
    {
        $sql = "SELECT
                    a.id,
                    a.email,
                    c.name
                FROM 
                    tbl_student_online a
                INNER JOIN 
                    tbl_student_online_details AS c ON a.id = c.student_id 
                ORDER BY a.id DESC";
         
        $this->_setSql($sql);
        $users = $this->getAll();
        if (empty($users))
        {
            return false;
        }
         
        return $users;
    }
	public function checkLogin($post)
    {
		$sql = "SELECT a.id,b.role_id,b.name FROM tbl_student_online a  LEFT JOIN tbl_student_online_details b ON a.id=b.student_id WHERE a.email='".$post["user"]."' AND a.password = '".$post["password"]."' ";
         
        $this->_setSql($sql);
        $users = $this->getAll();
        if (empty($users))
        {
			$sql = "SELECT * FROM tbl_trainer WHERE username='".$post["user"]."' AND password = '".$post["password"]."'";
			$this->_setSql($sql);
			$users = $this->getAll();
			if (empty($users))
			{
				return false;
			}
			else
			{	
				$_SESSION["trainer_name"] = $users[0]->trainer_name;
				$_SESSION["trainer_id"] = $users[0]->id;
				$_SESSION["role_id"] = $users[0]->role_id;
				return true;
			}
        }
		else
		{	
			$_SESSION["name"] = $users[0]->name;
			$_SESSION["user_id"] = $users[0]->id;
			$_SESSION["role_id"] = $users[0]->role_id;
			return true;
		}
	}
	public function register($post)
    {
		$sql = "insert into tbl_student_online(`email`,`password`) values('".$post["email"]."' , '".$post["password"]."')"; 
		$this->_setSql($sql);
        $insertId = $this->saveAndReturnId();
		$_SESSION["user_id"] = $insertId;
		$_SESSION["role_id"] = 1;
		
		$sql = "insert into tbl_student_online_details(`student_id`,`name`,`mobile`,`address`,`role_id`,`course_id`,`skype_id`) values(".$insertId.",'".$post["name"]."' , '".$post["mobile"]."','".$post["address"]."',1,'".$post["courses"]."','".$post["skypeId"]."')"; 
        $this->_setSql($sql);
        $bool = $this->save();
		return $bool;
	}
}