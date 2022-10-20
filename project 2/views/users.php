<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>

<body>

<!--table tags lay things out and they have rows and colums but the columns are called data-->
    <table>

    <!--tr stands for table rows-->
        <tr>

        <!--th is table header which is a special type of data-->
<th>Username</th>
<th>Email Address</th>
<th>Cash Balance</th>
<th>ID</th>


        </tr>
        <?php

        //stocks as stock means that for each rows what would you like you call it and in this case it is being named stock
foreach($user as $users) : ?>
    
    <tr>   
    <!--td is table data which is the colums for the table-->
<td><?php echo $users->getUsername(); ?></td>
<td><?php echo $users->getEmail_address(); ?></td>
<td><?php echo $users->getCash_balance(); ?></td>
<td><?php echo $users->getId(); ?></td>
<!--the index name must match with the name in mysql-->
    </tr>
    
    
    <?php
endforeach;
//you can end foreach loop instead of doing curly brackets earlier
    ?>
    </table>

</br>
<h2>Add or Update Users</h2>
<form action="users.php" method="post">
    <label>Username</label>
    <input type="text" name="username"/><br>
    <label>Email Address</label>
    <input type="text" name="email_address"/><br>
    <label>Cash Balance</label>
    <input type ="text" name="cash_balance"/><br>
    <input type ="hidden" name ='action' value="insert_or_update">
    <input type ="radio" name="insert_or_update" value="insert" checked>Add User<br>
    <input type ="radio" name="insert_or_update" value="update" >Update User<br>
    <label>&nbsp;</label>
    <input type="submit" name="Submit"/><br>
</form>

    
<h2>Delete Users</h2>
<form action="users.php" method="post">
    <label>Username</label>
    <?php include("userSymbolDropDown.php"); ?>
    <input type ="hidden" name ='action' value='delete'>
    <label>&nbsp;</label>
    <input type="submit" name="Delete Stock"/><br>
    </form>
</br>
</br>
</br>

</body>

</html>