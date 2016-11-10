CKEDITOR.dialog.add('googledocs', function (editor) {
  var config = editor.config;

 var hasFileBrowser = !!( config.filebrowserImageBrowseUrl || config.filebrowserBrowseUrl ),
		srcBoxChildren = [
			{
				id: 'src',
				type: 'text',
				label: 'URL',
				setup: function( widget ) {
					this.setValue( widget.data.src );
				},
				commit: function( widget ) {
					widget.setData( 'src', this.getValue() );
				}
				//validate: CKEDITOR.dialog.validate.notEmpty( lang.urlMissing )
			}
		];

	// Render the "Browse" button on demand to avoid an "empty" (hidden child)
	// space in dialog layout that distorts the UI.
	if ( hasFileBrowser ) {
		srcBoxChildren.push( {
			type: 'button',
			id: 'browse',
			// v-align with the 'txtUrl' field.
			// TODO: We need something better than a fixed size here.
			style: 'display:inline-block;margin-top:14px;',
			align: 'center',
			label: editor.lang.common.browseServer,
			hidden: true,
			filebrowser: 'info:src'
		} );
	}   
    
  return {
    title: 'Incorporare Documente',
    width: 400,
    height: 200,

    onLoad : function() {
      //getDocuments();
    },

    contents: 
    [
      //  document settings tab
      {
        id: 'info',
        label: editor.lang.googledocs.settingsTab,
        elements:
        [
            {
                type: 'vbox',
                padding: 0,
                children: [
                        {
                                type: 'hbox',
                                widths: [ '100%' ],
                                children: srcBoxChildren
                        }
                ]
            },
            
            {
		type : 'html',
		html : '<p style="font-weight: bold;color:green">Pot fi incorporate urmatoarele tipuri de documente:</p> <br> <ul><li>Fisiere PDF - (<strong>*.pdf</strong>)</li><li>Fisiere Word - (<strong>*.doc</strong>)</li><li>Fisiere Excel - (<strong>*.xls</strong>)</li><li>Fisiere PowerPoint - (<strong>*.ppt</strong>)</li></ul><br><p>*Incorporarea va functiona doar cu fisiere de tipurile enumerate mai sus!</p>'		
	}
        ]
      },
      
      
    ],
    onOk: function() {
      var dialog = this;
      var iframe = editor.document.createElement( 'iframe' );
      var srcEncoded = encodeURIComponent( dialog.getValueOf( 'info', 'src' ) );
      iframe.setAttribute( 'src',     'http://docs.google.com/gview?url=' + srcEncoded + '&embedded=true' );
      iframe.setAttribute( 'width',   '100%' );
      iframe.setAttribute( 'height',  '600px' );
      iframe.setAttribute( 'frameborder',   '0' );
      editor.insertElement( iframe );
    },
    onShow: function() {
      
    }
  };
});

