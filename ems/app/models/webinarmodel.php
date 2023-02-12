
<?php
class webinarModel extends Model
{
	
	public function addWebinar($post)
    {    
        $sql = "insert into tbl_webinar(`title`,`course_id`,`topic_id` ,`date_time`,`trainer_id`,`schedule`,`description`,`webinar_url`,`meeting_number`,`meeting_password`) values('".$post["title"]."',".$post["course"].",".$post["topic"].",NOW(),".$post["trainer"].",'".$post["schedule"]." ".$post["scheduleTime"]."','".$post["description"]."','".$post["webinarURL"]."','".$post["meetingNumber"]."','".$post["meetingPassword"]."')"; 
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	
	public function addWebinarParticipants($post,$query)
    {    
        $sql = "insert into tbl_webinar_participants(`webinar_id`,`student_id`) values((SELECT id from tbl_webinar where id= ".$query."),'".$post["student"]."')"; 
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function approve($id)
    {	
		echo $sql = "update  tbl_webinar_participants  set  `status`=3  where webinar_id = ".$id;
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
   	
    }
	public function webinarDelete()
    {	
		$this->getWebinar($_SESSION["deleteWebinarId"]);
		$sql = "delete from tbl_webinar where id = ".$_SESSION["deleteWebinarId"];
		unset($_SESSION["deleteWebinarId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
   	
    }
	public function webinarCancel($id)
    {	echo $sql = "update  tbl_webinar_participants  set  `status`=2  where webinar_id = ".$id;
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
   	}
	public function updateStartTime($id)
    {
		 $sql = "update  tbl_webinar_participants  set  `start_time`= NOW() where webinar_id = ".$id; 
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function updateStopTime($id)
    {  
		$sql = "update  tbl_webinar_participants  set  `end_time`= NOW(),`status`=1  where webinar_id = ".$id; 
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function updateWebinar($post)
    {
	$sql = "update tbl_webinar set `course_id`=".$post["course"].",`topic_id`=".$post["topic"].",`trainer_id`=".$post["trainer"]." ,`title`='".$post["title"]."',`description`='".$post["description"]."',`webinar_url`='".$post["webinarURL"]."',`meeting_number`='".$post["meetingNumber"]."',`meeting_password`='".$post["meetingPassword"]."' ,`schedule`='".$post["schedule"]." ".$post["scheduleTime"]."' 
			where id = ".$_SESSION["editWebinarId"];
		unset($_SESSION["editWebinarId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getWebinar($id,$user_id,$trainer_id)
	{
		 $sql = "SELECT  a.id,a.topic_id,a.course_id,a.trainer_id,a.date_time,a.schedule,a.title,a.description,a.webinar_url,a.meeting_number,a.meeting_password,
		c.duration,b.course_name,c.topic_name,d.trainer_name,d.alias_name,d.trainer_skype_id,e.status,e.start_time,e.end_time,e.student_id,
		ADDTIME(a.schedule,c.duration) as webinar_end_time ,TIMEDIFF(e.end_time,start_time) as attended_time
						FROM tbl_webinar a   LEFT JOIN tbl_course b ON a.course_id=b.id
											 LEFT JOIN tbl_topic c ON a.topic_id=c.id 
											 LEFT JOIN tbl_webinar_participants e ON a.id=e.webinar_id 
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
		$webinar = $this->getAll();
        if (empty($webinar))
        {
            return false;
        }
        return $webinar;
	}
	
}