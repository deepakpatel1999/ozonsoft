@include('header')

@include('sitebar')
@include('nav')
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		
		
		
		<div class="page-title">
			<div class="title_left">
				<h3>Tables <small> Compony Data</small></h3>
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
		<a href="{{route('admin.compony')}}" class="btn btn-primary" onclick="return confirm('Do you really want to Add Compony?')">Add Componies</a>
		
		
		<div class="clearfix"></div>

		<div class="row" style="display: block;">

			<div class="clearfix"></div>

			<div class="clearfix"></div>

				
				<div class="col-md-12 col-sm-12  ">
					<div class="x_panel">
						<div class="x_title">
							<h2>Componeis List Table  <small> </small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="#">Settings 1</a>
										<a class="dropdown-item" href="#">Settings 2</a>
									</div>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>

						<div class="x_content">

							<p>  Table<code></code> </p>

							<div class="table-responsive">
								<table class="table table-striped jambo_table bulk_action">
									<thead>
										<tr class="headings">

											<th class="column-title">S.NO. </th>
											<th class="column-title"> Name</th>
											<th class="column-title">Email </th>
											<th class="column-title">Logo </th>
											<th class="column-title no-link last"><span class="nobr">Action</span>
											</th>

										</tr>
									</thead>

									<tbody>
										<?php $i=0;?>
										@foreach($compony as $users)
										<?php $i++;?>
										<tr class="even pointer">

											<td class=" ">{{$i}}</td>
											<td class=" ">{{$users->name}} </td>

											<td class=" ">{{$users->email}}</td>
											<td class=" ">

												<img src="{{ storage_path('app/piblic/'.$users->logo) }}" style="width: 100%; height: 100%;"></td>
											

											<td class=" last">
												
												<a href="{{ url('edit-student/'.$users->id) }}" class="btn btn-primary btn-sm" onclick="return confirm('Do you really want to Add List?')">Edit</a>
												<button type="submit" class="btn btn-danger butdelete"onclick="return confirm('Do you really want to Add List?')" value ="{{$users->id}}" id="butdelete"><i class="fa fa-remove" style="font-size:20px;color:red"></i>Delete</button>

											</td>
										</tr>
										@endforeach

									</tbody>
								</table>
							</div>

							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /page content -->

	<script>
		$(document).ready(function() {

			$('.butdelete').on('click', function() {
				var butdelete_id = $(this).val();
				
				$.ajax({
					url: "{{route('admin.delete_list')}}",
					type: "POST",
					data: {
						butdelete_id:butdelete_id,
						_token: "{{ csrf_token() }}"
					},
					cache: false,
					success: function(dataResult){
						alert('Delete successffuly');       
						window.location = "{{route('admin.List')}}";

					}
				});

			});
		});
	</script>


	@include('footer')
