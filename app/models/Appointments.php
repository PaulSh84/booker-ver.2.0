<?php

use Phalcon\Mvc\Model\Validator\Uniqueness;

class Appointments extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     */
    protected $appointment_id;

    /**
     *
     * @var integer
     */
    protected $employee_id;

    /**
     *
     * @var string
     */
    protected $created_at;

    /**
     *
     * @var integer
     */
    protected $room_number;

    /**
     *
     * @var string
     */
    protected $start_date;

    /**
     *
     * @var string
     */
    protected $start_time;

    /**
     *
     * @var string
     */
    protected $end_time;

    /**
     *
     * @var string
     */
    protected $event_time;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var integer
     */
    protected $weekly;

    /**
     *
     * @var integer
     */
    protected $bi_weekly;

    /**
     *
     * @var integer
     */
    protected $monthly;

    /**
     *
     * @var integer
     */
    protected $parent_id;

    /**
     * Method to set the value of field appointment_id
     *
     * @param integer $appointment_id
     * @return $this
     */
    public function setAppointmentId($appointment_id)
    {
        $this->appointment_id = $appointment_id;

        return $this;
    }

    /**
     * Method to set the value of field employee_id
     *
     * @param integer $employee_id
     * @return $this
     */
    public function setEmployeeId($employee_id)
    {
        $this->employee_id = $employee_id;

        return $this;
    }

    /**
     * Method to set the value of field created_at
     *
     * @param string $created_at
     * @return $this
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Method to set the value of field room_number
     *
     * @param integer $room_number
     * @return $this
     */
    public function setRoomNumber($room_number)
    {
        $this->room_number = $room_number;

        return $this;
    }

    /**
     * Method to set the value of field start_date
     *
     * @param string $start_date
     * @return $this
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;

        return $this;
    }

    /**
     * Method to set the value of field start_time
     *
     * @param string $start_time
     * @return $this
     */
    public function setStartTime($start_time)
    {
        $this->start_time = $start_time;

        return $this;
    }

    /**
     * Method to set the value of field end_time
     *
     * @param string $end_time
     * @return $this
     */
    public function setEndTime($end_time)
    {
        $this->end_time = $end_time;

        return $this;
    }

    /**
     * Method to set the value of field event_time
     *
     * @param string $event_time
     * @return $this
     */
    public function setEventTime($event_time)
    {
        $this->event_time = $event_time;

        return $this;
    }

    /**
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field weekly
     *
     * @param integer $weekly
     * @return $this
     */
    public function setWeekly($weekly)
    {
        $this->weekly = $weekly;

        return $this;
    }

    /**
     * Method to set the value of field bi_weekly
     *
     * @param integer $bi_weekly
     * @return $this
     */
    public function setBiWeekly($bi_weekly)
    {
        $this->bi_weekly = $bi_weekly;

        return $this;
    }

    /**
     * Method to set the value of field monthly
     *
     * @param integer $monthly
     * @return $this
     */
    public function setMonthly($monthly)
    {
        $this->monthly = $monthly;

        return $this;
    }

    /**
     * Method to set the value of field parent_id
     *
     * @param integer $parent_id
     * @return $this
     */
    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * Returns the value of field appointment_id
     *
     * @return integer
     */
    public function getAppointmentId()
    {
        return $this->appointment_id;
    }

    /**
     * Returns the value of field employee_id
     *
     * @return integer
     */
    public function getEmployeeId()
    {
        return $this->employee_id;
    }

    /**
     * Returns the value of field created_at
     *
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Returns the value of field room_number
     *
     * @return integer
     */
    public function getRoomNumber()
    {
        return $this->room_number;
    }

    /**
     * Returns the value of field start_date
     *
     * @return string
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * Returns the value of field start_time
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Returns the value of field end_time
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Returns the value of field event_time
     *
     * @return string
     */
    public function getEventTime()
    {
        return $this->event_time;
    }

    /**
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field weekly
     *
     * @return integer
     */
    public function getWeekly()
    {
        return $this->weekly;
    }

    /**
     * Returns the value of field bi_weekly
     *
     * @return integer
     */
    public function getBiWeekly()
    {
        return $this->bi_weekly;
    }

    /**
     * Returns the value of field monthly
     *
     * @return integer
     */
    public function getMonthly()
    {
        return $this->monthly;
    }

    /**
     * Returns the value of field parent_id
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('employee_id', 'Employees', 'employee_id', array('alias' => 'Employees'));
        
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'appointment_id' => 'appointment_id', 
            'employee_id' => 'employee_id', 
            'created_at' => 'created_at', 
            'room_number' => 'room_number', 
            'start_date' => 'start_date',
            'start_time' => 'start_time',
            'end_time' => 'end_time',
            'event_time' => 'event_time', 
            'description' => 'description', 
            'weekly' => 'weekly', 
            'bi_weekly' => 'bi_weekly', 
            'monthly' => 'monthly', 
            'parent_id' => 'parent_id'
        );
    }


    public function validation()
    {
        $this->validate(
              new Uniqueness(
                          array(
                                  'field'   => ['room_number', 'start_date', 'event_time'],  
                                  'message' => 'Sorry, reserved. Please choose another Room, Date or Time!'                 
                          )
              )
        );
        
        if ($this->validationHasFailed() == true) 
        {
            return false;
        }
        
        $this->validate(
            new DbBetweenValidator(
                array(
                    'startTime' => $this->start_time,
                    'endTime' => $this->end_time,
                    'startDate' => $this->start_date,
                    'roomNumber' => $this->room_number,
                    'apptID' => $this->appointment_id
                )
            )
        );
        
        if ($this->validationHasFailed() == true) 
        {
            return false;
        }
   }

    public function _createAppts()
    {   
        //Adding recurring events
        $parentID = $this->appointment_id;
        $startDate = $this->start_date;
        
        if(!$this->weekly == NULL)
        {
            $eventType = 'weekly';
            $frequency = $this->weekly;
        }
        else if(!$this->bi_weekly == NULL)
        {
            $eventType = 'bi-weekly';
            $frequency = $this->bi_weekly;
        }
        else if(!$this->monthly == NULL)
        {
            $eventType = 'monthly';
            $frequency = $this->monthly;
        }
        else
        {
            return ['result' => true];
        }
            $success = $this->_createMultipleAppts($frequency, $eventType, $parentID, $startDate);
        
        
            return $success;
    }

    public function _createMultipleAppts($frequency, $eventType, $parentID, $startDate)
    {
        for($i = 1; $i < $frequency; $i++)
        {
            $date = $this->_dateModification($startDate, $eventType, $i);
            $event = new Appointments();
            
            
            $success = $event->create(
                        array(
                                'appointment_id' => '', 
                                'employee_id' => $this->employee_id, 
                                'created_at' => date(DATE_RFC3339), 
                                'room_number' => $this->room_number, 
                                'start_date' => $date,
                                'start_time' => $this->start_time,
                                'end_time'  =>  $this->end_time,
                                'event_time' => $this->event_time, 
                                'description' => $this->description, 
                                'weekly' => NULL, 
                                'bi_weekly' => NULL, 
                                'monthly' => NULL, 
                                'parent_id' => $parentID
                        )
            );
            
            if(!$success)
            {
                return ['obj' => $event, 'result' => false];
            }
        }
            return ['result' => true];
    }

    public function _dateModification($startDate, $eventType, $i)
    {
        
        $date = new DateTime($startDate);
        
        if($eventType == 'weekly')
        {
            $format = '+' . $i . 'week';
            
            $date->modify($format);
                
        }
        else if($eventType == 'bi-weekly')
        {
            $format = '+' . $i * 2 . 'week';
            
            $date->modify($format);
                        
        }
        else if($eventType == 'monthly')
        {
           $date->modify('+1 month'); 
        }
            return $date->format('Y-m-d');
    }
    
    public function _updateMultipleAppts()
    {
        $children = $this->find([
                        'conditions' => 'parent_id = :parent:',
                        'bind' => [
                                        'parent' => $this->getAppointmentId()
                                  ]
        ]);
        
        foreach($children as $childEvent)
        {
            $childEvent->setStartTime($this->start_time);
            $childEvent->setEndTime($this->end_time);
            $childEvent->setEventTime($this->event_time);
            $childEvent->setDescription($this->description);
            
            if(!$childEvent->update())
            {
                return ['obj' => $childEvent, 'result' => false ];
            }
        }
            return ['result' => true];
    }
    
    public function _updateAllFollowingAppts()
    {
        $children = $this->find([
                        'conditions' => 'parent_id = :parent: AND start_date > :date:',
                        'bind' => [
                                    'parent' => $this->getParentId(),
                                    'date' => $this->getStartDate()
                        ]
        ]);
            foreach($children as $childEvent)
            {
                $childEvent->setStartTime($this->start_time);
                $childEvent->setEndTime($this->end_time);
                $childEvent->setEventTime($this->event_time);
                $childEvent->setDescription($this->description);
                
                if(!$childEvent->update())
                {
                    return ['obj' => $childEvent, 'result' => false ];
                }
            }
                    return ['result' => true];
    }
    
    public function _deleteAppts()
    {
        $children = $this->find([
                        'conditions' => 'parent_id = :parent:',
                        'bind' => [
                                    'parent' => $this->getAppointmentId()
                                  ]
        ]);
        
        foreach($children as $childEvent)
        {
          $childEvent->delete();  
        }
        
        $this->delete();
    }
    
    public function _deleteAllFollowingAppts()
    {
        $children = $this->find([
                                    'conditions' => 'parent_id = :parent: AND start_date > :date:',
                                    'bind' => [
                                                    'parent' => $this->getParentId(),
                                                    'date' => $this->getStartDate()
                                    ]
        ]);
        
        foreach($children as $childEvent)
        {
          $childEvent->delete();  
        }
        
        $this->delete();
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'appointments';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Appointments[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Appointments
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }
    
    

}
