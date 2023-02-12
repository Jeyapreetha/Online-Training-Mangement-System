<?php
 
class QuestionsController extends Controller
{
	
    public function __construct($model, $action, $query)
    {
		
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
		$this->_resetView("dashboard/", $action, $query, true);
    }
    
    public function index($query)
	{
		
        try 
		{
			if($query != "")
			{
				$this->_view->set('message', $query);
			}
			else
			{
				$this->_view->set('message', "");
			}
            $this->_view->set('title', 'questions');
            $questions = $this->_model->getQuestions(null);
            $this->_view->set('questions', $questions);
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
	
	public function addQuestion()
    {
		$this->_view->set('title', 'addQuestion');
		
		$questionAdd = $this->_model->addQuestion($_POST);
		$this->_view->set('addQuestion', $questionAdd);
		return $this->_view->output();
    }
	public function deleteQuestion($query)
    {
		if($query != "")
		{
			$_SESSION["deleteQuestionId"] = $query;
			$this->_view->set('title', 'deleteQuestion1');
			$delete = $this->_model->questionDelete($query);
			//$trainer = $this->_model->gettrainers($query);
			//$this->_view->set('trainer', $trainer[0]);
			header("Location: ".BaseURL."questions/index/Success");
			return $this->_view->output();
		}
			else
			{
				header("Location: ".BaseURL."questions/index/Failed");
			}
		
		
	}
	public function editQuestion($query)
    {
		if($query != "")
		{
			$this->_view->set('title', 'editQuestion');
			$question = $this->_model->getQuestions($query);
			$this->_view->set('question', $question[0]);
			$_SESSION["editQuestionId"] = $query;
			return $this->_view->output();
		}
		elseif($_POST["name"])
		{
			if($this->_model->updateQuestion($_POST))
			{
				header("Location: ".BaseURL."questions/index/Success");
			}
			else
			{
				header("Location: ".BaseURL."questions/index/Failed");
			}
		}
    }
	
}