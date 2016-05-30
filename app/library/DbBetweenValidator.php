<?php

use Phalcon\Mvc\Model\Validator;
use Phalcon\Mvc\Model\ValidatorInterface;
use Phalcon\Mvc\EntityInterface;
use Phalcon\Mvc\Model\Query;

class DbBetweenValidator extends Validator implements ValidatorInterface
{
    /**
    ** $var protected
    */
    protected $_bindParams;
    /**
   
    /**
    **  This Validator makes sure that there is no time collision between existing and new events.
    **
    */
    public function validate(EntityInterface $model)
    {
        $newStart   = $this->getOption('startTime');
        $newEnd   = $this->getOption('endTime');
        $date = $this->getOption('startDate');
        $roomNum = $this->getOption('roomNumber');
        $apptID = $this->getOption('apptID');
        
        /**
        **  CREATE Operation == 1
        **  UPDATE Operation == 2
        **/
        
        if($model->getOperationMade() === 1)
        {
           $phql = 'SELECT appointment_id, event_time 
                 FROM Appointments 
                    WHERE ((start_time <= :start: AND :start: <= end_time) 
                        OR (start_time <= :end: AND :end: <= end_time) 
                        OR (:start: <= start_time AND end_time <= :end:))
                    AND start_date = :date:
                    AND room_number = :roomNum:'; 
            
           $this->_bindParams = array(
                                    'start' => $newStart,
                                    'end'   => $newEnd,
                                    'date' => $date,
                                    'roomNum' => $roomNum
            );
        }
        elseif($model->getOperationMade() === 2)
        {
            $phql = 'SELECT appointment_id, event_time 
                 FROM Appointments 
                    WHERE ((start_time <= :start: AND :start: <= end_time) 
                        OR (start_time <= :end: AND :end: <= end_time) 
                        OR (:start: <= start_time AND end_time <= :end:))
                    AND start_date = :date:
                    AND room_number = :roomNum:
                    AND appointment_id != :apptID:';
            
            $this->_bindParams = array(
                                    'start' => $newStart,
                                    'end'   => $newEnd,
                                    'date' => $date,
                                    'roomNum' => $roomNum,
                                    'apptID' => $apptID
            );    
            
        }
        
        $query = new Query($phql, Phalcon\DI::getDefault());
        
        $results = $query->execute($this->_bindParams);
        
       
        if($results->count() > 0) 
        {
            $this->appendMessage(
                                '<b>Sorry,</b> 
                                <br><b>['.$results->getFirst()->event_time.']</b> appt is in collision with your time!',
                                    
                                    "DbBetweenValidator"
            );

                return false;
        }
            return true;
    }
}
