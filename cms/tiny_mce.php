<script type="text/javascript" src="tiny_mce/tiny_mce.js" ></script >
<script type="text/javascript" >
tinyMCE.init({		
	mode : "textareas",		
	theme : "advanced",		
	plugins : "layer,save, insertdatetime,spellchecker,media,preview,table,mcegooglemaps",
	theme_advanced_buttons3_add : "tablecontrols,mcegooglemaps",
	table_styles : "Header 1=header1;Header 2=header2;Header 3=header3",
	table_cell_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Cell=tableCel1",
	table_row_styles : "Header 1=header1;Header 2=header2;Header 3=header3;Table Row=tableRow1",
	table_cell_limit : 100,
	table_row_limit : 5,
	table_col_limit : 5,
	//plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,imagemanager,filemanager",		
	theme_advanced_buttons1 : "save,newdocument,preview,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,spellchecker,|,formatselect,fontselect,fontsizeselect",		
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,media,,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",		
	//theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",		
	theme_advanced_toolbar_location : "top",		
	theme_advanced_toolbar_align : "left",		
	theme_advanced_statusbar_location : "bottom",		
	theme_advanced_resizing : true,	
	file_browser_callback : "fileBrowserCallBack",
	relative_urls : true,
	document_base_url : "http://www.portugalwestzone.com/cms/"
	});	
	
function fileBrowserCallBack(field_name, url, type, win) {		
	var connector = "./../../file_manager.php";		
	my_field = field_name;		
	my_win = win;		
	switch (type) {			
		case "image":				
			connector += "?type=img";			
		break;			
		
		case "media":				
			connector += "?type=media";				
		break;			
		
		case "flash": //for older versions of tinymce				
			connector += "?type=media";				
		break;			
		
		case "file":				
			connector += "?type=files";				
		break;		
	}		

	window.open(connector, "file_manager", "modal,width=450,height=600,scrollbars=1");	
}
</script >