<?php 
class Content1 extends Controller {

	function __construct()
	{
		parent::__construct();
		//$this->loadModel('content1_model');
	}


	public function index()
	{
		Auth::handleLogin();
		
		$this->view->content1 = '<h1>Ez a content1 tartalom............</h1>
		<p>	
		Lorem ipsum dolor sit amet, libero turpis non cras ligula, id commodo, aenean est in volutpat amet sodales, porttitor bibendum facilisi suspendisse, aliquam ipsum ante morbi sed ipsum mollis. Sollicitudin viverra, vel varius eget sit mollis. Commodo enim aliquam suspendisse tortor cum diam, commodo facilisis, rutrum et duis nisl porttitor, vel eleifend odio ultricies ut, orci in adipiscing felis velit nibh. Consectetuer porttitor feugiat vestibulum sit feugiat, voluptates dui eros libero. Etiam vestibulum at lectus.
		Donec vivamus. Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec, tempor cursus vitae sit aliquet neque purus. Ultrices lacus proin conubia dictum tempus, tempor pede vitae faucibus, sem auctor, molestie diam dictum aliquam. Dolor leo, ridiculus est ut cubilia nec, fermentum arcu praesent, pede etiam. Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus magna nulla nonummy commodo accumsan morbi, praesent volutpat vel id maecenas, morbi habitant sem in adipiscing mi erat, malesuada pretium tortor rutrum eu eros vel. Donec molestie, faucibus a amet commodo scelerisque libero massa. Sapien quam in eu vel nulla.
		Iaculis et dui ullamcorper, non egestas condimentum dui phasellus. Sit non mattis a, leo in imperdiet erat nec pulvinar. Ornare massa justo cursus, convallis mauris interdum felis. Felis posuere metus, ornare pede montes, morbi urna sed temporibus non, nibh inceptos enim turpis natoque ac praesent. Litora vivamus veritatis vel nonummy, ut qui est pellentesque at alias, sed condimentum dapibus.
		Rhoncus lacinia. Imperdiet nulla sem fringilla, purus enim amet, nascetur faucibus, adipiscing neque ut bibendum, at felis nec in. Mauris ultricies, et pede id potenti in nec, mi elit rhoncus ligula, mollis lacus congue scelerisque magna. Ultrices risus elit lectus nunc blandit quis, magna enim ipsum, nostra leo vestibulum quis nibh arcu sed. Amet a sagittis fringilla, massa vitae rhoncus, a magna curabitur in.
		Lorem ipsum dolor sit amet, quo rebum atqui zril at. Ea partiendo tincidunt qui. Option perpetua deseruisse mei te, sit mucius definitionem at, eu mei iuvaret explicari signiferumque. Ut sed eius feugait accusamus.
		Iaculis et dui ullamcorper, non egestas condimentum dui phasellus. Sit non mattis a, leo in imperdiet erat nec pulvinar.
		</p>';
		
		$this->view->render('content1/tpl_content1');
	}

}
?>