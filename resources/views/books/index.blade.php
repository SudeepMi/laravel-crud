<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD From Scratch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('book.create') }}"> Add Book</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>S.No</th>
                <th>Book Title</th>
                <th>Book Author</th>
                <th>No of Pages</th>
                <th>Published Date</th>
                <th width="280px">Action</th>
            </tr>
            @php $i=0; @endphp
            @foreach ($books as $book)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->no_of_pages }}</td>
                <td>{{ $book->publish_date }}</td>
                <td>
                    <form action="{{ route('book.destroy',$book->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('book.edit',$book->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            @endforeach
        </table>
        {!! $books->links() !!}
</body>

</html>
