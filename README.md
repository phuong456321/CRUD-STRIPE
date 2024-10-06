# Project Name

## Description
A brief description of your project, its purpose, and features.

## Requirements
- PHP >= 7.3
- Composer
- Laravel >= 8.x
- MySQL or another database of your choice
- Stripe API keys (if applicable)

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/phuong456321/CRUD-STRIPE.git
   cd CRUD-STRIPE
   ```

2. **Install dependencies:**
   ```bash
   composer install
   npm i
   ```

## Database Migration

  **Run migrations:**
   To create the necessary database tables, run the following command:
   ```bash
   php artisan migrate
   ```

## Routes

### Home Route
- **Route**: `/home`
- **Controller**: `HomeController@index`
- **Description**: Displays the home page with a list of products.

### Admin CRUD Routes
- **Route**: `/admin`
  - **GET**: `CRUDController@admin` - Displays a list of products.
  - **GET**: `CRUDController@newProduct` - Shows the form to create a new product.
  - **POST**: `CRUDController@createProduct` - Handles the submission of the new product form.
  - **GET**: `CRUDController@displayEdit($id)` - Shows the form to edit an existing product.
  - **PUT/PATCH**: `CRUDController@edit($id)` - Handles the submission of the edit product form.
  - **DELETE**: `CRUDController@delete($id)` - Deletes a product.

## Running the Application

1. **Start the local development server:**
   ```bash
   php artisan serve
   ```

2. **Access the application:**
   Open your web browser and go to `http://localhost:8000`.

## Usage

- Describe how to use your application, including any important features or functionalities.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Open a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
