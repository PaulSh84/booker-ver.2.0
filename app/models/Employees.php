<?php

use Phalcon\Mvc\Model\Validator\Email as Email;

class Employees extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $employee_id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var integer
     */
    protected $admin_role;

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
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field admin_role
     *
     * @param integer $admin_role
     * @return $this
     */
    public function setAdminRole($admin_role)
    {
        $this->admin_role = $admin_role;

        return $this;
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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field admin_role
     *
     * @return integer
     */
    public function getAdminRole()
    {
        return $this->admin_role;
    }

    /**
     * Validations and business logic
     */
    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('employee_id', 'Appointments', 'employee_id', array('alias' => 'Appointments'));
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'employee_id' => 'employee_id', 
            'name' => 'name', 
            'email' => 'email', 
            'password' => 'password', 
            'admin_role' => 'admin_role'
        );
    }

}
