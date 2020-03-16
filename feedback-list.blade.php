@extends('core-layout.master-layout')
@section('title', 'feedback')
@section('header')
@parent
@endsection
@section('sidebar')
@parent
@endsection
@section('content')


<!-- Main content -->
<section class="content  sms-content">
  <div class="row">
  <div class="col-12">
    <div class="card no-background">
      <div class="card-body p-0">
        <!-- /.card-header -->
          <table id="feedback-table" class="table">
            <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Message</th>
                <th>Commented By</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</section>
<input type="hidden" name="searchName">
@endsection

@section('footer')
@parent
@endsection
@push('scripts')
<script>
</script>
<script src="{{ asset('js/feedback/feedbacklist.js') }}"></script>
@endpush
