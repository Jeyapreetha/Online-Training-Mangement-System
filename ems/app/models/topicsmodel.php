<?php
 
class TopicsModel extends Model
{
	
	public function addTopic($post)
    {
        $sql = "insert into tbl_topic(`topic_name` , `course_id`,`duration`) values('".$post["name"]."' , '".$post["course"]."' , '".$post["duration"]."')"; 
		$this->_setSql($sql);
         $bool = $this->save();
		return $bool;
    }
	public function topicDelete()
    {
        $sql = "delete from tbl_topic where id = ".$_SESSION["deleteTopicId"];
		unset($_SESSION["deleteTopicId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function topicsDelete()
    {
        $sql = "delete from tbl_topic where id = ".$_SESSION["deleteTopicId"];
		unset($_SESSION["deleteTopicId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function updateTopic($post)
    {
        $sql = "update tbl_topic set `topic_name`='".$post["name"]."',`course_id`='".$post["course"]."' , `duration`='".$post["duration"]."' where id = ".$_SESSION["editTopicId"];
		unset($_SESSION["editTopicId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getTopics($id)
	{
		$sql = "SELECT  a.topic_name,a.course_id,b.course_name,a.id,a.duration FROM tbl_topic a LEFT JOIN tbl_course b ON a.course_id=b.id ";
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
        $topics = $this->getAll();
        if (empty($topics))
        {
            return false;
        }
        return $topics;
	}
}
