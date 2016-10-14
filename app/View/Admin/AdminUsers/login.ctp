<div id="wrapper">
	<div id="login" class="animate form">
		<section class="login_content">

			<?php echo $this->Form->create('AdminUser', array('label' => false, 'type')); ?>

			<h1>保育士管理データベース</h1>

			<font color='red'><b><?php echo $this->Session->flash(); ?></b></font>

			<div>
				<?php //echo $this->Form->input('mail', array('placeholder' => 'メールアドレス', 'class' => 'form-control', 'label' => false)); ?>
				<?php echo $this->Form->input('mail', array('label' => false, 'class' => 'form-control', 'placeholder' => 'メールアドレス', 'autofocus' => true, 'autocomplete' => 'off')); ?>
			</div>

			<div>
				<?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'パスワード', 'autocomplete' => 'off')); ?>
			</div>

			<div>
				<?php echo $this->Form->button('ログイン', array('class' => 'btn btn-default submit')); ?>
			</div>

			<div class="clearfix"></div>

			<div class="separator">
				<div class="clearfix"></div>
				<br />
				<div>
					<h1>
						<?php echo $this->Html->image('logo.png', array('alt' => 'Logo')); ?> &nbsp;保育士管理データベース
					</h1>
					<p>Copyright © 2016 Abridge All Rights Reserved.</p>
				</div>
			</div>

			<?php echo $this->Form->end() ?>
		</section>
	</div>
</div>
