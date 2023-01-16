<?php
class orderdetails
{
    private $doc_id;
    private $product_id;
    private $product_mat_no;
    private $product_qty;
    private $customer_code;
    private $customer_prefix;
    private $customer_firstname;
    private $customer_lastname;
    private $department_name;
    private $company_name;

    /**
     * Get the value of doc_id
     */ 
    public function getDoc_id()
    {
        return $this->doc_id;
    }

    /**
     * Set the value of doc_id
     *
     * @return  self
     */ 
    public function setDoc_id($doc_id)
    {
        $this->doc_id = $doc_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of product_mat_no
     */ 
    public function getProduct_mat_no()
    {
        return $this->product_mat_no;
    }

    /**
     * Set the value of product_mat_no
     *
     * @return  self
     */ 
    public function setProduct_mat_no($product_mat_no)
    {
        $this->product_mat_no = $product_mat_no;

        return $this;
    }

    /**
     * Get the value of product_qty
     */ 
    public function getProduct_qty()
    {
        return $this->product_qty;
    }

    /**
     * Set the value of product_qty
     *
     * @return  self
     */ 
    public function setProduct_qty($product_qty)
    {
        $this->product_qty = $product_qty;

        return $this;
    }

    /**
     * Get the value of customer_code
     */ 
    public function getCustomer_code()
    {
        return $this->customer_code;
    }

    /**
     * Set the value of customer_code
     *
     * @return  self
     */ 
    public function setCustomer_code($customer_code)
    {
        $this->customer_code = $customer_code;

        return $this;
    }

    /**
     * Get the value of customer_prefix
     */ 
    public function getCustomer_prefix()
    {
        return $this->customer_prefix;
    }

    /**
     * Set the value of customer_prefix
     *
     * @return  self
     */ 
    public function setCustomer_prefix($customer_prefix)
    {
        $this->customer_prefix = $customer_prefix;

        return $this;
    }

    /**
     * Get the value of customer_firstname
     */ 
    public function getCustomer_firstname()
    {
        return $this->customer_firstname;
    }

    /**
     * Set the value of customer_firstname
     *
     * @return  self
     */ 
    public function setCustomer_firstname($customer_firstname)
    {
        $this->customer_firstname = $customer_firstname;

        return $this;
    }

    /**
     * Get the value of customer_lastname
     */ 
    public function getCustomer_lastname()
    {
        return $this->customer_lastname;
    }

    /**
     * Set the value of customer_lastname
     *
     * @return  self
     */ 
    public function setCustomer_lastname($customer_lastname)
    {
        $this->customer_lastname = $customer_lastname;

        return $this;
    }

    /**
     * Get the value of department_name
     */ 
    public function getDepartment_name()
    {
        return $this->department_name;
    }

    /**
     * Set the value of department_name
     *
     * @return  self
     */ 
    public function setDepartment_name($department_name)
    {
        $this->department_name = $department_name;

        return $this;
    }

    /**
     * Get the value of company_name
     */ 
    public function getCompany_name()
    {
        return $this->company_name;
    }

    /**
     * Set the value of company_name
     *
     * @return  self
     */ 
    public function setCompany_name($company_name)
    {
        $this->company_name = $company_name;

        return $this;
    }
}
