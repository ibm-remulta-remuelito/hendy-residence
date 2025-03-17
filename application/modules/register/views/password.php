<div class="hero-gallery hero-gallery--smaller">
    <div class="container">
        <br>
        <h3 class="text-center">Register New Password</h3>
        <hr>
        <form action="<?php echo base_url('register/create_password'); ?>" method="POST">
            <?php
                if (isset($errors)) {
                    $errors = unserialize(base64_decode($errors));
                    echo '<div class="alert alert-danger">Please correct the following errors:';
                    foreach ($errors as $error) {
                        echo '<div class="error">' . $error . '</div>';
                    }
                    echo '</div>';
                }
            ?>
            <div class="row">
                <input type="hidden" name="member_id" value="<?php echo $member_id; ?>">
                <input type="password" name="password" placeholder="Password" title="Password" required="required" />
            </div>
            <div class="row">
                <input type="password" name="password_confirm" placeholder="Confirm Password" title="Confirm Password" required="required" />
            </div>
            <div class="row">
                <input type="submit" class="button" value="Register"/>
            </div>
        </form>
    </div>
</div>
