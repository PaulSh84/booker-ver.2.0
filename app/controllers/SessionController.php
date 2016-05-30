<?php
use Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Email;

class SessionController extends ControllerBase
{

    
    //Instantiate session for a logged on user
    
    private function _registerSession($user)
    {
        $this->session->set('auth', array(
                    'id' => $user->getEmployeeId(),
                    'name' => $user->getName(),
                    'admin_role' => $user->getAdminRole()
                    )
        );
    }
        
        
    public function indexAction()
    {
       
        
    }
    
    /**
     * This action authenticate and logs a user into the application
     *
     */
    public function startAction()
    {
        
        
        if ($this->request->isPost()) 
		{

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            
            /**
            * Validating Email and password inputs
            *
            */
            $validation = new Phalcon\Validation();
            
            $validation->add('email', new PresenceOf(array(
                'message' => 'The email is required',
                'cancelOnFail' => true
                
            )));
            
            $validation->add('email', new Email(array(
                'message' => 'The email is not valid'
            )));
            
            $validation->add('password', new PresenceOf(array(
                'message' => 'The password is required'
            )));
                        
            /*
            ** Getting rid of spaces in our email input
            */
            $validation->setFilters('email', 'trim');
                        
            $messages = $validation->validate($_POST);
          
            /* Sending Error Messages to View  */
            
            if(count($messages))
            {
                foreach ($messages as $message) 
                {
                    $this->flashSession->error($message);
                }
            }
            else
            {     
                    //Adding new Users ** for test purpose **
                    /*  $pwd = $this->security->hash($password);
                        $pass = new Employees();
                        $pass->setEmployeeId(2);
                        $pass->setName('Admin');
                        $pass->setEmail($email);
                        $pass->setPassword($pwd);
                        $pass->setAdminRole(1);
                        $pass->save();
                    */
                $user = Employees::findFirst(array(
                        "email= ?0",
                        "bind" => array($email)
                ));
                    if($user)
                    {
                        if($this->security->checkHash($password, $user->getPassword()))
                        {
                            $this->_registerSession($user);
                            
                            return $this->response->redirect("calendar/index/1"); 
                            
                        }
                        else
                        {
                            $this->flashSession->error("Sorry! We could not find your password.");
                            
                        }
                    }
                    else
                    {
                        $this->flashSession->error("Sorry! We could not find your email.");
                    }
            
            }
           					
        }
	
          
    
    }
    
    public function endAction()
    {
        $this->session->remove('auth');
        $this->flashSession->success('Goodbye! Come back to set up new Appointments!');
        
    }
}
