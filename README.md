# MacroMate

MacroMate is a modern web application designed to help users calculate and track their daily caloric and macronutrient needs based on their individual body metrics and fitness goals.

## Overview

MacroMate provides scientifically validated formulas (Mifflin-St Jeor and Katch-McArdle) to calculate your Basal Metabolic Rate (BMR) and Total Daily Energy Expenditure (TDEE). This allows users to make informed decisions about their nutrition based on personalized data rather than generic recommendations.

### Key Features

- **Personalized Calculations**: Get precise calorie and macro targets based on your age, gender, weight, height, and activity level
- **Multiple Formula Options**: Choose between Mifflin-St Jeor (general use) or Katch-McArdle (for those tracking body fat)
- **Activity Level Adjustments**: Calculations adapt to your specific activity level
- **Saved Calculations**: Track your progress by saving and reviewing previous calculations
- **Responsive Design**: Fully responsive interface with light/dark mode support

## Installation

### Prerequisites

- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL or compatible database

### Setup Instructions

1. Clone the repository:
   ```
   git clone https://github.com/yourusername/macromate.git
   cd macromate
   ```

2. Install PHP dependencies:
   ```
   composer install
   ```

3. Install JavaScript dependencies:
   ```
   npm install
   ```

4. Create a `.env` file:
   ```
   cp .env.example .env
   ```

5. Generate an application key:
   ```
   php artisan key:generate
   ```

6. Configure your database in the `.env` file:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=macromate
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Run database migrations and seeders:
   ```
   php artisan migrate --seed
   ```

8. Build frontend assets:
   ```
   npm run build
   ```

9. Start the development server:
   ```
   php artisan serve
   ```

10. Visit `http://localhost:8000` in your browser to access the application.

## Development

For local development with hot-reloading:

```
npm run dev
```

## Technologies Used

### Backend
- **Laravel**: PHP framework for robust application development
- **MySQL**: Relational database for data storage
- **Laravel Blade**: Templating engine for views
- **PHP**: Server-side programming language

### Frontend
- **Vue.js**: Progressive JavaScript framework for interactive components
- **Tailwind CSS**: Utility-first CSS framework for responsive design
- **Alpine.js**: Lightweight JavaScript framework for behavior
- **Vite**: Next-generation frontend tooling

### Design & UX
- **Custom Light/Dark Mode**: Toggle between light and dark themes
- **Responsive Design**: Mobile-first approach with adaptive layouts
- **Modern UI Elements**: Clean, accessible interface with smooth transitions

## Future Goals

- **User Authentication**: Allow users to create accounts and securely manage their data
- **Progress Tracking**: Visualize changes in weight, measurements, and goals over time
- **Meal Planning**: Generate meal suggestions based on calculated macronutrient targets
- **Food Database Integration**: Connect to a comprehensive food database for nutritional information
- **Recipe Builder**: Create and save recipes with automatic macro calculation
- **Export Options**: Download reports in PDF or CSV formats
- **Reminder System**: Set goals and receive reminders to track progress
- **Mobile App**: Develop companion mobile applications for iOS and Android

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgements

- Nutrition formulas based on established scientific research
- Icons provided by [Heroicons](https://heroicons.com/)
