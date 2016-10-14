<div class="col-md-12 col-sm-12 col-xs-12">
	<?php echo $this->Session->flash(); ?>
	<div class="x_panel">
		<div class="x_title">
			<h2>権限設定</h2>
			<div class="clearfix"></div>
		</div>

		<div class="x_content">
			<button class="btn btn-sm btn-success btn-xs" >許可</button>&nbsp; 利用可能
			<br>
			<button class="btn btn-sm btn-danger btn-xs">不可</button>&nbsp; 利用不可
			<table id="example" class="table table-bordered responsive-utilities jambo_table">

			<?php

				$groupTitles = array_values($groups);
				$groupIds = array_keys($groups);

				$tableHeaders = array_merge(array('権限種別'), $groupTitles);
				$tableHeaders =  $this->Html->tag('thead', $this->Html->tableHeaders($tableHeaders));
				echo $tableHeaders;

				$currentController = '';
				foreach($controllers AS $controller) {
					$controllerName[] = preg_replace('/Controller$/', '', $controller);
				}

				foreach ($acos AS $id => $alias) {

					switch ($alias) {
						case 'Exports':
							$alias = 'ダウンロード';
							break;

						case 'Imports':
							$alias = '未アップロード';
							 break;

						case 'Masterchildminders':
							$alias = '保育士管理';
							 break;

						case 'Masternurseries':
							$alias = '施設・事業所管理';
							 break;

						case 'MasterProfiles':
							$alias = 'プロフィール';
							 break;

					}

					$class = '';

					if(substr($alias, 0, 1) == '_') {

						$level = 1;
						$oddOptions = array('class' => $currentController);
						$evenOptions = array('class' => $currentController);
						$alias = substr_replace($alias, '', 0, 1);

						if (substr($alias, 0, 1) == '_') {

							$alias = substr_replace($alias, '', 0, 1);
							$alias = $this->Html->tag('span', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&rarr;  ', array('class' => 'bulet')) . preg_replace('/\_/', ' ', ucfirst($alias));

						} else {

							if (in_array($alias, $controllerName)) {

								$alias = $this->Html->tag('div', '&nbsp;&nbsp;  ' . preg_replace('/\_/', ' ', ucfirst($alias)), array('class' => 'bold'));

							} else {

								switch ($alias) {

									case 'index':
										$alias = '一覧';
										break;

									case 'detail':
										$alias = '詳細';
										break;

									case 'edit':
										$alias = '編集';
										break;

									case 'delete':
										$alias = '削除';
										break;

									case 'nursery':
										$alias = '未アップロード';
										break;

									case 'export':
										$alias = 'ダウンロード';
										break;

									case 'check_export':
										$alias = '一括ダウンロード';
										break;

									case 'importFile':
										$alias = 'ファイルアップロード';
										break;

									case 'multiUserCheck':
										$alias = 'ファイルアップロード';
										break;

									case 'add':
										$alias = '登録';
										break;

									case 'detail_history':
										$alias = '施設・事業所詳細';
										break;

									case 'historyindex':
										$alias = '保育士ヒストリー';
										break;

									case 'delete_history':
										$alias = '施設・事業所履歴削除';
										break;

									case 'detail_history_details':
										$alias = '施設・事業所ヒストリー';
										break;

								}

								$alias = $this->Html->tag('span', '&nbsp;&nbsp;&rarr;  ', array('class' => 'bulet')) . preg_replace('/\_/', ' ', ucfirst($alias));
							}
						}

					} else {

						$level = 0;
						$oddOptions = array();
						$evenOptions = array();
						$currentController = $alias;
					}

					// debug(array_search($alias, $aclControllerName));
					// debug($alias);

					$row = array($this->Html->div($class, $alias));
					// debug($row);

					foreach ($groups AS $groupId => $groupTitle) {

						if ($level != 0) {

							if ($permissions[$id][$groupId] === 1) {
								$row[] = $this->Html->tag('span', __d('admin', '許可'), array(
									'class'              => 'btn btn-sm btn-success permission-toggle',
									'data-aco_id'        => $id,
									'data-aro_id'        => $groupsAros[$groupId],
									'data-rel'           => 'tooltip',
									'data-original-title'=> $groupTitle
								));
							} else {
								$row[] = $this->Html->tag('span', __d('admin', '不可'), array(
									'class'              => 'btn btn-sm btn-danger permission-toggle',
									'data-aco_id'        => $id,
									'data-aro_id'        => $groupsAros[$groupId],
									'data-rel'           => 'tooltip',
									'data-original-title'=> $groupTitle
									)
								);
							}

						} else {
							$row[] = '';

						}
					}

					echo $this->Html->tableCells(array($row), $oddOptions, $evenOptions);
				}
			?>

			</table>
		</div>
	</div>
</div>
