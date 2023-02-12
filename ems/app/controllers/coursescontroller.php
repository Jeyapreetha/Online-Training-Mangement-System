<?php
 
class CoursesController extends Controller
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
            $this->_view->set('title', 'courses');
            $courses = $this->_model->getCourses(null);
            $this->_view->set('courses', $courses);
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
		}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}
    }
	
	public function topics($query)
    {
		$this->_view->set('title', 'topics');
		
		$topics = $this->_model->getTopics($query);
		$this->_view->set('topics', $topics);
		return $this->_view->output();
    }
	public function addCourse()
    {	
		if($_SESSION["role_id"] !=1)
		{
		$this->_view->set('msg', '');
		if(isset($_POST["name"]))
		{
			$status = $this->_model->addCourse($_POST);
			if($status)
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
			header("Location: ".BaseURL."users/login/failed");
		}
	}
	
	public function deleteCourse($query)
    {
		if($query != "")
		{
			$_SESSION["deleteCourseId"] = $query;
			$this->_view->set('title', 'deleteCourse1');
			$delete = $this->_model->courseDelete($query);
			header("Location: ".BaseURL."courses/index/Success");
			return $this->_view->output();
		}

			else
			{
				header("Location: ".BaseURL."courses/index/Failed");
			}
		
		
	}
	public function editCourse($query)
    {
		if($_SESSION["role_id"] ==3)
		{
		if($query != "")
		{
			$this->_view->set('title', 'editCourse');
			$course = $this->_model->getCourses($query);
			$this->_view->set('course', $course[0]);
			$_SESSION["editCourseId"] = $query;
			return $this->_view->output();
		}
		elseif($_POST["name"])
		{
			if($this->_model->updateCourse($_POST))
			{
				header("Location: ".BaseURL."courses/index/Success");
			}
			else
			{
				header("Location: ".BaseURL."courses/index/Failed");
			}
		}
		}
		
		else
		{
			header("Location: ".BaseURL."users/login/Failed");
		}
    }
	
}