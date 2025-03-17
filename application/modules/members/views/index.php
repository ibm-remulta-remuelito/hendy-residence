<div class="hero-gallery hero-gallery--smaller">
    <div class="container">
        <br>
        <h3>Members</h3>
        <br>
        <table class="table table-bordered table-striped table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?= $member->name; ?></td>
                        <td><?= $member->email; ?></td>
                        <td><?= $member->phone; ?></td>
                        <td>
                            <a href="<?= site_url('members/edit/' . $member->id); ?>" class="btn btn-primary btn-xs">Edit</a>
                            <a href="<?= site_url('members/delete/' . $member->id); ?>" class="btn btn-danger btn-xs">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
