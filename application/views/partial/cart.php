<div class="card shadow mb-4">
	<form method="POST" action="<?php echo site_url('Waiter/inputOrder'); ?>" enctype="multipart/form-data">
		<div class="card-header py-3 text-center">
			<div class="m-0 font-weight-bold text-primary text-center" id="currency"></div><input type="text" readonly class="m-0 font-weight-bold text-primary text-center" id="heading-cart"
				value="Cart" name="total_price">
		</div>
		<div class="card-body">
			<div class="card card-7">
				<div class="card-body">
					<div class="value">
						<div class="input-group">
							<input class="input--style-5" type="text" name="username_customer" placeholder="Username" />
						</div>
					</div>
					<div class="value mt-2">
						<div class="input-group">
							<input class="input--style-5" type="password" name="password_customer"
								placeholder="Password" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="card card-7">
				<div class="card-body">
					<div class="form-col" id="cart-section">
					</div>
					<div class="text-center mt-2">
						<a class="btn btn--radius-2 btn-primary btn-block btn-md" onclick="showprice()"
							style="text-decoration: none; color: white;">
							Total
						</a>
					</div>
					<div class="text-center mt-2">
						<button class="btn btn--radius-2 btn-success btn-block btn-md" onclick="showprice()"
							type="submit">
							Checkout
						</button>
					</div>
					<div class="text-center mt-2">
						<a class="btn btn--radius-2 btn-danger btn-block btn-md" onclick="clearArray()"
							style="text-decoration: none; color: white;">
							Clear
						</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>