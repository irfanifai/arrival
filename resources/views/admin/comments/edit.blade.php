@extends("admin.app")

@section("title") Comment @endsection

@section("header") Edit Comment @endsection

@section("breadcrumb")
<div class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></div>
<div class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Comment</a></div>
<div class="breadcrumb-item active">Edit Comment</div>
@endsection

@section("content")
<div class="row">
    <div class="col-12 col-md-6 col-lg-12">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.comments.update', ['id'=>$comment->id]) }}">
                    @method('patch')
                    @csrf
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $comment->name }}" readonly>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $comment->email }}" readonly>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Comment</label>
                        <textarea cols="30" rows="10" class="form-control" readonly>{{ $comment->body }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        {!! Form::select('status', [2 => 'Hide', 1 => 'Publish'], null, ['class' => 'form-control', 'required']) !!}
                    </div>

                    <input class="btn btn-primary" type="submit" value="Save"/>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
