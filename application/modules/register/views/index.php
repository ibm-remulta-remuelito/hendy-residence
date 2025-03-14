<div class="hero-gallery hero-gallery--smaller">
    <div class="container">
        <br>
        <h3>Member Registration</h3>
        <hr>
        <form action="" method="POST">
            <div class="row">
                <input type="text" name="name" value="<?php echo set_value('name'); ?>" placeholder="Full Name*" title="Full Name*" required="required" />
            </div>
            <div class="row">
                <input type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email*" title="Email*" required="required" />
            </div>
            <div class="row">
                <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Phone" title="Phone" />
            </div>
            <div class="row">
                <input type="submit" value="Register" />
            </div>
        </form>
    </div>
</div>
