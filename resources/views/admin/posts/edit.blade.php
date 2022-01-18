@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Post:</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Main</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Posts</a></li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('admin.post.update', $post) }}" method="post" enctype="multipart/form-data" class="col-10">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Name:</label>
                                <input type="text" name="title" class="form-control col-6" placeholder="Name of Post"
                                       value="{{ old('title', $post->title) }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Content:</label>
                                <textarea id="summernote"
                                          name="content">{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control col-6" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ (old('category_id') && $category->id == old('category_id')) ? 'selected' : '' }}
                                            {{ (empty(old('category_id')) && ($category->id  == $post->category_id)) ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tags:</label>
                                <select class="select2 select2-hidden-accessible" name="tag_ids[]" multiple=""
                                        data-placeholder="Select tags" style="width: 100%;"
                                        data-select2-id="7" tabindex="-1" aria-hidden="true">
                                    @foreach($tags as $tag)
                                        <option
                                            @if(isset($post) && empty(old('tag_ids')))
                                            @foreach($post->tags as $postTag)
                                            {{ ($tag->id  === $postTag->id) ? 'selected' : '' }}
                                            @endforeach
{{--                                            {{ (is_array($post->tags->pluck('id)->toArray() && in_array($tag->id, $post->tags->pluck('id)->toArray())) ? ' selected' : '' }}--}}
                                            @else
                                            {{ (is_array(old('tag_ids')) && in_array($tag->id, old('tag_ids'))) ? ' selected' : '' }}
                                            @endif
                                            value="{{ $tag->id }}">
                                            {{ $tag->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Add preview:</label>
                                <div class="w-25 mb-2">
                                    <img src="{{ asset('storage/' . $post->preview_image) }}" alt="preview_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file col-5">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Add main image:</label>
                                <div class="w-25 mb-2">
                                    <img src="{{ asset('storage/' . $post->main_image) }}" alt="main_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file col-5">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Choose image</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" value="Edit">
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.row -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

