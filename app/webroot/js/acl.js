$(function(){
	$('.bold').css('font-weight', 'bold');
	$('span.bulet').css('color', '#E46D30');
	$('.expand').mouseover(function(){ $(this).css('cursor', 'pointer'); });
	$('.permission-toggle').mouseover(function(){ $(this).css('cursor', 'pointer'); });

	$('.expand').parents('td').nextAll().text('-')
	$('.expand').click(function(){
		$this = $(this);
		$text = $(this).text();
		if ( $('.controller-'+$text).is(':visible') == true ) {
			$('.controller-'+$text).addClass('hidden');
		}else{
			$('.controller-'+$text).removeClass('hidden');
		}
	});


	$('.permission-toggle').click(function(){
		$this = $(this);
		$.ajax({
			url: 'changePermission',
			type: 'POST',
			dataType: 'JSON',
			data: {
				aco_id: $this.data('aco_id'),
				aro_id: $this.data('aro_id')
			},
			success: function(data){
				if (data.length != '') {
					switch( data ){
						case 1:
							if($this.hasClass('btn-success') ){
								$this.removeClass('btn-success').addClass('btn-danger');
								$this.text('不可');
							}else{
								$this.removeClass('btn-danger').addClass('btn-success');
								$this.text('許可');
							}
						break;
					}
				}
			}
		});
	});
});