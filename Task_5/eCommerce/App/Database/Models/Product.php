<?php

namespace App\Database\Models;

use App\Database\Config\Connection;
use App\Database\Contracts\Crud;

class Product extends Connection implements Crud
{
    private $id, $name_en, $name_ar, $code, $price, $quantity, $desc_en, $desc_ar,
        $image, $status, $brand_id, $subCategory_id, $created_at, $updated_at;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of desc_en
     */
    public function getDesc_en()
    {
        return $this->desc_en;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    /**
     * Get the value of desc_ar
     */
    public function getDesc_ar()
    {
        return $this->desc_ar;
    }

    /**
     * Set the value of desc_ar
     *
     * @return  self
     */
    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of brand_id
     */
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set the value of brand_id
     *
     * @return  self
     */
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }



    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of name_en
     */
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of name_ar
     */
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    public function create()
    {
    }
    public function read()
    {
        $query = "SELECT `id`,`name_en`,`price`,`desc_en`,`image` FROM `products` WHERE `status` = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $this->status);
        $stmt->execute();
        return $stmt->get_result();
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    //---------------------------------------------
    public function find()
    {
        $query = "SELECT * FROM `product_details` WHERE `id` = ? AND `status` = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('ii', $this->id, $this->status);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function specs()
    {
        $query = "SELECT `product_spec`.*, `spec`.`name` FROM `product_spec`
        JOIN `spec` ON `spec`.`id` = `product_spec`.`spec_id` WHERE
        `product_id` = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function reviews()
    {
        $query = "SELECT `review`.*,  CONCAT( `users`.`first_name`, ' ', `users`.`last_name`)
        AS `full_name` FROM `review` JOIN `users` ON `users`.`id` = `review`.`user_id`
        WHERE `product_id` = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $this->id);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Get the value of subCategory_id
     */
    public function getSubCategory_id()
    {
        return $this->subCategory_id;
    }

    /**
     * Set the value of subCategory_id
     *
     * @return  self
     */
    public function setSubCategory_id($subCategory_id)
    {
        $this->subCategory_id = $subCategory_id;

        return $this;
    }
}
