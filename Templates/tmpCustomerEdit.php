<h3>Editing <?php echo $this->model->_Username; ?></h3>

<form action="POST">
    <table>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value=<?php echo '"'.$this->_Email.'"'; ?> />
        </tr>
        <tr>
            <td>FirstName:</td>
            <td><input type="text" name="fname" value=<?php echo '"'.$this->_FirstName.'"'; ?> />
        </tr>
        <tr>
            <td>LastName:</td>
            <td><input type="text" name="fname" value=<?php echo '"'.$this->_LastName.'"'; ?> />
        </tr>
    </table>
</form>