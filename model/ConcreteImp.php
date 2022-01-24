<?php
 include_once 'ExecQuery.php';
class ConcreteImp implements ExecQuery
{
   public function ExecuteQuery($Query)
   {
    echo("DB Execute QUERY");
   }
}
?>