<?php
namespace App\Traits;


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