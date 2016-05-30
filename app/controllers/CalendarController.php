<?php

use Phalcon\Validation\Message as Messages;

class CalendarController extends ControllerBase
{
    /*      
    ** Properties
    */

    /*
    ** @var array
    */
    private $user;
    
    /*
    ** Additional Methods
    */
    
    /**
    * To return the whole list of employees and provide it for admin convenience
    * @private user
    * @return array Array of employee's names in ascending order
    */
    public function _getAllEmployees()
    {
        $allEmployees = Employees::find(
            [
                'columns' => 'employee_id, name',
                'order' => 'name ASC'
            ]
        );
        
          return $allEmployees;
    }
    /**
     * Provide to View User/Admin details
     * @private user
     */
    public function _getUserDetails()
    {   
        //Getting details from Session
        $this->user = $this->session->get('auth');
        //Verify if the user admin or not
        if($this->user['admin_role'] == "1")
        {
            //Sending All Employees for Admin
            $this->view->allEmployees = $this->_getAllEmployees();
            //Sending AdminData to View
            $this->view->user = $this->user;
        }
        else
        {
            //Sending UserData to View
            $this->view->user = $this->user;
        }
    }
    
    public function _getEventsData()
    {
        //Getting page id in order to search for appointments under correct room #
        $room_id = $this->dispatcher->getParams('','int')[0];
        
        $events = Appointments::find(
                
                ['columns' => 'start_date, event_time, appointment_id',
                 'conditions' => 'room_number = :roomId:',
                 'bind' => [
                    'roomId' => $room_id
                            ]
                ]
        );
        //Preparing json file to send to view
        foreach($events as $event){
        
            $data[] = array(
                                'title' => $event->event_time,
                                'start' => $event->start_date,
                                'url' => UPDATE_URL . $event->appointment_id
            );
        }
            $eventData = json_encode($data, JSON_NUMERIC_CHECK);
        
            //Sending json to View
            $this->view->setVar('data', $eventData);
    }
    /*
    **  /* Date and Time prepared to insert
    **
    */
    public function _createStartDate()
    {
        //Event Date
        $month = $this->request->getPost('month');
            
        $day = $this->request->getPost('day');
        
        $year = $this->request->getPost('year');
        
        $date = new DateTime();
        
        $start_date = $date->setDate($year, $month, $day)->format('Y-m-d');
        
            return $start_date;
        
    }
    public function _createEventTime()
    {
         //Event Time                        
        $startTime = $this->request->getPost('startTime');
            
        $endTime = $this->request->getPost('endTime');
                
        $event_time = "".$startTime." - ".$endTime."";
        
            return $event_time;
    }
    
    public function _createEvents()
    {
            /* Getting POST data */      
        $employeeId = $this->request->getPost('names');
            
        $room_id = $this->dispatcher->getParams('','int')[0];
        
        $startTime = $this->request->getPost('startTime');
            
        $endTime = $this->request->getPost('endTime');
                        
        $description = $this->request->getPost('description');
             
        $recurrence = $this->request->getPost('option1');
                                 
        $recurrenceType = $this->request->getPost('option2');
            
        $frequency = $this->request->getPost('quantity');
        
        //Starting a PDO transaction
        $this->db->begin();
        /* Creating new Event */
        $event = new Appointments();
                    
        if($recurrence == "Yes" && $recurrenceType == "weekly")
         {
            $event->setWeekly($frequency);
         }
        else if($recurrence == "Yes" && $recurrenceType == "bi-weekly")
        {
            $event->setBiWeekly($frequency);
        }
        else if($recurrence == "Yes" && $recurrenceType == "monthly")
        {
            $event->setMonthly($frequency);
        }
            //Setting the values for the appointment
            $event->setEmployeeId($employeeId);
            $event->setCreatedAt(date(DATE_RFC3339));
            $event->setRoomNumber($room_id);
            $event->setStartDate($this->_createStartDate());
            $event->setStartTime($startTime);
            $event->setEndTime($endTime);
            $event->setEventTime($this->_createEventTime());
            $event->setDescription($description);
        
            $this->_goCreateEvents($event);
        
    }
    
    public function _goCreateEvents($event)
    {
        if(!$event->create())
        {
            $this->db->rollback();
            
            $this->_returnErrorMessages($event);
        }
        else
        {
           $success = $event->_createAppts(); 
        }
        
        if(!$success['result'])
        {
            $this->db->rollback();
            
            $this->_returnErrorMessages($success['obj']);
        }
        else
        {
            $this->db->commit();
            $this->flashSession->success(CREATE_MESSAGE);             
        }
        
    }
    
    public function _returnErrorMessages($event)
    {
         foreach($event->getMessages() as $message)
         {
             $this->flashSession->warning($message);
         }
    }
    
    public function _processUpdate()
    {
        $this->db->commit();
            
        $this->_processForwarding(UPDATE_MESSAGE);
    }
    
    public function _updateEvents($event, $multipleEvents = false)
    {
        /* Updating events */
        $timeStart = $this->request->getPost('startTime');
        $timeEnd = $this->request->getPost('endTime');
        $description = $this->request->getPost('notes');
            
        /* Starting PDO transaction */
            $this->db->begin();
        
        $event->setStartTime($timeStart);
        $event->setEndTime($timeEnd);
        $event->setEventTime($this->_createEventTime());
        $event->setDescription($description);
        
        if($multipleEvents)
        {
            $this->_goUpdateMultipleEvents($event);    
        }
        else
        {
            $this->_goUpdateOneEvent($event);    
        }
            
    }
    
    public function _goUpdateOneEvent($event)
    {
        if(!$event->update())
        {
            $this->db->rollback();
            
            $this->_returnErrorMessages($event);
        }               
        else
        {
            $this->_processUpdate();
        }
    }
    
    public function _goUpdateMultipleEvents($event)
    {
        if(!$event->update())
        {
            $this->db->rollback();
        
            $this->_returnErrorMessages($event);
        }
        else
        {   
            $success = ($event->getParentId() == NULL) ? $event->_updateMultipleAppts() : $event->_updateAllFollowingAppts();
                
            if(!$success['result'])
            {
                $this->db->rollback();   
                        
                $this->_returnErrorMessages($success['obj']);
            }
            else
            {
               $this->_processUpdate();
            }        
        }
    }
    
    public function _processSingleRemoval($event)
    {
        if(!$event->delete())
        {
            $this->_returnErrorMessages($event);
        }
        else
        {
            $this->_processForwarding(DELETE_MESSAGE);
        }
    }
    
    public function _processForwarding($message)
    {
         $this->dispatcher->forward(
                                    array(					                     
                                            'controller' => 'calendar',
                                            'action' => 'done'	
                                    ));
        
        $this->flashSession->success($message);
    }
    /**
     * Main Methods
     */
    public function indexAction()
    {
        //Setting the title of the document
        $this->tag->setTitle('Calendar');
        
        //Assigning correct user from the session
        $this->_getUserDetails();
        
        //Providing events data for appropriate room number
        $this->_getEventsData();       
    }
    
    public function bookAction()
    {   
        $this->tag->setTitle('Book an Appointment');
        
        $this->_getUserDetails();
        
        
        if ($this->request->isPost())
        {
            /**
            * Validating inputs
            */
            $validation = new FormValidation();
            /*
            **
            ** Getting rid of spaces in our inputs
            */ 
            $fields = ['month' => 'trim', 
                       'day' => 'trim', 
                       'year' => 'trim', 
                       'startTime' => 'trim',
                       'endTime' => 'trim',
                       'description' => 'trim'
                      ];
            $validation->_setFieldsToFilter($fields);
           
            $validation->_useTrimFilters();
            
            //Selecting correct set of validators
            $validation->_getBookValidators();
                
            $validation->_performValidation();
                                     
            $invalid = $validation->_verifyMessages();
            
            if(!$invalid)
            {
                $this->_createEvents();
            }
            else 
            {
                $this->view->postVars = $this->request->getPost();
            }
        }
    }

	public function updateAction()
	{
        $this->tag->setTitle('Update/Delete an Appointment');
        
        //Sending user data
        $this->_getUserDetails();
        
        /* Sending data for particular event into view */
        $this->persistent->searchParms = null;
        
        $appt_id = $this->dispatcher->getParams('','int')[0];
        
        $event = Appointments::findFirst($appt_id);
                
        /* Sending start and end time into view */
        $this->view->startTime = $event->getStartTime();
        $this->view->endTime = $event->getEndTime();
        
        /* Sending employee Name and event Description with date, event was submitted, (room number as well) */
        $this->view->eventDescription = $event->getDescription();
        
        $this->view->employeeName = $event->employees->getName();
        
        $this->view->submitted = $event->getCreatedAt();
        $this->view->room_number = $event->getRoomNumber();
        
        /* Checking if event is reccuring and showing radio button if so. */
                
        if($event->getParentId() == NULL)
        {   
            $success = Appointments::findFirst(
                                                'parent_id = ' . $event->getAppointmentId() . '');
            if($success)
            {
                // it's a parent event   
                $this->view->display = SHOW;
                $checkbox = true;
                $parent = true;
            }
           
            else
            {
                // it's a one-time event
                $this->view->display = HIDE;
                $checkbox = false;
                $oneTimeEvent = true;
            }
        }
        else
        {
            //it's one of the children
            $this->view->display = SHOW;
            $checkbox = true;
            $childEvent = true;
        }
        
        /* Updating current event or the entire occurence */
        
        if($this->request->isPost() && $this->request->hasPost('update'))
        {
            if($checkbox)
            {
                $checkbox = $this->request->getPost('option');    
            }
            /**
            * Validating inputs
            **/
            $validation = new FormValidation();
            /*
            ** Getting rid of spaces in our inputs
            */
                $fields = ['startTime' => 'trim',
                           'endTime' => 'trim',
                           'notes' => 'trim'
                      ];
            $validation->_setFieldsToFilter($fields);
           
            $validation->_useTrimFilters();
            
            //Selecting correct set of validators
            $validation->_getUpdateValidators();
                
            $validation->_performValidation();
                                     
            $invalid = $validation->_verifyMessages();
            
            /* Updating events */
            
            if(isset($oneTimeEvent) && !$invalid)
            {
                $this->_updateEvents($event, $multipleEvents = false);
            }
            elseif(isset($parent) && !$invalid)
            {
                if($checkbox == 'yes')
                {
                  $this->_updateEvents($event, $multipleEvents = true);
                }
                else
                {
                    $this->_updateEvents($event, $multipleEvents = false);
                }
            }
            elseif(isset($childEvent) && !$invalid)
            {
                if($checkbox == 'yes')
                {
                   $this->_updateEvents($event, $multipleEvents = true);
                }
                else
                {
                    $this->_updateEvents($event, $multipleEvents = false);
                }
            }
        }
        
		if($this->request->isPost() && $this->request->hasPost('delete'))
		{
            if($checkbox)
            {
                $checkbox = $this->request->getPost('option');    
            }
            
            if(isset($oneTimeEvent))
            {
               $this->_processSingleRemoval($event); 
            }
            elseif(isset($parent))
            {
               if($checkbox == 'yes')
               {
                   $event->_deleteAppts();
                
                   $this->_processForwarding(DELETE_MESSAGE);
               }
                else
                {
                    $this->_processSingleRemoval($event);                    
                }
            }
            elseif(isset($childEvent))
            {
                if($checkbox == 'yes')
               {
                   $event->_deleteAllFollowingAppts();
                
                   $this->_processForwarding(DELETE_MESSAGE);
               }
               else
               {
                   $this->_processSingleRemoval($event);                    
               }
            }
        }
	} 

	public function doneAction()
	{
         $this->tag->setTitle('DONE');
	}	
}