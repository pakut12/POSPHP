<?php
class departmentdetails
{
    private $department_id;
    private $department_name;
    private $company_id;
    private $department_dete;

    // set user's first name
    public function setDepartmentid($department_id)
    {
        $this->department_id = $department_id;
    }
    // get user's first name
    public function getDepartmentid()
    {
        return $this->department_id;
    }

    public function setDepartmentName($department_name)
    {
        $this->department_name = $department_name;
    }
    // get user's first name
    public function getDepartmentName()
    {
        return $this->department_name;
    }

    public function setDepartmentdete($department_dete)
    {
        $this->department_dete = $department_dete;
    }
    // get user's first name
    public function getDepartmentdete()
    {
        return $this->department_dete;
    }

    /**
     * Get the value of company_id
     */ 
    public function getCompany_id()
    {
        return $this->company_id;
    }

    /**
     * Set the value of company_id
     *
     * @return  self
     */ 
    public function setCompany_id($company_id)
    {
        $this->company_id = $company_id;

        return $this;
    }
}
