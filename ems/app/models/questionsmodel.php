<?php
 
class QuestionsModel extends Model
{
	
	public function addQuestion($post)
    {
        $sql = "insert into tbl_question(`question`) values('".$post["name"]."')"; 
		$this->_setSql($sql);
         $bool = $this->save();
		return $bool;
    }
	public function questionDelete()
    {
        $sql = "delete from tbl_question where id = ".$_SESSION["deleteQuestionId"];
		unset($_SESSION["deleteQuestionId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
         

		
    }
	public function updateQuestion($post)
    {
        $sql = "update tbl_question set `question`='".$post["name"]."' where id = ".$_SESSION["editQuestionId"];
		unset($_SESSION["editQuestionId"]);
		$this->_setSql($sql);
        $bool = $this->save();
		return $bool;
    }
	public function getQuestions($id)
	{
		$sql = "SELECT * FROM tbl_question ";
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
        $questions = $this->getAll();
        if (empty($questions))
        {
            return false;
        }
        return $questions;
	}
}
