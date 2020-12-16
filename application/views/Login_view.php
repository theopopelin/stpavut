<form style="margin-top: 50px; width: 274px; height: 150px; text-align: right; margin-right: auto; margin-left: auto;" action="<?php echo base_url().'Login/verif'; ?>" method="POST">
    <label for="login" >Login :</label>
    <input type="text" name="ident"><br>

    <label for="mdp" >MDP</label>
    <input type="password" name="mdp"><br>
    <input type="submit" value="login">
</form>