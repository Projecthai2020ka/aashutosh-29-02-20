<?php
//echo "all good";
function lol($pname,$price,$discount,$pic,$productid)
    {
		
		$element="
		
		
		<div class=\"col-md-3 col-sm-6 col-2 my-3 my-md-0\">
	   <form action=\"index.php\" method=\"post\">
				<div class=\"card shadow\">
					<div>
						<img src=\"$pic\" alt=\"nahi aya image\" class=\"abc\">
					</div>
					<div class=\"card-body\">
						<h5 class=\"card-title\">$pname</h5>
						<h6><font color=\"green\">
							<i class=\"fas fa-star\"></i>
							<i class=\"fas fa-star\"></i>
							<i class=\"fas fa-star\"></i>
							<i class=\"fas fa-star\"></i>
							<i class=\"far fa-star\"></i>
							</font></h6>
						<p class=\"card-text\">mast phone hai bhai isme screen hai aur isse call v hota hai</p>
						<h5>
						<small><s class=\"text-primary\">&#8377 $price</s></small>
						<span class=\"price\">&#8377 $discount</span>
						</h5>

						<button type=\"submit\" class=\"btn btn-warning\" name=\"add\">Add to Cart <i class=\"fas fa-shopping-cart\"></i></button>
						<input type='hidden' name='product_id' value='$productid'>
					</div>
				</div>
			</form>
	</div>";
        echo $element;
	}
function cartElement($productname,$productrice,$photo,$productid)
{
	$element="
	
	<form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3 pl-0\">
                                    <img src=$photo alt=\"image 1\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6\">
                                    <h5 class=\"pt-2\">$productname</h5>
                                    <small class=\"text-secondary\">Seller: dailywala</small>
                                    <h5 class=\"pt-2\">&#8377 $productrice</h5>
                                    <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                <div class=\"col-md-3 py-5\">
									<button type=\"button\" class=\"btn bg-light border rounded-circle\">
									<i class=\"fas fa-minus\"></i></button>
                                    <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline\">
									<button type=\"button\" class=\"btn bg-light border rounded-circle\">
									<i class=\"fas fa-plus\"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>

	";
	echo $element;



}

























?>
