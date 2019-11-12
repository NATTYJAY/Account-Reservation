@extends('layout.entrance')
@section('content')
<div class="panel-body">
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
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content </th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Great</td>
                        <td>Is okay na</td>
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