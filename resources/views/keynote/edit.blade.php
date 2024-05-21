@extends('layouts.app')
@section('title', '注意事項-編輯')

@section('styles')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
@endsection

@section('page-content')

    <!-- 注意事項 -->
    <p class="text-gray-600 text-sm dark:text-gray-200">注意事項-編輯</p>
    <div class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <div class="mx-auto max-w-full px-2 py-4 sm:px-2 sm:py-8 lg:px-8 prose">

            <form action="{{ route('keynote.update', $keyNotes) }}" method="post" >
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="editor"></label>
                    <textarea name="description" id="editor" class="form-control border-input" rows="10" cols="30" placeholder="Description">{{ $keyNotes->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">儲存</button>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

@endsection

