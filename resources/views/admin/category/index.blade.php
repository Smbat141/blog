@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.category.index')
            @slot('title')Category List @endslot
            @slot('parent')Main@endslot
            @slot('active') List @endslot
        @endcomponent
    </div>
    <hr>

    <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right">
        <i class="fa fa-plus-square-o">Create category</i>
    </a>
    <table class="table table-striped">
        <thead>
        <th>Name</th>
        <th>Publications</th>
        <th class="text-right">Actions</th>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <th>{{$category->title}}</th>
                    <th>{{$category->published}}</th>
                    <td>
                        <a href="{{route('admin.category.edit',['id' => $category->id])}}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">
                            <h2>No data</h2>
                        </td>
                    </tr>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$categories->links()}}
                    </ul>
                </td>
            </tr>
        </tfoot>
    </table>
@endsection