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
				title:"cim - 2 oszlop - lablec",
				//image:"template2.gif",
				description:"Cím, szövegtest, lábszöveg",
				html:
                    '<div><h3>Cím helye</h3></div>' +
                
                    '<div class="row-fluid">' +
                        '<div class="span6">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                        '<div class="span6">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                    '</div>' +

                    '<div style="margin-top:30px; text-align:center;">' +
                        '<div><p>Lorem ipsum dolor sit amet.</p></div>' +
                    '</div>'

			},
            
            {
				title:"2 oszlop",
				//image:"template2.gif",
				description:"2 oszlop elem",
				html:
                    '<div class="row-fluid">' +
                        '<div class="span6">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                        '<div class="span6">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                    '</div>'
			},            
            
            {
				title:"3 oszlop",
				//image:"template2.gif",
				description:"3 oszlop elem",
				html:
                    '<div class="row-fluid">' +
                        '<div class="span4">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                        '<div class="span4">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                        '<div class="span4">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                    '</div>'
			}, 
            
            {
				title:"4 oszlop",
				//image:"template2.gif",
				description:"4 oszlop elem",
				html:
                    '<div class="row-fluid">' +
                        '<div class="span3">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                        '<div class="span3">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                        '<div class="span3">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                        '<div class="span3">' +
                            '<div>Szöveg helye</div>' +
                        '</div>' +
                    '</div>'
			}
        

		]
});