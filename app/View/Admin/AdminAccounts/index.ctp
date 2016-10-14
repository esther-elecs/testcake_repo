<div class="col-md-12 col-sm-12 col-xs-12">
	<?php echo $this->Session->flash(); ?>
	<div class="x_panel">
		<div class="x_title">
			<h2>アカウント一覧</h2>
			<?php //echo $this->Html->link('一括登録', array('controller' => 'adminaccounts', 'action' => 'add'), array('class' => 'btn btn-default pull-right')); ?>
			<?php echo $this->Html->link('新規登録', array('controller' => 'adminaccounts', 'action' => 'add'), array('class' => 'btn btn-default pull-right')); ?>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="search">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<?php echo $this->Form->create('MasterUser', array('type' => 'get', 'url' => array('controller' => 'adminaccounts', 'action' => 'index'), 'InputDefaults' => array('label' => false, 'div' => false))); ?>

							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12">
								<?php if (!empty($this->params->query['name'])) : ?>
									<?php echo $this->Form->input('name', array('label' => '名前', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => '例）　山田　太郎', 'value' => $this->params->query['name'], 'required' => false)); ?>
								<?php else : ?>
									<?php echo $this->Form->input('name', array('label' => '名前', 'class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => '例）　山田　太郎', 'required' => false)); ?>
								<?php endif; ?>
								</div>

								<div class="col-md-6 col-sm-6 col-xs-12">
								<?php if (!empty($this->params->query['mail'])) : ?>
									<?php echo $this->Form->input('mail', array('label' => 'メールアドレス', 'class' => 'form-control col-md-6 col-xs-12', 'autocomplete' => 'off', 'placeholder' => '例）　example@pref.okinawa.lg.jp', 'value' => $this->params->query['mail'], 'required' => false)); ?>
								<?php else : ?>
									<?php echo $this->Form->input('mail', array('label' => 'メールアドレス', 'class' => 'form-control col-md-6 col-xs-12', 'autocomplete' => 'off', 'placeholder' => '例）　example@pref.okinawa.lg.jp', 'required' => false)); ?>
								<?php endif; ?>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<br/>
									<span class="">
										<?php echo $this->Form->button('検索', array('class' => 'btn btn-default pull-right')) ?>
									</span>
								</div>
							</div>
						<?php echo $this->Form->end(); ?>
					</div>
				</div>
			</div>
			<br/>

		<?php if (!empty($pag)) : ?>
			<div class = "adjust">
				<?php
					echo $this->Form->create(array('type'=>'get'));
					echo $this->Form->input('name', array(
						'empty' => FALSE,
						'onChange' => 'this.form.submit();',
						'name' => 'limit',
						'default' => intval($limit),
						'options' => array_combine(array('10', '20', '50', '100'), array('10', '20', '50', '100')),
						'label' => '件表示&nbsp;',
						'class' => 'btn btn-default',
					));
					echo $this->Form->end();
				?>
			</div>
				<table id='example' class='table table-striped responsive-utilities jambo_table'>
					<thead>
						<tr class="headings">
							<th>名前</th>
							<th>メールアドレス</th>
							<th>権限グループ</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pag as $key => $value): ?>
							<tr class="even pointer">
								<td class=" ">
									<?php if(!empty($value['MasterUser']['name'])): ?>
									<?php echo h($value['MasterUser']['name']); ?>
									<?php endif; ?>
								</td>
								<td class=" ">
									<?php if(!empty($value['MasterUser']['mail'])): ?>
									<?php echo h($value['MasterUser']['mail']); ?>
									<?php endif; ?>
								</td>
								<td class=" ">
									<?php if(!empty($value['Group']['label'])): ?>
										<?php echo h($value['Group']['label']); ?>
									<?php endif; ?>
								</td>
								<td class=" ">
									<?php echo $this->Html->link('編集', array('controller' => 'adminaccounts', 'action' => 'edit', h($value['MasterUser']['id'])), array('class' =>'btn btn-info'));
									 ?>
									<?php echo $this->Form->postLink('削除', array('controller' => 'adminaccounts', 'action' => 'delete', h($value['MasterUser']['id'] )), array('confirm' => "アカウントを削除してもよろしいですか？", 'class' =>'btn btn-danger')); ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<p class="pull-left">
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('{:count}件中{:start}～{:end}件表示')
					));
					?>
				</p>
				<div class="paging pull-right">
					<div class="dataTables_paginate paging_full_numbers" id="example_paginate">
						<?php
							// if ($this->Paginator->counter(array('format' => '%count%')) > $limit) {
								echo $this->Paginator->first(__('最初'), array('class' => 'first disabled'));
								echo $this->Paginator->prev(__('前'), array(), null, array('class' => 'prev disabled', 'id' => 'example_first', 'tag' => false));
								echo $this->Paginator->numbers(array(
									// 'tag' => 'li',
									'separator' => false,
									'currentTag' => 'a',
									'class' => 'paginate_button',
									'currentClass' => 'paginate_active',
									'modulus' => 4,
									'ellipsis' => '. . .',
									'last' => 1,
									'first' => 1,
								));
								echo $this->Paginator->next(__('次'), array(), null, array('class' => 'next disabled', 'id' => 'example_next'));
								echo $this->Paginator->last(__('最後'), array('class' => 'last disabled'));
							// }
						?>
					</div>
				</div>
			<?php else: ?>
			<?php echo "登録したMasterはありません"; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

