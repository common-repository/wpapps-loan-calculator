=== WPApps Loan Calculator ===

Contributors:      @hefind
Plugin Name:       WPApps Loan Calculator
Plugin URI:        https://wordpress.org/plugins/wpapps-loan-calculator
Tags:              loan calculator, amortized loan, deferred payment loan, loan calculator WP, loan repayment calculator
Author URI:        https://wpapps.net
Requires at least: 5.8
Requires PHP:      7.4
Tested up to:      6.6.2
Stable tag:        1.0.0
License:           GPLv2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html
Version:           1.0.0

Lightweight, cluster-free loan calculator plugin with fully customizable CSS definitions.

== Description ==

The **WPApps Loan Calculator** is a lightweight, no-clutter solution for calculating both Amortized Loans (Fixed Periodic Payments) and Deferred Payment Loans (Lump Sum Due at Maturity). This plugin focuses on simplicity, speed, and ease of use without unnecessary features or settings. Whether you need to calculate payments for a home loan, personal loan, or any other loan type, this plugin handles it efficiently.

**Key Features:**

- Two loan calculators in one: Amortized Loan and Deferred Payment Loan
- Lightweight and fast, no clutter or unnecessary options
- Completely free with no pro versions
- Customizable via shortcodes
- Responsive and mobile-friendly
- Customizable titles and detailed payment info
- **Full CSS Customization**: Modify the appearance using our predefined CSS definitions without any complex configuration
- Simple to install and use

**Shortcodes:**

- <code>[wpapps_amortized_loan_calculator]</code> - Amortized Loan Calculator (Paying Back a Fixed Amount Periodically)
- <code>[wpapps_deferred_payment_calculator]</code> - Deferred Payment Loan Calculator (Paying Back a Lump Sum Due at Maturity)
- <code>[wpapps_combined_loan_calculator]</code> - Combined Loan Calculator (Switch between Monthly Payments and Lump Sum options)

**CSS Customization**

This plugin allows for **complete control over the styling** with predefined CSS classes. Whether you want to modify colors, borders, or the layout, all elements can be easily styled by adding custom CSS to your theme.

Here are the available CSS classes and IDs that you can use to customize the appearance of the calculator:

- **.loan-calculator-widget**: Styles the main container for the loan calculator.
- **.wpapps-input**: Styles all input fields for loan amount, interest rate, loan term, etc.
- **.radio-group**: Styles the container for radio button groups (e.g., for selecting Monthly Payments or Lump Sum).
- **#wpapps-loan-amount**: Styles the Loan Amount input field.
- **#wpapps-interest-rate**: Styles the Interest Rate input field.
- **#wpapps-loan-term-years**: Styles the Loan Term (Years) input field.
- **#wpapps-loan-term-months**: Styles the Loan Term (Months) input field.
- **#wpapps-payment-amount**: Styles the Payment Amount (readonly) field.
- **#wpapps-amortized-details**: Styles the container for amortized loan details.
- **#wpapps-deferred-details**: Styles the container for deferred loan details.
- **#wpapps-amortized-interest**: Styles the Total Interest span in the amortized loan details section.
- **#wpapps-amortized-principal**: Styles the Total Principal span in the amortized loan details section.
- **#wpapps-amortized-total**: Styles the Total Amount span in the amortized loan details section.
- **#wpapps-deferred-total**: Styles the Total Amount span in the deferred loan details section.
- **#wpapps-deferred-interest**: Styles the Total Interest span in the deferred loan details section.
- **#wpapps-amortized-title**: Styles the title of the Amortized Loan calculator.
- **#wpapps-deferred-title**: Styles the title of the Deferred Payment Loan calculator.
- **#wpapps-combined-title**: Styles the title of the Combined Loan calculator.

You can easily customize the appearance of the loan calculator by overriding these styles in your theme’s stylesheet.

**Who is this plugin for?**

This plugin is perfect for:
- Loan and mortgage websites
- Personal finance blogs
- Real estate websites
- Any website requiring a simple, functional loan calculator

== Frequently Asked Questions ==

= 1. How do I install the WPApps Loan Calculator? =

1. Unzip the downloaded zip file.
2. Upload the plugin folder to the `/wp-content/plugins/` directory of your WordPress installation.
3. Activate the plugin via the WordPress Plugins page.

= 2. How do I use the Loan Calculator? =

After activating the plugin, you can display the loan calculators by copying and pasting the relevant shortcode into any page or post:

- For Amortized Loan Calculator: <code>[wpapps_amortized_loan_calculator]</code>
- For Deferred Payment Loan Calculator: <code>[wpapps_deferred_payment_calculator]</code>
- For Combined Loan Calculator: <code>[wpapps_combined_loan_calculator]</code>

= 3. Can I customize the calculator titles? =

Yes! You can customize the title of the calculator by adding a `title` attribute to the shortcode. Example:

<code>[wpapps_amortized_loan_calculator title="Custom Loan Calculator"]</code>

= 4. Does this plugin support multiple currencies? =

Currently, the plugin only supports USD ($). In future updates, more currency options may be added.

= 5. How can I style the calculator? =

The plugin comes with CSS identifiers that you can customize directly in your theme's stylesheet. Adjust the look of the calculator to fit your website's design with ease.

= 6. Is there a Pro version? =

No, the WPApps Loan Calculator is completely free with all features available.

== Screenshots ==

1. Amortized Loan Calculator frontend view
2. Deferred Payment Loan Calculator frontend view
3. Combined Loan Calculator frontend view

== Changelog ==

= 1.0.0 =
* Initial release.

== Installation ==

1. Unzip the downloaded zip file.
2. Upload the plugin folder to the `/wp-content/plugins/` directory of your WordPress installation.
3. Activate the plugin via the WordPress Plugins page.

== License ==

This plugin is licensed under the GPLv2 or later.