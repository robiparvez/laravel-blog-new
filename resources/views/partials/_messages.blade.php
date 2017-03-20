
{{-- SUCCESS Messages --}}
@if (session()->has('success'))
	<div class="alert alert-success" role="alert">
	    <strong>
	        Saved!
	    </strong>
	    {{ session()->get('success')}}
	</div>

@endif


{{-- Update Messages --}}
@if (session()->has('update'))
	<div class="alert alert-success" role="alert">
	    <strong>
	        Updated!
	    </strong>
	    {{ session()->get('update')}}
	</div>

@endif


{{-- Delete Messages --}}
@if (session()->has('delete'))
	<div class="alert alert-success" role="alert">
	    <strong>
	        Updated!
	    </strong>
	    {{ session()->get('delete')}}
	</div>

@endif

{{-- ERROR Messages --}}
@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
	    <strong>
	        Errors:
	    </strong>
		<ul>
		    @foreach ($errors->all() as $error)

	    			<li>{{ $error }}</li>
		    @endforeach
		</ul>
	</div>
@endif