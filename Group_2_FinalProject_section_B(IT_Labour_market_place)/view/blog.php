<?php
session_start();
if (!isset($_COOKIE['user'])) {
   header('Location: login.php');
    exit();
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Labor Market Blog</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .search-bar input {
            width: 70%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #45a049;
        }

        .blog-post {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .blog-post h2 {
            margin-top: 0;
            color: #4CAF50;
        }

        .post-meta {
            font-size: 14px;
            color: #777;
            margin: 10px 0;
        }

        .post-meta img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .share-buttons {
            margin-top: 20px;
        }

        .share-buttons button {
            padding: 10px;
            margin-right: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .share-buttons button:hover {
            background-color: #45a049;
        }

        .related-articles {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .related-articles h3 {
            margin-top: 0;
            color: #4CAF50;
        }

        .related-articles ul {
            list-style: none;
            padding: 0;
        }

        .related-articles ul li {
            margin: 10px 0;
        }

        .related-articles ul li a {
            text-decoration: none;
            color: #333;
        }

        .related-articles ul li a:hover {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div id="header"></div>
    <header class="container">
        <h1>IT Labor Market Blog</h1>
        <form class="search-bar">
            <input type="text" placeholder="Search articles...">
            <button type="submit">Search</button>
        </form>
    </header>

    <main class="container">
        <article class="blog-post">
            <h2>Top IT Trends in 2023</h2>
            <div class="post-meta">
                <img src="author.jpg" alt="Author">
                By J.Q. Blogger | June 12, 2023 | 5 min read
            </div>
            <p>
                Explore the latest trends in IT shaping the industry in 2023. From AI innovations to blockchain advancements, discover how technology is transforming the labor market.
            </p>
            <div class="share-buttons">
                <button>Share on Facebook</button>
                <button>Share on Twitter</button>
                <button>Share on LinkedIn</button>
            </div>
        </article>

        <aside class="related-articles">
            <h3>Related Articles</h3>
            <ul>
                <li><a href="#">Building Your IT Career: Tips and Strategies</a></li>
                <li><a href="#">Navigating the IT Job Market in 2025</a></li>
                <li><a href="#">AI in the Workplace: What You Need to Know</a></li>
            </ul>
        </aside>
    </main>
    <div id="footer"></div>

    <script>

        function loadHeaderFooter() {
            fetch('getHeader.php')
                .then(response => response.text())
                .then(data => document.getElementById('header').innerHTML = data)
                .catch(error => console.error('Error loading header:', error));

            fetch('footer.php')
                .then(response => response.text())
                .then(data => document.getElementById('footer').innerHTML = data)
                .catch(error => console.error('Error loading footer:', error));
        }

        function loadBlogs() {
            fetch('../controller/blog_val.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ action: 'fetchBlogs' }),
            })
            .then(response => response.json())
            .then(data => {
                const mainContainer = document.querySelector('main');
                data.forEach(blog => {
                const article = document.createElement('article');
                article.className = 'blog-post';
                article.innerHTML = `
                    <h2>${blog.title}</h2>
                    <div class="post-meta">By Admin | ${new Date(blog.created_at).toLocaleDateString()} | 5 min read</div>
                    <p>${blog.content.substring(0, 200)}...</p>
                    <div class="share-buttons">
                        <button>Share on Facebook</button>
                        <button>Share on Twitter</button>
                        <button>Share on LinkedIn</button>
                    </div>
                `;
                mainContainer.appendChild(article);
            });
        })
        .catch(error => console.error('Error loading blogs:', error));
    }

    function searchBlogs(event) {
        event.preventDefault();
        const searchInput = document.querySelector('.search-bar input').value;

        fetch('../controller/blog_val.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({ action: 'searchBlogs', title: searchInput }),
        })
        .then(response => response.json())
        .then(data => {
            const mainContainer = document.querySelector('main');
            mainContainer.innerHTML = ''; 
            data.forEach(blog => {
                const article = document.createElement('article');
                article.className = 'blog-post';
                article.innerHTML = `
                    <h2>${blog.title}</h2>
                    <div class="post-meta">By Admin | ${new Date(blog.created_at).toLocaleDateString()} | ${blog.category_id}</div>
                    <p>${blog.content.substring(0, 200)}...</p>
                    <div class="share-buttons">
                        <button>Share on Facebook</button>
                        <button>Share on Twitter</button>
                        <button>Share on LinkedIn</button>
                    </div>
                `;
                mainContainer.appendChild(article);
            });
        })
        .catch(error => console.error('Error searching blogs:', error));
    }

    document.querySelector('.search-bar').addEventListener('submit', searchBlogs);

    window.onload = function() {
        loadBlogs();
        loadHeaderFooter();
    };

    </script>
</body>
</html>
