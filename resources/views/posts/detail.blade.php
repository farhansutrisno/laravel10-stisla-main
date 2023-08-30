@extends('layouts.app')

@section('title', 'Article')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Master Specimen AMS Detail</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Article</div>
                </div>
            </div>

            <div class="section-body">

                <h2 class="section-title">Specimen</h2>
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                        <article class="article article-style-c">
                            <div class="article-header">
                                <div class="article-image"
                                    data-background="{{ asset('storage/posts/'.$post->image) }}"
                                    style="width: 150px;">
                                </div>
                            </div>
                            <div class="article-details">
                                <div class="article-category"><a href="#">Create</a>
                                    <div class="bullet"></div> <a href="#">{{ $post->created_at }}</a>
                                </div>
                                <div class="article-title">
                                    <h2><a href="#">{{ $post->title }}</a></h2>
                                </div>
                                <p>{{ $post->content}}. </p>

                            </div>
                            <div class="article-user">
                                <div class="article-user-details">
                                    <a href="{{ route('posts.index') }}" class="btn btn-md btn-primary">back</a>
                                </div>
                            </div>

                        </article>
                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
