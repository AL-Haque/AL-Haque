@extends('layouts.adminLayout')
@section('content')
    @include('errors')
    @include('admin.Alert')
    @include('massage')
    <div class="content-wrapper">
        <h2 class="card-title">Add Question</h2>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">


                        <form class="forms-sample" method="POST" action=" {{ route('question.store') }}"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-sm-2" style="max-width:40%; padding-top:10px">
                                    <p>Title</p>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="name" class="form-control" style="padding: .500rem"
                                        placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2" style="max-width:40%; padding-top:10px">
                                    <p>Details</p>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label><strong>Description :</strong></label>
                                        <textarea class="summernote" name="details"> </textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn" style="padding-top: 30px; padding-left:0%">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
        </div>
        </form>
    </div>
    <!-- content-wrapper ends -->

    <!-- main-panel ends -->

    <div class="content-wrapper">
        <div class="col-lg-14 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">question Information</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($question as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{!! $item->details !!}</td>
                                            <td> <a href="{{ route('question.edit', $item->id) }}"><i
                                                class="fa-solid fa-pen"></i> </a></td>
                                    <td><a href="{{ route('question.delete', $item->id) }}" onclick=" return confirm('Are You Sure!') "><i
                                                class="fa-solid fa-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $question->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- base:js -->
@endsection



@push('admin-js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endpush
