<?php 

class Employer {
    public $name;
    protected $email;
    public $number;
    private $position;

    public function __construct($name, $email, $number)
    {
        $this->name = $name;
        $this->email = $email;
        $this->number = $number;
    }

    public function getEmail(){
        echo $this->email;
    }

    public function SetPosition($position){
        if ( strlen($position) > 5){
            echo 'position cannot be set';
        }
        else {
            $this->position = $position;
            echo "position set successfully";
        }
    } 

    public function getPos(){
        echo $this->position;
    }

}

class Manger extends Employer{
    public $orders;

    public function __construct($name, $email, $number, $orders)
    {
        parent:: __construct($name, $email, $number);
        $this->orders = $orders;

    }



}

$Employee1 = new Employer("kOfi", "koff@gmail.com", 4444);
$Employee1->getPos();
$Employee1->SetPosition("Sup");

$Employee1->getPos();

$manger1 = new Manger("Kwaku", "kwaskww", 78, "Anther");
$manger1->getEmail();
echo $manger1->orders;

?>