@extends('layouts.app')
@section('custom-styles')
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-4 mb-3">
        <form action="{{ route('home') }}" method="POST">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title">Message History <a href="{{ URL('/home') }}"><i class="fa fa-times-circle fl-r crs-pntr" style="font-size:27px;color:#6c757d;"></i></a></h6>
              
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Date & Times</th>
                    <th scope="col">Message From</th>
                    <th scope="col">Message To</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">31/10/2018</th>
                    <td>mark@example.com</td>
                    <td>otto@example.com</td>
                    <td>XY1254</td>
                    <td>Sale Order</td>
                    <td>My messages</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card mt-2">
            <div class="card-header">
              <div class="form-group row">
                <div class="col-md-2 pt-2">
                  <h6 class="card-title">New Message</h6>
                </div>
                <div class="col-md-4">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input">
                      </div>
                    </div>
                    <input type="text" class="form-control form-control-sm" aria-label="Text input with checkbox" placeholder="Order No">
                  </div>
                </div>
                <div class="col-md-6">
                    <input type="text" name="" value="" class="form-control form-control-sm" placeholder="Subject">
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <textarea class="form-control form-control-lg" id="editor" name="editordata" rows="8"></textarea>
              </div>
              <div class="form-group mb-2">
                  <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-lg float-right">
                          {{ __('Send') }}
                      </button>
                  </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@section('extra-JS')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script type="text/javascript">
  tinymce.init({
    selector: '#editor',
    plugins: "link code wordcount colorpicker",
    menubar: 'false'
  });
</script>
@endsection
