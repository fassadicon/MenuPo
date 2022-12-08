<x-admin.layout>
  <h1>Hello Imports!</h1>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Import Users</h6>
    </div>
    <form method="POST" action="{{route('imports.upload')}}" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                
                <div class="col-md-12 mb-3 mt-3">
                    <p>Please Upload CSV in Given Format <a href="{{ asset('files/sample-data-sheet.csv') }}" target="_blank">Sample CSV Format</a></p>
                </div>
                {{-- File Input --}}
                <div class="col-sm-12 mb-3 mt-3 mb-sm-0">
                    <span style="color:red;">*</span>File Input(Datasheet)</label>
                    <input 
                        type="file" 
                        class="form-control form-control-user @error('file') is-invalid @enderror" 
                        id="exampleFile"
                        name="file" 
                        value="{{ old('file') }}">

                    @error('file')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-user float-right mb-3">Upload Users</button>
            <a class="btn btn-primary float-right mr-3 mb-3" href="">Cancel</a>
            {{-- <a class="btn btn-primary float-right mr-3 mb-3" href="{{ route('users.index') }}">Cancel</a> --}}
        </div>
    </form>
</div>
</x-admin.layout>