<?php
class webinarController extends Controller
{
    public function __construct($model, $action, $query)
    {
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
		$this->_resetView("dashboard/", $action, $query, true);
    }
    public function index($query)
	{	
		if($_SESSION["role_id"] ==3)
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
				$this->_view->set('title', 'webinar');
				$webinar = $this->_model->getWebinar(null,null,null);
				$this->_view->set('webinar', $webinar);
				return $this->_view->output();
			} 
			catch (Exception $e) {
				echo "Application error:" . $e->getMessage();
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	public function twebinar($query)
	{	
		if($_SESSION["role_id"] ==2)
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
				$this->_view->set('title', 'webinar');
				$webinar = $this->_model->getWebinar(null,null,$_SESSION["trainer_id"]);
				$this->_view->set('webinar', $webinar);
				return $this->_view->output();
			} 
			catch (Exception $e) {
				echo "Application error:" . $e->getMessage();
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	public function webinar($query)
	{	
		if($_SESSION["role_id"] ==1)
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
				$this->_view->set('title', 'webinar');
				$webinar = $this->_model->getWebinar(null,null,null);
				$this->_view->set('webinar', $webinar);
				return $this->_view->output();
			} 
			catch (Exception $e) {
				echo "Application error:" . $e->getMessage();
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	
	public function addWebinar()
    {	
		if($_SESSION["role_id"] ==3)
		{
			$this->_view->set('message', "");
			$topics = $this->_model->getAllTopics();
			$this->_view->set('topics', $topics);
			$courses = $this->_model->getAllCourses();
			$this->_view->set('courses', $courses);
			$trainers = $this->_model->getAllTrainers();
			$this->_view->set('trainers', $trainers);
			if(isset($_POST["course"]))
			{	
				$webinarAdd = $this->_model->addWebinar($_POST);
				if($webinarAdd)
				{
					$this->_view->set('message', "Saved Successfully");
				}
				else
				{
					$this->_view->set('message', "Save Failed");
				}
			}
			return $this->_view->output();
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
	}
	public function editWebinar($query)
    {	
		if($_SESSION["role_id"] ==3)
		{
			if($query != "")
			{	
				$this->_view->set('title', 'editWebinar');
				$webinar = $this->_model->getWebinar($query,null,null);
				$_SESSION["editWebinarId"] = $query;
				$this->_view->set('webinar', $webinar[0]);
				$courses = $this->_model->getAllCourses();
				$this->_view->set('courses', $courses);
				$topics = $this->_model->getAllTopics();
				$this->_view->set('topics', $topics);
				$trainers = $this->_model->getAllTrainers();
				$this->_view->set('trainers', $trainers);
				return $this->_view->output();
			}
				elseif($_POST["course"])
				{
					if($this->_model->updateWebinar($_POST))
					{
						header("Location: ".BaseURL."webinar/index/Success");
					}
					else
					{
						header("Location: ".BaseURL."webinar/index/Failed");
					}
				
				}
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
	}
	public function deleteWebinar($query)
    {
		if($query != "")
		{
			$_SESSION["deleteWebinarId"] = $query;
			$delete = $this->_model->webinarDelete($query);
			header("Location: ".BaseURL."webinar/index/Success");
			return $this->_view->output();
		}
			else
			{
				header("Location: ".BaseURL."webinar/index/Failed");
			}
	}
	public function enroll($query)
    { 
		if($_SESSION["role_id"] ==1)
		{
			$_POST["student"] = $_SESSION["user_id"];
			$webinarAdd = $this->_model->addWebinarParticipants($_POST,$query);
			$approveSchedule = $this->_model->approve($query);
			
			if($webinarAdd)
			{
				header("Location: ".BaseURL."webinar/webinar/Success");
			}
			else
			{
				header("Location: ".BaseURL."webinar/webinar/Failed");
			}

		return $this->_view->output();
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
	}
	public function cancel($query)
    {
		if($query != "")
		{
			$cancel = $this->_model->webinarCancel($query);
			header("Location: ".BaseURL."webinar/webinar/Success");
			return $this->_view->output();
		}
		else
		{
			header("Location: ".BaseURL."webinar/index/Failed");
		}
	}

	public function startWebinar($query)
	{	
		if($_SESSION["role_id"] ==1)
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
			$this->_model->updateStartTime($query);
			$this->_view->set('title', 'webinar');
			$webinar = $this->_model->getWebinar($query,null,null);
            $this->_view->set('webinar', $webinar[0]);
            return $this->_view->output();
        } 
		catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
		}
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	public function stop($query)
    {
		if($query != "")
		{	
			$this->_view->set('title', 'confirmSchedule');
			$confirmSchedule = $this->_model->updateStopTime($query);
		    $this->_view->set('confirmSchedule', $confirmSchedule);
			header("Location: ".BaseURL."webinar/webinar");
					
		}
	}
}
