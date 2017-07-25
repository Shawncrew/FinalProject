<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $pageTitle; ?></title>
    </head>
    <body>
        <h3>Editing <?php echo $currentUsername; ?></h3>

        <form action="POST">
            <table>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" value=<?php echo '"'.$Model->_Email.'"'; ?> />
                </tr>
                <tr>
                    <td>FirstName:</td>
                    <td><input type="text" name="fname" value=<?php echo '"'.$Model->_FirstName.'"'; ?> />
                </tr>
                <tr>
                    <td>LastName:</td>
                    <td><input type="text" name="fname" value=<?php echo '"'.$Model->_LastName.'"'; ?> />
                </tr>
            </table>
        </form> 
    </body>
</html>