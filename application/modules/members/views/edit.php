<div class="hero-gallery hero-gallery--smaller">
    <div class="container">
        <br>
        <h3 class="text-center">Member Information</h3>
        <hr>
        <form action="<?php echo base_url('register/update'); ?>" method="POST">
            <?php
                if (isset($_GET['errors'])) {
                    echo '<div class="alert alert-danger">Please correct the following errors:';
                    $errors = unserialize(base64_decode($_GET['errors']));
                    foreach ($errors as $error) {
                        echo '<div class="error">' . $error . '</div>';
                    }
                    echo '</div>';
                }
            ?>
            <div class="row">
                <input type="hidden" name="member_id" value="<?= $member->id; ?>">
                <input type="text" name="name" value="<?= $member->name; ?>" placeholder="Full Name*" title="Full Name*"/>
            </div>
            <div class="row">
                <input type="text" name="email" value="<?= $member->email; ?>" placeholder="Email*" title="Email*"/>
            </div>
            <div class="row">
                <input type="text" name="phone" value="<?= $member->phone; ?>" placeholder="Phone" title="Phone" />
            </div>
            <div class="row">
                <input type="password" name="password" placeholder="New Password" title="New Password" />
            </div>
            <div class="row">
                <input type="password" name="password_confirm" placeholder="Confirm Password" title="Confirm Password" />
            </div>
            <div class="row">
                <input type="submit" class="button" value="Update"/>
            </div>
        </form>
    </div>
</div>
