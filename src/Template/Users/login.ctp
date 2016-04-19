<p class="login-box-msg">Sign in to start your session</p>
 <?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <div class="form-group has-feedback">
        <?= $this->Form->input('username', array('type' => 'text', 'class'=> 'form-control', 'label' => false, 'placeholder' => 'Username')) ?>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
        <?= $this->Form->input('password', array('label' => false, 'class'=> 'form-control', 'placeholder' => 'Password')) ?>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
        <div class="col-xs-4">
            <?= $this->Form->button(__('Sign In'), array('class' => 'btn btn-primary btn-block btn-flat')); ?>
        </div><!-- /.col -->
    </div>
</form>