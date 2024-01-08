<template>
    <div id="wrapper">
        <!-- header -->
        <header class="header">
            <div class="header-text">
                <h1>Diamond Blog</h1>
                <h4>Home of verified news...</h4>
            </div>
            <div class="overlay"></div>
        </header>

        <!-- sidebar -->
        <div class="sidebar">
            <span class="closeButton">&times;</span>
            <p class="brand-title"><a href="">Diamond Blog</a></p>

            <div class="side-links">
                <ul>
                    <li><a class="active" href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <!-- sidebar footer -->
            <footer class="sidebar-footer">
                <div>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </div>

                <small>&copy; 2023 Diamond Blog</small>
            </footer>
        </div>
        <!-- Menu Button -->
        <div class="menuButton">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <header class="header">
            <div class="header-text">
                <h1>Alphayo Blog</h1>
                <h4>Home of verified news...</h4>
            </div>
            <div class="overlay"></div>
        </header>

        <!-- main -->
        <main class="container">
            <h2 class="header-title">Latest Blog Posts</h2>
            <section class="cards-blog latest-blog">
                <div class="card-blog-content" v-for="post in posts" :key="post.id">
                    <img :src="post.imagePath" alt="" />
                    <p>
                        {{ post.created_at }}
                        <span style="float: right">Written By {{ post.user }}</span>
                    </p>
                    <h4 style="font-weight: bolder">
                        <a href="single-blog.html"></a>
                        <router-link :to="{
                            name: 'SingleBlog',
                            params: { slug: post.slug },
                        }">{{ post.title }}</router-link>
                    </h4>
                </div>

            </section>
        </main>

        <!-- Main footer -->
        <footer class="main-footer">
            <div>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <small>&copy 2023 Diamond Blog</small>
        </footer>
    </div>
</template>
<script>
export default {
    emits: ["updateSidebar"],
    data() {
        return {
            posts: [],
        };
    },
    mounted() {
        axios.get('/api/home-posts')
            .then((response) => (this.posts = response.data.data))
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>
