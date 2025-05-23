# WordPress Minimal Child Theme

A minimal WordPress child theme template that can be used as a base for any parent theme.

## Features

- Simple and minimal structure
- Proper enqueuing of parent theme styles
- Ready-to-use commented examples for customization
- Easy to understand and extend

## Getting Started

1. Update the `Template` value in `style.css` to match your parent theme's directory name
2. Activate the child theme in WordPress admin
3. Uncomment and modify the included examples as needed

## Directory Structure

```
base-child-theme/
├── style.css                 # Theme information and basic styles
├── functions.php             # Main functions file with minimal setup
├── assets/                   # Theme assets (optional)
│   ├── css/                  # Optional CSS files
│   │   └── child-theme.css   # Example stylesheet
│   ├── js/                   # Optional JavaScript files
│   │   ├── child-theme.js    # Example script file
│   │   └── customizer.js     # Example customizer scripts
│   └── img/                  # Images directory
├── inc/                      # Include files (optional)
│   ├── custom-functions.php  # Example custom functions
│   └── customizer.php        # Example customizer settings
└── template-parts/           # Template parts directory (optional)
```

## Customization

This child theme is designed to be minimal and easily customizable:

### Adding Custom Styles
Add your custom styles directly to `style.css` or uncomment the example in `functions.php` to use `/assets/css/child-theme.css`

### Adding Custom Scripts
Uncomment the example in `functions.php` to use `/assets/js/child-theme.js`

### Adding Custom Functions
Uncomment the include lines in `functions.php` to use `/inc/custom-functions.php`

## Development by Imagewize

This child theme was developed by [Imagewize](https://imagewize.com) as a minimal base for WordPress child themes.

## License

This theme is licensed under the GPL v2 or later.
