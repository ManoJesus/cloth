<?php
include("classes/Model/User.php");
include("classes/Persistence/Connection.php");
class UserDAO
{
    function getUserByEmail(string $email): ?User
    {
        $user = null;
        $conn = ConnectionManager::getConnection("project_php_a3");
        $sql = "select * from users where email  = '$email';";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result)){
                $user = new User($row["first_name"],
                $row["last_name"],
                $row["email"],
                $row["password"]);
            }
        }
        mysqli_close($conn);
        return $user;
    }

    function createUser(User $user): int
    {
        $conn = ConnectionManager::getConnection("project_php_a3");
        $sql = "insert into users(first_name,last_name,email,password) 
                values('".$user->getFirstname()."',
                '".$user->getLastname()."',
                '".$user->getEmail()."',
                '".$user->getPassword()."');";
        $succeeded = $conn->query($sql);
        mysqli_close($conn);

        return $succeeded;
    }

}