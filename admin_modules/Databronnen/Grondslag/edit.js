$('#fld_databron_id').change(function(e){

    let sVisibleTag = $('option:selected', this).data('extra');

    $('#fld_remote_veld option').each(function(i, e){

        let visibility = sVisibleTag === $(e).data('extra') ? 'block' : 'none';
        $(this).css({'display' : visibility});
    });
});