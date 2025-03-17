<div class="hero-gallery hero-gallery--smaller">
    <div class="container">
        <br>
        <h3 class="text-center">Delete Confirmation: <?= $member->name; ?></h3>
        <hr>
        <div>
            <p><b>Are you sure you want to delete this member?</b></p>
            <div class="row">
                <input type="hidden" name="member_id" value="<?= $member->id; ?>">
                <p>Name: <?= $member->name; ?></p>
            </div>
            <div class="row">
                <p>Email: <?= $member->email; ?></p>
            </div>
            <div class="row">
                <p>Phone: <?= $member->phone; ?></p>
            </div>
            <div class="row">
                <a href="<?= base_url('members/delete/' . $member->id); ?>" type="submit" class="btn btn-danger">Delete</a>
                <a href="<?= base_url('members'); ?>" class="btn btn-default">Cancel</a>
            </div>
        </div>
    </div>
</div>
