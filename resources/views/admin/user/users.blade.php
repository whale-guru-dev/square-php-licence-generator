@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase"> User List</span>
                    </div>
                    <div class="actions">
                        <form method="POST" class="form-inline" action="{{route('search.users')}}">
                            {{csrf_field()}}
                            <input type="text" name="search" class="form-control" placeholder="Search">
                            <button class="btn btn-outline btn-circle btn-sm green" type="submit"><i
                                    class="fa fa-search"></i></button>

                        </form>
                    </div>

                </div>
                <div class="portlet-body">

                    <table class="table table-striped table-bordered table-hover order-column">
                        <thead>
                        <tr>
                            <th>
                                Email
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Plan
                            </th>
                            <th>
                                Details
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->licence ?$user->licence->plan->name: ''}}
                                </td>
                                <td>
                                    <a href="{{route('user.single', $user->id)}}"
                                       class="btn btn-outline btn-circle btn-sm green">
                                        <i class="fa fa-eye"></i> View </a>
                                </td>
                            </tr>
                        @endforeach
                        <tbody>
                    </table>
                    <?php echo $users->render(); ?>
                </div>

            </div><!-- row -->
        </div>
    </div>
    </div>
    </div>
@endsection
