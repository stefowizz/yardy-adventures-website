<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yardy Adventures API</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .endpoint {
            margin-bottom: 30px;
        }

        .endpoint h3 {
            margin-top: 0;
        }

        pre {
            background-color: #f4f4f4;
            padding: 10px;
            border-radius: 4px;
            overflow-x: auto;
        }

        code {
            font-family: Consolas, Monaco, monospace;
            color: #d63384;
        }

        .method {
            font-weight: bold;
            color: #4CAF50;
        }

        .params, .response {
            margin-top: 10px;
        }

        .params ul, .response ul {
            list-style: none;
            padding: 0;
        }

        .params li, .response li {
            margin-bottom: 5px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #666;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>API Documentation</h1>
    </header>

    <div class="container">
      <h1> Adventures </h1>
       <section class="endpoint">
         <h2>List adventures information </h2>
         <h3>Endpoint</h3>

        <p><code>GET /demo/api/adventures</code></p>

        <h3>Method</h3>
        <p class="method">GET</p>
        <h3>Description</h3>
        <p>Fetch information on all the available adventures</p>
       </section>
       <section class="endpoint">
         <h2>Get specific adventure</h2>
         <h3>Endpoint</h3>
        <p><code>GET /demo/api/adventures?id={id}</code></p>
        <h3>Method</h3>
        <p class="method">GET</p>
        <h3>Description</h3>
        <p>Fetch information on a particular adventure given id number</p>
        <h3>Parameters</h3>
            <div class="params">
                <ul>
                    <li><strong>id</strong> (number) - The id of the adventure</li>
                    <li><strong>name</strong> (flag) - Display only the name of the adventure </li>
                    <li><strong>desc</strong> (flag) - Display only the description of the adventure </li>
                </ul>
            </div>

            <h3>Example Request</h3>
            <pre><code>GET /demo/adventures?id=1</code></pre>

            <h3>Response</h3>
            <div class="response">
                <p>A JSON object containing the adventure information:</p>
                <pre><code>{
    "id": 1,
    "name": "Yardy River Tubing",
    "description":"All year round 2 km of unrestricted tubing along the Rapids of the Roaring River
                 Escape the ordinary and dive into fun and relaxation on our thrilling Yardy River 
                 Tubing Tour! Race along rapid currents and pause to enjoy the surrounding scenery, 
                 where lush greenery meets crystal-clear waters.",
    "price":"85.00",
    "image_url",:"https://yardyadventures.com/demo/assets/images/frontend/blog/tubing.jpg"

}</code></pre>
            </div>

            <h3>Example Request</h3>
            <pre><code>GET /demo/adventures?id=1&amp;name</code></pre>

            <h3>Response</h3>
<div class="response">
                <p>A string with the name of the adventure:</p>
                <pre><code>Yardy River Tubing</code></pre>
            </div>
       </section>

<!--End here-->

    <div class="container">
       <h1>User</h1>
        <section class="endpoint">
            <h2>Get Current User Information</h2>
            <h3>Endpoint</h3>
            <p><code>GET /api/user</code></p>

            <h3>Method</h3>
            <p class="method">GET</p>

            <h3>Description</h3>
            <p>Fetch information for the current user</p>

            

            <h3>Example Request</h3>
            <pre><code>GET /api/user</code></pre>

            <h3>Response</h3>
            <div class="response">
                <p>A JSON object containing user information:</p>
                <pre><code>{
    "id": "12345",
    "name": "John Doe",
    "email": "johndoe@example.com",
    "created_at": "2023-01-01T10:00:00Z"
}</code></pre>
            </div>
            <h3>Error</h3>
            <p><strong>(403)</strong> If User is not logged in</p>
            <pre><code>403 - User Not Logged In</code></pre>
            
        </section>

    </div>

    <footer>
        &copy; 2024 Yardy Adventures API. All rights reserved.
    </footer>
</body>
</html>

