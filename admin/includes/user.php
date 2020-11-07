<?php 
class User extends Db_object{
    public $id;
    public $filename;
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $phone_no;
    public $address_id;
    public $dob;
    public $user_type;


    public static $db_table = "users";
    public static $db_table_fields = array('filename','first_name','last_name','email','password','phone_no','dob','user_type');
    


}



?>