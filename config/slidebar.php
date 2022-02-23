<?php
    $sqlcat = "SELECT * FROM categories ";
    $resultcat = $conn->query($sqlcat); 
?>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<?php
						while($rowcat = mysqli_fetch_array($resultcat)) 
						{
						?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="/thebarber/product.php?catId=<?php echo $rowcat['catId']; ?>"><?php echo $rowcat['catName']; ?></a></h4>
								</div>
							</div>
							
						<?php } ?>	
						</div><!--/category-products-->
					
						
						<div class="shipping text-center"><!--shipping-->
							<img src="images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>