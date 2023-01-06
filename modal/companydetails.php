<?php
class companydetails
{
    private $company_id;
    private $company_name;

    // set user's first name
    public function setCompanyid($company_id)
    {
        $this->company_id = $company_id;
    }
    // get user's first name
    public function getCompanyid()
    {
        return $this->company_id;
    }

    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
    }
    // get user's first name
    public function getCompanyName()
    {
        return $this->company_name;
    }
}
