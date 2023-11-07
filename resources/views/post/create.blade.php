<x-layouts.main>

    <div class="create_form">
        <form action="{{route('post.store')}}" class="form_inner" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form_title">
                <label for="">Title</label>
                <input type="text" name="title" value="{{old('title')}}" required>
                @error('title')
                <div class="form_danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" name="short_content" value="{{old('short_content')}}" required>
                @error('short_content')
                <div class="form_danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Category</label>
                <select name="category_id" id="">
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
                <input type="file" name="file_url" value="{{old('file_url')}}" required>
                @error('file_url')
                <div class="form_danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="">Text</label>
                <textarea name="body" id="" cols="30" rows="5">{{old('body')}}</textarea>
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
