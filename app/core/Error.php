<?php

declare(strict_types=1);

namespace Core;

use ErrorException;
use Exception;

/**
 * Error and Exception handler
 * 
 * PHP version 8.2.1
 */
class Error
{
    /**
     * Error handler. Convert all errors to Exceptions by throwing an ErrorException.
     * 
     * @param int $level Error level
     * @param string $message Error message
     * @param string $file Filename the error raised in
     * @param int $line Line number in the file
     * 
     * @return void
     */
    public static function errorHandler(int $level, string $message, string $file, int $line): void
    {
        if (error_reporting() !== 0) {
            throw new ErrorException($message, 0, $level, $file, $line);
        }
    }

    /**
     * Exception handler.
     * 
     * @param Exception $exception The exception
     * 
     * @return void
     */
    public static function exceptionHandler(Exception $exception): void
    {
        $code = $exception->getCode();
        if ($code != 404) {
            $code = 500;
        }
        http_response_code($code);

        if ((bool) $_ENV['SHOW_ERRORS']) {
            echo '<h1>Fatal error</h1>';
            echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
            echo "<p>Message: '". $exception->getMessage() . "'</p>";
            echo "<p>Stack trace: <pre>". $exception->getTraceAsString() . "</pre></p>";
            echo "<p>Thrown in '" . $exception->getFile(). "' on line ". $exception->getLine() . '</p>';
        } else {
            $log = __DIR__ . '/../logs/' . date('Y-m-d') . '.txt';
            ini_set('error_log', $log);
            $message = "Uncaught exception: '" . get_class($exception) . "'";
            $message .= "Message: '". $exception->getMessage() . "'";
            $message .= "\nStack trace: <pre>". $exception->getTraceAsString();
            $message .= "\nThrown in '" . $exception->getFile(). "' on line ". $exception->getLine();

            error_log($message);
            // if ($code == 404) {
            //     echo '<h1>Page not found</h1>';
            // } else {
            //     echo '<h1>An error occurred</h1>';
            // }
            View::renderTemplate("$code.twig");
        }
        
    }
}