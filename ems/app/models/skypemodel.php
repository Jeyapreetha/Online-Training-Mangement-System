<?php
class skypeModel extends Model
{
	
	public function addSkype($post)
    {    
        $sql = "insert into tbl_skype(`course_id` , `topic_id` ,`date_time`,`student_id`,`trainer_id`,`schedule` ) values(".$post["course"].",".$post["topic"].",NOW(),".$post["student"].",".$post["trainer"].",'".$post["schedule"]." ".$post["scheduleTime"]."')"; 
		$this->_setSql($sql);
        $bool = $this->saveAndReturnId();
		return $bool;
    }
	public function addSkypeClass($post)
    {    
        $sql = "insert into tbl_skype(`course_id` , `topic_id` ,`date_time`,`student_id` ) values(".$post["course"].",".$post["topic"].",NOW(),".$post["student"].")"; 
		$this->_setSql($sql);
        $bool = $this->saveAndReturnId();
		return $bool;
    }
	public function skypeDelete()
    {	
		$this->getSkype($_SESSION["deleteSkypeId"]);
		$sql = "delete from tbl_skype where id = ".$_SESSION["deleteSkypeId"];
		unset($_SESSION["deleteSkypeId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
   	
    }
	public function approveSchedule($id)
    {	
		$sql = "update  tbl_skype  set `approved_schedule`=`schedule`, `status`=2  where id = ".$id;
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
   	
    }
	public function confirmSchedule($id)
    {	
		$sql = "update  tbl_skype  set `approved_schedule`=`reschedule`,`status`=2 where id = ".$id;
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
   	
    }
	public function cancelSkype($id)
    {	
		$sql = "update  tbl_skype  set `status`=3 where id = ".$id;
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
   	
    }
	public function updateSkype($post)
    {
		echo $sql = "update tbl_skype set `course_id`=".$post["course"].",`topic_id`=".$post["topic"].",`trainer_id`=".$post["trainer"]." ,`student_id`=".$post["student"]." ,`schedule`='".$post["schedule"]." ".$post["scheduleTime"]."' where id = ".$_SESSION["editSkypeId"];
		unset($_SESSION["editSkypeId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function updateSchedule($post)
    {
		echo $sql = "update tbl_skype set `course_id`=".$post["course"].",`topic_id`=".$post["topic"].",`reschedule`='".$post["reschedule"]." ".$post["rescheduleTime"]."' where id = ".$_SESSION["editSkypeId"];
		unset($_SESSION["editSkypeId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getSkype($id,$user_id,$trainer_id)
	{
		 $sql = "SELECT  a.id,e.skype_id,a.topic_id,a.course_id,a.trainer_id,a.date_time,a.schedule,a.reschedule,a.approved_schedule,a.student_id,
		a.status,c.duration,b.course_name,c.topic_name,d.trainer_name,d.alias_name,d.trainer_skype_id,e.name as student_name,f.email as student_mail,
		d.trainer_email 
		FROM tbl_skype a 					LEFT JOIN tbl_course b ON a.course_id=b.id
											LEFT JOIN tbl_student_online_details e ON a.student_id=e.student_id	
											LEFT JOIN tbl_student_online f ON a.student_id=f.id	
											LEFT JOIN tbl_topic c ON a.topic_id=c.id 
											LEFT JOIN tbl_trainer d ON a.trainer_id=d.id ";
		
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
		if($user_id != null)
		{
			if($sqlWhere != "")
			{
				$sqlWhere = " AND e.student_id = ".$user_id;
			
			}
			else
			{
				$sqlWhere = " WHERE e.student_id = ".$user_id;
				
			}
		}
		if($trainer_id != null)
		{
			if($sqlWhere != "")
			{
				$sqlWhere = " AND a.trainer_id = ".$trainer_id;
			
			}
			else
			{
				$sqlWhere = " WHERE a.trainer_id = ".$trainer_id;
				
			}
		}
		 $sql .= $sqlWhere;
		$this->_setSql($sql);
		$skypes = $this->getAll();
        if (empty($skypes))
        {
            return false;
        }
        return $skypes;
	}
	
}