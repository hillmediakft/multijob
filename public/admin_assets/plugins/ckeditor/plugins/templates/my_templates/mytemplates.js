/*
 Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/
CKEDITOR.addTemplates("default",
{
	imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates")+"my_templates/images/"),
	
	templates:
		[
			{
				title:"Kep és cím 8888",
				image:"template1.gif",
				description:"Lorem ipsum dolor.",
				html:
				'<h3>Ez itt a cím helye</h3>' + 
				'<div class="proba" style="margin-right:10px;">lorem</div>' +
				'<div class="proba">ipsum dolor</div>' + 
				'<p>Type the text here</p>'
			},
			{
				title:"Furcsa sablon 8888",
				image:"template2.gif",
				description:"A template that defines two colums, each one with a title, and some text.",
				html:'<table cellspacing="0" cellpadding="0" style="width:100%" border="0"><tr><td style="width:50%"><h3>Title 1</h3></td><td></td><td style="width:50%"><h3>Title 2</h3></td></tr><tr><td>Text 1</td><td></td><td>Text 2</td></tr></table><p>More text goes here.</p>'
			},
			{
				title:"Szöveg és tábla 8888",
				image:"template3.gif",
				description:"A title with some text and a table.",
				html:'<div style="width: 80%"><h3>Title goes here</h3><table style="width:150px;float: right" cellspacing="0" cellpadding="0" border="1"><caption style="border:solid 1px black"><strong>Table title</strong></caption><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr></table><p>Type the text here</p></div>'
			}
		]
});