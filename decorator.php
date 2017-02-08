<?php
interface  Logger {
public function log($message);
}
class FileLogger implements Logger {
    public function log($message) {
        echo "<p>log to file - message: {$message}</p>";
    }
}
abstract class DecoratorLogger implements Logger {
    protected $logger;
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }
    abstract public function log($message);
}
class EmailLogger extends DecoratorLogger {
    public function log($message) {
        $this->logger->log($message);
        echo "<p>log to email - message: {$message}</p>";
    }
}
class PDFLogger extends DecoratorLogger {
    public function log($message) {
        $this->logger->log($message);
        echo "<p>log to PDF - message: {$message}</p>";
    }
}

$log = New FileLogger();
$log = New EmailLogger($log);
$log = New PDFLogger($log);

$log->log("Saving File");

?>
