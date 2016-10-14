<div class="">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>アドミンアカウントプロフィール</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<br />
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->Form->create('AdminUser', array('class' => 'form-horizontal form-label-left', 'inputDefaults' => array('label' => false, 'div' => false), 'id' => 'demo-form', 'autocomplete' => 'off', 'onsubmit' => "return confirm(\"アドミンプロフィールを更新します。よろしいですか？ \");")); ?>

						<div class="form-group">
							<?php echo $this->Form->label('name', ' 名前 <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<?php echo $this->Form->input('name', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12')); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('mail', ' メールアドレス <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<?php echo $this->Form->input('mail', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12')); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('password_update', ' パスワード <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<?php echo $this->Form->input('password_update', array('type' => 'password', 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off', 'placeholder' => '6文字以上で入力してください', 'required' => false)); ?>
							</div>
						</div>

						<div class="form-group">
							<?php echo $this->Form->label('password_confirm', ' 確認用パスワード <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<?php echo $this->Form->input('password_confirm_update', array('type' => 'password', 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off', 'placeholder' => '6文字以上で入力してください', 'required' => false)); ?>
							</div>
						</div>

						<div class="ln_solid"></div>

						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<?php echo $this->Form->button('更新', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>