<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>transactions List</title>
</head>

<body>

<!--table tags lay things out and they have rows and colums but the columns are called data-->
    <table>

    <!--tr stands for table rows-->
        <tr>

        <!--th is table header which is a special type of data-->
<th>User Id</th>
<th>Stock Id</th>
<th>Quantity</th>
<th>Price</th>
<th>Timestamp</th>
<th>Id</th>


        </tr>
        <?php

        //stocks as stock means that for each rows what would you like you call it and in this case it is being named stock
foreach($transactions as $transaction) : ?>
    
    <tr>   
    <!--td is table data which is the colums for the table-->
<td><?php echo $transaction->getUser_id(); ?></td>
<td><?php echo $transaction->getStock_id(); ?></td>
<td><?php echo $transaction->getQuantity(); ?></td>
<td><?php echo $transaction->getPrice(); ?></td>
<td><?php echo $transaction->getTimestamp(); ?></td>
<td><?php echo $transaction->getId(); ?></td>
<!--the index name must match with the name in mysql-->
    </tr>
    
    
    <?php
endforeach;
//you can end foreach loop instead of doing curly brackets earlier
    ?>
    </table>

</br>
<h2>Add Transaction</h2>
<form action="transactions.php" method="post">
    <label>User Id</label>
    <input type="text" name="user_id"/><br>
    <label>Stock Id</label>
    <input type="text" name="stock_id"/><br>
    <label>Quantity</label>
    <input type ="text" name="quantity"/><br>
    <input type ="hidden" name ='action' value="insert">
    <label>&nbsp;</label>
    <input type="submit" name="Add Transaction"/><br>
</form>

<h2>Update Transaction</h2>
<form action="transactions.php" method="post">
    <label>User Id</label>
    <input type="text" name="user_id"/><br>
    <label>Stock Id</label>
    <input type="text" name="stock_id"/><br>
    <label>Quantity</label>
    <input type ="text" name="quantity"/><br>
    <label>Price</label>
    <input type ="text" name="price"/><br>
    <label>Id</label>
    <input type ="text" name="id"/><br>
    <input type ="hidden" name ='action' value="update">
    <label>&nbsp;</label>
    <input type="submit" name="Update Transaction"/><br>
</form>

    
<h2>Delete Transaction</h2>
<form action="transactions.php" method="post">
    <label>Id</label>
    <?php include("transactionSymbolDropDown.php"); ?>
    <input type ="hidden" name ='action' value='delete'>
    <label>&nbsp;</label>
    <input type="submit" name="Delete Transaction"/><br>
    </form>
</br>
</br>
</br>

</body>

</html>