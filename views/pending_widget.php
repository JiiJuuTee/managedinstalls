<div class="col-lg-4 col-md-6">
    <div class="card" id="pending-widget">
        <div class="card-header">
            <i class="fa fa-moon-o"></i>
            <span data-i18n="managedinstalls.widget.pending.title"></span>
            <a href="/module/managedinstalls/listing/#pending_install" class="pull-right"><i class="fa fa-list"></i></a>
        </div>
        <div class="list-group scroll-box"></div>
    </div><!-- /panel -->
</div><!-- /col -->

<script>

$(document).on('appUpdate', function(e, lang) {

	var box = $('#pending-widget div.scroll-box'),
        hours = 24; // Hours back

	$.getJSON( appUrl + '/module/managedinstalls/get_clients/pending_install/'+hours, function( data ) {

		box.empty();

		if(data.length){
			$.each(data, function(i,d){
				var badge = '<span class="badge badge-secondary pull-right">'+d.count+'</span>',
                    url = appUrl+'/clients/detail/'+d.serial_number+'#tab_munki';

                d.computer_name = d.computer_name || i18n.t('empty');
				box.append('<a href="'+url+'" class="list-group-item list-group-item-action">'+d.computer_name+badge+'</a>');
			});
		}
		else{
			box.append('<span class="list-group-item">'+i18n.t('no_clients')+'</span>');
		}
	});
});
</script>
