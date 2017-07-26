<h3>Editing <?php echo $this->model->_Username; ?></h3>
<?php if(isset($this->msg) && !empty($this->msg)): ?>
    <div class="success-message"><?php echo $this->msg; ?></div>
    <?php endif; ?>
<form method="POST" action=<?php echo '"/Project4/Customer/Edit/' . $this->model->Id . '"';?>>
    <input type="hidden" name="customer_id" value=<?php echo '"'.$this->model->Id.'"'; ?> />
    <input type="hidden" name="username" value=<?php echo '"'.$this->model->_Username.'"'; ?> />
    <table>
        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value=<?php echo '"'.$this->model->_Email.'"'; ?> /></td>
        </tr>
        <tr>
            <td>FirstName:</td>
            <td><input type="text" name="fname" value=<?php echo '"'.$this->model->_FirstName.'"'; ?> /></td>
        </tr>
        <tr>
            <td>LastName:</td>
            <td><input type="text" name="lname" value=<?php echo '"'.$this->model->_LastName.'"'; ?> /></td>
        </tr>
        <tr>
            <td>Phone #:</td>
            <td><input type="text" name="phone#" value=<?php echo '"'.$this->model->_Phone.'"'; ?> /></td>
        </tr>
        <tr>
            <td>Address 1:</td>
            <td><input type="text" name="addr1" value=<?php echo '"'.$this->model->_StreetAddress.'"'; ?> /></td>
        </tr>
        <tr>
            <td>Address 2:</td>
            <td><input type="text" name="addr2" value=<?php echo '"'.$this->model->_StreetAddress2.'"'; ?> /></td>
        </tr>
        <tr>
            <td>City:</td>
            <td><input type="text" name="city" value=<?php echo '"'.$this->model->_City.'"'; ?> /></td>
        </tr>
        <tr>
            <td>State:</td>
            <td><input type="text" name="state" value=<?php echo '"'.$this->model->_State.'"'; ?> /></td>
        </tr>
        <tr>
            <td>Zip:</td>
            <td><input type="text" name="zip" value=<?php echo '"'.$this->model->_Zip.'"'; ?> /></td>
        </tr>
    </table>
    <input type="submit" />
</form>