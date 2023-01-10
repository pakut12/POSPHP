<?php
class productdetails
{
    private $product_id;
    private $product_group;
    private $product_mat_no;
    private $product_mat_barcode;
    private $product_mat_name_th;
    private $product_color_id;
    private $product_size_id;
    private $product_sale_price;
    private $date_create;


    public function setproduct_id($product_id)
    {
        $this->product_id = $product_id;
    }
    public function getproduct_id()
    {
        return $this->product_id;
    }

    public function setproduct_group($product_group)
    {
        $this->product_group = $product_group;
    }
    public function getproduct_group()
    {
        return $this->product_group;
    }


    public function setproduct_mat_barcode($product_mat_barcode)
    {
        $this->product_mat_barcode = $product_mat_barcode;
    }
    public function getproduct_mat_barcode()
    {
        return $this->product_mat_barcode;
    }


    public function setproduct_mat_no($product_mat_no)
    {
        $this->product_mat_no = $product_mat_no;
    }
    public function getproduct_mat_no()
    {
        return $this->product_mat_no;
    }

    public function setproduct_mat_name_th($product_mat_name_th)
    {
        $this->product_mat_name_th = $product_mat_name_th;
    }
    public function getproduct_mat_name_th()
    {
        return $this->product_mat_name_th;
    }


    public function setproduct_color_id($product_color_id)
    {
        $this->product_color_id = $product_color_id;
    }
    public function getproduct_color_id()
    {
        return $this->product_color_id;
    }


    public function setproduct_size_id($product_size_id)
    {
        $this->product_size_id = $product_size_id;
    }
    public function getproduct_size_id()
    {
        return $this->product_size_id;
    }
    

    public function setproduct_sale_price($product_sale_price)
    {
        $this->product_sale_price = $product_sale_price;
    }
    public function getproduct_sale_price()
    {
        return $this->product_sale_price;
    }


    public function setdate_create($date_create)
    {
        $this->date_create = $date_create;
    }
    public function getdate_create()
    {
        return $this->date_create;
    }
}
