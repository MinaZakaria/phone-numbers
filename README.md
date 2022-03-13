## phone-numbers


Phone numbers is a small application for listing all phones in the system, categorizing them by country and state.

You can filter the phone list by country or by phone state (valid-invalid).

# Local Build
- Clone the project using
    ```sh
    git clone git@github.com:MinaZakaria/phone-numbers.git
    ```
- Navigate to the app directory using
    ```sh
    cd phone-numbers
    ```
- Add `.env` file By copying `.env.example` using
    ```sh
    cp .env.example .env
    ```
- Make sure DB Connection set correctly
- Run the local server
    ```sh
    php artisan serve
    ```
- Open your browser with url `localhost:8000`

# Testing app
- You can run Feature/Unit tests using
    ```sh
    php artisan test
    ```