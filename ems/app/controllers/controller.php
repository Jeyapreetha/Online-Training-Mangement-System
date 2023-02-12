<?php
 
class Controller
{
    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_view;
	protected $_viewName;
	protected $_modelBaseName;
	
    public function __construct($model, $action, $query)
    {
        $this->_controller = ucwords(__CLASS__);
        $this->_action = $action;
		$this->_modelBaseName = $model;
        $this->_view = new View(HOME . DS . 'app' . DS . 'views' . DS . strtolower($this->_modelBaseName) . DS . $action . '.php', $model, $action);
    }
     
    protected function _setModel($modelName)
    {
        $modelName .= 'Model';
        $this->_model = new $modelName();
    }
     
    protected function _setView($viewName)
    {
		$this->_viewName = $viewName;
        $this->_view = new View(HOME . DS . 'app' . DS . 'views' . DS . strtolower($this->_modelBaseName) . DS . $viewName . '.php', strtolower($this->_modelBaseName), $viewName);
    }
	
	protected function _resetView($action, $query)
    {
		if($action == "Login")
		{
			$action = "index";
			$this->setView("index");
		}
	}
    protected function _setDeniedView($viewName)
    {
		$this->_viewName = $viewName;
        $this->_view = new View(HOME . DS . 'app' . DS . 'views' . DS . $viewName . '.php', "", "");
    }
	protected function postEmail($object)
	
	{
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->SMTPDebug = 0;
		$mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = "jeyapreetha95@@gmail.com";
		$mail->Password = "karnees22";
		$mail->setFrom('jeyapreetha95@gmail.com', 'Jeya Preetha');
		$mail->addReplyTo('varshinisridhar96@gmail.com', 'Varshini Sridhar');
		foreach($object->address as $address)
		{
		$mail->addAddress($address->email, $address->name);
		}
		$mail->Subject = $object->subject;
		$mail->msgHTML($object->htmlmsg);
		$mail->AltBody = $object->textmsg;
		
		if (!$mail->send()) 
			{
				return false;
			} 
			else 
			{
				return true;
			}
	}
}