<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container py-5">
        @can('view', $user)
            <div class="mb-4">
                <h2>User Information</h2>
                <p>Username: {{$user->username}}</p>
                <p>Email: {{$user->email}}</p>
            </div>
            <h2>Posts</h2>
            <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            <p>{{$post->created_at->format('Y-m-d H:i:s')}}</p>
                            <p>{{$post->content}}</p>
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        @endcan
        @can('create', $user)
            <form class="mt-5" method="post" action="/user/{{$user->id}}/posts/store">
                @csrf
                <div class="mb-3">
                    <label for="content" class="form-label">Enter message:</label>
                    <input type="text" class="form-control" name="content" id="content">
                </div>
                <button type="submit" class="btn btn-primary create-post-button">Post</button>
            </form>
        @endcan
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script scr="http://127.0.0.1:8000/jquery.js"></script>
    @vite('resources/js/app.js')
    @vite("resources/js/userPosts.js")
</body>
</html>