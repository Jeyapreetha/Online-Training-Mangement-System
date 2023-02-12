<?php
 
class TrainersModel extends Model
{
	
	public function addTrainer($post)
    {
        $sql = "insert into tbl_trainer(`trainer_name`,`alias_name`,`role_id`,`trainer_skype_id`,`username`,`password`,`trainer_email`) values('".$post["name"]."','".$post["aliasname"]."','".$post["role"]."','".$post["skypeId"]."','".$post["username"]."','".$post["password"]."','".$post["emailId"]."')"; 
		$this->_setSql($sql);
         $bool = $this->save();
		return $bool;
    }
	public function trainerDelete()
    {
        $sql = "delete from tbl_trainer where id = ".$_SESSION["deleteTrainerId"];
		unset($_SESSION["deleteTrainerId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
		
    }
	public function updateTrainer($post)
    {
        $sql = "update tbl_trainer set `trainer_name`='".$post["name"]."',`alias_name`='".$post["aliasname"]."',`role_id`='".$post["role"]."',`password`='".$post["password"]."',`trainer_email`='".$post["emailId"]."',`trainer_skype_id`='".$post["skypeId"]."' where id = ".$_SESSION["editTrainerId"];
		unset($_SESSION["editTrainerId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getTrainers($id)
	{
		$sql = "SELECT * FROM tbl_trainer ";
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
        $trainers = $this->getAll();
        if (empty($trainers))
        {
            return false;
        }
        return $trainers;
	}
}
