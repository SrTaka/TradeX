# TradeX - Laravel Trading Application

A modern trading application built with Laravel that provides real-time stock data, watchlists, and historical data analysis.

## Features

- User authentication and authorization
- Real-time stock charts using TradingView
- Custom watchlists
- Stock search functionality
- Historical data analysis
- End of day data tables
- Responsive design

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js and NPM
- MySQL or PostgreSQL
- Alpha Vantage API key

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/tradex.git
cd tradex
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install JavaScript dependencies:
```bash
npm install
```

4. Create a copy of the environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure your database in the `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tradex
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

7. Add your Alpha Vantage API key to the `.env` file:
```
ALPHA_VANTAGE_API_KEY=your_api_key
```

8. Run database migrations:
```bash
php artisan migrate
```

9. Build assets:
```bash
npm run build
```

10. Start the development server:
```bash
php artisan serve
```

## Usage

1. Register a new account or log in with existing credentials
2. Access the dashboard to view your watchlists and stock data
3. Use the search bar to find stocks
4. Add stocks to your watchlist
5. View detailed stock information and historical data
6. Monitor real-time price changes using the TradingView widget

## Scheduling Stock Updates

The application includes a scheduled task to update stock data every 5 minutes during market hours (9:30 AM - 4:00 PM EST, Monday-Friday). To enable this:

1. Add the following to your crontab:
```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

- [Laravel](https://laravel.com)
- [TradingView](https://www.tradingview.com)
- [Alpha Vantage](https://www.alphavantage.co)
- [Tailwind CSS](https://tailwindcss.com)
