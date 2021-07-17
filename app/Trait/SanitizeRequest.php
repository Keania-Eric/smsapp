<?php
namespace App\Trait;


trait SanitizeRequest
{
    
    /**
     * Method getSanitized
     *
     * @return array
     */
    public function getSanitized()
    {
        $data = $this->validated();

        return $data;
    }
}