@include('layout.header')
<div class="container-fluid h-100 text-dark">
    <div class="row justify-content-center align-items-center">
        <h1 class="mt-4">Add New Patient</h1>
    </div>
    <hr />
    @if(session()->has('message.level'))
    <div class="alert alert-{{ session('message.level') }}">
        {{ session('message.content') }}
    </div>
    @endif
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-12 col-md-8 col-lg-6 col-xl-4">
            <form role="form" action="{{ route('patient.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input type="text" class="@error('name') is-invalid @enderror form-control" name="name">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address <span class="text-danger">*</span></label>
                    <input type="text" class="@error('address') is-invalid @enderror form-control" name="address">
                    @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="@error('phone') is-invalid @enderror form-control" name="phone">
                    @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address <span class="text-danger">*</span></label>
                    <input type="email" class="@error('email') is-invalid @enderror form-control" name="email">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="symptoms">Patient Symptoms</label>
                    <textarea class="form-control" rows="3" class="@error('symptoms') is-invalid @enderror" name="symptoms"></textarea>
                    @error('symptoms')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary" value="Create">
                <br>
            </form>
        </div>
    </div>
</div>
@include('layout.footer')
