<div class="hero-gallery hero-gallery--smaller">
    <div class="container">
        <br>
        <h3 class="text-center">Member Information</h3>
        <hr>
        <form action="<?php echo base_url('register/update'); ?>" method="POST">
            <div class="row">
                <input type="hidden" name="member_id" value="<?= $member->id; ?>">
                <input type="text" name="name" value="<?= $member->name; ?>" placeholder="Full Name*" title="Full Name*" required="required" />
            </div>
            <div class="row">
                <input type="email" name="email" value="<?= $member->email; ?>" placeholder="Email*" title="Email*" required="required" />
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
