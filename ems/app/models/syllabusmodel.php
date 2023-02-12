<?php
class SyllabusModel extends Model
{
	public function addSyllabus($fileName,$post)
    {    
	    $sql = "insert into tbl_files(`file_name` , `topic_id` ,`name`) values('".$fileName."','".$post["topic"]."','".$post["name"]."')"; 
		$this->_setSql($sql);
        $bool = $this->saveAndReturnId();
		return $bool;
    }
	public function syllabusDelete()
    {
		$existDbFile = $this->getSyllabus($_SESSION["deleteSyllabusId"])[0]->content;
		if(file_exists("content/".$existDbFile))
		{
			unlink("content/".$existDbFile);
		}
        $sql = "delete from tbl_files where id = ".$_SESSION["deleteSyllabusId"];
		unset($_SESSION["deleteSyllabusId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
     
    }
	public function downloadFile($query)
	{  
		$sql = "select file_name from tbl_files where id = ".$query;
		$this->_setSql($sql);
		$files = $this->getAll();
		return $files[0];
	}
	public function updateSyllabus($post,$fileName)
    {
		if($fileName != "")
		{
			echo  $sql = "update tbl_files set `name`='".$post["name"]."', `topic_id`='".$post["topic"]."',`file_name`='".$fileName."' where id = ".$_SESSION["editSyllabusId"];
		}
        else
		{
			echo $sql = "update tbl_files set `name`='".$post["name"]."' , `topic_id`='".$post["topic"]."' where id = ".$_SESSION["editSyllabusId"];
		}
		unset($_SESSION["editSyllabusId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getSyllabus($id)
	{
		$sql = "SELECT  a.name,a.topic_id,b.topic_name,a.id,a.file_name FROM tbl_files a LEFT JOIN tbl_topic b ON a.topic_id=b.id ";
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
        $syllabus = $this->getAll();
        if (empty($syllabus))
        {
            return false;
        }
        return $syllabus;
	}
}
