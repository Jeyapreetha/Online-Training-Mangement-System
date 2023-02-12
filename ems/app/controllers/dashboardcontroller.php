<?php
 
class DashboardController extends Controller
{
	
    public function __construct($model, $action, $query)
    {
		
        parent::__construct($model, $action, $query);
        $this->_setModel($model);
		$this->_resetView("dashboard/", $action, $query, true);
    }
    
    public function index()
    {
        try 
		{
            $this->_view->set('title', 'courses');
            $courses = $this->_model->getAllCourses();
            $this->_view->set('courses', $courses);
            return $this->_view->output();
             
        } catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
    }
}