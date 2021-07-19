<?php
namespace App\Services;

use GuzzleHttp\Client;
use App\Services\SMSResponse;
use App\Contracts\ShortMessageService;
use Illuminate\Support\Facades\Config;


class SMS implements ShortMessageService
{

    protected $sender;

    protected $baseUri;

    protected $apiUsername;

    protected $apiPassword;

    protected $client;

    public function __construct()
    {
       
        $this->setBaseURI();
        $this->setSender();
        $this->setUsername();
        $this->setPassword();
        $this->setupClient();
    }
    
    /**
     * Method setSender
     *
     * @return void
     */
    protected function setSender()
    {
        $this->sender = Config::get('sms.smsprovider.sender');
    }
    
    /**
     * Method setUsername
     *
     * @return void
     */
    protected function setUsername()
    {
        $this->apiUsername = Config::get('sms.smsprovider.username');
    }
    
    /**
     * Method setPassword
     *
     * @return void
     */
    protected function setPassword()
    {
        $this->apiPassword = Config::get('sms.smsprovider.password');
    }
    
    /**
     * Method setBaseURI
     *
     * @return void
     */
    protected function setBaseURI()
    {
        $this->baseUri = Config::get('sms.smsprovider.baseUri');
    }
    
    /**
     * Method setupClient
     *
     * @return void
     */
    protected function setupClient()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'headers' => [
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ]
        ]);
    }

    
    /**
     * Method sendSMS
     *
     * @param $message $message [explicite description]
     * @param $mobiles $mobiles [explicite description]
     *
     * @return void
     */
    public function sendSMS($message, $mobiles)
    {
        $response = $this->makeRequest($message, $mobiles);
        return new SMSResponse($response->getBody()->getContents());
    }
    
    /**
     * Makes a request to the API 
     *
     * @param $message $message [explicite description]
     * @param $mobiles $mobiles [explicite description]
     *
     * @return void
     */
    protected function makeRequest($message, $mobiles)
    {
        return $this->client->request('GET', '/api', [
            'query'=> [
                'sender'=> $this->sender,
                'username'=> $this->apiUsername,
                'password'=> $this->apiPassword,
                'message'=> $message,
                'mobiles'=> $mobiles
            ]
        ]); 
    }

    
}