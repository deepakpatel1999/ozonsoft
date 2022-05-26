@include('header')
 @include('sitebar')
@include('nav')
<style>
	.error{
		color: #FF0000; 
	}
</style>
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Edit componies data  <small></small></h3>
			</div>
			<div class="title_right">
				<div class="col-md-5 col-sm-5   form-group pull-right top_search">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">Go!</button>
						</span>
					</div>
				</div>
			</div>
		</div>

		<div class="clearfix"></div>
		<div class="row" style="display: block;">
			<div class="clearfix"></div>
			<div class="clearfix"></div>

			<div class="col-md-12 col-sm-12  ">
				<div class="content-wrapper">

					<section class="content">
						<div class="container-fluid">
							<div class="row">
								<!-- left column -->
								<div class="col-md-12">
									<!-- general form elements -->
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title"></h3>
										</div>
										
										<form  method="post" action="{{route('admin.update_list')}}"  enctype="multipart/form-data" id="">
											
											@csrf
											<input type="hidden" id="id" name="id" value="{{@$edit->id}}"  class="form-control id">
											<div class="form-group">
												<label for="exampleInputEmail1">Name*</label>
												<input type="text" id="name" name="name" value="{{@$edit->name}}" placeholder="Enter Name" class="form-control name">
											</div>   
											<span class="name_error" style="color: red;"></span>       
											<div class="form-group">
												<label for="exampleInputEmail1">Email*</label>
												<input type="email" placeholder="Enter Email" id="email" value="{{@$edit->email}}" name="email" class="form-control">
											</div>
											<span class="email_error"style="color: red;"></span>            

											<span class="address_error"style="color: red;"></span>    
											<div class="form-group">
												<label for="exampleInputEmail1">Logo*</label>
												<input type="file" placeholder="Enter file" id="logo" value="{{@$edit->logo}}" name="logo" class="form-control">
												
											</div>
											<span class="logo_error"style="color: red;"></span> 
											<br>
											<button type="submit" class="btn btn-primary" value="submit" >Submit</button>
										</form>
									</div>

								</div>

							</div>

						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>

