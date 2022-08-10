@extends('layout.layout')
   
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
            @if(session('success'))
                <div class='alert alert-success'>{{session('success')}}</div>
            @endif
            @if(session('error_msg'))
                <div class='alert alert-danger'>{{session('error_msg')}}</div>
            @endif
                <div class="card-header">{{ __('User Info') }}</div>

                <div class="card-body" id="pagination_data">
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>DOB</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <form action="" method="post">
                                    <td>
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="city" id="city" placeholder="City" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="date_of_birth" id="date_of_birth" placeholder="Date of Birth" class="form-control" autocomplete="off" readonly>
                                    </td>
                                    <td>
                                        <select name="status" id="status" class="form-control">
                                            <option value="All">All</option>
                                            <option value="Active">Active</option>
                                            <option value="In-Active">In-Active</option>
                                        </select>
                                    </td>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                    @include("user_info.pagination_data")
                    </tbody>
                    </table>
                   
                </div>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
               
            </div>
        </div>
    </div>
</div>
@endsection

@push('custom-scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $(document).ready(function(){

    $( "#date_of_birth" ).datepicker({
        dateFormat: 'yy-mm-dd',
        changeYear: true,
        changeMonth: true,
        yearRange: "-80:+00"
    });

    var page=1;
    var query="";
    var column_name="";

    $(document).on('click', '.pagination a', function(event){
        event.preventDefault(); 
        page = $(this).attr('href').split('page=')[1];
        $('li').removeClass('active');
        $(this).parent().addClass('active');
        fetch_data(page,'','');
    });

    $(document).on('keyup', '#name', function(){
        query = $('#name').val();
        page = $('#hidden_page').val();
        column_name ="name";
        fetch_data(page, query, column_name);
    });

    $(document).on('keyup', '#email', function(){
        query = $('#email').val();
        page = $('#hidden_page').val();
        column_name ="email";
        fetch_data(page, query,column_name);
    });

    $(document).on('keyup', '#city', function(){
        query = $('#city').val();
        page = $('#hidden_page').val();
        column_name ="city";
        fetch_data(page, query,column_name);
    });

    $(document).on('change', '#date_of_birth', function(){
        query = $('#date_of_birth').val();
        page = $('#hidden_page').val();
        column_name ="date_of_birth";
        fetch_data(page, query, column_name);
    });

    $(document).on('change', '#status', function(){
        query = $('#status').val();
        page = $('#hidden_page').val();
        column_name ="status";
        fetch_data(page, query, column_name);
    });
});

function fetch_data(page, query, column_name)
{
    $.ajax({
        url:"{{ url('show_user_info')}}"+"?page="+page+"&query="+query+"&column_name="+column_name,
        type:"get",
        success:function(data)
        {
            $('tbody').html(data);
        }
    });
}
</script>
@endpush