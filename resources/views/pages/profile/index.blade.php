@extends('layouts.master.app')
  @section('sub_title', $sub_title)

  @section('content')
    <div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-header">
							Profile
						</div>
						<div class="card-body">
							<p class="card-text">Name : {{ Auth::user()->name }}</p>
							<p class="card-text">Email : {{ Auth::user()->email }}</p>
							<a href="#" class="btn btn-primary">Edit Profile</a>
							<a href="#" class="btn btn-primary">Change Password</a>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-header">
							Your Event's
						</div>
						<div class="card-body">
							@php
								$events = App\Event::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(6);
							@endphp
							<div class="row">
								@foreach ($events as $event)
										<div class="col-lg-4">
											<div class="card-header">
												{{ $event->name }}
											</div>
											<div class="card-body">
												<p class="card-text">Target : {{ $event->target_amount }}</p>
												<p class="card-text">Contatc : {{ $event->contact }}</p>
												<p class="card-text">Expired Date : {{ $event->expired_date }}</p>
												<a href="#" class="btn btn-primary">Details</a>
											</div>
										</div>	
								@endforeach
								</div>
								{!! $events->links() !!}
						</div>
					</div>
				</div>
			</div>
    </div>
  @endsection