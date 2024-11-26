<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Simple Landing Page</title>  
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">  
</head>  
<body class="bg-gray-200">  
    <header class="bg-blue-600 text-white py-6">  
        <div class="container mx-auto text-center">  
            <h1 class="text-4xl font-bold">Welcome to Our Service!</h1>  
            <p class="mt-2 text-lg">Discover amazing features and benefits.</p>  
        </div>  
    </header>  

    <main class="container mx-auto py-12">  
        <section class="bg-white shadow-md rounded-lg p-6">  
            <h2 class="text-2xl font-semibold mb-4">Why Choose Us?</h2>  
            <ul class="list-disc list-inside space-y-2">  
                <li>High quality</li>  
                <li>Affordable prices</li>  
                <li>Excellent customer support</li>  
                <li>Easy to use</li>  
            </ul>  
            <div class="mt-8">  
                <a href="#contact" class="inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500">Get Started</a>  
            </div>  
        </section>  

        <section id="contact" class="mt-12">  
            <h2 class="text-2xl font-semibold mb-4">Contact Us</h2>  
            <form action="#" method="POST" class="bg-white shadow-md rounded-lg p-6">  
                <div class="mb-4">  
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>  
                    <input type="text" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>  
                </div>  
                <div class="mb-4">  
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>  
                    <input type="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" required>  
                </div>  
                <div class="mb-4">  
                    <label for="message" class="block text-sm font-medium text-gray-700">Message</label>  
                    <textarea id="message" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50" rows="4" required></textarea>  
                </div>  
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-500">Send Message</button>  
            </form>  
        </section>  
    </main>  

    <footer class="bg-blue-600 text-white py-4">  
        <div class="container mx-auto text-center">  
            <p>&copy; 2023 Our Service. All rights reserved.</p>  
        </div>  
    </footer>  
</body>  
</html>