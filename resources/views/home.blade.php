
<x-base>
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to MyBlog</h1>
            <p>Discover amazing articles, tutorials, and insights about web development, Laravel, and modern PHP practices.</p>
        </div>
    </section>

    <!-- Featured Posts -->
    <div class="container">
        <h2 class="section-title">All Posts</h2>
        <div class="featured-posts">
            <!-- Posts -->
            @foreach ($posts as $post)
                <div class="post-card">
                <div class="post-image">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Laravel Tips">
                </div>
                <div class="post-content">
                    <div class="post-meta">
                        <span>{{ $post->created_at }}</span>
                        <span>5 min read</span>
                    </div>
                    <h3 class="post-title">{{ $post->title }}</h3>
                    <p class="post-excerpt">{{ Str::limit($post->description,100)}}...</p>
                    <a href="{{ route('postdetail',$post->id) }}" class="read-more">Read More →</a>
                </div>
            </div>
            @endforeach
            


        </div>

        <!-- Categories -->
        

        <!-- Newsletter -->
        <div class="newsletter">
            <h3>Subscribe to our Newsletter</h3>
            <p>Get the latest articles and news delivered to your inbox every week. No spam, ever.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>
    </div>

   </x-base>