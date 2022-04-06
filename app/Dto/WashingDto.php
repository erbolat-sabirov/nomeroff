<?php

namespace App\Dto;

use App\Base\BaseDto;

class WashingDto extends BaseDto
{
    public $id;
    public $car_id;
    public $service_id;
    public $status;
    public $service_items;
    public $washing_users;

    public function dbData(): array
    {
        $data = [
            'car_id' => $this->car_id,
            'service_id' => $this->service_id,
            'status' => $this->status,
        ];

        return del_arr_elem_if_null($data);
    }

    public function getServiceItems()
    {
        return $this->service_items;
    }

    public function getUsers()
    {
        return $this->washing_users;
    }

    /**
     * Get the value of car_id
     */ 
    public function getCar_id()
    {
        return $this->car_id;
    }

    /**
     * Set the value of car_id
     *
     * @return  self
     */ 
    public function setCar_id($car_id)
    {
        $this->car_id = $car_id;

        return $this;
    }

    /**
     * Get the value of service_id
     */ 
    public function getService_id()
    {
        return $this->service_id;
    }

    /**
     * Set the value of service_id
     *
     * @return  self
     */ 
    public function setService_id($service_id)
    {
        $this->service_id = $service_id;

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
     * Get the value of service_items
     */ 
    public function getService_items()
    {
        return $this->service_items;
    }

    /**
     * Set the value of service_items
     *
     * @return  self
     */ 
    public function setService_items($service_items)
    {
        $this->service_items = $service_items;

        return $this;
    }

    /**
     * Get the value of washing_users
     */ 
    public function getWashing_users()
    {
        return $this->washing_users;
    }

    /**
     * Set the value of washing_users
     *
     * @return  self
     */ 
    public function setWashing_users($washing_users)
    {
        $this->washing_users = $washing_users;

        return $this;
    }

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
}