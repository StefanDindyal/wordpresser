/**
 * Tinymce script.
 */

jQuery(function($) {
	
	 tinymce.create('tinymce.plugins.rg_block_plugin', {
     init : function(ed, url) {
        ed.addButton('rg_block_button', {
            title : 'Insert shortcode', 
            cmd : 'rg_block_button', 
            image: url + '/images/rg-logo-20.png',
            onclick : function() {
                var selected = ed.selection.getContent({ 'format' : 'text' });
                var content = '';
                if( selected ){
                    content =  '[block]'+selected+'[/block]';
                }   else {
                    content =  '[block]';
                }
                ed.execCommand('mceInsertContent', false, content);
            }
        });     		
        ed.addButton('rg_table_button', {
            title : 'Insert shortcode', 
            cmd : 'rg_table_button', 
            image: url + '/images/rg-logo-21.png',
            onclick : function() {
                var selected = ed.selection.getContent({ 'format' : 'text' });
                var content = '';
                if( selected ){
                    content =  '[table]'+selected+'[/table]';
                }   else {
                    content =  '[table]';
                }
                ed.execCommand('mceInsertContent', false, content);
            }
        });             
     },
     createControl : function(n, cm) {
			return null;
	  },
     getInfo : function() {
			return {
				longname : 'Block Shortcode',
				author : 'rGenerator',
				authorurl : 'http://www.rgenerator.com/',
				infourl : 'http://www.rgenerator.com/',
				version : '1.0'
			};
		},
    });
    tinymce.PluginManager.add('rg_tinymce_button', tinymce.plugins.rg_block_plugin);
	
});