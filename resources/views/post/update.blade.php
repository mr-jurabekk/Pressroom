<x-layouts.main>

    <div class="create_form">
        <form action="{{ route('post.update', ['post' => $post->id]) }}" class="form_inner" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form_title">
                <label for="">Title</label>
                <input type="text" name="title" value="{{$post->title}}" required>
                @error('title')
                <div class="form_danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" name="short_content" value="{{$post->short_content}}" required>
                @error('short_content')
                <div class="form_danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Category</label>
                <select name="category_id" id="">
                        <option value="{{$post->category->id}}">{{ $post->category->name}}</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="form_danger">{{ $message}}</div>
                @enderror
            </div>
            <div>
                <label for="">File</label>
                <input type="file" name="file_url" value="{{$post->file_url}}">
                <img class="post_update_img" src="{{asset('storage/'.$post->file_url)}}" alt="">
                @error('file_url')
                <div class="form_danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Text</label>
                <textarea name="body" id="" cols="30" rows="5">{{$post->body}}</textarea>
                @error('body')
                <div class="form_danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button class="form_btn" type="submit">Create</button>
            </div>
        </form>
    </div>


</x-layouts.main>
