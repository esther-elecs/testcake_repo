<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $this->Session->flash(); ?>
            <div class="x_panel">
                <div class="x_title">
                    <h2>アカウント登録</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <br />
                <?php echo $this->Form->create('MasterUser', array('class' => 'form-horizontal form-label-left', 'inputDefaults' => array('label' => false, 'div' => false), 'id' => 'demo-form', 'autocomplete' => 'off', 'onsubmit' => "return confirm(\"アカウントを登録します。よろしいですか？ \");")); ?>

                        <div class="form-group">
                            <?php echo $this->Form->label('last_name', '姓 <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <?php echo $this->Form->input('last_name', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off')); ?>
                            </div>

                            <?php echo $this->Form->label('first_name', '名 <span class="required">*</span>', array('class' => 'control-label col-md-1 col-sm-1 col-xs-12'));?>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <?php echo $this->Form->input('first_name', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('last_name_kana', 'セイ <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <?php echo $this->Form->input('last_name_kana', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off')); ?>
                            </div>

                            <?php echo $this->Form->label('first_name_kana', ' メイ <span class="required">*</span>', array('class' => 'control-label col-md-1 col-sm-1 col-xs-12'));?>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <?php echo $this->Form->input('first_name_kana', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('mail', ' メールアドレス <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <?php echo $this->Form->input('mail', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('password', ' パスワード <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off', 'placeholder' => '6文字以上で入力してください')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('password_confirm', ' 確認用パスワード <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <?php echo $this->Form->input('password_confirm', array('type' => 'password', 'label' => false, 'class' => 'form-control col-md-7 col-xs-12', 'autocomplete' => 'off', 'placeholder' => '6文字以上で入力してください')); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('group_id', '権限グループ <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <?php echo $this->Form->radio('group_id',$group, array('default' => '1', 'class' => 'flat', 'legend' => false, 'label' => false)); ?>
                            </div>
                        </div>

                        </p>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php echo $this->Html->link('戻る', 'javascript:history.back()', array('class' => 'btn btn-primary')); ?>
                            <?php echo $this->Form->button('リセット', array('type' => 'reset', 'class' => 'btn btn-default')); ?>
                            <?php echo $this->Form->button('登録', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
                            </div>
                        </div>
                    <?php $this->Form->end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>