<div class="hero-gallery hero-gallery--smaller">
    <div class="container">
        <br>
        <h3 class="text-center">Member Login</h3>
        <hr>
        <form action="<?php echo base_url('log-in/verify'); ?>" method="POST">
            <div class="row">
                <input type="email" name="email" placeholder="Email" title="Email" required="required" />
            </div>
            <div class="row">
                <input type="password" name="password" placeholder="Password" title="Password" required="required" />
            </div>
            <div class="row">
                <input type="submit" class="button" value="Login"/>
            </div>
        </form>
    </div>
</div>
