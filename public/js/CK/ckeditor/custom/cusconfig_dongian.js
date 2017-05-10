CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];

	config.removeButtons = 'Source,Save,Templates,NewPage,Preview,Print,Cut,Copy,Paste,PasteText,PasteFromWord,Replace,Find,Scayt,SelectAll,Checkbox,Form,Radio,TextField,Textarea,Select,HiddenField,ImageButton,Button,NumberedList,Outdent,Blockquote,JustifyLeft,BidiLtr,Link,Image,BulletedList,Indent,RemoveFormat,CopyFormatting,JustifyCenter,CreateDiv,Unlink,BidiRtl,Flash,Table,Anchor,Language,JustifyBlock,JustifyRight,Smiley,HorizontalRule,SpecialChar,PageBreak,Iframe,Maximize,About,ShowBlocks';
};