<?php

namespace App\Dto;

use App\Base\BaseDto;

class WashingTimeDto extends BaseDto
{

    public $washing_id;
    public $time;
    public $status;
    
    public function dbData(): array
    {
        return [
            'washing_id' => $this->washing_id,
            'time' => $this->time,
            'status' => $this->status,
        ];
    }

    /**
     * Get the value of washing_id
     */ 
    public function getWashing_id()
    {
        return $this->washing_id;
    }

    /**
     * Set the value of washing_id
     *
     * @return  self
     */ 
    public function setWashing_id($washing_id)
    {
        $this->washing_id = $washing_id;

        return $this;
    }

    /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

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
}