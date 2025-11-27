# Portfolio Website

A modern, responsive portfolio website built with HTML, CSS, and PHP.

## Features

- 🎨 Modern and beautiful design with glassmorphism effects
- 📱 Fully responsive (mobile, tablet, desktop)
- ✨ Smooth animations and transitions
- 📧 Working contact form with PHP backend
- 🔒 Security features (CSRF protection, rate limiting)
- ⚡ Fast and optimized performance
- 🎯 SEO-friendly structure

## Sections

1. **Hero** - Eye-catching introduction with typing effect
2. **About** - Personal information and statistics
3. **Skills** - Technology stack and expertise
4. **Projects** - Portfolio showcase
5. **Contact** - Contact form with validation

## Installation

### Prerequisites

- PHP 7.4 or higher
- Web server (Apache/Nginx) or WAMP/XAMPP
- Mail server configured (for contact form)

### Setup Instructions

1. **Clone or download** this project to your web server directory

2. **Configure Email Settings**
   - Open `php/config.php`
   - Update `CONTACT_EMAIL` with your email address
   - Optionally configure SMTP settings for better email delivery

3. **Customize Content**
   - Edit `index.php` to update:
     - Your name and personal information
     - Skills and technologies
     - Project details
     - Contact information
     - Social media links

4. **Test Locally**
   - If using WAMP: Place in `C:\wamp64\www\portfolio`
   - Access via: `http://localhost/portfolio`

5. **Configure PHP Mail** (Important!)
   - For local testing, you may need to configure PHP's mail settings
   - Edit `php.ini` and configure SMTP settings
   - Or use a service like Mailtrap for testing

## File Structure

```
portfolio/
├── index.php              # Main HTML page
├── css/
│   └── style.css         # Styles and animations
├── js/
│   └── script.js         # Interactive features
├── php/
│   ├── config.php        # Configuration settings
│   └── contact-handler.php # Form processing
├── images/               # Your images and assets
└── README.md            # This file
```

## Customization Guide

### Update Personal Information

1. **Name and Title**: Edit the hero section in `index.php`
2. **About Section**: Update your bio and statistics
3. **Skills**: Modify the skill cards with your technologies
4. **Projects**: Add your actual projects with links
5. **Contact Info**: Update email, phone, and location

### Change Colors

Edit CSS variables in `css/style.css`:

```css
:root {
    --primary-color: #667eea;
    --secondary-color: #764ba2;
    --accent-color: #f093fb;
}
```

### Add Your Images

1. Place images in the `images/` folder
2. Update image paths in `index.php`
3. Recommended sizes:
   - Profile photo: 400x400px
   - Project images: 800x600px

## Contact Form Configuration

### Using PHP mail()

The default configuration uses PHP's `mail()` function. Ensure your server has mail configured.

### Using SMTP (Recommended)

For better deliverability, configure SMTP in `php/config.php`:

```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your.email@gmail.com');
define('SMTP_PASSWORD', 'your-app-password');
```

**Note**: For Gmail, you'll need to create an [App Password](https://support.google.com/accounts/answer/185833).

## Security Features

- ✅ CSRF token protection
- ✅ Rate limiting (5 submissions per hour per IP)
- ✅ Input sanitization
- ✅ Email validation
- ✅ XSS protection

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers

## Deployment

### To Deploy on Live Server:

1. Upload all files to your web hosting
2. Update `SITE_URL` in `php/config.php`
3. Ensure PHP mail is configured
4. Set `display_errors` to 0 in `php/config.php`
5. Test the contact form

### Recommended Hosting:

- Shared hosting with PHP support
- VPS with Apache/Nginx
- Cloud platforms (AWS, DigitalOcean, etc.)

## Troubleshooting

### Contact Form Not Sending Emails

1. Check PHP error logs
2. Verify `CONTACT_EMAIL` is set correctly
3. Test PHP mail configuration: `php -r "mail('test@example.com', 'Test', 'Test message');"`
4. Consider using SMTP instead of mail()

### Styling Issues

1. Clear browser cache
2. Check browser console for errors
3. Verify CSS file is loading correctly

## Performance Tips

- Optimize images (use WebP format)
- Enable gzip compression
- Use CDN for static assets
- Minify CSS and JavaScript for production

## Future Enhancements

- [ ] Add blog section
- [ ] Integrate with CMS
- [ ] Add dark/light mode toggle
- [ ] Multi-language support
- [ ] Admin dashboard
- [ ] Database integration for contact messages

## Credits

- Font: [Inter](https://fonts.google.com/specimen/Inter) from Google Fonts
- Icons: SVG icons (customizable)
- Design: Custom modern design with glassmorphism

## License

Free to use for personal and commercial projects.

## Support

For issues or questions, please contact via the portfolio contact form or email directly.

---

**Built with ❤️ using HTML, CSS, and PHP**
