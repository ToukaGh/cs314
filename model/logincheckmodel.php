<?php
    include_once 'ExecQuery.php';
    include_once 'ConcreteImp.php';
   require_once '../validation.php';
   require_once 'type.php';
    class ProxyDP implements ExecQuery
    {
        
        public $email;
        public $password;
        public $Object;
        function __construct($email,$password)
        {
            $con = mysqli_connect("localhost","root","","phase2");
           
           if(!$con)
            {
                die('Could not connect:' );
              
             
            }
      
     
            else
            {
                $sql="SELECT * FROM user WHERE email = '$email' AND password = '$password'";
                $AdminDataSet = mysqli_query($result,$sql);
                $num = mysqli_num_rows($AdminDataSet);
                if($num > 0)
                {
                        $row = mysqli_fetch_array($AdminDataSet);
                        $this->email = $row["email"];
                        $this->password = $row["password"];
                        $this->Object = new type($row["user_type_id"]);
                        
                        $sql2 = "SELECT * FROM user_type";
                        $UserTypeDataSet = mysqli_query($result,$sql2);
                        while($row = mysqli_fetch_array($UserTypeDataSet))
                        {
                           
                            
                           if($type == $this->Object->name && $this->email == $email && $this->password == $password)
                            {
                               // $sql3 = "SELECT * FROM user_type_pages WHERE usertype_id = '$this->Object->name'";
                                //$result = mysqli_query($con,$sql3);
                                //$row2 = mysqli_fetch_array($result);
                                echo("usertype");
                              //  $user_pageObj = new user_type_pages($row2["id"]);
                              //  if ($user_pageObj->page_id != "")
                                //{
                                  //  echo "<br><a href=".$Object->page_id->HTML."></a>";
                                    break;
                                //}
                               
                            }
        
                        }
                      
                }
                else
                {
                    $errs = new ErrorPage();
                    if (Validation::isNullOrEmpty($username) || !Validation::isValidEmail($username)) {
                        $errs->emit(ErrorMsg::INVALID_EMAIL);
                    }
                    
                    if (Validation::isNullOrEmpty($password)) {
                           // $errs->add("Invalid Password: '$password'");
                        $errs->emit(ErrorMsg::INVALID_PASSWORD);
                    }
                   
                }
                
           }
        
        }

        public function executeQuery($Query) {
            
            if($this->userTypeObj->name == "User")
            {
                $admin = new ConcreteImp();
                $admin->executeQuery($Query);
            }
            if($this->userTypeObj->name == "DepartmentHead")
            {
                $admin = new ConcreteImp();
                $admin->executeQuery($Query);
            }
            if($this->userTypeObj->name == "Dispatcher")
            {
                $admin = new ConcreteImp();
                $admin->executeQuery($Query);
            }
    }
}


?>
