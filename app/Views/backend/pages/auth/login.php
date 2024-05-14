<?= $this->extend('backend/layout/auth-layout') ?>
<?= $this->section('content') ?>
<div class="login-box bg-white box-shadow border-radius-10">
    <div class="login-title">
        <h2 class="text-center text-primary">Pipeline</h2>
    </div>
    <?php $validation = \Config\Services::validation(); ?>
    <form action="<?= route_to('admin.login.handler') ?>" method="POST">
        <?= csrf_field() ?>
        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= session()->getFlashdata('fail') ?>
            </div>
        <?php endif; ?>
        <div class="input-group custom">
            <input type="text" name="email" class="form-control form-control-lg" placeholder="Email" value="<?= set_value('email') ?>"/>
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div>
        </div>
        <?php if ($validation->getError('email')) : ?>
            <div class="alert alert-danger">
                <?= $validation->getError('email') ?>
            </div>
        <?php endif; ?>
        <div class="input-group custom">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="**********" value="<?= set_value('password') ?>" />
            <div class="input-group-append custom">
                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
            </div>
        </div>
        <?php if ($validation->getError('password')) : ?>
            <div class="alert alert-danger">
                <?= $validation->getError('password') ?>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="input-group mb-0">
                    <button class="btn btn-primary btn-lg btn-block" type="submit"> Sign In </button>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>