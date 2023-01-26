<?php
class User
{
    public $login;
    public $pass;
    public $email;
    public $name;
    
    public function __construct($login, $pass, $email, $name)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->email = $email;
        $this->name = $name;
    }

     
    function Authorizatio($login, $pass) {
        
    } 
}
?>
