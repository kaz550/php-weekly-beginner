<?php
declare(strict_types=1);
interface Formatter
{
    public function format(string $value): string;
}
final class BracketFormatter implements Formatter
{
    public function format(string $value): string
    {
        return '[' . $value . ']';
    }
}
function showText(Formatter $formatter, string $text): string
{
    return $formatter->format($text);
}
echo showText(new BracketFormatter(), 'PHP') . PHP_EOL;
