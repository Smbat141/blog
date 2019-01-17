
@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        @component('admin.components.breadcrumb')
            @slot('title') News List @endslot
            @slot('parent') Main @endslot
            @slot('active') Category @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.article.create')}}" class="btn btn-primary pull-right">
            <i class="fa fa-plus-square-o">Create category</i>
        </a>

        <table class="table table-striped">
            <thead>
            <th>Name</th>
            <th>Puplic</th>
            <th class="text-right">Оperation</th>
            </thead>
            <tbody>
            @forelse($articles as $article)
                <tr>
                    <td>{{$article->title}}</td>
                    <td>{{$article->published}}</td>
                    <td class="text-right">
                        <form onsubmit="if(confirm('Удалить?')){return true}else{return false}" method="post" action="{{route('admin.article.destroy',
                        $article)}}">
                            <input type="hidden" name="_method" value="Delete">
                            {{csrf_field()}}
                            <a href="{{route('admin.article.edit',$article)}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" class="btn">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>

                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>No data</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$articles->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>


    </div>

@endsection