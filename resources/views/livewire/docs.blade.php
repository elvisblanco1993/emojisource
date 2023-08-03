<div>
    @include('layouts.nav')
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-12">
            <h1 class="text-4xl font-medium">Documentation</h1>
        </div>
        <h2 class="text-xl font-medium">Getting started:</h2>
        <p class="mt-3">
            To start using emojisource.app API, you need to create an account on our platform. Once registered, you can generate API tokens from your account dashboard. These tokens are required to authenticate your requests and access the API.
        </p>

        <h2 class="mt-6 text-xl font-medium">Authentication:</h2>
        <p class="mt-3">
            To authenticate your requests, you must include the generated API token in the Authorization header of your API calls. The header should follow the Bearer token format.
        </p>

        <h2 class="mt-6 text-xl font-medium">API Endpoint:</h2>
        <p class="mt-3">
            The API provides a single endpoint to access emoji data: <span class="font-medium underline text-indigo-300">https://emojisource.app/api/v1/emojis</span>. All requests related to emojis should be directed to this endpoint.
        </p>

        <h2 class="mt-6 text-xl font-medium">Supported Operations:</h2>
        <p class="mt-3">
            Currently, the API supports the retrieval of emoji data. There are no write or update operations available.
        </p>

        <h2 class="mt-6 text-xl font-medium">Request Method:</h2>
        <p class="mt-3">
            You can make HTTP GET requests to the endpoint to fetch emoji data. The API will respond with the requested information in JSON format.
        </p>

        <h2 class="mt-6 text-xl font-medium">Rate Limiting:</h2>
        <p class="mt-3">
            To ensure fair usage and maintain the quality of service for all users, the API imposes rate-limiting on requests.
        </p>

        <h2 class="mt-6 text-xl font-medium">Example Request:</h2>

<div class="mt-6 rounded-md overflow-hidden text-sm">
<p class="w-full bg-slate-600 py-2 px-[1.2rem]">PHP (Using cURL)</p>
<x-markdown>
```php
$apiToken = 'YOUR_API_TOKEN';
$endpoint = 'https://emojisource.app/api/v1/emojis';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $apiToken));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
print_r($data);
```
</x-markdown>
</div>

<div class="mt-6 rounded-md overflow-hidden text-sm">
<p class="w-full bg-slate-600 py-2 px-[1.2rem]">PHP (Using Guzzle)</p>
<x-markdown>
```php
require 'vendor/autoload.php';

use GuzzleHttp\Client;

$client = new Client();

$response = $client->get('https://emojisource.app/api/v1/emojis', [
    'headers' => [
        'Authorization' => 'Bearer YOUR_API_TOKEN'
    ]
]);
```
</x-markdown>
</div>

<div class="mt-6 rounded-md overflow-hidden text-sm">
<p class="w-full bg-slate-600 py-2 px-[1.2rem]">cURL (Command Line)</p>
<x-markdown>
```php
# Replace YOUR_API_TOKEN with your actual API token
curl -X GET "https://emojisource.app/api/v1/emojis" -H "Authorization: Bearer YOUR_API_TOKEN"
```
</x-markdown>
</div>

<div class="mt-6 rounded-md overflow-hidden text-sm">
<p class="w-full bg-slate-600 py-2 px-[1.2rem]">Python</p>
<x-markdown>
```php
import requests

headers = {
    'Authorization': 'Bearer YOUR_API_TOKEN',
}

response = requests.get('https://emojisource.app/api/v1/emojis', headers=headers)
```
</x-markdown>
</div>

<div class="mt-6 rounded-md overflow-hidden text-sm">
<p class="w-full bg-slate-600 py-2 px-[1.2rem]">NodeJS + Axios</p>
<x-markdown>
```php
import axios from 'axios';

const response = await axios.get('https://emojisource.app/api/v1/emojis', {
  headers: {
    'Authorization': 'Bearer YOUR_API_TOKEN'
  }
});
```
</x-markdown>
</div>

    <h2 class="mt-6 text-xl font-medium">Filtering emojis:</h2>
    <p class="mt-3">You can also do live search by including the "search" parameter in your request. For example:</p>

<div class="mt-6 rounded-md overflow-hidden text-sm">
<p class="w-full bg-slate-600 py-2 px-[1.2rem]">cURL (Command Line)</p>
<x-markdown>
```php
# Replace YOUR_API_TOKEN with your actual API token
curl -X GET "https://emojisource.app/api/v1/emojis?search=rocket" -H "Authorization: Bearer YOUR_API_TOKEN"
```
</x-markdown>
</div>


    </div>

    <div class="mt-12"></div>
</div>
