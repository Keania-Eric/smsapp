<?php
namespace App\Services;


class SMSResponse
{
    protected $data;

    public function __construct($response)
    {
        
        $this->data = $response;
    }
    
    /**
     * Method getStatus
     *
     * @return string
     */
    public function getStatus()
    {
        if(isset($this->data['error'])){
            return $this->buildErrorStatus();
        }else {
            return 'Request Successfull';
        }
    }
    
    /**
     * Gets the response status code
     *
     * @return void
     */
    public function getStatusCode()
    {
        return $this->data['errno'] ?? '000';
    }
    
    /**
     * Method buildErrorStatus
     *
     * @return void
     */
    protected function buildErrorStatus()
    {
        $errno = $this->data['errno'];
        $errCodeMapper = $this->errorCodeMap();
        return in_array($errno, $errCodeMapper) ? $errCodeMapper[$errno] : 'Unknown Error';
    }
    
    /**
     * Map errorno to descriptive text
     *
     * @return array
     */
    private function errorCodeMap()
    {
        return [
            '000'=> 'Request Successful',
            '100'=> 'Incomplete Request Parameters',
            '101'=> 'Request denied',
            '110'=> 'Login status failed',
            '111'=> 'Login status denied',
            '120'=> 'Message limit reached',
            '121'=> 'Mobile limit reached',
            '122'=> 'Sender limit reached',
            '130'=> 'Sender Prohibited',
            '131'=> 'Message Prohibited',
            '140'=> 'Invalid Price setup',
            '141'=> 'Invalid Route setup',
            '142'=> 'Invalid Schedule date',
            '150'=> 'Insufficient funds',
            '151'=> 'Gateway denied access',
            '152'=> 'Service denied access',
            '160'=> 'File upload error',
            '161'=> 'File upload limit',
            '162'=> 'File restricted',
            '190'=> 'Maintenance in progress',
            '191'=> 'Internal Error'
        ];
    }
}