<?php

namespace SerasaExperian;

final class SerasaExperianProxy {
    
    const WSDL = 'https://sitenet.serasa.com.br:443/experian-data-licensing-ws/dataLicensingService?wsdl';
    const WSDL_HOMOLOG = 'https://sitenethomologa.serasa.com.br/experian-data-licensing-ws/dataLicensingService?wsdl';
    
    private $username;
    
    private $password;
    
    /**
     *
     * @var SerasaExperianProxy
     */
    private static $instance;
    
    /**
     *
     * @var boolean
     */
    private static $homologacao = false;
    
    /**
     *
     * @var \SoapClient
     */
    private $client;


    private function __construct() {
        $wsdl = $this->getWsdl();
        $options = $this->getOptions();
        
        $this->client = new \SoapClient($wsdl, $options);
    }
    
    /**
     * 
     * @return SerasaExperianProxy
     */
    public static function getInstance() {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }
    
    public static function setHomologacao($homologacao) {
        self::$homologacao = $homologacao;
    }
    
    /**
     * 
     * @return \SoapClient
     */
    public function getClient() {
        return $this->client;
    }
    
    public function setCredentials($username, $password) {
        $this->username = $username;
        $this->password = $password;
        
        $this->setHeader();
    }
    
    public function getCredentials() {
        return array(
            'username' => $this->username,
            'password' => $this->password,
        );
    }
    
    protected function setHeader() {
        $this->client->__setSoapHeaders(Array(new WsseAuthHeader($this->username, $this->password)));
    }
    
    private function getWsdl() {
        return self::$homologacao ? self::WSDL_HOMOLOG : self::WSDL;
    }
    
    private function getOptions() {
        $options = [
            'cache_wsdl' => WSDL_CACHE_NONE
        ];
        
        if (self::$homologacao) {
            $options['trace'] = 1;
        }
        
        return $options;
    }
    
}