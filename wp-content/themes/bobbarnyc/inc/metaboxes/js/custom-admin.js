jQuery(function($) {

 	$('#normal-sortables > div').hide();
 	$('#event_box, #artist_box').show();

 	// 7d60b57f78e0968a839f9c896b79517a
 	if($('input.soundcloud').length){
	 	var value = $('input.soundcloud').val();
	 	if(value.indexOf('consumer_key') != -1){
	 		$('input.soundcloud').addClass('green'); 		
	 	}
	 	$('.button.stream-url').on('click',function(e){
	 		var self = $(this);
	 		var field = self.parents('td').find('input.soundcloud');
	 		var value = field.val();
	 		if(value){
	 			if(value.indexOf('consumer_key') == -1){
	 				getStreamUrl(field, value);	
	 			} else {
	 				alert('Stream URL is present.');
	 			} 			
	 		} else {
	 			alert('Please enter a track url.');
	 		}
	 		e.preventDefault();
	 	});
	 	function getStreamUrl(elem, url){
			var consumer_key = '7d60b57f78e0968a839f9c896b79517a';
			var streamURL = '';
			var elem = elem;
			$.getJSON('http://api.soundcloud.com/resolve?url=' + url + '&format=json&consumer_key=' + consumer_key + '&callback=?', function(track){
				streamURL = track.stream_url;
				streamURL = streamURL + '?consumer_key=' + consumer_key;
				elem.val(streamURL).addClass('green');
			});		
		}
	}

 	// Custom
 	// check_template();
 	// $('select#page_template').change(check_template).change();
 	function check_template(){
 		if(!$('body').hasClass('post-type-character')){
	 		$('#normal-sortables > div').hide();
		 	if($('select#page_template').val() == 'page-templates/main-page.php'){
		 		$('#normal-sortables > #main').show();
		 	}
		 	if($('select#page_template').val() == 'page-templates/faq-page.php'){
		 		$('#normal-sortables > #faq').show();
		 	}
		 	if($('select#page_template').val() == 'page-templates/privacy-page.php'){
		 		$('#normal-sortables > #privacy').show();
		 	}
		 	if($('select#page_template').val() == 'page-templates/contact-page.php'){
		 		$('#normal-sortables > #contact').show();
		 	}
		}
	}

	// the upload image button, saves the id and outputs a preview of the image
	var imageFrame;
	$('.meta_box_upload_image_button').live('click', function(event) {
		event.preventDefault();
		
		var options, attachment;
		
		$self = $(event.target);
		$div = $self.closest('div.meta_box_image');
		
		// if the frame already exists, open it
		if ( imageFrame ) {
			imageFrame.open();
			return;
		}
		
		// set our settings
		imageFrame = wp.media({
			title: 'Choose Image',
			multiple: false,
			library: {
		 		type: 'image'
			},
			button: {
		  		text: 'Use This Image'
			}
		});
		
		// set up our select handler
		imageFrame.on( 'select', function() {
			selection = imageFrame.state().get('selection');
			
			if ( ! selection )
			return;
			
			// loop through the selected files
			selection.each( function( attachment ) {
				console.log(attachment);
				var src = attachment.attributes.sizes.full.url;
				var id = attachment.id;
				
				$div.find('.meta_box_preview_image').attr('src', src);
				$div.find('.meta_box_upload_image').val(id);
			} );
		});
		
		// open the frame
		imageFrame.open();
	});
	
	// the remove image link, removes the image id from the hidden field and replaces the image preview
	$('.meta_box_clear_image_button').live('click', function() {
		var defaultImage = $(this).parent().siblings('.meta_box_default_image').text();
		$(this).parent().siblings('.meta_box_upload_image').val('');
		$(this).parent().siblings('.meta_box_preview_image').attr('src', defaultImage);
		return false;
	});
	
	// the file image button, saves the id and outputs the file name
	var fileFrame;
	$('.meta_box_upload_file_button').live('click', function(e) {
		e.preventDefault();
		
		var options, attachment;
		
		$self = $(event.target);
		$div = $self.closest('div.meta_box_file_stuff');
		
		// if the frame already exists, open it
		if ( fileFrame ) {
			fileFrame.open();
			return;
		}
		
		// set our settings
		fileFrame = wp.media({
			title: 'Choose File',
			multiple: false,
			library: {
		 		type: 'file'
			},
			button: {
		  		text: 'Use This File'
			}
		});
		
		// set up our select handler
		fileFrame.on( 'select', function() {
			selection = fileFrame.state().get('selection');
			
			if ( ! selection )
			return;
			
			// loop through the selected files
			selection.each( function( attachment ) {
				console.log(attachment);
				var src = attachment.attributes.url;
				var id = attachment.id;
				
				$div.find('.meta_box_filename').text(src);
				$div.find('.meta_box_upload_file').val(src);
				$div.find('.meta_box_file').addClass('checked');
			} );
		});
		
		// open the frame
		fileFrame.open();
	});
	
	// the remove image link, removes the image id from the hidden field and replaces the image preview
	$('.meta_box_clear_file_button').live('click', function() {
		$(this).parent().siblings('.meta_box_upload_file').val('');
		$(this).parent().siblings('.meta_box_filename').text('');
		$(this).parent().siblings('.meta_box_file').removeClass('checked');
		return false;
	});
	
	// function to create an array of input values
	function ids(inputs) {
		var a = [];
		for (var i = 0; i < inputs.length; i++) {
			a.push(inputs[i].val);
		}
		//$("span").text(a.join(" "));
    }
	// repeatable fields
	$('.meta_box_repeatable_add').live('click', function(e) {
		e.preventDefault();
		// clone
		var row = $(this).closest('.meta_box_repeatable').find('tbody tr:last-child');
		var clone = row.clone();
		var defaultImage = clone.find('.meta_box_default_image').text();
		clone.find('select.chosen').removeAttr('style', '').removeAttr('id', '').removeClass('chzn-done').data('chosen', null).next().remove();
		clone.find('input.regular-text, textarea, select').val('');
		clone.find('.meta_box_preview_image').attr('src', defaultImage).removeClass('loaded');
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
		clone.find('input.repeatable_id')
			.val(Number(Math.max.apply( Math, arr )) + 1);
		if (!!$.prototype.chosen) {
			clone.find('select.chosen')
				.chosen({allow_single_deselect: true});
		}
	});
	
	$('.meta_box_repeatable_remove').live('click', function(e){
		e.preventDefault();
		$(this).closest('tr').remove();
	});
		
	$('.meta_box_repeatable tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.hndle'
	});
	
	// post_drop_sort	
	$('.sort_list').sortable({
		connectWith: '.sort_list',
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		cancel: '.post_drop_sort_area_name',
		items: 'li:not(.post_drop_sort_area_name)',
        update: function(event, ui) {
			var result = $(this).sortable('toArray');
			var thisID = $(this).attr('id');
			$('.store-' + thisID).val(result) 
		}
    });

	$('.sort_list').disableSelection();

	// turn select boxes into something magical
	if (!!$.prototype.chosen)
		$('.chosen').chosen({ allow_single_deselect: true });
});