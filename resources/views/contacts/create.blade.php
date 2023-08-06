@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
<style>
    .hide {
  display: none;
}
#valid-msg {
  color: #00c900;
}
    </style>   
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Create Contact') }}</div>

                <div class="card-body">
             
                    <form action="{{route('contacts.store')}}" method="post" >
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="name" placeholder="Nom" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com" name="email">
                        </div>
                    <div class="row mb-3">
                        <div class="col">

                        
                        <h6 class="card-title">Phone Number:</h6>
                        <input id="phone" type="tel" name="phone" class="form-control">
                        <span id="valid-msg" class="hide">✓ Valid</span>
                        <span id="error-msg" class="hide"></span>
                    </div>
                    <div class="col">
                        <select name="country_code_id" id="" class="form-select mt-4">
                            <option value="">Escoje Pais</option>
                            <option value=""></option>
                            <option value=""></option>
                            @foreach ($country_codes as $country_code)
                                <option value="{{$country_code->id}}">{{$country_code->country}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                      
                        <div class="mb-3">
                            <button type="submit" class="btn btn-outline-success">Enviar</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div> 
  
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    const input = document.querySelector("#phone");
const errorMsg = document.querySelector("#error-msg");
const validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
const errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
const iti = window.intlTelInput(input, {
	utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
});

const reset = () => {
	input.classList.remove("error");
	errorMsg.innerHTML = "";
	errorMsg.classList.add("hide");
	validMsg.classList.add("hide");
};

// on blur: validate
input.addEventListener('blur', () => {
	reset();
	if (input.value.trim()) {
		if (iti.isValidNumber()) {
			validMsg.classList.remove("hide");
		} else {
			input.classList.add("error");
			const errorCode = iti.getValidationError();
			errorMsg.innerHTML = errorMap[errorCode];
			errorMsg.classList.remove("hide");
		}
	}
});

// on keyup / change flag: reset
input.addEventListener('change', reset);
input.addEventListener('keyup', reset);
</script>

@endsection