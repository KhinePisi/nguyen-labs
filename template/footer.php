					</div>
				</div>

			</main> <!-- .main-content -->
			<footer class="site-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Our address</h3>
								<strong>Nguyen Labs</strong>
								<address>1 Chome-1 Asahidai, Nomi, Ishikawa 923-1211, Japan</address>
								<a href="tel:">+000000000</a> <br>
								<a href="mailto:nguyenml@jaist.ac.jp">nguyenml@jaist.ac.jp</a> <br> <br>
								<?php 
									if($auth->check()) {
								?>
								<form action="logout.php" method="POST">
									<button type="submit" style="all : unset;">
										<a style="text-decoration: underline;">Logout</a>
									</button>									
								</form>
								<?php } else { ?>
								<a href="login.php" style="text-decoration: underline;">Members Login</a>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Published Papers</h3>
								<ul class="arrow-list">
									<li><a href="#">Accusantium doloremque</a></li> 
									<li><a href="#">Laudantium totam aperiam</a></li>
									<li><a href="#">Eaque ipsa quae illo inventore</a></li> 
									<li><a href="#">Veritatis et quasi architecto</a></li>
									<li><a href="#">Vitae dicta sunt explicabo</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Research Summary</h3>
								<ul class="arrow-list">
									<li><a href="#">Accusantium doloremque</a></li> 
									<li><a href="#">Laudantium totam aperiam</a></li>
									<li><a href="#">Eaque ipsa quae illo inventore</a></li> 
									<li><a href="#">Veritatis et quasi architecto</a></li>
									<li><a href="#">Vitae dicta sunt explicabo</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget">
								<h3 class="widget-title">Social media</h3>
								<p>Deserunt mollitia animi id est laborum dolorum fuga harum quidem rerum facilis.</p>
								<div class="social-links">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</div>
							</div>
						</div>
					</div> <!-- .row -->

					<p class="colophon">Copyright 2021 Nguyen Labs | Japan Advanced Institute of Science and Technology <a href="https://www.jaist.ac.jp/english/" title="JASIT" target="_blank">JAIST</a>. All rights reserved</p>
				</div> <!-- .container -->
			</footer>
			<script src="js/jquery-1.11.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/app.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
			</html>