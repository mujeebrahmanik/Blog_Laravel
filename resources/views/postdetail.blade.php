
<x-base>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>{{ ucfirst($post->title) }}</h1>
           
        </div>
    </section>

    <!-- Featured Posts -->
    <div class="container">
        <h2 class="section-title"></h2>
        <div class="detailed-posts">
            <!-- Posts -->
        
                <div class="post-card">
                @if($post->image)
                <div class="postdetail-image">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Laravel Tips">
                </div>
                @endif
                <div class="post-content">
                    <div class="post-meta">
                        <span>{{ $post->created_at }}</span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="post-title">{{ $post->title }}</h3>
                    <p class="post-excerpt">{{ $post->description }}...</p>
                </div>
            </div>
            
            


        </div>

        <!-- Categories -->
        <div class="categories">
           
        </div>

        <!-- Newsletter -->
        <div class="newsletter">
            <livewire:comments :model="$post"/>
        </div>
    </div>

   </x-base>