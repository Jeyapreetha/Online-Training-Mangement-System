<?php
 
class skypeController extends Controller
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
			$this->_view->set('title', 'skype');
            $skype = $this->_model->getSkype(null,null,null);
            $this->_view->set('skype', $skype);
            return $this->_view->output();
        } 
		catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
		}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}
    }
	public function tindex($query)
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
			$this->_view->set('title', 'skype');
            $skype = $this->_model->getSkype(null,null,$_SESSION["trainer_id"]);
            $this->_view->set('skype', $skype);
            return $this->_view->output();
        } 
		catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
		}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}
    }
	public function mySkypes($query)
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
			$this->_view->set('title', 'skype');
			$skype = $this->_model->getSkype(null,$_SESSION["user_id"],null);
            $this->_view->set('skype', $skype);
            return $this->_view->output();
        } 
		catch (Exception $e) {
            echo "Application error:" . $e->getMessage();
        }
		}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}
    }
	public function startSession($query)
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
				$this->_view->set('title', 'skype');
				$skype = $this->_model->getSkype($query,null,null);
				$this->_view->set('skype', $skype[0]);
				return $this->_view->output();
			} 
			catch (Exception $e) {
				echo "Application error:" . $e->getMessage();
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}
    }
	public function takeSession($query)
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
				$this->_view->set('title', 'skype');
				$skype = $this->_model->getSkype($query,null,null);
				$this->_view->set('skype', $skype[0]);
				return $this->_view->output();
			} 
			catch (Exception $e) {
				echo "Application error:" . $e->getMessage();
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}	
    }
	public function requestSkype()
    {
		if($_SESSION["role_id"] ==1)
		{
		$this->_view->set('message', "");
		$topics = $this->_model->getAllTopics();
		$this->_view->set('topics', $topics);
		$courses = $this->_model->getAllCourses();
		$this->_view->set('courses', $courses);
		
			
		if(isset($_POST["course"]))
		{	
			$_POST["student"] = $_SESSION["user_id"];
			$skypeAdd = $this->_model->addSkypeClass($_POST);
			
			if($skypeAdd>0)
			{
			$this->_view->set('msg', "Saved Successfully");
			$skypeMail=$this->_model->getSkype($skypeAdd,null,null)[0];
			
			$object = new stdClass;
			$object->subject = "Requested Skype Session ";
			$object->htmlmsg = "I would like to participate in skype call for the following topics.
								
							<br><br><table border=2>
									<tr><td>Student Name</td> <td>".$skypeMail->student_name."</td><tr>
									<tr><td>Course Name</td> <td>  ".$skypeMail->course_name."</td><tr>
									<tr><td>Topic Name</td>  <td> ".$skypeMail->topic_name."</td><tr>
									</table>
								
								";
			$object->textmsg = "Text";
			$addresses = array();
			$address = new stdClass;
			$address->email = $skypeMail->student_mail;
			$address->name = $skypeMail->student_name;
			array_push($addresses,$address);
			
			$admins=$this->_model->getAdmins(null);
			foreach($admins as $admin):
				$address = new stdClass;
				$address->email=$admin->trainer_email;
				$address->name=$admin->trainer_name;
				array_push($addresses,$address);
			endforeach;
			
			
			$object->address = $addresses;
			
			$this->postEmail($object);
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
	public function addSkype()
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
		$students = $this->_model->getAllStudents();
		$this->_view->set('students', $students);
		if(isset($_POST["course"]))
		{	
			$skypeAdd = $this->_model->addSkype($_POST);
			
			if($skypeAdd > 0)
			{
				$this->_view->set('message', "Saved Successfully");
				$skypeMail=$this->_model->getSkype($skypeAdd,null,null)[0];
				
				$object = new stdClass;
				$object->subject = " Skype Session ";
				$object->htmlmsg = "<p>Thank You for your Interest in Skype session.<br></p>
									<p>Hopefully, you will be able to participate in this call as per the Schedule enclosed below.</p>
									<strong>Schedule</strong>
									
									<br><br><table border=2>
									<tr><td>Student Name</td> <td> ".$skypeMail->student_name."</td><tr>
									<tr><td>Trainer Name</td> <td> ".$skypeMail->trainer_name."</td><tr>
									<tr><td>Course Name</td> <td> ".$skypeMail->course_name."</td><tr>
									<tr><td>Topic Name</td> <td>   ".$skypeMail->topic_name."</td><tr>
									<tr><td>Schedule Date</td> <td>".$skypeMail->schedule."</td><tr>
									</table>
									";
															
				$object->textmsg = "Text";
				$addresses = array();
				$address = new stdClass;
				$address->email = $skypeMail->student_mail;
				$address->name = $skypeMail->student_name;
				array_push($addresses,$address);
				
				$address = new stdClass;
				$address->email = $skypeMail->trainer_email;
				$address->name = $skypeMail->trainer_name;
				array_push($addresses,$address);

				$object->address = $addresses;
				$this->postEmail($object);

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
			header("Location: ".BaseURL."users/login/failed");
		}
	}
	public function deleteSkype($query)
    {
		if($query != "")
		{
			$_SESSION["deleteSkypeId"] = $query;
			$delete = $this->_model->skypeDelete($query);
			header("Location: ".BaseURL."skype/index/Success");
			return $this->_view->output();
		}
			else
			{
				header("Location: ".BaseURL."skype/index/Failed");
			}
	}
	public function cancelSkype($query)
    {
		if($query != "")
		{	
			$this->_view->set('title', 'cancel');
			$skype = $this->_model->getSkype($query,null,null);
			$cancelSchedule = $this->_model->cancelSkype($query);
		    $this->_view->set('cancelSchedule', $cancelSchedule);
			
			$skypeMail=$this->_model->getSkype($query,null,null)[0];
				$object = new stdClass;
				$object->subject = " Skype Session ";
				$object->htmlmsg = "<p></p>
									<strong>Skype class Cancelled</strong>".$this->skypeAlertAllData($skypeMail);
															
				$object->textmsg = "Text";
				$addresses = array();
				$address = new stdClass;
				$address->email = $skypeMail->student_mail;
				$address->name = $skypeMail->student_name;
				array_push($addresses,$address);
				
				$address = new stdClass;
				$address->email = $skypeMail->trainer_email;
				$address->name = $skypeMail->trainer_name;
				array_push($addresses,$address);

				$admins=$this->_model->getAdmins(null);
				foreach($admins as $admin):
					$address = new stdClass;
					$address->email=$admin->trainer_email;
					$address->name=$admin->trainer_name;
					array_push($addresses,$address);
				endforeach;
				
				$object->address = $addresses;
				
				$this->postEmail($object);
				header("Location: ".BaseURL."skype/mySkypes");
					
		}
	}
	public function editSkype($query)
    {
		if($_SESSION["role_id"] ==3)
		{
		if($query != "")
		{	
			$this->_view->set('title', 'editSkype');
			$skype = $this->_model->getSkype($query,null,null);
			$_SESSION["editSkypeId"] = $query;
			$this->_view->set('skype', $skype[0]);
			$courses = $this->_model->getAllCourses();
		    $this->_view->set('courses', $courses);
			$topics = $this->_model->getAllTopics();
			$this->_view->set('topics', $topics);
			$trainers = $this->_model->getAllTrainers();
		    $this->_view->set('trainers', $trainers);
			$students = $this->_model->getAllStudents();
			$this->_view->set('students', $students);
	
			return $this->_view->output();
		}
			elseif($_POST["course"])
			{
				if($this->_model->updateSkype($_POST))
				{
				header("Location: ".BaseURL."skype/index/Success");

				$skypeMail=$this->_model->getSkype($skypeAdd,null,null)[0];
				$object = new stdClass;
				$object->subject = " Skype Session ";
				$object->htmlmsg = "<p>Thank You for your Interest in Skype session.<br></p>
									<p>Hopefully, you will be able to participate in this call as per the Schedule enclosed below.It has been scheduled as per your request</p>
									<strong>Schedule</strong>
									
									<br><br><table border=2>
									<tr><td>Student Name</td> <td> ".$skypeMail->student_name."</td><tr>
									<tr><td>Trainer Name</td> <td> ".$skypeMail->trainer_name."</td><tr>
									<tr><td>Course Name</td> <td> ".$skypeMail->course_name."</td><tr>
									<tr><td>Topic Name</td> <td>   ".$skypeMail->topic_name."</td><tr>
									<tr><td>Schedule Date</td> <td>".$skypeMail->schedule."</td><tr>
									</table>
									";
															
				$object->textmsg = "Text";
				$addresses = array();
				$address = new stdClass;
				$address->email = $skypeMail->student_mail;
				$address->name = $skypeMail->student_name;
				array_push($addresses,$address);
				
				$address = new stdClass;
				$address->email = $skypeMail->trainer_email;
				$address->name = $skypeMail->trainer_name;
				array_push($addresses,$address);

				$object->address = $addresses;
				
				$this->postEmail($object);
				}
				else
				{
					header("Location: ".BaseURL."skype/index/Failed");
				}
			
			}
		}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}
	}
	
	public function approveSchedule($query)
    {
		if($query != "")
		{	
			$this->_view->set('title', 'approveSchedule');
			$skype = $this->_model->getSkype($query,null,null);
			$approveSchedule = $this->_model->approveSchedule($query);
		    $this->_view->set('approveSchedule', $approveSchedule);
			
			$skypeMail=$this->_model->getSkype($query,null,null)[0];
				$object = new stdClass;
				$object->subject = " Skype Session ";
				$object->htmlmsg = "<p>I am very pleased to accept your Skype class as per the schedule </p>
									<strong>Schedule-Date Confirmed </strong>".$this->skypeAlertAllData($skypeMail);
															
				$object->textmsg = "Text";
				$addresses = array();
				$address = new stdClass;
				$address->email = $skypeMail->student_mail;
				$address->name = $skypeMail->student_name;
				array_push($addresses,$address);
				
				$address = new stdClass;
				$address->email = $skypeMail->trainer_email;
				$address->name = $skypeMail->trainer_name;
				array_push($addresses,$address);

				$object->address = $addresses;
				
				$this->postEmail($object);
			header("Location: ".BaseURL."skype/mySkypes");
					
		}
	}
	public function confirmSchedule($query)
    {
		if($query != "")
		{	
			$this->_view->set('title', 'confirmSchedule');
			$skype = $this->_model->getSkype($query,null,null);
			$confirmSchedule = $this->_model->confirmSchedule($query);
		    $this->_view->set('confirmSchedule', $confirmSchedule);
			
			$skypeMail=$this->_model->getSkype($query,null,null)[0];
				$object = new stdClass;
				$object->subject = " Skype Session ";
				$object->htmlmsg = "<p>As per Your request Schedule Date has been confirmed for the Skype class!</p>
									<strong>Schedule Approved</strong>".$this->skypeAlertAllData($skypeMail);
															
				$object->textmsg = "Text";
				$addresses = array();
				$address = new stdClass;
				$address->email = $skypeMail->student_mail;
				$address->name = $skypeMail->student_name;
				array_push($addresses,$address);
				
				$address = new stdClass;
				$address->email = $skypeMail->trainer_email;
				$address->name = $skypeMail->trainer_name;
				array_push($addresses,$address);

				$object->address = $addresses;
				
				$this->postEmail($object);
				header("Location: ".BaseURL."skype/index");
					
		}
	}
	public function skypeAlertAllData($skypeMail)
	{
		$message = "<br><br><table border=2>
		<tr><td>Student Name</td> <td> ".$skypeMail->student_name."</td><tr>
		<tr><td>Trainer Name</td> <td> ".$skypeMail->trainer_name."</td><tr>
		<tr><td>Course Name</td> <td> ".$skypeMail->course_name."</td><tr>
		<tr><td>Topic Name</td> <td>   ".$skypeMail->topic_name."</td><tr>";
		if($skypeMail->approved_schedule != "")
		{
			$message .= "<tr><td><strong>confirm Date</strong></td> <td><strong>".$skypeMail->approved_schedule."</strong></td><tr>";
		}
		elseif($skypeMail->reschedule != "")
		{
			$message .= "<tr><td><strong>Reschedule Date</strong></td> <td><strong>".$skypeMail->reschedule."</strong></td><tr>";
		}
		
		$message .= "</table>";
		return $message;
	}
	public function changeSchedule($query)
    {
		if($_SESSION["role_id"] ==1)
		{
		if($query != "")
		{	
			$this->_view->set('title', 'editSkype');
			$skype = $this->_model->getSkype($query,null,null);
			$_SESSION["editSkypeId"] = $query;
			$this->_view->set('skype', $skype[0]);
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
				if($this->_model->updateSchedule($_POST))
				{
				$skypeMail=$this->_model->getSkype($_SESSION["editSkypeId"],null,null)[0];
				$object = new stdClass;
				$object->subject = " Skype Session ";
				$object->htmlmsg = "<p>Your Skype session has been Rescheduled as per your request</p>
									<strong>Reschedule</strong>".$this->skypeAlertAllData($skypeMail);
															
				$object->textmsg = "Text";
				$addresses = array();
				$address = new stdClass;
				$address->email = $skypeMail->student_mail;
				$address->name = $skypeMail->student_name;
				array_push($addresses,$address);
				
				$address = new stdClass;
				$address->email = $skypeMail->trainer_email;
				$address->name = $skypeMail->trainer_name;
				array_push($addresses,$address);

				$object->address = $addresses;
				
				$this->postEmail($object);
					header("Location: ".BaseURL."skype/mySkypes/Success");
				}
				else
				{
					header("Location: ".BaseURL."skype/mySkypes/Failed");
				}
			
			}
			}
		else
		{
			header("Location: ".BaseURL."users/login/failed");
		}
			
	}
}
