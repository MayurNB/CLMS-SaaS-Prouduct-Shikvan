<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

/**
 * LogService
 * Provides structured logging to separate channels configured in config/logging.php.
 */
class LogService
{
    /**
     * Logs general application information and warnings (Maps to 'app_log' channel).
     * @param string $message The main log message.
     * @param array $context Optional array of contextual data.
     */
    public static function app(string $message, array $context = []): void
    {
        // CHANGED: Using 'app_log' to match your config
        Log::channel('app_log')->info($message, $context);
    }

    /**
     * Logs security-sensitive events (Maps to 'security' channel).
     * @param string $message The security log message.
     * @param array $context Optional array of contextual data.
     */
    public static function security(string $message, array $context = []): void
    {
        // UNCHANGED: Already matches your config
        Log::channel('security')->notice($message, $context);
    }

    /**
     * Logs all financial and payment-related transactions (Maps to 'payments' channel).
     * @param string $message The payment log message.
     * @param array $context Optional array of contextual data.
     */
    public static function payment(string $message, array $context = []): void
    {
        // CHANGED: Using 'payments' to match your config
        Log::channel('payments')->info($message, $context);
    }
}