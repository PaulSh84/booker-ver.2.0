<?php

use Phalcon\Validation,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Message as Messages,
    Phalcon\Validation\Validator\Regex as RegexValidator,
    Phalcon\Validation\Validator\ExclusionIn,
    Phalcon\Validation\Validator\Between;

class FormValidation extends Validation
{
    
    /**
    *   @var array
    *
    */
    protected $_fields;
    
    /**
    *   @var array
    *
    */
    
    protected $bookValidators;
    
    /**
    *   @var array
    *
    */
    protected $updateValidators;
    /**
    *   @var array
    *
    */
    protected $messages;
    /**
    *   Using trimming filters
    *
    */
    
    public function _setFieldsToFilter($fields)
    {
        $this->_fields = $fields;
    }
    public function _useTrimFilters()
    {
        foreach($this->_fields as $key => $value)
        {
           $this->setFilters($key, $value); 
        }
    }
    /**
    * Validating inputs
    *
    */
    public function _getBookValidators()
    {
        foreach($this->bookValidators as $key => $value)
        {
            $this->rules($key, $value); 
        }
    }
    
    public function _getUpdateValidators()
    {
       foreach($this->updateValidators as $key => $value)
        {
            $this->rules($key, $value); 
        } 
    }
    
    public function _performValidation()
    {
        $this->messages = parent::validate($_POST);
    }
    
    public function _verifyMessages()
    {
        if(count($this->messages))
        {
            foreach ($this->messages as $message) 
            {
                $this->flashSession->warning($message);
            }
            
            return true; 
        }
        else
        {
            return false;
        }
    }
    public function initialize()
    {
               
        $this->bookValidators = [
        
            'month' => array(            
                            new PresenceOf(
                                array(
                                        'message' => 'Month is required',
                                        'cancelOnFail' => true
                                )
                            ),
                            new RegexValidator(
                                array(
                                        'pattern' => '/^\d{2}$/',                                                     'message' => 'The month is invalid'
                                )
                            )),
            'day' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'Day is required',
                                        'cancelOnFail' => true
                                )
                        ),
                        new RegexValidator(
                                array(
                                        'pattern' => '/^\d{2}$/',
                                        'message' => 'The day is invalid'
                                )
                        )),
            'year' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'Year is required',
                                        'cancelOnFail' => true
                                )
                        ),
                        new RegexValidator(
                                array(
                                        'pattern' => '/^\d{4}$/',
                                        'message' => 'The year is invalid'
                                )
                        )),
            'startTime' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'Start time is required',
                                        'cancelOnFail' => true
                                )
                        ),
                        new RegexValidator(
                                array(
                                        'pattern' => '/(^\d{2}:\d{2})$/',
                                        'message' => 'The Start time is invalid' 
                                )
                        ),
                        new ExclusionIn(
                                array(
                                        'message' => 'The Start time cannot be equal to the End time',
                                        'domain' => array($this->request->getPost('endTime'))
                                )
                        ),
                        new Between(
                                array(
                                        'minimum' => $this->request->getPost('startTime'),
                                        'maximum' => $this->request->getPost('endTime'),
                                        'message' => 'The start time cannot be greater than the end time'
                                )
            )),
            'endTime' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'End time is required',
                                        'cancelOnFail' => true
                                )
                        ),
                        new RegexValidator(
                                array(
                                        'pattern' => '/(^\d{2}:\d{2})$/',
                                        'message' => 'The End time is invalid'
                                )
                        )),
            'description' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'Description field is required'
                                )
                        )),
            'option1' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'Event should be either recurrent or non-recurrent!'
                                )
                        )
            )
        
        ]; 
        
        $this->updateValidators = [
            
            'startTime' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'Start time is required',
                                        'cancelOnFail' => true
                                )
                        ),
                        new RegexValidator(
                                array(
                                        'pattern' => '/(^\d{2}:\d{2})$/',
                                        'message' => 'The Start time is invalid'
                                )
                        ),
                        new ExclusionIn(
                                array(
                                        'message' => 'The Start time cannot be equal to the End time',
                                        'domain' => array($this->request->getPost('endTime'))
                                )
                        ),
                        new Between(
                                array(
                                        'minimum' => $this->request->getPost('startTime'),
                                        'maximum' => $this->request->getPost('endTime'),
                                        'message' => 'The start time cannot be greater than the end time'
                                )
                        )
            ),
            'endTime' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'End time is required',
                                        'cancelOnFail' => true
                                )
                        ),
                        new RegexValidator(
                                array( 
                                        'pattern' => '/(^\d{2}:\d{2})$/',
                                        'message' => 'The End time is invalid'
                                )
                        )
            ),
            'notes' => array(
                        new PresenceOf(
                                array(
                                        'message' => 'Notes field is required',
                                )
                        )
            )
        ];
        
        // If recurring events are selected
        if($this->request->getPost('option1') == 'Yes')
        {
            $this->add(
                    'option2',
                        new PresenceOf(
                            array(
                                    'message' => 'Event is to be either weekly, bi-weekly or monthly!',
                                 )
                        )
            );
                
            $this->add(
                'quantity',
                        new PresenceOf(
                            array(
                                    'message' => 'Please select the duration of the event!',
                                 )
                        )
            ); 
        }
        
    }
}



