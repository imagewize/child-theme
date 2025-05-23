# WordPress Base Child Theme

A versatile WordPress child theme template that can be used as a base for any parent theme.

## Features

- Proper enqueuing of parent theme and child theme styles
- Automatic creation of essential directories on theme activation
- Custom functions file structure for better organization
- Customizer settings for easy theme customization
- Mobile-responsive design
- Built-in helper functions and shortcodes
- Well-documented code for easy customization

## Getting Started

1. Update the `Template` value in `style.css` to match your parent theme's directory name
2. Activate the child theme in WordPress admin
3. Customize the theme through WordPress Customizer
4. Add your custom styles in `/assets/css/child-theme.css`
5. Add your custom scripts in `/assets/js/child-theme.js`

## Directory Structure

```
base-child-theme/
├── style.css                 # Theme information
├── functions.php             # Main functions file
├── assets/                   # Theme assets
│   ├── css/                  # CSS files
│   │   └── child-theme.css   # Main stylesheet
│   ├── js/                   # JavaScript files
│   │   ├── child-theme.js    # Main script file
│   │   └── customizer.js     # Customizer scripts
│   └── img/                  # Images directory
├── inc/                      # Include files
│   ├── custom-functions.php  # Custom functions
│   └── customizer.php        # Customizer settings
└── template-parts/           # Template parts directory
```

## Customization

This child theme is designed to be easily customizable. Here are some common customization tasks:

### Adding Custom Styles
Add your custom styles to `/assets/css/child-theme.css`

### Adding Custom Scripts
Add your custom scripts to `/assets/js/child-theme.js`

### Adding Custom Functions
Add your custom functions to `/inc/custom-functions.php`

### Customizing Theme Options
Use the WordPress Customizer to adjust theme options

## Development by Imagewize

This child theme was developed by [Imagewize](https://imagewize.com) as a base for WordPress development projects.

## License

This theme is licensed under the GPL v2 or later.
