<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# ChatGPT ASSIGN API

AI API allows users to send device information to obtain their premium status and application configuration data, manage chat messages, and record purchase transactions. The API also includes an admin panel to view all purchase transactions.

## Installation

1. **Clone the Repository:**

    ```bash
    git clone <repository_url>
    cd <repository_name>
    ```

2. **Install Dependencies:**

    ```bash
    composer install
    npm install
    ```
   ```install docker & open desktop app```


3. **Set Up Environment Variables:**

   Create the `.env` file and configure the necessary settings. You can copy the example file:

    ```bash
    cp .env.example .env
    ```

4. **Generate Application Key:**

    ```bash
    php artisan key:generate
    ```

5. **Run Database Migrations:**

    ```bash
    php artisan migrate --seed
    ```

    ```bash
    ./vendor/bin/sail artisan migrate --seed
    ```

6. **Start the Project with Docker:**

    ```bash
    ./vendor/bin/sail up -d
    ```

## Usage

### 1. Auth

- **Endpoint:** `/auth`
- **Method:** `POST`
- **Request:**

    ```json
    {
        "deviceName": "example-device",
        "deviceUuid": "example-uuid"
    }
    ```

- **Response:**

    ```json
    {
      "device": "example-device",
      "isPremium": "is-premium",
      "chatCredits": "example-chatCredits"
    }
    ```
  
### 2. Subscription

- **Endpoint:** `/subscription`
- **Method:** `POST`
- **Request:**

    ```json
    {
        "deviceUuid": "example-device",
        "productId": "example-product-id",
        "receiptToken": "example-payment-token"
    }
    ```

- **Response:**

    ```json
    {
        "status": "status",
        "isPremium": "is-premium",
        "chatCredits": "example-remaining-credits"
    }
    ```

### 3. Chat

- **Endpoint:** `/chat`
- **Method:** `POST`
- **Request:**

    ```json
    {
        "deviceUuid": "example-uuid",
        "chatId": "optional-chat-id",
        "message": "Hello, how are you?"
    }
    ```
- **Response:**

    ```json
    {
        "response": "Response from AI",
        "remainingCredits": "example-remaining-credits"
    }
    ```

## Admin Panel

The admin panel allows you to view all purchase transactions. Once logged in, you can access the `/admin/subscriptions` and `/admin/users` pages.

### Register Page

- **URL:** `/register`

### Login Page

- **URL:** `/login`

### Subscriptions Page

- **URL:** `/admin/subscriptions`

### Users Page

- **URL:** `/admin/users`

## Testing

To run tests:

```bash
./vendor/bin/sail artisan test
```


## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT). For more information, see the LICENSE file.
You can copy this Markdown code directly into your README file. If you have any further questions or need additional assistance, feel free to ask!
