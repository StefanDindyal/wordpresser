jQuery(function($) {

// REPEATABLE FIELD

	$('.rg-lovers_repeatable_add').live('click', function(e) {
		e.preventDefault();
		// clone
		var row = $(this).closest('.rg-lovers_repeatable').find('tbody tr:last-child');
		var clone = row.clone();
		var defaultImage = clone.find('.default_image').text();
		clone.find('select.chosen').removeAttr('style', '').removeAttr('id', '').removeClass('chzn-done').data('chosen', null).next().remove();
		clone.find('input.regular-text, textarea, select').val('');
		clone.find('.preview_image').attr('src', defaultImage).removeClass('loaded');
		clone.find('input[type=checkbox], input[type=radio]').attr('checked', false);
		row.after(clone);
		// increment name and id
		clone.find('input, textarea, select').attr('name', function(index, name) {
			return name.replace(/(\d+)/, function(fullMatch, n) {
				return Number(n) + 1;
			});
		});
		var arr = [];
		$('input.repeatable_id:text').each(function(){ arr.push($(this).val()); }); 
		clone.find('input.repeatable_id').val(Number(Math.max.apply( Math, arr )) + 1);
		if (!!$.prototype.chosen) {
			clone.find('select.chosen').chosen({allow_single_deselect: true});
		}
	});

	$('.rg-lovers_repeatable_remove').live('click', function(e){
		e.preventDefault();
		$(this).closest('tr').remove();		
	});

	$('.rg-lovers_repeatable tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.hndle'
	});

	var uploadID = '';

	jQuery('#upload_image_button').live('click',function(){
		uploadID = jQuery(this).prev('input');
		formfield = jQuery('.upload_field').attr('name');
		preview = jQuery(this).parent().find('.preview_image');
		tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		return false;
	});

	window.send_to_editor = function(html) {
		imgurl = jQuery('img',html).attr('src');
		uploadID.val(imgurl);
		preview.attr('src', imgurl).addClass('loaded');
		tb_remove();
		window.send_to_editor = window.restore_send_to_editor;
	}

	jQuery('.clear_image_button').live('click',function() {
		var defaultImage = jQuery(this).parent().find('.default_image').text();
		jQuery(this).parent().find('.upload_field').val('');
		jQuery(this).parent().find('.preview_image').attr('src', defaultImage).removeClass('loaded');
		return false;
	});

});