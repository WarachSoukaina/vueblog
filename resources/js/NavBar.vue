<template>
    <div>
          <nav id="navbar" class="navbar">
            <ul>
              <li><router-link :to="home">Blog</router-link></li>
              <li><a href="single-post.html">Single Post</a></li>
              <li class="dropdown"><router-link :to="categories">Categories<span>Categories</span> <i class="bi bi-chevron-down dropdown-indicator"></i></router-link>
                <ul>
                  <li><a href="search-result.html">Search Result</a></li>
                  <li><a href="#">Drop Down 1</a></li>
                  <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                      <li><a href="#">Deep Drop Down 1</a></li>
                      <li><a href="#">Deep Drop Down 2</a></li>
                      <li><a href="#">Deep Drop Down 3</a></li>
                      <li><a href="#">Deep Drop Down 4</a></li>
                      <li><a href="#">Deep Drop Down 5</a></li>
                    </ul>
                  </li>
                  <li><a href="#">Drop Down 2</a></li>
                  <li><a href="#">Drop Down 3</a></li>
                  <li><a href="#">Drop Down 4</a></li>
                </ul>
              </li>
    
              <li><router-link :to="about">About</router-link></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </nav><!-- .navbar -->
    
    </div>
</template>

<script>
export default {
    data() {
        return {
            home : '/',

        }
    },
}
</script>