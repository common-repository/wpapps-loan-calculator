<?php
/**
 * Plugin Name: WPApps Loan Calculator
 * Description: Two calculators - Amortized Loan and Deferred Payment Loan with customizable titles and detailed payment info. Use shortcodes: <code>[wpapps_amortized_loan_calculator]</code> for Amortized Loan, <code>[wpapps_deferred_payment_calculator]</code> for Deferred Payment Loan, <code>[wpapps_combined_loan_calculator]</code> for Combined Calculator.
 * Version: 1.0.0
 * Author: WPApps.net
 * Author URI: https://wpapps.net
 * License: GPL2
 * Text Domain: wpapps-loan-calculator
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Enqueue JS and CSS
function wpapps_enqueue_calculator_assets() {
    wp_enqueue_script( 'wpapps-loan-calculator-js', plugin_dir_url( __FILE__ ) . 'assets/loan-calculator.js', array(), '1.0.1', true );
    wp_enqueue_style( 'wpapps-loan-calculator-css', plugin_dir_url( __FILE__ ) . 'assets/loan-calculator.css', array(), '1.0.1' );
}
add_action( 'wp_enqueue_scripts', 'wpapps_enqueue_calculator_assets' );

// Amortized Loan Calculator Shortcode with Unique IDs
function wpapps_amortized_loan_calculator_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Amortized Loan: Paying Back a Fixed Amount Periodically'
    ), $atts);

    ob_start(); ?>
    <div id="wpapps-amortized-loan-calculator" class="loan-calculator-widget">
        <h3 id="wpapps-amortized-title"><?php echo esc_html($atts['title']); ?></h3>
        <label for="wpapps-loan-amount-amortized">Loan Amount ($)</label>
        <input type="number" id="wpapps-loan-amount-amortized" value="1000" min="0" class="wpapps-input wpapps-loan-amount-amortized">

        <label for="wpapps-interest-rate-amortized">Interest Rate (%)</label>
        <input type="number" id="wpapps-interest-rate-amortized" value="12" min="0" step="0.01" class="wpapps-input wpapps-interest-rate-amortized">

        <label for="wpapps-loan-term-years-amortized">Loan Term</label>
        <div class="wpapps-loan-term">
            <input type="number" id="wpapps-loan-term-years-amortized" value="1" min="0" max="30" class="wpapps-input wpapps-loan-term-years-amortized"> Years
            <input type="number" id="wpapps-loan-term-months-amortized" value="0" min="0" max="11" class="wpapps-input wpapps-loan-term-months-amortized"> Months
        </div>

        <label for="wpapps-payment-amount-amortized">Payment Amount ($)</label>
        <input type="text" id="wpapps-payment-amount-amortized" readonly class="wpapps-input wpapps-payment-amount-amortized">

        <div id="wpapps-amortized-details" style="display: none;" class="wpapps-details">
            <p>Total Interest: <span id="wpapps-amortized-interest">$0.00</span></p>
            <p>Total Principal: <span id="wpapps-amortized-principal">$0.00</span></p>
            <p>Total Amount: <span id="wpapps-amortized-total">$0.00</span></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('wpapps_amortized_loan_calculator', 'wpapps_amortized_loan_calculator_shortcode');

// Deferred Payment Loan Calculator Shortcode with Unique IDs
function wpapps_deferred_payment_calculator_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Deferred Payment Loan: Paying Back a Lump Sum Due at Maturity'
    ), $atts);

    ob_start(); ?>
    <div id="wpapps-deferred-loan-calculator" class="loan-calculator-widget">
        <h3 id="wpapps-deferred-title"><?php echo esc_html($atts['title']); ?></h3>
        <label for="wpapps-loan-amount-deferred">Loan Amount ($)</label>
        <input type="number" id="wpapps-loan-amount-deferred" value="1000" min="0" class="wpapps-input wpapps-loan-amount-deferred">

        <label for="wpapps-interest-rate-deferred">Interest Rate (%)</label>
        <input type="number" id="wpapps-interest-rate-deferred" value="12" min="0" step="0.01" class="wpapps-input wpapps-interest-rate-deferred">

        <label for="wpapps-loan-term-years-deferred">Loan Term</label>
        <div class="wpapps-loan-term">
            <input type="number" id="wpapps-loan-term-years-deferred" value="1" min="0" max="30" class="wpapps-input wpapps-loan-term-years-deferred"> Years
            <input type="number" id="wpapps-loan-term-months-deferred" value="0" min="0" max="11" class="wpapps-input wpapps-loan-term-months-deferred"> Months
        </div>

        <label for="wpapps-payment-amount-deferred">Total Payment Due ($)</label>
        <input type="text" id="wpapps-payment-amount-deferred" readonly class="wpapps-input wpapps-payment-amount-deferred">

        <div id="wpapps-deferred-details" style="display: none;" class="wpapps-details">
            <p>Total Interest: <span id="wpapps-deferred-interest">$0.00</span></p>
            <p>Amount Due at Loan Maturity: <span id="wpapps-deferred-total">$0.00</span></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('wpapps_deferred_payment_calculator', 'wpapps_deferred_payment_calculator_shortcode');

// Combined Loan Calculator with Unique IDs
function wpapps_combined_loan_calculator_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Repayment Calculator'
    ), $atts);

    ob_start(); ?>
    <div id="wpapps-combined-loan-calculator" class="loan-calculator-widget">
        <h3 id="wpapps-combined-title"><?php echo esc_html($atts['title']); ?></h3>
        <label for="wpapps-loan-amount-combined">Loan Amount ($)</label>
        <input type="number" id="wpapps-loan-amount-combined" value="1000" min="0" class="wpapps-input wpapps-loan-amount-combined">

        <label for="wpapps-interest-rate-combined">Interest Rate (%)</label>
        <input type="number" id="wpapps-interest-rate-combined" value="12" min="0" step="0.01" class="wpapps-input wpapps-interest-rate-combined">

        <label for="wpapps-loan-term-years-combined">Loan Term</label>
        <div class="wpapps-loan-term">
            <input type="number" id="wpapps-loan-term-years-combined" value="1" min="0" max="30" class="wpapps-input wpapps-loan-term-years-combined"> Years
            <input type="number" id="wpapps-loan-term-months-combined" value="0" min="0" max="11" class="wpapps-input wpapps-loan-term-months-combined"> Months
        </div>

        <label for="wpapps-calculation-type-combined">Calculation Type</label>
        <div class="radio-group">
            <div>
                <input type="radio" id="wpapps-monthly-payments-combined" name="wpapps-calculation-type-combined" value="monthly" checked>
                <label for="wpapps-monthly-payments-combined">Monthly Payments</label>
            </div>
            <div>
                <input type="radio" id="wpapps-lump-sum-combined" name="wpapps-calculation-type-combined" value="lump">
                <label for="wpapps-lump-sum-combined">Lump Sum</label>
            </div>
        </div>

        <label for="wpapps-payment-amount-combined">Payment Amount ($)</label>
        <input type="text" id="wpapps-payment-amount-combined" readonly class="wpapps-input wpapps-payment-amount-combined">

        <!-- Amortized Details Section -->
        <div id="wpapps-amortized-details-combined" class="wpapps-details">
            <p>Total Interest: <span id="wpapps-amortized-interest-combined">$0.00</span></p>
            <p>Total Principal: <span id="wpapps-amortized-principal-combined">$0.00</span></p>
            <p>Total Amount: <span id="wpapps-amortized-total-combined">$0.00</span></p>
        </div>

        <!-- Deferred Payment Details Section -->
        <div id="wpapps-deferred-details-combined" class="wpapps-details" style="display: none;">
            <p>Total Interest: <span id="wpapps-deferred-interest-combined">$0.00</span></p>
            <p>Amount Due at Loan Maturity: <span id="wpapps-deferred-total-combined">$0.00</span></p>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('wpapps_combined_loan_calculator', 'wpapps_combined_loan_calculator_shortcode');