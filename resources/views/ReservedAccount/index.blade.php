@extends('layout.entrance')
@section('content')
<div class="panel-body">
                            @if(\Session::has('message'))
                            <div class="alert alert-success" role="alert">
                            {{\Session::get('message')}}
                            </div>
                            @endif
                           
                        <div class = "row">
                            <div class="col-md-6">
                                <a href="{{route('showAccountForm')}}" style="cursor:pointer; underlined:none">
                                <div class="jumbotron">
                                    <h2>Reserve An Account</h2>
                                    </div>
                                </a>
                            </div>

                            <div class="col-md-6">
                                <a href="">
                                <div class="jumbotron">
                                    <h2>Manage Account</h2>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>

                <table class="table table-bordered">
                            <div class="alert alert-info" role="alert">
                                <h4 align='center'>All Reserved Account</h4>
                            </div>
                <thead>
                    <tr>
                        <th>Account Name</th>
                        <th>Account Number </th>
                        <th>Bank Name </th>
                        <th>Account Refrence </th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Celestine Kingsley</td>
                        <td>3864878376</td>
                        <td>Providus Bank</td>
                        <td>C6M30</td>
                        <form action="" method="GET">
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-success btn-xs" ><span class="fa fa-pencil fa-fw"></span></button></p>
                            </td>
                        </form>
                        <form action="" method="POST">
                         
                            <td>
                            <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" ><span class="fa fa-fw fa-trash"></span></button></p>
                            </td>
                        </form>
                    </tr>
                </tbody>
                </table>
@stop