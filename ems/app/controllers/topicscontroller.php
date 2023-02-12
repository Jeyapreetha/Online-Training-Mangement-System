<?php
 
class TopicsController extends Controller
{
	
    public function __construct($model, $action, $query)
    {
		
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
		$this->_resetView("dashboard/", $action, $query, true);
    }
    
    public function index($query)
	{
		if($_SESSION["role_id"] !=1)
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
				$this->_view->set('title', 'topics');
				$topics = $this->_model->getTopics(null);
				$this->_view->set('topics', $topics);
				return $this->_view->output();
				 
			} catch (Exception $e) {
				echo "Application error:" . $e->getMessage();
			}
		}	
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	
	public function addTopic()
    {
		if($_SESSION["role_id"] ==3)
		{
			$this->_view->set('msg', '');
			$courses = $this->_model->getAllCourses();
			$this->_view->set('courses', $courses);
			
			if(isset($_POST["name"]))
			{
				$topicAdd = $this->_model->addTopic($_POST);
				
				if($topicAdd)
				{
					$this->_view->set('msg', "Saved Successfully");
				}
				else
				{
					$this->_view->set('msg', "Save Failed");
				}
			}
			return $this->_view->output();
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}	
    }
	public function deleteTopic($query)
    {
		if($query != "")
		{
			$_SESSION["deleteTopicId"] = $query;
			$this->_view->set('title', 'deleteTopic1');
			$delete = $this->_model->topicDelete($query);
			header("Location: ".BaseURL."topics/index/Success");
			return $this->_view->output();
		}
			else
			{
				header("Location: ".BaseURL."topics/index/Failed");
			}
		
		
	}
	public function deleteselectedTopic()
    {
		if(isset($_POST['delete']))
		{
		$checkbox = $_POST['checkbox'];

		for($i=0;$i<count($checkbox);$i++){

		//$del_id = $checkbox[$i];
		$checkbox = $_POST['checkbox'];
			$_SESSION["deleteTopicId"] = $query;
			$this->_view->set('title', 'deleteTopic1');
			$delete = $this->_model->topicsDelete($query);
			header("Location: ".BaseURL."topics/index/Success");
			return $this->_view->output();
			}
		}
			else
			{
				header("Location: ".BaseURL."topics/index/Failed");
			}
		
		
	}
	public function editTopic($query)
    {
		if($_SESSION["role_id"] ==3)
		{
			if($query != "")
			{
				$topic = $this->_model->getTopics($query);
				$courses = $this->_model->getAllCourses();
				$this->_view->set('courses', $courses);
				$this->_view->set('topic', $topic[0]);
				$_SESSION["editTopicId"] = $query;
				return $this->_view->output();
			}
			elseif($_POST["name"])
			{
				if($this->_model->updateTopic($_POST))
				{
					header("Location: ".BaseURL."topics/index/Success");
				}
				else
				{
					header("Location: ".BaseURL."topics/index/Failed");
				}
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}	
    }
	
}