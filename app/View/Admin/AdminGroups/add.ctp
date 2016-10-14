<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <?php echo $this->Session->flash(); ?>
            <div class="x_panel">
                <div class="x_title">
                    <h2>グールブ登録</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <br />
                <?php echo $this->Form->create('Group', array('class' => 'form-horizontal form-label-left', 'inputDefaults' => array('label' => false, 'div' => false), 'id' => 'demo-form')); ?>

                        <div class="form-group">
                            <?php echo $this->Form->label('label', ' グールブ <span class="required">*</span>', array('class' => 'control-label col-md-3 col-sm-3 col-xs-12'));?>
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <?php echo $this->Form->input('label', array('label' => false, 'class' => 'form-control col-md-7 col-xs-12')); ?>
                            </div>
                        </div>

                        </p>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <?php echo $this->Form->button('戻る', array('type' => 'reset', 'class' => 'btn btn-primary')); ?>
                            <?php echo $this->Form->button('登録', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>