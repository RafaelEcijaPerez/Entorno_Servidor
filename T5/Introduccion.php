<?php 
$username = 'Ivy'; 
$user_array = [ 
    'name' => 'Ivy', 
    'age' => 24, 
    'active' => true,
]; 
class User
{ 
    public $name; 
    public $age; 
    public $active; 
    public function __construct($name, $age, $active) { 
        $this->name= $name; 
        $this->age = $age; 
        $this->active = $active;
    }
};
$user_object = new User('Ivy', 24, true); 
?> 

<pre>Scalar: <?php var_dump($username); ?></pre>
<pre>Array: <?php var_dump($user_array); ?></pre> 
<pre>Object: <?php var_dump($user_object); ?></pre>
