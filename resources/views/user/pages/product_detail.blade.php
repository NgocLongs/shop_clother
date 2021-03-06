@extends('user.layouts.master')
@section('content')
	
	<div class="container-wrap">
		<hr class="margin">
		<!-- breadcrumb -->
		<div class="container">
			<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
				<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
					Home
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
					Men	
					<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
				</a>

				<span class="stext-109 cl4">
					{{ $product->name }}
				</span>
			</div>
		</div>
			

		<!-- Product Detail -->
		<section class="sec-product-detail bg0 p-t-65 p-b-60">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="upload/{{ $product->image }}">
										<div class="wrap-pic-w pos-relative">
											<img src="upload/{{ $product->image }}" alt="IMG-PRODUCT" height="500px">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="upload/{{ $product->image }}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
									
									@foreach($image_detail as $image)
									<div class="item-slick3" data-thumb="upload/detail/{{ $image->name }}">
										<div class="wrap-pic-w pos-relative">
											<img src="upload/detail/{{ $image->name }}" alt="IMG-PRODUCT" height="500px">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="upload/detail/{{ $image->name }}">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
						
					<div class="col-md-6 col-lg-5 p-b-30">
						<div class="p-r-50 p-t-5 p-lr-0-lg">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								{{ $product->name }}
							</h4>
							<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled="">
							<br>

							<span class="mtext-106 cl2">
								{{ number_format($product->price) }} VNĐ
							</span>

							<p class="stext-102 cl3 p-t-23">
								{{ $product->description }}
							</p>
							
							<!--  -->
							<div class="p-t-33">
								<form action="{{ route('cart.getAdd', $product->id) }}" method="GET">
									@csrf

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<a href="{{ route('cart.getAdd', $product->id) }}"><button type="submit" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
											Add to cart
										</button></a>
									</div>
								</div>	
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="bor10 m-t-50 p-t-43 p-b-40">
					<!-- Tab01 -->
					<div class="tab01">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item p-b-10">
								<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả</a>
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Bình luận</a>
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#rate" role="tab">Đánh giá</a>
							</li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content p-t-43">
							<!-- - -->
							<div class="tab-pane fade show active" id="description" role="tabpanel">
								<div class="how-pos2 p-lr-15-md">
									<p class="stext-102 cl6">
										{{ $product->description }}
									</p>
								</div>
							</div>

							<!-- - -->
							<div class="tab-pane fade" id="rate" role="tabpanel">
								<div class="row">
									<div class="how-pos2 p-lr-15-md">
										<h3 class="product-title">ĐÁNH GIÁ SẢN PHẨM</h3>
										<form action="{{ route('post.rate') }}" method="POST">
											@csrf
					                        <div class="rating">
					                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $product->userAverageRating }}" data-size="xs">
					                            <input type="hidden" name="id" required="" value="{{ $product->id }}">
					                            <br/>
					                            <button class="btn btn-success">Đánh giá</button>
					                        </div>
					                    </form>
									</div>
								</div>
							</div>

							<!-- REVIEW- -->
							<div class="tab-pane fade" id="reviews" role="tabpanel">
								<div class="row">
									<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
										<div class="p-b-30 m-lr-15-sm">
											<!-- Review -->
											<div class="flex-w flex-t p-b-68">
											
											<div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

											<!-- Add review -->
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		<!-- Related Products -->
		<section class="sec-relate-product bg0 p-t-45 p-b-105">
			<div class="container">
				<div class="p-b-45">
					<h2 class="text-center">
						Sản phẩm liên quan
					</h2>
				</div>

				<!-- Slide2 -->
				<div class="wrap-slick2">
					<div class="slick2">
					@foreach($relate_product as $relate)	
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<a href="{{ route('product.detail', $relate->id) }}">
										<img src="upload/{{ $relate->image }}" alt="IMG-PRODUCT" height="300">
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="{{ route('product.detail', $relate->id) }}" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											{{ $relate->name }}
										</a>

										<span class="stext-105 cl3">
											{{ number_format($relate->price) }} VNĐ
										</span>

										<span class="stext-105 cl3" style="font-size: 70%">
											<input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $relate->averageRating }}" data-size="xs" disabled="">
										</span>
									</div>

									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
			                              	<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
						                        <a href="">
						                        	<i class="zmdi zmdi-shopping-cart"></i>
						                        </a>
						                    </div>
						                    <div class="fb-share-button" data-href="https://www.facebook.com/sharer/sharer.php?u=YourPageLink.com&display=popup" data-layout="button_count" data-size="small"></div>
		                                </a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</section>
	</div>
	<script type="text/javascript">
	    $("#input-id").rating();
	</script>
@endsection
